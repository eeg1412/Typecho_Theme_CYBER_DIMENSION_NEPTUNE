<?php if(isset($_GET['load_type']) and $_GET['load_type'] == 'ajax'):  ?>
    <?php while($this->next()): ?>
    	<a class="post_item" href="<?php $this->permalink() ?>">
        	<span class="post_blog_time"><?php $this->category(',', false); ?> | <?php $this->date(); ?></span>
        	<div class="post_bg_body">
				<img src="<?php echo showThumb($this,true); ?>" class="post_list_img">
            </div>
            <div class="post_bg_div" style="background-image:url(<?php echo showThumb($this,true); ?>)"></div>
			<p><?php $this->title() ?></p>
		</a>
	<?php endwhile; ?>
    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php return; //完成ajax方式返回，退出此页面?>
<?php endif ?>
<?php
/**
 * 四女神Online主题皮肤
 * 
 * @package 四女神Online
 * @author 广树
 * @version 1.0.1
 * @link https://www.wikimoe.com/?post=96
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="col-mb-12 clearfix index_post_list_body" id="main" role="main">
	<div class="blog_page_loading">
      <div class="loading-text">LOADING</div>
      <div class="loading-content"></div>
    </div>
	<div class="clearfix" id="index_blog_content">
	<?php while($this->next()): ?>
    	<a class="post_item" href="<?php $this->permalink() ?>">
        	<span class="post_blog_time"><?php $this->category(',', false); ?> | <?php $this->date(); ?></span>
        	<div class="post_bg_body">
				<img src="<?php echo showThumb($this,true); ?>" class="post_list_img">
            </div>
            <div class="post_bg_div" style="background-image:url(<?php echo showThumb($this,true); ?>)"></div>
			<p><?php $this->title() ?></p>
		</a>
	<?php endwhile; ?>
    </div>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
