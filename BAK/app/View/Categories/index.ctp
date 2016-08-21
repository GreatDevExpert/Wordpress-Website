<div class="null">
	<h2><?php echo __('Categories'); ?></h2>
	<table width="50%" cellpadding="0" cellspacing="0">
	<tr>
			<th>Name</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($categories as $category => $value): ?>
	<tr>
		<td><?php echo $value; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('MoveUp'), array('action' => 'moveup', $category, 1)); ?>
			<?php echo $this->Html->link(__('MoveDown'), array('action' => 'movedown', $category, 1)); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category)); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category), null, __('Are you sure you want to delete # %s?', $value)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
</div>
