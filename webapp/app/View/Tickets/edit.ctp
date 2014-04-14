<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Tickets', '/tickets'),
    __('Edit')));?>
<div class="tickets form">

	<div class="page-header">
		<h1><?php echo __('Edit Ticket'); ?></h1>
	</div>

<?php echo $this->Form->create('Ticket'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ticket_number');
		echo $this->Form->input('reservation_number');
		echo $this->Form->input('trip_date');
		echo $this->Form->input('client_id');
		echo $this->Form->input('issue_date');
		echo $this->Form->input('seller');
		echo $this->Form->input('route');
		echo $this->Form->input('trip_type_id');
		echo $this->Form->input('ticket_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end('<i class="icon-edit"></i> '.__('Save')); ?>
</div>
