<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraisforfait $lignefraisforfait
 * @var \Cake\Collection\CollectionInterface|string[] $fraisforfait
 * @var \Cake\Collection\CollectionInterface|string[] $fichefrais
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Lignefraisforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraisforfait form content">
            <?= $this->Form->create($lignefraisforfait) ?>
            <fieldset>
                <legend><?= __('Ajouter Ligne de frais forfait') ?></legend>
                <?php
                    echo $this->Form->control('quantite');
                    echo $this->Form->control('fraisforfait_id', ['options' => $fraisforfait]);
                    echo $this->Form->control('fichefrais._ids', ['options' => $fichefrais]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
