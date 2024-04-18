<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichefrai $fichefrai
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraisforfait
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraishf
 * @var string[]|\Cake\Collection\CollectionInterface $etat

 */
$identity = $this->getRequest()->getAttribute('identity');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php echo $this->Html->link(__('◂ Retour'), ['action' => 'listall'], ['class' => 'side-nav-item']); ?> 
            <?php if($identity['role_id'] == 'superuser') {
            echo $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fichefrai->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fichefrai->id), 'class' => 'side-nav-item']

            );
            } ?>
            <?= $this->Html->link(__('List Fichefrais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Editer Fiche de frais') ?></legend>
                <?php
                    echo $this->Form->control('annee', ['label'=>__('annee')]);
                    echo $this->Form->control('mois', ['label'=>__('mois')]);
                    echo $this->Form->control('montantvalide', ['label'=>__('montantvalide')]);
                    //echo $this->Form->control('user_id', ['options' => $users], ['label'=>__('user')]);
                    echo $this->Form->control('etat_id', ['options' => $etat], ['label'=>__('etat')]);
                    //echo $this->Form->control('lignefraisforfait._ids', ['options' => $lignefraisforfait]);
                    //echo $this->Form->control('lignefraishf._ids', ['options' => $lignefraishf]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
