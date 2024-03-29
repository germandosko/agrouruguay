<?php

/**
 * @author			German Dosko
 * @version			March 6, 2013
 * @filesource		/Utils/Server/Mail.php
 */
class Mail{

	const TYPE_TEXT = 'text/plain';
	const TYPE_HTML = 'text/html';
	const CHARSET_ISO = 'iso-8859-1';
	const CHARSET_UTF = 'utf-8';
	
	/**
	 *	The receiver email address
	 */
	const TO = 'davidc.ferre@gmail.com'; //'agrouruguay2010@hotmail.com'
	
	/**
	 *	The email addresses to copy
	 */
	private $cc = array();
	
	/**
	 *	The email subject
	 */
	private $subject = 'Consulta desde el sitio web Agrouruguay2010.com';
	
	/**
	 *	The transmitter name
	 */
	private $name;
	
	/**
	 *	The transmitter email address
	 */
	private $from;
	
	/**
	 *	The mail content
	 */
	private $content;
	
	/**
	 *	The mail content type
	 */
	private $type;
	
	/**
	 *	The mail content charset
	 */
	private $charset;
	
	/**
	 *	The mail errors
	 */
	public $errors = array();
	
	
	/**
	 * Initializes properties
	 *
	 * @param		string		$from
	 * @param		string		$name
	 * @param		string		$content
	 * @param		string		$subject
	 */
	public function __construct($from='', $name='', $content='', $subject='', $type=self::TYPE_HTML, $charset=self::CHARSET_ISO) {
		$this->setName($name);
		$this->setFrom($from);
		$this->setContent($content);
		$this->setSubject($subject);
		$this->setType($type);
		$this->setCharset($charset);
	}
	
	/**
	 * Sets the transmitter name
	 *
	 * @param		string		$name
	 */
	public function setName($name) {
		if(!empty($name)){
			$this->name = trim($name);
		} elseif(!empty($_POST['name'])) {
			$this->name = trim($_POST['name']);
		}
	}
	
	/**
	 * Sets the transmitter email address
	 *
	 * @param		string		$from
	 */
	public function setFrom($from) {
		if(!empty($from)){
			$this->from = trim($from);
		} elseif(!empty($_POST['from'])) {
			$this->from = trim($_POST['from']);
		}
	}
	
	/**
	 * Sets the mail content
	 *
	 * @param		string		$content
	 */
	public function setContent($content) {
		if(!empty($content)){
			$this->content = trim($content);
		} elseif(!empty($_POST['content'])) {
			$this->content = trim($_POST['content']);
		}
	}
	
	/**
	 * Sets the mail subject
	 *
	 * @param		string		$subject
	 */
	public function setSubject($subject) {
		if(!empty($subject)){
			$this->subject = trim($subject);
		} elseif(!empty($_POST['subject'])) {
			$this->subject = trim($_POST['subject']);
		} else {
			$this->subject = $this->name . ': ' . $this->subject; //Use the default subject
		}
	}
	
	/**
	 * Sets the mail content type
	 *
	 * @param		string		$type
	 */
	public function setType($type) {
		if($type == self::TYPE_TEXT){
			$this->type = self::TYPE_TEXT;
		} else {
			$this->type = self::TYPE_HTML;
		}
	}
	
	/**
	 * Sets the mail content charset
	 *
	 * @param		string		$charset
	 */
	public function setCharset($charset) {
		if($charset == self::CHARSET_ISO){
			$this->charset = self::CHARSET_ISO;
		} else {
			$this->charset = self::CHARSET_UTF;
		}
	}
	
	/**
	 * Gets the sender name
	 *
	 * @return		string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Gets the sender mail
	 *
	 * @return		string
	 */
	public function getFrom() {
		return $this->from;
	}
	
	/**
	 * Gets the mail content
	 *
	 * @return		string
	 */
	public function getContent() {
		return $this->content;
	}
	
	/**
	 * Sends the email to the proper receivers
	 */
	public function send() {
		if(!$this->validate()){
			return false;
		}
		$header = 'From: ' . $this->from . " \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: ".$this->type."; charset=".$this->charset;
		
		$to = self::TO;
		if(is_array($this->cc) && !empty($this->cc)){
			$to .= ', ' . implode(', ', $this->cc);
		}
		
		$message = "<b>Mensaje enviado por:</b> " . trim($this->name) . "<br />";
		$message .= "<b>e-mail: </b>" . $this->from . " <br /><br />";
		$message .= "<b>Mensaje: </b><br />" . nl2br(htmlentities(utf8_decode(trim($this->content)), ENT_COMPAT, 'UTF-8', false)) . " <br /><br />";
		$message .= "<b>Fecha: </b>" . date('d/m/Y', time());
		
		mail($to, $this->subject, utf8_decode($message), $header);
		return true;
	}
	
	/**
	 * Validates the email properties
	 */
	private function validate() {
		$valid = true;
		if($this->name == null){
			$this->errors['name'] =  'Debe ingresar su nombre';
			$valid = false;
		}
		if($from = Validate::Email($this->from)){
			$this->from = $from;
		} else {
			$this->errors['from'] = 'Debe ingresar un mail valido';
			$valid = false;
		}
		if($this->content == null){
			$this->errors['content'] = 'Debe ingresar una consulta'; 
			$valid = false;
		}
		return $valid;
	}
}