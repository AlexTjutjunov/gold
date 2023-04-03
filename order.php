<?php 

    $title = '';
    //в переменную $token нужно вставить токен, который нам прислал @botFather
    $token = "5806111559:AAFFzL1WA5LZL05VljvzJaslycIEJK9vwqY";

    //нужна вставить chat_id (Как получить chad id, читайте ниже)
    $chat_id = "-523906285";
    $quiz_for_who = $_POST['quiz_for_who'];
    $quiz_price_limit = $_POST['quiz_price_limit'];
    $quiz_picture_style = $_POST['quiz_picture_style'];
    $convar = $_POST['convar'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $arr = array(
	  '✔️ У вас новая заявка:' => 'golden-art-ua.com',
	  '-------' => '------- ------- -------',	  
      'Вопрос1: ' => $_POST['quiz_for_who'],
      'Вопрос2: ' => $_POST['quiz_price_limit'],
      'Вопрос3: ' => $_POST['quiz_picture_style'],
      'Мессенджер: ' => $_POST['convar'],
      'Телефон: ' => $_POST['phone'],
      'E-mail: ' => $_POST['email'],
    );
    $txt = '';
    foreach($arr as $key => $value) {
   if($value) $txt .= "<b>".$key."</b> ".$value."%0A";
    };	

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
	
	$success_url = "/index.html";
	$message = "ФИО: {$yourName}\nКонтактный телефон: {$yourPhone}";

	$mailto = "info@just1page.ru";
	
	mail($mailto, "Новая заявка" , str_replace(["%0A", '<b>', '</b>'], ["\r\n",'',''], $txt));
	if ($sendToTelegram) {
		header('Location: ' . $success_url);
	} else {
	  echo "Error";
	}
	?>