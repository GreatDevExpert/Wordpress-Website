<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<div class="null">
<?php echo $this->Form->create('Content'); ?>
	<table width="100%">
	<?php
		echo "<tr><td>Category</td><td>" . $this->Form->input('category_id', array('label'=>'', 'empty' => '', 'default' => 0)) . "</td></tr>";
		echo "<tr><td>Start Date</td><td>" . $this->Form->input('start_date', array('label'=>'')) . "</td></tr>";
		echo "<tr><td>End Date</td><td>" . $this->Form->input('end_date', array('label'=>'')) . "</td></tr>";
		echo "<tr><td>Title</td><td>" . $this->Form->input('name', array('label'=>'')) . "</td></tr>";
		echo "<tr><td>Introduction</td><td>" . $this->Form->input('introduction', array('label'=>'', 'class'=>'ckeditor')) . "</td></tr>";
		echo "<tr><td>Article</td><td>" . $this->Form->input('content', array('label'=>'', 'class'=>'ckeditor')) . "</td></tr>";
		echo "<tr><td>Visible</td><td>" . $this->Form->input('visible', array('options' => array('0'=>'No', '1'=>'Yes'), 'label'=>'')) . "</td></tr>";
		echo "<tr><td>Front Page</td><td>" . $this->Form->input('front_page', array('options' => array('0'=>'No', '1'=>'Yes'), 'label'=>'')) . "</td></tr>";
	?>
	</table>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
