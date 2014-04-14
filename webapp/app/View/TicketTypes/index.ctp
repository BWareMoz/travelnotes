<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
   __('Ticket Types')));?><div class="ticketTypes index">
	<div class="page-header">
		<h1><?php echo __('Ticket Types'); ?></h1>
	</div>
	<table class="table table-striped table-bordered" id="list">
	<thead>
			<th><?php echo Inflector::humanize('id'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('description'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('short_description'); ?>&nbsp;</th>
		<th><?php echo __('Actions'); ?></th>
	</thead>
	<tbody>
	<?php
	foreach ($ticketTypes as $ticketType): ?>
	<tr>
		<td><?php echo h($ticketType['TicketType']['id']); ?>&nbsp;</td>
		<td><?php echo h($ticketType['TicketType']['description']); ?>&nbsp;</td>
		<td><?php echo h($ticketType['TicketType']['short_description']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('View'); ?>" href="<?php echo $this->Html->url(array('action' => 'view', $ticketType['TicketType']['id'])); ?>"><i class="icon-eye-open"></i></a>
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>" href="<?php echo $this->Html->url(array('action' => 'edit', $ticketType['TicketType']['id'])); ?>"><i class="icon-edit"></i></a>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $ticketType['TicketType']['id']), array('class' => 'btn-small', 'rel'=>'tooltip', 'data-original-title'=>__('Delete'), 'escape' => false), __('Are you sure you want to delete # %s?', $ticketType['TicketType']['id']));?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<br/>
	<a href='ticketTypes/add' class='btn'><i class='icon-plus'></i> <?php echo __('Add Ticket Type'); ?></a>	<br/><br/>
</div>
