<?php
require_once('functions.php');
secure(1);
require_once('conn.php');
?>
<?php 
		if(isset($_POST['Submit']))
		{
                    $item="";
                    if(isset($_POST['t1'])){
                        $item.=$_POST['t1'].'{';
						$item.=$_POST['q1'].'}';
					}
		
                    if(isset($_POST['t2'])){
                        $item.=$_POST['t2'].'{';
						$item.=$_POST['q2'].'}';
					}
                    if(isset($_POST['t3'])){
                        $item.=$_POST['t3'].'{';
						$item.=$_POST['q3'].'}';
					}
                        
                    if(isset($_POST['t4'])){
                        $item.=$_POST['t4'].'{';
						$item.=$_POST['q4'].'}';
					}
                        
                    if(isset($_POST['t5'])){
                        $item.=$_POST['t5'].'{';
						$item.=$_POST['q5'].'}';
					}
                        
                    if(isset($_POST['t6'])){
                        $item.=$_POST['t6'].'{';
						$item.=$_POST['q6'].'}';
					}
                        
                    if(isset($_POST['t7'])){
                        $item.=$_POST['t7'].'{';
						$item.=$_POST['q7'].'}';
					}
                        
                    if(isset($_POST['t8'])){
                        $item.=$_POST['t8'].'{';
						$item.=$_POST['q8'].'}';
					}
                        
                    if(isset($_POST['t9'])){
                        $item.=$_POST['t9'].'{';
						$item.=$_POST['q9'].'}';
					}
                        
                    if(isset($_POST['t10'])){
                        $item.=$_POST['t10'].'{';
						$item.=$_POST['q10'].'}';
					}
                        
                    if(isset($_POST['t11'])){
                        $item.=$_POST['t11'].'{';
						$item.=$_POST['q11'].'}';
					}
                        
                    if(isset($_POST['t12'])){
                        $item.=$_POST['t12'].'{';
						$item.=$_POST['q12'].'}';
					}
                        
                    if(isset($_POST['t13'])){
                        $item.=$_POST['t13'].'{';
						$item.=$_POST['q13'].'}';
					}
                        
                    if(isset($_POST['t14'])){
                        $item.=$_POST['t14'].'{';
						$item.=$_POST['q14'].'}';
					}
                        
                    if(isset($_POST['t15'])){
                        $item.=$_POST['t15'].'{';
						$item.=$_POST['q15'].'}';
					}
                        


    //                    echo $item;

  //                      echo $_SESSION['user'];

                   // echo $_POST['t1'];
//                    echo $_POST['amount'];

                        $sql="Select amount from bank where name='".$_SESSION['user']."' and pin='".$_POST['pass']."'";
					$current = 0;
					$result=$conn->query($sql);
                                   if ($result->num_rows > 0) 
					{
						$row = $result->fetch_assoc();
						$current=$row['amount'];
					}
					
				
				if ($current ==  0) 
					{
						                    $text="Invalid Pin. ";
					}else{
                                       // echo $current;
                                       // $text=$current;

                                        if($current >= $_POST['amount'])
                                            {
                                             $sql="Insert into orders(canteen,rollno,items,name,address,amount,time) values('Meenakshi', '".$_SESSION['user']."','".$item."','".mysqli_real_escape_string($conn,$_SESSION['user'])."','". $_SESSION['user']."','".mysqli_real_escape_string($conn,$_POST['amount'])."',NOW())";
                                         ;
										// echo  $sql;
										 mysqli_query($conn,$sql) or die(mysql_error()) ;
                                               $sq="update bank set amount = amount - '".$_POST['amount']."' where name='".$_SESSION['user']."' and pin='".$_POST['pass']."'";
                                              mysqli_query($conn,$sq) or die(mysql_error());
                                               $sq="update bank set amount = amount + '".$_POST['amount']."' where name='admin'";
                                              mysqli_query($conn,$sq) or die(mysql_error());
                                          
											$sql="Select * from orders where name='".$_SESSION['user']."' and amount='".$_POST['amount']."'";
											//echo $sql;
					$result1=$conn->query($sql);
                                   if ($result1->num_rows > 0) 
					{
						$row1 = $result1->fetch_assoc();
						$current1=$row1['id'];
					}
											
											
                                            $text="Transaction Completed Successfully!. Amount deducted from your account is ".$_POST['amount']."Token no is".$current1."<br><center><h1>Thank You.</h1> </center>";

                                        }
                                        else
                                            {

                                            $text="Insufficient amount in Your Account";
                                        }
					}



			/*$id=mysql_insert_id($conn);
                        $idi=rand()%500000;
			$ref="NITT".str_pad($idi,5,"0",STR_PAD_LEFT);
                        $pa=rand()%50000000;
			$pass="PASS".str_pad($pa,5,"0",STR_PAD_LEFT);

			$text="Registration Completed Successfully!";
			$text.="<br>Your student account is created and initiated with Rs.550/-.<br/> Your account id is : ".$ref.'<br />';
                        $text.=" Your account Password is : ".$pass.'<br />Please keep this private safe and secure';
			/*Sending mail to Complainant*/
                      /*  $query="Insert into account(rollno,id,pass,amount) values('".$_SESSION['user']."','".$ref."','".$pass."','550')";
                        mysql_query($query,$conn) or die(mysql_error());

			$to = $_SESSION['user'].'@nitt.edu';
			$subject = "Mail from Festember Core team";
			$message = 'Hello '.$_SESSION['user'].',<br>Your softcoupon account has been generated with Festember core with the account id: '.$ref.'.and Password : '.$pass.'<br>Use these ID and Password for all transactions in the upcoming college fest.<br>This is a system generated mail. Please do not reply to this mail.<br>Regards.';
			$from = "Festember";
			$headers = "From:" . $from;
		//	mail($to,$subject,$message,$headers);
			/*Sending mail to Complainant*/
		}	
