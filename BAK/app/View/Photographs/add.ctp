<div class="null">
<?php echo $this->Form->create('Photograph', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<legend><?php echo __('Add Photograph'); ?></legend>
	<?php
		echo $this->Form->input('veteran_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('location');
		echo $this->Form->input('date');
		echo $this->Form->input('description');
		echo $this->Form->file('photo', array('div' => false, 'label' => '', 'style' => 'width:175px'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
