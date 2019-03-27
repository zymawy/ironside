// ==================================================
// fancyBox v3.1.28
//
// Licensed GPLv3 for open source use
// or fancyBox Commercial License for commercial use
//
// http://fancyapps.com/fancybox/
// Copyright 2017 fancyApps
//
// ==================================================
!function(t,e,n,o){"use strict";function i(t){var e=t.currentTarget,o=t.data?t.data.options:{},i=o.selector?n(o.selector):t.data?t.data.items:[],a=n(e).attr("data-fancybox")||"",s=0,r=n.fancybox.getInstance();t.preventDefault(),r&&r.current.opts.$orig.is(e)||(a?(i=i.length?i.filter('[data-fancybox="'+a+'"]'):n('[data-fancybox="'+a+'"]'),s=i.index(e),s<0&&(s=0)):i=[e],n.fancybox.open(i,o,s))}if(n){if(n.fn.fancybox)return void n.error("fancyBox already initialized");var a={loop:!1,margin:[44,0],gutter:50,keyboard:!0,arrows:!0,infobar:!1,toolbar:!0,buttons:["slideShow","fullScreen","thumbs","close"],idleTime:4,smallBtn:"auto",protect:!1,modal:!1,image:{preload:"auto"},ajax:{settings:{data:{fancybox:!0}}},iframe:{tpl:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',preload:!0,css:{},attr:{scrolling:"auto"}},animationEffect:"zoom",animationDuration:366,zoomOpacity:"auto",transitionEffect:"fade",transitionDuration:366,slideClass:"",baseClass:"",baseTpl:'<div class="fancybox-container" role="dialog" tabindex="-1"><div class="fancybox-bg"></div><div class="fancybox-inner"><div class="fancybox-infobar"><button data-fancybox-prev title="{{PREV}}" class="fancybox-button fancybox-button--left"></button><div class="fancybox-infobar__body"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div><button data-fancybox-next title="{{NEXT}}" class="fancybox-button fancybox-button--right"></button></div><div class="fancybox-toolbar">{{BUTTONS}}</div><div class="fancybox-navigation"><button data-fancybox-prev title="{{PREV}}" class="fancybox-arrow fancybox-arrow--left" /><button data-fancybox-next title="{{NEXT}}" class="fancybox-arrow fancybox-arrow--right" /></div><div class="fancybox-stage"></div><div class="fancybox-caption-wrap"><div class="fancybox-caption"></div></div></div></div>',spinnerTpl:'<div class="fancybox-loading"></div>',errorTpl:'<div class="fancybox-error"><p>{{ERROR}}<p></div>',btnTpl:{slideShow:'<button data-fancybox-play class="fancybox-button fancybox-button--play" title="{{PLAY_START}}"></button>',fullScreen:'<button data-fancybox-fullscreen class="fancybox-button fancybox-button--fullscreen" title="{{FULL_SCREEN}}"></button>',thumbs:'<button data-fancybox-thumbs class="fancybox-button fancybox-button--thumbs" title="{{THUMBS}}"></button>',close:'<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}"></button>',smallBtn:'<button data-fancybox-close class="fancybox-close-small" title="{{CLOSE}}"></button>'},parentEl:"body",autoFocus:!0,backFocus:!0,trapFocus:!0,fullScreen:{autoStart:!1},touch:{vertical:!0,momentum:!0},hash:null,media:{},slideShow:{autoStart:!1,speed:4e3},thumbs:{autoStart:!1,hideOnClose:!0},onInit:n.noop,beforeLoad:n.noop,afterLoad:n.noop,beforeShow:n.noop,afterShow:n.noop,beforeClose:n.noop,afterClose:n.noop,onActivate:n.noop,onDeactivate:n.noop,clickContent:function(t,e){return"image"===t.type&&"zoom"},clickSlide:"close",clickOutside:"close",dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1,mobile:{clickContent:function(t,e){return"image"===t.type&&"toggleControls"},clickSlide:function(t,e){return"image"===t.type?"toggleControls":"close"},dblclickContent:function(t,e){return"image"===t.type&&"zoom"},dblclickSlide:function(t,e){return"image"===t.type&&"zoom"}},lang:"en",i18n:{en:{CLOSE:"Close",NEXT:"Next",PREV:"Previous",ERROR:"The requested content cannot be loaded. <br/> Please try again later.",PLAY_START:"Start slideshow",PLAY_STOP:"Pause slideshow",FULL_SCREEN:"Full screen",THUMBS:"Thumbnails"},de:{CLOSE:"Schliessen",NEXT:"Weiter",PREV:"Zurück",ERROR:"Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es später nochmal.",PLAY_START:"Diaschau starten",PLAY_STOP:"Diaschau beenden",FULL_SCREEN:"Vollbild",THUMBS:"Vorschaubilder"}}},s=n(t),r=n(e),c=0,l=function(t){return t&&t.hasOwnProperty&&t instanceof n},u=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),d=function(){var t,n=e.createElement("fakeelement"),i={transition:"transitionend",OTransition:"oTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(t in i)if(n.style[t]!==o)return i[t]}(),f=function(t){return t&&t.length&&t[0].offsetHeight},h=function(t,o,i){var s=this;s.opts=n.extend(!0,{index:i},a,o||{}),o&&n.isArray(o.buttons)&&(s.opts.buttons=o.buttons),s.id=s.opts.id||++c,s.group=[],s.currIndex=parseInt(s.opts.index,10)||0,s.prevIndex=null,s.prevPos=null,s.currPos=0,s.firstRun=null,s.createGroup(t),s.group.length&&(s.$lastFocus=n(e.activeElement).blur(),s.slides={},s.init(t))};n.extend(h.prototype,{init:function(){var t,e,o,i=this,a=i.group[i.currIndex].opts;i.scrollTop=r.scrollTop(),i.scrollLeft=r.scrollLeft(),n.fancybox.getInstance()||n.fancybox.isMobile||"hidden"===n("body").css("overflow")||(t=n("body").width(),n("html").addClass("fancybox-enabled"),t=n("body").width()-t,t>1&&n("head").append('<style id="fancybox-style-noscroll" type="text/css">.compensate-for-scrollbar, .fancybox-enabled body { margin-right: '+t+"px; }</style>")),o="",n.each(a.buttons,function(t,e){o+=a.btnTpl[e]||""}),e=n(i.translate(i,a.baseTpl.replace("{{BUTTONS}}",o))).addClass("fancybox-is-hidden").attr("id","fancybox-container-"+i.id).addClass(a.baseClass).data("FancyBox",i).prependTo(a.parentEl),i.$refs={container:e},["bg","inner","infobar","toolbar","stage","caption"].forEach(function(t){i.$refs[t]=e.find(".fancybox-"+t)}),(!a.arrows||i.group.length<2)&&e.find(".fancybox-navigation").remove(),a.infobar||i.$refs.infobar.remove(),a.toolbar||i.$refs.toolbar.remove(),i.trigger("onInit"),i.activate(),i.jumpTo(i.currIndex)},translate:function(t,e){var n=t.opts.i18n[t.opts.lang];return e.replace(/\{\{(\w+)\}\}/g,function(t,e){var i=n[e];return i===o?t:i})},createGroup:function(t){var e=this,i=n.makeArray(t);n.each(i,function(t,i){var a,s,r,c,l={},u={},d=[];n.isPlainObject(i)?(l=i,u=i.opts||i):"object"===n.type(i)&&n(i).length?(a=n(i),d=a.data(),u="options"in d?d.options:{},u="object"===n.type(u)?u:{},l.src="src"in d?d.src:u.src||a.attr("href"),["width","height","thumb","type","filter"].forEach(function(t){t in d&&(u[t]=d[t])}),"srcset"in d&&(u.image={srcset:d.srcset}),u.$orig=a,l.type||l.src||(l.type="inline",l.src=i)):l={type:"html",src:i+""},l.opts=n.extend(!0,{},e.opts,u),n.fancybox.isMobile&&(l.opts=n.extend(!0,{},l.opts,l.opts.mobile)),s=l.type||l.opts.type,r=l.src||"",!s&&r&&(r.match(/(^data:image\/[a-z0-9+\/=]*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg|ico)((\?|#).*)?$)/i)?s="image":r.match(/\.(pdf)((\?|#).*)?$/i)?s="pdf":"#"===r.charAt(0)&&(s="inline")),l.type=s,l.index=e.group.length,l.opts.$orig&&!l.opts.$orig.length&&delete l.opts.$orig,!l.opts.$thumb&&l.opts.$orig&&(l.opts.$thumb=l.opts.$orig.find("img:first")),l.opts.$thumb&&!l.opts.$thumb.length&&delete l.opts.$thumb,"function"===n.type(l.opts.caption)?l.opts.caption=l.opts.caption.apply(i,[e,l]):"caption"in d&&(l.opts.caption=d.caption),l.opts.caption=l.opts.caption===o?"":l.opts.caption+"","ajax"===s&&(c=r.split(/\s+/,2),c.length>1&&(l.src=c.shift(),l.opts.filter=c.shift())),"auto"==l.opts.smallBtn&&(n.inArray(s,["html","inline","ajax"])>-1?(l.opts.toolbar=!1,l.opts.smallBtn=!0):l.opts.smallBtn=!1),"pdf"===s&&(l.type="iframe",l.opts.iframe.preload=!1),l.opts.modal&&(l.opts=n.extend(!0,l.opts,{infobar:0,toolbar:0,smallBtn:0,keyboard:0,slideShow:0,fullScreen:0,thumbs:0,touch:0,clickContent:!1,clickSlide:!1,clickOutside:!1,dblclickContent:!1,dblclickSlide:!1,dblclickOutside:!1})),e.group.push(l)})},addEvents:function(){var o=this;o.removeEvents(),o.$refs.container.on("click.fb-close","[data-fancybox-close]",function(t){t.stopPropagation(),t.preventDefault(),o.close(t)}).on("click.fb-prev touchend.fb-prev","[data-fancybox-prev]",function(t){t.stopPropagation(),t.preventDefault(),o.previous()}).on("click.fb-next touchend.fb-next","[data-fancybox-next]",function(t){t.stopPropagation(),t.preventDefault(),o.next()}),s.on("orientationchange.fb resize.fb",function(t){t&&t.originalEvent&&"resize"===t.originalEvent.type?u(function(){o.update()}):(o.$refs.stage.hide(),setTimeout(function(){o.$refs.stage.show(),o.update()},500))}),r.on("focusin.fb",function(t){var i=n.fancybox?n.fancybox.getInstance():null;i.isClosing||!i.current||!i.current.opts.trapFocus||n(t.target).hasClass("fancybox-container")||n(t.target).is(e)||i&&"fixed"!==n(t.target).css("position")&&!i.$refs.container.has(t.target).length&&(t.stopPropagation(),i.focus(),s.scrollTop(o.scrollTop).scrollLeft(o.scrollLeft))}),r.on("keydown.fb",function(t){var e=o.current,i=t.keyCode||t.which;if(e&&e.opts.keyboard&&!n(t.target).is("input")&&!n(t.target).is("textarea"))return 8===i||27===i?(t.preventDefault(),void o.close(t)):37===i||38===i?(t.preventDefault(),void o.previous()):39===i||40===i?(t.preventDefault(),void o.next()):void o.trigger("afterKeydown",t,i)}),o.group[o.currIndex].opts.idleTime&&(o.idleSecondsCounter=0,r.on("mousemove.fb-idle mouseenter.fb-idle mouseleave.fb-idle mousedown.fb-idle touchstart.fb-idle touchmove.fb-idle scroll.fb-idle keydown.fb-idle",function(){o.idleSecondsCounter=0,o.isIdle&&o.showControls(),o.isIdle=!1}),o.idleInterval=t.setInterval(function(){o.idleSecondsCounter++,o.idleSecondsCounter>=o.group[o.currIndex].opts.idleTime&&(o.isIdle=!0,o.idleSecondsCounter=0,o.hideControls())},1e3))},removeEvents:function(){var e=this;s.off("orientationchange.fb resize.fb"),r.off("focusin.fb keydown.fb .fb-idle"),this.$refs.container.off(".fb-close .fb-prev .fb-next"),e.idleInterval&&(t.clearInterval(e.idleInterval),e.idleInterval=null)},previous:function(t){return this.jumpTo(this.currPos-1,t)},next:function(t){return this.jumpTo(this.currPos+1,t)},jumpTo:function(t,e,i){var a,s,r,c,l,u,d,h=this,p=h.group.length;if(!(h.isSliding||h.isClosing||h.isAnimating&&h.firstRun)){if(t=parseInt(t,10),s=h.current?h.current.opts.loop:h.opts.loop,!s&&(t<0||t>=p))return!1;if(a=h.firstRun=null===h.firstRun,!(p<2&&!a&&h.isSliding)){if(c=h.current,h.prevIndex=h.currIndex,h.prevPos=h.currPos,r=h.createSlide(t),p>1&&((s||r.index>0)&&h.createSlide(t-1),(s||r.index<p-1)&&h.createSlide(t+1)),h.current=r,h.currIndex=r.index,h.currPos=r.pos,h.trigger("beforeShow",a),h.updateControls(),u=n.fancybox.getTranslate(r.$slide),r.isMoved=(0!==u.left||0!==u.top)&&!r.$slide.hasClass("fancybox-animated"),r.forcedDuration=o,n.isNumeric(e)?r.forcedDuration=e:e=r.opts[a?"animationDuration":"transitionDuration"],e=parseInt(e,10),a)return r.opts.animationEffect&&e&&h.$refs.container.css("transition-duration",e+"ms"),h.$refs.container.removeClass("fancybox-is-hidden"),f(h.$refs.container),h.$refs.container.addClass("fancybox-is-open"),r.$slide.addClass("fancybox-slide--current"),h.loadSlide(r),void h.preload();n.each(h.slides,function(t,e){n.fancybox.stop(e.$slide)}),r.$slide.removeClass("fancybox-slide--next fancybox-slide--previous").addClass("fancybox-slide--current"),r.isMoved?(l=Math.round(r.$slide.width()),n.each(h.slides,function(t,o){var i=o.pos-r.pos;n.fancybox.animate(o.$slide,{top:0,left:i*l+i*o.opts.gutter},e,function(){o.$slide.removeAttr("style").removeClass("fancybox-slide--next fancybox-slide--previous"),o.pos===h.currPos&&(r.isMoved=!1,h.complete())})})):h.$refs.stage.children().removeAttr("style"),r.isLoaded?h.revealContent(r):h.loadSlide(r),h.preload(),c.pos!==r.pos&&(d="fancybox-slide--"+(c.pos>r.pos?"next":"previous"),c.$slide.removeClass("fancybox-slide--complete fancybox-slide--current fancybox-slide--next fancybox-slide--previous"),c.isComplete=!1,e&&(r.isMoved||r.opts.transitionEffect)&&(r.isMoved?c.$slide.addClass(d):(d="fancybox-animated "+d+" fancybox-fx-"+r.opts.transitionEffect,n.fancybox.animate(c.$slide,d,e,function(){c.$slide.removeClass(d).removeAttr("style")}))))}}},createSlide:function(t){var e,o,i=this;return o=t%i.group.length,o=o<0?i.group.length+o:o,!i.slides[t]&&i.group[o]&&(e=n('<div class="fancybox-slide"></div>').appendTo(i.$refs.stage),i.slides[t]=n.extend(!0,{},i.group[o],{pos:t,$slide:e,isLoaded:!1}),i.updateSlide(i.slides[t])),i.slides[t]},scaleToActual:function(t,e,i){var a,s,r,c,l,u=this,d=u.current,f=d.$content,h=parseInt(d.$slide.width(),10),p=parseInt(d.$slide.height(),10),g=d.width,b=d.height;"image"!=d.type||d.hasError||!f||u.isAnimating||(n.fancybox.stop(f),u.isAnimating=!0,t=t===o?.5*h:t,e=e===o?.5*p:e,a=n.fancybox.getTranslate(f),c=g/a.width,l=b/a.height,s=.5*h-.5*g,r=.5*p-.5*b,g>h&&(s=a.left*c-(t*c-t),s>0&&(s=0),s<h-g&&(s=h-g)),b>p&&(r=a.top*l-(e*l-e),r>0&&(r=0),r<p-b&&(r=p-b)),u.updateCursor(g,b),n.fancybox.animate(f,{top:r,left:s,scaleX:c,scaleY:l},i||330,function(){u.isAnimating=!1}),u.SlideShow&&u.SlideShow.isActive&&u.SlideShow.stop())},scaleToFit:function(t){var e,o=this,i=o.current,a=i.$content;"image"!=i.type||i.hasError||!a||o.isAnimating||(n.fancybox.stop(a),o.isAnimating=!0,e=o.getFitPos(i),o.updateCursor(e.width,e.height),n.fancybox.animate(a,{top:e.top,left:e.left,scaleX:e.width/a.width(),scaleY:e.height/a.height()},t||330,function(){o.isAnimating=!1}))},getFitPos:function(t){var e,o,i,a,r,c=this,l=t.$content,u=t.width,d=t.height,f=t.opts.margin;return!(!l||!l.length||!u&&!d)&&("number"===n.type(f)&&(f=[f,f]),2==f.length&&(f=[f[0],f[1],f[0],f[1]]),s.width()<800&&(f=[0,0,0,0]),e=parseInt(c.$refs.stage.width(),10)-(f[1]+f[3]),o=parseInt(c.$refs.stage.height(),10)-(f[0]+f[2]),i=Math.min(1,e/u,o/d),a=Math.floor(i*u),r=Math.floor(i*d),{top:Math.floor(.5*(o-r))+f[0],left:Math.floor(.5*(e-a))+f[3],width:a,height:r})},update:function(){var t=this;n.each(t.slides,function(e,n){t.updateSlide(n)})},updateSlide:function(t){var e=this,o=t.$content;o&&(t.width||t.height)&&(n.fancybox.stop(o),n.fancybox.setTranslate(o,e.getFitPos(t)),t.pos===e.currPos&&e.updateCursor()),t.$slide.trigger("refresh"),e.trigger("onUpdate",t)},updateCursor:function(t,e){var n,i=this,a=i.$refs.container.removeClass("fancybox-is-zoomable fancybox-can-zoomIn fancybox-can-drag fancybox-can-zoomOut");i.current&&!i.isClosing&&(i.isZoomable()?(a.addClass("fancybox-is-zoomable"),n=t!==o&&e!==o?t<i.current.width&&e<i.current.height:i.isScaledDown(),n?a.addClass("fancybox-can-zoomIn"):i.current.opts.touch?a.addClass("fancybox-can-drag"):a.addClass("fancybox-can-zoomOut")):i.current.opts.touch&&a.addClass("fancybox-can-drag"))},isZoomable:function(){var t,e=this,o=e.current;if(o&&!e.isClosing)return!!("image"===o.type&&o.isLoaded&&!o.hasError&&("zoom"===o.opts.clickContent||n.isFunction(o.opts.clickContent)&&"zoom"===o.opts.clickContent(o))&&(t=e.getFitPos(o),o.width>t.width||o.height>t.height))},isScaledDown:function(){var t=this,e=t.current,o=e.$content,i=!1;return o&&(i=n.fancybox.getTranslate(o),i=i.width<e.width||i.height<e.height),i},canPan:function(){var t=this,e=t.current,n=e.$content,o=!1;return n&&(o=t.getFitPos(e),o=Math.abs(n.width()-o.width)>1||Math.abs(n.height()-o.height)>1),o},loadSlide:function(t){var e,o,i,a=this;if(!t.isLoading&&!t.isLoaded){switch(t.isLoading=!0,a.trigger("beforeLoad",t),e=t.type,o=t.$slide,o.off("refresh").trigger("onReset").addClass("fancybox-slide--"+(e||"unknown")).addClass(t.opts.slideClass),e){case"image":a.setImage(t);break;case"iframe":a.setIframe(t);break;case"html":a.setContent(t,t.src||t.content);break;case"inline":n(t.src).length?a.setContent(t,n(t.src)):a.setError(t);break;case"ajax":a.showLoading(t),i=n.ajax(n.extend({},t.opts.ajax.settings,{url:t.src,success:function(e,n){"success"===n&&a.setContent(t,e)},error:function(e,n){e&&"abort"!==n&&a.setError(t)}})),o.one("onReset",function(){i.abort()});break;default:a.setError(t)}return!0}},setImage:function(e){var o,i,a,s,r=this,c=e.opts.image.srcset;if(c){a=t.devicePixelRatio||1,s=t.innerWidth*a,i=c.split(",").map(function(t){var e={};return t.trim().split(/\s+/).forEach(function(t,n){var o=parseInt(t.substring(0,t.length-1),10);return 0===n?e.url=t:void(o&&(e.value=o,e.postfix=t[t.length-1]))}),e}),i.sort(function(t,e){return t.value-e.value});for(var l=0;l<i.length;l++){var u=i[l];if("w"===u.postfix&&u.value>=s||"x"===u.postfix&&u.value>=a){o=u;break}}!o&&i.length&&(o=i[i.length-1]),o&&(e.src=o.url,e.width&&e.height&&"w"==o.postfix&&(e.height=e.width/e.height*o.value,e.width=o.value))}e.$content=n('<div class="fancybox-image-wrap"></div>').addClass("fancybox-is-hidden").appendTo(e.$slide),e.opts.preload!==!1&&e.opts.width&&e.opts.height&&(e.opts.thumb||e.opts.$thumb)?(e.width=e.opts.width,e.height=e.opts.height,e.$ghost=n("<img />").one("error",function(){n(this).remove(),e.$ghost=null,r.setBigImage(e)}).one("load",function(){r.afterLoad(e),r.setBigImage(e)}).addClass("fancybox-image").appendTo(e.$content).attr("src",e.opts.thumb||e.opts.$thumb.attr("src"))):r.setBigImage(e)},setBigImage:function(t){var e=this,o=n("<img />");t.$image=o.one("error",function(){e.setError(t)}).one("load",function(){clearTimeout(t.timouts),t.timouts=null,e.isClosing||(t.width=this.naturalWidth,t.height=this.naturalHeight,t.opts.image.srcset&&o.attr("sizes","100vw").attr("srcset",t.opts.image.srcset),e.hideLoading(t),t.$ghost?t.timouts=setTimeout(function(){t.timouts=null,t.$ghost.hide()},Math.min(300,Math.max(1e3,t.height/1600))):e.afterLoad(t))}).addClass("fancybox-image").attr("src",t.src).appendTo(t.$content),(o[0].complete||"complete"==o[0].readyState)&&o[0].naturalWidth&&o[0].naturalHeight?o.trigger("load"):o[0].error?o.trigger("error"):t.timouts=setTimeout(function(){o[0].complete||t.hasError||e.showLoading(t)},100)},setIframe:function(t){var e,i=this,a=t.opts.iframe,s=t.$slide;t.$content=n('<div class="fancybox-content'+(a.preload?" fancybox-is-hidden":"")+'"></div>').css(a.css).appendTo(s),e=n(a.tpl.replace(/\{rnd\}/g,(new Date).getTime())).attr(a.attr).appendTo(t.$content),a.preload?(i.showLoading(t),e.on("load.fb error.fb",function(e){this.isReady=1,t.$slide.trigger("refresh"),i.afterLoad(t)}),s.on("refresh.fb",function(){var n,i,s,r=t.$content,c=a.css.width,l=a.css.height;if(1===e[0].isReady){try{i=e.contents(),s=i.find("body")}catch(t){}s&&s.length&&(c===o&&(n=e[0].contentWindow.document.documentElement.scrollWidth,c=Math.ceil(s.outerWidth(!0)+(r.width()-n)),c+=r.outerWidth()-r.innerWidth()),l===o&&(l=Math.ceil(s.outerHeight(!0)),l+=r.outerHeight()-r.innerHeight()),c&&r.width(c),l&&r.height(l)),r.removeClass("fancybox-is-hidden")}})):this.afterLoad(t),e.attr("src",t.src),t.opts.smallBtn===!0&&t.$content.prepend(i.translate(t,t.opts.btnTpl.smallBtn)),s.one("onReset",function(){try{n(this).find("iframe").hide().attr("src","//about:blank")}catch(t){}n(this).empty(),t.isLoaded=!1})},setContent:function(t,e){var o=this;o.isClosing||(o.hideLoading(t),t.$slide.empty(),l(e)&&e.parent().length?(e.parent(".fancybox-slide--inline").trigger("onReset"),t.$placeholder=n("<div></div>").hide().insertAfter(e),e.css("display","inline-block")):t.hasError||("string"===n.type(e)&&(e=n("<div>").append(n.trim(e)).contents(),3===e[0].nodeType&&(e=n("<div>").html(e))),t.opts.filter&&(e=n("<div>").html(e).find(t.opts.filter))),t.$slide.one("onReset",function(){t.$placeholder&&(t.$placeholder.after(e.hide()).remove(),t.$placeholder=null),t.$smallBtn&&(t.$smallBtn.remove(),t.$smallBtn=null),t.hasError||(n(this).empty(),t.isLoaded=!1)}),t.$content=n(e).appendTo(t.$slide),t.opts.smallBtn&&!t.$smallBtn&&(t.$smallBtn=n(o.translate(t,t.opts.btnTpl.smallBtn)).appendTo(t.$content.filter("div").first())),this.afterLoad(t))},setError:function(t){t.hasError=!0,t.$slide.removeClass("fancybox-slide--"+t.type),this.setContent(t,this.translate(t,t.opts.errorTpl))},showLoading:function(t){var e=this;t=t||e.current,t&&!t.$spinner&&(t.$spinner=n(e.opts.spinnerTpl).appendTo(t.$slide))},hideLoading:function(t){var e=this;t=t||e.current,t&&t.$spinner&&(t.$spinner.remove(),delete t.$spinner)},afterLoad:function(t){var e=this;e.isClosing||(t.isLoading=!1,t.isLoaded=!0,e.trigger("afterLoad",t),e.hideLoading(t),t.opts.protect&&t.$content&&!t.hasError&&(t.$content.on("contextmenu.fb",function(t){return 2==t.button&&t.preventDefault(),!0}),"image"===t.type&&n('<div class="fancybox-spaceball"></div>').appendTo(t.$content)),e.revealContent(t))},revealContent:function(t){var e,i,a,s,r,c=this,l=t.$slide,u=!1;return e=t.opts[c.firstRun?"animationEffect":"transitionEffect"],a=t.opts[c.firstRun?"animationDuration":"transitionDuration"],a=parseInt(t.forcedDuration===o?a:t.forcedDuration,10),!t.isMoved&&t.pos===c.currPos&&a||(e=!1),"zoom"!==e||t.pos===c.currPos&&a&&"image"===t.type&&!t.hasError&&(u=c.getThumbPos(t))||(e="fade"),"zoom"===e?(r=c.getFitPos(t),r.scaleX=r.width/u.width,r.scaleY=r.height/u.height,delete r.width,delete r.height,s=t.opts.zoomOpacity,"auto"==s&&(s=Math.abs(t.width/t.height-u.width/u.height)>.1),s&&(u.opacity=.1,r.opacity=1),n.fancybox.setTranslate(t.$content.removeClass("fancybox-is-hidden"),u),f(t.$content),void n.fancybox.animate(t.$content,r,a,function(){c.complete()})):(c.updateSlide(t),e?(n.fancybox.stop(l),i="fancybox-animated fancybox-slide--"+(t.pos>c.prevPos?"next":"previous")+" fancybox-fx-"+e,l.removeAttr("style").removeClass("fancybox-slide--current fancybox-slide--next fancybox-slide--previous").addClass(i),t.$content.removeClass("fancybox-is-hidden"),f(l),void n.fancybox.animate(l,"fancybox-slide--current",a,function(e){l.removeClass(i).removeAttr("style"),t.pos===c.currPos&&c.complete()},!0)):(f(l),t.$content.removeClass("fancybox-is-hidden"),void(t.pos===c.currPos&&c.complete())))},getThumbPos:function(o){var i,a=this,s=!1,r=function(e){for(var o,i=e[0],a=i.getBoundingClientRect(),s=[];null!==i.parentElement;)"hidden"!==n(i.parentElement).css("overflow")&&"auto"!==n(i.parentElement).css("overflow")||s.push(i.parentElement.getBoundingClientRect()),i=i.parentElement;return o=s.every(function(t){var e=Math.min(a.right,t.right)-Math.max(a.left,t.left),n=Math.min(a.bottom,t.bottom)-Math.max(a.top,t.top);return e>0&&n>0}),o&&a.bottom>0&&a.right>0&&a.left<n(t).width()&&a.top<n(t).height()},c=o.opts.$thumb,l=c?c.offset():0;return l&&c[0].ownerDocument===e&&r(c)&&(i=a.$refs.stage.offset(),s={top:l.top-i.top+parseFloat(c.css("border-top-width")||0),left:l.left-i.left+parseFloat(c.css("border-left-width")||0),width:c.width(),height:c.height(),scaleX:1,scaleY:1}),s},complete:function(){var t=this,o=t.current,i={};o.isMoved||!o.isLoaded||o.isComplete||(o.isComplete=!0,o.$slide.siblings().trigger("onReset"),f(o.$slide),o.$slide.addClass("fancybox-slide--complete"),n.each(t.slides,function(e,o){o.pos>=t.currPos-1&&o.pos<=t.currPos+1?i[o.pos]=o:o&&(n.fancybox.stop(o.$slide),o.$slide.off().remove())}),t.slides=i,t.updateCursor(),t.trigger("afterShow"),(n(e.activeElement).is("[disabled]")||o.opts.autoFocus&&"image"!=o.type&&"iframe"!==o.type)&&t.focus())},preload:function(){var t,e,n=this;n.group.length<2||(t=n.slides[n.currPos+1],e=n.slides[n.currPos-1],t&&"image"===t.type&&n.loadSlide(t),e&&"image"===e.type&&n.loadSlide(e))},focus:function(){var t,e=this.current;this.isClosing||(e&&e.isComplete&&(t=e.$slide.find("input[autofocus]:enabled:visible:first"),t.length||(t=e.$slide.find("button,:input,[tabindex],a").filter(":enabled:visible:first"))),t=t&&t.length?t:this.$refs.container,t.focus())},activate:function(){var t=this;n(".fancybox-container").each(function(){var e=n(this).data("FancyBox");e&&e.uid!==t.uid&&!e.isClosing&&e.trigger("onDeactivate")}),t.current&&(t.$refs.container.index()>0&&t.$refs.container.prependTo(e.body),t.updateControls()),t.trigger("onActivate"),t.addEvents()},close:function(t,e){var o,i,a,s,r,c,l=this,f=l.current,h=function(){l.cleanUp(t)};return!l.isClosing&&(l.isClosing=!0,l.trigger("beforeClose",t)===!1?(l.isClosing=!1,u(function(){l.update()}),!1):(l.removeEvents(),f.timouts&&clearTimeout(f.timouts),a=f.$content,o=f.opts.animationEffect,i=n.isNumeric(e)?e:o?f.opts.animationDuration:0,f.$slide.off(d).removeClass("fancybox-slide--complete fancybox-slide--next fancybox-slide--previous fancybox-animated"),f.$slide.siblings().trigger("onReset").remove(),i&&l.$refs.container.removeClass("fancybox-is-open").addClass("fancybox-is-closing"),l.hideLoading(f),l.hideControls(),l.updateCursor(),"zoom"!==o||t!==!0&&a&&i&&"image"===f.type&&!f.hasError&&(c=l.getThumbPos(f))||(o="fade"),"zoom"===o?(n.fancybox.stop(a),r=n.fancybox.getTranslate(a),r.width=r.width*r.scaleX,r.height=r.height*r.scaleY,s=f.opts.zoomOpacity,"auto"==s&&(s=Math.abs(f.width/f.height-c.width/c.height)>.1),s&&(c.opacity=0),r.scaleX=r.width/c.width,r.scaleY=r.height/c.height,r.width=c.width,r.height=c.height,n.fancybox.setTranslate(f.$content,r),n.fancybox.animate(f.$content,c,i,h),!0):(o&&i?t===!0?setTimeout(h,i):n.fancybox.animate(f.$slide.removeClass("fancybox-slide--current"),"fancybox-animated fancybox-slide--previous fancybox-fx-"+o,i,h):h(),!0)))},cleanUp:function(t){var e,o=this;o.current.$slide.trigger("onReset"),o.$refs.container.empty().remove(),o.trigger("afterClose",t),o.$lastFocus&&o.current.opts.backFocus&&o.$lastFocus.focus(),o.current=null,e=n.fancybox.getInstance(),e?e.activate():(s.scrollTop(o.scrollTop).scrollLeft(o.scrollLeft),n("html").removeClass("fancybox-enabled"),n("#fancybox-style-noscroll").remove())},trigger:function(t,e){var o,i=Array.prototype.slice.call(arguments,1),a=this,s=e&&e.opts?e:a.current;return s?i.unshift(s):s=a,i.unshift(a),n.isFunction(s.opts[t])&&(o=s.opts[t].apply(s,i)),o===!1?o:void("afterClose"===t?r.trigger(t+".fb",i):a.$refs.container.trigger(t+".fb",i))},updateControls:function(t){var e=this,o=e.current,i=o.index,a=o.opts,s=a.caption,r=e.$refs.caption;o.$slide.trigger("refresh"),e.$caption=s&&s.length?r.html(s):null,e.isHiddenControls||e.showControls(),n("[data-fancybox-count]").html(e.group.length),n("[data-fancybox-index]").html(i+1),n("[data-fancybox-prev]").prop("disabled",!a.loop&&i<=0),n("[data-fancybox-next]").prop("disabled",!a.loop&&i>=e.group.length-1)},hideControls:function(){this.isHiddenControls=!0,this.$refs.container.removeClass("fancybox-show-infobar fancybox-show-toolbar fancybox-show-caption fancybox-show-nav")},showControls:function(){var t=this,e=t.current?t.current.opts:t.opts,n=t.$refs.container;t.isHiddenControls=!1,t.idleSecondsCounter=0,n.toggleClass("fancybox-show-toolbar",!(!e.toolbar||!e.buttons)).toggleClass("fancybox-show-infobar",!!(e.infobar&&t.group.length>1)).toggleClass("fancybox-show-nav",!!(e.arrows&&t.group.length>1)).toggleClass("fancybox-is-modal",!!e.modal),t.$caption?n.addClass("fancybox-show-caption "):n.removeClass("fancybox-show-caption")},toggleControls:function(){this.isHiddenControls?this.showControls():this.hideControls()}}),n.fancybox={version:"3.1.28",defaults:a,getInstance:function(t){var e=n('.fancybox-container:not(".fancybox-is-closing"):first').data("FancyBox"),o=Array.prototype.slice.call(arguments,1);return e instanceof h&&("string"===n.type(t)?e[t].apply(e,o):"function"===n.type(t)&&t.apply(e,o),e)},open:function(t,e,n){return new h(t,e,n)},close:function(t){var e=this.getInstance();e&&(e.close(),t===!0&&this.close())},destroy:function(){this.close(!0),r.off("click.fb-start")},isMobile:e.createTouch!==o&&/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent),use3d:function(){var n=e.createElement("div");return t.getComputedStyle&&t.getComputedStyle(n).getPropertyValue("transform")&&!(e.documentMode&&e.documentMode<11)}(),getTranslate:function(t){var e;if(!t||!t.length)return!1;if(e=t.eq(0).css("transform"),e&&e.indexOf("matrix")!==-1?(e=e.split("(")[1],e=e.split(")")[0],e=e.split(",")):e=[],e.length)e=e.length>10?[e[13],e[12],e[0],e[5]]:[e[5],e[4],e[0],e[3]],e=e.map(parseFloat);else{e=[0,0,1,1];var n=/\.*translate\((.*)px,(.*)px\)/i,o=n.exec(t.eq(0).attr("style"));o&&(e[0]=parseFloat(o[2]),e[1]=parseFloat(o[1]))}return{top:e[0],left:e[1],scaleX:e[2],scaleY:e[3],opacity:parseFloat(t.css("opacity")),width:t.width(),height:t.height()}},setTranslate:function(t,e){var n="",i={};if(t&&e)return e.left===o&&e.top===o||(n=(e.left===o?t.position().left:e.left)+"px, "+(e.top===o?t.position().top:e.top)+"px",n=this.use3d?"translate3d("+n+", 0px)":"translate("+n+")"),e.scaleX!==o&&e.scaleY!==o&&(n=(n.length?n+" ":"")+"scale("+e.scaleX+", "+e.scaleY+")"),n.length&&(i.transform=n),e.opacity!==o&&(i.opacity=e.opacity),e.width!==o&&(i.width=e.width),e.height!==o&&(i.height=e.height),t.css(i)},animate:function(t,e,i,a,s){var r=d||"transitionend";n.isFunction(i)&&(a=i,i=null),n.isPlainObject(e)||t.removeAttr("style"),t.on(r,function(i){(!i||!i.originalEvent||t.is(i.originalEvent.target)&&"z-index"!=i.originalEvent.propertyName)&&(t.off(r),n.isPlainObject(e)?e.scaleX!==o&&e.scaleY!==o&&(t.css("transition-duration","0ms"),e.width=Math.round(t.width()*e.scaleX),e.height=Math.round(t.height()*e.scaleY),e.scaleX=1,e.scaleY=1,n.fancybox.setTranslate(t,e)):s!==!0&&t.removeClass(e),n.isFunction(a)&&a(i))}),n.isNumeric(i)&&t.css("transition-duration",i+"ms"),n.isPlainObject(e)?n.fancybox.setTranslate(t,e):t.addClass(e),t.data("timer",setTimeout(function(){t.trigger("transitionend")},i+16))},stop:function(t){clearTimeout(t.data("timer")),t.off(d)}},n.fn.fancybox=function(t){var e;return t=t||{},e=t.selector||!1,e?n("body").off("click.fb-start",e).on("click.fb-start",e,{options:t},i):this.off("click.fb-start").on("click.fb-start",{items:this,options:t},i),this},r.on("click.fb-start","[data-fancybox]",i)}}(window,document,window.jQuery||jQuery),function(t){"use strict";var e=function(e,n,o){if(e)return o=o||"","object"===t.type(o)&&(o=t.param(o,!0)),t.each(n,function(t,n){e=e.replace("$"+t,n||"")}),o.length&&(e+=(e.indexOf("?")>0?"&":"?")+o),e},n={youtube:{matcher:/(youtube\.com|youtu\.be|youtube\-nocookie\.com)\/(watch\?(.*&)?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*))(.*)/i,params:{autoplay:1,autohide:1,fs:1,rel:0,hd:1,wmode:"transparent",enablejsapi:1,html5:1},paramPlace:8,type:"iframe",url:"//www.youtube.com/embed/$4",thumb:"//img.youtube.com/vi/$4/hqdefault.jpg"},vimeo:{matcher:/^.+vimeo.com\/(.*\/)?([\d]+)(.*)?/,params:{autoplay:1,hd:1,show_title:1,show_byline:1,show_portrait:0,fullscreen:1,api:1},paramPlace:3,type:"iframe",url:"//player.vimeo.com/video/$2"},metacafe:{matcher:/metacafe.com\/watch\/(\d+)\/(.*)?/,type:"iframe",url:"//www.metacafe.com/embed/$1/?ap=1"},dailymotion:{matcher:/dailymotion.com\/video\/(.*)\/?(.*)/,params:{additionalInfos:0,autoStart:1},type:"iframe",url:"//www.dailymotion.com/embed/video/$1"},vine:{matcher:/vine.co\/v\/([a-zA-Z0-9\?\=\-]+)/,type:"iframe",url:"//vine.co/v/$1/embed/simple"},instagram:{matcher:/(instagr\.am|instagram\.com)\/p\/([a-zA-Z0-9_\-]+)\/?/i,type:"image",url:"//$1/p/$2/media/?size=l"},gmap_place:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(((maps\/(place\/(.*)\/)?\@(.*),(\d+.?\d+?)z))|(\?ll=))(.*)?/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/?ll="+(t[9]?t[9]+"&z="+Math.floor(t[10])+(t[12]?t[12].replace(/^\//,"&"):""):t[12])+"&output="+(t[12]&&t[12].indexOf("layer=c")>0?"svembed":"embed")}},gmap_search:{matcher:/(maps\.)?google\.([a-z]{2,3}(\.[a-z]{2})?)\/(maps\/search\/)(.*)/i,type:"iframe",url:function(t){return"//maps.google."+t[2]+"/maps?q="+t[5].replace("query=","q=").replace("api=1","")+"&output=embed"}}};t(document).on("onInit.fb",function(o,i){t.each(i.group,function(o,i){var a,s,r,c,l,u,d,f=i.src||"",h=!1;i.type||(a=t.extend(!0,{},n,i.opts.media),t.each(a,function(n,o){if(r=f.match(o.matcher),u={},d=n,r){if(h=o.type,o.paramPlace&&r[o.paramPlace]){l=r[o.paramPlace],"?"==l[0]&&(l=l.substring(1)),l=l.split("&");for(var a=0;a<l.length;++a){var p=l[a].split("=",2);2==p.length&&(u[p[0]]=decodeURIComponent(p[1].replace(/\+/g," ")))}}return c=t.extend(!0,{},o.params,i.opts[n],u),f="function"===t.type(o.url)?o.url.call(this,r,c,i):e(o.url,r,c),s="function"===t.type(o.thumb)?o.thumb.call(this,r,c,i):e(o.thumb,r),"vimeo"===d&&(f=f.replace("&%23","#")),!1}}),h?(i.src=f,i.type=h,i.opts.thumb||i.opts.$thumb&&i.opts.$thumb.length||(i.opts.thumb=s),"iframe"===h&&(t.extend(!0,i.opts,{
    iframe:{preload:!1,attr:{scrolling:"no"}}}),i.contentProvider=d,i.opts.slideClass+=" fancybox-slide--"+("gmap_place"==d||"gmap_search"==d?"map":"video"))):i.type="image")})})}(window.jQuery),function(t,e,n){"use strict";var o=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),i=function(){return t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.mozCancelAnimationFrame||t.oCancelAnimationFrame||function(e){t.clearTimeout(e)}}(),a=function(e){var n=[];e=e.originalEvent||e||t.e,e=e.touches&&e.touches.length?e.touches:e.changedTouches&&e.changedTouches.length?e.changedTouches:[e];for(var o in e)e[o].pageX?n.push({x:e[o].pageX,y:e[o].pageY}):e[o].clientX&&n.push({x:e[o].clientX,y:e[o].clientY});return n},s=function(t,e,n){return e&&t?"x"===n?t.x-e.x:"y"===n?t.y-e.y:Math.sqrt(Math.pow(t.x-e.x,2)+Math.pow(t.y-e.y,2)):0},r=function(t){if(t.is("a,button,input,select,textarea,label")||n.isFunction(t.get(0).onclick)||t.data("selectable"))return!0;for(var e=0,o=t[0].attributes,i=o.length;e<i;e++)if("data-fancybox-"===o[e].nodeName.substr(0,14))return!0;return!1},c=function(e){var n=t.getComputedStyle(e)["overflow-y"],o=t.getComputedStyle(e)["overflow-x"],i=("scroll"===n||"auto"===n)&&e.scrollHeight>e.clientHeight,a=("scroll"===o||"auto"===o)&&e.scrollWidth>e.clientWidth;return i||a},l=function(t){for(var e=!1;;){if(e=c(t.get(0)))break;if(t=t.parent(),!t.length||t.hasClass("fancybox-stage")||t.is("body"))break}return e},u=function(t){var e=this;e.instance=t,e.$bg=t.$refs.bg,e.$stage=t.$refs.stage,e.$container=t.$refs.container,e.destroy(),e.$container.on("touchstart.fb.touch mousedown.fb.touch",n.proxy(e,"ontouchstart"))};u.prototype.destroy=function(){this.$container.off(".fb.touch")},u.prototype.ontouchstart=function(o){var i=this,c=n(o.target),u=i.instance,d=u.current,f=d.$content,h="touchstart"==o.type;if(h&&i.$container.off("mousedown.fb.touch"),!d||i.instance.isAnimating||i.instance.isClosing)return o.stopPropagation(),void o.preventDefault();if((!o.originalEvent||2!=o.originalEvent.button)&&c.length&&!r(c)&&!r(c.parent())&&!(o.originalEvent.clientX>c[0].clientWidth+c.offset().left)&&(i.startPoints=a(o),i.startPoints&&!(i.startPoints.length>1&&u.isSliding))){if(i.$target=c,i.$content=f,i.canTap=!0,n(e).off(".fb.touch"),n(e).on(h?"touchend.fb.touch touchcancel.fb.touch":"mouseup.fb.touch mouseleave.fb.touch",n.proxy(i,"ontouchend")),n(e).on(h?"touchmove.fb.touch":"mousemove.fb.touch",n.proxy(i,"ontouchmove")),!u.current.opts.touch&&!u.canPan()||!c.is(i.$stage)&&!i.$stage.find(c).length)return void(c.is("img")&&o.preventDefault());o.stopPropagation(),n.fancybox.isMobile&&(l(i.$target)||l(i.$target.parent()))||o.preventDefault(),i.canvasWidth=Math.round(d.$slide[0].clientWidth),i.canvasHeight=Math.round(d.$slide[0].clientHeight),i.startTime=(new Date).getTime(),i.distanceX=i.distanceY=i.distance=0,i.isPanning=!1,i.isSwiping=!1,i.isZooming=!1,i.sliderStartPos=i.sliderLastPos||{top:0,left:0},i.contentStartPos=n.fancybox.getTranslate(i.$content),i.contentLastPos=null,1!==i.startPoints.length||i.isZooming||(i.canTap=!u.isSliding,"image"===d.type&&(i.contentStartPos.width>i.canvasWidth+1||i.contentStartPos.height>i.canvasHeight+1)?(n.fancybox.stop(i.$content),i.$content.css("transition-duration","0ms"),i.isPanning=!0):i.isSwiping=!0,i.$container.addClass("fancybox-controls--isGrabbing")),2!==i.startPoints.length||u.isAnimating||d.hasError||"image"!==d.type||!d.isLoaded&&!d.$ghost||(i.isZooming=!0,i.isSwiping=!1,i.isPanning=!1,n.fancybox.stop(i.$content),i.$content.css("transition-duration","0ms"),i.centerPointStartX=.5*(i.startPoints[0].x+i.startPoints[1].x)-n(t).scrollLeft(),i.centerPointStartY=.5*(i.startPoints[0].y+i.startPoints[1].y)-n(t).scrollTop(),i.percentageOfImageAtPinchPointX=(i.centerPointStartX-i.contentStartPos.left)/i.contentStartPos.width,i.percentageOfImageAtPinchPointY=(i.centerPointStartY-i.contentStartPos.top)/i.contentStartPos.height,i.startDistanceBetweenFingers=s(i.startPoints[0],i.startPoints[1]))}},u.prototype.ontouchmove=function(t){var e=this;if(e.newPoints=a(t),n.fancybox.isMobile&&(l(e.$target)||l(e.$target.parent())))return t.stopPropagation(),void(e.canTap=!1);if((e.instance.current.opts.touch||e.instance.canPan())&&e.newPoints&&e.newPoints.length&&(e.distanceX=s(e.newPoints[0],e.startPoints[0],"x"),e.distanceY=s(e.newPoints[0],e.startPoints[0],"y"),e.distance=s(e.newPoints[0],e.startPoints[0]),e.distance>0)){if(!e.$target.is(e.$stage)&&!e.$stage.find(e.$target).length)return;t.stopPropagation(),t.preventDefault(),e.isSwiping?e.onSwipe():e.isPanning?e.onPan():e.isZooming&&e.onZoom()}},u.prototype.onSwipe=function(){var e,a=this,s=a.isSwiping,r=a.sliderStartPos.left||0;s===!0?Math.abs(a.distance)>10&&(a.canTap=!1,a.instance.group.length<2&&a.instance.opts.touch.vertical?a.isSwiping="y":a.instance.isSliding||a.instance.opts.touch.vertical===!1||"auto"===a.instance.opts.touch.vertical&&n(t).width()>800?a.isSwiping="x":(e=Math.abs(180*Math.atan2(a.distanceY,a.distanceX)/Math.PI),a.isSwiping=e>45&&e<135?"y":"x"),a.instance.isSliding=a.isSwiping,a.startPoints=a.newPoints,n.each(a.instance.slides,function(t,e){n.fancybox.stop(e.$slide),e.$slide.css("transition-duration","0ms"),e.inTransition=!1,e.pos===a.instance.current.pos&&(a.sliderStartPos.left=n.fancybox.getTranslate(e.$slide).left)}),a.instance.SlideShow&&a.instance.SlideShow.isActive&&a.instance.SlideShow.stop()):("x"==s&&(a.distanceX>0&&(a.instance.group.length<2||0===a.instance.current.index&&!a.instance.current.opts.loop)?r+=Math.pow(a.distanceX,.8):a.distanceX<0&&(a.instance.group.length<2||a.instance.current.index===a.instance.group.length-1&&!a.instance.current.opts.loop)?r-=Math.pow(-a.distanceX,.8):r+=a.distanceX),a.sliderLastPos={top:"x"==s?0:a.sliderStartPos.top+a.distanceY,left:r},a.requestId&&(i(a.requestId),a.requestId=null),a.requestId=o(function(){a.sliderLastPos&&(n.each(a.instance.slides,function(t,e){var o=e.pos-a.instance.currPos;n.fancybox.setTranslate(e.$slide,{top:a.sliderLastPos.top,left:a.sliderLastPos.left+o*a.canvasWidth+o*e.opts.gutter})}),a.$container.addClass("fancybox-is-sliding"))}))},u.prototype.onPan=function(){var t,e,a,s=this;s.canTap=!1,t=s.contentStartPos.width>s.canvasWidth?s.contentStartPos.left+s.distanceX:s.contentStartPos.left,e=s.contentStartPos.top+s.distanceY,a=s.limitMovement(t,e,s.contentStartPos.width,s.contentStartPos.height),a.scaleX=s.contentStartPos.scaleX,a.scaleY=s.contentStartPos.scaleY,s.contentLastPos=a,s.requestId&&(i(s.requestId),s.requestId=null),s.requestId=o(function(){n.fancybox.setTranslate(s.$content,s.contentLastPos)})},u.prototype.limitMovement=function(t,e,n,o){var i,a,s,r,c=this,l=c.canvasWidth,u=c.canvasHeight,d=c.contentStartPos.left,f=c.contentStartPos.top,h=c.distanceX,p=c.distanceY;return i=Math.max(0,.5*l-.5*n),a=Math.max(0,.5*u-.5*o),s=Math.min(l-n,.5*l-.5*n),r=Math.min(u-o,.5*u-.5*o),n>l&&(h>0&&t>i&&(t=i-1+Math.pow(-i+d+h,.8)||0),h<0&&t<s&&(t=s+1-Math.pow(s-d-h,.8)||0)),o>u&&(p>0&&e>a&&(e=a-1+Math.pow(-a+f+p,.8)||0),p<0&&e<r&&(e=r+1-Math.pow(r-f-p,.8)||0)),{top:e,left:t}},u.prototype.limitPosition=function(t,e,n,o){var i=this,a=i.canvasWidth,s=i.canvasHeight;return n>a?(t=t>0?0:t,t=t<a-n?a-n:t):t=Math.max(0,a/2-n/2),o>s?(e=e>0?0:e,e=e<s-o?s-o:e):e=Math.max(0,s/2-o/2),{top:e,left:t}},u.prototype.onZoom=function(){var e=this,a=e.contentStartPos.width,r=e.contentStartPos.height,c=e.contentStartPos.left,l=e.contentStartPos.top,u=s(e.newPoints[0],e.newPoints[1]),d=u/e.startDistanceBetweenFingers,f=Math.floor(a*d),h=Math.floor(r*d),p=(a-f)*e.percentageOfImageAtPinchPointX,g=(r-h)*e.percentageOfImageAtPinchPointY,b=(e.newPoints[0].x+e.newPoints[1].x)/2-n(t).scrollLeft(),m=(e.newPoints[0].y+e.newPoints[1].y)/2-n(t).scrollTop(),y=b-e.centerPointStartX,v=m-e.centerPointStartY,x=c+(p+y),w=l+(g+v),$={top:w,left:x,scaleX:e.contentStartPos.scaleX*d,scaleY:e.contentStartPos.scaleY*d};e.canTap=!1,e.newWidth=f,e.newHeight=h,e.contentLastPos=$,e.requestId&&(i(e.requestId),e.requestId=null),e.requestId=o(function(){n.fancybox.setTranslate(e.$content,e.contentLastPos)})},u.prototype.ontouchend=function(t){var o=this,s=Math.max((new Date).getTime()-o.startTime,1),r=o.isSwiping,c=o.isPanning,l=o.isZooming;return o.endPoints=a(t),o.$container.removeClass("fancybox-controls--isGrabbing"),n(e).off(".fb.touch"),o.requestId&&(i(o.requestId),o.requestId=null),o.isSwiping=!1,o.isPanning=!1,o.isZooming=!1,o.canTap?o.onTap(t):(o.speed=366,o.velocityX=o.distanceX/s*.5,o.velocityY=o.distanceY/s*.5,o.speedX=Math.max(.5*o.speed,Math.min(1.5*o.speed,1/Math.abs(o.velocityX)*o.speed)),void(c?o.endPanning():l?o.endZooming():o.endSwiping(r)))},u.prototype.endSwiping=function(t){var e=this,o=!1;e.instance.isSliding=!1,e.sliderLastPos=null,"y"==t&&Math.abs(e.distanceY)>50?(n.fancybox.animate(e.instance.current.$slide,{top:e.sliderStartPos.top+e.distanceY+150*e.velocityY,opacity:0},150),o=e.instance.close(!0,300)):"x"==t&&e.distanceX>50&&e.instance.group.length>1?o=e.instance.previous(e.speedX):"x"==t&&e.distanceX<-50&&e.instance.group.length>1&&(o=e.instance.next(e.speedX)),o!==!1||"x"!=t&&"y"!=t||e.instance.jumpTo(e.instance.current.index,150),e.$container.removeClass("fancybox-is-sliding")},u.prototype.endPanning=function(){var t,e,o,i=this;i.contentLastPos&&(i.instance.current.opts.touch.momentum===!1?(t=i.contentLastPos.left,e=i.contentLastPos.top):(t=i.contentLastPos.left+i.velocityX*i.speed,e=i.contentLastPos.top+i.velocityY*i.speed),o=i.limitPosition(t,e,i.contentStartPos.width,i.contentStartPos.height),o.width=i.contentStartPos.width,o.height=i.contentStartPos.height,n.fancybox.animate(i.$content,o,330))},u.prototype.endZooming=function(){var t,e,o,i,a=this,s=a.instance.current,r=a.newWidth,c=a.newHeight;a.contentLastPos&&(t=a.contentLastPos.left,e=a.contentLastPos.top,i={top:e,left:t,width:r,height:c,scaleX:1,scaleY:1},n.fancybox.setTranslate(a.$content,i),r<a.canvasWidth&&c<a.canvasHeight?a.instance.scaleToFit(150):r>s.width||c>s.height?a.instance.scaleToActual(a.centerPointStartX,a.centerPointStartY,150):(o=a.limitPosition(t,e,r,c),n.fancybox.setTranslate(a.content,n.fancybox.getTranslate(a.$content)),n.fancybox.animate(a.$content,o,150)))},u.prototype.onTap=function(t){var e,o=this,i=n(t.target),s=o.instance,r=s.current,c=t&&a(t)||o.startPoints,l=c[0]?c[0].x-o.$stage.offset().left:0,u=c[0]?c[0].y-o.$stage.offset().top:0,d=function(e){var i=r.opts[e];if(n.isFunction(i)&&(i=i.apply(s,[r,t])),i)switch(i){case"close":s.close(o.startEvent);break;case"toggleControls":s.toggleControls(!0);break;case"next":s.next();break;case"nextOrClose":s.group.length>1?s.next():s.close(o.startEvent);break;case"zoom":"image"==r.type&&(r.isLoaded||r.$ghost)&&(s.canPan()?s.scaleToFit():s.isScaledDown()?s.scaleToActual(l,u):s.group.length<2&&s.close(o.startEvent))}};if(!(t.originalEvent&&2==t.originalEvent.button||s.isSliding||l>i[0].clientWidth+i.offset().left)){if(i.is(".fancybox-bg,.fancybox-inner,.fancybox-outer,.fancybox-container"))e="Outside";else if(i.is(".fancybox-slide"))e="Slide";else{if(!s.current.$content||!s.current.$content.has(t.target).length)return;e="Content"}if(o.tapped){if(clearTimeout(o.tapped),o.tapped=null,Math.abs(l-o.tapX)>50||Math.abs(u-o.tapY)>50||s.isSliding)return this;d("dblclick"+e)}else o.tapX=l,o.tapY=u,r.opts["dblclick"+e]&&r.opts["dblclick"+e]!==r.opts["click"+e]?o.tapped=setTimeout(function(){o.tapped=null,d("click"+e)},300):d("click"+e);return this}},n(e).on("onActivate.fb",function(t,e){e&&!e.Guestures&&(e.Guestures=new u(e))}),n(e).on("beforeClose.fb",function(t,e){e&&e.Guestures&&e.Guestures.destroy()})}(window,document,window.jQuery),function(t,e){"use strict";var n=function(t){this.instance=t,this.init()};e.extend(n.prototype,{timer:null,isActive:!1,$button:null,speed:3e3,init:function(){var t=this;t.$button=t.instance.$refs.toolbar.find("[data-fancybox-play]").on("click",function(){t.toggle()}),(t.instance.group.length<2||!t.instance.group[t.instance.currIndex].opts.slideShow)&&t.$button.hide()},set:function(){var t=this;t.instance&&t.instance.current&&(t.instance.current.opts.loop||t.instance.currIndex<t.instance.group.length-1)?t.timer=setTimeout(function(){t.instance.next()},t.instance.current.opts.slideShow.speed||t.speed):(t.stop(),t.instance.idleSecondsCounter=0,t.instance.showControls())},clear:function(){var t=this;clearTimeout(t.timer),t.timer=null},start:function(){var t=this,e=t.instance.current;t.instance&&e&&(e.opts.loop||e.index<t.instance.group.length-1)&&(t.isActive=!0,t.$button.attr("title",e.opts.i18n[e.opts.lang].PLAY_STOP).addClass("fancybox-button--pause"),e.isComplete&&t.set())},stop:function(){var t=this,e=t.instance.current;t.clear(),t.$button.attr("title",e.opts.i18n[e.opts.lang].PLAY_START).removeClass("fancybox-button--pause"),t.isActive=!1},toggle:function(){var t=this;t.isActive?t.stop():t.start()}}),e(t).on({"onInit.fb":function(t,e){e&&!e.SlideShow&&(e.SlideShow=new n(e))},"beforeShow.fb":function(t,e,n,o){var i=e&&e.SlideShow;o?i&&n.opts.slideShow.autoStart&&i.start():i&&i.isActive&&i.clear()},"afterShow.fb":function(t,e,n){var o=e&&e.SlideShow;o&&o.isActive&&o.set()},"afterKeydown.fb":function(n,o,i,a,s){var r=o&&o.SlideShow;!r||!i.opts.slideShow||80!==s&&32!==s||e(t.activeElement).is("button,a,input")||(a.preventDefault(),r.toggle())},"beforeClose.fb onDeactivate.fb":function(t,e){var n=e&&e.SlideShow;n&&n.stop()}}),e(t).on("visibilitychange",function(){var n=e.fancybox.getInstance(),o=n&&n.SlideShow;o&&o.isActive&&(t.hidden?o.clear():o.set())})}(document,window.jQuery),function(t,e){"use strict";var n=function(){var e,n,o,i=[["requestFullscreen","exitFullscreen","fullscreenElement","fullscreenEnabled","fullscreenchange","fullscreenerror"],["webkitRequestFullscreen","webkitExitFullscreen","webkitFullscreenElement","webkitFullscreenEnabled","webkitfullscreenchange","webkitfullscreenerror"],["webkitRequestFullScreen","webkitCancelFullScreen","webkitCurrentFullScreenElement","webkitCancelFullScreen","webkitfullscreenchange","webkitfullscreenerror"],["mozRequestFullScreen","mozCancelFullScreen","mozFullScreenElement","mozFullScreenEnabled","mozfullscreenchange","mozfullscreenerror"],["msRequestFullscreen","msExitFullscreen","msFullscreenElement","msFullscreenEnabled","MSFullscreenChange","MSFullscreenError"]],a={};for(n=0;n<i.length;n++)if(e=i[n],e&&e[1]in t){for(o=0;o<e.length;o++)a[i[0][o]]=e[o];return a}return!1}();if(!n)return void(e&&e.fancybox&&(e.fancybox.defaults.btnTpl.fullScreen=!1));var o={request:function(e){e=e||t.documentElement,e[n.requestFullscreen](e.ALLOW_KEYBOARD_INPUT)},exit:function(){t[n.exitFullscreen]()},toggle:function(e){e=e||t.documentElement,this.isFullscreen()?this.exit():this.request(e)},isFullscreen:function(){return Boolean(t[n.fullscreenElement])},enabled:function(){return Boolean(t[n.fullscreenEnabled])}};e(t).on({"onInit.fb":function(t,e){var n,i=e.$refs.toolbar.find("[data-fancybox-fullscreen]");e&&!e.FullScreen&&e.group[e.currIndex].opts.fullScreen?(n=e.$refs.container,n.on("click.fb-fullscreen","[data-fancybox-fullscreen]",function(t){t.stopPropagation(),t.preventDefault(),o.toggle(n[0])}),e.opts.fullScreen&&e.opts.fullScreen.autoStart===!0&&o.request(n[0]),e.FullScreen=o):i.hide()},"afterKeydown.fb":function(t,e,n,o,i){e&&e.FullScreen&&70===i&&(o.preventDefault(),e.FullScreen.toggle(e.$refs.container[0]))},"beforeClose.fb":function(t){t&&t.FullScreen&&o.exit()}}),e(t).on(n.fullscreenchange,function(){var t=e.fancybox.getInstance();t.current&&"image"===t.current.type&&t.isAnimating&&(t.current.$content.css("transition","none"),t.isAnimating=!1,t.update(!0,!0,0)),t.trigger("onFullscreenChange",o.isFullscreen())})}(document,window.jQuery),function(t,e){"use strict";var n=function(t){this.instance=t,this.init()};e.extend(n.prototype,{$button:null,$grid:null,$list:null,isVisible:!1,init:function(){var t=this,e=t.instance.group[0],n=t.instance.group[1];t.$button=t.instance.$refs.toolbar.find("[data-fancybox-thumbs]"),t.instance.group.length>1&&t.instance.group[t.instance.currIndex].opts.thumbs&&("image"==e.type||e.opts.thumb||e.opts.$thumb)&&("image"==n.type||n.opts.thumb||n.opts.$thumb)?(t.$button.on("click",function(){t.toggle()}),t.isActive=!0):(t.$button.hide(),t.isActive=!1)},create:function(){var t,n,o=this.instance;this.$grid=e('<div class="fancybox-thumbs"></div>').appendTo(o.$refs.container),t="<ul>",e.each(o.group,function(e,o){n=o.opts.thumb||(o.opts.$thumb?o.opts.$thumb.attr("src"):null),n||"image"!==o.type||(n=o.src),n&&n.length&&(t+='<li data-index="'+e+'"  tabindex="0" class="fancybox-thumbs-loading"><img data-src="'+n+'" /></li>')}),t+="</ul>",this.$list=e(t).appendTo(this.$grid).on("click","li",function(){o.jumpTo(e(this).data("index"))}),this.$list.find("img").hide().one("load",function(){var t,n,o,i,a=e(this).parent().removeClass("fancybox-thumbs-loading"),s=a.outerWidth(),r=a.outerHeight();t=this.naturalWidth||this.width,n=this.naturalHeight||this.height,o=t/s,i=n/r,o>=1&&i>=1&&(o>i?(t/=i,n=r):(t=s,n/=o)),e(this).css({width:Math.floor(t),height:Math.floor(n),"margin-top":Math.min(0,Math.floor(.3*r-.3*n)),"margin-left":Math.min(0,Math.floor(.5*s-.5*t))}).show()}).each(function(){this.src=e(this).data("src")})},focus:function(){this.instance.current&&this.$list.children().removeClass("fancybox-thumbs-active").filter('[data-index="'+this.instance.current.index+'"]').addClass("fancybox-thumbs-active").focus()},close:function(){this.$grid.hide()},update:function(){this.instance.$refs.container.toggleClass("fancybox-show-thumbs",this.isVisible),this.isVisible?(this.$grid||this.create(),this.instance.trigger("onThumbsShow"),this.focus()):this.$grid&&this.instance.trigger("onThumbsHide"),this.instance.update()},hide:function(){this.isVisible=!1,this.update()},show:function(){this.isVisible=!0,this.update()},toggle:function(){this.isVisible=!this.isVisible,this.update()}}),e(t).on({"onInit.fb":function(t,e){e&&!e.Thumbs&&(e.Thumbs=new n(e))},"beforeShow.fb":function(t,e,n,o){var i=e&&e.Thumbs;if(i&&i.isActive){if(n.modal)return i.$button.hide(),void i.hide();o&&n.opts.thumbs.autoStart===!0&&i.show(),i.isVisible&&i.focus()}},"afterKeydown.fb":function(t,e,n,o,i){var a=e&&e.Thumbs;a&&a.isActive&&71===i&&(o.preventDefault(),a.toggle())},"beforeClose.fb":function(t,e){var n=e&&e.Thumbs;n&&n.isVisible&&e.opts.thumbs.hideOnClose!==!1&&n.close()}})}(document,window.jQuery),function(t,e,n){"use strict";function o(){var t=e.location.hash.substr(1),n=t.split("-"),o=n.length>1&&/^\+?\d+$/.test(n[n.length-1])?parseInt(n.pop(-1),10)||1:1,i=n.join("-");return o<1&&(o=1),{hash:t,index:o,gallery:i}}function i(t){var e;""!==t.gallery&&(e=n("[data-fancybox='"+n.escapeSelector(t.gallery)+"']").eq(t.index-1),e.length||(e=n("#"+n.escapeSelector(t.gallery))),e.length&&(s=!1,e.trigger("click")))}function a(t){var e;return!!t&&(e=t.current?t.current.opts:t.opts,e.hash||(e.$orig?e.$orig.data("fancybox"):""))}n.escapeSelector||(n.escapeSelector=function(t){var e=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\x80-\uFFFF\w-]/g,n=function(t,e){return e?"\0"===t?"�":t.slice(0,-1)+"\\"+t.charCodeAt(t.length-1).toString(16)+" ":"\\"+t};return(t+"").replace(e,n)});var s=!0,r=null,c=null;n(function(){setTimeout(function(){n.fancybox.defaults.hash!==!1&&(n(t).on({"onInit.fb":function(t,e){var n,i;e.group[e.currIndex].opts.hash!==!1&&(n=o(),i=a(e),i&&n.gallery&&i==n.gallery&&(e.currIndex=n.index-1))},"beforeShow.fb":function(n,o,i){var l;i&&i.opts.hash!==!1&&(l=a(o),l&&""!==l&&(e.location.hash.indexOf(l)<0&&(o.opts.origHash=e.location.hash),r=l+(o.group.length>1?"-"+(i.index+1):""),"replaceState"in e.history?(c&&clearTimeout(c),c=setTimeout(function(){e.history[s?"pushState":"replaceState"]({},t.title,e.location.pathname+e.location.search+"#"+r),c=null,s=!1},300)):e.location.hash=r))},"beforeClose.fb":function(o,i,s){var l,u;c&&clearTimeout(c),s.opts.hash!==!1&&(l=a(i),u=i&&i.opts.origHash?i.opts.origHash:"",l&&""!==l&&("replaceState"in history?e.history.replaceState({},t.title,e.location.pathname+e.location.search+u):(e.location.hash=u,n(e).scrollTop(i.scrollTop).scrollLeft(i.scrollLeft))),r=null)}}),n(e).on("hashchange.fb",function(){var t=o();n.fancybox.getInstance()?!r||r===t.gallery+"-"+t.index||1===t.index&&r==t.gallery||(r=null,n.fancybox.close()):""!==t.gallery&&i(t)}),i(o()))},50)})}(document,window,window.jQuery);

