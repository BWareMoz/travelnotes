<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Groups', '/groups'),
    __('Add')));?>
<div class="groups form">

	<div class="page-header">
		<h1><?php echo __('Add Group'); ?></h1>
	</div>

<?php echo $this->Form->create('Group'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-plus"></i> '.__('Add')); ?>
</div>
