<?php
error_reporting(0);
if (!defined('__EDGE_ROOT_DIR__')) exit;
function themeConfig($form) {
    echo "<link rel='stylesheet' href='/usr/themes/default/css/S.css'/>";
    echo "<h2>主题设置</h2>";
    $favicon = new Edge_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('图标') , _t(''));
    $form->addInput($favicon);
    $bkimg = new Edge_Widget_Helper_Form_Element_Text('bkimg', NULL, NULL, _t('背景图片') , _t('想要啥背景？'));
    $form->addInput($bkimg);
    $bkcolor = new Edge_Widget_Helper_Form_Element_Text('bkcolor', NULL, NULL, _t('背景颜色') , _t('如果没有想要的背景就换成纯色吧'));
    $form->addInput($bkcolor);
    $headerbkcolor = new Edge_Widget_Helper_Form_Element_Text('headerbkcolor', NULL, NULL, _t('头部背景颜色') , _t('#787878'));
    $form->addInput($headerbkcolor);
    $beian = new Edge_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('备案号') , _t('没备案当我没说'));
    $form->addInput($beian);
    $builtTime = new Edge_Widget_Helper_Form_Element_Text('builtTime', NULL, NULL, _t('运行时间') , _t('格式YYYY-MM-DD'));
    $form->addInput($builtTime);
    $animateTime = new Edge_Widget_Helper_Form_Element_Text('animateTime', NULL, NULL, _t('动画过渡时间') , _t('格式 1s'));
    $form->addInput($animateTime);
    $feedimage = new Edge_Widget_Helper_Form_Element_Text('feedimage', NULL, NULL, _t('打赏二维码图片') , _t('http://...'));
    $form->addInput($feedimage);
    $defaultPostimage = new Edge_Widget_Helper_Form_Element_Text('defaultPostimage', NULL, NULL, _t('没有设置文章头图的就用这里的图片啦') , _t('http://...'));
    $form->addInput($defaultPostimage);
    $headerLOGO = new Edge_Widget_Helper_Form_Element_Text('headerLOGO', NULL, NULL, _t('头部logo') , _t('如果留空则不显示'));
    $form->addInput($headerLOGO);
    $Links = new Edge_Widget_Helper_Form_Element_Textarea('Links', NULL, NULL, _t('友情链接'), _t('按照格式输入链接信息，格式：<br><strong>链接名称,链接地址,链接描述,链接分类</strong><br>不同信息之间用英文逗号“,”分隔，例如：<br><strong>Edge,https://mcedge.ink/,寻找有趣的灵魂,好朋友,https://xxx.xxx.com/avatar.jpg</strong><br>多个链接换行即可，一行一个'));
    $form->addInput($Links);
    $avatarUrl = new Edge_Widget_Helper_Form_Element_Text('avatarUrl', NULL, NULL, _t('侧栏头像地址'), _t('填入一个你的头像 URL 地址, 留空则使用gravatar头像'));
    $form->addInput($avatarUrl);
    $bilibiliUrl = new Edge_Widget_Helper_Form_Element_Text('bilibiliUrl', NULL, NULL, _t('侧栏B站地址'), _t('留空则不显示图标'));
    $form->addInput($bilibiliUrl);
    $weiboUrl = new Edge_Widget_Helper_Form_Element_Text('weiboUrl', NULL, NULL, _t('侧栏微博地址'), _t('留空则不显示图标'));
    $form->addInput($weiboUrl);
    $TGUrl = new Edge_Widget_Helper_Form_Element_Text('TGUrl', NULL, NULL, _t('侧栏Telegram地址'), _t('留空则不显示图标'));
    $form->addInput($TGUrl);

    $GHUrl = new Edge_Widget_Helper_Form_Element_Text('GHUrl', NULL, NULL, _t('侧栏Github地址'), _t('留空则不显示图标'));
    $form->addInput($GHUrl);
    $enableIndexPage = new Edge_Widget_Helper_Form_Element_Radio('enableIndexPage', array(
        '1' => _t('cool') ,
        '0' => _t('nope')
    ) , '0', _t('是否使用独立页面做首页') , _t('默认为关闭'));
    $form->addInput($enableIndexPage);

    $articlePath = new Edge_Widget_Helper_Form_Element_Text('articlePath', NULL, NULL, _t('头部文章路径') , _t('默认index.php/blog'));
    $form->addInput($articlePath);

    $enableSmooth = new Edge_Widget_Helper_Form_Element_Radio('enableSmooth', array(
        '1' => _t('开启') ,
        '0' => _t('关闭')
    ) , '1', _t('开启平滑滚动') , _t('默认为开启'));
    $form->addInput($enableSmooth);

    $enablenprogress = new Edge_Widget_Helper_Form_Element_Radio('enablenprogress', array(
        '1' => _t('开启') ,
        '0' => _t('关闭')
    ) , '0', _t('开启加载进度条') , _t('默认为关闭'));
    $form->addInput($enablenprogress);

    $enableHeaderSearch = new Edge_Widget_Helper_Form_Element_Radio('enableHeaderSearch', array(
        '1' => _t('开启') ,
        '0' => _t('关闭')
    ) , '0', _t('在头部添加一个搜索') , _t('默认为关闭'));
    $form->addInput($enableHeaderSearch);

    $enableUpyun = new Edge_Widget_Helper_Form_Element_Radio('enableUpyun', array(
        '1' => _t('我是盟友') ,
        '0' => _t('啥东西，不要')
    ) , '0', _t('又拍云联盟开关') , _t('默认为关闭'));
    $form->addInput($enableUpyun);
    $enableAliLogo = new Edge_Widget_Helper_Form_Element_Radio('enableAliLogo', array(
        '1' => _t('阿里云主机？') ,
        '0' => _t('不给广告费就算了')
    ) , '0', _t('阿里云图标') , _t('默认为关闭'));
    $form->addInput($enableAliLogo);
    $enableOpac = new Edge_Widget_Helper_Form_Element_Radio('enableOpac', array(
        '1' => _t('喜欢') ,
        '0' => _t('不要，快瞎了')
    ) , '0', _t('半透明开关') , _t('默认为打开'));
    $form->addInput($enableOpac);

    $IndexStyle = new Edge_Widget_Helper_Form_Element_Radio('IndexStyle', array(
        '2' => _t('大图') ,
        '1' => _t('单列') ,
        '0' => _t('双列')
    ) , '0', _t('首页样式') , _t('默认为双列'));
    $form->addInput($IndexStyle);



    $Customcss = new Edge_Widget_Helper_Form_Element_Textarea('Customcss', NULL, NULL, _t('自定义css'), _t('#logo{...}'));
    $form->addInput($Customcss);
    $Customskriptzh = new Edge_Widget_Helper_Form_Element_Textarea('Customskriptzh', NULL, NULL, _t('自定义JavaScript(head前)'), _t('var...'));
    $form->addInput($Customskriptzh);
    $Customskriptzf = new Edge_Widget_Helper_Form_Element_Textarea('Customskriptzf', NULL, NULL, _t('自定义JavaScript(footer后，主题含JQ)'), _t('var...'));
    $form->addInput($Customskriptzf);

    $db = Edge_Db::get();
    $sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:G'));
    $ysj = $sjdq['value'];
    if(isset($_POST['type']))
    {
    if($_POST["type"]=="备份模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Gbf'))){
    $update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:Gbf');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    if($ysj){
         $insert = $db->insert('table.options')->rows(array('name' => 'theme:Gbf','user' => '0','value' => $ysj));
         $insertId = $db->query($insert);
    echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }
    }
            }
    if($_POST["type"]=="还原模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Gbf'))){
    $sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Gbf'));
    $bsj = $sjdub['value'];
    $update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:G');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
    <?php
    }else{
    echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
    }
    }
    if($_POST["type"]=="删除备份数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Gbf'))){
    $delete = $db->delete('table.options')->where ('name = ?', 'theme:Gbf');
    $deletedRows = $db->query($delete);
    echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
    }
    }
    }
    echo '<div id="backup"><form class="protected Data-backup" action="?Gbf" method="post"><h4>数据备份</h4>
    <input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form></div>';
}