/*! lazysizes - v4.0.0-rc4 */
!function(a,b){var c=b(a,a.document);a.lazySizes=c,"object"==typeof module&&module.exports&&(module.exports=c)}(window,function(a,b){"use strict";if(b.getElementsByClassName){var c,d,e=b.documentElement,f=a.Date,g=a.HTMLPictureElement,h="addEventListener",i="getAttribute",j=a[h],k=a.setTimeout,l=a.requestAnimationFrame||k,m=a.requestIdleCallback,n=/^picture$/i,o=["load","error","lazyincluded","_lazyloaded"],p={},q=Array.prototype.forEach,r=function(a,b){return p[b]||(p[b]=new RegExp("(\\s|^)"+b+"(\\s|$)")),p[b].test(a[i]("class")||"")&&p[b]},s=function(a,b){r(a,b)||a.setAttribute("class",(a[i]("class")||"").trim()+" "+b)},t=function(a,b){var c;(c=r(a,b))&&a.setAttribute("class",(a[i]("class")||"").replace(c," "))},u=function(a,b,c){var d=c?h:"removeEventListener";c&&u(a,b),o.forEach(function(c){a[d](c,b)})},v=function(a,d,e,f,g){var h=b.createEvent("CustomEvent");return e||(e={}),e.instance=c,h.initCustomEvent(d,!f,!g,e),a.dispatchEvent(h),h},w=function(b,c){var e;!g&&(e=a.picturefill||d.pf)?e({reevaluate:!0,elements:[b]}):c&&c.src&&(b.src=c.src)},x=function(a,b){return(getComputedStyle(a,null)||{})[b]},y=function(a,b,c){for(c=c||a.offsetWidth;c<d.minSize&&b&&!a._lazysizesWidth;)c=b.offsetWidth,b=b.parentNode;return c},z=function(){var a,c,d=[],e=[],f=d,g=function(){var b=f;for(f=d.length?e:d,a=!0,c=!1;b.length;)b.shift()();a=!1},h=function(d,e){a&&!e?d.apply(this,arguments):(f.push(d),c||(c=!0,(b.hidden?k:l)(g)))};return h._lsFlush=g,h}(),A=function(a,b){return b?function(){z(a)}:function(){var b=this,c=arguments;z(function(){a.apply(b,c)})}},B=function(a){var b,c=0,d=125,e=666,g=e,h=function(){b=!1,c=f.now(),a()},i=m?function(){m(h,{timeout:g}),g!==e&&(g=e)}:A(function(){k(h)},!0);return function(a){var e;(a=a===!0)&&(g=44),b||(b=!0,e=d-(f.now()-c),0>e&&(e=0),a||9>e&&m?i():k(i,e))}},C=function(a){var b,c,d=99,e=function(){b=null,a()},g=function(){var a=f.now()-c;d>a?k(g,d-a):(m||e)(e)};return function(){c=f.now(),b||(b=k(g,d))}},D=function(){var g,l,m,o,p,y,D,F,G,H,I,J,K,L,M=/^img$/i,N=/^iframe$/i,O="onscroll"in a&&!/glebot/.test(navigator.userAgent),P=0,Q=0,R=0,S=-1,T=function(a){R--,a&&a.target&&u(a.target,T),(!a||0>R||!a.target)&&(R=0)},U=function(a,c){var d,f=a,g="hidden"==x(b.body,"visibility")||"hidden"!=x(a,"visibility");for(F-=c,I+=c,G-=c,H+=c;g&&(f=f.offsetParent)&&f!=b.body&&f!=e;)g=(x(f,"opacity")||1)>0,g&&"visible"!=x(f,"overflow")&&(d=f.getBoundingClientRect(),g=H>d.left&&G<d.right&&I>d.top-1&&F<d.bottom+1);return g},V=function(){var a,f,h,j,k,m,n,p,q,r=c.elements;if((o=d.loadMode)&&8>R&&(a=r.length)){f=0,S++,null==K&&("expand"in d||(d.expand=e.clientHeight>500&&e.clientWidth>500?500:370),J=d.expand,K=J*d.expFactor),K>Q&&1>R&&S>2&&o>2&&!b.hidden?(Q=K,S=0):Q=o>1&&S>1&&6>R?J:P;for(;a>f;f++)if(r[f]&&!r[f]._lazyRace)if(O)if((p=r[f][i]("data-expand"))&&(m=1*p)||(m=Q),q!==m&&(y=innerWidth+m*L,D=innerHeight+m,n=-1*m,q=m),h=r[f].getBoundingClientRect(),(I=h.bottom)>=n&&(F=h.top)<=D&&(H=h.right)>=n*L&&(G=h.left)<=y&&(I||H||G||F)&&(d.loadHidden||"hidden"!=x(r[f],"visibility"))&&(l&&3>R&&!p&&(3>o||4>S)||U(r[f],m))){if(ba(r[f]),k=!0,R>9)break}else!k&&l&&!j&&4>R&&4>S&&o>2&&(g[0]||d.preloadAfterLoad)&&(g[0]||!p&&(I||H||G||F||"auto"!=r[f][i](d.sizesAttr)))&&(j=g[0]||r[f]);else ba(r[f]);j&&!k&&ba(j)}},W=B(V),X=function(a){s(a.target,d.loadedClass),t(a.target,d.loadingClass),u(a.target,Z),v(a.target,"lazyloaded")},Y=A(X),Z=function(a){Y({target:a.target})},$=function(a,b){try{a.contentWindow.location.replace(b)}catch(c){a.src=b}},_=function(a){var b,c=a[i](d.srcsetAttr);(b=d.customMedia[a[i]("data-media")||a[i]("media")])&&a.setAttribute("media",b),c&&a.setAttribute("srcset",c)},aa=A(function(a,b,c,e,f){var g,h,j,l,o,p;(o=v(a,"lazybeforeunveil",b)).defaultPrevented||(e&&(c?s(a,d.autosizesClass):a.setAttribute("sizes",e)),h=a[i](d.srcsetAttr),g=a[i](d.srcAttr),f&&(j=a.parentNode,l=j&&n.test(j.nodeName||"")),p=b.firesLoad||"src"in a&&(h||g||l),o={target:a},p&&(u(a,T,!0),clearTimeout(m),m=k(T,2500),s(a,d.loadingClass),u(a,Z,!0)),l&&q.call(j.getElementsByTagName("source"),_),h?a.setAttribute("srcset",h):g&&!l&&(N.test(a.nodeName)?$(a,g):a.src=g),f&&(h||l)&&w(a,{src:g})),a._lazyRace&&delete a._lazyRace,t(a,d.lazyClass),z(function(){(!p||a.complete&&a.naturalWidth>1)&&(p?T(o):R--,X(o))},!0)}),ba=function(a){var b,c=M.test(a.nodeName),e=c&&(a[i](d.sizesAttr)||a[i]("sizes")),f="auto"==e;(!f&&l||!c||!a[i]("src")&&!a.srcset||a.complete||r(a,d.errorClass)||!r(a,d.lazyClass))&&(b=v(a,"lazyunveilread").detail,f&&E.updateElem(a,!0,a.offsetWidth),a._lazyRace=!0,R++,aa(a,b,f,e,c))},ca=function(){if(!l){if(f.now()-p<999)return void k(ca,999);var a=C(function(){d.loadMode=3,W()});l=!0,d.loadMode=3,W(),j("scroll",function(){3==d.loadMode&&(d.loadMode=2),a()},!0)}};return{_:function(){p=f.now(),c.elements=b.getElementsByClassName(d.lazyClass),g=b.getElementsByClassName(d.lazyClass+" "+d.preloadClass),L=d.hFac,j("scroll",W,!0),j("resize",W,!0),a.MutationObserver?new MutationObserver(W).observe(e,{childList:!0,subtree:!0,attributes:!0}):(e[h]("DOMNodeInserted",W,!0),e[h]("DOMAttrModified",W,!0),setInterval(W,999)),j("hashchange",W,!0),["focus","mouseover","click","load","transitionend","animationend","webkitAnimationEnd"].forEach(function(a){b[h](a,W,!0)}),/d$|^c/.test(b.readyState)?ca():(j("load",ca),b[h]("DOMContentLoaded",W),k(ca,2e4)),c.elements.length?(V(),z._lsFlush()):W()},checkElems:W,unveil:ba}}(),E=function(){var a,c=A(function(a,b,c,d){var e,f,g;if(a._lazysizesWidth=d,d+="px",a.setAttribute("sizes",d),n.test(b.nodeName||""))for(e=b.getElementsByTagName("source"),f=0,g=e.length;g>f;f++)e[f].setAttribute("sizes",d);c.detail.dataAttr||w(a,c.detail)}),e=function(a,b,d){var e,f=a.parentNode;f&&(d=y(a,f,d),e=v(a,"lazybeforesizes",{width:d,dataAttr:!!b}),e.defaultPrevented||(d=e.detail.width,d&&d!==a._lazysizesWidth&&c(a,f,e,d)))},f=function(){var b,c=a.length;if(c)for(b=0;c>b;b++)e(a[b])},g=C(f);return{_:function(){a=b.getElementsByClassName(d.autosizesClass),j("resize",g)},checkElems:g,updateElem:e}}(),F=function(){F.i||(F.i=!0,E._(),D._())};return function(){var b,c={lazyClass:"lazyload",loadedClass:"lazyloaded",loadingClass:"lazyloading",preloadClass:"lazypreload",errorClass:"lazyerror",autosizesClass:"lazyautosizes",srcAttr:"data-src",srcsetAttr:"data-srcset",sizesAttr:"data-sizes",minSize:40,customMedia:{},init:!0,expFactor:1.5,hFac:.8,loadMode:2,loadHidden:!0};d=a.lazySizesConfig||a.lazysizesConfig||{};for(b in c)b in d||(d[b]=c[b]);a.lazySizesConfig=d,k(function(){d.init&&F()})}(),c={cfg:d,autoSizer:E,loader:D,init:F,uP:w,aC:s,rC:t,hC:r,fire:v,gW:y,rAF:z}}});

