<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Tax Types', '/taxTypes'),
    __('View')));?>
<div class="taxTypes form">

	<div class="page-header">
		<h1><?php echo __('Tax Type'); ?></h1>
	</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taxType['TaxType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($taxType['TaxType']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($taxType['TaxType']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Prefixed'); ?></dt>
		<dd>
			<?php echo h($taxType['TaxType']['is_prefixed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Percentage'); ?></dt>
		<dd>
			<?php echo h($taxType['TaxType']['is_percentage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($taxType['TaxType']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