function themeFields(Edge_Widget_Helper_Layout $layout)
{
    $excerpt = new Edge_Widget_Helper_Form_Element_Textarea('excerpt', null, null, '文章引语', '会显示在标题下方，单栏模式时会覆盖文章摘要');
    $layout->addItem($excerpt);
    $imgurl = new Edge_Widget_Helper_Form_Element_Text('imgurl', null, null, '文章主图', '该图片会用于主页文章列表及文章头图的显示。');
    $layout->addItem($imgurl);
}

//感谢泽泽大佬的代码
Edge_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Gx','reply2see');
Edge_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Gx','reply2see');
Edge_Plugin::factory('dashboard/write-post.php')->bottom = array('Gx', 'addButton');
Edge_Plugin::factory('dashboard/write-page.php')->bottom = array('Gx', 'addButton');

class Gx {

    public static function reply2see($con,$obj,$text)
    {
      $text = empty($text)?$con:$text;
      if(!$obj->is('single')){
        $text = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'',$text);
      }
      return $text;
    }

    public static function addButton()
    {
      echo '  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.7/G/CSS/OwO.min.css?v=2" rel="stylesheet" />';

        echo '
        <style>
          .wmd-button-row{
            height:auto;
          }
          .wmd-button{
            color:#999;
          }
          .OwO{
            background:#fff;
          }
          #g-shortcode{
            line-height: 30px;
            background:#fff;
          }
          #g-shortcode a{
            cursor: pointer;
            font-weight:bold;
            font-size:14px;
            text-decoration:none;
            color: #999 !important;
            margin:5px;
            display:inline-block;
          }
        </style>
        ';

        echo '<script src="/usr/themes/default/skriptz/editor.js"></script>';


    }

}

