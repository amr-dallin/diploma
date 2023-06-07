<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faculty $faculty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Faculty'), ['action' => 'edit', $faculty->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Faculty'), ['action' => 'delete', $faculty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faculty->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Faculties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Faculty'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="faculties view content">
            <h3><?= h($faculty->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($faculty->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($faculty->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Title Print En') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($faculty->title_print_en)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Title Print Uz') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($faculty->title_print_uz)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Year Faculties') ?></h4>
                <?php if (!empty($faculty->year_faculties)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Faculty Id') ?></th>
                            <th><?= __('Release Year Id') ?></th>
                            <th><?= __('Faculty Title En') ?></th>
                            <th><?= __('Faculty Title Uz') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($faculty->year_faculties as $yearFaculties) : ?>
                        <tr>
                            <td><?= h($yearFaculties->id) ?></td>
                            <td><?= h($yearFaculties->faculty_id) ?></td>
                            <td><?= h($yearFaculties->release_year_id) ?></td>
                            <td><?= h($yearFaculties->faculty_title_en) ?></td>
                            <td><?= h($yearFaculties->faculty_title_uz) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'YearFaculties', 'action' => 'view', $yearFaculties->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'YearFaculties', 'action' => 'edit', $yearFaculties->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'YearFaculties', 'action' => 'delete', $yearFaculties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $yearFaculties->id)]) ?>
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
