<?php 
$videos = $this->requestAction('/videos/index/featured:1');

foreach ($videos as $video):
    echo "<a href='/videos/watch/" . $video['Video']['id'] . "'><img src='" . $video['Video']['thumbnail'] . "' alt='vhp featured video' width='184' height='122'/></a>\n";
endforeach;
