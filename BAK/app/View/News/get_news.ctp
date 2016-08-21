<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr>
        <td><img src="/images/index_15.gif" width="147" height="22" alt=""></td>
    </tr>
<?php
foreach ($news as $news): ?>
	<tr>
		<td>
			<p><strong><?php echo gmdate('F jS, Y', strtotime($news['News']['updated'])); ?></strong></p>
			<p><strong><?php echo h($news['News']['title']); ?></strong> <?php echo h($news['News']['teaser']); ?></p>
			<?php 
				if ($news['News']['article'] != "")
					echo "<a href='#'>&bull;read more ...</a>";
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
