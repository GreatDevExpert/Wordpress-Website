<div class="ranks form">
<?php echo $this->Form->create('Rank'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rank'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rank.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rank.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ranks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Histories'), array('controller' => 'histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New History'), array('controller' => 'histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
