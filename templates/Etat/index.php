<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Etat> $etat
 */
?>
<div class="etat index content">
    <?= $this->Html->link(__('New Etat'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Etat') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('etat') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etat as $etat): ?>
                <tr>
                    <td><?= $this->Number->format($etat->id) ?></td>
                    <td><?= h($etat->etat) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $etat->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $etat->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $etat->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $etat->id)]) ?>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, montrant {{current}} record(s) sur {{count}} total')) ?></p>
    </div>
</div>
