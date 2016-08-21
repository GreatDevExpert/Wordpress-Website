<?php 
$videos = $this->requestAction('/videos/index/sort:created/direction:desc');

echo "<ul class='video'>\n";
foreach ($videos as $video):
    echo "<li><a href='/videos/watch/" . $video['Video']['id'] . "'><img src='" . $video['Video']['thumbnail'] . "' alt='vhp video' width='120' height='67'/></a>\n";
    echo "<p class='width'>" . $video['Video']['title'] . "</p>\n";
    echo "</li>\n";
endforeach;
echo "</ul>\n";
