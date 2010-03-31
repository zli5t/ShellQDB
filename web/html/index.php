<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<a href="?browse">Browse</a> |
<a href="?random">Random</a> <a href="?random1">>0</a>
<form action="?search" method="get"> 
<input size="8" name="search" /> <input type="submit" value="Go" /> 
</form> 
<!-- | <a href="?rss">
<img src="rss.jpg" alt="RSS" /></a> -->
</div>


<div id="content">
<?
$page = preg_replace("/&.*/","",$_SERVER['QUERY_STRING']);
switch ($page){
	case 'about': include('./html/about.html');break;
	case 'submit': include('./html/submit.php');break; 
	case 'new': echo shell_exec("cd $db;. ./config;
		tail -$qpp <\$qfile | utils/sortq n | outq/html");break;
	case 'random': 
		echo shell_exec("cd $db; . ./config;
		utils/filterq -f a <\$qfile | utils/randq $qpp | outq/html");
		break;

	case 'random1':
		echo shell_exec("cd $db; . ./config;
		utils/filterq -f a <\$qfile | utils/filterq -s gt 0 | utils/randq $qpp \
		| outq/html");
		break;

	case 'top':
		echo shell_exec("cd $db; . ./config;
		utils/filterq -f a <\$qfile | utils/sortq h n | head -$qpp | outq/html");
		break;

	case 'browse': include('./html/browse.php'); break;	
		
	case 'search': break;
	#default: echo (shell_exec("cd $db; . ./config; egrep '^$_SERVER['QUERY_STRING'].:' <\$qfile | outq/html"));break;
	default:
	if ($page == ""){
?>
<p>Welcome to the Shell Quote Database!</p>
<?
	}
	elseif (is_numeric ($page)){
		$quote = shell_exec ("cd $db; . ./config;
		egrep '^$page:' <\$qfile | outq/html"); 

		if ($quote == ""){
?>
<p>I'm terribly sorry, but that quote doesn't exist! Enjoy this limerick instead:</p>

<p>
Your quote is now missing--alas!<br />
(I dropped it some-place in the grass.)<br />
With no luck in sight,<br />
I pondered your plight.<br />
The APT cow had passed it as gas.<br />

</p>
<?
		}
		else echo $quote;
	}
	else{
?>
<p>Rather than a beep<br />
Or a rude error message,<br />
These words: “Page not found.”<br />
</p>

<p>You step in the stream,<br />
but the water has moved on.<br />
This page is not here.<br />
</p>

<p>Error messages<br />
cannot completely convey.<br />
We now know shared loss.<br />
</p>
<?
	}
	break;
}
?>
</div>


</body>
</html>