var BUTTON;

function initIronside()
{
    BUTTON = new ButtonClass();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $("meta[name='csrf-token']").attr("content")
        }
    });

    $('.input-generate-slug').change(function () {
        var v = convertStringToSlug($(this).val());
        $("form input[name='slug']").val(v);
    })

    $('.btn-submit').attr('data-loading-text', "<i class='fa fa-spin fa-refresh'></i>");
    $('.btn-submit').on('click', function () {
        $(this).button('loading');
        log($('.btn-submit').attr('data-loading-text'));
    });

    function convertStringToSlug(text)
    {
        return text.toString().toLowerCase().trim()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/&/g, '-and-')         // Replace & with 'and'
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '')             // Trim - from end of text
            .replace(/-$/, '');             // Remove last floating dash if exists
    }

    getHeaderNotifications();
}

function doAjax(url, data, callback)
{
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: "json",
        timeout: 30000,
        error: function (x, t, m) {
        },
        success: function (response) {
            if (typeof callback == 'function') {
                callback(response);
            }
        }
    });
}

/**
 * In Header of Box, the toolbox daterange icon
 * Dropdown with the selected dates to select from
 * @param selector
 * @param callback
 */
function initToolbarDateRange(selector, callback)
{
    $(selector).daterangepicker({
        ranges: {
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 3 Months': [moment().subtract(2, 'month').startOf('month'), moment().endOf('month')],
            'Last 6 Months': [moment().subtract(5, 'month').startOf('month'), moment().endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function (start, end) {
        //window.alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        if (typeof callback === 'function') {
            callback(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
        }
    });
}

/**
 * Give from and to datetimepicker inputs,
 * This will automatically set min / max date on the fields
 */
function dateTimePickerRange(from, to, lang = 'ar') {

    $(from).datetimepicker({ locale: lang });

    $(to).datetimepicker({useCurrent: false,  locale: lang });

    $(from).on("change.datetimepicker", function (e) {
        $(to).datetimepicker('minDate', e.date);
    });
    $(to).on("change.datetimepicker", function (e) {
        $(from).datetimepicker('maxDate', e.date);
    });
}
function setDateTimePickerRange(from, to)
{
    $(from).datetimepicker();
    $(to).datetimepicker({useCurrent: false});

    $(from).on("dp.change", function (e) {
        $(to).data("DateTimePicker").minDate(e.date);
    });
    $(to).on("dp.change", function (e) {
        $(from).data("DateTimePicker").maxDate(e.date);
    });
}

function initSummerNote(selector, height,lang)
{
    console.log(lang);
    $(selector).summernote({
        tabsize: 2,
        focus: false,
        height: height ? height : 120,
        lang: lang ? lang : 'en-US',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['color', ['color']],
            ['layout', ['ul', 'ol', 'paragraph']],
            ['insert', ['table', 'link', /*'picture', 'video',*/ 'hr']],
            ['misc', ['fullscreen', 'codeview', 'undo']]
        ]
    });
}

function addLinkToSummernote(selector, name, url, isNewWindow)
{
    $(selector).summernote('createLink', {
        text: name,
        url: url,
        isNewWindow: isNewWindow
    });
}

function isFunction(variable)
{
    var getType = {};
    return variable && getType.toString.call(variable) === '[object Function]';
}

/*
 * Button Class
 */
var ButtonClass = function (options)
{
    /*
     * Can access this.method
     * inside other methods using
     * root.method()
     */
    var root = this;

    /*
     * Constructor
     */
    this.construct = function (options)
    {
        root.activate();
    };

    /**
     * Set button into loading status
     * @param btn
     */
    this.loading = function (btn)
    {
        $(btn).attr('data-loading-text', "<i class='fa fa-spin fa-refresh'></i>");
        $(btn).each(function ()
        {
            $(this).attr('data-loading-text', "<i class='fa fa-spin fa-refresh'></i>");
            $(this).button('loading');
        })
    }

    /**
     * Reset the status of the button
     * @param btn
     */
    this.reset = function (btn)
    {
        $(btn).each(function ()
        {
            $(this).button('reset');
        })
    }

    // enable all buttons
    this.activate = function ()
    {
        $('.btn-ajax-submit').attr('data-loading-text', "<i class='fa fa-spin fa-refresh'></i>");
        $('.btn-ajax-submit').each(function ()
        {
            buttonEnable($(this));
        });

        $('.btn-ajax-submit').off('click');
        $('.btn-ajax-submit').on('click', function ()
        {
            // buttonDisable($(this));
            buttonDisable($(this));
        });

        $('.btn-submit').attr('data-loading-text', "<i class='fa fa-spin fa-refresh'></i>");
        $('.btn-submit').on('click', function ()
        {
            $(this).button('loading');
        });
    }

    // enable a specific button
    var buttonEnable = function (btn)
    {
        btn.each(function ()
        {
            // $(this).prop('disabled', false);
            // $(this).html($(this).attr('data-text'));

            $(this).button('reset');
        })
    }

    // disable and show loading button
    var buttonDisable = function (btn)
    {
        btn.each(function ()
        {
            // reset the text (some buttons change their text)
            $(this).attr('data-text', $(this).html());

            // disable (chrome messes this up)
            // form does not get submitted on chrome
            // $(this).prop('disabled', true);

            // show loading
            // $(this).html('loading...');

            $(this).button('loading');
        })
    }

    /*
     * Pass options when class instantiated
     */
    this.construct();
};
$(function () {
    $("body").append("<div id='notify-container'></div>");
    $("body").append("<audio id='notify-sound-info' src='/sounds/info.mp3'></audio>");
    $("body").append("<audio id='notify-sound-danger' src='/sounds/danger.mp3'></audio>");
});

/**
 * Global Success Helper
 * @param title
 * @param content
 * @param level
 */
function notify(title, content, level, icon, timeout)
{
    $.notify({
        title: title,
        content: content,
        level: level ? level : 'success',
        icon: icon ? icon : "fa fa-thumbs-o-up bounce animated",
        iconSmall: icon ? icon : "fa fa-thumbs-o-up bounce animated",
        timeout: timeout ? timeout : undefined,
    });
}

/**
 * Global Error Helper
 * @param title
 * @param content
 */
function notifyError(title, content)
{
    $.notify({
        title: title,
        content: content,
        level: 'danger',
        icon: "fa fa-thumbs-o-down shake animated",
        iconSmall: "fa fa-thumbs-o-down spin animated",
    });
}

var notifyCount = 0;
var notifyHeight = 0;

$.notify = function (settings) {
    settings = $.extend({
        title: "",
        content: "",
        icon: undefined,
        iconSmall: undefined,
        level: 'info',
        timeout: undefined
    }, settings);

    // vars
    notifyCount = notifyCount + 1;
    var notifyId = "notify" + notifyCount;

    // sound
    var soundFile = settings.level;
    if (settings.level == 'success') {
        soundFile = 'info';
    }
    if (settings.level == 'warning') {
        soundFile = 'danger';
    }

    // play sound
    document.getElementById('notify-sound-' + soundFile).play()

    // html markup
    var html = '<div id="' + notifyId + '"';
    html += 'class="notify animated fadeInRight fast alert-' + settings.level + '">';
    if (settings.icon == undefined) {
        html += '<div class="textfull">';
    } else {
        html += '<div class="icon-big"><i class="' + settings.icon + '"></i></div><div class="text">';
    }
    html += '<span>' + settings.title + '</span>'
    html += '<p>' + settings.content + '</p>';
    html += '</div><div>';
    if (settings.iconSmall) {
        html += '<i class="icon-small ' + settings.iconSmall + '"></i>';
    }
    html += '</div></div>';

    // append html markup to container
    $("#notify-container").append(html);
    if (notifyCount == 1 || $(".notify").length <= 0) {
        notifyHeight = $("#" + notifyId).height() + 40;
    } else {
        $("#" + notifyId).css("top", notifyHeight);

        // update all of their positions
        updateNotifyPositions(0);
    }

    // remove on timeout
    if (settings.timeout != undefined) {
        setTimeout(function () {
            removeNotify($("#" + notifyId));
        }, settings.timeout);
    }

    // remove on click
    $("#notify" + notifyCount).bind('click', function () {
        removeNotify($(this));
    });

    /**
     * Remove the notify and update the positions
     * @param ele
     */
    function removeNotify(ele)
    {
        // css3 animations
        ele.removeClass('fadeInRight').addClass('fadeOutRight');

        // after animation - remove and update other
        setTimeout(function () {
            ele.remove();
            updateNotifyPositions(300)
        }, 400);
    }

    /**
     * Remove element
     * Update other notifies positions
     * @param ele
     */
    function updateNotifyPositions(delay)
    {
        $(".notify").each(function (index) {
            if (index == 0) {
                $(this).animate({top: 20}, delay);
                notifyHeight = $(this).height() + 40;
            } else {
                $(this).animate({top: notifyHeight}, delay + 50);
                notifyHeight += $(this).height() + 20;
            }
        });
    }
}
/**
 * Validate the ajax response from the server
 * If an ajax error occurred - show error alert
 * @param response
 * @returns {boolean}
 */
function validateAjaxResponse(response)
{
    updateUserCredit(response); // update credit if needed

    if (!(response.success || response.data)) {
        $('#page-feedback-alert').slideDown();
        if (response.data && response.data['description'] && response.data['description'].length > 5) {
            notifyError(response.data['title'], response.data['description']);
            $('#page-feedback-alert').find('.content').html(response.data['title'] + ' ' + response.data['description']);
        } else {
            notifyError('Sorry', 'A system error occurred. Please try again or contact our Call centre.');
            $('#page-feedback-alert').find('.content').html('Sorry, A system error occurred. Please try again or contact our Call centre.');
        }

        return false;
    }

    hideSpinner();
    return true;
}

/**
 * Validate the purchase response
 * It will show page error or insufficient funds it missing
 * @param response
 * @param key
 * @param credit
 * @returns {boolean}
 */
function validatePurchaseResponse(response, key, credit)
{
    if (!validateAjaxResponse(response)) {
        return false;
    }

    credit = (credit ? credit : 1);

    if (!response.data[key]) {

        $('#page-feedback-alert').slideDown();
        if (response.data && response.data['description'] && response.data['description'].length > 5) {
            notifyError(response.data['title'], response.data['description']);
            $('#page-feedback-alert').find('.content').html(response.data['title'] + ' ' + response.data['description']);
        } else {
            notifyError('Sorry', 'A system error occurred. Please try again or contact our Call centre.');
            $('#page-feedback-alert').find('.content').html('Sorry, A system error occurred. Please try again or contact our Call centre.');
        }

        if (response.data['credit'] < credit) {
            $('#page-feedback-alert').find('.content').html('You have insufficient funds!')
        }
        return false;
    }
    return true;
}
function getHeaderNotifications()
{
    function getHeaderActivities()
    {
        $.cookie.json = true;
        $('.dropdown-toggle').on('click', function () {
            var type = $(this).attr('data-type');
            if (type) {
                var cookie = $.cookie(type);
                if (cookie) {
                    var items = [];
                    // mark all items as 'read'
                    for (var i = 0; i < cookie.length; i++) {
                        items.push({'id': cookie[i]['id'], 'read': true});
                    }
                    $.cookie(type, items, {expires: 2, path: '/dashboard'});
                    $('#js-' + type + '-badge').hide();
                }
            }
        });

        doAjax('/api/notifications/actions/latest', null, function (response) {
            renderActivities(response, 'activities');
        });

        function renderActivities(response, type)
        {
            if (!(response.success || response.data)) {
                return false;
            }

            var items = response['data'];
            if (items.length > 0) {
                $('#js-' + type + '-badge').show();
                $('#js-' + type + '-badge').html(items.length);
                $('#js-'+ type +'-show-heart').css('display','block');

            } else {
                $('#js-' + type + '-badge').hide();
                $('#js-' + type + '-list').html('<li><a><p style="margin-left: 0px; text-align: center">There are no ' + type + '</p></a></li>');
                return false;
            }

            // get the items from cookie
            var cookie = $.cookie(type);

            var total = items.length;
            var cookieItems = [];
            $('#js-' + type + '-list').html('');
            for (var i = 0; i < items.length; i++) {
                var item = items[i];

                var html = '<a href="#">';
                html += '<div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>';
                html += '<div class="mail-contnet m-r-9">' +
                    '<h5>' + item["title"] + '</h5>' +
                    '<span class="mail-desc">' + item["message"] + '</span>' +
                    '<span class="time text-left"> <i class="fa fa-clock-o"></i> ' + item["created_at"] + '</span>' +
                    '</div>';
                html += '</a>';

                // if cookie
                if (cookie) {
                    // find item in cookie
                    for (var j = 0; j < cookie.length; j++) {
                        if (cookie[j]['id'] == item['id'] && cookie[j]['read']) {
                            total--; // decrement total
                            items[i]['read'] = true;
                        }
                    }
                }

                cookieItems.push({'id': items[i]['id'], 'read': items[i]['read']});

                $('#js-' + type + '-list').append(html);
            }

            // update counter
            if (total > 0) {
                $('#js-' + type + '-badge').html(total);
                $('#js-'+ type +'-show-heart').css('display','block');

            } else { // hide if all is read
                // $('#js-' + type + '-badge').hide();
                $('#js-'+ type +'-show-heart').css('display','none');
            }

            $.cookie(type, cookieItems, {expires: 2, path: '/dashboard'});
        }
    }

    function getUnreadNotifications(userId)
    {
        doAjax('/api/notifications/' + userId + '/unread', null, function (response) {
            renderNotificationsTable(response);
        });
    }

    function renderNotificationsTable(response)
    {
        // no need to 'update credit or hide spinner)
        // if it failed - just ignore as it will call again
        if (!(response.success || response.data)) {
            return false;
        }

        var items = response['data'];
        if (items.length > 0) {
            // $('#js-notifications-badge').show();
            $('#js-notifications-badge').html(items.length);
            $('#js-notifications-show-heart').css('display','block');

        } else {
            $('#js-notifications-badge').hide();
            $('#tbl-notifications').find('tbody').html('<tr><td colspan="3" class="text-center">There are currently no notices</td></tr>');
            return false;
        }

        $('#tbl-notifications').find('tbody').html('');
        for (var i = 0; i < items.length; i++) {
            var item = items[i];

            var html = '<tr><td>' + item['created_at'] + '</td>';
            html += '<td>' + item['message'] + '</td>';
            html += '<td><a data-user="' + item['user_id'] + '" data-id="' + item['id'] + '" class="btn btn-xs btn-primary btn-notification-read">Read</a></td></tr>';

            $('#tbl-notifications').find('tbody').append(html);
        }

        registerNotificationRead();
    }

    function registerNotificationRead()
    {
        $('.btn-notification-read').off('click');
        $('.btn-notification-read').on('click', function (e) {
            e.preventDefault();
            BUTTON.loading($(this));

            var userId = $(this).attr('data-user');
            var id = $(this).attr('data-id');
            doAjax('/api/notifications/' + userId + '/read/' + id, null, function (response) {
                renderNotificationsTable(response);
            });
        });
    }

    if ($('#js-notifications') && $('#js-notifications').length > 0) {
        getHeaderActivities();
        getUnreadNotifications($('#js-notifications-badge').attr('data-user'));
    }
}

//---------------------------------------------
// FORMS UTILS
//---------------------------------------------
var FormClass = function (options)
{
    var vars = {};

    var root = this;

    this.construct = function (options)
    {
        $.extend(vars, options);

        $('.input-generate-slug').change(function ()
        {
            var v = convertStringToSlug($(this).val());
            $("form input[name='slug']").val(v);
        })

        function convertStringToSlug(text)
        {
            return text.toString().toLowerCase().trim()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/&/g, '-and-')         // Replace & with 'and'
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '')             // Trim - from end of text
                .replace(/-$/, '');             // Remove last floating dash if exists
        }
    };

    /**
     * Validate a form
     *
     * @param form
     * @param inputs
     * @returns {boolean}
     */
    this.validateForm = function (form, inputs)
    {
        var id = '#' + $(form).attr('id');
        var alert = id + ' .alert';

        // validate form
        var s = "";
        // general validation
        for (var i = 0; i < inputs.length; i++) {
            var input = inputs[i];
            var type = input['type'] ? input['type'] : 'input';
            s += root.validateFormField(id, input['name'], type);
        }

        if (s.length > 1) {
            root.showAlert(alert, 'danger', 'Please complete the form.');
            BTN.reset(form.find('[type="submit"]'));
            return false;
        }

        // do the 'special' validation
        for (var i = 0; i < inputs.length; i++) {
            var input = inputs[i];

            // if email - test on valid email
            if (input['email'] && input['email'] === true) {
                if (!root.validateEmail($(id + " input[name='" + input['name'] + "']").val())) {
                    root.addFormFieldError(id, input['name']);
                    root.showAlert(alert, 'danger', 'Email is not valid.');
                    BTN.reset(form.find('[type="submit"]'));
                    return false;
                }
            }
        }

        // hide alert
        $(alert).slideUp();
        BTN.reset(form.find('[type="submit"]'));
        return true;
    }

    this.activateSubmitBtn = function (form)
    {
        BTN.reset($(form).find('[type="submit"]'));
    }

    /**
     * Send the form data to the server
     *
     * @param form
     * @param data
     */
    this.sendFormToServer = function (form, data, callback)
    {
        var id = '#' + $(form).attr('id');
        var url = $(form).attr('action');
        var spinner = id + ' .feedback-spinner';
        var alert = id + ' .feedback-alert';

        $(alert).hide();
        $(spinner).slideDown(100);

        // set loading text and disable btn
        BTN.loading(form.find('[type="submit"]'));
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            dataType: 'json',
            success: function (response)
            {
                $(spinner).slideUp();

                // when custom ajax error
                if (response['success'] == 0 && response['error']) {
                    root.showAlert(alert, 'danger', response['error']['title']);
                    BTN.reset(form.find('[type="submit"]')); // reset button
                    return false;
                }

                // clear form fields
                root.resetForm(form);

                // reload / redirect
                if (response.data['redirect'] && response.data['redirect'].length > 2) {
                    document.location.href = response.data['redirect'];
                } else {
                    if (response['success'] && response['data'] && response['data']['level']) {
                        root.showAlert(alert, response['data']['level'], response['data']['title'] + ' ' + response['data']['description']);
                    } else {

                        if (typeof callback == 'function') {
                            callback(response.data);
                        } else {
                            root.showAlert(alert, 'success', response.data);
                        }
                    }
                }

                // reset captcha and clear inputs on success
                if (typeof grecaptcha != "undefined") {
                    grecaptcha.reset();
                }
            },
            error: function (data)
            {
                var errors = data.responseJSON;
                if(errors.hasOwnProperty('errors')) {
                    errors = errors.errors;
                }

                var messages = '';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        // if array or string
                        if (!Array.isArray(errors[key])) {
                            messages += errors[key] + "<br/>";
                        } else {
                            messages += errors[key][0] + "<br/>";
                        }
                    }
                }

                $(spinner).slideUp();
                BTN.reset(form.find('[type="submit"]'));
                root.showAlert(alert, 'danger', messages);
            }
        });
    }

    /**
     * Show the form alert
     *
     * @param elesohw
     * @param content
     */
    this.showAlert = function (ele, type, content)
    {
        FORM.activateSubmitBtn($(ele).parents('form'));

        $(ele).removeClass('alert-danger alert-success alert-warning hidden').addClass('alert-' + type);
        $(ele).html(content);
        $(ele).slideDown();
    }

    this.showAlertSuccess = function (ele, content)
    {
        root.showAlert(ele, 'success', content);
    }

    this.validateFormField = function (id, inputName, type)
    {
        var s = "";
        var input = $(id + " " + type + "[name='" + inputName + "']");
        var parent = input.parent().removeClass('error');

        if (type == 'select') {
            if (input.find(":selected").val() <= 0) {
                parent.addClass('error');
                s += "Please select the " + inputName.charAt(0).toUpperCase() + inputName.slice(1) + ". <br/>";
            }
        } else {
            if (input.val().length <= 1) {
                parent.addClass('error');
                s += "Please add your " + inputName.charAt(0).toUpperCase() + inputName.slice(1) + ". <br/>";
            }
        }

        return s;
    }

    this.addFormFieldError = function (id, inputName)
    {
        var input = $(id + " input[name='" + inputName + "']");
        input.parent().removeClass('error').addClass('error');
    }

    this.removeFormFieldError = function (id, inputName)
    {
        var input = $(id + " input[name='" + inputName + "']");
        input.parent().removeClass('error');
    }

    this.validateEmail = function (email)
    {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    /**
     * Reset the form
     * @param form
     */
    this.resetForm = function (form)
    {
        form.find('textarea').val('');
        form.find('textarea').html('');
        form.find('input')
            .not('input[type="radio"]')
            .not('input[type="checkbox"]')
            .not('input[type="hidden"]')
            .val('');

        form.find('input').each(function ()
        {
            $(this).parent().removeClass('error');
        });

        var alert = '#' + form.attr('id') + ' .alert';
        $(".feedback-spinner").slideUp();
        $(alert).slideUp();

        BTN.reset(form.find('[type="submit"]'));
    }

    /**
     * Get the selected val of a select
     * @param id
     * @param name
     * @returns {*|jQuery}
     */
    this.selectValByName = function (id, name)
    {
        return $(id + ' select[name="' + name + '"]').find(":selected").val();
    }

    /**
     * Input Helper
     * @param form
     * @param name
     * @param type
     * @returns {*|jQuery|HTMLElement}
     */
    this.input = function (form, name, type)
    {
        type = type ? type : 'input';
        return $(form + ' ' + type + '[name="' + name + '"]');
    }

    this.construct(options);
};
//-------------------------------------------------
// SOCIAL MEDIA SHARE ACTIONS
//-------------------------------------------------
$(function () {
    $(".link-share").click(doShareClick);

    function doShareClick(e)
    {
        e.preventDefault();
        var type = $(this).attr('data-social');
        var title = $(this).attr('data-title');
        var image = $(this).attr('data-image');

        // object to be send to server
        var data = {
            'type': type,
            'url': getShareLink(),
            'description': getShareDescription(),
            'title': (title) ? title : getShareTitle(),
            'image': (image) ? image : getShareImage()
        };

        switch (type) {
            case "facebook":
                doFacebookShare();
                break;
            case "twitter":
                doTwitterShare();
                break;
            case "youtube":
                doYoutubeShare();
                break;
            case "googleplus":
                doGoolgePlusShare();
                break;
            case "pinterest":
                doPinterestShare();
                break;
            case "print":
                window.print();
                break;
            case "email":
                document.location.href = "mailto:?subject=" + encodeURI(data['title']) + '&amp;body=' + encodeURI(data['description']);
                break;
        }

        $.post("/ajax/log/social-media", data);

        return false;
    }

    function doFacebookShare()
    {
        if (FB || $('#fb-root').length >= 1) {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: $('meta[name="og:url"]').attr('content')
            }, function (response) {
            });
        }
    }

    function doTwitterShare()
    {
        var message = getShareTitle() + ' ' + getShareLink();
        openPopupWindow("https://twitter.com/home?status=" + encodeURI(message));
        return message;
    }

    function doGoolgePlusShare()
    {
        openPopupWindow("https://plus.google.com/share?url=" + encodeURI(getShareLink()));
    }

    function doYoutubeShare()
    {
        var link = "https://www.youtube.com/channel/UC2c2ERwS06KDXoRgmUWGgDw";
        openPopupWindow(link);
        return link;
    }

    function doPinterestShare()
    {
        var link = "http://pinterest.com/pin/create/button/?url=" + encodeURI(getShareLink());
        link += "&description=" + encodeURI(getShareTitle());
        link += "&media=" + encodeURIComponent(getShareImage());

        openPopupWindow(link);
    }

    function getShareImage()
    {
        return $("meta[name='og:image']").attr('content');
    }

    function getShareLink()
    {
        return window.location.href;
        /*$("meta[name='og:url']").attr('content');*/
    }

    function getShareTitle()
    {
        return $("meta[name='og:title']").attr('content');
    }

    function getShareDescription()
    {
        return $("meta[name='og:description']").attr('content');
    }

    function getShareCaption()
    {
        return $('meta[name="og:caption"]').attr('content');
    }

    function openExternalWindow(url)
    {
        openWindow(url, '_blank');
    }

    function openWindow(url, type)
    {
        var win = window.open(url, type);
        win.focus();
    }

    function openPopupWindow(url)
    {
        var win = window.open(url, 'popup', 'width=600, height=300');
        win.focus();
    }
});
/* Set the defaults for DataTables initialisation */
$.extend(true, $.fn.dataTable.defaults, {
    "oClasses": {
        "sFilter": 'dataTables_filter input-group',
    },
    "oLanguage": {
        "sLengthMenu": "_MENU_",
        "sSearch": "",
        "sInfo": "Showing <span class='txt-color-darken'>_START_</span> to <span class='txt-color-darken'>_END_</span> of <span class='text-primary'>_TOTAL_</span> entries",
        "sInfoEmpty": "<span class='text-danger'>Showing 0 to 0 of 0 entries</span>",
        "sSearch": "<span class='input-group-addon'><i class='glyphicon glyphicon-search'></i></span> "
    }
});