?>
<?php require_once('header.php') ?>
<script>

var x;

function blinkBorder(colorA, colorB, element, time){
  x++;
  if(x == 10)
	  return;
  element.style.borderColor = colorB ;
  setTimeout( function(){
    blinkBorder(colorB, colorA, element, time);
    colorB = null;
    colorA = null;
    element = null;
    time = null;
  } , time) ;
}



function calc()

{
	
	var f=document.form1
	var hr1=0,hr2=0,hr3=0,dr1=0,dr2=0,dr3=0,dr4=0,or1=0,or2=0,or3=0,or4=0,or5=0,or6=0,or7=0,or8=0;
	if(f.t1.checked){
		hr1=30;
		
		hr1 = hr1 * parseInt(document.getElementById("q1").value);
		
	}
	if(f.t2.checked)
	{
			hr2=50;
	
		hr2 = parseInt(hr2) * parseInt(document.getElementById("i2").value);
	}
	if(f.t3.checked)
	{hr3=30;
		hr3 = parseInt(hr3) * parseInt(document.getElementById("i3").value);
	}
	if(f.t4.checked){
		dr1=40;
		dr1 = parseInt(dr1) * parseInt(document.getElementById("i4").value);
		}
	if(f.t5.checked){dr2=45;
	dr2 = parseInt(dr2) * parseInt(document.getElementById("i5").value);
	}
	if(f.t6.checked){dr3=45;
	dr3 = parseInt(dr3) * parseInt(document.getElementById("i6").value);
	}
if(f.t7.checked){dr4=50;
dr4 = parseInt(dr4) * parseInt(document.getElementById("i7").value);

}
if(f.t8.checked){or1=60;
or1 = parseInt(or1) * parseInt(document.getElementById("i8").value);
}
	if(f.t9.checked){or2=10;
	or2 = parseInt(or2) * parseInt(document.getElementById("i9").value);
	}
	if(f.t10.checked){or3=60;
	or3 = parseInt(or3) * parseInt(document.getElementById("i10").value);
	}
	
        if(f.t11.checked){or4=10;
		or4 = parseInt(or4) * parseInt(document.getElementById("i11").value);
		}
        if(f.t12.checked){or5=35;
		or5 = parseInt(or5) * parseInt(document.getElementById("i12").value);
		
		}
        if(f.t13.checked){or6=55;
		or6 = parseInt(or6) * parseInt(document.getElementById("i13").value);
		}
	if(f.t14.checked){or7=40;
	or7 = parseInt(or7) * parseInt(document.getElementById("i14").value);
	}
        if(f.t15.checked){or8=35;
		or5 = parseInt(or5) * parseInt(document.getElementById("i15").value);
		}
        f.amount.value= hr1+hr2+hr3+dr1+dr2+dr3+dr4+or1+or2+or3+or4+or5+or6+or7+or8;
        return f.amount.value;


}



