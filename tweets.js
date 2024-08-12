$(function(){
	$.ajax({
		url: 'get_user_handle_tweets.php',
		type: 'GET',
		success: function(response2) {
			if (typeof response2.errors === 'undefined' || response2.errors.length < 1) {
				var $tweets2 = $('<div></div>');
				var len = 1;
				$.each(response2.statuses, function(i, obj2) {
						
					var pic_uri_dec2 = decodeURIComponent(obj2.user.profile_image_url);
					
					$tweets2.append('<div id="hm_work"><img width="40px" class="img-rounded" src=' + pic_uri_dec2 + ' />&nbsp;&nbsp; <b> ' + obj2.user.name + '</b> <a href="javascript:;" id="s_n"> @' + obj2.user.screen_name + '</a><small id="time" style="float:right;">' + obj2.created_at.substring(0,10) + '</small><br /><p id="t_text" name=' + len + ' >' + obj2.text.replace(/(^|\s)(#[a-z\d-]+)/ig, "$1<b>$2</b>") + '</p><span><span class="glyphicon glyphicon-retweet" style="color:#00FF00;"></span> ' + obj2.retweet_count + ' </span><span> &nbsp;&nbsp; <span class="glyphicon glyphicon-heart" style="color:#FA344B;"></span> ' + obj2.favorite_count + ' </span></div>');
					len ++ ;	
				});
				$('.tweets-container').html($tweets2);
			}
		}
	});
});