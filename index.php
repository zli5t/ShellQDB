<?
switch ($_SERVER['QUERY_STRING']){
	case 'fortune': echo shell_exec('..\outq\fortune <quotes');break;
	default: include('html/index.php');break;
?>

