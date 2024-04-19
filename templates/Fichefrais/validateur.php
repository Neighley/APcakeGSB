<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichefrai $fichefrai
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraisforfait
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraishf
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fichefrai->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fichefrai->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fichefrais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Choisir le validateur de la fiche') ?></legend>
                <?php
                    echo $this->Form->control('validateur_id', ['options' => $nom_validateur], ['label'=>__('validateur')]);
                ?>
                <?php debug($nom_validateur); ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
