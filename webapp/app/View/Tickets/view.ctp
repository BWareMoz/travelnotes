<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Tickets', '/tickets'),
    __('View')));?>
<div class="tickets form">

	<div class="page-header">
		<h1><?php echo __('Ticket'); ?></h1>
	</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ticket Number'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['ticket_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reservation Number'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['reservation_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trip Date'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['trip_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ticket['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Issue Date'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['issue_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seller'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['seller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['route']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trip Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['TripType']['id'], array('controller' => 'trip_types', 'action' => 'view', $ticket['TripType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ticket Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['TicketType']['id'], array('controller' => 'ticket_types', 'action' => 'view', $ticket['TicketType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