$(function ()
{
    $('.dt-table').each(function ()
    {
        var id = $(this).attr('id');
        var ajax = $(this).attr('data-server');
        if (ajax == 'false') {
            var pageLength = $(this).attr('data-page-length');
            initDataTables('#' + id, {
                iDisplayLength : pageLength ? 10 : pageLength
            });
        }
    })

    initActionDeleteClick();
});

function initDatatablesAjax(selector, url, columns, displayLength)
{
    displayLength = (displayLength ? displayLength : 10);
    return initDataTables(selector, {
        ajax: url,
        processing: true,
        serverSide: true,
        columns: columns,
        iDisplayLength: (displayLength ? displayLength : 10),
        aLengthMenu: [[displayLength, 25, 50, -1], [displayLength, 25, 50, "All"]]
    });
}

function initDataTables(selector, options)
{
    var options = (options ? options : {});
    options.responsive = true;
    options.order = getOrderBy(selector);
    // options.aLengthMenu = [[15, 25, 50, -1], [15, 25, 50, "All"]];
    // options.iDisplayLength = 15;
    // options.sDom = "<'dt-toolbar'<'col-lg-12 col-sm-6'f><'col-sm-6 col-lg-12 hidden-xs'l>r>" +
    //     "t" +
    //     "<'dt-toolbar-footer'<'col-sm-6 col-lg-12 hidden-xs'i><'col-lg-12 col-sm-6'p>>";
    options.drawCallback = function(settings) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    // datatable
    var table = $(selector).DataTable(options);

    // reregister the tooltip events on table
    table.$('[data-toggle="tooltip"]').tooltip();

    return table;
}

