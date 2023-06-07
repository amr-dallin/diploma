<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Graduate $graduate
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Graduate'), ['action' => 'edit', $graduate->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Graduate'), ['action' => 'delete', $graduate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $graduate->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Graduates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Graduate'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="graduates view content">
            <h3><?= h($graduate->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Group') ?></th>
                    <td><?= $graduate->has('group') ? $this->Html->link($graduate->group->title, ['controller' => 'Groups', 'action' => 'view', $graduate->group->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name En') ?></th>
                    <td><?= h($graduate->last_name_en) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name En') ?></th>
                    <td><?= h($graduate->first_name_en) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name Uz') ?></th>
                    <td><?= h($graduate->last_name_uz) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name Uz') ?></th>
                    <td><?= h($graduate->first_name_uz) ?></td>
                </tr>
                <tr>
                    <th><?= __('Second Name Uz') ?></th>
                    <td><?= h($graduate->second_name_uz) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($graduate->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Number') ?></th>
                    <td><?= $this->Number->format($graduate->number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Excellent') ?></th>
                    <td><?= $graduate->excellent ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Verified') ?></th>
                    <td><?= $graduate->verified ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
