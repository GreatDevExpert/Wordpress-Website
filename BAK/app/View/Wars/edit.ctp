<div class="null">
<?php echo $this->Form->create('War'); ?>
	<fieldset>
		<legend><?php echo __('Edit War'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
