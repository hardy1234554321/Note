<?php

$arr_Glob = glob('/*', GLOB_ONLYDIR);

$arr_Scan = scandir('/');

$handle = opendir('/');
while(false!==($file=readdir($handle))){
	$arr_Read[] = $file;
}
closedir($handle);

echo '<pre>';
print_r($arr_Glob);
print_r($arr_Scan);
print_r($arr_Read);
echo '</pre>';
?>