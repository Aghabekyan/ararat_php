		<footer clearfix>
            <div class="copyRight">
                Տեխնիկական հարցերով, կայքի կամ ադմինիստրատիվ մասի հետ խնդիրներ ունենալու դեպքում դիմել Sargssyan Studio: Հեռախոս` 091 40 56 70:
            </div>
		</footer>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=htmDIR?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        
        <?if($activeUser['role'] != 3):?>
            <script type="text/javascript" src="<?=htmDIR.admDIR?>js/datepicker/datepicker.js"></script>
            <script type="text/javascript" src="<?=htmDIR.admDIR?>js/datepicker/eye.js"></script>
            <script type="text/javascript" src="<?=htmDIR.admDIR?>js/datepicker/layout.js?ver=1.0.2"></script>
            <script type="text/javascript" src="<?=htmDIR.admDIR?>js/datepicker/utils.js"></script>
        <?endif;?>

        <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

        <script src="<?=htmDIR.admDIR?>tinymce/tinymce.min.js"></script>
        <script src="<?=htmDIR.admDIR?>tinymce/jquery.tinymce.min.js"></script>
        <script src="<?=htmDIR.admDIR?>js/editor.js?v=1.1"></script>
        <script src="<?=htmDIR?>js/plugins.js?v=4"></script>
        <script src="<?=htmDIR.admDIR?>js/main.js?v=4"></script>
    </body>
</html>
