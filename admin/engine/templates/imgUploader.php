<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Image Uploader</title>
    <link rel="stylesheet" href="<?=htmDIR.admDIR?>css/bootstrap.min.css">
    	
  </head>
  <body style="background:#F9F9F9;">
  	<legend>Image Uploader</legend>

  	<form name="imgUploader" id="imgUploadForm" method="post" enctype="multipart/form-data" action="<?=htmDIR.admDIR.'?uploadImg'?>">

		<div class="row-fluid imgField">
			<div class="span5">
				<input type="file" name="img[]" required multiple>
			</div>
		</div>

		<div class="tc controlsDiv" style="position: absolute; bottom: 0; right: 0;">

			<button class="btn btn-primary " id="submitUploadForm">
	            <i class="icon-ok-circle icon-white"></i> 
	            Upload
	        </button>

		</div>

	</form>

	<div id="imgUploaderBar" class="hide">
		<label>Uploading Images, please wait...</label>
		<div class="progress progress-striped active">
		  <div class="bar" style="width: 100%;"></div>
		</div>
	</div>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=htmDIR?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

	<script>
    	$(function(){

    		var $fieldTemplate = $('.imgField:first').clone();

    		$('.addField').on('click', function(){
				var $fieldTemplateClone = $fieldTemplate.clone();
				$fieldTemplateClone.insertBefore(".controlsDiv");
    		});

    		$(document).on('click', '.buttonRemove' , function(){
    			$(this).closest('.imgField').remove();
    		});


    		$("#submitUploadForm").on("click", function(){
			    if ($('.imgField').size() < 1){
			    	return false;
			    }
			    else {
			    	$("#imgUploadForm").fadeOut("fast", function(){
			    		$("#imgUploaderBar").fadeIn("fast", function(){
			    			$("imgUploadForm").submit();
			    		});
			    	});
			    }
			});

    	});
    </script>

  </body>
</html>



