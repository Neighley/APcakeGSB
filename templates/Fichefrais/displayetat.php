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

            <?php if($identity['role_id'] == "superuser") {
                echo $this->Form->postLink(
                __('Delete'),
                ['action' => 'Supprimer', $fichefrai->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fichefrai->id), 'class' => 'side-nav-item']
                ); } ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Lignes frais forfait') ?></legend>
                <?php if($identity['role_id'] == "superuser" || $identity['role_id'] == "visiteur"){ ?>
                <?= $this->Html->link(__('Ajouter une ligne'), ['controller' => 'lignefraisforfait', 'action' => 'create', $fichefrai->id], ['class' => 'button float-right']) ?>
                <?php } ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Montant</th>
                            <th>Quantité</th>
                            <?php if($identity['role_id'] == "superuser" || $identity['role_id'] == "visiteur"){ ?>
                                <th>Actions</th>
                            <?php } ?>
                        </tr>
                    </thead>
            <?php
                    foreach ($fichefrai->lignefraisforfait as $lignefraisforfait): ?>
                            <tr>
                                <td><?= $this->Number->format($lignefraisforfait->id) ?></td>
                                <td><?= ($lignefraisforfait->fraisforfait->label) ?></td>
                                <td><?= ($lignefraisforfait->fraisforfait->montant) ?></td>
                                <td><?= $this->Number->format($lignefraisforfait->quantite) ?></td>
                                <?php if($identity['role_id'] == "superuser" || $identity['role_id'] == "visiteur"){ ?>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Modifier'), ['controller' => 'lignefraisforfait', 'action' => 'modify', $lignefraisforfait->id]) ?>
                                        <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'lignefraisforfait', 'action' => 'delete', $lignefraisforfait->id, $fichefrai->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraisforfait->id)]) ?>
                                    </td>
                                <?php } ?>
                            </tr>
                    <?php endforeach; ?>
                    </table>
                    <br>
                    <p>Montant total de toutes les lignes :</p>

                    <?php
                    $somme = 0;
                    foreach ($fichefrai->lignefraisforfait as $lignefraisforfait) {
                        $somme += $lignefraisforfait->fraisforfait->montant * $lignefraisforfait->quantite;
                    }
                    echo $somme,'€'; ?>

                    <br><br>

                    <legend><?= __('Lignes frais hors forfait') ?></legend>
                    <?php if($identity['role_id'] == "superuser" || $identity['role_id'] == "visiteur"){ ?>
                    <?= $this->Html->link(__('Ajouter une ligne'), ['controller' => 'lignefraishf', 'action' => 'create', $fichefrai->id], ['class' => 'button float-right']) ?>
                    <?php } ?>
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Montant</th>
                            <th>Label</th>
                        </tr>
                        </thead>

                        <?php foreach ($fichefrai->lignefraishf as $lignefraishf): ?>
                        <tr>
                            <td><?= $this->Number->format($lignefraishf->id) ?></td>
                            <td><?= $this->Number->format($lignefraishf->montant) ?></td>
                            <td><?= ($lignefraishf->label) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                    <br>

                    <p>Montant total de toutes les lignes :</p>

                    <?php
                    $sommeHF = 0;
                    foreach ($fichefrai->lignefraishf as $lignefraishf) {
                        $sommeHF += $lignefraishf->montant;
                    }
                    echo $sommeHF,'€';
                    ?>

                    <br><br>

                    <p>Montant total des lignes forfait et hors forfait :</p>

                    <?php
                    $sommeLignes = $somme + $sommeHF;
                    echo $sommeLignes,'€';
                    ?>

            </fieldset>
            <div class = "boutoncloturer">
            <?= $this->Html->link('Clôturer la fiche', ['action' => 'closeFiche', $fichefrai->id], ['class' => 'grosbouton', 'confirm' => 'Êtes-vous sûr de vouloir clôturer cette fiche?']) ?>
            </div>
            <div class = "boutonvalider">
            <?= $this->Html->link('Valider la fiche', ['action' => 'validateFiche', $fichefrai->id], ['class' => 'grosbouton','confirm' => 'Êtes-vous sûr de vouloir valider cette fiche?']) ?>
            </div>
            <?= $this->Form->end() ?>
            <br> <br> <br>
        </div>
    </div>
</div>