require_once __DIR__ . '/lib/Parsedown.php';
require_once __DIR__ . '/lib/shortcode.php';


/**
* 网站运行时间
*
* @access public
* @param mixed $arg1
*/
function getBuildTime($builtTime) {
  echo $builtTime;
}


/**
* 文章阅读次数
*
* @access public
* @param mixed
* @return
*/
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Edge_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Edge_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Edge_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}


/**
* 通过id获取文章信息
*
* @access public
* @param mixed
* @return
*/

function GetPostById($id){

		$db = Edge_Db::get();
		$result = $db->fetchAll($db->select()->from('table.contents')
			->where('status = ?','publish')
			->where('type = ?', 'post')
			->where('cid = ?',$id)
		);
		if($result){
			$i=1;
			foreach($result as $val){
				$val = Edge_Widget::widget('Widget_Abstract_Contents')->push($val);
				$post_title = htmlspecialchars($val['title']);
				$post_permalink = $val['permalink'];
        $post_date = $val['created'];
        $post_date = date('Y-m-d',$post_date);
				echo '<div class="ArtinArt">
                  <h4><a href="'.$post_permalink.'">'.$post_title.'</a></h4>
                  <p class="clear"><span style="float:left">ID:'.$id.'</span><span style="float:right">'.$post_date.'</span></p>
                </div>';
			}
		}
    else{
      return '<span>id无效QAQ</span>';
    }
}


/**
* 时间友好化
*
* @access public
* @param mixed
* @return
*/
function formatTime($time)
{
    $text = '';
    $time = intval($time);
    $ctime = time();
    $t = $ctime - $time; //时间差
    if ($t < 0) {
        return date('Y-m-d', $time);
    }
    ;
    $y = date('Y', $ctime) - date('Y', $time);//是否跨年
    switch ($t) {
        case $t == 0:
            $text = '刚刚';
            break;
        case $t < 60://一分钟内
            $text = $t . '秒前';
            break;
        case $t < 3600://一小时内
            $text = floor($t / 60) . '分钟前';
            break;
        case $t < 86400://一天内
            $text = floor($t / 3600) . '小时前'; // 一天内
            break;
        case $t < 2592000://30天内
            if($time > strtotime(date('Ymd',strtotime("-1 day")))) {
                $text = '昨天';
            } elseif($time > strtotime(date('Ymd',strtotime("-2 days")))) {
                $text = '前天';
            } else {
                $text = floor($t / 86400) . '天前';
            }
            break;
        case $t < 31536000 && $y == 0://一年内 不跨年
            $m = date('m', $ctime) - date('m', $time) -1;

            if($m == 0) {
                $text = floor($t / 86400) . '天前';
            } else {
                $text = $m . '个月前';
            }
            break;
        case $t < 31536000 && $y > 0://一年内 跨年
            $text = (11 - date('m', $time) + date('m', $ctime)) . '个月前';
            break;
        default:
            $text = (date('Y', $ctime) - date('Y', $time)) . '年前';
            break;
    }

    return $text;
}

/**
* 图片计数
*
* @access public
* @param mixed
* @return
*/
function imgNum($content){
  $output = preg_match_all('#<img(.*?) src="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#', $content,$s);
  $cnt = count( $s[1] );
  return $cnt;
}

