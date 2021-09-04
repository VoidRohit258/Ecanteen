<?php
	if(!isset($text))
	$text="";
	if(!isset($username))
	$username="";
		require_once('functions.php');
		if(isset($_POST['Submit']))
		{
                   

					require_once('conn.php');
                                   //$password = SHA1($password); 
					$sql="delete from orders";
					$result=$conn->query($sql);
					//echo mysql_num_rows($result);
                    
				$text="<font color=red>All Orders deleted</font>";
			
		}

?>
<?php require_once('header.php') ?>
<script>
function validate()
{
	var f=document.form1
	if(f.username.value=="")
	{	error(document.getElementById("usernametext"))
		f.username.focus()
		return false;
	}
	if(f.password.value=="")
	{	error(document.getElementById("passwordtext"))
		f.password.focus()
		return false;
	}
	return true
}
function error(id)
{
	id.style.color='red'
}

</script>
<form name="form1" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">
<div align="center" class="box"><?php echo $text ?></div>

<td  align="left"><input type="submit" name="Submit" value="Clear All Records" /></td>
</tr><tr><td>&nbsp;</td></tr>
</table>
<div id="conDiv">


<div id="left">
	<div>
			
                        <img src="images/nitt.jpg" />
                        <img src="images/17.jpg" width="250px" height="200px" />
	</div>
</div>
</div>
</form>

<?php require_once('footer.php') ?>
</body>
</html>
