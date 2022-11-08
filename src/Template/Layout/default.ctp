<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Technical Working Session';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap_limitless.css') ?>
	<!-- Point to css file icomoon/styles.min.css -->
    
	<?= $this->Html->css('bootstrap.min.css') ?>
	<?= $this->Html->css('bootstrap_limitless.min.css') ?>
	<?= $this->Html->css('layout.min.css') ?>
	<?= $this->Html->css('components.min.css') ?>
	<?= $this->Html->css('colors.min.css') ?>

	<!-- Core JS files -->
	<?= $this->Html->script('global_assets/js/main/jquery.min.js') ?>
	<?= $this->Html->script('global_assets/js/main/bootstrap.bundle.min.js') ?>
	<?= $this->Html->script('global_assets/js/plugins/loaders/blockui.min.js') ?>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<?= $this->Html->script('global_assets/js/plugins/visualization/d3/d3.min.js') ?>
	<?= $this->Html->script('global_assets/js/plugins/visualization/d3/d3_tooltip.js') ?>
	<?= $this->Html->script('global_assets/js/plugins/forms/styling/switchery.min.js') ?>
	<?= $this->Html->script('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') ?>
	<?= $this->Html->script('global_assets/js/plugins/ui/moment/moment.min.js') ?>
	<?= $this->Html->script('global_assets/js/plugins/pickers/daterangepicker.js') ?>

	<?= $this->Html->script('js/app.js') ?>
	<?= $this->Html->script('global_assets/js/demo_pages/dashboard.js') ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="/login">Login</a></li>
                <li><a target="_blank" href="/register">REgister</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
