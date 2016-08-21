<div class="blogs index">
	<h2><?php echo __('Blogs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('cid'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($blogs as $blog): ?>
	<tr>
		<td><?php echo h($blog['Blog']['id']); ?>&nbsp;</td>
		<td><?php echo h($blog['Blog']['controller']); ?>&nbsp;</td>
		<td><?php echo h($blog['Blog']['cid']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($blog['ParentBlog']['id'], array('controller' => 'blogs', 'action' => 'view', $blog['ParentBlog']['id'])); ?>
		</td>
		<td><?php echo h($blog['Blog']['comment']); ?>&nbsp;</td>
		<td><?php echo h($blog['Blog']['published']); ?>&nbsp;</td>
		<td><?php echo h($blog['Blog']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $blog['Blog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $blog['Blog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $blog['Blog']['id']), null, __('Are you sure you want to delete # %s?', $blog['Blog']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Blog'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Blogs'), array('controller' => 'blogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Blog'), array('controller' => 'blogs', 'action' => 'add')); ?> </li>
	</ul>
</div>
