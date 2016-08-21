<div class="null">
<?php echo $this->Form->create('Veteran'); ?>
		<legend><?php echo __('Add Veteran'); ?></legend>
		<table width="100%">
	<?php
		echo "<tr><td>First Name</td><td>" . $this->Form->input('first_name', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Middle Name</td><td>" . $this->Form->input('middle_name', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Last Name</td><td>" . $this->Form->input('last_name', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Address</td><td>" . $this->Form->input('address1', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Address (cont.)</td><td>" . $this->Form->input('address2', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Country</td><td>" . $this->Form->input('country_id', array('label' => '')) . "</td></tr>";
		echo "<tr><td>City</td><td>" . $this->Form->input('city', array('label' => '')) . "</td></tr>";
		echo "<tr><td>State</td><td>" . $this->Form->input('state_id', array('label' => '')) . "</td></tr>";
		echo "<tr><td>zip</td><td>" . $this->Form->input('zip', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Birth State</td><td>" . $this->Form->input('birth_state_id', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Birth City</td><td>" . $this->Form->input('birth_city', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Status</td><td>" . $this->Form->input('status', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Living</td><td>" . $this->Form->input('living', array('label' => '')) . "</td></tr>";
	?>
		</table>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
