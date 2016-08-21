<div class="null">
	<h2 class="army"><?php echo __('Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('teaser'); ?></th>
			<th><?php echo $this->Paginator->sort('expires'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions" width="90px"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['title']); ?>&nbsp;</td>
		<td><?php echo h(substr($event['Event']['teaser'], 0, 60) . " ..."); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['expires']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['updated']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
		<td class="null">
			<?php echo $this->Html->link('<img src="/img/view.png" alt="view" title="view"/>', array('action' => 'view', $event['Event']['id']), array('escape'=> false)); ?>
			<?php echo $this->Html->link('<img src="/img/edit.png" alt="edit" title="edit"/>', array('action' => 'edit', $event['Event']['id']), array('escape'=> false)); ?>
			<?php echo $this->Form->postLink('<img src="/img/delete.png" alt="delete" title="delete"/>', array('action' => 'delete', $event['Event']['id']), array('escape'=> false), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
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
