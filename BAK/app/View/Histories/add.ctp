<div class="histories form">
<?php echo $this->Form->create('History'); ?>
	<fieldset>
		<legend><?php echo __('Add History'); ?></legend>
	<?php
		echo $this->Form->input('veteran_id');
		echo $this->Form->input('service_start');
		echo $this->Form->input('service_end');
		echo $this->Form->input('branch_id');
		echo $this->Form->input('rank_id');
		echo $this->Form->input('war_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Veterans'), array('controller' => 'veterans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Veteran'), array('controller' => 'veterans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ranks'), array('controller' => 'ranks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rank'), array('controller' => 'ranks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wars'), array('controller' => 'wars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New War'), array('controller' => 'wars', 'action' => 'add')); ?> </li>
	</ul>
</div>
