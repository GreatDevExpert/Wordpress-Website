<script type="text/javascript">
function addChildElements() {
    var newdiv=document.createElement("div");
    var newtext=document.createTextNode("Label div :");
    var aTextBox=document.createElement('input');
    aTextBox.type = 'text';
    aTextBox.value = 'Input Element';
    aTextBox.id = 'txt_cell_two_';
    newdiv.appendChild(newtext); //append text to new div
    newdiv.appendChild(aTextBox); //append text to new div
    document.getElementById("test").appendChild(newdiv); //append new div to another 
}
</script>

<div class="null">
<?php echo $this->Form->create('Recording'); ?>
	<fieldset>
		<legend><?php echo __('Add Recording'); ?></legend>
	<?php
		echo $this->Form->input('veteran_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('type', array('options' => array('audio'=>'audio', 'video'=>'video')));
		echo $this->Form->input('embed');
		echo $this->Form->input('length', array('type' => 'text'));
		echo $this->Form->input('date');
		echo $this->Form->input('location');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
