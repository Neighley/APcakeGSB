<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishf $lignefraishf
 * @var string[]|\Cake\Collection\CollectionInterface $fichefrais
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="lignefraishf form content">
            <?= $this->Form->create($lignefraishf) ?>
            <fieldset>
                <legend><?= __('Editer Ligne de frais hors forfait') ?></legend>
                <?php
                    echo $this->Form->control('label');
                    echo $this->Form->control('montant');
                ?>
            </fieldset>
            <?php //à revoir ça marche pas ?>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
