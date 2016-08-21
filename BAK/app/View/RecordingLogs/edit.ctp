<div class="recordingLogs form">
<?php echo $this->Form->create('RecordingLog'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recording Log'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RecordingLog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RecordingLog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recording Logs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording'), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
	</ul>
</div>
