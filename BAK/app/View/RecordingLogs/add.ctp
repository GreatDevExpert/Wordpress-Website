<div class="recordingLogs form">
<?php echo $this->Form->create('RecordingLog'); ?>
	<fieldset>
		<legend><?php echo __('Add Recording Log'); ?></legend>
	<?php
		echo $this->Form->input('recording_id');
		echo $this->Form->input('mark');
		echo $this->Form->input('topic');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Recording Logs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording'), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
	</ul>
</div>
