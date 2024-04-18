<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fichefrai> $fichefrais
 */

$identity = $this->getRequest()->getAttribute('identity');

?>
<div class="fichefrais index content">
    <?= $this->Html->link(__('Nouveau +'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fiche de frais Utilisateur de '); ?><b><?php echo $identity["username"]; ?></b></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID de la fiche') ?></th>
                    <th><?= $this->Paginator->sort('annee', 'Année') ?></th>
                    <th><?= $this->Paginator->sort('mois') ?></th>
                    <th><?= $this->Paginator->sort('montantvalide', 'Montant Validé') ?></th>
                    <!--<th><?= $this->Paginator->sort('user_id') ?></th>-->
                    <!--<th><?= $this->Paginator->sort('etat_id') ?></th>-->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fichefrais as $fichefrai): ?>
                <tr>
                    <td><?= $this->Number->format($fichefrai->id) ?></td>
                    <td><?= $fichefrai->annee ?></td>
                    <td><?= $this->Number->format($fichefrai->mois) ?></td>
                    <td><?= $this->Number->format($fichefrai->montantvalide) ?></td>
                    <!--<td><?= $fichefrai->has('user') ? $this->Html->link($fichefrai->user->id, ['controller' => 'Users', 'action' => 'view', $fichefrai->user->id]) : '' ?></td>-->
                    <!--<td><?= $fichefrai->has('etat') ? $this->Html->link($fichefrai->etat,['controller'=> 'Etats','actions'=> 'view',$fichefrai->etat]) : '' ?></td>-->
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $fichefrai->id]) ?>
                        <?php // CE QUE JAI CHANGE ATTENTION ?>
                        <?= $this->Html->link(__('Lignes de frais'), ['action' => 'display', $fichefrai->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $fichefrai->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fichefrai->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Premier')) ?>
            <?= $this->Paginator->prev('< ' . __('Précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivant') . ' >') ?>
            <?= $this->Paginator->last(__('Dernier') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, montrant {{current}} résultat(s) sur {{count}} résultats au total')) ?></p>
    </div>
</div>
