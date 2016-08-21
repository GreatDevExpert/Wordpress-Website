<div class="null">
	<h2><?php echo __('Photographs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('veteran_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('location'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($photographs as $photograph): ?>
	<tr>
		<td><?php echo h($photograph['Photograph']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($photograph['Veteran']['id'], array('controller' => 'veterans', 'action' => 'view', $photograph['Veteran']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($photograph['User']['id'], array('controller' => 'users', 'action' => 'view', $photograph['User']['id'])); ?>
		</td>
		<td><?php echo h($photograph['Photograph']['location']); ?>&nbsp;</td>
		<td><?php echo h($photograph['Photograph']['date']); ?>&nbsp;</td>
		<td><?php echo h($photograph['Photograph']['description']); ?>&nbsp;</td>
		<td><?php echo h($photograph['Photograph']['updated']); ?>&nbsp;</td>
		<td><?php echo h($photograph['Photograph']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $photograph['Photograph']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $photograph['Photograph']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $photograph['Photograph']['id']), null, __('Are you sure you want to delete # %s?', $photograph['Photograph']['id'])); ?>
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
