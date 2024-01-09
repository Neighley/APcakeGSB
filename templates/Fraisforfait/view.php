<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fraisforfait $fraisforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fraisforfait'), ['action' => 'edit', $fraisforfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fraisforfait'), ['action' => 'delete', $fraisforfait->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer # {0}?', $fraisforfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fraisforfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fraisforfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fraisforfait view content">
            <h3><?= h($fraisforfait->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Label') ?></th>
                    <td><?= h($fraisforfait->label) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lignefraisforfait') ?></th>
                    <td><?= $fraisforfait->has('lignefraisforfait') ? $this->Html->link($fraisforfait->lignefraisforfait->label, ['controller' => 'Lignefraisforfait', 'action' => 'view', $fraisforfait->lignefraisforfait->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fraisforfait->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montant') ?></th>
                    <td><?= $this->Number->format($fraisforfait->montant) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
