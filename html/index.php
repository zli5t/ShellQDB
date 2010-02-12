<html>
<head>
	<title>A Quote Database!</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>

<div id="title">
<h1>A Quote Database!</h1>
</div>

<div id="menu">
<a href="?about">About</a> |
<a href="?submit">Submit</a> |
<a href="?new">New</a> |
<a href="?top">Top</a> |
<a href="?random">Random</a> <a href="random1">>0</a>
<form action="" method="get"> 
<input size="8" name="search" /> <input type="submit" value="Go" /> 
</form> |
<a href="?rss">
<img src="rss.jpg" alt="RSS" /></a> 
</div>


<div id="content">
<?
switch ($_SERVER['QUERY_STRING']){
	case 'about': include('about.html');break;
	case 'submit': include('submit.php');break; 
	case 'new': shell_exec('. ./config; tail -15 <$qfile');break;
	case 'random': break;
	case 'random1': break;
	case 'top': break;
	default: shell_exec(". ./config; egrep '^".$_SERVER['QUERY_STRING']."'".' <$qfile | outq/html');
}
?>
</div>


</body>
</html>
