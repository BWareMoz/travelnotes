<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Taxes', '/taxes'),
    __('View')));?>
<div class="taxes form">

	<div class="page-header">
		<h1><?php echo __('Tax'); ?></h1>
	</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ticket'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tax['Ticket']['id'], array('controller' => 'tickets', 'action' => 'view', $tax['Ticket']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tax['TaxType']['id'], array('controller' => 'tax_types', 'action' => 'view', $tax['TaxType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