function getOrderBy(element)
{
    var orderByVal = $(element).attr('data-order-by');

    var orderBy = [0, 'asc'];
    if (!(orderByVal == 'false' || orderByVal == false || orderByVal == undefined)) {
        var pieces = orderByVal.split('|');
        if (pieces.length == 1) {
            orderBy = [pieces[0], 'asc'];
        }
        else if (pieces.length == 2) {
            orderBy = [pieces[0], pieces[1]];
        }
    }

    return orderBy;
}

function initActionDeleteClick(element)
{
    $('.dt-table').off('click', '.btn-delete-row');
    $('.dt-table').off('click', '.btn-confirm-modal-row');
    if(element) {
        element.off('click', '.btn-delete-row');
        element.off('click', '.btn-confirm-modal-row');
    }

    // DELETE ROW LINK
    $('.dt-table').on('click', '.btn-delete-row', onActionDeleteClick);
    $('.dt-table').on('click', '.btn-confirm-modal-row', onConfirmRowlick);

    if(element) {
        element.on('click', '.btn-delete-row', onActionDeleteClick);
        element.on('click', '.btn-confirm-modal-row', onConfirmRowlick);
    }

    function onActionDeleteClick(e)
    {
        e.preventDefault();

        var formId = $(this).attr('data-form');
        var title = $(this).attr('data-original-title');
        if (title.length > 7) {
            title = '<strong>' + title.substring(0, 6).toLowerCase() + title.slice(7) + '</strong>';
        }
        var content = "Are you sure you want to " + title + " entry? ";

        $('#modal-confirm').find('.modal-body').find('p').html(content);
        $('#modal-confirm').find('.modal-footer').find('.btn-submit').on('click', function (e)
        {
            $('#' + formId).submit();
        });
        $('#modal-confirm').modal('show');

        return false;
    }

    function onConfirmRowlick(e)
    {
        e.preventDefault();
        var formId = $(this).attr('data-form');
        var title = $(this).attr('data-original-title');
        title = '<strong>' + title + '</strong>';

        var content = "Are you sure you want to " + title + "? ";
        $('#modal-confirm').find('.modal-body').find('p').html(content);
        $('#modal-confirm').find('.modal-footer').find('.btn-submit').on('click', function (e)
        {
            $('#' + formId).submit();
        });
        $('#modal-confirm').modal('show');
        return false;
    }
}

