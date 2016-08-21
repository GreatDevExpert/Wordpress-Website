<div class="null">
<h2 class="army"><?php echo __('Video Edit'); ?></h2>
<?php echo $this->Form->create('Video'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('embed');
		echo $this->Form->input('featured');
		echo $this->Form->input('width');
		echo $this->Form->input('height');
		echo $this->Form->input('thumbnail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Video.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?></li>
	</ul>
</div>
