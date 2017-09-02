<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Ararat TV | Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
 
        <link rel="stylesheet" href="<?=htmDIR.admDIR?>css/normalize.css">
        <link rel="stylesheet" href="<?=htmDIR.admDIR?>css/admin.css?v=4">
        <link rel="stylesheet" href="<?=htmDIR?>css/jquery.fancybox.css">

        <?if($activeUser['role'] != 3):?>
            <link rel="stylesheet" href="<?=htmDIR.admDIR?>css/privelegy_1.css">
            <link rel="stylesheet" href="<?=htmDIR.admDIR?>css/datepicker.css">
        <?endif;?>
        
    </head>
    <body>		
        <script>
            var htmDIR = "<?= htmDIR ?>";
            var lang   = "<?= $lang['name'] ?>";
        </script>
		<header>
            <div class="logo">
                <a href="<?= createURL(0, 0, 1) ?>"><img src="<?=htmDIR.admDIR.'img/logo.png'?>"></a>
            </div>
            <div class="hmd"></div>
            <div class="post_counter">
                <div class="post_counter_ttl"><?= $t['header']['main_count'] ?></div>
                <div class="post_counter_ttl"><?= $t['header']['today'] ?><span><?= $post_counter ?></span></div>
                <form method="GET" action="<?=htmDIR.admDIR?>">
                    <div class="post_counter_ttl">
                        <div class="by_day"><?= $t['header']['by_date'] ?></div>
                        <div class="by_day_count"><?= isset($day_counter) ? $day_counter : '---' ?></div>    
                        <input type="submit" class="by_day_sbm" value="<?= $t['header']['search1'] ?>" <?= $activeUser['role'] == 3 ? "disabled='disabled'" : ''?> >
                        <div class="default_calendar"><input type="date" name="post_count"></div>
                    </div>
                </form>
            </div>
            <div class="hmd"></div>
            <div class="header-name"><?= $t['header']['user']?> <?= $activeUser['name'] ?></div>
            <div class="header_right clearfix">

                <div class="choose_sbd">
                <? if (!empty($subdomains)): ?>
                    <? if (isset($_GET['person_id'])): ?>                
                        <select name="subdomain" data-route="<?= "person_posts&person_id={$_GET['person_id']}" ?>">  
                    <? else: ?>
                        <select name="subdomain" data-route="index">  
                    <? endif; ?>    
                        <option value="all">Բոլորը</option>
                        <? foreach ($subdomains as $value): ?>
                        <option value="<?= $value['id'] ?>" <?= isset($_GET['subdomain']) && $_GET['subdomain'] == $value['id'] ? 'selected' : '' ?>><?= $value['title'] ?></option>
                        <? endforeach; ?>
                    </select>
                <? endif; ?>        
                </div>
                <div class="searchInput">
                    <form method="post" action="<?=htmDIR.admDIR?>?search">
                            <input class="adm_s_btn" placeholder="<?= $t['header']['example'] ?>6534" name="search" value="<?= !empty($sid) ? $sid : '' ?>"/>
                            <input class="sbm_btn" type="submit" value="">
                    </form>
                </div>
            </div>
		</header>