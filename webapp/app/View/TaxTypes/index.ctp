<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
   __('Tax Types')));?><div class="taxTypes index">
	<div class="page-header">
		<h1><?php echo __('Tax Types'); ?></h1>
	</div>
	<table class="table table-striped table-bordered" id="list">
	<thead>
			<th><?php echo Inflector::humanize('id'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('description'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('code'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('is_prefixed'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('is_percentage'); ?>&nbsp;</th>
		<th><?php echo Inflector::humanize('value'); ?>&nbsp;</th>
		<th><?php echo __('Actions'); ?></th>
	</thead>
	<tbody>
	<?php
	foreach ($taxTypes as $taxType): ?>
	<tr>
		<td><?php echo h($taxType['TaxType']['id']); ?>&nbsp;</td>
		<td><?php echo h($taxType['TaxType']['description']); ?>&nbsp;</td>
		<td><?php echo h($taxType['TaxType']['code']); ?>&nbsp;</td>
		<td><?php echo h($taxType['TaxType']['is_prefixed']); ?>&nbsp;</td>
		<td><?php echo h($taxType['TaxType']['is_percentage']); ?>&nbsp;</td>
		<td><?php echo h($taxType['TaxType']['value']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('View'); ?>" href="<?php echo $this->Html->url(array('action' => 'view', $taxType['TaxType']['id'])); ?>"><i class="icon-eye-open"></i></a>
			<a class="btn-small" rel="tooltip" data-original-title="<?php echo __('Edit'); ?>" href="<?php echo $this->Html->url(array('action' => 'edit', $taxType['TaxType']['id'])); ?>"><i class="icon-edit"></i></a>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('action' => 'delete', $taxType['TaxType']['id']), array('class' => 'btn-small', 'rel'=>'tooltip', 'data-original-title'=>__('Delete'), 'escape' => false), __('Are you sure you want to delete # %s?', $taxType['TaxType']['id']));?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<br/>
	<a href='taxTypes/add' class='btn'><i class='icon-plus'></i> <?php echo __('Add Tax Type'); ?></a>	<br/><br/>
</div>
