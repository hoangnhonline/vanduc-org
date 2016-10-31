/*!
 * jQuery UI Dialog 1.9.1
 * http://jqueryui.com
 *
 * Copyright 2012 jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * http://api.jqueryui.com/dialog/
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.widget.js
 *  jquery.ui.button.js
 *	jquery.ui.draggable.js
 *	jquery.ui.mouse.js
 *	jquery.ui.position.js
 *	jquery.ui.resizable.js
 */
(function(d,e){var b="ui-dialog ui-widget ui-widget-content ui-corner-all ",a={buttons:true,height:true,maxHeight:true,maxWidth:true,minHeight:true,minWidth:true,width:true},c={maxHeight:true,maxWidth:true,minHeight:true,minWidth:true};d.widget("ui.dialog",{version:"1.9.1",options:{autoOpen:true,buttons:{},closeOnEscape:true,closeText:"close",dialogClass:"",draggable:true,hide:null,height:"auto",maxHeight:false,maxWidth:false,minHeight:150,minWidth:150,modal:false,position:{my:"center",at:"center",of:window,collision:"fit",using:function(g){var f=d(this).css(g).offset().top;if(f<0){d(this).css("top",g.top-f)}}},resizable:true,show:null,stack:true,title:"",width:300,zIndex:1000},_create:function(){this.originalTitle=this.element.attr("title");if(typeof this.originalTitle!=="string"){this.originalTitle=""}this.oldPosition={parent:this.element.parent(),index:this.element.parent().children().index(this.element)};this.options.title=this.options.title||this.originalTitle;var k=this,j=this.options,m=j.title||"&#160;",h,l,f,i,g;h=(this.uiDialog=d("<div>")).addClass(b+j.dialogClass).css({display:"none",outline:0,zIndex:j.zIndex}).attr("tabIndex",-1).keydown(function(n){if(j.closeOnEscape&&!n.isDefaultPrevented()&&n.keyCode&&n.keyCode===d.ui.keyCode.ESCAPE){k.close(n);n.preventDefault()}}).mousedown(function(n){k.moveToTop(false,n)}).appendTo("body");this.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(h);l=(this.uiDialogTitlebar=d("<div>")).addClass("ui-dialog-titlebar  ui-widget-header  ui-corner-all  ui-helper-clearfix").bind("mousedown",function(){h.focus()}).prependTo(h);f=d("<a href='#'></a>").addClass("ui-dialog-titlebar-close  ui-corner-all").attr("role","button").click(function(n){n.preventDefault();k.close(n)}).appendTo(l);(this.uiDialogTitlebarCloseText=d("<span>")).addClass("ui-icon ui-icon-closethick").text(j.closeText).appendTo(f);i=d("<span>").uniqueId().addClass("ui-dialog-title").html(m).prependTo(l);g=(this.uiDialogButtonPane=d("<div>")).addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix");(this.uiButtonSet=d("<div>")).addClass("ui-dialog-buttonset").appendTo(g);h.attr({role:"dialog","aria-labelledby":i.attr("id")});l.find("*").add(l).disableSelection();this._hoverable(f);this._focusable(f);if(j.draggable&&d.fn.draggable){this._makeDraggable()}if(j.resizable&&d.fn.resizable){this._makeResizable()}this._createButtons(j.buttons);this._isOpen=false;if(d.fn.bgiframe){h.bgiframe()}this._on(h,{keydown:function(p){if(!j.modal||p.keyCode!==d.ui.keyCode.TAB){return}var o=d(":tabbable",h),q=o.filter(":first"),n=o.filter(":last");if(p.target===n[0]&&!p.shiftKey){q.focus(1);return false}else{if(p.target===q[0]&&p.shiftKey){n.focus(1);return false}}}})},_init:function(){if(this.options.autoOpen){this.open()}},_destroy:function(){var g,f=this.oldPosition;if(this.overlay){this.overlay.destroy()}this.uiDialog.hide();this.element.removeClass("ui-dialog-content ui-widget-content").hide().appendTo("body");this.uiDialog.remove();if(this.originalTitle){this.element.attr("title",this.originalTitle)}g=f.parent.children().eq(f.index);if(g.length&&g[0]!==this.element[0]){g.before(this.element)}else{f.parent.append(this.element)}},widget:function(){return this.uiDialog},close:function(i){var h=this,g,f;if(!this._isOpen){return}if(false===this._trigger("beforeClose",i)){return}this._isOpen=false;if(this.overlay){this.overlay.destroy()}if(this.options.hide){this._hide(this.uiDialog,this.options.hide,function(){h._trigger("close",i)})}else{this.uiDialog.hide();this._trigger("close",i)}d.ui.dialog.overlay.resize();if(this.options.modal){g=0;d(".ui-dialog").each(function(){if(this!==h.uiDialog[0]){f=d(this).css("z-index");if(!isNaN(f)){g=Math.max(g,f)}}});d.ui.dialog.maxZ=g}return this},isOpen:function(){return this._isOpen},moveToTop:function(i,h){var g=this.options,f;if((g.modal&&!i)||(!g.stack&&!g.modal)){return this._trigger("focus",h)}if(g.zIndex>d.ui.dialog.maxZ){d.ui.dialog.maxZ=g.zIndex}if(this.overlay){d.ui.dialog.maxZ+=1;d.ui.dialog.overlay.maxZ=d.ui.dialog.maxZ;this.overlay.$el.css("z-index",d.ui.dialog.overlay.maxZ)}f={scrollTop:this.element.scrollTop(),scrollLeft:this.element.scrollLeft()};d.ui.dialog.maxZ+=1;this.uiDialog.css("z-index",d.ui.dialog.maxZ);this.element.attr(f);this._trigger("focus",h);return this},open:function(){if(this._isOpen){return}var h,g=this.options,f=this.uiDialog;this._size();this._position(g.position);f.show(g.show);this.overlay=g.modal?new d.ui.dialog.overlay(this):null;this.moveToTop(true);h=this.element.find(":tabbable");if(!h.length){h=this.uiDialogButtonPane.find(":tabbable");if(!h.length){h=f}}h.eq(0).focus();this._isOpen=true;this._trigger("open");return this},_createButtons:function(h){var g=this,f=false;this.uiDialogButtonPane.remove();this.uiButtonSet.empty();if(typeof h==="object"&&h!==null){d.each(h,function(){return !(f=true)})}if(f){d.each(h,function(i,k){k=d.isFunction(k)?{click:k,text:i}:k;var j=d("<button type='button'></button>").attr(k,true).unbind("click").click(function(){k.click.apply(g.element[0],arguments)}).appendTo(g.uiButtonSet);if(d.fn.button){j.button()}});this.uiDialog.addClass("ui-dialog-buttons");this.uiDialogButtonPane.appendTo(this.uiDialog)}else{this.uiDialog.removeClass("ui-dialog-buttons")}},_makeDraggable:function(){var h=this,g=this.options;function f(i){return{position:i.position,offset:i.offset}}this.uiDialog.draggable({cancel:".ui-dialog-content, .ui-dialog-titlebar-close",handle:".ui-dialog-titlebar",containment:"document",start:function(i,j){d(this).addClass("ui-dialog-dragging");h._trigger("dragStart",i,f(j))},drag:function(i,j){h._trigger("drag",i,f(j))},stop:function(i,j){g.position=[j.position.left-h.document.scrollLeft(),j.position.top-h.document.scrollTop()];d(this).removeClass("ui-dialog-dragging");h._trigger("dragStop",i,f(j));d.ui.dialog.overlay.resize()}})},_makeResizable:function(j){j=(j===e?this.options.resizable:j);var k=this,i=this.options,f=this.uiDialog.css("position"),h=typeof j==="string"?j:"n,e,s,w,se,sw,ne,nw";function g(l){return{originalPosition:l.originalPosition,originalSize:l.originalSize,position:l.position,size:l.size}}this.uiDialog.resizable({cancel:".ui-dialog-content",containment:"document",alsoResize:this.element,maxWidth:i.maxWidth,maxHeight:i.maxHeight,minWidth:i.minWidth,minHeight:this._minHeight(),handles:h,start:function(l,m){d(this).addClass("ui-dialog-resizing");k._trigger("resizeStart",l,g(m))},resize:function(l,m){k._trigger("resize",l,g(m))},stop:function(l,m){d(this).removeClass("ui-dialog-resizing");i.height=d(this).height();i.width=d(this).width();k._trigger("resizeStop",l,g(m));d.ui.dialog.overlay.resize()}}).css("position",f).find(".ui-resizable-se").addClass("ui-icon ui-icon-grip-diagonal-se")},_minHeight:function(){var f=this.options;if(f.height==="auto"){return f.minHeight}else{return Math.min(f.minHeight,f.height)}},_position:function(g){var h=[],i=[0,0],f;if(g){if(typeof g==="string"||(typeof g==="object"&&"0" in g)){h=g.split?g.split(" "):[g[0],g[1]];if(h.length===1){h[1]=h[0]}d.each(["left","top"],function(k,j){if(+h[k]===h[k]){i[k]=h[k];h[k]=j}});g={my:h[0]+(i[0]<0?i[0]:"+"+i[0])+" "+h[1]+(i[1]<0?i[1]:"+"+i[1]),at:h.join(" ")}}g=d.extend({},d.ui.dialog.prototype.options.position,g)}else{g=d.ui.dialog.prototype.options.position}f=this.uiDialog.is(":visible");if(!f){this.uiDialog.show()}this.uiDialog.position(g);if(!f){this.uiDialog.hide()}},_setOptions:function(h){var i=this,f={},g=false;d.each(h,function(j,k){i._setOption(j,k);if(j in a){g=true}if(j in c){f[j]=k}});if(g){this._size()}if(this.uiDialog.is(":data(resizable)")){this.uiDialog.resizable("option",f)}},_setOption:function(h,i){var g,j,f=this.uiDialog;switch(h){case"buttons":this._createButtons(i);break;case"closeText":this.uiDialogTitlebarCloseText.text(""+i);break;case"dialogClass":f.removeClass(this.options.dialogClass).addClass(b+i);break;case"disabled":if(i){f.addClass("ui-dialog-disabled")}else{f.removeClass("ui-dialog-disabled")}break;case"draggable":g=f.is(":data(draggable)");if(g&&!i){f.draggable("destroy")}if(!g&&i){this._makeDraggable()}break;case"position":this._position(i);break;case"resizable":j=f.is(":data(resizable)");if(j&&!i){f.resizable("destroy")}if(j&&typeof i==="string"){f.resizable("option","handles",i)}if(!j&&i!==false){this._makeResizable(i)}break;case"title":d(".ui-dialog-title",this.uiDialogTitlebar).html(""+(i||"&#160;"));break}this._super(h,i)},_size:function(){var g,j,i,h=this.options,f=this.uiDialog.is(":visible");this.element.show().css({width:"auto",minHeight:0,height:0});if(h.minWidth>h.width){h.width=h.minWidth}g=this.uiDialog.css({height:"auto",width:h.width}).outerHeight();j=Math.max(0,h.minHeight-g);if(h.height==="auto"){if(d.support.minHeight){this.element.css({minHeight:j,height:"auto"})}else{this.uiDialog.show();i=this.element.css("height","auto").height();if(!f){this.uiDialog.hide()}this.element.height(Math.max(i,j))}}else{this.element.height(Math.max(h.height-g,0))}if(this.uiDialog.is(":data(resizable)")){this.uiDialog.resizable("option","minHeight",this._minHeight())}}});d.extend(d.ui.dialog,{uuid:0,maxZ:0,getTitleId:function(f){var g=f.attr("id");if(!g){this.uuid+=1;g=this.uuid}return"ui-dialog-title-"+g},overlay:function(f){this.$el=d.ui.dialog.overlay.create(f)}});d.extend(d.ui.dialog.overlay,{instances:[],oldInstances:[],maxZ:0,events:d.map("focus,mousedown,mouseup,keydown,keypress,click".split(","),function(f){return f+".dialog-overlay"}).join(" "),create:function(g){if(this.instances.length===0){setTimeout(function(){if(d.ui.dialog.overlay.instances.length){d(document).bind(d.ui.dialog.overlay.events,function(h){if(d(h.target).zIndex()<d.ui.dialog.overlay.maxZ){return false}})}},1);d(window).bind("resize.dialog-overlay",d.ui.dialog.overlay.resize)}var f=(this.oldInstances.pop()||d("<div>").addClass("ui-widget-overlay"));d(document).bind("keydown.dialog-overlay",function(h){var i=d.ui.dialog.overlay.instances;if(i.length!==0&&i[i.length-1]===f&&g.options.closeOnEscape&&!h.isDefaultPrevented()&&h.keyCode&&h.keyCode===d.ui.keyCode.ESCAPE){g.close(h);h.preventDefault()}});f.appendTo(document.body).css({width:this.width(),height:this.height()});if(d.fn.bgiframe){f.bgiframe()}this.instances.push(f);return f},destroy:function(f){var g=d.inArray(f,this.instances),h=0;if(g!==-1){this.oldInstances.push(this.instances.splice(g,1)[0])}if(this.instances.length===0){d([document,window]).unbind(".dialog-overlay")}f.height(0).width(0).remove();d.each(this.instances,function(){h=Math.max(h,this.css("z-index"))});this.maxZ=h},height:function(){var g,f;if(d.ui.ie){g=Math.max(document.documentElement.scrollHeight,document.body.scrollHeight);f=Math.max(document.documentElement.offsetHeight,document.body.offsetHeight);if(g<f){return d(window).height()+"px"}else{return g+"px"}}else{return d(document).height()+"px"}},width:function(){var f,g;if(d.ui.ie){f=Math.max(document.documentElement.scrollWidth,document.body.scrollWidth);g=Math.max(document.documentElement.offsetWidth,document.body.offsetWidth);if(f<g){return d(window).width()+"px"}else{return f+"px"}}else{return d(document).width()+"px"}},resize:function(){var f=d([]);d.each(d.ui.dialog.overlay.instances,function(){f=f.add(this)});f.css({width:0,height:0}).css({width:d.ui.dialog.overlay.width(),height:d.ui.dialog.overlay.height()})}});d.extend(d.ui.dialog.overlay.prototype,{destroy:function(){d.ui.dialog.overlay.destroy(this.$el)}})}(jQuery));