<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<div class="null">
<?php echo $this->Form->create('Event'); ?>
	<table width="100%">
	<?php
		echo "<tr><td>Title:<td>" . $this->Form->input('title', array('label' => '', 'style' => 'width: 99%')) . "</tr>";
		echo "<tr><td>Teaser:<td>" . $this->Form->input('teaser', array('label' => '', 'class'=>'ckeditor')) . "</tr>";
		echo "<tr><td>Article:<td>" . $this->Form->input('article', array('label' => '', 'class'=>'ckeditor')) . "</tr>";
		echo "<tr><td>Expires:<td>" . $this->Form->input('expires', array('label' => '')) . "</tr>";
	?>
	</table>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
