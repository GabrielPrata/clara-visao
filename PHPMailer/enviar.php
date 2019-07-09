<?php
	require_once("PHPMailerAutoload.php");

	$mail = new PHPMailer();

	$mail->isSMTP();

	$mail->SMTPOptions = array(
		'ssl'=> array(
			'verify_peer'=> false,
			'verify_peer_name'=> false,
			'allow_self_signed'=> true
		)
	);

	$mail->SMTPDebug=2;

	$mail->Host = "smtp.gmail.com";

	$mail->SMTPSecure = "tls";

	$mail-> Port = 587;

	$mail->SMTPAuth = true;

	$mail->Username='meu email';
	$mail->Password='senha';


	$mail->setFrom('meu email', 'Site(para esconder o email)');
	$mail->addAddress('email que vai');
	$mail->Subject = 'Titulo do email';
	$mail->Body = 'Texto do email';

	if ($mail->send()) {
		print "email enviado";
	} else {
		print "erro ao enviar";
	}

?>