<div id="submit">
<?
if ($_POST["quote"]){
	`cd $db; echo '$_POST['quote']' | ./escq | ./addq`;
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
