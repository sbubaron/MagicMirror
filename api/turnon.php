<?php


//$old_path = getcwd();

$cmd = shell_exec('tvservice -o');
echo '<pre>' . $cmd . '</pre>';
//chdir('/my/path/');
//$output = shell_exec('./script.sh var1 var2');
//chdir($old_path);