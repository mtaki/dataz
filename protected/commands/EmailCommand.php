<?php
Yii::import('application.extensions.email.PHPMailer');
class EmailCommand extends CConsoleCommand{
	public function run($args){
		
		echo date("Y-m-d H:i:s - ")."Email send process has started...\n";
		$mailer = new PHPMailer();
		$params=Yii::app()->params;
		$email=$params;
		$mailer->IsSMTP(); // telling to send this mail using SMTP				
		$mailer->SMTPAuth = $email->SMTPAuth; // enable SMTP authentication
		$mailer->SMTPSecure = $email->SMTPSecure; // sets the prefix to the servier
		$mailer->Host = $email->Host; // sets Google Mail as the SMTP server
		$mailer->Port = $email->Port; // set the SMTP port for the GMAIL server
		$mailer->Username = $email->Username; // Your(GMail) username
		$mailer->Password = $email->Password; // Your(GMail) password
		
		$emails=Email::model()->findAll("status='new'");
			foreach($emails as $em){
				$body = $em->body;
				$body = eregi_replace("[\]", '', $body);
				$mailer->SetFrom($em->sender);
				//$mailer->AddReplyTo($em->sender);
				
				$mailer->Subject = $em->subject;
				$mailer->MsgHTML($body);
			 	$mailer->isHTML(true);
				
				$address = $em->receiver;
				$mailer->AddAddress($address);
			 
				if(!$mailer->Send()) {
			 		echo "Mailer Error: " . $mailer->ErrorInfo;
			 		$em->status='not sent';
					$em->save(false);
				}
				else {
			 		echo "Message sent!";
					$em->status='sent';
					$em->save(false);
				}
			}
			
	}
}
?>
