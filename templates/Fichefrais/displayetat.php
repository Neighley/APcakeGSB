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
                ['action' => 'Supprimer', $fichefrai->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fichefrai->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Liste des fiches de frais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais form content">
            <?= $this->Form->create($fichefrai) ?>
            <fieldset>
                <legend><?= __('Lignes frais forfait') ?></legend>
                <a href = "http://localhost:8765/lignefraisforfait/create/<?php echo $fichefrai->id ?> " class = "button float-right">Ajouter une ligne</a>

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
                                    <a href = "http://localhost:8765/lignefraisforfait/modify/<?php echo $lignefraisforfait->id ?>">Modifier</a>
                                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $lignefraisforfait->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraisforfait->id)]) ?>
                                </td>
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
                    <a href = "http://localhost:8765/lignefraishf/create/<?php echo $fichefrai->id ?> " class = "button float-right">Ajouter une ligne</a>

                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <?php foreach ($fichefrai->lignefraishf as $lignefraishf): ?>
                        <tr>
                            <td><?= $this->Number->format($lignefraishf->id) ?></td>
                            <td><?= ($lignefraishf->label) ?></td>
                            <td><?= $this->Number->format($lignefraishf->montant) ?></td>
                            <td class="actions">
                                    <a href = "http://localhost:8765/lignefraishf/modify/<?php echo $lignefraishf->id ?>">Modifier</a>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'Supprimer', $lignefraishf->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraisforfait->id)]) ?>
                            </td>
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