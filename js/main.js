$(function() {


	// menu toggle ------------------------------------------------------------------------------------------------ //
	
	$('.menuBut').on('click', function(){
		$('.menu').toggle();
	});

	// mobi menu toggle ------------------------------------------------------------------------------------------------ //
	
	$('.mobiMenuBut').on('click', function(){
		$('.mobiMenuBody').toggle();
	});

	
	// Run Line ------------------------------------------------------------------------------------------------ //
	

	var _scroll = {
		delay: 1000,
		easing: 'linear',
		items: 1,
		duration: 0.07,
		timeoutDuration: 0,
		pauseOnHover: 'immediate'
	};
	$('#ticker-1').carouFredSel({
		width: 1000,
		align: false,
		items: {
			width: 'variable',
			height: 35,
			visible: 1
		},
		scroll: _scroll
	});

	
	//	set carousels to be 100% wide
	$('.caroufredsel_wrapper').css('width', '100%');

	
	// Main Slider ------------------------------------------------------------------------------------------------ //

	$('#carousel').carouFredSel({
		responsive: true,
		circular: false,
		auto: 7000,
		items: {
			visible: 1,
		},
		scroll: {
			fx: 'crossfade'
		}
	});

	$('#thumbs').carouFredSel({
		responsive: true,
		circular: false,
		infinite: false,
		auto: false,
		items: {
			visible: {
				min: 4,
				max: 4
			}
		}
	});

	$('#thumbs a').click(function() {
		$('#carousel').trigger('slideTo', '#' + this.href.split('#').pop() );
		$('#thumbs a').removeClass('selected');
		$(this).addClass('selected');
		return false;
	});

	// Most viewed ------------------------------------------------------------------------------------------------------------------------------------------------ // 

	$("select[class='selectPopRange']").on('change', function () {

		var $mostViewedTabs = $("select[class='selectPopRange']").val();
			
		$.ajax({
			url: htmDIR + "?ajax_snippets",
			type: "GET",
			data: {
				action: 'most_viewed',
				day: $mostViewedTabs,
			},
			dataType: "html",
			success: function(data){
				$('.timeLinePop').empty().append(data);
			}
		});

	});

	// Weather ------------------------------------------------------------------------------------------------------------------------------------------ //

	$('.weather').weatherfeed(['2214662']);

	// Clock --------------------------------------------------------------------------------------------------------------------------- //

	setInterval( function() {
		$("#sec").fadeOut().fadeIn();

	},1000);

	setInterval( function() {

		var minutes = new Date().getMinutes();
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);

	},1000);

	setInterval( function() {

		var hours = new Date().getHours();
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		
	}, 1000);



	// setCookie ------------------------------------------------------------------------------------------------------------------------------------------ //

	if ($('#make-count').length) {
		var post_id = $('#make-count').data('id');

		if (typeof getCookie(post_id) === "undefined" ) {
			var url = htmDIR + '?ajax_snippets';
			$.post(url, { 
				id: post_id,
				action: 'hitcounter',
			});
			setCookie(post_id, 'default', 3);
		}
	}




});


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

