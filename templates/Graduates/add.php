<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Graduate $graduate
 * @var \Cake\Collection\CollectionInterface|string[] $groups
 */
?>
<div class="row">
    <div class="column-responsive column">
        <div class="graduates form content">
            <?= $this->Form->create($graduate) ?>
            <fieldset>
                <h1><?= __('Add Graduate') ?></h1>
                <table>
                    <tr>
                        <th><?= __('Release Year') ?></th>
                        <td><?= $this->Html->link($studyGroup->year_faculty->release_year->year, ['controller' => 'ReleaseYears', 'action' => 'view', $studyGroup->year_faculty->release_year_id]) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Faculty') ?></th>
                        <td><?= $studyGroup->year_faculty->faculty->title ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Group') ?></th>
                        <td><?= $this->Html->link($studyGroup->title, ['controller' => 'StudyGroups', 'action' => 'view', $studyGroup->id]) ?></td>
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
