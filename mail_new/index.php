<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

    <?php 

require 'class.phpmailer.php';

if (isset($_POST['submit'])) {

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$message=$_POST['message'];

	$mail = new PHPMailer(); 
	
	$mail->Host = "files.000webhost.com";//je website ma upload karo e hosting nu host name
	$mail->SMTPAuth = true;
	$mail->Port = "21";//je website upload karo eno port number
	
	$mail->From = "Kashyap_Website";
	$mail->FromName = "$fname  $lname";
	$mail->AddAddress ("kashyapvadi132@gmail.com");
	$mail->AddCC ($email);
	
	$mail->IsHTML(true);
	
	$mail->Subject = $fname."  ".$lname;
	$mail->Body = "<br>
	
	<div style='width: 100%; height: 50%;  background-image: linear-gradient(to right, red , yellow); color: white;'>
		<br><br><br><br>
		<table align='center' style='padding-top: 10%; padding-bottom: 10%; border-collapse: collapse; width: 80%;'>
			<tr style='padding: 8px;  text-align: left;  border-bottom: 1px solid white; font-size:22px;'>
				<td style=''>Nmae</td><td>$fname	$lname</td>
			</tr>
			<tr style='padding: 8px;  text-align: left;  border-bottom: 1px solid white; font-size:22px;'>
				<td style=''>Mobile Number</td><td>$mobile</td>
			</tr>
			<tr style='padding: 8px;  text-align: left;  border-bottom: 1px solid white; font-size:22px;'>
				<td style=''>Email</td><td>$email</td>
			</tr>
			<tr style='padding: 8px;  text-align: left;  border-bottom: 1px solid white; font-size:22px;'>
				<td style=''>Message</td><td><pre>$message</pre> </td>
			</tr>

		</table><br><br><br><br>

	</div>
	
	";
	
		if (!$mail->Send()) {
			echo "<script>alert('Mail Not Send')</script>";
		}
		else{
			echo "<script>alert('Mail Send succesful')</script>";
		}

}

?>
	

        <div class="container-fluid">
            <div class="container" >
                <div class="formBox">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1>Contact form</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox ">

                                    <input type="text" name="fname" class="input" placeholder="First Name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">

                                    <input type="text" name="lname" class="input" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">

                                    <input type="text" name="email" class="input" placeholder="Email">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">

                                    <input type="number" name="mobile" class="input" placeholder="Mobile" mix="10">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">

                                    <textarea class="input" name="message" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" name="submit" class="button" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>