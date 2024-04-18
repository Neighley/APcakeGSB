<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraisforfait $lignefraisforfait
 * @var string[]|\Cake\Collection\CollectionInterface $fraisforfait
 * @var string[]|\Cake\Collection\CollectionInterface $fichefrais
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="lignefraisforfait form content">
            <?= $this->Form->create($lignefraisforfait) ?>
            <fieldset>
                <legend><?= __('Editer Ligne de frais forfait') ?></legend>
                <?php
                    echo $this->Form->control('quantite');
                    //echo $this->Form->control('fraisforfait_id', ['options' => $fraisforfait]);
                    //echo $this->Form->control('fichefrais._ids', ['options' => $fichefrais]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
