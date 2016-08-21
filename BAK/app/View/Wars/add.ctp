<div class="null">
<?php echo $this->Form->create('War'); ?>
	<fieldset>
		<legend><?php echo __('Add War'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
