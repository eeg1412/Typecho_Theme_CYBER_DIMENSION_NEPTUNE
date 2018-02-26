<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 post_content_body" id="main" role="main">
      <h1 class="post-title" title="<?php $this->title() ?>"><?php $this->title() ?></h1>
      <div class="post_content_box">
        <article class="post">
            <ul class="post-meta post-mate-info-body">
                <li itemprop="author"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
                <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
                <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                <?php if($this->user->hasLogin()):?>
                  <li><a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>"  target="_blank">编辑</a></li>
                <?php endif;?>
            </ul>
            <div class="post-content" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
            <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
        </article>
    
        <?php $this->need('comments.php'); ?>
    
        <ul class="post-near">
            <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
            <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
        </ul>
    </div>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>
