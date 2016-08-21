<div class="blogs view">
<h2><?php  echo __('Blog'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($blog['Blog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($blog['Blog']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cid'); ?></dt>
		<dd>
			<?php echo h($blog['Blog']['cid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Blog'); ?></dt>
		<dd>
			<?php echo $this->Html->link($blog['ParentBlog']['id'], array('controller' => 'blogs', 'action' => 'view', $blog['ParentBlog']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($blog['Blog']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($blog['Blog']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($blog['Blog']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Blog'), array('action' => 'edit', $blog['Blog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Blog'), array('action' => 'delete', $blog['Blog']['id']), null, __('Are you sure you want to delete # %s?', $blog['Blog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Blogs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Blog'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Blogs'), array('controller' => 'blogs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Blog'), array('controller' => 'blogs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Blogs'); ?></h3>
	<?php if (!empty($blog['ChildBlog'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Cid'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($blog['ChildBlog'] as $childBlog): ?>
		<tr>
			<td><?php echo $childBlog['id']; ?></td>
			<td><?php echo $childBlog['controller']; ?></td>
			<td><?php echo $childBlog['cid']; ?></td>
			<td><?php echo $childBlog['parent_id']; ?></td>
			<td><?php echo $childBlog['comment']; ?></td>
			<td><?php echo $childBlog['published']; ?></td>
			<td><?php echo $childBlog['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'blogs', 'action' => 'view', $childBlog['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'blogs', 'action' => 'edit', $childBlog['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'blogs', 'action' => 'delete', $childBlog['id']), null, __('Are you sure you want to delete # %s?', $childBlog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Blog'), array('controller' => 'blogs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
