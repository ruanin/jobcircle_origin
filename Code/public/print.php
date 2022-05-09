testing code:
<?php
$filename = "test page";
///////
ob_start();
include $filename;
$contents = ob_get_contents();
ob_end_clean();
///////
$handle = printer_open("HP80AA62");
printer_set_option($handle, PRINTER_MODE, "raw"); 
printer_write($handle,$contents);
printer_close($handle);
?> 