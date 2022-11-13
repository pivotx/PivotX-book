$(document).ready(function(){
  
    var options = {
        exact: "whole",
        style_name_suffix: false,
        highlight: "#content"
    };
    $(document).SearchHighlight(options);

	$("a.fancybox").fancybox({
		'titlePosition'	: 'over'
	});

	var hoverconfig = {    
		over: function(){ $(this).addClass('mouseover')	}, 
		timeout: 1500, // number = milliseconds delay before onMouseOut    
		out: function(){ $(this).removeClass('mouseover') }	
	};

    $("pre").hoverIntent( hoverconfig );

    // Syntax highlighting..
    $("pre code").each(function(index) {
    
        var code = $(this).html();

        // [[smarty]] tags
        code = code.replace(/\[\[([^\]]*)\]\]/gi, "<span class='smarty'>[[$1]]</span>");
        
        // <html> tags
        code = code.replace(/&lt;([^&]*)&gt;/gi, "<span class='html'>&lt;$1&gt;</span>");

        // <!-- comment --> tags in HTML and PHP
        code = code.replace(/&lt;\!-- (.*) --&gt;/gi, "<span class='comment'>&lt;!-- $1 --&gt;</span>");
        code = code.replace(/([^:])\/\/(.*)/gi, "$1<span class='comment'>//$2</span>");

        // %foo% placeholder elements
        code = code.replace(/%([^%]*)%/gi, "<span class='placeholder'>%$1%</span>");

        $(this).html(code);
    });


});



/**
* hoverIntent r5 // 2007.03.27 // jQuery 1.1.2+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne <brian@cherne.net>
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}if(p==this){return false;}var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);
