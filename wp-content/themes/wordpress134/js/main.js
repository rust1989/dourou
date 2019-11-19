//鼠标移动显示
jQuery(document).ready(function($){
	$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');//修复Opera滑动异常地，加过就不需要重复加了。
	$('.adminInfor, #qmenu').hover(function(){
		$(this).addClass('open');
	},function(){
		$(this).removeClass('open');
	});
	$(window).scroll(function(){
		var bodyHeight = $(document).height();
		var scrollTopHeight = $('#scrolltop').offset().top;
		var bottomHeight = bodyHeight - scrollTopHeight;
		if ( scrollTopHeight > 600) {
			$('#roll_top').css('display', 'block');
		} else {
			$('#roll_top').css('display', 'none');
			$animating = false;
		}	
		if ( bottomHeight > 900) {
			$('#fall').css('display', 'block');
		} else {
			$('#fall').css('display', 'none');
			$animating = false;
		}
	});
	$('#roll_top').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);}); 
	$('#ct').click(function(){$('html,body').animate({scrollTop:$('#comments').offset().top}, 800);});
	$('#fall').click(function(){$('html,body').animate({scrollTop:$('#footer').offset().top}, 800);});
	$('.hentry h2.title a').click(function(){$(this).text('页面载入中……');window.location = $(this).attr('href');});
	$('#headLogin').click(function(){$(this).parent().toggleClass('open');});
	$(document).click(function(){$('.signIn').removeClass('open');});
	$('#logo, .signIn').click(function(event){event.stopPropagation();});
	$(".search").searchBar();
});
$.fn.searchBar = function () {
    var obj = $(this);
    var str = obj.find("#s");
    obj.click(function(e) {
        if (obj.hasClass("fold")) {
            obj.removeClass("fold");
            e.stopPropagation();
            return false
        }
    })
    if (str.length === 0 ){
        alert("请您输入内容！");
        itext.focus();
        return;
    }
}
$.fn.picShow = function () {
    var obj = $(this);
    var item = obj.find("li");
    item.eq(0).addClass("current");
    item.mouseenter(function() {
        if (!$(this).hasClass("current")) {
            obj.find(".current").removeClass("current");
            $(this).addClass("current");
        }
    })
}
// 评论贴图
function embedImage() {
  var URL = prompt('请输入图片 URL 地址:', 'http://');
  if (URL) {
    document.getElementById('comment').value = document.getElementById('comment').value + '[img]' + URL + '[/img]';
  }
}
function addFavorite(url, title) {
	try {
		window.external.addFavorite(url, title);
	} catch (e){
		try {
			window.sidebar.addPanel(title, url, '');
        	} catch (e) {
			alert("请按 Ctrl+D 键添加到收藏夹");
		}
	}
}
function setHomepage(sURL) {
	if(navigator.userAgent.indexOf("MSIE")>0){
		document.body.style.behavior = 'url(#default#homepage)';
		document.body.setHomePage(sURL);
	} else {
		alert("非 IE 浏览器请手动将本站设为首页");
	}
}
//不支持placeholder浏览器下对placeholder进行处理
if(document.createElement('input').placeholder !== '') {
	$('head').append('<style>.placeholder{color: #aaa;}</style>');
	$('[placeholder]').focus(function() {
		var input = $(this);
		if(input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $(this);
		//密码框空
		if(this.type === 'password') {
			return false;
		}
		if(input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur().parents('form').submit(function() {
		$(this).find('[placeholder]').each(function() {
			var input = $(this);
			if(input.val() == input.attr('placeholder')) {
				input.val('');
			}
		});
	});
}
function addCopyright() {
    var Original = "转自【不亦乐乎】：" + location.href; //修改你的网站名称
    if ("function" == typeof window.getSelection) {
        var c = window.getSelection();
        if ("Microsoft Internet Explorer" == navigator.appName && navigator.appVersion.match(/MSIE ([\d.]+)/)[1] >= 10 || "Opera" == navigator.appName) {
            var g = c.getRangeAt(0),
            h = document.createElement("span");
            h.appendChild(g.cloneContents()),
            g.insertNode(h);
            var i = h.innerHTML.replace(/(?:\n|\r\n|\r)/gi, "").replace(/<\s*script[^>]*>[\s\S]*?<\/script>/gim, "").replace(/<\s*style[^>]*>[\s\S]*?<\/style>/gim, "").replace(/<!--.*?-->/gim, "").replace(/<!DOCTYPE.*?>/gi, "");
            try {
                document.getElementsByTagName("body")[0].removeChild(h)
            } catch(f) {
                h.style.display = "none",
                h.innerHTML = ""
            }
        } else var d = "" + c;
        var e = document.getElementsByTagName("body")[0],
        f = document.createElement("div");
        f.style.position = "absolute",
        f.style.left = "-99999px",
        e.appendChild(f),
        f.innerHTML = d.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "$1<br />$2") + "<br />" + Original,
        c.selectAllChildren(f),
        setTimeout(function() {
            e.removeChild(f)
        },
        0)
    } else if ("object" == typeof document.selection.createRange) {
        event.returnValue = !1;
        var c = document.selection.createRange().text;
        window.clipboardData.setData("Text", c + "\n" + Original)
    }
};
document.body.oncopy = addCopyright;
(function(){
var oDiv=document.getElementById("slidebox"); //获取 id 为 float 的容器
var H=0,iE6;
var Y=oDiv;
while(Y){H+=Y.offsetTop;Y=Y.offsetParent};
iE6=window.ActiveXObject&&!window.XMLHttpRequest;
if(!iE6){
window.onscroll=function()
{
var s=document.body.scrollTop||document.documentElement.scrollTop;
if(s>H){oDiv.className="div1 div2";if(iE6){oDiv.style.top=(s-H)+"px";}}//给id为float的容器加了个 div2 的class
else{oDiv.className="div1";}	
};
}
})();