$(function() {

	$(window).scroll(function() {
		var scrollTop = $(this).scrollTop();
		if(scrollTop > 45) {
			$('header').addClass('fixed');
			$('#to_top_btn').addClass('active');
		} else {
			$('header').removeClass('fixed');
			$('#to_top_btn').removeClass('active');
		}
	})

	$('#to_top_btn').click(function() {
		$('body').animate({scrollTop: 0}, 300);
	})
	$('.has-submenu>a').click(function() {
		$(this).toggleClass('active');
	})
	$('.has-submenu>a').blur(function() {
		console.log($('.submenu:hover').length);
		if (!($('.submenu:hover').length)) {
			$(this).removeClass('active');
		} else {
			$(this).focus();
		}
	})


	$('#haylur_slider').carouFredSel({
		auto: false,
		prev: '#prev2',
		next: '#next2',
		pagination: "#pager2",
		mousewheel: true,
		swipe: {
			onMouse: true,
			onTouch: true
		}
	});


	// Weather ------------------------------------------------------------------------------------------------------------------------------------------ //


	$.simpleWeather({
	location: 'yerevan',
	woeid: '',
	unit: 'c',
	success: function(weather) {
	  $(".deg").html(weather.temp)
	},
	error: function(error) {
	  console.log('WERR');
	}
	});



	// Clock --------------------------------------------------------------------------------------------------------------------------- //

	setInterval( function() {
		$("#sec").fadeOut().fadeIn();

	},1000);

	setInterval( function() {

		var minutes = new Date().getMinutes();
		$("#minutes").html(( minutes < 10 ? "0" : "" ) + minutes);

	},1000);

	setInterval( function() {

		var hours = new Date().getHours();
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		
	}, 1000);


	// Rate ------------------------------------------------------------------------------------------------------------------------------------------ //

	$.ajax({
	    url: "?rate",
	    type: "GET",
	    // crossDomain : true,
	    // xhrFields: {
	    //     withCredentials: true
	    // },
	    success: function(data) {
	    	var res = data.split(" ");
	    	$(".curr_usd").html("USD " + res[0])
	    	$(".curr_eur").html("EUR " + res[1])
	    	$(".curr_rub").html("RUB " + res[2])
	        // console.log(res[0]);
	    	console.log(res)
	    },
	    error: function(xhr) {
	        //Do Something to handle error
	    }
	});



	// setCookie ------------------------------------------------------------------------------------------------------------------------------------------ //

	if ($('#make-count').length) {
		var post_id = $('#make-count').data('id');

		if (typeof getCookie(post_id) === "undefined" ) {
			var url = '/?ajax_snippets';
			$.post(url, { 
				id: post_id,
				action: 'hitcounter',
			});
			setCookie(post_id, 'default', 3);
		}
	}




})


/* set/get cookie interface */	
function setCookie(c_name,value,exhours) {
	var exdate=new Date();
	exdate.setHours(exdate.getHours() + exhours);
	var c_value=escape(value) + ((exhours==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}
function getCookie(c_name){
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++){
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x=x.replace(/^\s+|\s+$/g,"");
		if (x==c_name){
			return unescape(y);
		}
	}
}

