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
	
	////////////////////////////////////////////////////////////////////////////////////////////STICKERS
	
    if(stripos($update->message->text, 'perotto') !== false || stripos($update->message->text, 'minimo') !== false)
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
	else if(stripos($update->message->text, 'ddio') !== false || stripos($update->message->text, ' dio') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADFgADs0NYB9Ni7NpyEnj1Ag" //gesu
    		]);
    }
	else if(stripos($update->message->text, 'incazz') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADGgADs0NYBxXUnFUZnhMbAg" //keepcalm
    		]);
    }
	else if(stripos($update->message->text, 'pausa') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADFAADs0NYB3egiWxpZ_zLAg" //coffee
    		]);
    }
	else if(stripos($update->message->text, 'aiuto') !== false  || stripos($update->message->text, 'alessio') !== false || stripos($update->message->text, 'una mano') !== false)
    {
    	$response = $client->sendSticker([
    		'chat_id' => $update->message->chat->id,
    		'sticker' => "BQADBAADKgADs0NYB4q4U1oCTvRXAg" //need him
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
	else if(stripos($update->message->text, 'vado') !== false)
    {	
		$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => "Ma dove vai?? Sono solo le 18..."
				]);	 
    }
	else if(stripos($update->message->text, 'ancora in ufficio') !== false)
    {	
		$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => "Prenoto da Yury il Magnifico?"
				]);	 
    }
	else if(stripos($update->message->text, 'release') !== false)
    {	
		$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => "Release?? Io prendo ferie..."
				]);	 
    }
	else if(stripos($update->message->text, 'fretta') !== false)
    {	
		$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => "Non ti preoccupare, andiamo in produzione ieri..."
				]);	 
    }
	else if(
		stripos($update->message->text, 'pc') !== false ||
		stripos($update->message->text, 'computer') !== false ||
		stripos($update->message->text, 'cpu') !== false ||
		stripos($update->message->text, 'server') !== false ||
		stripos($update->message->text, ' nas') !== false ||
		stripos($update->message->text, 'database') !== false ||
		stripos($update->message->text, 'ram') !== false ||
		stripos($update->message->text, 'hard') !== false ||
		stripos($update->message->text, 'ssd') !== false ||
		stripos($update->message->text, 'giga ') !== false ||
		stripos($update->message->text, 'db') !== false ||
		stripos($update->message->text, 'processore') !== false ||
		stripos($update->message->text, 'internet') !== false ||
		stripos($update->message->text, 'windows') !== false ||
		stripos($update->message->text, 'explorer') !== false ||
		stripos($update->message->text, 'chrome') !== false ||
		stripos($update->message->text, 'cache') !== false ||
		stripos($update->message->text, 'memory') !== false ||
		stripos($update->message->text, 'wifi') !== false ||
		stripos($update->message->text, 'password') !== false ||
		stripos($update->message->text, 'query') !== false 
		)
    {	
		$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => "Caspita, tu devi essere un Hacker!"
				]);	 
    }
	else if(stripos($update->message->text, 'ux') !== false || stripos($update->message->text, 'experience') !== false || stripos($update->message->text, 'iannas') !== false)
    {	
		$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => "Prima regola della User Experience: Non parlare mai della User Experience."
				]);	 
    }

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
		if($spamCounter>=2)
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
		$spamCounter=1;
	}
	$lastSender = $update->message->from->id;
	$sql = "UPDATE SpamTable SET lastUserId='$lastSender', spamCounter=$spamCounter WHERE 1";
	
	$conn->query($sql);
	
	$conn->close();
	
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
