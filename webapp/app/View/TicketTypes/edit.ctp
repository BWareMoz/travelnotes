<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Ticket Types', '/ticketTypes'),
    __('Edit')));?>
<div class="ticketTypes form">

	<div class="page-header">
		<h1><?php echo __('Edit Ticket Type'); ?></h1>
	</div>

<?php echo $this->Form->create('TicketType'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('short_description');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-edit"></i> '.__('Save')); ?>
</div>
