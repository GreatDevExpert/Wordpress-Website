<div class="histories view">
<h2><?php  echo __('History'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($history['History']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Veteran'); ?></dt>
		<dd>
			<?php echo $this->Html->link($history['Veteran']['id'], array('controller' => 'veterans', 'action' => 'view', $history['Veteran']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Start'); ?></dt>
		<dd>
			<?php echo h($history['History']['service_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service End'); ?></dt>
		<dd>
			<?php echo h($history['History']['service_end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($history['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $history['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo $this->Html->link($history['Rank']['name'], array('controller' => 'ranks', 'action' => 'view', $history['Rank']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('War'); ?></dt>
		<dd>
			<?php echo $this->Html->link($history['War']['name'], array('controller' => 'wars', 'action' => 'view', $history['War']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($history['History']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($history['History']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit History'), array('action' => 'edit', $history['History']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete History'), array('action' => 'delete', $history['History']['id']), null, __('Are you sure you want to delete # %s?', $history['History']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New History'), array('action' => 'add')); ?> </li>
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
