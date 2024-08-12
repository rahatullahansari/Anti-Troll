<?php header('Access-Control-Allow-Origin: *'); ?>
<html lang="en">
<head>
   <title>Anti-Troll</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="lib/w3.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/main.css">
   <style>
      body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
      .w3-navbar,h1,button {font-family: "Montserrat", sans-serif}
      .fa-anchor,.fa-coffee {font-size:200px}
   </style>
   </head>
   
	<body>
      <!-- Header -->
      <script type="text/javascript" >
         function send_user(){
         	var dataString1 = 'user=' + document.getElementById('username').value;
         	$.ajax({
         		type: "POST",
         		url: "get_user_handle_tweets.php",
         		data: dataString1,
         		cache: false,
         		
         		success: function(response2) {
         			if (typeof response2.errors === 'undefined' || response2.errors.length < 1) {
         				var $tweets2 = $('<div id="text_form"></div>');
         				var l = 0;
         				$.each(response2.statuses.reverse(), function(i, obj2) {
         					
         					var pic_uri_dec2 = decodeURIComponent(obj2.user.profile_image_url);
							var w = String(obj2.text);
         					var word = w.replace(/(?:https?|ftp):\/\/[\n\S]+/g, '');
							var regexp = new RegExp('#([^\\s]*)','g');
							word = word.replace(regexp,'');
							var regexp_u = new RegExp('^@\\w+|\\s@\\w+','g');
							word = word.replace(regexp_u, '');
							word = word.replace("RT", "");
							word = word.trim();
							word = word.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
							word = "'"+word.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '')+"'";
							
							//var sc = sent_color(word);
							//var word = "'Congratulations to the Winners of Contest! Please inbox us your details along with ID Proof at the earliest'";
         					$tweets2.append('<div id="hm_work" onclick="sent('+word+')" name="' + obj2.id_str + '" data-toggle="modal" data-target="#myModal"><img width="40px" class="img-rounded" src=' + pic_uri_dec2 + ' />&nbsp;&nbsp; <b> ' + obj2.user.name + '</b> <a href="javascript:;" id="s_n"> @' + obj2.user.screen_name + '</a><small id="time" style="float:right;">' + obj2.created_at.substring(0,19) + '</small><br /><p id="t_text-'+ l +'" name='+ l +' >' + obj2.text.replace(/(^|\s)(#[a-z\d-]+)/ig, "$1<b>$2</b>") + '</p><span><span class="glyphicon glyphicon-retweet" style="color:#00FF00;"></span> ' + obj2.retweet_count + ' </span><span> &nbsp;&nbsp; <span class="glyphicon glyphicon-heart" style="color:#FA344B;"></span> ' + obj2.favorite_count + ' </span></div>');
							/*
							var text_id = "t_text-" + l;
							var box  = document.getElementById(text_id);
							if (sc>50){
								box.style.backgroundColor = "#00CC00";
							}
							else if(sc<50){
								box.style.backgroundColor = "#FF0000";
							}
							*/
							
         					l++;
         				});
         				$('.tweets-container').html($tweets2);
						$('#last_id1').html(response2.statuses[response2.statuses.length-1].id_str);
						//word = "";
						send_user1($('#last_id1').html());
         			}
         		}
         	});
			
         }
         
         function send_user1(last_id){
         	var dataString1 = 'user=' + document.getElementById('username').value;
         	$.ajax({
         		type: "POST",
         		url: "get_user_handle_tweets1.php?last_id=" + last_id,
         		data: dataString1,
         		cache: false,
         		
         		success: function(response3) {
         			if (typeof response3.errors === 'undefined' || response3.errors.length < 1) {
         				var $tweets3 = $('<div id="text_form"></div>');
         				var x = 0;
         				$.each(response3.statuses.reverse(), function(i, obj3) {
         					
         					var pic_uri_dec3 = decodeURIComponent(obj3.user.profile_image_url);
							var w = String(obj3.text);
         					var word = w.replace(/(?:https?|ftp):\/\/[\n\S]+/g, '');
							var regexp = new RegExp('#([^\\s]*)','g');
							word = word.replace(regexp,'');
							var regexp_u = new RegExp('^@\\w+|\\s@\\w+','g');
							word = word.replace(regexp_u, '');
							word = word.replace("RT", "");
							word = word.trim();
							word = word.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
							word = "'"+word.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '')+"'";
							
							//var sc = sent_color(word);
							//var word = "'Congratulations to the Winners of Contest! Please inbox us your details along with ID Proof at the earliest'";
         					$tweets3.append('<div id="hm_work" onclick="sent('+word+')" name="' + obj3.id_str + '" data-toggle="modal" data-target="#myModal"><img width="40px" class="img-rounded" src=' + pic_uri_dec3 + ' />&nbsp;&nbsp; <b> ' + obj3.user.name + '</b> <a href="javascript:;" id="s_n"> @' + obj3.user.screen_name + '</a><small id="time" style="float:right;">' + obj3.created_at.substring(0,19) + '</small><br /><p id="t_text-'+ x +'" name='+ x +' >' + obj3.text.replace(/(^|\s)(#[a-z\d-]+)/ig, "$1<b>$2</b>") + '</p><span><span class="glyphicon glyphicon-retweet" style="color:#00FF00;"></span> ' + obj3.retweet_count + ' </span><span> &nbsp;&nbsp; <span class="glyphicon glyphicon-heart" style="color:#FA344B;"></span> ' + obj3.favorite_count + ' </span></div>');
							/*
							var text_id = "t_text-" + l;
							var box  = document.getElementById(text_id);
							if (sc>50){
								box.style.backgroundColor = "#00CC00";
							}
							else if(sc<50){
								box.style.backgroundColor = "#FF0000";
							}
							*/
							
         					x++;
         				});
						$('#last_id2').html(response3.statuses[0].id_str);
         				$('.tweets-container').append($tweets3);
						
						//word = "";
						if($('#last_id1').html() !== $('#last_id2').html()){
							$('#last_id1').html($('#last_id2').html());
							send_user1($('#last_id2').html());
						}
         			}
         		}
         	});
			
         }
		 
		 function get_first(){
         	var dataString1 = 'id=' + $('#last_id2').html();
         	$.ajax({
         		type: "POST",
         		url: "get_user_handle_tweets_first.php",
         		data: dataString1,
         		cache: false,
         		
         		success: function(response4) {
         			if (typeof response4.errors === 'undefined' || response4.errors.length < 1) {
         				var $tweets4 = $('<div id="first_tweet"></div>');
         				//var x = 0;
         				//$.each(response4.statuses.reverse(), function(i, obj4) {
         					
         					var pic_uri_dec4 = decodeURIComponent(response4.user.profile_image_url);
							var w = String(response4.text);
         					var word = w.replace(/(?:https?|ftp):\/\/[\n\S]+/g, '');
							var regexp = new RegExp('#([^\\s]*)','g');
							word = word.replace(regexp,'');
							var regexp_u = new RegExp('^@\\w+|\\s@\\w+','g');
							word = word.replace(regexp_u, '');
							word = word.replace("RT", "");
							word = word.trim();
							word = word.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
							word = "'"+word.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '')+"'";
							
							//var sc = sent_color(word);
							//var word = "'Congratulations to the Winners of Contest! Please inbox us your details along with ID Proof at the earliest'";
         					$tweets4.append('<div id="hm_work" onclick="sent('+word+')" name="' + response4.id_str + '" data-toggle="modal" data-target="#myModal"><img width="40px" class="img-rounded" src=' + pic_uri_dec4 + ' />&nbsp;&nbsp; <b> ' + response4.user.name + '</b> <a href="javascript:;" id="s_n"> @' + response4.user.screen_name + '</a><small id="time" style="float:right;">' + response4.created_at.substring(0,19) + '</small><br /><p>' + response4.text.replace(/(^|\s)(#[a-z\d-]+)/ig, "$1<b>$2</b>") + '</p><span><span class="glyphicon glyphicon-retweet" style="color:#00FF00;"></span> ' + response4.retweet_count + ' </span><span> &nbsp;&nbsp; <span class="glyphicon glyphicon-heart" style="color:#FA344B;"></span> ' + response4.favorite_count + ' </span></div>');
							/*
							var text_id = "t_text-" + l;
							var box  = document.getElementById(text_id);
							if (sc>50){
								box.style.backgroundColor = "#00CC00";
							}
							else if(sc<50){
								box.style.backgroundColor = "#FF0000";
							}
							*/
							
         					//x++;
         				//});
						//$('#last_id2').html(response4.statuses[0].id);
         				$('.tweets-container').html($tweets4);
						
						//word = "";
						/**
						if($('#last_id1').html() !== $('#last_id2').html()){
							$('#last_id1').html($('#last_id2').html());
							send_user1($('#last_id2').html());
						}
						**/
         			}
         		}
         	});
         }
		 
		 
         function sent(text){
         	var tex = text;
			//var data = 'readKey=' + document.getElementById('username').value;
         	$.ajax({
         		type: "POST",
				//api.uclassify.com/v1/uClassify/Sentiment/classify/?readKey=qk1r3xMvadqA&text=I+am+so+bad+today
				url: "api_call.php",
         		//url: "phpInsight-master/examples/demo.php",{ code: code, userid: userid }
                data: {txt: tex},
				headers: { 
                    'Content-Type': 'application/x-www-form-urlencoded' ,
    //                'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Origin': 'http://127.0.0.1',
                    'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE, OPTIONS',
                    'Access-Control-Allow-Headers': 'Content-Type, application/x-www-form-urlencoded'
                    },
				
         		success: function(response6) {
         				var $tweets6 = $('<p></p>');
         					var obj = JSON.parse(response6);
         					$tweets6.append('<p id="sent_p" >Positive: ' + ((obj.positive)*100).toFixed(0) + "%" + '</p><p id="sent_n" >Negative: ' + ((obj.negative)*100).toFixed(0) + "%" + '</p>');
         				$('.sent').html($tweets6);
         			
         		}
         	});
			
			
			/*
         	$.ajax({
         		type: "POST",
         		url: "phpInsight-master/examples/demo_n.php",
         		data: {data_n : tex},
         		cache: false,
         		success: function(response5) {
         				var $tweets5 = $('<p></p>');
         					var obj = JSON.parse(response5);
         					$tweets5.append('<p id="n_s" >' + obj.neg + '</p>');
         				$('.sent_n').html($tweets5);
         		}
         	});
			*/
         }
		 
		 function sent_color(text){
			var tex = text;
			//var data = 'readKey=' + document.getElementById('username').value;
			$.ajax({
				type: "POST",
				//api.uclassify.com/v1/uClassify/Sentiment/classify/?readKey=qk1r3xMvadqA&text=I+am+so+bad+today
				url: "api_call_color.php",
				//url: "phpInsight-master/examples/demo.php",{ code: code, userid: userid }
				data: {txt: tex},
				
				success: function(response5) {
					var obj5 = JSON.parse(response5);
					var per = ((obj5.positive)*100).toFixed(0)
					return per;
				}
			});
		}
		
      </script>
      <header class="w3-container w3-blue w3-center w3-padding-128">
         <img src="css/WhatsApp Image 2017-02-11 at 1.45.16 AM.jpeg" style="width:150px; border-radius:5px;"/>
         <h1 class="w3-margin w3-jumbo">ANTI-TROLL</h1>
         <h1 class="w3-xlarge">Differentiate your <u>Grievances</u> from <u>Troll Farm</u></h1>
         <br><br>
         <input class="w3-border" id="username" type="text" placeholder="Username" style="width:300px; height:50px; border-radius:5px; padding:20px; color:#333333; background:#fff;"><br>
         <button onClick="send_user()" class="w3-btn w3-padding-16 w3-large w3-margin-top" style="border-radius:5px;">Get Started</button><br><br>
      </header>
      <br>
      <br>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Sentiment Analysis</h4>
               </div>
               <div class="modal-body">
                  <p class="sent"></p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12 text-center w3-center">
         <h2>Analysis</h2>
         <br>
      </div>
      <br>
      <div class="w3-container tweets-container" style="width:600px; margin:auto;"></div>
	  <p id="last_id1"></p>
	  <p id="last_id2"></p>
      <!-- Footer -->
      <footer class="w3-container w3-padding-64 w3-center w3-opacity">
         <div class="w3-xlarge w3-padding-32">
            <a href="#" class="w3-hover-text-indigo"><i class="fa fa-facebook-official"></i></a>
            <a href="#" class="w3-hover-text-red"><i class="fa fa-pinterest-p"></i></a>
            <a href="#" class="w3-hover-text-light-blue"><i class="fa fa-twitter"></i></a>
            <a href="#" class="w3-hover-text-grey"><i class="fa fa-flickr"></i></a>
            <a href="#" class="w3-hover-text-indigo"><i class="fa fa-linkedin"></i></a>
         </div>
         <p>Powered by <a href="http://www.anti-troll.com" target="_blank">Anti-Troll</a></p>
      </footer>
   </body>
</html>