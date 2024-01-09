<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fraisforfait $fraisforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fraisforfait->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fraisforfait->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fraisforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fraisforfait form content">
            <?= $this->Form->create($fraisforfait) ?>
            <fieldset>
                <legend><?= __('Edit Fraisforfait') ?></legend>
                <?php
                    echo $this->Form->control('montant');
                    echo $this->Form->control('label');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
