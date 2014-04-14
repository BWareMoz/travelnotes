<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Clients', '/clients'),
    __('Add')));?>
<div class="clients form">

	<div class="page-header">
		<h1><?php echo __('Add Client'); ?></h1>
	</div>

<?php echo $this->Form->create('Client'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('contact');
		echo $this->Form->input('address');
		echo $this->Form->input('client_number');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-plus"></i> '.__('Add')); ?>
</div>
