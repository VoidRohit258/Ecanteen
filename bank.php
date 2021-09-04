<?php   require_once('functions.php');
		require_once("header.php");
		require_once('conn.php'); 
		$result="";
		if(isset($_GET['Submit']))
		{
			$sql="insert into bank values('".$_SESSION['user']."',";
			$sql.="'".$_GET['value1']."'," ;
			$sql.="'".$_GET['value2']."'," ;
			$sql.="'".$_GET['value3']."'," ;
			$sql.="'".$_GET['value4']."'" ;
			$sql.=")";
			
			if(mysqli_query($conn,$sql)) $result="Thanks for Adding card";
			else $result="Card Already Added";
		}	

?>
<center>
<div>
<form name="feed_form" method="get" onsubmit="return validate()">
<table>
<tr><td id="result"><?php echo $result; ?><td></tr>
<tr>
<td>
<center><h2>Add Bank Details Form</h2></td>
</tr>
<tr><td><input type="text" name="value1" placeholder="Bank" /></td></tr>
<tr><td><input type="text" name="value2" placeholder="Card Number"/></td></tr>
<tr><td><input type="hidden" name="value3"  placeholder="Amount" value="5000"/></td></tr>
<tr><td><input type="text" name="value4"  placeholder="Pin"/></td></tr>
</table>
<tr><td><input type="submit" name="Submit" value="Insert"</td></tr>
</form>
</div>
</center>
<?php require_once("footer.php");?>
</body>
</html>