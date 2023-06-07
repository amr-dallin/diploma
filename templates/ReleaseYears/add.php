<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReleaseYear $releaseYear
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Release Years'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="releaseYears form content">
            <?= $this->Form->create($releaseYear) ?>
            <fieldset>
                <h1><?= __('Add Release Year') ?></h1>
                <?php
                    echo $this->Form->control('year');
                    echo $this->Form->control('date_en');
                    echo $this->Form->control('date_uz');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
