
<div class="users form">

	<div class="page-header">
		<h1><?php echo __('Login'); ?></h1>
	</div>

	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	    <fieldset>
	        <legend>
	            <?php echo __('Please enter your username and password'); ?>
	        </legend>
	        <?php echo $this->Form->input('username');
	        echo $this->Form->input('password');
	    ?>
	    </fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
</div>