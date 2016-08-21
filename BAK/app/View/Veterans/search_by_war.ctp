<div class="vform">
<h2 class="army"><?php echo __("Videos"); ?></h2>
<div class='clear'></div>
<?php
$children = $this->requestAction('/categories/getChildren/20');

if ( count($children) > 0 ) {
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
}
?>
<div class='clear'></div>
<p>&nbsp;</p>
<div class="null">
<?php foreach ($veterans as $veteran): ?>
	<div>
	<a href="/veterans/profile/<?php echo $veteran['Veteran']['id'];?>"><img src="/img/dogtag.jpg" style="float: left; width: 100px; height: 100px; margin-left: 8px; margin-right: 8px; " /></a> <?php echo h($veteran['Veteran']['last_name']); ?>, <?php echo h($veteran['Veteran']['first_name']); ?>&nbsp;(<a href="/veterans/profile/<?php echo $veteran['Veteran']['id'];?>"><em>profile</em></a>)<br />
	<?php echo $veteran['History'][0]['service_start'];?>-<?php echo $veteran['History'][0]['service_end'];?><br />
	<?php echo $this->requestAction('/wars/getWarName/' . $veteran['History'][0]['war_id']);?> (<em><a href="/veterans/searchByWar/<?php echo $veteran['History'][0]['war_id'];?>">search by war</a></em>)<br />
	<?php echo $this->requestAction('/branches/getBranchName/' . $veteran['History'][0]['branch_id']);?> (<em><a href="/veterans/searchByBranch/<?php echo $veteran['History'][0]['branch_id'];?>">search branch</a></em>)</div>
	<div class='clear'></div>
	<p>&nbsp;</p>
<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
