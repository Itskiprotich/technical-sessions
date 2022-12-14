<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sadr'), ['action' => 'edit', $sadr->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sadr'), ['action' => 'delete', $sadr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadr->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sadrs view large-9 medium-8 columns content">
    <h3><?= h($sadr->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($sadr->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sadr->has('user') ? $this->Html->link($sadr->user->id, ['controller' => 'Users', 'action' => 'view', $sadr->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Reported') ?></th>
            <td><?= h($sadr->date_reported) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sadr->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sadr->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sadr->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($sadr->description)); ?>
    </div>
</div>
