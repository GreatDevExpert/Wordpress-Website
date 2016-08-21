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
<?php
foreach ( $contentList as $item ) {
    //echo "<a href='/contents/readArticle/id:" . $item['Content']['content'] . "'>" . $item['Content']['name'] . "</a><br>";
    echo "<h1>" . $item['Content']['name'] . "</h1>";
    echo $item['Content']['introduction'];
    if ( strlen($item['Content']['content']) > 0 ) {
        echo "<a href='/contents/readArticle/id:" . $item['Content']['id'] . "'>[MORE ...]</a><br>";
    }
    echo "<div class='clear'></div><p>&nbsp;</p>";
}
?>
</div>
