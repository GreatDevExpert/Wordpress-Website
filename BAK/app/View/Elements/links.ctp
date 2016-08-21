<?php 
$links = $this->requestAction('/links/index/sort:title/direction:asc');
?>

<form name='links' action='#'>
<select name='URL' onchange='window.open(this.form.URL.options[this.form.URL.selectedIndex].value, "newWindow", "")'>
<option value="">Select a link</option>
<?php
foreach ($links as $link):
                echo "<option value='" . $link['Link']['url'] . "'>" . $link['Link']['title'] . "</option>\n";
endforeach;
?>
</select>
</form>
