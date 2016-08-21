<div class="histories index">
	<h2><?php echo __('Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('veteran_id'); ?></th>
			<th><?php echo $this->Paginator->sort('service_start'); ?></th>
			<th><?php echo $this->Paginator->sort('service_end'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rank_id'); ?></th>
			<th><?php echo $this->Paginator->sort('war_id'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($histories as $history): ?>
	<tr>
		<td><?php echo h($history['History']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($history['Veteran']['id'], array('controller' => 'veterans', 'action' => 'view', $history['Veteran']['id'])); ?>
		</td>
		<td><?php echo h($history['History']['service_start']); ?>&nbsp;</td>
		<td><?php echo h($history['History']['service_end']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($history['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $history['Branch']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($history['Rank']['name'], array('controller' => 'ranks', 'action' => 'view', $history['Rank']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($history['War']['name'], array('controller' => 'wars', 'action' => 'view', $history['War']['id'])); ?>
		</td>
		<td><?php echo h($history['History']['updated']); ?>&nbsp;</td>
		<td><?php echo h($history['History']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $history['History']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $history['History']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $history['History']['id']), null, __('Are you sure you want to delete # %s?', $history['History']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New History'), array('action' => 'add')); ?></li>
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
