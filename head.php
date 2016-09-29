<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="ie-stand">
    <title>
        <?php
        if (is_home()) {
            bloginfo('name');
            echo " - ";
            bloginfo('description');
        } elseif (is_category()) {
            single_cat_title();
            echo " - ";
            bloginfo('name');
        } elseif (is_single() || is_page()) {
            single_post_title();
        } elseif (is_search()) {
            echo "搜索结果";
            echo " - ";
            bloginfo('name');
        } elseif (is_404()) {
            echo '页面未找到!';
        } else {
            wp_title('', true);
        }
        ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <?php wp_head(); ?>
    <link rel="stylesheet" href="wp-content/themes/landinetwork/css/normalize.css">
    <link rel="stylesheet" href="wp-content/themes/landinetwork/css/main.css">
    <!--font-awesome.css-->
    <link href="wp-content/themes/landinetwork/css/font-awesome-4.5.0.min.css" rel="stylesheet" type="text/css">
    <!--Animate.css-->
    <link href="wp-content/themes/landinetwork/css/animate.min.css" rel="stylesheet" type="text/css">
    <!--jQuery-->
    <script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="wp-content/themes/landinetwork/js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

    <!--Plugins-->
        <!--navbar-->
        <link href="wp-content/themes/landinetwork/plugins/navbar/navbar.css" rel="stylesheet" type="text/css">
        <script src="wp-content/themes/landinetwork/plugins/navbar/navbar.js"></script>
        <!--smallslide-->
        <link href="wp-content/themes/landinetwork/plugins/smallslide/smallslide.css" rel="stylesheet" type="text/css">
        <script src="wp-content/themes/landinetwork/plugins/smallslide/smallslide.js"></script>

    <!--My stylesheet link-->
    <link href="wp-content/themes/landinetwork/style.css" rel="stylesheet" type="text/css" >
    <script src="wp-content/themes/landinetwork/js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