/*
 * PaginationClass
 */
var PaginationClass = function (options) {

    var root = this;

    // get the pagination classes
    var isAjaxBusy = false;
    var vars = {
        parent: null,
        popups: false,
        onComplete: null,
        currentPage: 1,
    };

    /*
     * Constructor
     */
    this.construct = function (options) {
        activate();
        $.extend(vars, options);
    };

    /*
     * Activate and init global events
     */
    var activate = function () {
        // 'deeplink' to the page specified
        if (window.location.hash && window.location.hash.length >= 2) {
            var hash = window.location.hash.substring(1);
            root.showPage(parseInt(hash));
        }

        // on hashchange - trigger the page change
        $(window).on('hashchange', function () {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    root.showPage(page);
                }
            }
        });

        // on pagination click
        $(document).on('click', '.pagination a', function (e) {
            root.showPage($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    };

    /**
     * Popup Button events
     * Popup events
     */
    var registerPopups = function () {

    }

    /**
     * Get selected paginate page items
     * @param page
     * @returns {boolean}
     */
    this.showPage = function (page, force) {
        if (force === undefined || force == null) {
            if (isAjaxBusy || vars.currentPage == page) {
                return false;
            }
        }

        isAjaxBusy = true;
        vars.currentPage = page;
        $('.js-pagination-loader').show();
        $.ajax({
            url: '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            isAjaxBusy = false;
            location.hash = page;
            $('.pagination-box').html(data);

            // re register the modal events
            if (vars.popups) {
                registerPopups();
            }

            // call function on parent when ajax is complete
            if (vars.onComplete) {
                vars.onComplete();
            }

            $('.js-pagination-loader').hide();
        }).fail(function () {
            isAjaxBusy = false;
            $('.js-pagination-loader').hide();
        });
    }

    this.construct(options);
};
function initGoogleMapView(selector, latitude, longitude, zoom_level)
{
    var mapCoords = new google.maps.LatLng(latitude, longitude);

    var mapOptions = {
        zoom: zoom_level,
        center: mapCoords,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
        },
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [
            {
                featureType: "administrative",
                elementType: "all",
                stylers: [{visibility: "on"}, {saturation: -100}, {lightness: 20}]
            }, {
                featureType: "road",
                elementType: "all",
                stylers: [{visibility: "on"}, {saturation: -100}, {lightness: 40}]
            }, {
                featureType: "water",
                elementType: "all",
                stylers: [{visibility: "on"}, {saturation: -10}, {lightness: 30}]
            }, {
                featureType: "landscape.man_made",
                elementType: "all",
                stylers: [{visibility: "simplified"}, {saturation: -60}, {lightness: 10}]
            }, {
                featureType: "landscape.natural",
                elementType: "all",
                stylers: [{visibility: "simplified"}, {saturation: -60}, {lightness: 60}]
            }, {
                featureType: "poi",
                elementType: "all",
                stylers: [{visibility: "off"}, {saturation: -100}, {lightness: 60}]
            }, {featureType: "transit", elementType: "all", stylers: [{visibility: "off"}, {saturation: -100}, {lightness: 60}]}
        ]
    };

    var map = new google.maps.Map(document.getElementById(selector), mapOptions);

    return map;
}

