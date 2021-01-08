<div class="sliderbar-container">
<div id="sliderbar" class="move_left">
  <div class="sliderbar-content-menu">
    <div id="sliderbar-profile" class="sliderbar-content">
          <?php if($this->options->avatarUrl != ''): ?>
            <h2><a href="<?php Helper::options()->siteUrl()?>"><img src="<?php echo $this->options->avatarUrl; ?>"/></a></h2>
          <?php else: ?>
            <h2><a href="<?php Helper::options()->siteUrl()?>"><img src="http://www.gravatar.com/avatar/<?php echo md5($this->author->mail); ?>"/></a></h2>
          <?php endif; ?>
          <h2><a href="<?php Helper::options()->siteUrl()?>"><?php $this->options->title(); ?></a></h2>
          <p><?php $this->options->description() ?></p>
          <div id="sliderbar-profile-social">
            <?php if($this->options->bilibiliUrl != ''): ?>
              <a href="<?php echo $this->options->bilibiliUrl; ?>"><img src="<?php $this->options->themeUrl('ico/bilibili.svg'); ?>"></img></a>
            <?php endif; ?>

            <?php if($this->options->GHUrl != ''): ?>
              <a href="<?php echo $this->options->GHUrl; ?>"><img class="github-ico" src="<?php $this->options->themeUrl('ico/github-2.svg'); ?>"></img></a>
            <?php endif; ?>

            <?php if($this->options->TGUrl != ''): ?>
              <a href="<?php echo $this->options->TGUrl; ?>"><img src="<?php $this->options->themeUrl('ico/telegram.svg'); ?>"></img></a>
            <?php endif; ?>

            <?php if($this->options->weiboUrl != ''): ?>
              <a href="<?php echo $this->options->weiboUrl; ?>"><img src="<?php $this->options->themeUrl('ico/weibo.svg'); ?>"></img></a>
            <?php endif; ?>
        </div>
      <hr>
    </div>
  </div>
  <div class="sliderbar-content-menu edgeforce">
    <div class="Sliderbar-content clear">
      <div class="Sliderbar-content-switch clear">
        <h2>CATEGORIES</h2>
        <a onclick="show_slide_content(1);"><i class="i down"></i></a>
      </div>
      <div id="Sliderbar-content-1" class="clear">
        <?php $this->widget('Widget_Metas_Category_List')->parse('<a onclick="sideMenu_toggle()" href="{permalink}">{name}</a>'); ?>
      </div>
    </div>
  </div>
  <div class="sliderbar-content-menu edgeforce">
    <div class="Sliderbar-content clear">
      <div class="Sliderbar-content-switch clear force-float-left">
        <h2>PAGES</h2>
        <a onclick="show_slide_content(2);"><i class="i down"></i></a>
      </div>
      <div id="Sliderbar-content-2" class="clear">
        <a href="<?php Helper::options()->siteUrl()?>" onclick="sideMenu_toggle()">首页</a>
				<?php if ($this->options->enableIndexPage): ?>
						<a href="<?php Helper::options()->siteUrl()?>blog" onclick="sideMenu_toggle()">文章</a>
				<?php endif; ?>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" onclick="sideMenu_toggle()"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
<div id="sliderbar-toc" class="move_right">
  <div class="toc">
  </div>
</div>
</div>
<div id="sliderbar-cover" onclick="sideMenu_toggle();"></div>
<div id="sliderbar-toc-cover" onclick="toc_toggle();"></div>
