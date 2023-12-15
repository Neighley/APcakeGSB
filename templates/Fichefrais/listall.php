<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fichefrai> $fichefrais
 */

$identity = $this->getRequest()->getAttribute('identity');

?>
<div class="fichefrais index content">
    <?= $this->Html->link(__('Nouveau +'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Toutes les Fiches de frais des utilisateurs :'); ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID de la fiche') ?></th>
                    <th><?= $this->Paginator->sort('annee', 'Année') ?></th>
                    <th><?= $this->Paginator->sort('mois') ?></th>
                    <th><?= $this->Paginator->sort('montantvalide', 'Montant Validé') ?></th>
                    <!--<th><?= $this->Paginator->sort('user_id') ?></th>-->
                    <th><?= $this->Paginator->sort('etat_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fichefrais as $fichefrai): ?>
                <tr>
                    <td><?= $this->Number->format($fichefrai->id) ?></td>
                    <td><?= $this->Number->format($fichefrai->annee) ?></td>
                    <td><?= $this->Number->format($fichefrai->mois) ?></td>
                    <td><?= $this->Number->format($fichefrai->montantvalide) ?></td>
                    <!--<td><?= $fichefrai->has('user') ? $this->Html->link($fichefrai->user->id, ['controller' => 'Users', 'action' => 'view', $fichefrai->user->id]) : '' ?></td>-->
                    <td><?= $fichefrai->has('etat_id') ? $this->Html->link($fichefrai->etat_id,['controller'=> 'Etats','actions'=> 'view',$fichefrai->etat_id]) : '' ?>
                    <?php /*if($fichefrai->etat_id == 1){
                        echo "- créée";
                    }
                    if($fichefrai->etat_id == 2){
                        echo "- clôturée";
                    }
                    if($fichefrai->etat_id == 3){
                        echo "- validée";
                    }
                    if($fichefrai->etat_id == 4){
                        echo "- mise en paiement";
                    }
                    if($fichefrai->etat_id == 5){
                        echo "- remboursée";
                    }*/
                    echo " - ".$fichefrai->etat->etat;
                    ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $fichefrai->id]) ?>
                        <?php // CE QUE JAI CHANGE ATTENTION ?>
                        <?= $this->Html->link(__("Gérer l'état"), ['action' => 'displayetat', $fichefrai->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('prochain') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, montrant {{current}} résultat(s) sur {{count}} résultats au total')) ?></p>
    </div>
</div>
