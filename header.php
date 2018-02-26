<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<div id="loading-wrapper">
  <div class="loading-text">LOADING</div>
  <div class="loading-content"></div>
</div>
<div class="blog_body">
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<header id="header" class="clearfix">
    <div class="container blog_top_nav">
        <div class="row">
        
        	<div class="pc_nav_body">
                <div class="site-name col-mb-4">
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                    <p class="description"><?php $this->options->description() ?></p>
                </div>
                
                <div class="col-mb-8 clearfix">
                    <nav id="nav-menu" class="clearfix col-mb-8" role="navigation">
                        <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while($pages->next()): ?>
                        <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
                    </nav>
                    <div class="site-search kit-hidden-tb col-mb-4">
                        <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                            <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                            <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                            <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="phone_nav_body">
                <div class="site-name col-mb-8">
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                    <p class="description"><?php $this->options->description() ?></p>
                </div>
                
                <div class="col-mb-4 clearfix">                    
                    <div class="wikimoe_mobile_nav_open" id="mobile_menu_open"></div>
                    <div class="mobile_nav_body">
                        <div class="mobile_nav_close" id="mobile_menu_close"></div>
                        <ul class="bar">
                            <li class="item common <?php if($this->is('index')): ?>current<?php endif; ?>"><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
                            <?php while($pages->next()): ?>
                            <li class="item common <?php if($this->is('page', $pages->slug)): ?>current<?php endif; ?>"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="wikimoe_overlay_black"></div>
                </div>
            </div>
            
        </div><!-- end .row -->
    </div>
</header><!-- end #header -->
<?php if ($this->is('index')): ?>
<div class="home_goddesses">
	<img src="<?php $this->options->themeUrl('img/key.png'); ?>" class="index_bg_phone_img">
	<div class="home_bt_bar"></div>
    <canvas id='bg' class="star_effect"></canvas>
</div>
<?php else: ?>
<div class="little_white_bg"></div>
<?php endif; ?>
<div id="body" class="<?php if ($this->is('index')): ?> white_body<?php endif; ?>">
    <div class="container">
        <div class="row phone_padding">

    
    
