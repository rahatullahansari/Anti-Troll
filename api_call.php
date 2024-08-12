<?php
$text = urlencode ( $_POST['txt'] );
/*
$array_no = array(1, 2, 3, 4, 5);

    $r_no = rand(0, count($array_no) - 1);
	
	switch ($r_no) {
		case 1:
			$readKey = 'qk1r3xMvadqA';
			break;
		case 2:
			$readKey = 'rXRxzaeGhSxH';
			break;
		case 3:
			$readKey = '784660168109883392';
			break;
		case 4:
			$readKey = '784660168109883392';
			break;
		case 5:
			$readKey = '784660168109883392';
			break;
		
	}
*/
$response = file_get_contents('https://api.uclassify.com/v1/uClassify/Sentiment/classify/?readKey=rXRxzaeGhSxH&text='.$text);
echo $response;
?>