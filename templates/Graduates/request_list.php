<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Graduate $graduate
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="graduates form content">
            <h3><?= __('Generating diplomas by graduate numbers') ?></h3>
            
            <?= $this->Form->create(null, ['method' => 'GET']) ?>
            <fieldset>
                <?php
                echo $this->Form->control('list', [
                    'type' => 'textarea',
                    'label' => false,
                    'value' => $this->request->getQuery('list')
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>

        <?php if ( null !== $this->request->getQuery('list') ): ?>
        <br/>
        <iframe
            src="<?= $this->Url->build(['controller' => 'Graduates', 'action' => 'listGenerate', '?' => ['list' => $this->request->getQuery('list')], '_ext' => 'pdf']) ?>"
            width="100%"
            height="700"
        >
        </iframe>
        <?php endif; ?>

    </div>
</div>
