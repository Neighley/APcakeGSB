<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichefrai $fichefrai
 */

$identity = $this->getRequest()->getAttribute('identity');
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php if($identity['role_id'] == "superuser" || $identity['role_id'] == "visiteur"){
                echo $this->Html->link(__('Nouvelle Fiche de frais'), ['action' => 'add'], ['class' => 'side-nav-item']); } ?>
            <?php if($identity['role_id'] == "superuser" || $identity['role_id'] == "comptable"){
                echo $this->Html->link(__("Gérer l'état"), ['action' => 'displayetat', $fichefrai->id], ['class' => 'side-nav-item']);
            };
            ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais view content">
            <h3><?php echo "Fiche numéro : " . h($fichefrai->id) ?></h3>
            <table>
                <tr>
                    <?php if($identity['role_id'] == "superuser") { ?>
                        <th><?= __('User') ?></th>
                        <td><?= $fichefrai->has('user') ? $this->Html->link($fichefrai->user->id, ['controller' => 'Users', 'action' => 'view', $fichefrai->user->id]) : '' ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fichefrai->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Année') ?></th>
                    <td><?= $this->Number->format($fichefrai->annee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mois') ?></th>
                    <td><?= $this->Number->format($fichefrai->mois) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montant validé') ?></th>
                    <td><?= $this->Number->format($fichefrai->montantvalide) ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat Id') ?></th>
                    <td><?= $this->Number->format($fichefrai->etat_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Lignes de frais forfaits trouvées :') ?></h4>
                <?php if (!empty($fichefrai->lignefraisforfait)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Label') ?></th>
                            <th><?= __('Quantite', 'Quantité') ?></th>
                            <th><?= __('Fraisforfait Id', 'ID des frais forfait') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fichefrai->lignefraisforfait as $lignefraisforfait) : ?>
                        <tr>
                            <td><?= h($lignefraisforfait->id) ?></td>
                            <td><?= h($lignefraisforfait->label) ?></td>
                            <td><?= h($lignefraisforfait->quantite) ?></td>
                            <td><?= h($lignefraisforfait->fraisforfait_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Lignefraisforfait', 'action' => 'view', $lignefraisforfait->id]) ?>
                                <?= $this->Html->link(__('Modifier'), ['controller' => 'Lignefraisforfait', 'action' => 'edit', $lignefraisforfait->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Lignefraisforfait', 'action' => 'delete', $lignefraisforfait->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraisforfait->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Lignes de frais hors forfait trouvées :') ?></h4>
                <?php if (!empty($fichefrai->lignefraishf)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Montant') ?></th>
                            <th><?= __('Label') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fichefrai->lignefraishf as $lignefraishf) : ?>
                        <tr>
                            <td><?= h($lignefraishf->id) ?></td>
                            <td><?= h($lignefraishf->montant) ?></td>
                            <td><?= h($lignefraishf->label) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Lignefraishf', 'action' => 'view', $lignefraishf->id]) ?>
                                <?= $this->Html->link(__('Modifier'), ['controller' => 'Lignefraishf', 'action' => 'edit', $lignefraishf->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Lignefraishf', 'action' => 'delete', $lignefraishf->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraishf->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
