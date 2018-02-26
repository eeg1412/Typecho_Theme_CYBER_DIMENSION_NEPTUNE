<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 post_content_body" id="main" role="main">
	<h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
	<div class="post_content_box">
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="post-content" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
        </article>
        <?php $this->need('comments.php'); ?>
    </div>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
