<?
$db = "../"; #location of quote database root
$qpp = 15; #quotes per page
switch ($_SERVER['QUERY_STRING']){
	case 'fortune': echo shell_exec('cd '.$db.';outq/fortune <quotes');break;
	default: include('html/index.php');break;
}?>

