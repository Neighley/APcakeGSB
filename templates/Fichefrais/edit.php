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
                ['confirm' => __('Are you sure you want to delete # {0}?', $fichefrai->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fichefrais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Edit Fichefrai') ?></legend>
                <?php
                    echo $this->Form->control('annee');
                    echo $this->Form->control('mois');
                    echo $this->Form->control('montantvalide');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('etat_id');
                    echo $this->Form->control('lignefraisforfait._ids', ['options' => $lignefraisforfait]);
                    echo $this->Form->control('lignefraishf._ids', ['options' => $lignefraishf]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
