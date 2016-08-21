<?php
    $href = "/veterans/" . $function . "/" . $value;
?>
<script type="text/javascript">
	// Reload the parent window
	window.top.location.href = "<?php echo $href; ?>";
</script>
