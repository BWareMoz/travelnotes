<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
   __('Clients')));?><div class="clients index">
	<div class="page-header">
		<h1><?php echo __('Clients'); ?></h1>
	</div>
	<table class="table table-striped table-bordered" id="list">
	<thead>
			<th><?php echo Inflector::humanize('id'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('name'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('contact'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('address'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('client_number'); ?>&nbsp;</th>
		<th><?php echo __('Actions'); ?></th>
	</thead>
	<tbody>
	<?php
	foreach ($clients as $client): ?>
	<tr>
		<td><?php echo h($client['Client']['id']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['contact']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['address']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['client_number']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('View'); ?>" href="<?php echo $this->Html->url(array('action' => 'view', $client['Client']['id'])); ?>"><i class="icon-eye-open"></i></a>
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>" href="<?php echo $this->Html->url(array('action' => 'edit', $client['Client']['id'])); ?>"><i class="icon-edit"></i></a>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $client['Client']['id']), array('class' => 'btn-small', 'rel'=>'tooltip', 'data-original-title'=>__('Delete'), 'escape' => false), __('Are you sure you want to delete # %s?', $client['Client']['id']));?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<br/>
	<a href='clients/add' class='btn'><i class='icon-plus'></i> <?php echo __('Add Client'); ?></a>	<br/><br/>
</div>
