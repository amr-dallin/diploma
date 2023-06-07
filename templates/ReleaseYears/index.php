<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ReleaseYear> $releaseYears
 */
?>
<div class="releaseYears index content">
    <?= $this->Html->link(__('New Release Year'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Release Years') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($releaseYears as $releaseYear): ?>
                <tr>
                    <td><?= h($releaseYear->year) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $releaseYear->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $releaseYear->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $releaseYear->id], ['confirm' => __('Are you sure you want to delete # {0}?', $releaseYear->id)]) ?>
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
