<?php
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
mkdir ($_SERVER['DOCUMENT_ROOT']. "/app/webroot/img/photos/1", 0777, true);
mkdir ($_SERVER['DOCUMENT_ROOT']. "/app/webroot/img/photos/2", 0777, true);
mkdir ($_SERVER['DOCUMENT_ROOT']. "/app/webroot/img/photos/3", 0777, true);
mkdir ($_SERVER['DOCUMENT_ROOT']. "/app/webroot/img/photos/4", 0777, true);
?>
