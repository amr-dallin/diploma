<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReleaseYear $releaseYear
 */

echo $this->Html->css(['https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/rg-1.3.1/datatables.min.css'], ['block' => true]);
echo $this->Html->script(
    [
        'https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js',
        'https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/rg-1.3.1/datatables.min.js'],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.datatable').dataTable({
        responsive: {
            details: {
                type: 'column', target: 'tr'
            }
        },
        /*orderCellsTop: true,
        fixedHeader: true,
        columnDefs: [
        {
            targets: [0, 1],
            visible: false
        },
        {
            targets: [8],
            orderable: false
        }],
        pageLength: 50,
        order: [[0, 'desc'], [1, 'asc'], [3, 'asc'], [4, 'asc']]*/
    });
});
</script>
<?php $this->end(); ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Release Year'), ['action' => 'edit', $releaseYear->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Release Year'), ['action' => 'delete', $releaseYear->id], ['confirm' => __('Are you sure you want to delete # {0}?', $releaseYear->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Release Years'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Release Year'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>

            <hr/>

            <?= $this->Html->link(__('Add faculty'), ['controller' => 'YearFaculties', 'action' => 'add', $releaseYear->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="releaseYears view content">
            <h1><?= h($releaseYear->year) ?></h1>
            <hr/>

            <div class="related">
                <?php if (!empty($releaseYear->year_faculties)) : ?>
                    <?php foreach ($releaseYear->year_faculties as $yearFaculties) : ?>
                        <div class="row">
                            <div class="column column-50"><h3><?= h($yearFaculties->faculty->title) ?></h3></div>
                            <div class="column" style="text-align: right;">
                                <?= $this->Html->link(__('Add group'), ['controller' => 'StudyGroups', 'action' => 'add', $yearFaculties->id], ['class' => 'button button-outline']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'YearFaculties', 'action' => 'edit', $yearFaculties->id], ['class' => 'button button-outline']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'YearFaculties', 'action' => 'delete', $yearFaculties->id], ['class' => 'button', 'confirm' => __('Are you sure you want to delete # {0}?', $yearFaculties->id)]) ?>
                            </div>
                        </div>

                        <?php if (!empty($yearFaculties->study_groups)): ?>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th><?= __('Group') ?></th>
                                            <th style="text-align: center;"><?= __('Graduates') ?></th>
                                            <th style="text-align: center;"><?= __('Verified') ?></th>
                                            <th style="text-align: center;"><?= __('Print') ?></th>
                                            <th style="text-align: right;"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($yearFaculties->study_groups as $studyGroup): ?>
                                        <tr>
                                            <td style="width: 45%;"><strong><?= $studyGroup->title ?></strong></td>
                                            <td style="text-align: center;"><?= count($studyGroup->graduates) ?></td>
                                            <td style="text-align: center;">
                                                <?php
                                                echo $this->Form->postLink(
                                                    ($studyGroup->verified ? __('Yes') : __('No')),
                                                    ['controller' => 'StudyGroups', 'action' => 'verified', $studyGroup->id],
                                                    ['confirm' => __('Are you sure you want to verified # {0}?', $studyGroup->id)]
                                                );
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?= $this->Html->link(__('Print'), ['controller' => 'StudyGroups', 'action' => 'generate', $studyGroup->id, '_ext' => 'pdf']) ?>
                                            </td>
                                            <td class="actions" style="font-size: 12px; width: 40%; text-align: right;">
                                                <?= $this->Html->link(__('Add graduate'), ['controller' => 'Graduates', 'action' => 'add', $studyGroup->id]) ?>
                                                |
                                                <?= $this->Html->link(__('View'), ['controller' => 'StudyGroups', 'action' => 'view', $studyGroup->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudyGroups', 'action' => 'edit', $studyGroup->id]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudyGroups', 'action' => 'delete', $studyGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yearFaculties->id)]) ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div style="text-align: center; color: red;"><?= __('There are no groups added to this faculty') ?></div>
                        <?php endif; ?>
                        <br/><br/><br/><br/>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
