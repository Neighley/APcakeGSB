<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fraisforfait> $fraisforfait
 */
?>
<div class="fraisforfait index content">
    <?= $this->Html->link(__('New Fraisforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fraisforfait') ?></h3>
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
                <?php foreach ($fraisforfait as $fraisforfait): ?>
                <tr>
                    <td><?= $this->Number->format($fraiforfait->id) ?></td>
                    <td><?= $this->Number->format($fraiforfait->montant) ?></td>
                    <td><?= h($fraiforfait->label) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fraiforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fraiforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fraiforfait->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fraiforfait->id)]) ?>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}, montrant {{current}} résultats sur {{count}} au total')) ?></p>
    </div>
</div>
