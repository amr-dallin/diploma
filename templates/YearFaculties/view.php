<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YearFaculty $yearFaculty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Year Faculty'), ['action' => 'edit', $yearFaculty->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Year Faculty'), ['action' => 'delete', $yearFaculty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yearFaculty->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Year Faculties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Year Faculty'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="yearFaculties view content">
            <h3><?= h($yearFaculty->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Faculty') ?></th>
                    <td><?= $yearFaculty->has('faculty') ? $this->Html->link($yearFaculty->faculty->title, ['controller' => 'Faculties', 'action' => 'view', $yearFaculty->faculty->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Release Year') ?></th>
                    <td><?= $yearFaculty->has('release_year') ? $this->Html->link($yearFaculty->release_year->id, ['controller' => 'ReleaseYears', 'action' => 'view', $yearFaculty->release_year->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($yearFaculty->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Faculty Title En') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($yearFaculty->faculty_title_en)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Faculty Title Uz') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($yearFaculty->faculty_title_uz)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Groups') ?></h4>
                <?php if (!empty($yearFaculty->groups)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Year Faculty Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Verified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($yearFaculty->groups as $groups) : ?>
                        <tr>
                            <td><?= h($groups->id) ?></td>
                            <td><?= h($groups->year_faculty_id) ?></td>
                            <td><?= h($groups->title) ?></td>
                            <td><?= h($groups->verified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
