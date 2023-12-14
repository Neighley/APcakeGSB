<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraisforfait $lignefraisforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lignefraisforfait'), ['action' => 'edit', $lignefraisforfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lignefraisforfait'), ['action' => 'delete', $lignefraisforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraisforfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lignefraisforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lignefraisforfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraisforfait view content">
            <h3><?= h($lignefraisforfait->label) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fraisforfait') ?></th>
                    <td><?= $lignefraisforfait->has('fraisforfait') ? $this->Html->link($lignefraisforfait->fraisforfait->id, ['controller' => 'Fraisforfait', 'action' => 'view', $lignefraisforfait->fraisforfait->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lignefraisforfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantite') ?></th>
                    <td><?= $this->Number->format($lignefraisforfait->quantite) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fichefrais') ?></h4>
                <?php if (!empty($lignefraisforfait->fichefrais)) : ?>
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
                        <?php foreach ($lignefraisforfait->fichefrais as $fichefrais) : ?>
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
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fichefrais', 'action' => 'delete', $fichefrais->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichefrais->id)]) ?>
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
