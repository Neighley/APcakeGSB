<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lignefraisforfait> $lignefraisforfait
 */
?>
<div class="lignefraisforfait index content">
    <?= $this->Html->link(__('New Lignefraisforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lignefraisforfait') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('quantite') ?></th>
                    <th><?= $this->Paginator->sort('fraisforfait_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lignefraisforfait as $lignefraisforfait): ?>
                <tr>
                    <td><?= $this->Number->format($lignefraiforfait->id) ?></td>
                    <td><?= $this->Number->format($lignefraiforfait->quantite) ?></td>
                    <td><?= $lignefraiforfait->has('fraisforfait') ? $this->Html->link($lignefraiforfait->fraisforfait->id, ['controller' => 'Fraisforfait', 'action' => 'view', $lignefraiforfait->fraisforfait->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lignefraiforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignefraiforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignefraiforfait->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $lignefraiforfait->id)]) ?>
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
