<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudyGroup $studyGroup
 * @var \Cake\Collection\CollectionInterface|string[] $yearFaculties
 */
?>
<div class="row">
    <div class="column-responsive column">
        <div class="studyGroups form content">
            <?= $this->Form->create($studyGroup) ?>
            <fieldset>
                <h1><?= __('Add Study Group') ?></h1>

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

                <?= $this->Form->control('title') ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
