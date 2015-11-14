<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title><?=$this->config->item('application_name')?> - <?=lang('restricted_heading')?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <link rel="stylesheet" href="<?php echo asset_url('css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo asset_url('css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo asset_url('css/AdminLTE.css'); ?>" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="<?php echo asset_url('img/dialog.png'); ?>" />
    </head>
    <body class="bg-black">

        <div class="form-box" id="forgot-passowrd-box">
            <div class="header bg-red"><?=lang('restricted_heading')?></div>
            <div class="body bg-gray text-center"><h4><?=lang('restricted_text')?></h4></div>
            <div class="footer">                                                               
                <button onclick="history.back()" class="btn bg-red btn-block"><?=lang('button_back')?></button>  
            </div>

        </div>

        <script src="<?php echo asset_url('bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo asset_url('jquery-2.1.1.min.js'); ?>" type="text/javascript"></script>        

    </body>
</html>