function validate()
{
	var f=document.form1
	//alert("hi calculation "+calc()+"timing::"+calct()+"problem::"+calcp())
	var name = f.username.value;
	var nameReg = /^[a-zA-Z ]*$/;
	var numReg = /^\d+$/;

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	//alert(f.contact.value.length);
	if(name=="" || !nameReg.test(name))
	{	alert("Please Enter Your Name.\nName can only have Alphabets and Spaces.")
		f.username.focus()
		x = 0;
		blinkBorder("white","red", f.username, 500);
		return false;
	}

        if(f.department.value=="")
{
alert("Select your department from the list please...");
f.department.focus();
x = 0;
blinkBorder("white","red", f.department, 500);
return false;
}

if(f.classes.value=="")
	{	alert("Please Enter Your Class Name");
		f.classes.focus()
		x = 0;
		blinkBorder("white","red", f.classes, 500);
		return false;
	}

if(f.year.value=="")
{
alert("Select year of study from the list please...");
f.year.focus();
x = 0;
blinkBorder("white","red", f.year, 500);
return false;
}


if(f.email.value=="")
{
alert("Can't leave email field empty.");
f.email.focus();
x = 0;
blinkBorder("white","red", f.email, 500);
return false;
}

  if(!(f.email.value.match(mailformat)))
	{
    alert("Invalid email address!");
    f.email.focus();
    x = 0;
blinkBorder("white","red", f.email, 500);
    return false;
    }



if(f.mess.value=="")
{
alert("Select your mess from the list please...");
f.mess.focus();
x = 0;
blinkBorder("white","red", f.mess, 500);
return false;
}

if(f.tshirt.value=="")
{
alert("Select your department from the list please...");
f.tshirt.focus();
x = 0;
blinkBorder("white","red", f.tshirt, 500);
return false;
}


        if(f.cr.value=="" || !nameReg.test(f.cr.value))
	{	alert("Please Enter Your Class representative's Name.\nName can only have Alphabets and Spaces.")
		f.cr.focus()
		x = 0;
		blinkBorder("white","red", f.cr, 500);
		return false;
	}



if(f.crcontact.value=="" || !numReg.test(f.crcontact.value) || f.crcontact.value.length > 10)
	{	alert("Please Enter Proper Contact Number.\nContact can have only numbers (Max 10 digits)");
		f.crcontact.focus()
		x = 0;
		blinkBorder("white","red", f.crcontact, 500);
		return false;
	}

        	f.amount.value=calc();

return true;
}
function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}


</script>

<div id="center">
	<div>
           				<div align="center"><img src="images/menu2.jpg" width="1250" height="230" style="margin:auto;"><br/>
           				  
	  </div>
</div>



<form name="form1" method="post" onsubmit="return calc()">
<div id="content">
<div id="right">

<div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>

<table width="100%" align="center" border="0" cellpadding="5" cellspacing="5">

<tr> <td colspan="2" align="center"> <div align="center" style="font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; color: #0000CC; font-style: italic">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 28px">Breakfast</span></div></td>
</tr>
<tr align="center">
<td width="39%" align="right"><strong>idli</strong><strong> @30Rs</strong> <input type="checkbox" name="t1" value="idli" /><input style="width:5%" type="number" value="1" name="q1" id="q1" min="1" max="5"> </td>
<td width="39%" align="right"><strong>Dosa </strong><strong>@50Rs</strong><input name="t2" type="checkbox" id="t2" value="Dosa" /><input style="width:5%" type="number" value="1" name="q2" id="i2" min="1" max="5"></td>
</tr>
<tr align="center">
<td align="right"><strong>ALOO PRATHA @30 Rs</strong><input name="t3" type="checkbox" id="t3" value="aloo paratha" /><input style="width:5%" type="number" value="1" name="q3" id="i3" min="1" max="5"></td>

