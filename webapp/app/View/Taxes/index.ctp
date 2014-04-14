<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
   __('Taxes')));?><div class="taxes index">
	<div class="page-header">
		<h1><?php echo __('Taxes'); ?></h1>
	</div>
	<table class="table table-striped table-bordered" id="list">
	<thead>
			<th><?php echo Inflector::humanize('id'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize(Inflector::underscore('Ticket')); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize(Inflector::underscore('TaxType')); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('value'); ?>&nbsp;</th>
		<th><?php echo __('Actions'); ?></th>
	</thead>
	<tbody>
	<?php
	foreach ($taxes as $tax): ?>
	<tr>
		<td><?php echo h($tax['Tax']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tax['Ticket']['id'], array('controller' => 'tickets', 'action' => 'view', $tax['Ticket']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tax['TaxType']['id'], array('controller' => 'tax_types', 'action' => 'view', $tax['TaxType']['id'])); ?>
		</td>
		<td><?php echo h($tax['Tax']['value']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('View'); ?>" href="<?php echo $this->Html->url(array('action' => 'view', $tax['Tax']['id'])); ?>"><i class="icon-eye-open"></i></a>
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>" href="<?php echo $this->Html->url(array('action' => 'edit', $tax['Tax']['id'])); ?>"><i class="icon-edit"></i></a>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $tax['Tax']['id']), array('class' => 'btn-small', 'rel'=>'tooltip', 'data-original-title'=>__('Delete'), 'escape' => false), __('Are you sure you want to delete # %s?', $tax['Tax']['id']));?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<br/>
	<a href='taxes/add' class='btn'><i class='icon-plus'></i> <?php echo __('Add Tax'); ?></a>	<br/><br/>
</div>
