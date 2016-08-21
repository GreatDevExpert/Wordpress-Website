<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
cnt = 0;
function addLogElement() {
    var newdiv=document.createElement("div");
    var markLabel=document.createTextNode("Mark: ");
    var markInput=document.createElement('input');
    markInput.type = 'text';
    markInput.value = 'mm:ss';
    markInput.id = "data['videoLog']['mark'][" + cnt + "]";
    markInput.name = "data['videoLog']['mark'][" + cnt + "]";
    markInput.size = "6";
    var topicLabel=document.createTextNode("Topic: ");
    var topicInput=document.createElement('input');
    topicInput.type = 'text';
    topicInput.value = 'description';
    topicInput.id = "data['videoLog']['topic'][" + cnt + "]";
    topicInput.name = "data['videoLog']['topic'][" + cnt + "]";
    topicInput.size = "120";
    newdiv.appendChild(markLabel); //append text to new div
    newdiv.appendChild(markInput); //append text to new div
    newdiv.appendChild(topicLabel); //append text to new div
    newdiv.appendChild(topicInput); //append text to new div
    document.getElementById("logElements").appendChild(newdiv); //append new div to another 
    cnt++;
}
</script>
<div class="null">
<h2 class="army"><?php echo __('Add Video'); ?></h2>
<?php echo $this->Form->create('Video'); ?>
<table width= "100%">
	<?php
		echo "<tr><td>Title</td><td>" . $this->Form->input('title', array('label'=>'', 'style'=>'width:99%')) . "</td></tr>\n";
		echo "<tr><td>Description</td><td>" . $this->Form->input('embed', array('label'=>'', 'class'=>'ckeditor')) . "</td></tr>\n";
		echo "<tr><td>Embed Code</td><td>" . $this->Form->input('embed', array('label'=>'', 'style'=>'width:99%')) . "</td></tr>\n";
		echo "<tr><td>Featured</td><td>" . $this->Form->input('featured', array('label'=>'', 'options' => array('0'=>'', 'featured'=>'featured', 'homepage'=>'homepage'))) . "</td></tr>\n";
		echo "<tr><td>Type</td><td>" . $this->Form->input('type', array('label'=>'', 'options' => array('documentary'=>'documentary', 'interview'=>'interview'))) . "</td></tr>\n";
		//echo "<tr><td>Thumbnail</td><td>" . $this->Form->input('thumbnail', array('label'=>'')) . "</td></tr>\n";
	?>
</table>
<p>&nbsp;</p>
<div id='logElements'></div>
<p>&nbsp;</p>
<input type="button" value="Add Log Entry" onclick="addLogElement()"/>
<p>&nbsp;</p>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