<td width="39%" align="right"><strong>Upma @40 Rs</strong><input name="t4" type="checkbox" id="t4" value="Upma" /><input style="width:5%" type="number" value="1" name="q4" id="i4" min="1" max="5"></td>
</tr>
<tr align="center">
<td align="right"><strong> Aloo Puri @45 Rs</strong><input name="t5" type="checkbox" id="t5" value=" Aloo Puri" /><input style="width:5%" type="number" value="1" name="q5"  id="i5" min="1" max="5"></td>
<td width="39%" align="right"><strong>Dhokla @45 Rs </strong><input name="t6" type="checkbox" id="t6" value="Dhokla" />
<input style="width:5%" type="number" value="1" name="q6"  id="i6" min="1" max="5"></td>
</tr>

<tr align="center">
    <td align="right"><strong>Sabudana  Wada @50 Rs </strong><input name="t7" type="checkbox" id="t7" value="Sabudana  Wada" /><input style="width:5%" type="number" value="1" name="q7" id="i7" min="1" max="5"></td>
<td width="39%" align="right"><strong>Missal pav @60 Rs </strong><input name="t8" type="checkbox" id="t8" value="Missal pav" /><input style="width:5%" type="number" value="1" name="q8"  id="i8" min="1" max="5"></td>
</tr>


<tr align="center">
<td width="39%" align="right"><strong>Vada pav @10 Rs </strong><input type="checkbox" name="t9" id="t9" value="Vada pav"  /><input style="width:5%" type="number" value="1" name="q9" min="1"  id="i9" max="5"></td>
<td width="39%" align="right"><strong>Kanda bhaji @60 Rs </strong>  <input type="checkbox" name="t10" id="t10" value="Kanda bhaji" /><input style="width:5%" type="number" value="1" name="q10"  id="i10" min="1" max="5"></td>

</tr>


<tr align="center">
<td width="39%" align="right"><strong>Samosa@10 RS </strong><input name="t11" type="checkbox" id="t11" value="tandoori chicken" /><input style="width:5%" type="number" value="1" name="q11"  id="i11">
</td>
<td width="39%" align="right"><strong>Sandwich @35 Rs </strong><input name="t12" type="checkbox" id="t12" value="Sandwich" /><input style="width:5%" type="number" value="1" name="q12" min="1"  id="i12" max="5"></td>
</tr>

<tr align="center">
<td width="39%" align="right"><strong>Chilli toast @55 Rs </strong><input name="t13" type="checkbox" id="t13" value="Chilli toast" /><input style="width:5%" type="number" value="1" name="q13" min="1" max="5" id="i13"></td>
<td width="39%" align="right"><strong>poori bhaji @40 RS </strong><input name="t14" type="checkbox" id="t14" value="sprite 500ml" /><input style="width:5%" type="number" value="1" name="q14"  id="i14" min="1" max="5"></td>
</tr>
<tr align="center">
<td width="39%" align="right"><strong> sabudana khichadi @35 Rs </strong><input name="t15" type="checkbox" id="t15" value="sprite 1l" /><input style="width:5%" type="number" value="1" name="q15" min="1" max="5"></td>
<td>&nbsp; </td>
</tr>
<tr>

  <td  width="39%" align="right"><strong>Pin</strong><input name="pass" type="password" id="pass" size="26" required="required"/></td>

</tr>


<tr>
    <input type="hidden" name="amount" value="" />
<td colspan="2" align="center"><input type="submit" name="Submit" value="Submit" /><!--<input type="button" value="Check" onclick="validate()"/>--></td>
</tr>

</table>
</div>
	
<div id="left">
	<div>
            
                        <img src="images/14.jpg" width="250px" height="200px"/><br/>
                        <img src="images/18.jpg" width="250px" height="200px" />
	
	   
</div>

</div>

</form>
<?php require_once('footer.php') ?>
</body>
</html>