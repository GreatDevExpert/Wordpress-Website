<div class="recordingLogs view">
<h2><?php  echo __('Recording Log'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recordingLog['RecordingLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recording'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recordingLog['Recording']['id'], array('controller' => 'recordings', 'action' => 'view', $recordingLog['Recording']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mark'); ?></dt>
		<dd>
			<?php echo h($recordingLog['RecordingLog']['mark']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Topic'); ?></dt>
		<dd>
			<?php echo h($recordingLog['RecordingLog']['topic']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recording Log'), array('action' => 'edit', $recordingLog['RecordingLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recording Log'), array('action' => 'delete', $recordingLog['RecordingLog']['id']), null, __('Are you sure you want to delete # %s?', $recordingLog['RecordingLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recording Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording'), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
	</ul>
</div>
