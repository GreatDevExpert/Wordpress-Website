<div class="ranks view">
<h2><?php  echo __('Rank'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($rank['Rank']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rank'), array('action' => 'edit', $rank['Rank']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rank'), array('action' => 'delete', $rank['Rank']['id']), null, __('Are you sure you want to delete # %s?', $rank['Rank']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ranks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rank'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Histories'), array('controller' => 'histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New History'), array('controller' => 'histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Histories'); ?></h3>
	<?php if (!empty($rank['History'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Veteran Id'); ?></th>
		<th><?php echo __('Service Start'); ?></th>
		<th><?php echo __('Service End'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th><?php echo __('Rank Id'); ?></th>
		<th><?php echo __('War Id'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($rank['History'] as $history): ?>
		<tr>
			<td><?php echo $history['id']; ?></td>
			<td><?php echo $history['veteran_id']; ?></td>
			<td><?php echo $history['service_start']; ?></td>
			<td><?php echo $history['service_end']; ?></td>
			<td><?php echo $history['branch_id']; ?></td>
			<td><?php echo $history['rank_id']; ?></td>
			<td><?php echo $history['war_id']; ?></td>
			<td><?php echo $history['updated']; ?></td>
			<td><?php echo $history['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'histories', 'action' => 'view', $history['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'histories', 'action' => 'edit', $history['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'histories', 'action' => 'delete', $history['id']), null, __('Are you sure you want to delete # %s?', $history['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New History'), array('controller' => 'histories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
