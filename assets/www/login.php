<!DOCTYPE html>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <script type="text/javascript" charset="utf-8" src="cordova-2.7.0.js"></script>
    <script type="text/javascript" charset="utf-8" src = "jquery.mobile-1.10.1.min.js"></script>
  </head>
  <div id=txtHint>
  <script>
  <?php
session_start();

$username = "a7644554_1";
$password = "password2";
$database = "a7644554_1";

mysql_connect( "mysql1.000webhost.com",$username,$password);
mysql_select_db($database) or die( "Unable to select database");
?>


function pass()
{
        //document.getElementById("txtHint").innerHTML="in pass";
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                }
        }

        var a = document.getElementById("u");

        var b = document.getElementById("p");
        var c = document.getElementById("ist");
        var d = document.getElementById("isr");

        if (c.checked && d.checked)
        {
                        document.getElementById("txtHint").innerHTML="DONT CHECK BOTH :@ -.- ";
                        return;
        }



        var str = "userlogin="+a.value+"&password="+b.value+"&cassociate="+c.checked+"&cmoderator="+d.checked;


        //document.getElementById("txtHint").innerHTML="HERE!!!!!!!!";
        //document.getElementById("txtHint").innerHTML=str;

        xmlhttp.open("POST","checkpass.php",true);

        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(str);
}
</script>

<?php
if($_SESSION['logged'])
{
header("Location: display.php");
}
else 
{
?>
  <body>
<label>Username: </label>
            <p>
              <input type="text" name="username" id="u" />
            <p>
              <label>Password:<br />
              </label>

              <input type="password" name="state" id="p" />
              
              <div><input type="radio" name = "loginas" id = "ist" value="Associate" checked /> Tenant
              	<input type="radio"  name = "loginas" id = "isr" value="Realtor" /> Realtor</div>
              	
              	<button onClick ='pass()'>Login</button></div>
</body>
<?php }?>
  </html>