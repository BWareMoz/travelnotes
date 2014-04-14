<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
   __('Trip Types')));?><div class="tripTypes index">
	<div class="page-header">
		<h1><?php echo __('Trip Types'); ?></h1>
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
	foreach ($tripTypes as $tripType): ?>
	<tr>
		<td><?php echo h($tripType['TripType']['id']); ?>&nbsp;</td>
		<td><?php echo h($tripType['TripType']['description']); ?>&nbsp;</td>
		<td><?php echo h($tripType['TripType']['short_description']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('View'); ?>" href="<?php echo $this->Html->url(array('action' => 'view', $tripType['TripType']['id'])); ?>"><i class="icon-eye-open"></i></a>
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>" href="<?php echo $this->Html->url(array('action' => 'edit', $tripType['TripType']['id'])); ?>"><i class="icon-edit"></i></a>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $tripType['TripType']['id']), array('class' => 'btn-small', 'rel'=>'tooltip', 'data-original-title'=>__('Delete'), 'escape' => false), __('Are you sure you want to delete # %s?', $tripType['TripType']['id']));?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<br/>
	<a href='tripTypes/add' class='btn'><i class='icon-plus'></i> <?php echo __('Add Trip Type'); ?></a>	<br/><br/>
</div>
