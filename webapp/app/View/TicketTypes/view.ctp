<?php echo $this->Html->breadcrumb(array(
    $this->Html->link(__('Home'), '/'),
    $this->Html->link('Ticket Types', '/ticketTypes'),
    __('View')));?>
<div class="ticketTypes form">

	<div class="page-header">
		<h1><?php echo __('Ticket Type'); ?></h1>
	</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ticketType['TicketType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ticketType['TicketType']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Description'); ?></dt>
		<dd>
			<?php echo h($ticketType['TicketType']['short_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

