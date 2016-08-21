<div class="null">
<h2><?php  echo __('Recording'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Veteran'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recording['Veteran']['id'], array('controller' => 'veterans', 'action' => 'view', $recording['Veteran']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recording['User']['id'], array('controller' => 'users', 'action' => 'view', $recording['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Embed'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['embed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Length'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['length']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($recording['Recording']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
