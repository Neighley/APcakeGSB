<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lignefraishf> $lignefraishf
 */
?>
<div class="lignefraishf index content">
    <?= $this->Html->link(__('New Lignefraishf'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lignefraishf') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('montant') ?></th>
                    <th><?= $this->Paginator->sort('label') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lignefraishf as $lignefraishf): ?>
                <tr>
                    <td><?= $this->Number->format($lignefraihf->id) ?></td>
                    <td><?= $this->Number->format($lignefraihf->montant) ?>€</td>
                    <td><?= h($lignefraihf->label) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lignefraihf->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignefraihf->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignefraihf->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraihf->id)]) ?>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, montrant {{current}} résultat(s) sur {{count}} au total')) ?></p>
    </div>
</div>