function addGoogleMapMarker(map, latitude, longitude, draggable)
{
    draggable = (draggable == undefined || draggable == false ? false : true);

    var marker = new google.maps.Marker({
        map: map,
        draggable: draggable,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(latitude, longitude)
    });

    return marker;
}

function initGoogleMapEditClean(selector, latitude, longitude, zoom_level)
{
    $('form input[name="zoom_level"]').val(zoom_level);
    $('form input[name="latitude"]').val(latitude);
    $('form input[name="longitude"]').val(longitude);

    var map = initGoogleMapView(selector, latitude, longitude, zoom_level);

    google.maps.event.addListener(map, 'zoom_changed', function ()
    {
        $('form input[name="zoom_level"]').val(map.getZoom());
    });

    google.maps.event.addListener(map, 'center_changed', function ()
    {
        var pos = map.getCenter();

        $('form input[name="latitude"]').val(pos.lat());
        $('form input[name="longitude"]').val(pos.lng());
    });

    return map;
}

function initGoogleMapEditMarker(selector, latitude, longitude, zoom_level)
{
    $('form input[name="zoom_level"]').val(zoom_level);
    $('form input[name="latitude"]').val(latitude);
    $('form input[name="longitude"]').val(longitude);

    var map = initGoogleMapView(selector, latitude, longitude, zoom_level);
    var marker = addGoogleMapMarker(map, latitude, longitude, true);

    google.maps.event.addListener(map, 'zoom_changed', function ()
    {
        $('form input[name="zoom_level"]').val(map.getZoom());
    });

    google.maps.event.addListener(marker, 'mouseup', function ()
    {
        var pos = marker.getPosition();
        $('form input[name="latitude"]').val(pos.lat());
        $('form input[name="longitude"]').val(pos.lng());
    });

    // https://developers.google.com/maps/documentation/javascript/examples/places-searchbox
    var input = (document.getElementById('pac-input'));
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var searchBox = new google.maps.places.SearchBox((input));

    google.maps.event.addListener(searchBox, 'places_changed', function ()
    {
        var places = searchBox.getPlaces();

        if (places.length == 0)
        {
            return;
        }

        var bounds = new google.maps.LatLngBounds();
        for (var i = 0, place; place = places[i]; i++)
        {
            marker.setPosition(place.geometry.location);
            map.setCenter(place.geometry.location);

            google.maps.event.trigger(marker, 'mouseup');

            //$("#location option:contains(" + place.address_components[1].long_name + ")").attr('selected', 'selected');
        }
    });

    return {map: map, marker: marker};
}

