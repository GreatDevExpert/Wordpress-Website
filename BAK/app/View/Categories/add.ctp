<div class="null">
<?php echo $this->Form->create('Category'); ?>
		<legend><?php echo __('Add Category'); ?></legend>
	<table>
	<?php
		echo "<tr><td>Parent:</td><td>" . $this->Form->input('parent_id', array('label' => '', 'empty' => '', 'default' => 0)) . "</td></tr>";
		echo "<tr><td>Name:</td><td>" . $this->Form->input('name', array('label' => '')) . "</td></tr>";
	?>
	</table>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
