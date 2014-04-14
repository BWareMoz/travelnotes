<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Trip Types', '/tripTypes'),
    __('View')));?>
<div class="tripTypes form">

	<div class="page-header">
		<h1><?php echo __('Trip Type'); ?></h1>
	</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tripType['TripType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($tripType['TripType']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Description'); ?></dt>
		<dd>
			<?php echo h($tripType['TripType']['short_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

