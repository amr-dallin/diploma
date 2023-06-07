<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudyGroup $studyGroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Study Group'), ['action' => 'edit', $studyGroup->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Study Group'), ['action' => 'delete', $studyGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studyGroup->id), 'class' => 'side-nav-item']) ?>

            <hr/>
            <?= $this->Html->link(__('Add graduate'), ['controller' => 'Graduates', 'action' => 'add', $studyGroup->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studyGroups view content">
            <h1><?= h($studyGroup->title) ?></h1>
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
                    <th><?= __('Verified') ?></th>
                    <td>
                        <?php
                        echo $this->Form->postLink(
                            ($studyGroup->verified ? __('Yes') : __('No')),
                            ['controller' => 'StudyGroups', 'action' => 'verified', $studyGroup->id],
                            ['confirm' => __('Are you sure you want to verified # {0}?', $studyGroup->id)]
                        );
                        ?>
                    </td>
                </tr>
            </table>

            <hr/>

            <div class="related">
                <?php if (!empty($studyGroup->graduates)) : ?>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= __('Number') ?></th>
                                <th><?= __('Full Name En') ?></th>
                                <th><?= __('Full Name Uz') ?></th>
                                <th style="text-align: center;"><?= __('Excellent') ?></th>
                                <th style="text-align: center;"><?= __('Verified') ?></th>
                                <th style="text-align: right;"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <?php foreach ($studyGroup->graduates as $graduates) : ?>
                            <tbody>
                            <tr>
                                <td style="text-align: center;"><?= h($graduates->number) ?></td>
                                <td><?= h($graduates->full_name_en) ?></td>
                                <td><?= h($graduates->full_name_uz) ?></td>
                                <td style="text-align: center;"><?= $graduates->excellent ? __('Yes') : '' ?></td>
                                <td style="text-align: center;">
                                    <?php
                                    echo $this->Form->postLink(
                                        ($graduates->verified ? __('Yes') : __('No')),
                                        ['controller' => 'Graduates', 'action' => 'verified', $graduates->id],
                                        ['confirm' => __('Are you sure you want to verified # {0}?', $graduates->id)]
                                    );
                                    ?>
                                </td>
                                <td class="actions" style="text-align: right; font-size: 12px;">
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Graduates', 'action' => 'edit', $graduates->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Graduates', 'action' => 'delete', $graduates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $graduates->id)]) ?>
                                </td>
                            </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
