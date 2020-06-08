<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'conn.php';
//session_start();

//insert quote request
if(isset($_POST['btn_basic_quote']))
{
	if($_POST['btn_basic_quote'])
	{
        
        $q_name= $_POST['q_name'];
        $q_email= $_POST['q_email'];
        $q_mobile= $_POST['q_mobile']; 
        $q_desc= $_POST['q_desc'];
		$qry="INSERT INTO `quote`(`q_name`, `q_email`, `q_mobile`, `q_desc`) VALUES ('$q_name','$q_email','$q_mobile','$q_desc')";
        $ans=mysqli_query($con, $qry);
        //$con->exec($qry);		
		if($ans > 0)
		{
            //mail code 
            $mail = new PHPMailer(true);

            try {
                //Server settings               
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'noreply.bitweb@gmail.com';                     // SMTP username
                $mail->Password   = 'Patel@05';                               // SMTP password
                $mail->SMTPSecure = 'tls';
                //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('noreply.bitweb@gmail.com', 'Quote : BITWEB');
                $mail->addAddress($q_email);     // Add a recipient
                $mail->addAddress('sales.bitweb@gmail.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('patelankit.pa05@gmail.com');
               
               
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Welcome to capitalind '.$q_name;
                $mail->Body    = '<div>Hello '.ucfirst($q_name).',</div>  

                <div><i>Greeting of the day</i></div>
                <div><span>We will contact you soon.</span><div>
                <div>Regards</div>
                <div>Capital ind</div>
                <div>8848484848</div>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            //alert of success
            echo "<script> window.alert('Your entry is accepted, we will contact you soon')</script>";
            echo "<script>location.href='../index.php';</script>";
        }
        else
        {
            echo "<script> window.alert('Something went wrong')</script>";
            //echo "<script>location.href='../index.php';</script>";          
        }

	}
}
?>