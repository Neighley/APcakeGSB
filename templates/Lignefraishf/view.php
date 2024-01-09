<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishf $lignefraishf
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lignefraishf'), ['action' => 'edit', $lignefraishf->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lignefraishf'), ['action' => 'delete', $lignefraishf->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraishf->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lignefraishf'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lignefraishf'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraishf view content">
            <h3><?= h($lignefraishf->label) ?></h3>
            <table>
                <tr>
                    <th><?= __('Label') ?></th>
                    <td><?= h($lignefraishf->label) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lignefraishf->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montant') ?></th>
                    <td><?= $this->Number->format($lignefraishf->montant) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Concernant la fiche de frais') ?></h4>
                <?php if (!empty($lignefraishf->fichefrais)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Annee') ?></th>
                            <th><?= __('Mois') ?></th>
                            <th><?= __('Montantvalide') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Etat Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($lignefraishf->fichefrais as $fichefrais) : ?>
                        <tr>
                            <td><?= h($fichefrais->id) ?></td>
                            <td><?= h($fichefrais->annee) ?></td>
                            <td><?= h($fichefrais->mois) ?></td>
                            <td><?= h($fichefrais->montantvalide) ?></td>
                            <td><?= h($fichefrais->user_id) ?></td>
                            <td><?= h($fichefrais->etat_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fichefrais', 'action' => 'view', $fichefrais->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fichefrais', 'action' => 'edit', $fichefrais->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fichefrais', 'action' => 'delete', $fichefrais->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fichefrais->id)]) ?>
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
