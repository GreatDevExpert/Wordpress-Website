<div class="null">
	<dl>
		<dt><?php echo __('Photograph'); ?></dt>
		<dd>
			<img src="<?php echo "/img/photos/" . $photograph['Photograph']['veteran_id'] . "/" . $photograph['Photograph']['id'] . ".jpg"; ?>">
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($photograph['Photograph']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
