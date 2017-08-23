
$(function(){
	$("#text_editor").tinymce({

	    width : 676,
		height : 450,
	    keep_styles: false,
	    menubar:false,
	    statusbar: false,
	    paste_as_text: false,
	    toolbar: "insertfile undo redo | styleselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code fullscreen",
	    toolbar_items_size: "small",
	    fontsize_formats: "14px 16px 18px",
	    plugins: [
	        "advlist autolink lists link image charmap anchor",
	        "visualblocks code fullscreen",
	        "insertdatetime media table",
	        "contextmenu paste"
	    ]

	});

	$('.toggle').on('click', function(){
		$(".updatesToggleBox").slideToggle();
		return false;
	});
});