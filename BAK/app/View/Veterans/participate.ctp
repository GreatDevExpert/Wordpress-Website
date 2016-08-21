<?php echo $this->Form->create('Veteran', array('class' => 'formLayout', 'inputDefaults' => array('label' => false, 'div' => true))); ?>
	<?php
		echo "<label>First Name:</label>" . $this->Form->input('first_name') . "<br>";
		echo "<label>Last Name:</label>" . $this->Form->input('last_name') . "<br>";
		echo "<label>Street Address:</label>" . $this->Form->input('address1') . "<br>";
		echo "<label>City:</label>" . $this->Form->input('city') . "<br>";
		echo "<label>State:</label>" . $this->Form->input('state_id') . "<br>";
		echo "<label>Zip:</label>" . $this->Form->input('zip') . "<br>";
		echo "<label>Phone:</label>" . $this->Form->input('phone') . "<br>";
		echo "<label>Email:</label>" . $this->Form->input('email') . "<br>";
	       	echo "<label>War served in:</label>" .  $this->Form->input('History.war_id') . "<br>";
		// name="data[History][war_id]" style="width: 150px">
		echo "<label>Branch served in:</label>" . $this->Form->input('History.branch_id') . "<br>";
		// name="data[History][branch_id]" style="width: 150px">
		echo "<label>Years you served (start):</label>" . $this->Form->input('History.service_start', array('type' => 'text')) . "<br>";
		//name="data[History][service_start]"
		echo "<label>Years you served (end):</label>" . $this->Form->input('History.service_end', array('type' => 'text')) . "<br>";
		//id="YearsServed" name="data[History][service_end]"

	?>
<?php echo $this->Form->end(__('Submit')); ?>
