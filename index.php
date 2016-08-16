<?php

/*
* This file is part of GeeksWeb Bot (GWB).
*
* GeeksWeb Bot (GWB) is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License version 3
* as published by the Free Software Foundation.
* 
* GeeksWeb Bot (GWB) is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.  <http://www.gnu.org/licenses/>
*
* Author(s):
*
* © 2015 Kasra Madadipouya <kasra@madadipouya.com>
*
*/
require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api('265001835:AAE6giEUaEwE8TdY38DPJ-NACy6roZL9T_Q'); // Set your access token
$url = ''; // URL RSS feed


$servername = "sql7.freemysqlhosting.net";
$username = "sql7131643";
$dbname = "sql7131643";
$password = "xuqFSSyUd6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$update = json_decode(file_get_contents('php://input'));

//your app
try {
	
	///////////////////////////////////////////////////////////SPAM EVENT//////////////////////////
	
	$sql = "SELECT lastUserId, spamCounter FROM SpamTable";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$spamCounter = intVal($row["spamCounter"]);
			$lastSender = $row["lastUserId"];
		}
	}
	if($update->message->from->id == $lastSender)
	{
		if($spamCounter>=3)
		{
			$response = $client->sendSticker([
				'chat_id' => $update->message->chat->id,
				'sticker' => "BQADBAADHAADs0NYB8lR4Urhkp5LAg" //spam
    		]);
			$spamCounter=0;
		}else{
			$spamCounter++;
		}
		
	}
	else{
		$spamCounter=0;
	}
	$lastSender = $update->message->from->id;
	$sql = "UPDATE SpamTable SET lastUserId='$lastSender', spamCounter=$spamCounter WHERE 1";
	
	$conn->query($sql);
	
	
	////////////////////////////////////////////////////////////////////////////////////////////STICKERS
	
    if(stripos($update->message->text, 'perotto') !== false)
    {
		//$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADBgADs0NYBytirq7IWXiiAg" //perotto muscoloso
    		]);
    }
	else if(stripos($update->message->text, 'niente da fare') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADHgADs0NYBzqC4yBl75iTAg" //sto lavorando
    		]);
    }
	else if(stripos($update->message->text, 'grazie') !== false || stripos($update->message->text, 'thank') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADMgADs0NYB7gtnTy9Pv8QAg" //grazie di tutto
    		]);
    }
	else if(stripos($update->message->text, 'campagna') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADDgADs0NYB96mVjH8jmEkAg" //e
    		]);
    }
	else if(stripos($update->message->text, 'può fare') !== false || stripos($update->message->text, 'puo fare') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADJgADs0NYB4RGrN0AATP4WwI" //non si può fare
    		]);
    }
	else if(stripos($update->message->text, 'ciao') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADMAADs0NYB3sXUeq5oWLtAg" //ciao ragazzi
    		]);
    }
	
	////////////////////////////////////////////////////////////////////////////////////////VIDEO
	else if(stripos($update->message->text, 'accompagnare') !== false)
    {
		$index = intVal(rand(1,5));
		
		switch($index){
			case 1:
				$text = "https://www.youtube.com/watch?v=Eyc2II0k3DE"; //batman
				break;
			case 2:
				$text = "https://www.youtube.com/watch?v=Om2E5dcevLM"; //intervista
				break;
			case 3:
				$text = "https://www.youtube.com/watch?v=TjAINxud8uM"; //giapponese
				break;
			case 4:
				$text = "https://www.youtube.com/watch?v=z9tyjOB4r1I"; //chef toni
				break;
			case 5:
				$text = "https://www.youtube.com/watch?v=W9QIE1OytWg"; //original
				break;		
		}
		
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => $text 
    		]);	
    }
	else if(stripos($update->message->text, 'becco') !== false || stripos($update->message->text, 'becchi') !== false || stripos($update->message->text, 'vincitore') !== false)
    {
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "https://www.youtube.com/watch?v=Jo07YIB3HBU" 
    		]);	
    }
	
	///////////////////////////////////////////////////////////////////////////////////TESTI
	
	else if(stripos($update->message->text, 'mirco') !== false || stripos($update->message->text, 'triste') !== false)
    {
		$sql = "SELECT body FROM Battute ORDER BY RAND() LIMIT 1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$body = $row["body"];
				
			}
		}
		
		$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $body
				]);	 
    }
	$conn->close();
	
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
