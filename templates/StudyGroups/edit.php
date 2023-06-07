<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudyGroup $studyGroup
 * @var string[]|\Cake\Collection\CollectionInterface $yearFaculties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studyGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studyGroup->id), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studyGroups form content">
            <?= $this->Form->create($studyGroup) ?>
            <fieldset>
                <h1><?= __('Edit Study Group') ?></h1>

                <table>
                    <tr>
                        <th><?= __('Release Year') ?></th>
                        <td><?= $this->Html->link($studyGroup->year_faculty->release_year->year, ['controller' => 'ReleaseYears', 'action' => 'view', $studyGroup->year_faculty->release_year_id]) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Faculty') ?></th>
                        <td><?= $studyGroup->year_faculty->faculty->title ?></td>
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
