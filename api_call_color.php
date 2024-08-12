<?php
$text = urlencode ( $_POST['txt'] );

$response = file_get_contents("https://api.uclassify.com/v1/uClassify/Sentiment/classify/?readKey=rXRxzaeGhSxH&text=".$text);
echo $response;
?>