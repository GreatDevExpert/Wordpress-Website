<?php 
$events = $this->requestAction('/events/index/sort:created/direction:desc');

foreach ($events as $event):
	echo "<p><b>"  . $event['Event']['title'] . "</b>";
	if ( $event['Event']['article'] != "" )
		echo " <a href='/events/view/" . $event['Event']['id'] . "' class='read'>[ MORE ]</a>";
	echo "</p>";
	echo "<p>" . $event['Event']['teaser'] . "</p>";
endforeach;
