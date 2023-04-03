<?php 

    $title = '';
    //в переменную $token нужно вставить токен, который нам прислал @botFather
    $token = "5574120996:AAGxBaq3B2H6zMrwdIk5qwYn_XzkFtqF8Ag";

    //нужна вставить chat_id (Как получить chad id, читайте ниже)
    $chat_id = "-894954961";
    $quiz_for_who = $_POST['quiz_for_who'];
    $quiz_price_limit = $_POST['quiz_price_limit'];
    $quiz_picture_style = $_POST['quiz_picture_style'];
    $quiz_price_limit = $_POST['quiz_price_limit'];
    $convar = $_POST['convar'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $arr = array(
	  '✔️ У вас новая заявка:' => 'Квиз',
	  '-------' => '------- ------- -------',	  
      'Имя: ' => $_POST['quiz_for_who'],
      'Город: ' => $_POST['quiz_price_limit'],
      'Город: ' => $_POST['quiz_picture_style'],
      'Город: ' => $_POST['quiz_price_limit'],
      'Город: ' => $_POST['convar'],
      'Город: ' => $_POST['phone'],
      'Город: ' => $_POST['email'],
    );
    $txt = '';
    foreach($arr as $key => $value) {
   if($value) $txt .= "<b>".$key."</b> ".$value."%0A";
    };	

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
	
	$success_url = "/index.php";
	$message = "ФИО: {$yourName}\nКонтактный телефон: {$yourPhone}";

	$mailto = "info@just1page.ru";
	
	mail($mailto, "Новая заявка" , str_replace(["%0A", '<b>', '</b>'], ["\r\n",'',''], $txt));
	if ($sendToTelegram) {
		header('Location: ' . $success_url);
	} else {
	  echo "Error";
	}
	?>