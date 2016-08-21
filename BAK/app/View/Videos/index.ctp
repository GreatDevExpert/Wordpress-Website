<div class="null">
<h2 class="army"><?php echo __('Videos'); ?></h2>
	<?php echo $this->Form->create('Video'); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('featured'); ?></th>
			<th><?php echo $this->Paginator->sort('width'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($videos as $video): ?>
	<tr>
		<td><?php echo h($video['Video']['title']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['featured']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['width']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['height']); ?>&nbsp;</td>
		<td class="null">
			<?php echo $this->Html->link('<img src="/img/view.png" alt="view" title="view"/>', array('action' => 'view', $video['Video']['id']), array('escape'=> false)); ?>
			<?php echo $this->Html->link('<img src="/img/edit.png" alt="edit" title="edit"/>', array('action' => 'edit', $video['Video']['id']), array('escape'=> false)); ?>
			<?php echo $this->Form->postLink('<img src="/img/delete.png" alt="delete" title="delete"/>', array('action' => 'delete', $video['Video']['id']), array('escape'=> false), __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?></li>
	</ul>
</div>
