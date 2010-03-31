<div id="submit">
<?
if ($_POST['quote']){
	$q = escapeshellcmd($_POST['quote']);
	shell_exec("cd $db; echo $q | ./escq | ./addq");
	print `cd $db; echo $q | ./escq `;
	`echo akjfg >file`;
?>
<p>Your quote has been successfully submitted! Thanks!</p>
<?
}
else{
?>
<form action="?submit" name="submit" method="POST"> 
	<textarea name="quote" cols="80" rows="5"></textarea> 
	<input type="submit" value="Submit">
	<input type="reset" value="Reset"> 
</form> 
<?
}
?>
</div>
