<script language="javascript"> 
function toggle(id) {
	var ele = document.getElementById(id);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	}
	else {
		ele.style.display = "block";
	}
} 
</script>
<div class="vform">
<h2 class="army"><?php echo __($title); ?></h2>
<div class='clear'></div>
<?php
if ( count($children) > 0 ) {
    //echo "<div class='vform'>";
    echo "<ul class='sub-link2'>";
    $num_children = count($children);
    $count = 0;
    foreach ( $children as $child ) {
        $count++;
        $extra = "";

        if ( $count == $num_children )
            $extra = " class='last'";

        echo "<li" . $extra . "><a href='/contents/categoryIndex/id:" . $child['Category']['id'] . "'>" . $child['Category']['name'] . "</a></li>";
    }
    echo "</ul>";
    //echo "</div>";
}
?>
<div class='clear'></div>
<p>&nbsp;</p>
<?php echo "<h1>" . $article['Content']['name'] . "</h1>"; ?>
<?php echo $article['Content']['content']; ?>
</div>
<?php
if ( $article['Content']['blog'] == "Yes" ) {
?>
<div class='clear'></div>
<div style='border: 1px solid #dcdcdc; padding: 10px'>
<?php
	$comments = $this->requestAction('/blogs/getComments/' . $this->params['controller'] . '/' . $article['Content']['id']);
	foreach ($comments as $comment) {
		echo "<b>" . $comment['Blog']['name'] . "</b> says:<br>";
		echo "<div style='font:8px arial,sans-serif;'>" . strftime("%h %e, %G at %l:%M %P", strtotime($comment['Blog']['created'])) . "</div><p>";
		echo $comment['Blog']['comment'] . "<p>";
		echo "<a href='javascript:toggle(" . $comment['Blog']['id'] . ");'>reply</a><br>";
		echo "<div id='" . $comment['Blog']['id'] . "' style='display: none'>";
		echo $this->Form->create('Blog', array('action' => 'add'));
		echo $this->Form->hidden('controller', array('value'=>$this->params['controller']));
		echo $this->Form->hidden('cid', array('value'=>$article['Content']['id']));
		echo $this->Form->hidden('parent_id', array('value'=>$comment['Blog']['id']));
		echo "<table class='null' border='0'>";
		echo "<tr><td>" . $this->Form->input('name', array('label'=>'')) . "<td>Name (required)</tr>";
		echo "<tr><td>" . $this->Form->input('email', array('label'=>'')) . "<td>Email (required)</tr>";
		echo "<tr><td>" . $this->Form->input('website', array('label'=>'')) . "<td>Website</tr>";
		echo "<tr><td colspan='2'>" . $this->Form->input('comment', array('label'=>'')) . "</tr>";
		echo "</table>";
		echo "<center>" . $this->Form->end(__('Post Reply')) . "</center>";
		echo "</div>";
		printReplies($comment['Blog']['id'], 1, $article['Content']['id'], $this);
	}
	echo "<hr>";
	echo $this->Form->create('Blog', array('action' => 'add'));
	echo $this->Form->hidden('controller', array('value'=>$this->params['controller']));
	echo $this->Form->hidden('cid', array('value'=>$article['Content']['id']));
	echo "<table class='null' border='0'>";
	echo "<tr><td>" . $this->Form->input('name', array('label'=>'')) . "<td>Name (required)</tr>";
	echo "<tr><td>" . $this->Form->input('email', array('label'=>'')) . "<td>Email (required)</tr>";
	echo "<tr><td>" . $this->Form->input('website', array('label'=>'')) . "<td>Website</tr>";
	echo "<tr><td colspan='2'>" . $this->Form->input('comment', array('label'=>'')) . "</tr>";
	echo "</table>";
	echo "<center>" . $this->Form->end(__('Post Comment')) . "</center>";
?>
</div>
<?php
}

function printReplies($id, $level, $cid, $parent) {
	$replies = $parent->requestAction('/blogs/getReplies/' . $id);
	foreach ($replies as $reply) {
		$color = $level%2?"#f5f5f5":"#ffffff";
		echo "<div style='padding: 10px; border: 1px solid #dcdcdc; background-color: $color'>";
		echo "<b>" . $reply['Blog']['name'] . "</b> says:<br>";
		echo "<div style='font:8px arial,sans-serif;'>" . strftime("%h %e, %G at %l:%M %P", strtotime($reply['Blog']['created'])) . "</div><p>";
		echo $reply['Blog']['comment'] . "<p>";
		echo "<a href='javascript:toggle(" . $reply['Blog']['id'] . ");'>reply</a><br>";
		echo "<div id='" . $reply['Blog']['id'] . "' style='display: none'>";
		echo $parent->Form->create('Blog', array('action' => 'add'));
		echo $parent->Form->hidden('controller', array('value'=>$parent->params['controller']));
		echo $parent->Form->hidden('cid', array('value'=>$cid));
		echo $parent->Form->hidden('parent_id', array('value'=>$reply['Blog']['id']));
		echo "<table class='null' border='0'>";
		echo "<tr><td>" . $parent->Form->input('name', array('label'=>'')) . "<td>Name (required)</tr>";
		echo "<tr><td>" . $parent->Form->input('email', array('label'=>'')) . "<td>Email (required)</tr>";
		echo "<tr><td>" . $parent->Form->input('website', array('label'=>'')) . "<td>Website</tr>";
		echo "<tr><td colspan='2'>" . $parent->Form->input('comment', array('label'=>'')) . "</tr>";
		echo "</table>";
		echo "<center>" . $parent->Form->end(__('Post Reply')) . "</center>";
		echo "</div>";
		printReplies($reply['Blog']['id'], $level + 1, $cid, $parent);
		echo "</div>";
	}
}
?>
