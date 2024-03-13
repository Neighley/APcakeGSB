<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishf $lignefraishf
 * @var \Cake\Collection\CollectionInterface|string[] $fichefrais
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="lignefraishf form content">
            <?= $this->Form->create($lignefraishf) ?>
            <fieldset>
                <legend><?= __('Créer Ligne de frais hors forfait') ?></legend>
                <?php
                    echo $this->Form->control('montant');
                    echo $this->Form->control('label');
                    echo $this->Form->control('fichefrais._ids', ['options' => $fichefrais]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
