<div class="veterans index">
	<h2><?php echo __('Veterans'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('middle_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('address2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('birth_city'); ?></th>
			<th><?php echo $this->Paginator->sort('birth_state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('living'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($veterans as $veteran): ?>
	<tr>
		<td><?php echo h($veteran['Veteran']['id']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['middle_name']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['address1']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['address2']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['city']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($veteran['State']['name'], array('controller' => 'states', 'action' => 'view', $veteran['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($veteran['Country']['name'], array('controller' => 'countries', 'action' => 'view', $veteran['Country']['id'])); ?>
		</td>
		<td><?php echo h($veteran['Veteran']['birth_city']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['birth_state_id']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['zip']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['status']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['living']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['created']); ?>&nbsp;</td>
		<td><?php echo h($veteran['Veteran']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $veteran['Veteran']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $veteran['Veteran']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $veteran['Veteran']['id']), null, __('Are you sure you want to delete # %s?', $veteran['Veteran']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Veteran'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Histories'), array('controller' => 'histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New History'), array('controller' => 'histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
