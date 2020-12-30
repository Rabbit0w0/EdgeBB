function insertAtCursor(t, e) {
	var n = t.scrollTop,
	o = document.documentElement.scrollTop;
	if (document.selection) {
		t.focus();
		var s = document.selection.createRange();
		s.text = e,
		s.select()
	} else if (t.selectionStart || "0" == t.selectionStart) {
		var l = t.selectionStart,
		c = t.selectionEnd;
		t.value = t.value.substring(0, l) + e + t.value.substring(c, t.value.length),
		t.focus(),
		t.selectionStart = l + e.length,
		t.selectionEnd = l + e.length
	} else t.value += e,
	t.focus();
	t.scrollTop = n,
	document.documentElement.scrollTop = o
}
$(function() {

	Smilies = {
			dom: function(id) {
					return document.getElementById(id);
			},
			grin: function(tag) {
					tag = " "  + tag + " ";
					myField = this.dom("text");
					document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
			},
			insertTag: function(tag) {
					myField = Smilies.dom("text");
					myField.selectionStart || myField.selectionStart == "0" ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length), cursorPos += tag.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += tag, myField.focus());
			}
	}

	$("#wmd-button-row").append('<li class="wmd-spacer wmd-spacer1"></li><li class="wmd-button" id="wmd-sc-button" style="" title="插入短代码">短代码</li>');
	$("#wmd-button-row").append('<li class="wmd-spacer wmd-spacer1"></li><li class="wmd-button" id="wmd-owo-button" style="" title="插入表情">OWO</span></li>');
	$("#wmd-button-row").append(`
		<div id="OwO-editor" style="display:none"><div class="OwO OwO-open" id="qaq">
	   <div class="OwO-body" id="OwO-body">
	    <ul id="OwO-pp" class="OwO-items OwO-items-emoticon OwO-items-show" style="max-height: 197px;">
	      <li class="OwO-item" onclick="Smilies.grin('@(huaji_han)');"><img src="/usr/themes/default/image/bq/huaji_han.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(huaji_mj)');"><img src="/usr/themes/default/image/bq/huaji_mj.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(huaji_djy)');"><img src="/usr/themes/default/image/bq/huaji_djy.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(huaji_pc)');"><img src="/usr/themes/default/image/bq/huaji_pc.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(huaji_shang)');"><img src="/usr/themes/default/image/bq/huaji_shang.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(huaji_xiao)');"><img src="/usr/themes/default/image/bq/huaji_xiao.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(toukan)');"><img src="/usr/themes/default/image/bq/toukan.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(biexiao)');"><img src="/usr/themes/default/image/bq/biexiao.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(hemenjiu)');"><img src="/usr/themes/default/image/bq/hemenjiu.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chigua2)');"><img src="/usr/themes/default/image/bq/chigua2.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_love)');"><img src="/usr/themes/default/image/bq/chaiquan_love.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_red_1)');"><img src="/usr/themes/default/image/bq/chaiquan_red_1.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_melon)');"><img src="/usr/themes/default/image/bq/chaiquan_melon.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_mask)');"><img src="/usr/themes/default/image/bq/chaiquan_mask.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_hufen)');"><img src="/usr/themes/default/image/bq/chaiquan_hufen.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_han)');"><img src="/usr/themes/default/image/bq/chaiquan_han.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_gh)');"><img src="/usr/themes/default/image/bq/chaiquan_gh.png" /></li>
	      <li class="OwO-item" onclick="Smilies.grin('@(chaiquan_3)');"><img src="/usr/themes/default/image/bq/chaiquan_3.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(chaiquan)');"><img src="/usr/themes/default/image/bq/chaiquan.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(chaiquanbugaoxin)');"><img src="/usr/themes/default/image/bq/chaiquanbugaoxin.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(chaiquanzaijian)');"><img src="/usr/themes/default/image/bq/chaiquanzaijian.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(chaiquanku)');"><img src="/usr/themes/default/image/bq/chaiquanku.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(hehe)');"><img src="/usr/themes/default/image/bq/hehe.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(haha)');"><img src="/usr/themes/default/image/bq/yo.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(tushe)');"><img src="/usr/themes/default/image/bq/tushe.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(taikaixin)');"><img src="/usr/themes/default/image/bq/taikaixin.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xiaoyan)');"><img src="/usr/themes/default/image/bq/xiaoyan.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(huaxin)');"><img src="/usr/themes/default/image/bq/huaxin.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xiaoguai)');"><img src="/usr/themes/default/image/bq/xiaoguai.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(guai)');"><img src="/usr/themes/default/image/bq/guai.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(wuzuixiao)');"><img src="/usr/themes/default/image/bq/wuzuixiao.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(huaji)');"><img src="/usr/themes/default/image/bq/huaji.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(nidongde)');"><img src="/usr/themes/default/image/bq/nidongde.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(bugaoxin)');"><img src="/usr/themes/default/image/bq/bugaoxin.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(nu)');"><img src="/usr/themes/default/image/bq/nu.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(han)');"><img src="/usr/themes/default/image/bq/han.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(heixian)');"><img src="/usr/themes/default/image/bq/heixian.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(lei)');"><img src="/usr/themes/default/image/bq/lei.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(zhenbang)');"><img src="/usr/themes/default/image/bq/zhenbang.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(pen)');"><img src="/usr/themes/default/image/bq/pen.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(jingku)');"><img src="/usr/themes/default/image/bq/jingku.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(yinxian)');"><img src="/usr/themes/default/image/bq/yinxian.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(bishi)');"><img src="/usr/themes/default/image/bq/bishi.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(ku)');"><img src="/usr/themes/default/image/bq/ku.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(a)');"><img src="/usr/themes/default/image/bq/a.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(kuanghan)');"><img src="/usr/themes/default/image/bq/kuanghan.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(what)');"><img src="/usr/themes/default/image/bq/what.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(yiwen)');"><img src="/usr/themes/default/image/bq/yiwen.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(suanshuang)');"><img src="/usr/themes/default/image/bq/suanshuang.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(yamiedie)');"><img src="/usr/themes/default/image/bq/yamiedie.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(weiqu)');"><img src="/usr/themes/default/image/bq/weiqu.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(jingya)');"><img src="/usr/themes/default/image/bq/jingya.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(shuijiao)');"><img src="/usr/themes/default/image/bq/shuijiao.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xiaoniao)');"><img src="/usr/themes/default/image/bq/xiaoniao.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(wabi)');"><img src="/usr/themes/default/image/bq/wabi.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(tu)');"><img src="/usr/themes/default/image/bq/tu.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xili)');"><img src="/usr/themes/default/image/bq/xili.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xiaohonglian)');"><img src="/usr/themes/default/image/bq/xiaohonglian.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(landeli)');"><img src="/usr/themes/default/image/bq/landeli.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(mianqiang)');"><img src="/usr/themes/default/image/bq/mianqiang.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(aixin)');"><img src="/usr/themes/default/image/bq/aixin.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xinsui)');"><img src="/usr/themes/default/image/bq/xinsui.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(meigui)');"><img src="/usr/themes/default/image/bq/meigui.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(liwu)');"><img src="/usr/themes/default/image/bq/liwu.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(caihong)');"><img src="/usr/themes/default/image/bq/caihong.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(taiyang)');"><img src="/usr/themes/default/image/bq/taiyang.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xinxinyueliang)');"><img src="/usr/themes/default/image/bq/xinxinyueliang.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(qianbi)');"><img src="/usr/themes/default/image/bq/qianbi.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(chabei)');"><img src="/usr/themes/default/image/bq/chabei.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(dangao)');"><img src="/usr/themes/default/image/bq/dangao.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(damuzhi)');"><img src="/usr/themes/default/image/bq/damuzhi.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(shengli)');"><img src="/usr/themes/default/image/bq/shengli.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(haha)');"><img src="/usr/themes/default/image/bq/haha.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(OK)');"><img src="/usr/themes/default/image/bq/OK.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(shafa)');"><img src="/usr/themes/default/image/bq/shafa.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(shouzhi)');"><img src="/usr/themes/default/image/bq/shouzhi.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(xiangjiao)');"><img src="/usr/themes/default/image/bq/xiangjiao.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(bianbian)');"><img src="/usr/themes/default/image/bq/bianbian.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(yaowan)');"><img src="/usr/themes/default/image/bq/yaowan.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(hlj)');"><img src="/usr/themes/default/image/bq/hlj.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(lazhu)');"><img src="/usr/themes/default/image/bq/lazhu.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(yingyue)');"><img src="/usr/themes/default/image/bq/yingyue.png" /></li>
	     <li class="OwO-item" onclick="Smilies.grin('@(dengpao)');"><img src="/usr/themes/default/image/bq/dengpao.png" /></li>
	    </ul>
	   </div>
	  </div>
</div>`);
	$("#wmd-button-row").append(`
		<div id="g-shortcode" style="display:none">
			<a id="g-video">视频</a>
			<a id="g-collapse">折叠框</a>
			<a id="g-bili">B站视频</a>
			<a id="g-art">文章跳转</a>
			<a id="g-notice">提示框</a>
			<a id="g-notice-block">提示块</a>
			<a id="g-warn">警告框</a>
			<a id="g-warn-block">警告块</a>
			<a id="g-dl">下载按钮</a>
			<a id="g-tag">标签</a>
	</div>
		`);

	function OwO_show(){
		if($("#OwO-editor").css("display")=='none'){
			 $("#OwO-editor").slideDown();
		}else{
			 $("#OwO-editor").slideUp();
		 }
	}
	function sc_show(){
		if($("#g-shortcode").css("display")=='none'){
			 $("#g-shortcode").slideDown();
		}else{
			 $("#g-shortcode").slideUp();
		 }
	}

	$(document).on("click", "#g-video",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '\n\n[dplayer id="" url="" pic=""]\n\n[/dplayer]\n\n')
	});

	$(document).on("click", "#g-collapse",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '\n\n[collapse title=""]\n\n[/collapse]')
	});

	$(document).on("click", "#g-art",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[art]文章ID[/art]')
	});
	$(document).on("click", "#g-bili",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[bili]BV/AV[/bili]')
	});
	$(document).on("click", "#g-notice",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[notice]内容[/notice]')
	});
	$(document).on("click", "#g-notice-block",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[notice-block]内容[/notice-block]')
	});
	$(document).on("click", "#g-warn-block",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[warn-block]内容[/warn-block]')
	});
	$(document).on("click", "#g-warn",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[warn]内容[/warn]')
	});
	$(document).on("click", "#g-dl",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[dl href="链接（无需http://）"]文件名[/dl]')
	});
	$(document).on("click", "#g-tag",
	function() {
		myField = document.getElementById("text"),
		insertAtCursor(myField, '[tag]内容[/tag]')
	});

	$(document).on("click","#wmd-owo-button",function(){OwO_show();});
	$(document).on("click","#wmd-sc-button",function(){sc_show();});




});
