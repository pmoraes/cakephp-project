<?php

App::uses('CakeEmail', 'Network/Email');

class EmailService
{
	public function sendEmail($to, $message="", $format = "html") {
		$mail = new CakeEmail('default');
		$mail->from(array('casadovinho@noreply.com' => "Casa do Vinho"));
		$mail->to($to);
		$mail->emailFormat($format);
		$mail->subject('Casa do Vinho');
		try {
			$mail->send($message);
			return true;
		} catch (Exception $e) { 
			return false;
		} 
	}
}