/*
jQWidgets v15.0.0 (2022-Nov)
Copyright (c) 2011-2022 jQWidgets.
License: https://jqwidgets.com/license/
*/
/* eslint-disable */

(function(a){a.extend(a.expr[":"],{data:a.expr.createPseudo?a.expr.createPseudo(function(b){return function(c){return !!a.data(c,b)}}):function(d,c,b){return !!a.data(d,b[3])}});a.jqx.jqxWidget("jqxSortable","",{});a.extend(a.jqx._jqxSortable.prototype,{defineInstance:function(){var b={appendTo:"parent",axis:false,connectWith:false,containment:false,cursor:"auto",cursorAt:false,dropOnEmpty:true,forcePlaceholderSize:false,forceHelperSize:false,maxItems:9999,grid:false,handle:false,helper:"original",items:"> *",opacity:false,placeholderShow:false,revert:false,scroll:true,scrollSensitivity:20,scrollSpeed:20,scope:"default",tolerance:"intersect",zIndex:999999,element:null,defaultElement:"<div>",mouseHandled:false,cancel:"input,textarea,button,select,option",distance:1,delay:0,widgetName:"widget",widgetEventPrefix:"",disabled:false,create:null,_touchEvents:{mousedown:a.jqx.mobile.getTouchEventName("touchstart"),click:a.jqx.mobile.getTouchEventName("touchstart"),mouseup:a.jqx.mobile.getTouchEventName("touchend"),mousemove:a.jqx.mobile.getTouchEventName("touchmove"),mouseenter:"mouseenter",mouseleave:"mouseleave"},_events:["activate","beforeStop","change","deactivate","out","over","receive","removeItem","sort","start","stop","update","create"]};if(this===a.jqx._jqxSortable.prototype){return b}a.extend(true,this,b);return b},createInstance:function(){this._render()},_render:function(){var c=this;this._isTouchDevice=a.jqx.mobile.isTouchDevice();this.containerCache={};var b=a(b||c.defaultElement||this)[0];c.document=a(b.style?b.ownerDocument:b.document||b);c.window=a(c.document[0].defaultView||c.document[0].parentWindow);c.host.addClass(c.toThemeProperty("jqx-widget jqx-sortable"));c.refresh();c.floating=c.itemsArray.length?c.axis==="x"||c._isFloating(c.itemsArray[0].item):false;c.offset=c.host.offset();c._handleMouse();c._cancelSelect();c.ready=true},_isOverAxis:function(c,b,d){return(c>=b)&&(c<(b+d))},_isFloating:function(b){return(/left|right/).test(b.css("float"))||(/inline|table-cell/).test(b.css("display"))},_getEvent:function(b){if(this._isTouchDevice){return this._touchEvents[b]+".jqxSortable"+this.element.id}else{return b+".jqxSortable"+this.element.id}},_handleMouse:function(){var b=this;b.addHandler(this.host,this._getEvent("mousedown"),function(c){return b._mouseDown(c)});b.addHandler(b.host,this._getEvent("click"),function(c){if(true===a.data(c.target,b.widgetName+".preventClickEvent")){a.removeData(c.target,b.widgetName+".preventClickEvent");c.stopImmediatePropagation();return false}});b.started=false},widget:function(){return this.host},_mouseDestroy:function(){var b=this;b.host.off("."+this.widgetName);if(b._mouseMoveDelegate){b.removeHandler(a(document),this._getEvent("mousemove"));b.removeHandler(a(document),this._getEvent("mouseup"))}},_mouseDown:function(b){var g=this;if(g.mouseHandled){return}g._mouseMoved=false;if(g._isTouchDevice){var j=a.jqx.position(b);b.pageX=j.left;b.pageY=j.top}(g._mouseStarted&&g._mouseUp(b));g._mouseDownEvent=b;if(this._isTouchDevice){b.which=1}var d=(b.which===1),h=(typeof this.cancel==="string"&&b.target.nodeName?a(b.target).closest(this.cancel).length:false);if(this._isTouchDevice){d=true}if(!d||h||!this._mouseCapture(b)){return true}g.mouseDelayMet=!g.delay;if(!g.mouseDelayMet){g._mouseDelayTimer=setTimeout(function(){g.mouseDelayMet=true},g.delay)}if(g._mouseDistanceMet(b)&&g._mouseDelayMet(b)){g._mouseStarted=(g._mouseStart(b)!==false);if(!g._mouseStarted){b.preventDefault();return true}}if(true===a.data(b.target,this.widgetName+".preventClickEvent")){a.removeData(b.target,this.widgetName+".preventClickEvent")}g._mouseMoveDelegate=function(k){return g._mouseMove(k)};g._mouseUpDelegate=function(l){var k=g._mouseUp(l);if(g._isTouchDevice){return true}return k};g.addHandler(a(document),this._getEvent("mousemove"),g._mouseMoveDelegate);g.addHandler(a(document),this._getEvent("mouseup"),g._mouseUpDelegate);try{if(document.referrer!=""||window.frameElement){if(window.top!=null&&window.top!=window.self){var f=function(k){g._mouseUp(k)};var c=null;if(window.parent&&document.referrer){c=document.referrer}if(c&&c.indexOf(document.location.host)!=-1){if(window.top.document){if(window.top.document.addEventListener){window.top.document.addEventListener("mouseup",f,false)}else{if(window.top.document.attachEvent){window.top.document.attachEvent("onmouseup",f)}}}}}}}catch(i){}if(this._isTouchDevice){return true}b.preventDefault();var e=true;return true},_mouseMove:function(c){var b=this;if(this._isTouchDevice){c.which=1;var d=a.jqx.position(c);c.pageX=d.left;c.pageY=d.top}if(b._mouseMoved){if(a.jqx.browser.msie&&a.jqx.browser.version>11){if(!c.which){return b._mouseUp(c)}}else{if(a.jqx.browser.msie&&(!document.documentMode||document.documentMode<9)&&!c.button){return b._mouseUp(c)}else{if(!c.which){return b._mouseUp(c)}}}}if(c.which||c.button){b._mouseMoved=true}if(b._mouseStarted){b._mouseDrag(c);return c.preventDefault()}if(b._mouseDistanceMet(c)&&b._mouseDelayMet(c)){b._mouseStarted=(b._mouseStart(b._mouseDownEvent,c)!==false);(b._mouseStarted?b._mouseDrag(c):b._mouseUp(c))}return !b._mouseStarted},_mouseUp:function(e){var d=this;try{d.removeHandler(a(document),this._getEvent("mousemove"));d.removeHandler(a(document),this._getEvent("mouseup"));if(d._mouseStarted){d._mouseStarted=false;if(e.target===d._mouseDownEvent.target){a.data(e.target,d.widgetName+".preventClickEvent",true)}d._mouseStop(e)}var b=false}catch(c){}return false},_mouseDistanceMet:function(b){return(Math.max(Math.abs(this._mouseDownEvent.pageX-b.pageX),Math.abs(this._mouseDownEvent.pageY-b.pageY))>=this.distance)},_mouseDelayMet:function(){return this.mouseDelayMet},scrollParent:function(d){var c=this.css("position"),b=c==="absolute",e=d?/(auto|scroll|hidden)/:/(auto|scroll)/,f=this.parents().filter(function(){var g=a(this);if(b&&g.css("position")==="static"){return false}return e.test(g.css("overflow")+g.css("overflow-y")+g.css("overflow-x"))}).eq(0);return c==="fixed"||!f.length?a(this[0].ownerDocument||document):f},destroy:function(){this.host.removeClass("jqx-sortable jqx-sortable-disabled").find(".jqx-sortable-handle").removeClass("jqx-sortable-handle");this._mouseDestroy();for(var b=this.itemsArray.length-1;b>=0;b--){this.itemsArray[b].item.removeData(this.widgetName+"-item")}return this},_mouseCapture:function(d,e){var b=null,f=false,c=this;if(c.reverting){return false}if(c.disabled||c.type==="static"){return false}c._refreshItems(d);a(d.target).parents().each(function(){if(a.data(this,c.widgetName+"-item")===c){b=a(this);return false}});if(a.data(d.target,c.widgetName+"-item")===c){b=a(d.target)}if(!b){return false}if(c.handle&&!e){a(c.handle,b).find("*").addBack().each(function(){if(this===d.target){f=true}});if(!f){return false}}c.currentItem=b;c._removeCurrentsFromItems();return true},_mouseStart:function(f,g,c){var d,b,e=this;e.currentContainer=this;e._currentContainer=this;e.refreshPositions();e.helper=e._utility(f);e._cacheHelperProportions();e._storeMargins();e.scrollParent=e.helper.scrollParent();e.offset=e.currentItem.offset();e.offset={top:e.offset.top-e.margins.top,left:e.offset.left-e.margins.left};a.extend(e.offset,{click:{left:f.pageX-e.offset.left,top:f.pageY-e.offset.top},parent:e._getParentOffset(),relative:e._getRelativeOffset()});e.helper.css("position","absolute");e.cssPosition=e.helper.css("position");e.originalPosition=e._generatePosition(f);e.originalPageX=f.pageX;e.originalPageY=f.pageY;(e.cursorAt&&e._adjustOffsetFromHelper(e.cursorAt));e.domPosition={prev:e.currentItem.prev()[0],parent:e.currentItem.parent()[0]};if(e.helper[0]!==e.currentItem[0]){e.currentItem.hide()}e._createPlaceholder();if(e.containment){e._setContainment()}if(e.cursor&&e.cursor!=="auto"){b=e.document.find("body");e.storedCursor=b.css("cursor");b.css("cursor",e.cursor);e.storedStylesheet=a("<style>*{ cursor: "+e.cursor+" !important; }</style>").appendTo(b)}if(e.opacity){if(e.helper.css("opacity")){e._storedOpacity=e.helper.css("opacity")}e.helper.css("opacity",e.opacity)}if(e.zIndex){if(e.helper.css("zIndex")){e._storedZIndex=e.helper.css("zIndex")}e.helper.css("zIndex",e.zIndex)}if(e.scrollParent[0]!==e.document[0]&&e.scrollParent[0].tagName!=="HTML"){e.overflowOffset=e.scrollParent.offset()}e._raiseEvent("9",e._uiHash());if(!e._preserveHelperProportions){e._cacheHelperProportions()}if(!c){for(d=e.owners.length-1;d>=0;d--){e.owners[d]._raiseEvent("0",e._uiHash(this))}}if(a.jqx.ddmanager){a.jqx.ddmanager.current=this}if(a.jqx.ddmanager&&!e.dropBehaviour){a.jqx.ddmanager.prepareOffsets(this,f)}e.dragging=true;e.helper.addClass("jqx-sortable-helper");e._mouseDrag(f);return true},_mouseDrag:function(g){var d,f,c,j,h=this,b=false;var e=this;e.position=e._generatePosition(g);e.positionAbs=e._convertPositionTo("absolute");if(!e.lastPositionAbs){e.lastPositionAbs=e.positionAbs}if(e.scroll){if(e.scrollParent[0]!==e.document[0]&&e.scrollParent[0].tagName!=="HTML"){if((e.overflowOffset.top+e.scrollParent[0].offsetHeight)-g.pageY<h.scrollSensitivity){e.scrollParent[0].scrollTop=b=e.scrollParent[0].scrollTop+h.scrollSpeed}else{if(g.pageY-e.overflowOffset.top<h.scrollSensitivity){e.scrollParent[0].scrollTop=b=e.scrollParent[0].scrollTop-h.scrollSpeed}}if((e.overflowOffset.left+e.scrollParent[0].offsetWidth)-g.pageX<h.scrollSensitivity){e.scrollParent[0].scrollLeft=b=e.scrollParent[0].scrollLeft+h.scrollSpeed}else{if(g.pageX-e.overflowOffset.left<h.scrollSensitivity){e.scrollParent[0].scrollLeft=b=e.scrollParent[0].scrollLeft-h.scrollSpeed}}}else{if(g.pageY-e.document.scrollTop()<h.scrollSensitivity){b=e.document.scrollTop(e.document.scrollTop()-h.scrollSpeed)}else{if(e.window.height()-(g.pageY-e.document.scrollTop())<h.scrollSensitivity){b=e.document.scrollTop(e.document.scrollTop()+h.scrollSpeed)}}if(g.pageX-e.document.scrollLeft()<h.scrollSensitivity){b=e.document.scrollLeft(e.document.scrollLeft()-h.scrollSpeed)}else{if(e.window.width()-(g.pageX-e.document.scrollLeft())<h.scrollSensitivity){b=e.document.scrollLeft(e.document.scrollLeft()+h.scrollSpeed)}}}if(b!==false&&a.jqx.ddmanager&&!h.dropBehaviour){a.jqx.ddmanager.prepareOffsets(this,g)}}e.positionAbs=e._convertPositionTo("absolute");if(!e.axis||e.axis!=="y"){e.helper[0].style.left=e.position.left+"px"}if(!e.axis||e.axis!=="x"){e.helper[0].style.top=e.position.top+"px"}for(d=e.itemsArray.length-1;d>=0;d--){f=e.itemsArray[d];c=f.item[0];j=e._intersectsWithPointer(f);if(!j){continue}if(f.instance!==e.currentContainer){continue}if(c!==e.currentItem[0]&&e.placeholder[j===1?"next":"prev"]()[0]!==c&&!a.contains(e.placeholder[0],c)&&(e.type==="semi-dynamic"?!a.contains(e.host[0],c):true)){e.direction=j===1?"down":"up";if(e.tolerance==="pointer"||e._intersectsWithSides(f)){e._rearrange(g,f)}else{break}e._raiseEvent("2",e._uiHash());break}}e._contactOwners(g);if(a.jqx.ddmanager){a.jqx.ddmanager.drag(this,g)}e._raiseEvent("8",e._uiHash());e.lastPositionAbs=e.positionAbs;return false},_mouseStop:function(d,f){var c=this;if(!d){return}if(a.jqx.ddmanager&&!this.dropBehaviour){a.jqx.ddmanager.drop(this,d)}if(c.revert){var c=this,g=c.placeholder.offset(),b=c.axis,e={};if(!b||b==="x"){e.left=g.left-c.offset.parent.left-c.margins.left+(c.offsetParent[0]===c.document[0].body?0:c.offsetParent[0].scrollLeft)}if(!b||b==="y"){e.top=g.top-c.offset.parent.top-c.margins.top+(c.offsetParent[0]===c.document[0].body?0:c.offsetParent[0].scrollTop)}c.reverting=true;a(this.helper).animate(e,parseInt(this.revert,10)||500,function(){c._clear(d)})}else{c._clear(d,f)}return false},cancelSort:function(){var c=this;if(c.dragging){c._mouseUp({target:null});if(c.helper==="original"){c.currentItem.css(c._storedCSS).removeClass("jqx-sortable-helper")}else{c.currentItem.show()}for(var b=c.owners.length-1;b>=0;b--){c.owners[b]._raiseEvent("3",c._uiHash(this));if(c.owners[b].containerCache.over){c.owners[b]._raiseEvent("4",c._uiHash(this));c.owners[b].containerCache.over=0}}}if(c.placeholder){if(c.placeholder[0].parentNode){c.placeholder[0].parentNode.removeChild(c.placeholder[0])}if(c.helper!=="original"&&c.helper&&c.helper[0].parentNode){c.helper.remove()}a.extend(this,{helper:null,dragging:false,reverting:false,_noFinalSort:null});if(c.domPosition.prev){a(c.domPosition.prev).after(c.currentItem)}else{a(c.domPosition.parent).prepend(c.currentItem)}}return this},serialize:function(d){var b=this._getItemsAsjQuery(d&&d.connected),c=[];d=d||{};a(b).each(function(){var e=(a(d.item||this).attr(d.attribute||"id")||"").match(d.expression||(/(.+)[\-=_](.+)/));if(e){c.push((d.key||e[1]+"[]")+"="+(d.key&&d.expression?e[1]:e[2]))}});if(!c.length&&d.key){c.push(d.key+"=")}return c.join("&")},toArray:function(d){var b=this._getItemsAsjQuery(d&&d.connected),c=[];d=d||{};b.each(function(){c.push(a(d.item||this).attr(d.attribute||"id")||"")});return c},_intersectsWith:function(o){var e=this.positionAbs.left,d=e+this.helperProportions.width,m=this.positionAbs.top,k=m+this.helperProportions.height,f=o.left,c=f+o.width,p=o.top,j=p+o.height,q=this.offset.click.top,i=this.offset.click.left,h=(this.axis==="x")||((m+q)>p&&(m+q)<j),n=(this.axis==="y")||((e+i)>f&&(e+i)<c),g=h&&n;if(this.tolerance==="pointer"||this.forcePointerForowners||(this.tolerance!=="pointer"&&this.helperProportions[this.floating?"width":"height"]>o[this.floating?"width":"height"])){return g}else{return(f<e+(this.helperProportions.width/2)&&d-(this.helperProportions.width/2)<c&&p<m+(this.helperProportions.height/2)&&k-(this.helperProportions.height/2)<j)}},_intersectsWithPointer:function(d){var e=(this.axis==="x")||this._isOverAxis(this.positionAbs.top+this.offset.click.top,d.top,d.height),c=(this.axis==="y")||this._isOverAxis(this.positionAbs.left+this.offset.click.left,d.left,d.width),g=e&&c,b=this._getDragVerticalDirection(),f=this._getDragHorizontalDirection();if(!g){return false}return this.floating?(((f&&f==="right")||b==="down")?2:1):(b&&(b==="down"?2:1))},_intersectsWithSides:function(e){var c=this._isOverAxis(this.positionAbs.top+this.offset.click.top,e.top+(e.height/2),e.height),d=this._isOverAxis(this.positionAbs.left+this.offset.click.left,e.left+(e.width/2),e.width),b=this._getDragVerticalDirection(),f=this._getDragHorizontalDirection();if(this.floating&&f){return((f==="right"&&d)||(f==="left"&&!d))}else{return b&&((b==="down"&&c)||(b==="up"&&!c))}},_getDragVerticalDirection:function(){var b=this.positionAbs.top-this.lastPositionAbs.top;return b!==0&&(b>0?"down":"up")},_getDragHorizontalDirection:function(){var b=this.positionAbs.left-this.lastPositionAbs.left;return b!==0&&(b>0?"right":"left")},refresh:function(b){this._refreshItems(b);this.refreshPositions();return this},_connectWith:function(){var b=this;return b.connectWith.constructor===String?[b.connectWith]:b.connectWith},_getItemsAsjQuery:function(b){var d,c,k,f,g=[],e=[],h=this._connectWith();if(h&&b){for(d=h.length-1;d>=0;d--){k=a(h[d],this.document[0]);for(c=k.length-1;c>=0;c--){f=a.data(k[c],this.widgetFullName).instance;if(f&&f!==this&&!f.disabled){e.push([a.isFunction(f.items)?f.items.call(f.host):a(f.items,f.host).not(".jqx-sortable-helper").not(".jqx-sortable-placeholder"),f])}}}}e.push([a.isFunction(this.items)?this.items.call(this.host,null,{options:this,item:this.currentItem}):a(this.items,this.host).not(".jqx-sortable-helper").not(".jqx-sortable-placeholder"),this]);function l(){g.push(this)}for(d=e.length-1;d>=0;d--){e[d][0].each(l)}return a(g)},_removeCurrentsFromItems:function(){var b=this.currentItem.find(":data("+this.widgetName+"-item)");this.itemsArray=a.grep(this.itemsArray,function(d){for(var c=0;c<b.length;c++){if(b[c]===d.item[0]){return false}}return true})},_refreshItems:function(b){this.itemsArray=[];this.owners=[this];var f,d,m,g,l,c,o,n,h=this.itemsArray,e=[[a.isFunction(this.items)?this.items.call(this.host[0],b,{item:this.currentItem}):a(this.items,this.host),this]],k=this._connectWith();if(k&&this.ready){for(f=k.length-1;f>=0;f--){m=a(k[f],this.document[0]);for(d=m.length-1;d>=0;d--){g=a.data(m[d],this.widgetName);if(g&&g!==this&&!g.instance.disabled){e.push([a.isFunction(g.instance.items)?g.items.call(g.instance.host[0],b,{item:this.currentItem}):a(g.instance.items,g.instance.host),g.instance]);this.owners.push(g.instance)}}}}for(f=e.length-1;f>=0;f--){l=e[f][1];c=e[f][0];for(d=0,n=c.length;d<n;d++){o=a(c[d]);o.data(this.widgetName+"-item",l);h.push({item:o,instance:l,width:0,height:0,left:0,top:0})}}},refreshPositions:function(b){if(this.offsetParent&&this.helper){this.offset.parent=this._getParentOffset()}var d,e,c,f;for(d=this.itemsArray.length-1;d>=0;d--){e=this.itemsArray[d];if(e.instance!==this.currentContainer&&this.currentContainer&&e.item[0]!==this.currentItem[0]){continue}c=this.toleranceElement?a(this.toleranceElement,e.item):e.item;if(!b){e.width=c.outerWidth();e.height=c.outerHeight()}f=c.offset();e.left=f.left;e.top=f.top}if(this.custom&&this.custom.refreshowners){this.custom.refreshowners.call(this)}else{for(d=this.owners.length-1;d>=0;d--){f=this.owners[d].host.offset();this.owners[d].containerCache.left=f.left;this.owners[d].containerCache.top=f.top;this.owners[d].containerCache.width=this.owners[d].host.outerWidth();this.owners[d].containerCache.height=this.owners[d].host.outerHeight()}}return this},_cancelSelect:function(){var b=this;b.host.addClass("jqx-disableselect")},_createPlaceholder:function(c){var c=c||this;var b,d=c;if(!d.placeholderShow||d.placeholderShow.constructor===String){b=d.placeholderShow;d.placeholderShow={element:function(){var f=c.currentItem[0].nodeName.toLowerCase(),e=a("<"+f+">",c.document[0]).addClass(b||c.currentItem[0].className+" jqx-sortable-placeholder").removeClass("jqx-sortable-helper");if(f==="tr"){c.currentItem.children().each(function(){a("<td>&#160;</td>",c.document[0]).attr("colspan",a(this).attr("colspan")||1).appendTo(e)})}else{if(f==="img"){e.attr("src",c.currentItem.attr("src"))}}if(!b){e.css("visibility","hidden")}return e},update:function(e,f){if(b&&!d.forcePlaceholderSize){return}if(!f.height()){f.height(c.currentItem.innerHeight()-parseInt(c.currentItem.css("paddingTop")||0,10)-parseInt(c.currentItem.css("paddingBottom")||0,10))}if(!f.width()){f.width(c.currentItem.innerWidth()-parseInt(c.currentItem.css("paddingLeft")||0,10)-parseInt(c.currentItem.css("paddingRight")||0,10))}}}}c.placeholder=a(d.placeholderShow.element.call(c.host,c.currentItem));c.currentItem.after(c.placeholder);c.placeholderShow.update(c,c.placeholder)},_contactOwners:function(b){var g,e,n,h,k,p,q,f,l,d,c=null,o=null;for(g=this.owners.length-1;g>=0;g--){if(a.contains(this.currentItem[0],this.owners[g].host[0])){continue}if(this._intersectsWith(this.owners[g].containerCache)){if(c&&a.contains(this.owners[g].host[0],c.host[0])){continue}c=this.owners[g];o=g}else{if(this.owners[g].containerCache.over){this.owners[g]._raiseEvent("4",this._uiHash(this));this.owners[g].containerCache.over=0}}}if(!c){return}if(this.owners.length===1){if(!this.owners[o].containerCache.over){this.owners[o]._raiseEvent("5",this._uiHash(this));this.owners[o].containerCache.over=1}}else{n=10000;h=null;l=c.floating||this._isFloating(this.currentItem);k=l?"left":"top";p=l?"width":"height";d=l?"clientX":"clientY";var m=this.itemsArray;for(e=m.length-1;e>=0;e--){if(!a.contains(this.owners[o].host[0],m[e].item[0])){continue}if(m[e].item[0]===this.currentItem[0]){continue}q=m[e].item.offset()[k];f=false;if(b[d]-q>m[e][p]/2){f=true}if(Math.abs(b[d]-q)<n){n=Math.abs(b[d]-q);h=m[e];this.direction=f?"up":"down"}}if(!h&&!this.dropOnEmpty){return}if(this.currentContainer===this.owners[o]){if(!this.currentContainer.containerCache.over){this.owners[o]._raiseEvent("5",this._uiHash());this.currentContainer.containerCache.over=1}return}if(this.owners[o].host.children().length+1>this.owners[o].maxItems){this.currentContainer=this._currentContainer;h=this._rearrange(b,null,this.currentContainer.host,true);this._currentContainer.containerCache.over=1;this.placeholderShow.update(this.currentContainer,this.placeholder);return}h?this._rearrange(b,h,null,true):this._rearrange(b,null,this.owners[o].host,true);this._raiseEvent("2",this._uiHash());this.owners[o]._raiseEvent("2",this._uiHash(this));this.currentContainer=this.owners[o];this.placeholderShow.update(this.currentContainer,this.placeholder);this.owners[o]._raiseEvent("5",this._uiHash(this));this.owners[o].containerCache.over=1}},_utility:function(c){var d=this,b=a.isFunction(d.helper)?a(d.helper.apply(this.host[0],[c,this.currentItem])):(d.helper==="clone"?this.currentItem.clone():this.currentItem);if(!b.parents("body").length){a(d.appendTo!=="parent"?d.appendTo:this.currentItem[0].parentNode)[0].appendChild(b[0])}if(b[0]===this.currentItem[0]){this._storedCSS={width:this.currentItem[0].style.width,height:this.currentItem[0].style.height,position:this.currentItem.css("position"),top:this.currentItem.css("top"),left:this.currentItem.css("left")}}if(!b[0].style.width||d.forceHelperSize){b.width(this.currentItem.width())}if(!b[0].style.height||d.forceHelperSize){b.height(this.currentItem.height())}b.scrollParent=function(g){var f=this.css("position"),e=f==="absolute",h=g?/(auto|scroll|hidden)/:/(auto|scroll)/,i=this.parents().filter(function(){var j=a(this);if(e&&j.css("position")==="static"){return false}return h.test(j.css("overflow")+j.css("overflow-y")+j.css("overflow-x"))}).eq(0);return f==="fixed"||!i.length?a(this[0].ownerDocument||document):i};return b},_adjustOffsetFromHelper:function(b){if(typeof b==="string"){b=b.split(" ")}if(a.isArray(b)){b={left:+b[0],top:+b[1]||0}}if("left" in b){this.offset.click.left=b.left+this.margins.left}if("right" in b){this.offset.click.left=this.helperProportions.width-b.right+this.margins.left}if("top" in b){this.offset.click.top=b.top+this.margins.top}if("bottom" in b){this.offset.click.top=this.helperProportions.height-b.bottom+this.margins.top}},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();var b=this.offsetParent.offset();if(this.cssPosition==="absolute"&&this.scrollParent[0]!==this.document[0]&&a.contains(this.scrollParent[0],this.offsetParent[0])){b.left+=this.scrollParent.scrollLeft();b.top+=this.scrollParent.scrollTop()}if(this.offsetParent[0]===this.document[0].body||(this.offsetParent[0].tagName&&this.offsetParent[0].tagName.toLowerCase()==="html"&&a.jqx.browser.msie)){b={top:0,left:0}}return{top:b.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:b.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if(this.cssPosition==="relative"){var b=this.currentItem.position();return{top:b.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:b.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}}else{return{top:0,left:0}}},_storeMargins:function(){this.margins={left:(parseInt(this.currentItem.css("marginLeft"),10)||0),top:(parseInt(this.currentItem.css("marginTop"),10)||0)}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var c,e,b,d=this;if(d.containment==="parent"){d.containment=this.helper[0].parentNode}if(d.containment==="document"||d.containment==="window"){this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,d.containment==="document"?this.document.width():this.window.width()-this.helperProportions.width-this.margins.left,(d.containment==="document"?this.document.width():this.window.height()||this.document[0].body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top]}},_convertPositionTo:function(e,g){if(!g){g=this.position}var c=e==="absolute"?1:-1,b=this.cssPosition==="absolute"&&!(this.scrollParent[0]!==this.document[0]&&a.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,f=(/(html|body)/i).test(b[0].tagName);return{top:(g.top+this.offset.relative.top*c+this.offset.parent.top*c-((this.cssPosition==="fixed"?-this.scrollParent.scrollTop():(f?0:b.scrollTop()))*c)),left:(g.left+this.offset.relative.left*c+this.offset.parent.left*c-((this.cssPosition==="fixed"?-this.scrollParent.scrollLeft():f?0:b.scrollLeft())*c))}},_generatePosition:function(e){var g,f,h=this,d=e.pageX,c=e.pageY,b=this.cssPosition==="absolute"&&!(this.scrollParent[0]!==this.document[0]&&a.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,i=(/(html|body)/i).test(b[0].tagName);if(this.cssPosition==="relative"&&!(this.scrollParent[0]!==this.document[0]&&this.scrollParent[0]!==this.offsetParent[0])){this.offset.relative=this._getRelativeOffset()}if(this.originalPosition){if(this.containment){if(e.pageX-this.offset.click.left<this.containment[0]){d=this.containment[0]+this.offset.click.left}if(e.pageY-this.offset.click.top<this.containment[1]){c=this.containment[1]+this.offset.click.top}if(e.pageX-this.offset.click.left>this.containment[2]){d=this.containment[2]+this.offset.click.left}if(e.pageY-this.offset.click.top>this.containment[3]){c=this.containment[3]+this.offset.click.top}}if(h.grid){g=this.originalPageY+Math.round((c-this.originalPageY)/h.grid[1])*h.grid[1];c=this.containment?((g-this.offset.click.top>=this.containment[1]&&g-this.offset.click.top<=this.containment[3])?g:((g-this.offset.click.top>=this.containment[1])?g-h.grid[1]:g+h.grid[1])):g;f=this.originalPageX+Math.round((d-this.originalPageX)/h.grid[0])*h.grid[0];d=this.containment?((f-this.offset.click.left>=this.containment[0]&&f-this.offset.click.left<=this.containment[2])?f:((f-this.offset.click.left>=this.containment[0])?f-h.grid[0]:f+h.grid[0])):f}}return{top:(c-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+((this.cssPosition==="fixed"?-this.scrollParent.scrollTop():(i?0:b.scrollTop())))),left:(d-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+((this.cssPosition==="fixed"?-this.scrollParent.scrollLeft():i?0:b.scrollLeft())))}},_rearrange:function(f,e,c,d){c?c[0].appendChild(this.placeholder[0]):e.item[0].parentNode.insertBefore(this.placeholder[0],(this.direction==="down"?e.item[0]:e.item[0].nextSibling));this.counter=this.counter?++this.counter:1;var b=this.counter;this._delay(function(){if(b===this.counter){this.refreshPositions(!d)}})},_delay:function(e,d){function c(){return(typeof e==="string"?b[e]:e).apply(b,arguments)}var b=this;return setTimeout(c,d||0)},_clear:function(c,e){this.reverting=false;var b,f=[];if(!this._noFinalSort&&this.currentItem.parent().length){this.placeholder.before(this.currentItem)}this._noFinalSort=null;if(this.helper[0]===this.currentItem[0]){for(b in this._storedCSS){if(this._storedCSS[b]==="auto"||this._storedCSS[b]==="static"){this._storedCSS[b]=""}}this.currentItem.css(this._storedCSS).removeClass("jqx-sortable-helper")}else{this.currentItem.show()}if(this.fromOutside&&!e){f.push(function(g){this._raiseEvent("6",this._uiHash(this.fromOutside))})}if((this.fromOutside||this.domPosition.prev!==this.currentItem.prev().not(".jqx-sortable-helper")[0]||this.domPosition.parent!==this.currentItem.parent()[0])&&!e){f.push(function(g){this._raiseEvent("11",this._uiHash())})}if(this!==this.currentContainer){if(!e){f.push(function(g){this._raiseEvent("7",this._uiHash())});f.push((function(g){return function(h){g._raiseEvent("6",this._uiHash(this))}}).call(this,this.currentContainer));f.push((function(g){return function(h){g._raiseEvent("11",this._uiHash(this))}}).call(this,this.currentContainer))}}function d(i,g,h){return function(k){var j=this._events.indexOf(i);h._raiseEvent(j,g._uiHash(g))}}for(b=this.owners.length-1;b>=0;b--){if(!e){f.push(d("deactivate",this,this.owners[b]))}if(this.owners[b].containerCache.over){f.push(d("out",this,this.owners[b]));this.owners[b].containerCache.over=0}}if(this.storedCursor){this.document.find("body").css("cursor",this.storedCursor);this.storedStylesheet.remove()}if(this._storedOpacity){this.helper.css("opacity",this._storedOpacity)}if(this._storedZIndex){this.helper.css("zIndex",this._storedZIndex==="auto"?"":this._storedZIndex)}this.dragging=false;if(!e){this._raiseEvent("1",this._uiHash())}this.placeholder[0].parentNode.removeChild(this.placeholder[0]);if(!this.cancelHelperRemoval){if(this.helper[0]!==this.currentItem[0]){this.helper.remove()}this.helper=null}if(!e){for(b=0;b<f.length;b++){f[b].call(this,c)}this._raiseEvent("10",this._uiHash())}this.fromOutside=false;return !this.cancelHelperRemoval},disable:function(){var b=this;b.disabled=true},enable:function(){var b=this;b.disabled=false},instance:function(){var b=this;return b},_uiHash:function(b){var c=b||this;return{helper:c.helper,placeholder:c.placeholder||a([]),position:c.position,originalPosition:c.originalPosition,offset:c.positionAbs,item:c.currentItem,sender:b?b.host:null}},_raiseEvent:function(b,e){var d=this;var c=a.Event(d._events[b]);c.args=e;return d.host.trigger(c)},propertyChangedHandler:function(b,c,f,e){var d=this;if(e!==f){switch(c){case"disabled":d.disabled=e;break}}}})})(jqxBaseFramework);

