<?php
include 'dblib.php';
echo "<html><body>";
   // echo $_REQUEST["fuserid"];
    //echo $_REQUEST["fstart"];
    //echo $_REQUEST["fend"];
showinput();
$strsql = $_REQUEST["fsql"];
if ($strsql != "") {
	$con = dbopen();
	$rowcnt = sql2table($strsql);
	dbclose($con);
	echo "<p>Total rows: " . $rowcnt . ".";
}

echo "</body></html>";
exit();

function showinput() {
	$strsql = $_REQUEST["fsql"];
	if ($strsql == "") {$strsql = "select * from users inner join trans on trans.user_id = users.user_id limit 100"; };
  ?>

<form method=post>
<table>
<tr><td><textarea name=fsql rows=10 cols=100><?php echo $strsql; ?></textarea></td></tr>
<tr><td><input type=submit name=fsubmit value="Run SQL"><input type=reset value="Cancel"></td></tr>
</table>
</form>

<?php
}
?>
