<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishf $lignefraishf
 * @var string[]|\Cake\Collection\CollectionInterface $fichefrais
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lignefraishf->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraishf->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Lignefraishf'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraishf form content">
            <?= $this->Form->create($lignefraishf) ?>
            <fieldset>
                <legend><?= __('Edit Lignefraishf') ?></legend>
                <?php
                    echo $this->Form->control('label');
                    echo $this->Form->control('montant');
                ?>
            </fieldset>
            <?php //à revoir ça marche pas ?>
            <?= $this->Form->button(__('Submit'), ['url' => ['controller' => 'fichefrais', 'action' => 'display->id']]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
