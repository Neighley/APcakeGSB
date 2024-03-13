<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichefrai $fichefrai
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $lignefraisforfait
 * @var \Cake\Collection\CollectionInterface|string[] $lignefraishf
 */
$identity = $this->getRequest()->getAttribute('identity');
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Créer une nouvelle fiche de frais') ?></legend>
                <?php
                    echo $this->Form->control('annee', ['label'=>__('Année')]);
                    echo $this->Form->control('mois', ['label'=>__('Mois')]);
                    echo $this->Form->control('montantvalide', ['label'=>__('Montant'), 'readonly' => true]);
                    if($identity['role_id'] == "visiteur"){
                    echo 'Utilisateur actuel : ';
                    echo $identity['username'];
                    }
                    if($identity['role_id'] == "superuser" || $identity['role_id'] == "comptable"){
                        echo $this->Form->control('Utilisateur', ['options' => $users]);
                    }
                    if($identity['role_id'] == "superuser"){
                        echo $this->Form->control('Etat de la fiche', ['options' => $etats]);
                        echo "Les lignes forfaitaires et non forfaitaires seront ajoutables à cette fiche dans l'option 'Gérer l'état' ";
                    } 
                    echo "<br><br>";
                    if($identity['role_id'] == "visiteur"){
                        echo "Les lignes forfaitaires et non forfaitaires seront ajoutables à cette fiche dans l'option 'Gérer l'état' ";
                    }
                    //echo $this->Form->control('lignefraisforfait._ids', ['options' => $lignefraisforfait]);
                    //echo $this->Form->control('lignefraishf._ids', ['options' => $lignefraishf]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
