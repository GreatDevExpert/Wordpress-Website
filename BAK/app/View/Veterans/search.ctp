<center><div class="formLayout browse" id="browseList"><?php $this->requestAction('/veterans/getBrowseList'); ?></div></center>
<p>&nbsp;</p>
<?php 
echo $this->Form->create('Veteran', array('type' => 'get', 'action' => 'searchShell', 'class' => 'formLayout', 'inputDefaults' => array('label' => false, 'div' => false))) . "\n";
echo $this->Form->hidden('function', array('value' => 'searchByLastName'));
echo "<label>Search by Last Name:</label>" . $this->Form->input('value');
echo $this->Form->end(array('label' => 'Search', 'class' => 'formLayout', 'style' => 'width: 60px; margin-left: 10px'));
?>
<p>&nbsp;</p>
<?php 
echo $this->Form->create('Veteran', array('type' => 'get', 'action' => 'searchShell', 'class' => 'formLayout', 'inputDefaults' => array('label' => false, 'div' => false))) . "\n";
echo $this->Form->hidden('function', array('value' => 'searchByBranch'));
echo "<label>Search by Branch:</label>" . $this->Form->input('branch_id', array('type' => 'select', 'name' => 'value'));
echo $this->Form->end(array('label' => 'Search', 'class' => 'formLayout', 'style' => 'width: 60px; margin-left: 10px'));
?>
<p>&nbsp;</p>
<?php 
echo $this->Form->create('Veteran', array('type' => 'get', 'action' => 'searchShell', 'class' => 'formLayout', 'inputDefaults' => array('label' => false, 'div' => false))) . "\n";
echo $this->Form->hidden('function', array('value' => 'searchByWar'));
echo "<label>Search by War:</label>" . $this->Form->input('war_id', array('type' => 'select', 'name' => 'value'));
echo $this->Form->end(array('label' => 'Search', 'class' => 'formLayout', 'style' => 'width: 60px; margin-left: 10px'));
?>
