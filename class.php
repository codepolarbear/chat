<?php

require_once("chat.class.php");
$mode =$_POST['mode'];

$id=0;

$chat = new Chat();

if ($mode=='SendAndRetrieveNew'){
    
    $name = $_POST['name'];
    $message = $_POST['message'];
     $color = $_POST['color'];
      $id = $_POST['id'];
    
    if ($name !=''|| $message !=''|| $color !=''){
        $chat->postNewMessage($name,$message,$color);
        
    }elseif ($mode =='DeleteAndRetrieveNew'){
        $chat->deleteAllMessage();
        
    }elseif($mode=='RetrieveNew')
    $id =$_POST['id'];
    
    
}


//Headers are sent to prevent browsers from caching
if (ob_get_length()) ob_clean();
header('Cache-Control:no-cache,must-revalidate');
header('Pragma:no-cache');
header('Content-Type:text/xml');

echo $chat ->getNewMessages($id);















?>