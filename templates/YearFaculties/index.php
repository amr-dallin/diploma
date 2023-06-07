<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\YearFaculty> $yearFaculties
 */
?>
<div class="yearFaculties index content">
    <?= $this->Html->link(__('New Year Faculty'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Year Faculties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('faculty_id') ?></th>
                    <th><?= $this->Paginator->sort('release_year_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($yearFaculties as $yearFaculty): ?>
                <tr>
                    <td><?= $this->Number->format($yearFaculty->id) ?></td>
                    <td><?= $yearFaculty->has('faculty') ? $this->Html->link($yearFaculty->faculty->title, ['controller' => 'Faculties', 'action' => 'view', $yearFaculty->faculty->id]) : '' ?></td>
                    <td><?= $yearFaculty->has('release_year') ? $this->Html->link($yearFaculty->release_year->id, ['controller' => 'ReleaseYears', 'action' => 'view', $yearFaculty->release_year->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $yearFaculty->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $yearFaculty->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $yearFaculty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yearFaculty->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
