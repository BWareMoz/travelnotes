<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Clients', '/clients'),
    __('View')));?>
<div class="clients form">

	<div class="page-header">
		<h1><?php echo __('Client'); ?></h1>
	</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($client['Client']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($client['Client']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Number'); ?></dt>
		<dd>
			<?php echo h($client['Client']['client_number']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

