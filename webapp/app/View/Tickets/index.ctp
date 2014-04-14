<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
   __('Tickets')));?><div class="tickets index">
	<div class="page-header">
		<h1><?php echo __('Tickets'); ?></h1>
	</div>
	<table class="table table-striped table-bordered" id="list">
	<thead>
			<th><?php echo Inflector::humanize('id'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('ticket_number'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('reservation_number'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('trip_date'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize(Inflector::underscore('Client')); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('issue_date'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('seller'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('route'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize(Inflector::underscore('TripType')); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize(Inflector::underscore('TicketType')); ?>&nbsp;</th>
		<th><?php echo __('Actions'); ?></th>
	</thead>
	<tbody>
	<?php
	foreach ($tickets as $ticket): ?>
	<tr>
		<td><?php echo h($ticket['Ticket']['id']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['ticket_number']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['reservation_number']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['trip_date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ticket['Client']['name'], array('controller' => 'clients', 'action' => 'view', $ticket['Client']['id'])); ?>
		</td>
		<td><?php echo h($ticket['Ticket']['issue_date']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['seller']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['route']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ticket['TripType']['id'], array('controller' => 'trip_types', 'action' => 'view', $ticket['TripType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticket['TicketType']['id'], array('controller' => 'ticket_types', 'action' => 'view', $ticket['TicketType']['id'])); ?>
		</td>
		<td class="actions">
			<div class="btn-group">
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('View'); ?>" href="<?php echo $this->Html->url(array('action' => 'view', $ticket['Ticket']['id'])); ?>"><i class="icon-eye-open"></i></a>
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>" href="<?php echo $this->Html->url(array('action' => 'edit', $ticket['Ticket']['id'])); ?>"><i class="icon-edit"></i></a>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $ticket['Ticket']['id']), array('class' => 'btn-small', 'rel'=>'tooltip', 'data-original-title'=>__('Delete'), 'escape' => false), __('Are you sure you want to delete # %s?', $ticket['Ticket']['id']));?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<br/>
	<a href='tickets/add' class='btn'><i class='icon-plus'></i> <?php echo __('Add Ticket'); ?></a>	<br/><br/>
</div>
