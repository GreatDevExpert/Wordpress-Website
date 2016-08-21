<div class="null">
	<h2 class="army"><?php echo __('News & Events'); ?></h2>
	<p>&nbsp;</p>
	<div class="clear"></div>
	<?php foreach ($events as $event): ?>
		<p>&nbsp;</p>
		<b><?php echo $event['Event']['title']; ?></b></br>
		<p><?php echo $event['Event']['teaser']; ?>&nbsp;</p>
		<?php 
		if ( strlen($event['Event']['article']) > 0 ) {
			echo "<a href='/events/view/" . $event['Event']['id'] . "'>[MORE ...]</a><br>";
		}
		?>
	<?php endforeach; ?>
</div>