/**
* 评论锚点修复
*
* @access public
*/
function Comment_hash_fix($archive){
  $header = "<script type=\"text/javascript\">
  (function () {
      window.EdgeComment = {
          dom : function (id) {
              return document.getElementById(id);
          },
          create : function (tag, attr) {
              var el = document.createElement(tag);
              for (var key in attr) {
                  el.setAttribute(key, attr[key]);
              }
              return el;
          },
          reply : function (cid, coid) {
              var comment = this.dom(cid), parent = comment.parentNode,
                  response = this.dom('" . $archive->respondId . "'), input = this.dom('comment-parent'),
                  form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                  textarea = response.getElementsByTagName('textarea')[0];
              if (null == input) {
                  input = this.create('input', {
                      'type' : 'hidden',
                      'name' : 'parent',
                      'id'   : 'comment-parent'
                  });
                  form.appendChild(input);
              }
              input.setAttribute('value', coid);
              if (null == this.dom('comment-form-place-holder')) {
                  var holder = this.create('div', {
                      'id' : 'comment-form-place-holder'
                  });
                  response.parentNode.insertBefore(holder, response);
              }
              comment.appendChild(response);
              this.dom('cancel-comment-reply-link').style.display = '';
              if (null != textarea && 'text' == textarea.name) {
                  textarea.focus();
              }
              return false;
          },
          cancelReply : function () {
              var response = this.dom('{$archive->respondId}'),
              holder = this.dom('comment-form-place-holder'), input = this.dom('comment-parent');
              if (null != input) {
                  input.parentNode.removeChild(input);
              }
              if (null == holder) {
                  return true;
              }
              this.dom('cancel-comment-reply-link').style.display = 'none';
              holder.parentNode.insertBefore(response, holder);
              return false;
          }
      };
  })();
  </script>
  ";
  return $header;
}



/**
* 文章内容解析（短代码，表情）
*
* @access public
* @param mixed
* @return
*/
function emotionContent($content)
{
    //HyperDown解析
    //$Parsedown = new Parsedown();
    //$content =  $Parsedown->text($content);
    //表情解析
    $fcontent = preg_replace('#\@\((.*?)\)#','<img src="/usr/themes/default/image/bq/$1.png" class="bq">',$content);
    //感谢Maicong大佬的短代码解析QwQ
    $fcontent = do_shortcode($fcontent);
    //输出最终结果
    echo $fcontent;
}

/**
* 文章内容解析（短代码，表情）
*
* @access public
* @param mixed
* @return
*/
function shortcodeContent($content)
{
    $Parsedown = new Parsedown();
    $fcontent =  $Parsedown->text($content);
    $fcontent = preg_replace('#\@\((.*?)\)#','<img src="/usr/themes/default/image/bq/$1.png" class="bq">',$fcontent);
    return $fcontent;
}


/**
* 免插件实现友情链接功能
* @author OFFODD<https://www.offodd.com/59.html>
* @access public
* @param mixed
* @return
*/
function Links($sorts = NULL) {
    $options = Edge_Widget::widget('Widget_Options');
    $link = NULL;
    if ($options->Links) {
        $list = explode("\r\n", $options->Links);
        foreach ($list as $val) {
            list($name, $url, $description, $sort,$img) = explode(",", $val);
            if ($sorts) {
                $arr = explode(",", $sorts);
                if ($sort && in_array($sort, $arr)) {
                    $link .= $url ? '<li class="clear"><a href="'.$url.'" target="_blank"></a><img src="'.$img.'" alt="'.$name.'"/><div class="link-item-content"><h3>'.$name.'</h3><span>'.$sort.'</span><p>'.$description.'</p></div></li>' : '<li class="clear"><a href="'.$url.'" target="_blank"></a><img src="'.$img.'" alt="'.$name.'"/><div class="link-item-content"><h3>'.$name.'</h3><span>'.$sort.'</span><p>'.$description.'</p></div></li>';
                }
            } else {
                $link .= $url ? '<li class="clear"><a href="'.$url.'" target="_blank"></a><img src="'.$img.'" alt="'.$name.'"/><div class="link-item-content"><h3>'.$name.'</h3><span>'.$sort.'</span><p>'.$description.'</p></div></li>' : '<li class="clear"><a href="'.$url.'" target="_blank"></a><img src="'.$img.'" alt="'.$name.'"/><div class="link-item-content"><h3>'.$name.'</h3><span>'.$sort.'</span><p>'.$description.'</p></div></li>';
            }
        }
    }
    echo $link ? $link : '<li>暂无链接</li>';
}