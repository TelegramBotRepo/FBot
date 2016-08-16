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
	$conn->close();
	
	
    if($update->message->text == '/email')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => "You can send email to : Kasra@madadipouya.com"
     	]);
    }
	else if(stripos($update->message->text, 'perotto') !== false)
    {
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
	else if( stripos($update->message->text, 'campanello') !== false)
    {
    	$response = $client->sendVoice([
    		'chat_id' => $update->message->chat->id,
    		'voice' => "media/t_voice529247392294240311.ogg" //blublublu1
    		]);
    }
	
	
	/*
    else
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Invalid command, please use /help to get list of available commands"
    		]);
    }
	*/

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
