<?php
class Newsletter {
	private $pdo = null;
	private $stmt = null;
	private $headers = "";
	private $subject = "";

  // (A) CONSTRUCTOR - CONNECT TO DATABASE
	function __construct(){
		try {
			$this->pdo = new PDO(
				"mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
				DB_USER, DB_PASSWORD, [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				]
			);
		} catch (Exception $ex) { die($ex->getMessage()); }
	}

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
	function __destruct(){
		if ($this->stmt!==null) { $this->stmt = null; }
		if ($this->pdo!==null) { $this->pdo = null; }
	}

  // (C) COUNT TOTAL NUMBER OF SUBSCRIBERS
	function count(){
		$sql = "SELECT COUNT(*) `cnt` FROM `users`";
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->execute();
		$result = $this->stmt->fetchAll();
		return $result[0]['cnt'];
	}

  // (D) GET SUBSCRIBERS
	function get($start=0, $end=10){
    $sql = "SELECT * FROM `users` LIMIT $start,$end";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
		return $this->stmt->fetchAll();
	}

  // (E) PRIME EMAIL HEADERS & SUBJECT
	function prime($headers="", $subject=""){
		$this->headers = $headers;
		$this->subject = $subject;
	}

  // (F) SEND MAIL
	function send($to, $message){
		return @mail($to, $this->subject, $message, $this->headers);
	}
}