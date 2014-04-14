<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Tax Types', '/taxTypes'),
    __('Add')));?>
<div class="taxTypes form">

	<div class="page-header">
		<h1><?php echo __('Add Tax Type'); ?></h1>
	</div>

<?php echo $this->Form->create('TaxType'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('code');
		echo $this->Form->input('is_prefixed');
		echo $this->Form->input('is_percentage');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-plus"></i> '.__('Add')); ?>
</div>
