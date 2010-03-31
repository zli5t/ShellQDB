<?              $pages = ceil(`cd $db; . ./config; utils/filterq f a <\$qfile | wc -l `/$qpp);
		if ($_GET['page'] == "") 
			$cp = 1;
		else $cp = $_GET['page'];
# If the $c[ variable is valid
if (is_numeric($cp) && $cp >= 1 && $cp <= $pages){
                if ($cp != 1){
?>
<a href="?browse&page=1">First</a>
<a href="?browse&page=<?= $cp - 1?>">&lt;</a>
<?
                }
		
                for($i=1; $i<=$pages; $i++){
?>
<a href="?browse&page=<?= $i ?>"><?= $i ?></a>
<?              }
                if($cp != $pages){
?>
<a href="?browse&page=<?= $cp + 1 ?>">&gt;</a>
<a href="?browse&page=<?= $pages ?>">Last</a>
<?
                }
                echo shell_exec("cd $db; . ./config; 
		utils/filterq f a <\$qfile | \
                sed -n '".(($cp-1)*$qpp+1).",".($cp*$qpp)."p'\
		| outq/html");
}
else include('./html/invalid.php');
?>
