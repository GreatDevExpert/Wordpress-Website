<div class="veterans view">
<h2><?php  echo __('Veteran'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middle Name'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['middle_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($veteran['State']['name'], array('controller' => 'states', 'action' => 'view', $veteran['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($veteran['Country']['name'], array('controller' => 'countries', 'action' => 'view', $veteran['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth City'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['birth_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth State Id'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['birth_state_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Living'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['living']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Veteran'), array('action' => 'edit', $veteran['Veteran']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Veteran'), array('action' => 'delete', $veteran['Veteran']['id']), null, __('Are you sure you want to delete # %s?', $veteran['Veteran']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Veterans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Veteran'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Histories'), array('controller' => 'histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New History'), array('controller' => 'histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Histories'); ?></h3>
	<?php if (!empty($veteran['History'])): ?>
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
		foreach ($veteran['History'] as $history): ?>
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
