<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Taxes', '/taxes'),
    __('Edit')));?>
<div class="taxes form">

	<div class="page-header">
		<h1><?php echo __('Edit Tax'); ?></h1>
	</div>

<?php echo $this->Form->create('Tax'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ticket_id');
		echo $this->Form->input('tax_type_id');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-edit"></i> '.__('Save')); ?>
</div>
