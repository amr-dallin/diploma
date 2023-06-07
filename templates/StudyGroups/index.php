<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\StudyGroup> $studyGroups
 */
?>
<div class="studyGroups index content">
    <?= $this->Html->link(__('New Study Group'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Study Groups') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('year_faculty_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('verified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studyGroups as $studyGroup): ?>
                <tr>
                    <td><?= $this->Number->format($studyGroup->id) ?></td>
                    <td><?= $studyGroup->has('year_faculty') ? $this->Html->link($studyGroup->year_faculty->id, ['controller' => 'YearFaculties', 'action' => 'view', $studyGroup->year_faculty->id]) : '' ?></td>
                    <td><?= h($studyGroup->title) ?></td>
                    <td><?= h($studyGroup->verified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $studyGroup->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studyGroup->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studyGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studyGroup->id)]) ?>
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
