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
                    //echo $this->Form->control('lignefraisforfait._ids', ['options' => $lignefraisforfait]);
                    //echo $this->Form->control('lignefraishf._ids', ['options' => $lignefraishf]);
                ?>

                <legend><?= __('Editer Lignes frais forfait') ?></legend>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Montant</th>
                            <th>Quantité</th>
                            <th>Action</th>
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
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $lignefraisforfait->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignefraisforfait->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignefraisforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraisforfait->id)]) ?>
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

                    <legend><?= __('Editer Lignes frais hors forfait') ?></legend>
 

                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php //A REVOIR ?>
                        <?php foreach ($fichefrai->lignefraishf as $lignefraishf): ?>

                        <tr>
                            <td><?= $this->Number->format($lignefraishf->id) ?></td>
                            <td><?= ($lignefraishf->label) ?></td>
                            <td><?= $this->Number->format($lignefraishf->montant) ?></td>
                            <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $lignefraishf->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignefraishf->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignefraishf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraisforfait->id)]) ?>
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
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
