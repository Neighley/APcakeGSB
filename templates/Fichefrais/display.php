<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichefrai $fichefrai
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraisforfait
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraishf
 */
$identity = $this->getRequest()->getAttribute('identity');

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php if($identity['role_id'] == "visiteur") {
                echo $this->Html->link(__('◂ Retour'), ['action' => 'list'], ['class' => 'side-nav-item']); } ?> 
            
            <?php if($identity['role_id'] == "superuser" || $identity['role_id'] == "comptable"){
                echo $this->Html->link(__('◂ Retour'), ['action' => 'listall'], ['class' => 'side-nav-item']); } ?> 

            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'Supprimer', $fichefrai->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fichefrai->id), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Modifier la fiche de frais') ?></legend>
                <?php
                    echo $this->Form->control('annee');
                    echo $this->Form->control('mois');
                    //echo $this->Form->control('lignefraisforfait._ids', ['options' => $lignefraisforfait]);
                    //echo $this->Form->control('lignefraishf._ids', ['options' => $lignefraishf]);
                ?>
                <br><br>
                <legend><?= __('Editer Lignes frais forfait') ?></legend>
                <?= $this->Html->link(__('Ajouter une ligne'), ['controller' => 'lignefraisforfait', 'action' => 'create', $fichefrai->id], ['class' => 'button float-right']) ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Montant</th>
                            <th>Quantité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

            <?php
                    foreach ($fichefrai->lignefraisforfait as $lignefraisforfait): ?>
                            <tr>
                                <td><?= $this->Number->format($lignefraisforfait->id) ?></td>
                                <td><?= ($lignefraisforfait->fraisforfait->label) ?></td>
                                <td><?= ($lignefraisforfait->fraisforfait->montant) ?></td>
                                <td><?= $this->Number->format($lignefraisforfait->quantite) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Modifier'), ['controller' => 'lignefraisforfait', 'action' => 'modify', $lignefraisforfait->id]) ?>
                                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'lignefraisforfait', 'action' => 'delete', $lignefraisforfait->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraisforfait->id)]) ?>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                    </table>
                    <br>
                    <p>Montant total de toutes les lignes :</p>

                    <?php
                    //$somme = 0;
                    //foreach ($fichefrai->lignefraisforfait as $lignefraisforfait) {
                        //$somme += $lignefraisforfait->fraisforfait->montant * $lignefraisforfait->quantite;
                    //}
                    echo $somme,'€'; ?>

                    <br><br>

                    <legend><?= __('Editer Lignes frais hors forfait') ?></legend>
                    <?= $this->Html->link(__('Ajouter une ligne'), ['controller' => 'lignefraishf', 'action' => 'create', $fichefrai->id], ['class' => 'button float-right']) ?>

                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Montant</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <?php foreach ($fichefrai->lignefraishf as $lignefraishf): ?>
                        <tr>
                            <td><?= $this->Number->format($lignefraishf->id) ?></td>
                            <td><?= ($lignefraishf->label) ?></td>
                            <td><?= $this->Number->format($lignefraishf->montant) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Modifier'), ['controller' => 'lignefraishf', 'action' => 'modify', $lignefraishf->id])
                                 //$this->Html->link(__('Supprimer'), ['controller' => 'lignefraishf', 'action' => 'delete', $lignefraishf->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraishf->id)]) 
                                ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'lignefraishf', 'action' => 'delete', $lignefraishf->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraishf->id)]) ?>
                                <?php //debug($lignefraishf) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                    <br>

                    <p>Montant total de toutes les lignes :</p>

                    <?php
                    //$sommeHF = 0;
                    //foreach ($fichefrai->lignefraishf as $lignefraishf) {
                        //$sommeHF += $lignefraishf->montant;
                    //}
                    echo $sommeHF,'€';
                    ?>

                    <br><br>

                    <p>Montant total des lignes forfait et hors forfait :</p>

                    <?php
                    //$sommeLignes = $somme + $sommeHF;
                    //echo $sommeLignes,'€';
                    //$fichefrai->montantvalide = $sommeLignes;
                    echo $sommeLignes,'€';
                    ?>

            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>