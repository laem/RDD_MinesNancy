<?php
	require_once 'PHPMailer_5.2.0/class.phpmailer.php';
	require_once 'PHPMailer_5.2.0/class.smtp.php';
	
			$client_mail = new PHPMailer();
			$client_mail->IsHTML(true);
			$client_mail->SMTPAuth= true;
			$client_mail->IsSMTP();
			$client_mail->Host= "smtp.free.fr";
			$client_mail->Port= 587;
			$client_mail->Username="purrock";
			$client_mail->Password= "stanan";
			$client_mail->SetFrom("alex.gapin@mines.inpl-nancy.fr","alex gapin");
			$client_mail->CharSet = 'utf-8';
			$client_mail->Subject = "test rdd";
			$client_mail->MsgHTML("test");
			$client_mail->AddAddress("alex.gapin@mines.inpl-nancy.fr", ' ');
			
			$client_mail->Send();
		}
	?>