<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Graduate $graduate
 * @var string[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $graduate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $graduate->id), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="graduates form content">
            <?= $this->Form->create($graduate) ?>
            <fieldset>
                <h1><?= __('Edit Graduate') ?></h1>
                <table>
                    <tr>
                        <th><?= __('Number') ?></th>
                        <td><?= $graduate->number ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Release Year') ?></th>
                        <td><?= $this->Html->link($graduate->study_group->year_faculty->release_year->year, ['controller' => 'ReleaseYears', 'action' => 'view', $graduate->study_group->year_faculty->release_year_id]) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Faculty') ?></th>
                        <td><?= $graduate->study_group->year_faculty->faculty->title ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Group') ?></th>
                        <td><?= $this->Html->link($graduate->study_group->title, ['controller' => 'StudyGroups', 'action' => 'view', $graduate->study_group->id]) ?></td>
                    </tr>
                </table>

                <hr/>

                <?php
                echo $this->Form->control('last_name_en');
                echo $this->Form->control('first_name_en');
                ?>
                <hr/>
                <?php
                echo $this->Form->control('last_name_uz');
                echo $this->Form->control('first_name_uz');
                echo $this->Form->control('second_name_uz');
                ?>
                <hr/>
                <?php
                echo $this->Form->control('excellent');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
