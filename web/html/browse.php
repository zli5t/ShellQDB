<?              $pages = ceil(`cd $db; . ./config; wc -l <\$qfile`/$qpp);
                if (($_GET['page'] != "") || ($_GET['page'] != 1)){
?>
<a href="?browse&page=1">First</a>
<a href="?browse&page=<?= $_GET["page"] - 1?>">&lt;</a>
<?
                }
                for($i=1; $i<=$pages; $i++){
?>
<a href="?browse&page=<?= $i ?>"><?= $i ?></a>
<?              }
                if($_GET['page'] != $pages){
?>
<a href="?browse&page=<?= $_GET["page"] + 1 ?>">&gt;</a>
<a href="?browse&page=<?= $pages ?>">Last</a>
<?
                }
                echo shell_exec("cd $db; . ./config;
                sed -r '/^".(($_GET["page"]-1)*$qpp+1).":/,/^".($_GET["page"]*$qpp)."/p' <\$qfile | outq/html");
?>
