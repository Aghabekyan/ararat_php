$(function (){

	$(document).on('click', '.get_poll_url', function () {
		
		var pollURL = $(this).data('url'); 
	
 		$.fancybox({
            'content' : "<div style='width:500px; height:20px'>" + pollURL + "</div>",
        });

	});

	$(document).on('click', '.poll_add', function () {
		var poll_unit = $('.poll_unit_box').eq(0).clone();
		var counter = $('.poll_unit_box').length + 1;

		poll_unit.find('#ans_num').html(counter);
		poll_unit.find("input").val('');
		poll_unit.find("input").attr('name', 'answer[]');
			
		$('.poll_left').append(poll_unit);
	});

	$(document).on('click', '.poll_dell', function () {
		$(this).closest('.poll_unit_box').remove();
	});

	$('.add_poll').on('click', function () {
		$('.poll_cont').slideToggle();	
	});

	$("#setTime").on("click", function(){
		var time = new Date(),
			timeNice = time.format("yyyy-mm-dd HH:MM:ss");

			$("#postPublished").val(timeNice);
	});

	$(".chose_img_btn").each(function() {

		var that = $(this),
			clickedId = that.prop('id');


		that.fancybox({
			// type : 'ajax',
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			helpers: {
			    overlay: {
			      locked: false
			    }
			},
			beforeClose : function(){
				
				if (clickedId == "mainImgButton") {
					var links = $('.fancybox-inner iframe').contents().find('#resultLinks').val();
					
					if (typeof(links) == 'undefined') return;

					links = JSON.parse(links);
					var mainIMG = '';

					mainIMG += "<img src='" + htmDIR + 'timthumb.php?src=' + links + '&h=150&w=248' + "'>";
					mainIMG += "<input class='img_title' type='text' name='main_img_title'>";
					mainIMG += "<input type='hidden' name='userfile' value='" + links + "'>";
					$('#main_img').html(mainIMG);
					
				}
				else if (clickedId == "themeImgButton") {
					var links = $('.fancybox-inner iframe').contents().find('#resultLinks').val();
					
					if (typeof(links) == 'undefined') return;

					links = JSON.parse(links);
					var mainIMG = '';

					mainIMG += "<input type='hidden' name='userfile' value='" + links + "'>";
					$('#theme_img').html(mainIMG);
					
				}
				else {
					var links = $('.fancybox-inner iframe').contents().find('#resultLinks').val();
					if (typeof(links) == 'undefined') return;
					
					links = JSON.parse(links);

					var pageURL = document.URL;
					pageURL = pageURL.indexOf("id=");
					var gal_val = '';
					
					if (pageURL > 1) {
						if (typeof(links) != 'undefined') {

							for (i in links) {
								gal_val += "<div class='adm_gallery'>";
									gal_val += "<span>Delete</span>";
									gal_val += "<img src='" + htmDIR + 'timthumb.php?src=' + links[i] + '&h=150&w=248' + "'>";
									gal_val += "<input class='img_title' type='text' name='img_title[]'>";
									gal_val += "<input type='hidden' name='gallery_url[]' value='" + links[i] +"'>";
								gal_val += "</div>";							}

							$('.gallery_update').append(gal_val);
						}
					}	
					else {

						for (i in links) {
							gal_val += "<div class='adm_gallery'>";
								gal_val += "<span>Delete</span>";
								gal_val += "<img src='" + htmDIR + 'timthumb.php?src=' + links[i] + '&h=150&w=248' + "'>";
								gal_val += "<input class='img_title' type='text' name='img_title[]'>";
								gal_val += "<input type='hidden' name='gallery_url[]' value='" + links[i] +"'>";
							gal_val += "</div>";
						}
						console.log(gal_val);
						$('#gallery_url').append(gal_val);
					}
				}				

			}
		});

	});

	var $openBannerBtn = $(".adm-leg");
	$openBannerBtn.on('click', function(e){
		$(this).parent().find(".banner-show-hid-cont").toggle();
	});		


	// choose subcats categories --------------------------------------------------------------------- //

	$('input:radio[name=subdomain]').on ('click', function (){
		var subdomain = $(this).val();

        $.ajax({
            type:"POST",
            url: htmDIR + "?ajax_snippets",
            data: {
            	'action': 'getcats',
            	'id': subdomain
            },	
            success: function(data){
            	$('#cats').empty();
            	$('#cats').append(data).show('slow');

            	if (subdomain == 2) {
            		var time = new Date(),
					timeNice = time.format("yyyy-mm-dd HH:MM:ss");
	
					$('#cats').append("<input class='afisha_input' name='cdate' type='text' value='" + timeNice + "'>");            		
            	}
            }
        });		

	});	

	// delete image from gallery ----------------------------------------------------------------------- //

	$(document).on ('click', '.adm_gallery span', function () {
		$(this).closest('.adm_gallery').remove();
	});


});