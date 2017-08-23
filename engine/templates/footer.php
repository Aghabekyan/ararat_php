          <footer>
          <div class="clearfix">
               <div class="footerLinksBox clearfix">
                    <div class="footerLinks">
                         <div class="footerLinksTitle"><?= $t['footer']['all_cats'] ?></div>
                         <div class="linkBox">
                              <? $counter = 0 ?>
                              <? foreach ($categories as $key => $value): ?>
                                <? if ($counter == 0 || $counter % 5 == 0): ?>
                                  <div class="menuDubl">
                                <? endif; ?>  
                                     <a href="<?= createURL("cat={$key}") ?>"><?= $value ?></a>
                                <? if ( ($counter + 1) % 5 == 0 || $counter == count($categories) - 1): ?>
                                  </div>
                                <? endif; ?>
                                <? $counter++ ?>
                              <? endforeach; ?>  
                         </div>
                    </div>
                    <div class="footerLinks">
                         <div class="footerLinksTitle"><?= $t['footer']['more'] ?></div>
                         <div class="linkBox">
                              <a href="<?= createURL('contacts') ?>"><?= $t['footer']['contacts'] ?></a>
                              <a href="<?= createURL('about') ?>"><?= $t['footer']['about'] ?></a>
                         </div>
                    </div>
                    <!--<div class="footerLinks">
                         <div class="footerLinksTitle">Հաշվիչներ</div>
                         <div class="linkBox">
                         </div>
                    </div>-->
                    <div class="signatures">
                         <a href="http://sargssyan.pro" target="_blank" class="clearfix">
                              <span>Design:</span>
                              <br />
                              <img src="img/sargssyan_studio.png" title="Design by Sargssyan Studio" alt="Sargssyan Studio">
                         </a>
                         <a href="http://redmedia.am" target="_blank" class="clearfix">
                              <span>Development & Support:</span>
                              <br />
                              <img src="img/red_media.png" title="Development & Support by Red Media" alt="Red Media">
                         </a>
                    </div>
               </div>
               <div class="copy">
                    Հասցե՝ Երևան, Վարդանանց 16, բն. 45,  <br />
                    Հեռ.՝ +37410 54-04-09  <br />
                    Էլ-փոստ՝ info@nyut.am <br />
               </div>
               <div class="copy">
                    Սույն կայքում տեղ գտած լրատվական հրապարակումների հեղինակային իրավունքը պատկանում է բացառապես Nyut.am լրատվական-վերլուծական գործակալությանը։ <br />
                    Սույն կայքի հրապարակումների (մասնակի կամ ամբողջական) վերահրապարկման համար անհրաժեշտ է Nyut.am գործակալության գրավոր թույլտվությունը։ <br />
               </div>
          </div>
          </footer>
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="<?= htmDIR ?>js/plugins.js?v=0.1"></script>
        <script src="<?= htmDIR ?>js/main.js?v=0.5"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>