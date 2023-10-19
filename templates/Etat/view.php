<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etat $etat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Etat'), ['action' => 'edit', $etat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Etat'), ['action' => 'delete', $etat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Etat'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Etat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="etat view content">
            <h3><?= h($etat->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= h($etat->etat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fichefrai') ?></th>
                    <td><?= $etat->has('fichefrai') ? $this->Html->link($etat->fichefrai->id, ['controller' => 'Fichefrais', 'action' => 'view', $etat->fichefrai->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($etat->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
