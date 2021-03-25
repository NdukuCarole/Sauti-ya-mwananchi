<?php
// (A) INIT + RUN SETTINGS
set_time_limit(0); // No timeout
$each = 5; // Get 5 subscribers each round
$pause = 1; // 1 sec pause between each email send

// (B) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// (C) LOAD LIBRARY + EMAIL TEMPLATE FROM FILE
require "2-newsletter.php";
$news = new Newsletter();
$template = file_get_contents("3a-template.html");

// (D) EMAIL SUBJECT + HEADER
$subject = "[STORE] Crazy sales";
$headers = implode("\r\n", [
  "From: abc@xyz.com",
  "Reply-To: abc@xyz.com",
  "MIME-Version: 1.0",
  "Content-Type: text/html; charset=utf-8"
]);
$news->prime($headers, $subject);
unset($subject); unset($headers);

// (E) SEND THE EMAIL - BATCH BY BATCH
$all = $news->count();
for ($i=0; $i<$all; $i+=$each) {
	$subscribers = $news->get($i,$each);
	foreach ($subscribers as $sub) {
		$msg = str_replace("[NAME]", $sub['name'], $template);
		$news->send($sub['email'], $msg);
    // If you want to keep a pass/fail send log
    // $pass = $news->send($sub['email'], $msg);
    // if ($pass) { SAVE TO LOG FILE OR DATABASE }
	}
	sleep($pause);
}