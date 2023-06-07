<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\YearFaculty $yearFaculty
 * @var \Cake\Collection\CollectionInterface|string[] $faculties
 * @var \Cake\Collection\CollectionInterface|string[] $releaseYears
 */
?>
<div class="row">
    <div class="column-responsive column">
        <div class="yearFaculties form content">
            <?= $this->Form->create($yearFaculty) ?>
            <fieldset>
                <h1><?= __('Add Year Faculty') ?></h1>

                <table>
                    <tr>
                        <th><?= __('Release Year') ?></th>
                        <td><?= $this->Html->link($releaseYear->year, ['controller' => 'ReleaseYears', 'action' => 'view', $releaseYear->id]) ?></td>
                    </tr>
                </table>

                <hr/>

                <?php
                    echo $this->Form->control('faculty_id', ['options' => $faculties]);
                    echo $this->Form->control('faculty_title_en');
                    echo $this->Form->control('faculty_title_uz');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
