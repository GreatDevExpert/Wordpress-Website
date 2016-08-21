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
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middle Name'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['middle_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($veteran['State']['name'], array('controller' => 'states', 'action' => 'view', $veteran['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($veteran['Country']['name'], array('controller' => 'countries', 'action' => 'view', $veteran['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth City'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['birth_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birth State Id'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['birth_state_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Living'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['living']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($veteran['Veteran']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div style="width: 652px;">
	<h3>
		&nbsp;</h3>
	<h3 style=" margin: 0 !important;">
		Rocco Richard Barrese</h3>
	<img src="/img/IV.02.jpg" style="margin-right: 12px; border: 1px solid rgb(0, 0, 0); float: left; width: 200px; "><img src="/img/ARMY.jpg" style="padding-right: 60px; float: right; width: 75px; height: 100px; "><strong>Born:</strong> 07/20/1921<br>
	<strong>Branch:</strong> U.S. Army<br>
	<strong>War Served:</strong> WWII<br>
	<strong>Rank:</strong> Sergeant<br>
	<strong>Served In:</strong> Europe
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<div style="display: inline-block; float: right;">
		<ul>
			<li>
				<a href="#">Personal papers</a></li>
			<li>
				<a href="#">Photos</a></li>
			<li>
				<a href="#">Publications</a></li>
			<li>
				<a href="#">Soldiers individual pay record</a></li>
			<li>
				<a href="#">Video log</a></li>
		</ul>
	</div>
	<div style="display: inline-block; float: left;">
		<strong>Interview:</strong><br>
		<iframe allowfullscreen="" frameborder="0" height="214" src="http://www.youtube.com/embed/mxcZ8eGE1Lw?rel=0" width="381"></iframe></div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
<p>&nbsp;</p>
</div>
</div>
