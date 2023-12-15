<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichefrai $fichefrai
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $lignefraisforfait
 * @var \Cake\Collection\CollectionInterface|string[] $lignefraishf
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Liste fiches de frais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Créer une nouvelle fiche de frais') ?></legend>
                <?php
                    echo $this->Form->control('Année');
                    echo $this->Form->control('mois');
                    echo $this->Form->control('Montant validé');
                    echo $this->Form->control('Utilisateur', ['options' => $users]);
                    echo $this->Form->control('Etat de la fiche', ['options' => $etats]);
                    //echo $this->Form->control('lignefraisforfait._ids', ['options' => $lignefraisforfait]);
                    //echo $this->Form->control('lignefraishf._ids', ['options' => $lignefraishf]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
