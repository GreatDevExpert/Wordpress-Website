<div class="null">
<?php echo $this->Form->create('Recording'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recording'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('veteran_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('type', array('options' => array('audio'=>'audio', 'video'=>'video')));
		echo $this->Form->input('embed');
		echo $this->Form->input('length', array('type' => 'text'));
		echo $this->Form->input('date');
		echo $this->Form->input('location');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
