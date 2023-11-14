<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fichefrai> $fichefrais
 */
?>
<div class="fichefrais index content">
    <?= $this->Html->link(__('New Fichefrai'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fichefrais Liste') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('annee') ?></th>
                    <th><?= $this->Paginator->sort('mois') ?></th>
                    <th><?= $this->Paginator->sort('montantvalide') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
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
                    <td><?= $fichefrai->has('user') ? $this->Html->link($fichefrai->user->id, ['controller' => 'Users', 'action' => 'view', $fichefrai->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($fichefrai->etat_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fichefrai->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fichefrai->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fichefrai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichefrai->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
