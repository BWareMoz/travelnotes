<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Trip Types', '/tripTypes'),
    __('Add')));?>
<div class="tripTypes form">

	<div class="page-header">
		<h1><?php echo __('Add Trip Type'); ?></h1>
	</div>

<?php echo $this->Form->create('TripType'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('short_description');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-plus"></i> '.__('Add')); ?>
</div>
