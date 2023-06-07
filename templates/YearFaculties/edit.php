<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YearFaculty $yearFaculty
 * @var string[]|\Cake\Collection\CollectionInterface $faculties
 * @var string[]|\Cake\Collection\CollectionInterface $releaseYears
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $yearFaculty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $yearFaculty->id), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="yearFaculties form content">
            <?= $this->Form->create($yearFaculty) ?>
            <fieldset>
                <h1><?= __('Edit Faculty') ?></h1>

                <table>
                    <tr>
                        <th><?= __('Release Year') ?></th>
                        <td><?= $this->Html->link($yearFaculty->release_year->year, ['controller' => 'ReleaseYears', 'action' => 'view', $yearFaculty->release_year_id]) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Faculty') ?></th>
                        <td><?= $yearFaculty->faculty->title ?></td>
                    </tr>
                </table>

                <hr/>
                <?php
                echo $this->Form->control('faculty_title_en');
                echo $this->Form->control('faculty_title_uz');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
