<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Image Uploader</title>
    <link rel="stylesheet" href="<?=htmDIR.admDIR?>css/bootstrap.min.css">
    
    <style>
      #resultLinks {
        cursor: default;
        display: none;
      }
      .img-upload {
        float: left;
        margin: 5px;
      }

    </style>
  </head>
  <body style="background:#F9F9F9;">
    <legend>Ներբեռնված նկարներ</legend>
    <div class="clearfix">
      <? 
        if(!empty($uploadedImages)) foreach ($uploadedImages as $img) {
          $img = ret_img($img, 75, 75);
          echo "<img class='img-upload' src='$img'>";
        }
      ?>
    </div>

    <div class="tc mt10" style="position: absolute; bottom:0; right:0">
      <button id="imgUploadOk" class="btn btn-primary" type="button">
        <i class="icon-ok icon-white"></i>
        OK
      </button>
    </div>
    <hr>
  <div class="row-fluid">
     <textarea id="resultLinks" class="span7" rows="4"><?= json_encode($uploadedImages) ?></textarea>
  </div>

  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?=htmDIR?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

  <script>
    $(function(){
      $("#imgUploadOk").on('click', function(){
        window.parent.$.fancybox.close();
      });
      $("#resultLinks").on('click', function(){
          $(this).select();
      });
    });
  </script>


  </body>
</html>



