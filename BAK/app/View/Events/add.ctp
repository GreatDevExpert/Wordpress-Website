<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<div class="null">
<h2 class="army"><?php echo "Event - Add"; ?></h2>

<table width="100%">
<?php echo $this->Form->create('Event'); ?>
	<?php
		echo "<tr><td>Title</td><td>" . $this->Form->input('title', array('label' => '')) . "</td></tr>";
		echo "<tr><td>Teaser</td><td>" . $this->Form->input('teaser', array('label' => '', 'class'=>'ckeditor')) . "</td></tr>";
		echo "<tr><td>Article</td><td>" . $this->Form->input('article', array('label' => '', 'class'=>'ckeditor')) . "</td></tr>";
		echo "<tr><td>Expires</td><td>" . $this->Form->input('expires', array('label' => '')) . "</td></tr>";
	?>
</table>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
