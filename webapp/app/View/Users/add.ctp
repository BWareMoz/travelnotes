<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Users', '/users'),
    __('Add')));?>
<div class="users form">

	<div class="page-header">
		<h1><?php echo __('Add User'); ?></h1>
	</div>

<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('group_id');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-plus"></i> '.__('Add')); ?>
</div>
