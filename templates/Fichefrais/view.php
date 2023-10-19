<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fichefrai $fichefrai
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fichefrai'), ['action' => 'edit', $fichefrai->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fichefrai'), ['action' => 'delete', $fichefrai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichefrai->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fichefrais'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fichefrai'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fichefrais view content">
            <h3><?= h($fichefrai->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $fichefrai->has('user') ? $this->Html->link($fichefrai->user->id, ['controller' => 'Users', 'action' => 'view', $fichefrai->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fichefrai->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Annee') ?></th>
                    <td><?= $this->Number->format($fichefrai->annee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mois') ?></th>
                    <td><?= $this->Number->format($fichefrai->mois) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montantvalide') ?></th>
                    <td><?= $this->Number->format($fichefrai->montantvalide) ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat Id') ?></th>
                    <td><?= $this->Number->format($fichefrai->etat_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Lignefraisforfait') ?></h4>
                <?php if (!empty($fichefrai->lignefraisforfait)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Label') ?></th>
                            <th><?= __('Quantite') ?></th>
                            <th><?= __('Fraisforfait Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fichefrai->lignefraisforfait as $lignefraisforfait) : ?>
                        <tr>
                            <td><?= h($lignefraisforfait->id) ?></td>
                            <td><?= h($lignefraisforfait->label) ?></td>
                            <td><?= h($lignefraisforfait->quantite) ?></td>
                            <td><?= h($lignefraisforfait->fraisforfait_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Lignefraisforfait', 'action' => 'view', $lignefraisforfait->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Lignefraisforfait', 'action' => 'edit', $lignefraisforfait->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lignefraisforfait', 'action' => 'delete', $lignefraisforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraisforfait->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Lignefraishf') ?></h4>
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
                                <?= $this->Html->link(__('View'), ['controller' => 'Lignefraishf', 'action' => 'view', $lignefraishf->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Lignefraishf', 'action' => 'edit', $lignefraishf->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lignefraishf', 'action' => 'delete', $lignefraishf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraishf->id)]) ?>
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
