<div class="null">
<?php echo $this->Form->create('Category'); ?>
		<legend><?php echo __('Edit Category'); ?></legend>
	<table width="100%">
	<?php
		//echo "<tr><td>ID:</td><td>" . $this->Form->input('id', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Parent:</td><td>" . $this->Form->input('parent_id', array('label' => '', 'empty' => true)) . "</td></tr>";
		echo "<tr><td>Left:</td><td>" . $this->Form->input('lft', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Right:</td><td>" . $this->Form->input('rgt', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Name:</td><td>" . $this->Form->input('name', array('label' => '')) . "</td></tr>";
	?>
	</table>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
