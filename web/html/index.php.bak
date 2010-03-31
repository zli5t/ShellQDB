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
<form action="?search" method="get"> 
<input size="8" name="search" /> <input type="submit" value="Go" /> 
</form> |
<a href="?rss">
<img src="rss.jpg" alt="RSS" /></a> 
</div>


<div id="content">
<?
switch (preg_replace("&.*","",$_SERVER['QUERY_STRING']){
	case 'about': include('./about.html');break;
	case 'submit': include('./submit.php');break; 
	case 'new': echo shell_exec("cd $db;. ./config; tail -$qpp <\$qfile");break;
	case 'random': 
		echo shell_exec("cd $db; . ./config;
		./showf -f a <\$qfile | ./rand $qpp | outq/html");
		break;

	case 'random1':
		echo shell_exec("cd $db; . ./config;
		./showf -f a -s > 0 \$qfile | ./randq $qpp \
		| outq/html");
		break;

	case 'top':
		echo shell_exec("cd $db; . ./config;
		./shows -f a | sort -t ':' -n +2 -3 | head -$qpp | outq/html");
		break;

	case 'browse': include('./browse.php'); break;	
		
	case 'search'
	default: echo shell_exec("cd $db; . ./config;
		 egrep '^$_SERVER['QUERY_STRING'].:' <\$qfile | outq/html");
}
?>
</div>


</body>
</html>