function addGoogleMapMarkerClick(map, title, latitude, longitude, content)
{
    var marker = new google.maps.Marker({
        map: map,
        title: title,
        draggable: false,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(latitude, longitude)
    });

    google.maps.event.addListener(marker, 'click', function ()
    {
        var iw = new google.maps.InfoWindow({content: content});
        iw.open(map, marker);
    });

    return marker;
}
function showSpinner()
{
    $('.spinner-content').fadeIn(300);
}

function hideSpinner()
{
    $('.spinner-content').stop().fadeOut(300);
    setTimeout(function ()
    {
        $('.spinner-content').stop().fadeOut(300);
    }, 300);
}

function log(value)
{
    console.log(value);
}

function doAjax(url, data, callback, loader)
{
    if (loader == undefined || loader == true) {
        showSpinner();
    }

    var urlFull = url; // BASE_URL.replace(/\/$/, '') + '/' +
    if (url.search('http://') >= 0 || url.search('https://') >= 0) {
        urlFull = url;
    }

    if (data == undefined) {
        data = {};
    }
    // data['api_token'] = API_TOKEN;

    $.ajax({
        type: 'POST',
        url: urlFull,
        data: data,
        dataType: "json",
        timeout: 60000,
        error: function (x, t, m)
        {
            console.log('AJAX ERROR');
            console.log(x);
            console.log(t);
            console.log(m);
            notifyError('Sorry', 'A system error occurred. Please try again or contact our Call centre.');
        },
        success: function (response)
        {
            if (typeof callback == 'function') {
                callback(response);
            }
        }
    });
}

/**
 * Is the ajax response valid
 * @param response
 * @returns {boolean}
 */
function isAjaxResponseValid(response)
{
    if (!(response.success || response.data)) {
        notifyError('Sorry', 'Something went wrong, please try again.');
        return false;
    }

    return true;
}

/**
 * In Header of Box, the toolbox daterange icon
 * Dropdown with the selected dates to select from
 * @param selector
 * @param callback
 */
function initToolbarDateRange(selector, callback)
{
    $(selector).daterangepicker({
        ranges: {
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 3 Months': [moment().subtract(2, 'month').startOf('month'), moment().endOf('month')],
            'Last 6 Months': [moment().subtract(5, 'month').startOf('month'), moment().endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function (start, end)
    {
        //window.alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        if (typeof callback === 'function') {
            callback(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
        }
    });
}

/**
 * Give from and to datetimepicker inputs,
 * This will automatically set min / max date on the fields
 */
function setDateTimePickerRange(from, to)
{
    $(from).datetimepicker();
    $(to).datetimepicker({useCurrent: false});

    $(from).on("dp.change", function (e)
    {
        $(to).data("DateTimePicker").minDate(e.date);
    });
    $(to).on("dp.change", function (e)
    {
        $(from).data("DateTimePicker").maxDate(e.date);
    });
}

function isFunction(variable)
{
    var getType = {};
    return variable && getType.toString.call(variable) === '[object Function]';
}

var roundValue = function (value)
{
    return Math.round(parseFloat(value) * 100) / 100;
}

var formatNumber2Decimal = function (value)
{
    value = parseFloat(value).toFixed(2);
    //value = (value).replace(/.00+$/, "");
    return value;
}
var FORM;
var BTN;

$(document).ready(function () {
    initWebsite();
});

function initWebsite()
{
    FORM = new FormClass();
    BTN = new ButtonClass();

    // init vendor selections on page load
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $("meta[name='csrf-token']").attr("content")
        }
    });

    // back to top button
    $(window).scroll(function () {
        // if u scrolled more than 80% of the current window
        if ($(window).scrollTop() > ($(window).height() * .8)) {
            $('.back-to-top').css({"bottom": "20px"});
        } else {
            $('.back-to-top').css({"bottom": "-50px"});
        }
    });

    // jump to an achor link
    $("a.jumper").click(function (event) {
        event.preventDefault();
        var link = $(this).attr('href');
        setTimeout(function () {
            $(link).trigger('click');
        }, 500);
        var urlHashes = this.href.split("#");
        var scrollTop = $("#" + urlHashes[1]).offset().top - 50;
        $('html, body').animate({scrollTop: scrollTop}, 500);
        return false;
    });
}