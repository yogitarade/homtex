<form action="" method="post">
    Enter first name:<input type="text" name="fname" id="fname" required>
    Enter last name:<input type="text" name="lname" id="lname" required>
    Enter contact:<input type="text" name="contact" id="contact" required>
Enter email id:<input type="text" name="useremail" id="useremail" required>
Enter address:<input type="text" name="address" id="address" required>
password:<input type="password" name="password" id="password" required>
<input type="submit" name="submit" value="Submit">
</form>
-----------------------
<form action="" method="post">
Enter email id:<input type="text" name="useremail" id="useremail" required>
password:<input type="password" name="password" id="password" required>
<input type="submit" name="login" value="Login">
</form>
-----------------------------
<form action="" method="post">
Enter code:<input type="text" name="code" id="code" required>
<input type="submit" name="send" value="Send">
</form>
--------------------------
<form action="" method="post">VERIFY
<input type="submit" name="verify" value="Verify">
</form>


<?php
if(isset($_POST['verify'])=="Verify")
{
 $url="http://bluecheck.vestigo.co.in/demo.php"; 
        // $postdata = "api=".$useremail."&key=".$fname."&filename=".$lname; 
	$postdata="fname=1234";
$ch = curl_init();

            curl_setopt ($ch, CURLOPT_URL, $url); 
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
            curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
            curl_setopt ($ch, CURLOPT_TIMEOUT, 360); 
            curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt ($ch, CURLOPT_REFERER, $url); 
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
            curl_setopt ($ch, CURLOPT_POST, 1); 
            $result = curl_exec ($ch); 	
            echo $result;
}

if(isset($_POST['submit'])=="Submit")
{
 $fname=$_POST['fname'];
	/*$useremail=$_POST['useremail'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $password=$_POST['password'];
*/
	 $url="http://bluecheck.vestigo.co.in/crl.php"; 
         //$postdata = "useremail=".$useremail."&fname=".$fname."&lname=".$lname."&contact=".$contact."&address=".$address."&password=".$password; 
	$postdata="fname=".$fname;
	 $ch = curl_init();

            curl_setopt ($ch, CURLOPT_URL, $url); 
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
            curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
            curl_setopt ($ch, CURLOPT_TIMEOUT, 360); 
            curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt ($ch, CURLOPT_REFERER, $url); 
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
            curl_setopt ($ch, CURLOPT_POST, 1); 
            $result = curl_exec ($ch); 	
            echo $result;
           /* if($result==1)
            {
                echo "can registred";
            }
            else
            {
                echo "already registered";
            }*/
}

if(isset($_POST['login'])=="Login")
{
     $useremail=$_POST['useremail'];
        $password=$_POST['password'];
        $url="http://bluecheck.vestigo.co.in/index.php/user/user_login"; 
         $postdata = "useremail=".$useremail."&password=".$password; 
	 $ch = curl_init();
         curl_setopt ($ch, CURLOPT_URL, $url); 
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
        curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt ($ch, CURLOPT_REFERER, $url); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
        curl_setopt ($ch, CURLOPT_POST, 1); 
        $result = curl_exec ($ch); 

       if($result==1)
        {
            echo "logged in";
        }
        else
        {
            echo "id pass wrong";
        }
}

if(isset($_POST['send'])=="Send")
{
        $url="http://bluecheck.vestigo.co.in/index.php/api/twillio_api"; 
	$code=$_POST['code'];
         $postdata = "code=".$code; 
	 $ch = curl_init();
         curl_setopt ($ch, CURLOPT_URL, $url); 
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
        curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt ($ch, CURLOPT_REFERER, $url); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
        curl_setopt ($ch, CURLOPT_POST, 1); 
        $result = curl_exec ($ch); 

       if($result==1)
        {
            echo "verified";
        }
        else
        {
            echo "not verified";
        }
}



?>


