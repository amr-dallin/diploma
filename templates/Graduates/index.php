<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Graduate> $graduates
 */
?>
<div class="graduates index content">
    <?= $this->Html->link(__('New Graduate'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Graduates') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('group_id') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('last_name_en') ?></th>
                    <th><?= $this->Paginator->sort('first_name_en') ?></th>
                    <th><?= $this->Paginator->sort('last_name_uz') ?></th>
                    <th><?= $this->Paginator->sort('first_name_uz') ?></th>
                    <th><?= $this->Paginator->sort('second_name_uz') ?></th>
                    <th><?= $this->Paginator->sort('excellent') ?></th>
                    <th><?= $this->Paginator->sort('verified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($graduates as $graduate): ?>
                <tr>
                    <td><?= $this->Number->format($graduate->id) ?></td>
                    <td><?= $graduate->has('group') ? $this->Html->link($graduate->group->title, ['controller' => 'Groups', 'action' => 'view', $graduate->group->id]) : '' ?></td>
                    <td><?= $this->Number->format($graduate->number) ?></td>
                    <td><?= h($graduate->last_name_en) ?></td>
                    <td><?= h($graduate->first_name_en) ?></td>
                    <td><?= h($graduate->last_name_uz) ?></td>
                    <td><?= h($graduate->first_name_uz) ?></td>
                    <td><?= h($graduate->second_name_uz) ?></td>
                    <td><?= h($graduate->excellent) ?></td>
                    <td><?= h($graduate->verified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $graduate->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $graduate->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $graduate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $graduate->id)]) ?>
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
