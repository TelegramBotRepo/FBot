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
$update = json_decode(file_get_contents('php://input'));

//your app
try {

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
	else if( stripos($update->message->text, 'campanello') !== false)
    {
    	$response = $client->sendAudio([
    		'chat_id' => $update->message->chat->id,
    		'audio' => "media/t_voice529247392294240311.ogg" //blublublu1
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
