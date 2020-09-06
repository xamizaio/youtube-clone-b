
if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1||b[0]>3)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){if(a(b.target).is(this))return b.handleObj.handler.apply(this,arguments)}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.7",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a("#"===f?[]:f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.7",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c).prop(c,!0)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c).prop(c,!1))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")?(c.prop("checked")&&(a=!1),b.find(".active").removeClass("active"),this.$element.addClass("active")):"checkbox"==c.prop("type")&&(c.prop("checked")!==this.$element.hasClass("active")&&(a=!1),this.$element.toggleClass("active")),c.prop("checked",this.$element.hasClass("active")),a&&c.trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active")),this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target).closest(".btn");b.call(d,"toggle"),a(c.target).is('input[type="radio"], input[type="checkbox"]')||(c.preventDefault(),d.is("input,button")?d.trigger("focus"):d.find("input:visible,button:visible").first().trigger("focus"))}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.7",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));if(!(a>this.$items.length-1||a<0))return this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){if(!this.sliding)return this.slide("next")},c.prototype.prev=function(){if(!this.sliding)return this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&/show|hide/.test(b)&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a('[data-toggle="collapse"][href="#'+b.id+'"],[data-toggle="collapse"][data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.7",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":e.data();c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function c(c){c&&3===c.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=b(d),f={relatedTarget:this};e.hasClass("open")&&(c&&"click"==c.type&&/input|textarea/i.test(c.target.tagName)&&a.contains(e[0],c.target)||(e.trigger(c=a.Event("hide.bs.dropdown",f)),c.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger(a.Event("hidden.bs.dropdown",f)))))}))}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.7",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=b(e),g=f.hasClass("open");if(c(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(a(this)).on("click",c);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger(a.Event("shown.bs.dropdown",h))}return!1}},g.prototype.keydown=function(c){if(/(38|40|27|32)/.test(c.which)&&!/input|textarea/i.test(c.target.tagName)){var d=a(this);if(c.preventDefault(),c.stopPropagation(),!d.is(".disabled, :disabled")){var e=b(d),g=e.hasClass("open");if(!g&&27!=c.which||g&&27==c.which)return 27==c.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.disabled):visible a",i=e.find(".dropdown-menu"+h);if(i.length){var j=i.index(c.target);38==c.which&&j>0&&j--,40==c.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",c).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.7",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){d.$element.one("mouseup.dismiss.bs.modal",function(b){a(b.target).is(d.$element)&&(d.ignoreBackdropClick=!0)})}),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in"),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$dialog.one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){document===a.target||this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a(document.createElement("div")).addClass("modal-backdrop "+e).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",a.proxy(function(a){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.adjustDialog()},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){var a=window.innerWidth;if(!a){var b=document.documentElement.getBoundingClientRect();a=b.right-Math.abs(b.left)}this.bodyIsOverflowing=document.body.clientWidth<a,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;!e&&/destroy|hide/.test(b)||(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.inState=null,this.init("tooltip",a,b)};c.VERSION="3.3.7",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){if(this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(a.isFunction(this.options.viewport)?this.options.viewport.call(this,this.$element):this.options.viewport.selector||this.options.viewport),this.inState={click:!1,hover:!1,focus:!1},this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusin"==b.type?"focus":"hover"]=!0),c.tip().hasClass("in")||"in"==c.hoverState?void(c.hoverState="in"):(clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.isInStateTrue=function(){for(var a in this.inState)if(this.inState[a])return!0;return!1},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);if(c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusout"==b.type?"focus":"hover"]=!1),!c.isInStateTrue())return clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide()},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element),this.$element.trigger("inserted.bs."+this.type);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.getPosition(this.$viewport);h="bottom"==h&&k.bottom+m>o.bottom?"top":"top"==h&&k.top-m<o.top?"bottom":"right"==h&&k.right+l>o.width?"left":"left"==h&&k.left-l<o.left?"right":h,f.removeClass(n).addClass(h)}var p=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(p,h);var q=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",q).emulateTransitionEnd(c.TRANSITION_DURATION):q()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top+=g,b.left+=h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element&&e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=a(this.$tip),g=a.Event("hide.bs."+this.type);if(this.$element.trigger(g),!g.isDefaultPrevented())return f.removeClass("in"),a.support.transition&&f.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=window.SVGElement&&c instanceof window.SVGElement,g=d?{top:0,left:0}:f?null:b.offset(),h={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},i=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,h,i,g)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.right&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){if(!this.$tip&&(this.$tip=a(this.options.template),1!=this.$tip.length))throw new Error(this.type+" `template` option must consist of exactly 1 top-level element!");return this.$tip},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),b?(c.inState.click=!c.inState.click,c.isInStateTrue()?c.enter(c):c.leave(c)):c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type),a.$tip&&a.$tip.detach(),a.$tip=null,a.$arrow=null,a.$viewport=null,a.$element=null})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;!e&&/destroy|hide/.test(b)||(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.7",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){this.$body=a(document.body),this.$scrollElement=a(a(c).is(document.body)?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",a.proxy(this.process,this)),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.7",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b=this,c="offset",d=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),a.isWindow(this.$scrollElement[0])||(c="position",d=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var b=a(this),e=b.data("target")||b.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[c]().top+d,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){b.offsets.push(this[0]),b.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(void 0===e[a+1]||b<e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){
this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.7",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu").length&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.7",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return e<c&&"top";if("bottom"==this.affixed)return null!=c?!(e+this.unpin<=f.top)&&"bottom":!(e+g<=a-d)&&"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&e<=c?"top":null!=d&&i+j>=a-d&&"bottom"},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=Math.max(a(document).height(),a(document.body).height());"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);/*!
 * jQuery Form Plugin
 * version: 3.51.0-2014.06.20
 * Requires jQuery v1.5 or later
 * Copyright (c) 2014 M. Alsup
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses.
 * https://github.com/malsup/form#copyright-and-license
 */
!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(e){"use strict";function t(t){var r=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(r))}function r(t){var r=t.target,a=e(r);if(!a.is("[type=submit],[type=image]")){var n=a.closest("[type=submit]");if(0===n.length)return;r=n[0]}var i=this;if(i.clk=r,"image"==r.type)if(void 0!==t.offsetX)i.clk_x=t.offsetX,i.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=a.offset();i.clk_x=t.pageX-o.left,i.clk_y=t.pageY-o.top}else i.clk_x=t.pageX-r.offsetLeft,i.clk_y=t.pageY-r.offsetTop;setTimeout(function(){i.clk=i.clk_x=i.clk_y=null},100)}function a(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var n={};n.fileapi=void 0!==e("<input type='file'/>").get(0).files,n.formdata=void 0!==window.FormData;var i=!!e.fn.prop;e.fn.attr2=function(){if(!i)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function r(r){var a,n,i=e.param(r,t.traditional).split("&"),o=i.length,s=[];for(a=0;o>a;a++)i[a]=i[a].replace(/\+/g," "),n=i[a].split("="),s.push([decodeURIComponent(n[0]),decodeURIComponent(n[1])]);return s}function o(a){for(var n=new FormData,i=0;i<a.length;i++)n.append(a[i].name,a[i].value);if(t.extraData){var o=r(t.extraData);for(i=0;i<o.length;i++)o[i]&&n.append(o[i][0],o[i][1])}t.data=null;var s=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:u||"POST"});t.uploadProgress&&(s.xhr=function(){var r=e.ajaxSettings.xhr();return r.upload&&r.upload.addEventListener("progress",function(e){var r=0,a=e.loaded||e.position,n=e.total;e.lengthComputable&&(r=Math.ceil(a/n*100)),t.uploadProgress(e,a,n,r)},!1),r}),s.data=null;var c=s.beforeSend;return s.beforeSend=function(e,r){r.data=t.formData?t.formData:n,c&&c.call(this,e,r)},e.ajax(s)}function s(r){function n(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(r){a("cannot get iframe.contentWindow document: "+r)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(r){a("cannot get iframe.contentDocument: "+r),t=e.document}return t}function o(){function t(){try{var e=n(g).readyState;a("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(r){a("Server abort: ",r," (",r.name,")"),s(k),j&&clearTimeout(j),j=void 0}}var r=f.attr2("target"),i=f.attr2("action"),o="multipart/form-data",c=f.attr("enctype")||f.attr("encoding")||o;w.setAttribute("target",p),(!u||/post/i.test(u))&&w.setAttribute("method","POST"),i!=m.url&&w.setAttribute("action",m.url),m.skipEncodingOverride||u&&!/post/i.test(u)||f.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),m.timeout&&(j=setTimeout(function(){T=!0,s(D)},m.timeout));var l=[];try{if(m.extraData)for(var d in m.extraData)m.extraData.hasOwnProperty(d)&&l.push(e.isPlainObject(m.extraData[d])&&m.extraData[d].hasOwnProperty("name")&&m.extraData[d].hasOwnProperty("value")?e('<input type="hidden" name="'+m.extraData[d].name+'">').val(m.extraData[d].value).appendTo(w)[0]:e('<input type="hidden" name="'+d+'">').val(m.extraData[d]).appendTo(w)[0]);m.iframeTarget||v.appendTo("body"),g.attachEvent?g.attachEvent("onload",s):g.addEventListener("load",s,!1),setTimeout(t,15);try{w.submit()}catch(h){var x=document.createElement("form").submit;x.apply(w)}}finally{w.setAttribute("action",i),w.setAttribute("enctype",c),r?w.setAttribute("target",r):f.removeAttr("target"),e(l).remove()}}function s(t){if(!x.aborted&&!F){if(M=n(g),M||(a("cannot access response document"),t=k),t===D&&x)return x.abort("timeout"),void S.reject(x,"timeout");if(t==k&&x)return x.abort("server abort"),void S.reject(x,"error","server abort");if(M&&M.location.href!=m.iframeSrc||T){g.detachEvent?g.detachEvent("onload",s):g.removeEventListener("load",s,!1);var r,i="success";try{if(T)throw"timeout";var o="xml"==m.dataType||M.XMLDocument||e.isXMLDoc(M);if(a("isXml="+o),!o&&window.opera&&(null===M.body||!M.body.innerHTML)&&--O)return a("requeing onLoad callback, DOM not available"),void setTimeout(s,250);var u=M.body?M.body:M.documentElement;x.responseText=u?u.innerHTML:null,x.responseXML=M.XMLDocument?M.XMLDocument:M,o&&(m.dataType="xml"),x.getResponseHeader=function(e){var t={"content-type":m.dataType};return t[e.toLowerCase()]},u&&(x.status=Number(u.getAttribute("status"))||x.status,x.statusText=u.getAttribute("statusText")||x.statusText);var c=(m.dataType||"").toLowerCase(),l=/(json|script|text)/.test(c);if(l||m.textarea){var f=M.getElementsByTagName("textarea")[0];if(f)x.responseText=f.value,x.status=Number(f.getAttribute("status"))||x.status,x.statusText=f.getAttribute("statusText")||x.statusText;else if(l){var p=M.getElementsByTagName("pre")[0],h=M.getElementsByTagName("body")[0];p?x.responseText=p.textContent?p.textContent:p.innerText:h&&(x.responseText=h.textContent?h.textContent:h.innerText)}}else"xml"==c&&!x.responseXML&&x.responseText&&(x.responseXML=X(x.responseText));try{E=_(x,c,m)}catch(y){i="parsererror",x.error=r=y||i}}catch(y){a("error caught: ",y),i="error",x.error=r=y||i}x.aborted&&(a("upload aborted"),i=null),x.status&&(i=x.status>=200&&x.status<300||304===x.status?"success":"error"),"success"===i?(m.success&&m.success.call(m.context,E,"success",x),S.resolve(x.responseText,"success",x),d&&e.event.trigger("ajaxSuccess",[x,m])):i&&(void 0===r&&(r=x.statusText),m.error&&m.error.call(m.context,x,i,r),S.reject(x,"error",r),d&&e.event.trigger("ajaxError",[x,m,r])),d&&e.event.trigger("ajaxComplete",[x,m]),d&&!--e.active&&e.event.trigger("ajaxStop"),m.complete&&m.complete.call(m.context,x,i),F=!0,m.timeout&&clearTimeout(j),setTimeout(function(){m.iframeTarget?v.attr("src",m.iframeSrc):v.remove(),x.responseXML=null},100)}}}var c,l,m,d,p,v,g,x,y,b,T,j,w=f[0],S=e.Deferred();if(S.abort=function(e){x.abort(e)},r)for(l=0;l<h.length;l++)c=e(h[l]),i?c.prop("disabled",!1):c.removeAttr("disabled");if(m=e.extend(!0,{},e.ajaxSettings,t),m.context=m.context||m,p="jqFormIO"+(new Date).getTime(),m.iframeTarget?(v=e(m.iframeTarget),b=v.attr2("name"),b?p=b:v.attr2("name",p)):(v=e('<iframe name="'+p+'" src="'+m.iframeSrc+'" />'),v.css({position:"absolute",top:"-1000px",left:"-1000px"})),g=v[0],x={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var r="timeout"===t?"timeout":"aborted";a("aborting upload... "+r),this.aborted=1;try{g.contentWindow.document.execCommand&&g.contentWindow.document.execCommand("Stop")}catch(n){}v.attr("src",m.iframeSrc),x.error=r,m.error&&m.error.call(m.context,x,r,t),d&&e.event.trigger("ajaxError",[x,m,r]),m.complete&&m.complete.call(m.context,x,r)}},d=m.global,d&&0===e.active++&&e.event.trigger("ajaxStart"),d&&e.event.trigger("ajaxSend",[x,m]),m.beforeSend&&m.beforeSend.call(m.context,x,m)===!1)return m.global&&e.active--,S.reject(),S;if(x.aborted)return S.reject(),S;y=w.clk,y&&(b=y.name,b&&!y.disabled&&(m.extraData=m.extraData||{},m.extraData[b]=y.value,"image"==y.type&&(m.extraData[b+".x"]=w.clk_x,m.extraData[b+".y"]=w.clk_y)));var D=1,k=2,A=e("meta[name=csrf-token]").attr("content"),L=e("meta[name=csrf-param]").attr("content");L&&A&&(m.extraData=m.extraData||{},m.extraData[L]=A),m.forceSync?o():setTimeout(o,10);var E,M,F,O=50,X=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},C=e.parseJSON||function(e){return window.eval("("+e+")")},_=function(t,r,a){var n=t.getResponseHeader("content-type")||"",i="xml"===r||!r&&n.indexOf("xml")>=0,o=i?t.responseXML:t.responseText;return i&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),a&&a.dataFilter&&(o=a.dataFilter(o,r)),"string"==typeof o&&("json"===r||!r&&n.indexOf("json")>=0?o=C(o):("script"===r||!r&&n.indexOf("javascript")>=0)&&e.globalEval(o)),o};return S}if(!this.length)return a("ajaxSubmit: skipping submit process - no element selected"),this;var u,c,l,f=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),u=t.type||this.attr2("method"),c=t.url||this.attr2("action"),l="string"==typeof c?e.trim(c):"",l=l||window.location.href||"",l&&(l=(l.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:l,success:e.ajaxSettings.success,type:u||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var m={};if(this.trigger("form-pre-serialize",[this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var d=t.traditional;void 0===d&&(d=e.ajaxSettings.traditional);var p,h=[],v=this.formToArray(t.semantic,h);if(t.data&&(t.extraData=t.data,p=e.param(t.data,d)),t.beforeSubmit&&t.beforeSubmit(v,this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[v,this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var g=e.param(v,d);p&&(g=g?g+"&"+p:p),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+g,t.data=null):t.data=g;var x=[];if(t.resetForm&&x.push(function(){f.resetForm()}),t.clearForm&&x.push(function(){f.clearForm(t.includeHidden)}),!t.dataType&&t.target){var y=t.success||function(){};x.push(function(r){var a=t.replaceTarget?"replaceWith":"html";e(t.target)[a](r).each(y,arguments)})}else t.success&&x.push(t.success);if(t.success=function(e,r,a){for(var n=t.context||this,i=0,o=x.length;o>i;i++)x[i].apply(n,[e,r,a||f,f])},t.error){var b=t.error;t.error=function(e,r,a){var n=t.context||this;b.apply(n,[e,r,a,f])}}if(t.complete){var T=t.complete;t.complete=function(e,r){var a=t.context||this;T.apply(a,[e,r,f])}}var j=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),w=j.length>0,S="multipart/form-data",D=f.attr("enctype")==S||f.attr("encoding")==S,k=n.fileapi&&n.formdata;a("fileAPI :"+k);var A,L=(w||D)&&!k;t.iframe!==!1&&(t.iframe||L)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){A=s(v)}):A=s(v):A=(w||D)&&k?o(v):e.ajax(t),f.removeData("jqxhr").data("jqxhr",A);for(var E=0;E<h.length;E++)h[E]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(n){if(n=n||{},n.delegation=n.delegation&&e.isFunction(e.fn.on),!n.delegation&&0===this.length){var i={s:this.selector,c:this.context};return!e.isReady&&i.s?(a("DOM not ready, queuing ajaxForm"),e(function(){e(i.s,i.c).ajaxForm(n)}),this):(a("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return n.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,r).on("submit.form-plugin",this.selector,n,t).on("click.form-plugin",this.selector,n,r),this):this.ajaxFormUnbind().bind("submit.form-plugin",n,t).bind("click.form-plugin",n,r)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,r){var a=[];if(0===this.length)return a;var i,o=this[0],s=this.attr("id"),u=t?o.getElementsByTagName("*"):o.elements;if(u&&!/MSIE [678]/.test(navigator.userAgent)&&(u=e(u).get()),s&&(i=e(':input[form="'+s+'"]').get(),i.length&&(u=(u||[]).concat(i))),!u||!u.length)return a;var c,l,f,m,d,p,h;for(c=0,p=u.length;p>c;c++)if(d=u[c],f=d.name,f&&!d.disabled)if(t&&o.clk&&"image"==d.type)o.clk==d&&(a.push({name:f,value:e(d).val(),type:d.type}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}));else if(m=e.fieldValue(d,!0),m&&m.constructor==Array)for(r&&r.push(d),l=0,h=m.length;h>l;l++)a.push({name:f,value:m[l]});else if(n.fileapi&&"file"==d.type){r&&r.push(d);var v=d.files;if(v.length)for(l=0;l<v.length;l++)a.push({name:f,value:v[l],type:d.type});else a.push({name:f,value:"",type:d.type})}else null!==m&&"undefined"!=typeof m&&(r&&r.push(d),a.push({name:f,value:m,type:d.type,required:d.required}));if(!t&&o.clk){var g=e(o.clk),x=g[0];f=x.name,f&&!x.disabled&&"image"==x.type&&(a.push({name:f,value:g.val()}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}))}return a},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var r=[];return this.each(function(){var a=this.name;if(a){var n=e.fieldValue(this,t);if(n&&n.constructor==Array)for(var i=0,o=n.length;o>i;i++)r.push({name:a,value:n[i]});else null!==n&&"undefined"!=typeof n&&r.push({name:this.name,value:n})}}),e.param(r)},e.fn.fieldValue=function(t){for(var r=[],a=0,n=this.length;n>a;a++){var i=this[a],o=e.fieldValue(i,t);null===o||"undefined"==typeof o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(r,o):r.push(o))}return r},e.fieldValue=function(t,r){var a=t.name,n=t.type,i=t.tagName.toLowerCase();if(void 0===r&&(r=!0),r&&(!a||t.disabled||"reset"==n||"button"==n||("checkbox"==n||"radio"==n)&&!t.checked||("submit"==n||"image"==n)&&t.form&&t.form.clk!=t||"select"==i&&-1==t.selectedIndex))return null;if("select"==i){var o=t.selectedIndex;if(0>o)return null;for(var s=[],u=t.options,c="select-one"==n,l=c?o+1:u.length,f=c?o:0;l>f;f++){var m=u[f];if(m.selected){var d=m.value;if(d||(d=m.attributes&&m.attributes.value&&!m.attributes.value.specified?m.text:m.value),c)return d;s.push(d)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var r=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var a=this.type,n=this.tagName.toLowerCase();r.test(a)||"textarea"==n?this.value="":"checkbox"==a||"radio"==a?this.checked=!1:"select"==n?this.selectedIndex=-1:"file"==a?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(a)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var r=this.type;if("checkbox"==r||"radio"==r)this.checked=t;else if("option"==this.tagName.toLowerCase()){var a=e(this).parent("select");t&&a[0]&&"select-one"==a[0].type&&a.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1});(function(c,n){var l="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";c.fn.imagesLoaded=function(f){function m(){var b=c(i),a=c(h);d&&(h.length?d.reject(e,b,a):d.resolve(e));c.isFunction(f)&&f.call(g,e,b,a)}function j(b,a){b.src===l||-1!==c.inArray(b,k)||(k.push(b),a?h.push(b):i.push(b),c.data(b,"imagesLoaded",{isBroken:a,src:b.src}),o&&d.notifyWith(c(b),[a,e,c(i),c(h)]),e.length===k.length&&(setTimeout(m),e.unbind(".imagesLoaded")))}var g=this,d=c.isFunction(c.Deferred)?c.Deferred():
0,o=c.isFunction(d.notify),e=g.find("img").add(g.filter("img")),k=[],i=[],h=[];c.isPlainObject(f)&&c.each(f,function(b,a){if("callback"===b)f=a;else if(d)d[b](a)});e.length?e.bind("load.imagesLoaded error.imagesLoaded",function(b){j(b.target,"error"===b.type)}).each(function(b,a){var d=a.src,e=c.data(a,"imagesLoaded");if(e&&e.src===d)j(a,e.isBroken);else if(a.complete&&a.naturalWidth!==n)j(a,0===a.naturalWidth||0===a.naturalHeight);else if(a.readyState||a.complete)a.src=l,a.src=d}):m();return d?d.promise(g):
g}})(jQuery);
/*!
   --------------------------------
   Infinite Scroll
   --------------------------------
   + https://github.com/paulirish/infinite-scroll
   + version 2.1.0
   + Copyright 2011/12 Paul Irish & Luke Shumard
   + Licensed under the MIT license

   + Documentation: http://infinite-scroll.com/
*/

!function(t,e){"function"==typeof define&&define.amd?define("jquery-bridget/jquery-bridget",["jquery"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("jquery")):t.jQueryBridget=e(t,t.jQuery)}(window,function(t,e){"use strict";function i(i,r,l){function a(t,e,n){var o,r="$()."+i+'("'+e+'")';return t.each(function(t,a){var h=l.data(a,i);if(!h)return void s(i+" not initialized. Cannot call methods, i.e. "+r);var c=h[e];if(!c||"_"==e.charAt(0))return void s(r+" is not a valid method");var u=c.apply(h,n);o=void 0===o?u:o}),void 0!==o?o:t}function h(t,e){t.each(function(t,n){var o=l.data(n,i);o?(o.option(e),o._init()):(o=new r(n,e),l.data(n,i,o))})}l=l||e||t.jQuery,l&&(r.prototype.option||(r.prototype.option=function(t){l.isPlainObject(t)&&(this.options=l.extend(!0,this.options,t))}),l.fn[i]=function(t){if("string"==typeof t){var e=o.call(arguments,1);return a(this,t,e)}return h(this,t),this},n(l))}function n(t){!t||t&&t.bridget||(t.bridget=i)}var o=Array.prototype.slice,r=t.console,s="undefined"==typeof r?function(){}:function(t){r.error(t)};return n(e||t.jQuery),i}),function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},n=i[t]=i[t]||[];return n.indexOf(e)==-1&&n.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},n=i[t]=i[t]||{};return n[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var n=i.indexOf(e);return n!=-1&&i.splice(n,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){i=i.slice(0),e=e||[];for(var n=this._onceEvents&&this._onceEvents[t],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(t,r),delete n[r]),r.apply(this,e)}return this}},e.allOff=function(){delete this._events,delete this._onceEvents},t}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("desandro-matches-selector/matches-selector",e):"object"==typeof module&&module.exports?module.exports=e():t.matchesSelector=e()}(window,function(){"use strict";var t=function(){var t=window.Element.prototype;if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0;i<e.length;i++){var n=e[i],o=n+"MatchesSelector";if(t[o])return o}}();return function(e,i){return e[t](i)}}),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["desandro-matches-selector/matches-selector"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.matchesSelector)}(window,function(t,e){var i={};i.extend=function(t,e){for(var i in e)t[i]=e[i];return t},i.modulo=function(t,e){return(t%e+e)%e},i.makeArray=function(t){var e=[];if(Array.isArray(t))e=t;else if(t&&"object"==typeof t&&"number"==typeof t.length)for(var i=0;i<t.length;i++)e.push(t[i]);else e.push(t);return e},i.removeFrom=function(t,e){var i=t.indexOf(e);i!=-1&&t.splice(i,1)},i.getParent=function(t,i){for(;t.parentNode&&t!=document.body;)if(t=t.parentNode,e(t,i))return t},i.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},i.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},i.filterFindElements=function(t,n){t=i.makeArray(t);var o=[];return t.forEach(function(t){if(t instanceof HTMLElement){if(!n)return void o.push(t);e(t,n)&&o.push(t);for(var i=t.querySelectorAll(n),r=0;r<i.length;r++)o.push(i[r])}}),o},i.debounceMethod=function(t,e,i){var n=t.prototype[e],o=e+"Timeout";t.prototype[e]=function(){var t=this[o];t&&clearTimeout(t);var e=arguments,r=this;this[o]=setTimeout(function(){n.apply(r,e),delete r[o]},i||100)}},i.docReady=function(t){var e=document.readyState;"complete"==e||"interactive"==e?setTimeout(t):document.addEventListener("DOMContentLoaded",t)},i.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var n=t.console;return i.htmlInit=function(e,o){i.docReady(function(){var r=i.toDashed(o),s="data-"+r,l=document.querySelectorAll("["+s+"]"),a=document.querySelectorAll(".js-"+r),h=i.makeArray(l).concat(i.makeArray(a)),c=s+"-options",u=t.jQuery;h.forEach(function(t){var i,r=t.getAttribute(s)||t.getAttribute(c);try{i=r&&JSON.parse(r)}catch(l){return void(n&&n.error("Error parsing "+s+" on "+t.className+": "+l))}var a=new e(t,i);u&&u.data(t,o,a)})})},i}),function(t,e){"function"==typeof define&&define.amd?define("infinite-scroll/js/core",["ev-emitter/ev-emitter","fizzy-ui-utils/utils"],function(i,n){return e(t,i,n)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter"),require("fizzy-ui-utils")):t.InfiniteScroll=e(t,t.EvEmitter,t.fizzyUIUtils)}(window,function(t,e,i){function n(t,e){var s=i.getQueryElement(t);if(!s)return void console.error("Bad element for InfiniteScroll: "+(s||t));if(t=s,t.infiniteScrollGUID){var l=r[t.infiniteScrollGUID];return l.option(e),l}this.element=t,this.options=i.extend({},n.defaults),this.option(e),o&&(this.$element=o(this.element)),this.create()}var o=t.jQuery,r={};n.defaults={},n.create={},n.destroy={};var s=n.prototype;i.extend(s,e.prototype);var l=0;s.create=function(){var t=this.guid=++l;if(this.element.infiniteScrollGUID=t,r[t]=this,this.pageIndex=1,this.loadCount=0,this.updateGetPath(),!this.getPath)return void console.error("Disabling InfiniteScroll");this.updateGetAbsolutePath(),this.log("initialized",[this.element.className]),this.callOnInit();for(var e in n.create)n.create[e].call(this)},s.option=function(t){i.extend(this.options,t)},s.callOnInit=function(){var t=this.options.onInit;t&&t.call(this,this)},s.dispatchEvent=function(t,e,i){this.log(t,i);var n=e?[e].concat(i):i;if(this.emitEvent(t,n),o&&this.$element){t+=".infiniteScroll";var r=t;if(e){var s=o.Event(e);s.type=t,r=s}this.$element.trigger(r,i)}};var a={initialized:function(t){return"on "+t},request:function(t){return"URL: "+t},load:function(t,e){return(t.title||"")+". URL: "+e},error:function(t,e){return t+". URL: "+e},append:function(t,e,i){return i.length+" items. URL: "+e},last:function(t,e){return"URL: "+e},history:function(t,e){return"URL: "+e},pageIndex:function(t,e){return"current page determined to be: "+t+" from "+e}};s.log=function(t,e){if(this.options.debug){var i="[InfiniteScroll] "+t,n=a[t];n&&(i+=". "+n.apply(this,e)),console.log(i)}},s.updateMeasurements=function(){this.windowHeight=t.innerHeight;var e=this.element.getBoundingClientRect();this.top=e.top+t.pageYOffset},s.updateScroller=function(){var e=this.options.elementScroll;if(!e)return void(this.scroller=t);if(this.scroller=e===!0?this.element:i.getQueryElement(e),!this.scroller)throw"Unable to find elementScroll: "+e},s.updateGetPath=function(){var t=this.options.path;if(!t)return void console.error("InfiniteScroll path option required. Set as: "+t);var e=typeof t;if("function"==e)return void(this.getPath=t);var i="string"==e&&t.match("{{#}}");return i?void this.updateGetPathTemplate(t):void this.updateGetPathSelector(t)},s.updateGetPathTemplate=function(t){this.getPath=function(){var e=this.pageIndex+1;return t.replace("{{#}}",e)}.bind(this);var e=t.replace("{{#}}","(\\d\\d?\\d?)"),i=new RegExp(e),n=location.href.match(i);n&&(this.pageIndex=parseInt(n[1],10),this.log("pageIndex",this.pageIndex,"template string"))};var h=[/^(.*?\/?page\/?)(\d\d?\d?)(.*?$)/,/^(.*?\/?\?page=)(\d\d?\d?)(.*?$)/,/(.*?)(\d\d?\d?)(?!.*\d)(.*?$)/];return s.updateGetPathSelector=function(t){var e=document.querySelector(t);if(!e)return void console.error("Bad InfiniteScroll path option. Next link not found: "+t);for(var i,n,o=e.getAttribute("href"),r=0;o&&r<h.length;r++){n=h[r];var s=o.match(n);if(s){i=s.slice(1);break}}return i?(this.isPathSelector=!0,this.getPath=function(){var t=this.pageIndex+1;return i[0]+t+i[2]}.bind(this),this.pageIndex=parseInt(i[1],10)-1,void this.log("pageIndex",[this.pageIndex,"next link"])):void console.error("InfiniteScroll unable to parse next link href: "+o)},s.updateGetAbsolutePath=function(){var t=this.getPath(),e=t.match(/^http/)||t.match(/^\//);if(e)return void(this.getAbsolutePath=this.getPath);var i=location.pathname,n=i.substring(0,i.lastIndexOf("/"));this.getAbsolutePath=function(){return n+"/"+this.getPath()}},n.create.hideNav=function(){var t=i.getQueryElement(this.options.hideNav);t&&(t.style.display="none",this.nav=t)},n.destroy.hideNav=function(){this.nav&&(this.nav.style.display="")},s.destroy=function(){this.allOff();for(var t in n.destroy)n.destroy[t].call(this);delete this.element.infiniteScrollGUID,delete r[this.guid]},n.throttle=function(t,e){e=e||200;var i,n;return function(){var o=+new Date,r=arguments,s=function(){i=o,t.apply(this,r)}.bind(this);i&&o<i+e?(clearTimeout(n),n=setTimeout(s,e)):s()}},n.data=function(t){t=i.getQueryElement(t);var e=t&&t.infiniteScrollGUID;return e&&r[e]},n.setJQuery=function(t){o=t},i.htmlInit(n,"infinite-scroll"),o&&o.bridget&&o.bridget("infiniteScroll",n),n}),function(t,e){"function"==typeof define&&define.amd?define("infinite-scroll/js/page-load",["./core"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("./core")):e(t,t.InfiniteScroll)}(window,function(t,e){function i(t){for(var e=document.createDocumentFragment(),i=0;t&&i<t.length;i++)e.appendChild(t[i]);return e}function n(t){for(var e=t.querySelectorAll("script"),i=0;i<e.length;i++){var n=e[i],r=document.createElement("script");o(n,r),n.parentNode.replaceChild(r,n)}}function o(t,e){for(var i=t.attributes,n=0;n<i.length;n++){var o=i[n];e.setAttribute(o.name,o.value)}}function r(t,e,i,n){var o=new XMLHttpRequest;o.open("GET",t,!0),o.responseType=e||"",o.setRequestHeader("X-Requested-With","XMLHttpRequest"),o.onload=function(){if(200==o.status)i(o.response);else{var t=new Error(o.statusText);n(t)}},o.onerror=function(){var e=new Error("Network error requesting "+t);n(e)},o.send()}var s=e.prototype;return e.defaults.loadOnScroll=!0,e.defaults.checkLastPage=!0,e.defaults.responseType="document",e.create.pageLoad=function(){this.canLoad=!0,this.on("scrollThreshold",this.onScrollThresholdLoad),this.on("load",this.checkLastPage),this.options.outlayer&&this.on("append",this.onAppendOutlayer)},s.onScrollThresholdLoad=function(){this.options.loadOnScroll&&this.loadNextPage()},s.loadNextPage=function(){if(!this.isLoading&&this.canLoad){var t=this.getAbsolutePath();this.isLoading=!0;var e=function(e){this.onPageLoad(e,t)}.bind(this),i=function(e){this.onPageError(e,t)}.bind(this);r(t,this.options.responseType,e,i),this.dispatchEvent("request",null,[t])}},s.onPageLoad=function(t,e){return this.options.append||(this.isLoading=!1),this.pageIndex++,this.loadCount++,this.dispatchEvent("load",null,[t,e]),this.appendNextPage(t,e),t},s.appendNextPage=function(t,e){var n=this.options.append,o="document"==this.options.responseType;if(o&&n){var r=t.querySelectorAll(n),s=i(r),l=function(){this.appendItems(r,s),this.isLoading=!1,this.dispatchEvent("append",null,[t,e,r])}.bind(this);this.options.outlayer?this.appendOutlayerItems(s,l):l()}},s.appendItems=function(t,e){t&&t.length&&(e=e||i(t),n(e),this.element.appendChild(e))},s.appendOutlayerItems=function(i,n){var o=e.imagesLoaded||t.imagesLoaded;return o?void o(i,n):(console.error("[InfiniteScroll] imagesLoaded required for outlayer option"),void(this.isLoading=!1))},s.onAppendOutlayer=function(t,e,i){this.options.outlayer.appended(i)},s.checkLastPage=function(t,e){var i=this.options.checkLastPage;if(i){var n=this.options.path;if("function"==typeof n){var o=this.getPath();if(!o)return void this.lastPageReached(t,e)}var r;if("string"==typeof i?r=i:this.isPathSelector&&(r=n),r&&t.querySelector){var s=t.querySelector(r);s||this.lastPageReached(t,e)}}},s.lastPageReached=function(t,e){this.canLoad=!1,this.dispatchEvent("last",null,[t,e])},s.onPageError=function(t,e){return this.isLoading=!1,this.canLoad=!1,this.dispatchEvent("error",null,[t,e]),t},e.create.prefill=function(){if(this.options.prefill){var t=this.options.append;if(!t)return void console.error("append option required for prefill. Set as :"+t);this.updateMeasurements(),this.updateScroller(),this.isPrefilling=!0,this.on("append",this.prefill),this.once("error",this.stopPrefill),this.once("last",this.stopPrefill),this.prefill()}},s.prefill=function(){var t=this.getPrefillDistance();this.isPrefilling=t>=0,this.isPrefilling?(this.log("prefill"),this.loadNextPage()):this.stopPrefill()},s.getPrefillDistance=function(){return this.options.elementScroll?this.scroller.clientHeight-this.scroller.scrollHeight:this.windowHeight-this.element.clientHeight},s.stopPrefill=function(){console.log("stopping prefill"),this.off("append",this.prefill)},e}),function(t,e){"function"==typeof define&&define.amd?define("infinite-scroll/js/scroll-watch",["./core","fizzy-ui-utils/utils"],function(i,n){return e(t,i,n)}):"object"==typeof module&&module.exports?module.exports=e(t,require("./core"),require("fizzy-ui-utils")):e(t,t.InfiniteScroll,t.fizzyUIUtils)}(window,function(t,e,i){var n=e.prototype;return e.defaults.scrollThreshold=400,e.create.scrollWatch=function(){this.pageScrollHandler=this.onPageScroll.bind(this),this.resizeHandler=this.onResize.bind(this);var t=this.options.scrollThreshold,e=t||0===t;e&&this.enableScrollWatch()},e.destroy.scrollWatch=function(){this.disableScrollWatch()},n.enableScrollWatch=function(){this.isScrollWatching||(this.isScrollWatching=!0,this.updateMeasurements(),this.updateScroller(),this.on("last",this.disableScrollWatch),this.bindScrollWatchEvents(!0))},n.disableScrollWatch=function(){this.isScrollWatching&&(this.bindScrollWatchEvents(!1),delete this.isScrollWatching)},n.bindScrollWatchEvents=function(e){var i=e?"addEventListener":"removeEventListener";this.scroller[i]("scroll",this.pageScrollHandler),t[i]("resize",this.resizeHandler)},n.onPageScroll=e.throttle(function(){var t=this.getBottomDistance();t<=this.options.scrollThreshold&&this.dispatchEvent("scrollThreshold")}),n.getBottomDistance=function(){return this.options.elementScroll?this.getElementBottomDistance():this.getWindowBottomDistance()},n.getWindowBottomDistance=function(){var e=this.top+this.element.clientHeight,i=t.pageYOffset+this.windowHeight;return e-i},n.getElementBottomDistance=function(){var t=this.scroller.scrollHeight,e=this.scroller.scrollTop+this.scroller.clientHeight;return t-e},n.onResize=function(){this.updateMeasurements()},i.debounceMethod(e,"onResize",150),e}),function(t,e){"function"==typeof define&&define.amd?define("infinite-scroll/js/history",["./core","fizzy-ui-utils/utils"],function(i,n){return e(t,i,n)}):"object"==typeof module&&module.exports?module.exports=e(t,require("./core"),require("fizzy-ui-utils")):e(t,t.InfiniteScroll,t.fizzyUIUtils)}(window,function(t,e,i){var n=e.prototype;e.defaults.history="replace";var o=document.createElement("a");return e.create.history=function(){if(this.options.history){o.href=this.getAbsolutePath();var t=o.origin||o.protocol+"//"+o.host,e=t==location.origin;return e?void(this.options.append?this.createHistoryAppend():this.createHistoryPageLoad()):void console.error("[InfiniteScroll] cannot set history with different origin: "+o.origin+" on "+location.origin+" . History behavior disabled.")}},n.createHistoryAppend=function(){this.updateMeasurements(),this.updateScroller(),this.scrollPages=[{top:0,path:location.href,title:document.title}],this.scrollPageIndex=0,this.scrollHistoryHandler=this.onScrollHistory.bind(this),this.unloadHandler=this.onUnload.bind(this),this.scroller.addEventListener("scroll",this.scrollHistoryHandler),this.on("append",this.onAppendHistory),this.bindHistoryAppendEvents(!0)},n.bindHistoryAppendEvents=function(e){var i=e?"addEventListener":"removeEventListener";this.scroller[i]("scroll",this.scrollHistoryHandler),t[i]("unload",this.unloadHandler)},n.createHistoryPageLoad=function(){this.on("load",this.onPageLoadHistory)},e.destroy.history=n.destroyHistory=function(){var t=this.options.history&&this.options.append;t&&this.bindHistoryAppendEvents(!1)},n.onAppendHistory=function(t,e,i){var n=i[0],r=this.getElementScrollY(n);o.href=e,this.scrollPages.push({top:r,path:o.href,title:t.title})},n.getElementScrollY=function(t){return this.options.elementScroll?this.getElementElementScrollY(t):this.getElementWindowScrollY(t)},n.getElementWindowScrollY=function(e){var i=e.getBoundingClientRect();return i.top+t.pageYOffset},n.getElementElementScrollY=function(t){return t.offsetTop-this.top},n.onScrollHistory=function(){for(var t,e,i=this.getScrollViewY(),n=0;n<this.scrollPages.length;n++){var o=this.scrollPages[n];if(o.top>=i)break;t=n,e=o}t!=this.scrollPageIndex&&(this.scrollPageIndex=t,this.setHistory(e.title,e.path))},i.debounceMethod(e,"onScrollHistory",150),n.getScrollViewY=function(){return this.options.elementScroll?this.scroller.scrollTop+this.scroller.clientHeight/2:t.pageYOffset+this.windowHeight/2},n.setHistory=function(t,e){var i=this.options.history,n=i&&history[i+"State"];n&&(history[i+"State"](null,t,e),this.options.historyTitle&&(document.title=t),this.dispatchEvent("history",null,[t,e]))},n.onUnload=function(){var e=this.scrollPageIndex;if(0!==e){var i=this.scrollPages[e],n=t.pageYOffset-i.top+this.top;this.destroyHistory(),scrollTo(0,n)}},n.onPageLoadHistory=function(t,e){this.setHistory(t.title,e)},e}),function(t,e){"function"==typeof define&&define.amd?define("infinite-scroll/js/button",["./core","fizzy-ui-utils/utils"],function(i,n){return e(t,i,n)}):"object"==typeof module&&module.exports?module.exports=e(t,require("./core"),require("fizzy-ui-utils")):e(t,t.InfiniteScroll,t.fizzyUIUtils)}(window,function(t,e,i){function n(t,e){this.element=t,this.infScroll=e,this.clickHandler=this.onClick.bind(this),this.element.addEventListener("click",this.clickHandler),e.on("request",this.disable.bind(this)),e.on("load",this.enable.bind(this)),e.on("error",this.hide.bind(this)),e.on("last",this.hide.bind(this))}return e.create.button=function(){var t=i.getQueryElement(this.options.button);if(t)return void(this.button=new n(t,this))},e.destroy.button=function(){this.button&&this.button.destroy()},n.prototype.onClick=function(t){t.preventDefault(),this.infScroll.loadNextPage()},n.prototype.enable=function(){this.element.removeAttribute("disabled")},n.prototype.disable=function(){this.element.disabled="disabled"},n.prototype.hide=function(){this.element.style.display="none"},n.prototype.destroy=function(){this.element.removeEventListener("click",this.clickHandler)},e.Button=n,e}),function(t,e){"function"==typeof define&&define.amd?define("infinite-scroll/js/status",["./core","fizzy-ui-utils/utils"],function(i,n){return e(t,i,n)}):"object"==typeof module&&module.exports?module.exports=e(t,require("./core"),require("fizzy-ui-utils")):e(t,t.InfiniteScroll,t.fizzyUIUtils)}(window,function(t,e,i){function n(t){r(t,"none")}function o(t){r(t,"block")}function r(t,e){t&&(t.style.display=e)}var s=e.prototype;return e.create.status=function(){var t=i.getQueryElement(this.options.status);t&&(this.statusElement=t,this.statusEventElements={request:t.querySelector(".infinite-scroll-request"),error:t.querySelector(".infinite-scroll-error"),last:t.querySelector(".infinite-scroll-last")},this.on("request",this.showRequestStatus),this.on("error",this.showErrorStatus),this.on("last",this.showLastStatus),this.bindHideStatus("on"))},s.bindHideStatus=function(t){var e=this.options.append?"append":"load";this[t](e,this.hideAllStatus)},s.showRequestStatus=function(){this.showStatus("request")},s.showErrorStatus=function(){this.showStatus("error")},s.showLastStatus=function(){this.showStatus("last"),this.bindHideStatus("off")},s.showStatus=function(t){o(this.statusElement),this.hideStatusEventElements();var e=this.statusEventElements[t];o(e)},s.hideAllStatus=function(){n(this.statusElement),this.hideStatusEventElements()},s.hideStatusEventElements=function(){for(var t in this.statusEventElements){var e=this.statusEventElements[t];n(e)}},e}),function(t,e){"function"==typeof define&&define.amd?define(["infinite-scroll/js/core","infinite-scroll/js/page-load","infinite-scroll/js/scroll-watch","infinite-scroll/js/history","infinite-scroll/js/button","infinite-scroll/js/status"],e):"object"==typeof module&&module.exports&&(module.exports=e(require("./core"),require("./page-load"),require("./scroll-watch"),require("./history"),require("./button"),require("./status")))}(window,function(t){return t}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("imagesloaded/imagesloaded",["ev-emitter/ev-emitter"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter")):t.imagesLoaded=e(t,t.EvEmitter)}("undefined"!=typeof window?window:this,function(t,e){function i(t,e){for(var i in e)t[i]=e[i];return t}function n(t){if(Array.isArray(t))return t;var e="object"==typeof t&&"number"==typeof t.length;return e?h.call(t):[t]}function o(t,e,r){if(!(this instanceof o))return new o(t,e,r);var s=t;return"string"==typeof t&&(s=document.querySelectorAll(t)),s?(this.elements=n(s),this.options=i({},this.options),"function"==typeof e?r=e:i(this.options,e),r&&this.on("always",r),this.getImages(),l&&(this.jqDeferred=new l.Deferred),void setTimeout(this.check.bind(this))):void a.error("Bad element for imagesLoaded "+(s||t))}function r(t){this.img=t}function s(t,e){this.url=t,this.element=e,this.img=new Image}var l=t.jQuery,a=t.console,h=Array.prototype.slice;o.prototype=Object.create(e.prototype),o.prototype.options={},o.prototype.getImages=function(){this.images=[],this.elements.forEach(this.addElementImages,this)},o.prototype.addElementImages=function(t){"IMG"==t.nodeName&&this.addImage(t),this.options.background===!0&&this.addElementBackgroundImages(t);var e=t.nodeType;if(e&&c[e]){for(var i=t.querySelectorAll("img"),n=0;n<i.length;n++){var o=i[n];this.addImage(o)}if("string"==typeof this.options.background){var r=t.querySelectorAll(this.options.background);for(n=0;n<r.length;n++){var s=r[n];this.addElementBackgroundImages(s)}}}};var c={1:!0,9:!0,11:!0};return o.prototype.addElementBackgroundImages=function(t){var e=getComputedStyle(t);if(e)for(var i=/url\((['"])?(.*?)\1\)/gi,n=i.exec(e.backgroundImage);null!==n;){var o=n&&n[2];o&&this.addBackground(o,t),n=i.exec(e.backgroundImage)}},o.prototype.addImage=function(t){var e=new r(t);this.images.push(e)},o.prototype.addBackground=function(t,e){var i=new s(t,e);this.images.push(i)},o.prototype.check=function(){function t(t,i,n){setTimeout(function(){e.progress(t,i,n)})}var e=this;return this.progressedCount=0,this.hasAnyBroken=!1,this.images.length?void this.images.forEach(function(e){e.once("progress",t),e.check()}):void this.complete()},o.prototype.progress=function(t,e,i){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!t.isLoaded,this.emitEvent("progress",[this,t,e]),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,t),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&a&&a.log("progress: "+i,t,e)},o.prototype.complete=function(){var t=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emitEvent(t,[this]),this.emitEvent("always",[this]),this.jqDeferred){var e=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[e](this)}},r.prototype=Object.create(e.prototype),r.prototype.check=function(){var t=this.getIsImageComplete();return t?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,this.proxyImage.addEventListener("load",this),this.proxyImage.addEventListener("error",this),this.img.addEventListener("load",this),this.img.addEventListener("error",this),void(this.proxyImage.src=this.img.src))},r.prototype.getIsImageComplete=function(){return this.img.complete&&this.img.naturalWidth},r.prototype.confirm=function(t,e){this.isLoaded=t,this.emitEvent("progress",[this,this.img,e])},r.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},r.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},r.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},r.prototype.unbindEvents=function(){this.proxyImage.removeEventListener("load",this),this.proxyImage.removeEventListener("error",this),this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype=Object.create(r.prototype),s.prototype.check=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this),this.img.src=this.url;var t=this.getIsImageComplete();t&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},s.prototype.unbindEvents=function(){this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype.confirm=function(t,e){this.isLoaded=t,this.emitEvent("progress",[this,this.element,e])},o.makeJQueryPlugin=function(e){e=e||t.jQuery,e&&(l=e,l.fn.imagesLoaded=function(t,e){var i=new o(this,t,e);return i.jqDeferred.promise(l(this))})},o.makeJQueryPlugin(),o});/* Notify.js - http://notifyjs.com/ Copyright (c) 2015 MIT */
(function (factory) {
	// UMD start
	// https://github.com/umdjs/umd/blob/master/jqueryPluginCommonjs.js
	if (typeof define === 'function' && define.amd) {
		// AMD. Register as an anonymous module.
		define(['jquery'], factory);
	} else if (typeof module === 'object' && module.exports) {
		// Node/CommonJS
		module.exports = function( root, jQuery ) {
			if ( jQuery === undefined ) {
				// require('jQuery') returns a factory that requires window to
				// build a jQuery instance, we normalize how we use modules
				// that require this pattern but the window provided is a noop
				// if it's defined (how jquery works)
				if ( typeof window !== 'undefined' ) {
					jQuery = require('jquery');
				}
				else {
					jQuery = require('jquery')(root);
				}
			}
			factory(jQuery);
			return jQuery;
		};
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {
	//IE8 indexOf polyfill
	var indexOf = [].indexOf || function(item) {
		for (var i = 0, l = this.length; i < l; i++) {
			if (i in this && this[i] === item) {
				return i;
			}
		}
		return -1;
	};

	var pluginName = "notify";
	var pluginClassName = pluginName + "js";
	var blankFieldName = pluginName + "!blank";

	var positions = {
		t: "top",
		m: "middle",
		b: "bottom",
		l: "left",
		c: "center",
		r: "right"
	};
	var hAligns = ["l", "c", "r"];
	var vAligns = ["t", "m", "b"];
	var mainPositions = ["t", "b", "l", "r"];
	var opposites = {
		t: "b",
		m: null,
		b: "t",
		l: "r",
		c: null,
		r: "l"
	};

	var parsePosition = function(str) {
		var pos;
		pos = [];
		$.each(str.split(/\W+/), function(i, word) {
			var w;
			w = word.toLowerCase().charAt(0);
			if (positions[w]) {
				return pos.push(w);
			}
		});
		return pos;
	};

	var styles = {};

	var coreStyle = {
		name: "core",
		html: "<div class=\"" + pluginClassName + "-wrapper\">\n	<div class=\"" + pluginClassName + "-arrow\"></div>\n	<div class=\"" + pluginClassName + "-container\"></div>\n</div>",
		css: "." + pluginClassName + "-corner {\n	position: fixed;\n	margin: 0;\n	z-index: 1050;\n}\n\n." + pluginClassName + "-corner ." + pluginClassName + "-wrapper,\n." + pluginClassName + "-corner ." + pluginClassName + "-container {\n	position: relative;\n	display: block;\n	height: inherit;\n	width: inherit;\n	margin: 3px;\n}\n\n." + pluginClassName + "-wrapper {\n	z-index: 1;\n	position: absolute;\n	display: inline-block;\n	height: 0;\n	width: 0;\n}\n\n." + pluginClassName + "-container {\n	display: none;\n	z-index: 1;\n	position: absolute;\n}\n\n." + pluginClassName + "-hidable {\n	cursor: pointer;\n}\n\n[data-notify-text],[data-notify-html] {\n	position: relative;\n}\n\n." + pluginClassName + "-arrow {\n	position: absolute;\n	z-index: 2;\n	width: 0;\n	height: 0;\n}"
	};

	var stylePrefixes = {
		"border-radius": ["-webkit-", "-moz-"]
	};

	var getStyle = function(name) {
		return styles[name];
	};

	var removeStyle = function(name) {
		if (!name) {
			throw "Missing Style name";
		}
		if (styles[name]) {
			delete styles[name];
		}
	};

	var addStyle = function(name, def) {
		if (!name) {
			throw "Missing Style name";
		}
		if (!def) {
			throw "Missing Style definition";
		}
		if (!def.html) {
			throw "Missing Style HTML";
		}
		//remove existing style
		var existing = styles[name];
		if (existing && existing.cssElem) {
			if (window.console) {
				console.warn(pluginName + ": overwriting style '" + name + "'");
			}
			styles[name].cssElem.remove();
		}
		def.name = name;
		styles[name] = def;
		var cssText = "";
		if (def.classes) {
			$.each(def.classes, function(className, props) {
				cssText += "." + pluginClassName + "-" + def.name + "-" + className + " {\n";
				$.each(props, function(name, val) {
					if (stylePrefixes[name]) {
						$.each(stylePrefixes[name], function(i, prefix) {
							return cssText += "	" + prefix + name + ": " + val + ";\n";
						});
					}
					return cssText += "	" + name + ": " + val + ";\n";
				});
				return cssText += "}\n";
			});
		}
		if (def.css) {
			cssText += "/* styles for " + def.name + " */\n" + def.css;
		}
		if (cssText) {
			def.cssElem = insertCSS(cssText);
			def.cssElem.attr("id", "notify-" + def.name);
		}
		var fields = {};
		var elem = $(def.html);
		findFields("html", elem, fields);
		findFields("text", elem, fields);
		def.fields = fields;
	};

	var insertCSS = function(cssText) {
		var e, elem, error;
		elem = createElem("style");
		elem.attr("type", 'text/css');
		$("head").append(elem);
		try {
			elem.html(cssText);
		} catch (_) {
			elem[0].styleSheet.cssText = cssText;
		}
		return elem;
	};

	var findFields = function(type, elem, fields) {
		var attr;
		if (type !== "html") {
			type = "text";
		}
		attr = "data-notify-" + type;
		return find(elem, "[" + attr + "]").each(function() {
			var name;
			name = $(this).attr(attr);
			if (!name) {
				name = blankFieldName;
			}
			fields[name] = type;
		});
	};

	var find = function(elem, selector) {
		if (elem.is(selector)) {
			return elem;
		} else {
			return elem.find(selector);
		}
	};

	var pluginOptions = {
		clickToHide: true,
		autoHide: true,
		autoHideDelay: 9000,
		arrowShow: false,
		breakNewLines: true,
		elementPosition: "bottom left",
		globalPosition: "bottom left",
		style: "bootstrap",
		className: "info",
		showAnimation: "slideDown",
		showDuration: 40,
		hideAnimation: "slideUp",
		hideDuration: 40,
		gap: 5
	};

	var inherit = function(a, b) {
		var F;
		F = function() {};
		F.prototype = a;
		return $.extend(true, new F(), b);
	};

	var defaults = function(opts) {
		return $.extend(pluginOptions, opts);
	};

	var createElem = function(tag) {
		return $("<" + tag + "></" + tag + ">");
	};

	var globalAnchors = {};

	var getAnchorElement = function(element) {
		var radios;
		if (element.is('[type=radio]')) {
			radios = element.parents('form:first').find('[type=radio]').filter(function(i, e) {
				return $(e).attr("name") === element.attr("name");
			});
			element = radios.first();
		}
		return element;
	};

	var incr = function(obj, pos, val) {
		var opp, temp;
		if (typeof val === "string") {
			val = parseInt(val, 10);
		} else if (typeof val !== "number") {
			return;
		}
		if (isNaN(val)) {
			return;
		}
		opp = positions[opposites[pos.charAt(0)]];
		temp = pos;
		if (obj[opp] !== undefined) {
			pos = positions[opp.charAt(0)];
			val = -val;
		}
		if (obj[pos] === undefined) {
			obj[pos] = val;
		} else {
			obj[pos] += val;
		}
		return null;
	};

	var realign = function(alignment, inner, outer) {
		if (alignment === "l" || alignment === "t") {
			return 0;
		} else if (alignment === "c" || alignment === "m") {
			return outer / 2 - inner / 2;
		} else if (alignment === "r" || alignment === "b") {
			return outer - inner;
		}
		throw "Invalid alignment";
	};

	var encode = function(text) {
		encode.e = encode.e || createElem("div");
		return encode.e.text(text).html();
	};

	function Notification(elem, data, options) {
		if (typeof options === "string") {
			options = {
				className: options
			};
		}
		this.options = inherit(pluginOptions, $.isPlainObject(options) ? options : {});
		this.loadHTML();
		this.wrapper = $(coreStyle.html);
		if (this.options.clickToHide) {
			this.wrapper.addClass(pluginClassName + "-hidable");
		}
		this.wrapper.data(pluginClassName, this);
		this.arrow = this.wrapper.find("." + pluginClassName + "-arrow");
		this.container = this.wrapper.find("." + pluginClassName + "-container");
		this.container.append(this.userContainer);
		if (elem && elem.length) {
			this.elementType = elem.attr("type");
			this.originalElement = elem;
			this.elem = getAnchorElement(elem);
			this.elem.data(pluginClassName, this);
			this.elem.before(this.wrapper);
		}
		this.container.hide();
		this.run(data);
	}

	Notification.prototype.loadHTML = function() {
		var style;
		style = this.getStyle();
		this.userContainer = $(style.html);
		this.userFields = style.fields;
	};

	Notification.prototype.show = function(show, userCallback) {
		var args, callback, elems, fn, hidden;
		callback = (function(_this) {
			return function() {
				if (!show && !_this.elem) {
					_this.destroy();
				}
				if (userCallback) {
					return userCallback();
				}
			};
		})(this);
		hidden = this.container.parent().parents(':hidden').length > 0;
		elems = this.container.add(this.arrow);
		args = [];
		if (hidden && show) {
			fn = "show";
		} else if (hidden && !show) {
			fn = "hide";
		} else if (!hidden && show) {
			fn = this.options.showAnimation;
			args.push(this.options.showDuration);
		} else if (!hidden && !show) {
			fn = this.options.hideAnimation;
			args.push(this.options.hideDuration);
		} else {
			return callback();
		}
		args.push(callback);
		return elems[fn].apply(elems, args);
	};

	Notification.prototype.setGlobalPosition = function() {
		var p = this.getPosition();
		var pMain = p[0];
		var pAlign = p[1];
		var main = positions[pMain];
		var align = positions[pAlign];
		var key = pMain + "|" + pAlign;
		var anchor = globalAnchors[key];
		if (!anchor || !document.body.contains(anchor[0])) {
			anchor = globalAnchors[key] = createElem("div");
			var css = {};
			css[main] = 0;
			if (align === "middle") {
				css.top = '45%';
			} else if (align === "center") {
				css.left = '45%';
			} else {
				css[align] = 0;
			}
			anchor.css(css).addClass(pluginClassName + "-corner");
			$("body").append(anchor);
		}
		return anchor.prepend(this.wrapper);
	};

	Notification.prototype.setElementPosition = function() {
		var arrowColor, arrowCss, arrowSize, color, contH, contW, css, elemH, elemIH, elemIW, elemPos, elemW, gap, j, k, len, len1, mainFull, margin, opp, oppFull, pAlign, pArrow, pMain, pos, posFull, position, ref, wrapPos;
		position = this.getPosition();
		pMain = position[0];
		pAlign = position[1];
		pArrow = position[2];
		elemPos = this.elem.position();
		elemH = this.elem.outerHeight();
		elemW = this.elem.outerWidth();
		elemIH = this.elem.innerHeight();
		elemIW = this.elem.innerWidth();
		wrapPos = this.wrapper.position();
		contH = this.container.height();
		contW = this.container.width();
		mainFull = positions[pMain];
		opp = opposites[pMain];
		oppFull = positions[opp];
		css = {};
		css[oppFull] = pMain === "b" ? elemH : pMain === "r" ? elemW : 0;
		incr(css, "top", elemPos.top - wrapPos.top);
		incr(css, "left", elemPos.left - wrapPos.left);
		ref = ["top", "left"];
		for (j = 0, len = ref.length; j < len; j++) {
			pos = ref[j];
			margin = parseInt(this.elem.css("margin-" + pos), 10);
			if (margin) {
				incr(css, pos, margin);
			}
		}
		gap = Math.max(0, this.options.gap - (this.options.arrowShow ? arrowSize : 0));
		incr(css, oppFull, gap);
		if (!this.options.arrowShow) {
			this.arrow.hide();
		} else {
			arrowSize = this.options.arrowSize;
			arrowCss = $.extend({}, css);
			arrowColor = this.userContainer.css("border-color") || this.userContainer.css("border-top-color") || this.userContainer.css("background-color") || "white";
			for (k = 0, len1 = mainPositions.length; k < len1; k++) {
				pos = mainPositions[k];
				posFull = positions[pos];
				if (pos === opp) {
					continue;
				}
				color = posFull === mainFull ? arrowColor : "transparent";
				arrowCss["border-" + posFull] = arrowSize + "px solid " + color;
			}
			incr(css, positions[opp], arrowSize);
			if (indexOf.call(mainPositions, pAlign) >= 0) {
				incr(arrowCss, positions[pAlign], arrowSize * 2);
			}
		}
		if (indexOf.call(vAligns, pMain) >= 0) {
			incr(css, "left", realign(pAlign, contW, elemW));
			if (arrowCss) {
				incr(arrowCss, "left", realign(pAlign, arrowSize, elemIW));
			}
		} else if (indexOf.call(hAligns, pMain) >= 0) {
			incr(css, "top", realign(pAlign, contH, elemH));
			if (arrowCss) {
				incr(arrowCss, "top", realign(pAlign, arrowSize, elemIH));
			}
		}
		if (this.container.is(":visible")) {
			css.display = "block";
		}
		this.container.removeAttr("style").css(css);
		if (arrowCss) {
			return this.arrow.removeAttr("style").css(arrowCss);
		}
	};

	Notification.prototype.getPosition = function() {
		var pos, ref, ref1, ref2, ref3, ref4, ref5, text;
		text = this.options.position || (this.elem ? this.options.elementPosition : this.options.globalPosition);
		pos = parsePosition(text);
		if (pos.length === 0) {
			pos[0] = "b";
		}
		if (ref = pos[0], indexOf.call(mainPositions, ref) < 0) {
			throw "Must be one of [" + mainPositions + "]";
		}
		if (pos.length === 1 || ((ref1 = pos[0], indexOf.call(vAligns, ref1) >= 0) && (ref2 = pos[1], indexOf.call(hAligns, ref2) < 0)) || ((ref3 = pos[0], indexOf.call(hAligns, ref3) >= 0) && (ref4 = pos[1], indexOf.call(vAligns, ref4) < 0))) {
			pos[1] = (ref5 = pos[0], indexOf.call(hAligns, ref5) >= 0) ? "m" : "l";
		}
		if (pos.length === 2) {
			pos[2] = pos[1];
		}
		return pos;
	};

	Notification.prototype.getStyle = function(name) {
		var style;
		if (!name) {
			name = this.options.style;
		}
		if (!name) {
			name = "default";
		}
		style = styles[name];
		if (!style) {
			throw "Missing style: " + name;
		}
		return style;
	};

	Notification.prototype.updateClasses = function() {
		var classes, style;
		classes = ["base"];
		if ($.isArray(this.options.className)) {
			classes = classes.concat(this.options.className);
		} else if (this.options.className) {
			classes.push(this.options.className);
		}
		style = this.getStyle();
		classes = $.map(classes, function(n) {
			return pluginClassName + "-" + style.name + "-" + n;
		}).join(" ");
		return this.userContainer.attr("class", classes);
	};

	Notification.prototype.run = function(data, options) {
		var d, datas, name, type, value;
		if ($.isPlainObject(options)) {
			$.extend(this.options, options);
		} else if ($.type(options) === "string") {
			this.options.className = options;
		}
		if (this.container && !data) {
			this.show(false);
			return;
		} else if (!this.container && !data) {
			return;
		}
		datas = {};
		if ($.isPlainObject(data)) {
			datas = data;
		} else {
			datas[blankFieldName] = data;
		}
		for (name in datas) {
			d = datas[name];
			type = this.userFields[name];
			if (!type) {
				continue;
			}
			if (type === "text") {
				d = encode(d);
				if (this.options.breakNewLines) {
					d = d.replace(/\n/g, '<br/>');
				}
			}
			value = name === blankFieldName ? '' : '=' + name;
			find(this.userContainer, "[data-notify-" + type + value + "]").html(d);
		}
		this.updateClasses();
		if (this.elem) {
			this.setElementPosition();
		} else {
			this.setGlobalPosition();
		}
		this.show(true);
		if (this.options.autoHide) {
			clearTimeout(this.autohideTimer);
			this.autohideTimer = setTimeout(this.show.bind(this, false), this.options.autoHideDelay);
		}
	};

	Notification.prototype.destroy = function() {
		this.wrapper.data(pluginClassName, null);
		this.wrapper.remove();
	};

	$[pluginName] = function(elem, data, options) {
		if ((elem && elem.nodeName) || elem.jquery) {
			$(elem)[pluginName](data, options);
		} else {
			options = data;
			data = elem;
			new Notification(null, data, options);
		}
		return elem;
	};

	$.fn[pluginName] = function(data, options) {
		$(this).each(function() {
			var prev = getAnchorElement($(this)).data(pluginClassName);
			if (prev) {
				prev.destroy();
			}
			var curr = new Notification($(this), data, options);
		});
		return this;
	};

	$.extend($[pluginName], {
		defaults: defaults,
		addStyle: addStyle,
		removeStyle: removeStyle,
		pluginOptions: pluginOptions,
		getStyle: getStyle,
		insertCSS: insertCSS
	});

	//always include the default bootstrap style
	var hashicon = {};
	addStyle("bootstrap", {
		html: "<div><i class=\"material-icons\" style=\"margin-right:15px;vertical-align:middle;\">&#xE876;</i>\n<span data-notify-text></span>\n</div>",
		classes: {
			base: {
				"padding": "15px 25px 15px",
				"background-color": "#202020",
				"border-color": "#202020",
				"white-space": "nowrap",
				"color": "#f5f5f5",
				"box-shadow": "0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08)",
				"font": "inherit"
			},
			error: {
				"color": "#fff",
				"background-color": "#DA2758",
				"border-color": "#DA2758"},
			success: {
				"color": "#fff",
				"background-color": "#68c368",
				"border-color": "#68c368"},
			info: {
				"color": "#fff",
				"background-color": "#167ac6",
				"border-color": "#167ac6"},
			warn: {
				"color": "#fff",
				"background-color": "#fe8964",
				"border-color": "#fe89645"}
		}
	});

	$(function() {
		insertCSS(coreStyle.css).attr("id", "core-notify");
		$(document).on("click", "." + pluginClassName + "-hidable", function(e) {
			$(this).trigger("notify-hide");
		});
		$(document).on("notify-hide", "." + pluginClassName + "-wrapper", function(e) {
			var elem = $(this).data(pluginClassName);
			if(elem) {
				elem.show(false);
			}
		});
	});

}));/*! Copyright (c) 2011 Piotr Rochala (http://rocha.la)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version: 1.3.8
 *
 */
(function(e){e.fn.extend({slimScroll:function(f){var a=e.extend({width:"auto",height:"auto",size:"7px",color:"#eee",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:!1,disableFadeOut:!1,railVisible:!1,railColor:"#333",railOpacity:.2,railDraggable:!0,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:!1,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"},f);this.each(function(){function v(d){if(r){d=d||window.event;
var c=0;d.wheelDelta&&(c=-d.wheelDelta/120);d.detail&&(c=d.detail/3);e(d.target||d.srcTarget||d.srcElement).closest("."+a.wrapperClass).is(b.parent())&&n(c,!0);d.preventDefault&&!k&&d.preventDefault();k||(d.returnValue=!1)}}function n(d,e,f){k=!1;var g=d,h=b.outerHeight()-c.outerHeight();e&&(g=parseInt(c.css("top"))+d*parseInt(a.wheelStep)/100*c.outerHeight(),g=Math.min(Math.max(g,0),h),g=0<d?Math.ceil(g):Math.floor(g),c.css({top:g+"px"}));l=parseInt(c.css("top"))/(b.outerHeight()-c.outerHeight());
g=l*(b[0].scrollHeight-b.outerHeight());f&&(g=d,d=g/b[0].scrollHeight*b.outerHeight(),d=Math.min(Math.max(d,0),h),c.css({top:d+"px"}));b.scrollTop(g);b.trigger("slimscrolling",~~g);w();q()}function x(){u=Math.max(b.outerHeight()/b[0].scrollHeight*b.outerHeight(),30);c.css({height:u+"px"});var a=u==b.outerHeight()?"none":"block";c.css({display:a})}function w(){x();clearTimeout(B);l==~~l?(k=a.allowPageScroll,C!=l&&b.trigger("slimscroll",0==~~l?"top":"bottom")):k=!1;C=l;u>=b.outerHeight()?k=!0:(c.stop(!0,
!0).fadeIn("fast"),a.railVisible&&m.stop(!0,!0).fadeIn("fast"))}function q(){a.alwaysVisible||(B=setTimeout(function(){a.disableFadeOut&&r||y||z||(c.fadeOut("slow"),m.fadeOut("slow"))},1E3))}var r,y,z,B,A,u,l,C,k=!1,b=e(this);if(b.parent().hasClass(a.wrapperClass)){var p=b.scrollTop(),c=b.siblings("."+a.barClass),m=b.siblings("."+a.railClass);x();if(e.isPlainObject(f)){if("height"in f&&"auto"==f.height){b.parent().css("height","auto");b.css("height","auto");var h=b.parent().parent().height();b.parent().css("height",
h);b.css("height",h)}else"height"in f&&(h=f.height,b.parent().css("height",h),b.css("height",h));if("scrollTo"in f)p=parseInt(a.scrollTo);else if("scrollBy"in f)p+=parseInt(a.scrollBy);else if("destroy"in f){c.remove();m.remove();b.unwrap();return}n(p,!1,!0)}}else if(!(e.isPlainObject(f)&&"destroy"in f)){a.height="auto"==a.height?b.parent().height():a.height;p=e("<div></div>").addClass(a.wrapperClass).css({position:"relative",overflow:"hidden",width:a.width,height:a.height});b.css({overflow:"hidden",
width:a.width,height:a.height});var m=e("<div></div>").addClass(a.railClass).css({width:a.size,height:"100%",position:"absolute",top:0,display:a.alwaysVisible&&a.railVisible?"block":"none","border-radius":a.railBorderRadius,background:a.railColor,opacity:a.railOpacity,zIndex:90}),c=e("<div></div>").addClass(a.barClass).css({background:a.color,width:a.size,position:"absolute",top:0,opacity:a.opacity,display:a.alwaysVisible?"block":"none","border-radius":a.borderRadius,BorderRadius:a.borderRadius,MozBorderRadius:a.borderRadius,
WebkitBorderRadius:a.borderRadius,zIndex:99}),h="right"==a.position?{right:a.distance}:{left:a.distance};m.css(h);c.css(h);b.wrap(p);b.parent().append(c);b.parent().append(m);a.railDraggable&&c.bind("mousedown",function(a){var b=e(document);z=!0;t=parseFloat(c.css("top"));pageY=a.pageY;b.bind("mousemove.slimscroll",function(a){currTop=t+a.pageY-pageY;c.css("top",currTop);n(0,c.position().top,!1)});b.bind("mouseup.slimscroll",function(a){z=!1;q();b.unbind(".slimscroll")});return!1}).bind("selectstart.slimscroll",
function(a){a.stopPropagation();a.preventDefault();return!1});m.hover(function(){w()},function(){q()});c.hover(function(){y=!0},function(){y=!1});b.hover(function(){r=!0;w();q()},function(){r=!1;q()});b.bind("touchstart",function(a,b){a.originalEvent.touches.length&&(A=a.originalEvent.touches[0].pageY)});b.bind("touchmove",function(b){k||b.originalEvent.preventDefault();b.originalEvent.touches.length&&(n((A-b.originalEvent.touches[0].pageY)/a.touchScrollStep,!0),A=b.originalEvent.touches[0].pageY)});
x();"bottom"===a.start?(c.css({top:b.outerHeight()-c.outerHeight()}),n(0,!0)):"top"!==a.start&&(n(e(a.start).position().top,null,!0),a.alwaysVisible||c.hide());window.addEventListener?(this.addEventListener("DOMMouseScroll",v,!1),this.addEventListener("mousewheel",v,!1)):document.attachEvent("onmousewheel",v)}});return this}});e.fn.extend({slimscroll:e.fn.slimScroll})})(jQuery);/*! EmojioneArea v3.4.0 | MIT license */
window="undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},document=window.document||{},function(a,b){"function"==typeof require&&"object"==typeof exports&&"object"==typeof module?a(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],a):a(b.jQuery)}(function(a){"use strict";var b=0,c={},d={},e=window.emojione,f=[];function g(a){e?a():f.push(a)}var h="data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==",i=[].slice,j="emoj",k=0,l="&#8203;";function m(b,d,e){var f=!0,g=1;if(d){d=d.toLowerCase();do{var h=1==g?"@"+d:d;c[b.id][h]&&c[b.id][h].length&&a.each(c[b.id][h],function(a,c){return f=c.apply(b,e||[])!==!1})}while(f&&g--)}return f}function n(b,c,e,f){f=f||function(b,c){return a(c.currentTarget)},a.each(e,function(g,h){g=a.isArray(e)?h:g,(d[b.id][h]||(d[b.id][h]=[])).push([c,g,f])})}function o(a,b,c){var d=e.imageType,f;f="svg"==d?e.imagePathSVG:e.imagePathPNG;var g="";c&&(g=c.substr(1,c.length-2).replace(/_/g," ").replace(/\w\S*/g,function(a){return a.charAt(0).toUpperCase()+a.substr(1).toLowerCase()}));var h="";return b.uc_base&&k>4?(h=b.uc_base,b=b.uc_output.toUpperCase()):h=b,a.replace("{name}",c||"").replace("{friendlyName}",g).replace("{img}",f+(2>k?h.toUpperCase():h)+"."+d).replace("{uni}",b).replace("{alt}",e.convert(b))}function p(a,b,c){return a.replace(/:?\+?[\w_\-]+:?/g,function(a){a=":"+a.replace(/:$/,"").replace(/^:/,"")+":";var d=e.emojioneList[a];return d?k>4?o(b,d,a):(k>3&&(d=d.unicode),o(b,d[d.length-1],a)):c?"":a})}function q(a){var b,c;if(window.getSelection){if(b=window.getSelection(),b.getRangeAt&&b.rangeCount){c=b.getRangeAt(0),c.deleteContents();var d=document.createElement("div");d.innerHTML=a;var e=document.createDocumentFragment(),f,g;while(f=d.firstChild)g=e.appendChild(f);c.insertNode(e),g&&(c=c.cloneRange(),c.setStartAfter(g),c.collapse(!0),b.removeAllRanges(),b.addRange(c))}}else document.selection&&"Control"!=document.selection.type&&document.selection.createRange().pasteHTML(a)}function r(){return window.emojioneVersion||"3.1.2"}function s(a){return"object"==typeof a}function t(a){var b;return a.cacheBustParam?(b=a.cacheBustParam,s(a.jsEscapeMap)?"?v=1.2.4"===b?"2.0.0":"?v=2.0.1"===b?"2.1.0":"?v=2.1.1"===b?"2.1.1":"?v=2.1.2"===b?"2.1.2":"?v=2.1.3"===b?"2.1.3":"?v=2.1.4"===b?"2.1.4":"2.2.7":"1.5.2"):a.emojiVersion}function u(a){switch(a){case"1.5.2":return 0;case"2.0.0":return 1;case"2.1.0":case"2.1.1":return 2;case"2.1.2":return 3;case"2.1.3":case"2.1.4":case"2.2.7":return 4;case"3.0.1":case"3.0.2":case"3.0.3":case"3.0":return 5;case"3.1.0":case"3.1.1":case"3.1.2":case"3.1":default:return 6}}function v(){if(a.fn.emojioneArea&&a.fn.emojioneArea.defaults)return a.fn.emojioneArea.defaults;var b={attributes:{dir:"ltr",spellcheck:!1,autocomplete:"off",autocorrect:"off",autocapitalize:"off"},search:!0,placeholder:null,emojiPlaceholder:":smiley:",searchPlaceholder:"SEARCH",container:null,hideSource:!0,shortnames:!0,sprite:!0,pickerPosition:"top",filtersPosition:"top",searchPosition:"top",hidePickerOnBlur:!0,buttonTitle:"Use the TAB key to insert emoji faster",tones:!0,tonesStyle:"bullet",inline:null,saveEmojisAs:"unicode",shortcuts:!0,autocomplete:!0,autocompleteTones:!1,standalone:!1,useInternalCDN:!0,imageType:"png",recentEmojis:!0,textcomplete:{maxCount:15,placement:null}},c=u(e?t(e):r());return c>4?b.filters={tones:{title:"Diversity",emoji:"open_hands raised_hands clap pray thumbsup thumbsdown punch fist left_facing_fist right_facing_fist fingers_crossed v metal ok_hand point_left point_right point_up_2 point_down point_up raised_hand raised_back_of_hand hand_splayed vulcan wave call_me muscle middle_finger writing_hand selfie nail_care ear nose baby boy girl man woman blond-haired_woman blond_haired_person blond-haired_man older_man older_woman man_with_chinese_cap woman_wearing_turban person_wearing_turban man_wearing_turban woman_police_officer police_officer man_police_officer woman_construction_worker construction_worker man_construction_worker woman_guard guard man_guard woman_detective detective man_detective woman_health_worker man_health_worker woman_farmer man_farmer woman_cook man_cook woman_student man_student woman_singer man_singer woman_teacher man_teacher woman_factory_worker man_factory_worker woman_technologist man_technologist woman_office_worker man_office_worker woman_mechanic man_mechanic woman_scientist man_scientist woman_artist man_artist woman_firefighter man_firefighter woman_pilot man_pilot woman_astronaut man_astronaut woman_judge man_judge mrs_claus santa princess prince bride_with_veil man_in_tuxedo angel pregnant_woman woman_bowing person_bowing man_bowing person_tipping_hand man_tipping_hand woman_tipping_hand person_gesturing_no man_gesturing_no woman_gesturing_no person_gesturing_ok man_gesturing_ok woman_gesturing_ok person_raising_hand man_raising_hand woman_raising_hand woman_facepalming man_facepalming person_facepalming woman_shrugging man_shrugging person_shrugging person_pouting man_pouting woman_pouting person_frowning man_frowning woman_frowning person_getting_haircut man_getting_haircut woman_getting_haircut person_getting_massage man_getting_face_massage woman_getting_face_massage levitate dancer man_dancing woman_walking person_walking man_walking woman_running person_running man_running adult child older_adult bearded_person woman_with_headscarf mage fairy vampire merperson elf love_you_gesture palms_up_together woman_mage man_mage woman_fairy man_fairy woman_vampire man_vampire mermaid merman woman_elf man_elf snowboarder woman_lifting_weights person_lifting_weights man_lifting_weights woman_cartwheeling man_cartwheeling person_doing_cartwheel woman_bouncing_ball person_bouncing_ball man_bouncing_ball woman_playing_handball man_playing_handball person_playing_handball woman_golfing person_golfing man_golfing woman_surfing person_surfing man_surfing woman_swimming person_swimming man_swimming woman_playing_water_polo man_playing_water_polo person_playing_water_polo woman_rowing_boat person_rowing_boat man_rowing_boat horse_racing woman_biking person_biking man_biking woman_mountain_biking person_mountain_biking man_mountain_biking woman_juggling man_juggling person_juggling breast_feeding person_in_steamy_room person_climbing person_in_lotus_position woman_in_steamy_room man_in_steamy_room woman_climbing man_climbing woman_in_lotus_position man_in_lotus_position bath sleeping_accommodation"},recent:{icon:"clock3",title:"Recent",emoji:""},smileys_people:{icon:"yum",title:"Smileys & People",emoji:"grinning smiley smile grin laughing sweat_smile joy rofl relaxed blush innocent slight_smile upside_down wink relieved heart_eyes kissing_heart kissing kissing_smiling_eyes kissing_closed_eyes yum stuck_out_tongue_winking_eye stuck_out_tongue_closed_eyes stuck_out_tongue money_mouth hugging nerd sunglasses clown cowboy smirk unamused disappointed pensive worried confused slight_frown frowning2 persevere confounded tired_face weary triumph angry rage no_mouth neutral_face expressionless hushed frowning anguished open_mouth astonished dizzy_face flushed scream fearful cold_sweat cry disappointed_relieved drooling_face sob sweat sleepy sleeping rolling_eyes thinking lying_face grimacing zipper_mouth nauseated_face sneezing_face mask thermometer_face head_bandage smiling_imp imp japanese_ogre japanese_goblin poop ghost skull skull_crossbones alien space_invader robot jack_o_lantern smiley_cat smile_cat joy_cat heart_eyes_cat smirk_cat kissing_cat scream_cat crying_cat_face pouting_cat open_hands raised_hands clap pray handshake thumbsup thumbsdown punch fist left_facing_fist right_facing_fist fingers_crossed v metal ok_hand point_left point_right point_up_2 point_down point_up raised_hand raised_back_of_hand hand_splayed vulcan wave call_me muscle middle_finger writing_hand selfie nail_care ring lipstick kiss lips tongue ear nose footprints eye eyes speaking_head bust_in_silhouette busts_in_silhouette baby boy girl man woman blond-haired_woman blond_haired_person older_man older_woman man_with_chinese_cap woman_wearing_turban person_wearing_turban woman_police_officer police_officer woman_construction_worker construction_worker woman_guard guard woman_detective detective woman_health_worker man_health_worker woman_farmer man_farmer woman_cook man_cook woman_student man_student woman_singer man_singer woman_teacher man_teacher woman_factory_worker man_factory_worker woman_technologist man_technologist woman_office_worker man_office_worker woman_mechanic man_mechanic woman_scientist man_scientist woman_artist man_artist woman_firefighter man_firefighter woman_pilot man_pilot woman_astronaut man_astronaut woman_judge man_judge mrs_claus santa princess prince bride_with_veil man_in_tuxedo angel pregnant_woman woman_bowing person_bowing person_tipping_hand man_tipping_hand person_gesturing_no man_gesturing_no person_gesturing_ok man_gesturing_ok person_raising_hand man_raising_hand woman_facepalming man_facepalming woman_shrugging man_shrugging person_pouting man_pouting person_frowning man_frowning person_getting_haircut man_getting_haircut person_getting_massage man_getting_face_massage levitate dancer man_dancing people_with_bunny_ears_partying men_with_bunny_ears_partying woman_walking person_walking woman_running person_running couple two_women_holding_hands two_men_holding_hands couple_with_heart couple_ww couple_mm couplekiss kiss_ww kiss_mm family family_mwg family_mwgb family_mwbb family_mwgg family_wwb family_wwg family_wwgb family_wwbb family_wwgg family_mmb family_mmg family_mmgb family_mmbb family_mmgg family_woman_boy family_woman_girl family_woman_girl_boy family_woman_boy_boy family_woman_girl_girl family_man_boy family_man_girl family_man_girl_boy family_man_boy_boy family_man_girl_girl womans_clothes shirt jeans necktie dress bikini kimono high_heel sandal boot mans_shoe athletic_shoe womans_hat tophat mortar_board crown helmet_with_cross school_satchel pouch purse handbag briefcase eyeglasses dark_sunglasses closed_umbrella umbrella2 face_with_raised_eyebrow star_struck crazy_face shushing_face face_with_symbols_over_mouth face_with_hand_over_mouth face_vomiting exploding_head face_with_monocle adult child older_adult bearded_person woman_with_headscarf brain billed_cap scarf gloves coat socks love_you_gesture palms_up_together woman_mage man_mage woman_fairy man_fairy woman_vampire man_vampire mermaid merman woman_elf man_elf woman_genie man_genie woman_zombie man_zombie"},animals_nature:{icon:"hamster",title:"Animals & Nature",emoji:"dog cat mouse hamster rabbit fox bear panda_face koala tiger lion_face cow pig pig_nose frog monkey_face see_no_evil hear_no_evil speak_no_evil monkey chicken penguin bird baby_chick hatching_chick hatched_chick duck eagle owl bat wolf boar horse unicorn bee bug butterfly snail shell beetle ant spider spider_web turtle snake lizard scorpion crab squid octopus shrimp tropical_fish fish blowfish dolphin shark whale whale2 crocodile leopard tiger2 water_buffalo ox cow2 deer dromedary_camel camel elephant rhino gorilla racehorse pig2 goat ram sheep dog2 poodle cat2 rooster turkey dove rabbit2 mouse2 rat chipmunk feet dragon dragon_face cactus christmas_tree evergreen_tree deciduous_tree palm_tree seedling herb shamrock four_leaf_clover bamboo tanabata_tree leaves fallen_leaf maple_leaf mushroom ear_of_rice bouquet tulip rose wilted_rose sunflower blossom cherry_blossom hibiscus earth_americas earth_africa earth_asia full_moon waning_gibbous_moon last_quarter_moon waning_crescent_moon new_moon waxing_crescent_moon first_quarter_moon waxing_gibbous_moon new_moon_with_face full_moon_with_face sun_with_face first_quarter_moon_with_face last_quarter_moon_with_face crescent_moon dizzy star star2 sparkles zap fire boom comet sunny white_sun_small_cloud partly_sunny white_sun_cloud white_sun_rain_cloud rainbow cloud cloud_rain thunder_cloud_rain cloud_lightning cloud_snow snowman2 snowman snowflake wind_blowing_face dash cloud_tornado fog ocean droplet sweat_drops umbrella giraffe zebra hedgehog sauropod t_rex cricket"},food_drink:{icon:"pizza",title:"Food & Drink",emoji:"green_apple apple pear tangerine lemon banana watermelon grapes strawberry melon cherries peach pineapple kiwi avocado tomato eggplant cucumber carrot corn hot_pepper potato sweet_potato chestnut peanuts honey_pot croissant bread french_bread cheese egg cooking bacon pancakes fried_shrimp poultry_leg meat_on_bone pizza hotdog hamburger fries stuffed_flatbread taco burrito salad shallow_pan_of_food spaghetti ramen stew fish_cake sushi bento curry rice_ball rice rice_cracker oden dango shaved_ice ice_cream icecream cake birthday custard lollipop candy chocolate_bar popcorn doughnut cookie milk baby_bottle coffee tea sake beer beers champagne_glass wine_glass tumbler_glass cocktail tropical_drink champagne spoon fork_and_knife fork_knife_plate dumpling fortune_cookie takeout_box chopsticks bowl_with_spoon cup_with_straw coconut broccoli pie pretzel cut_of_meat sandwich canned_food"},activity:{icon:"basketball",title:"Activity",emoji:"soccer basketball football baseball tennis volleyball rugby_football 8ball ping_pong badminton goal hockey field_hockey cricket_game golf bow_and_arrow fishing_pole_and_fish boxing_glove martial_arts_uniform ice_skate ski skier snowboarder woman_lifting_weights person_lifting_weights person_fencing women_wrestling men_wrestling woman_cartwheeling man_cartwheeling woman_bouncing_ball person_bouncing_ball woman_playing_handball man_playing_handball woman_golfing person_golfing woman_surfing person_surfing woman_swimming person_swimming woman_playing_water_polo man_playing_water_polo woman_rowing_boat person_rowing_boat horse_racing woman_biking person_biking woman_mountain_biking person_mountain_biking running_shirt_with_sash medal military_medal first_place second_place third_place trophy rosette reminder_ribbon ticket tickets circus_tent woman_juggling man_juggling performing_arts art clapper microphone headphones musical_score musical_keyboard drum saxophone trumpet guitar violin game_die dart bowling video_game slot_machine sled breast_feeding curling_stone woman_in_steamy_room man_in_steamy_room woman_climbing man_climbing woman_in_lotus_position man_in_lotus_position"},travel_places:{icon:"rocket",title:"Travel & Places",emoji:"red_car taxi blue_car bus trolleybus race_car police_car ambulance fire_engine minibus truck articulated_lorry tractor scooter bike motor_scooter motorcycle rotating_light oncoming_police_car oncoming_bus oncoming_automobile oncoming_taxi aerial_tramway mountain_cableway suspension_railway railway_car train mountain_railway monorail bullettrain_side bullettrain_front light_rail steam_locomotive train2 metro tram station helicopter airplane_small airplane airplane_departure airplane_arriving rocket satellite_orbital seat canoe sailboat motorboat speedboat cruise_ship ferry ship anchor construction fuelpump busstop vertical_traffic_light traffic_light map moyai statue_of_liberty fountain tokyo_tower european_castle japanese_castle stadium ferris_wheel roller_coaster carousel_horse beach_umbrella beach island mountain mountain_snow mount_fuji volcano desert camping tent railway_track motorway construction_site factory house house_with_garden homes house_abandoned office department_store post_office european_post_office hospital bank hotel convenience_store school love_hotel wedding classical_building church mosque synagogue kaaba shinto_shrine japan rice_scene park sunrise sunrise_over_mountains stars sparkler fireworks city_sunset city_dusk cityscape night_with_stars milky_way bridge_at_night foggy flying_saucer"},objects:{icon:"bulb",title:"Objects",emoji:"watch iphone calling computer keyboard desktop printer mouse_three_button trackball joystick compression minidisc floppy_disk cd dvd vhs camera camera_with_flash video_camera movie_camera projector film_frames telephone_receiver telephone pager fax tv radio microphone2 level_slider control_knobs stopwatch timer alarm_clock clock hourglass hourglass_flowing_sand satellite battery electric_plug bulb flashlight candle wastebasket oil money_with_wings dollar yen euro pound moneybag credit_card gem scales wrench hammer hammer_pick tools pick nut_and_bolt gear chains gun bomb knife dagger crossed_swords shield smoking coffin urn amphora crystal_ball prayer_beads barber alembic telescope microscope hole pill syringe thermometer toilet potable_water shower bathtub bath bellhop key key2 door couch bed sleeping_accommodation frame_photo shopping_bags shopping_cart gift balloon flags ribbon confetti_ball tada dolls izakaya_lantern wind_chime envelope envelope_with_arrow incoming_envelope e-mail love_letter inbox_tray outbox_tray package label mailbox_closed mailbox mailbox_with_mail mailbox_with_no_mail postbox postal_horn scroll page_with_curl page_facing_up bookmark_tabs bar_chart chart_with_upwards_trend chart_with_downwards_trend notepad_spiral calendar_spiral calendar date card_index card_box ballot_box file_cabinet clipboard file_folder open_file_folder dividers newspaper2 newspaper notebook notebook_with_decorative_cover ledger closed_book green_book blue_book orange_book books book bookmark link paperclip paperclips triangular_ruler straight_ruler pushpin round_pushpin scissors pen_ballpoint pen_fountain black_nib paintbrush crayon pencil pencil2 mag mag_right lock_with_ink_pen closed_lock_with_key lock unlock orange_heart"},symbols:{icon:"heartpulse",title:"Symbols",emoji:"heart yellow_heart green_heart blue_heart purple_heart black_heart broken_heart heart_exclamation two_hearts revolving_hearts heartbeat heartpulse sparkling_heart cupid gift_heart heart_decoration peace cross star_and_crescent om_symbol wheel_of_dharma star_of_david six_pointed_star menorah yin_yang orthodox_cross place_of_worship ophiuchus aries taurus gemini cancer leo virgo libra scorpius sagittarius capricorn aquarius pisces id atom accept radioactive biohazard mobile_phone_off vibration_mode u6709 u7121 u7533 u55b6 u6708 eight_pointed_black_star vs white_flower ideograph_advantage secret congratulations u5408 u6e80 u5272 u7981 a b ab cl o2 sos x o octagonal_sign no_entry name_badge no_entry_sign 100 anger hotsprings no_pedestrians do_not_litter no_bicycles non-potable_water underage no_mobile_phones no_smoking exclamation grey_exclamation question grey_question bangbang interrobang low_brightness high_brightness part_alternation_mark warning children_crossing trident fleur-de-lis beginner recycle white_check_mark u6307 chart sparkle eight_spoked_asterisk negative_squared_cross_mark globe_with_meridians diamond_shape_with_a_dot_inside m cyclone zzz atm wc wheelchair parking u7a7a sa passport_control customs baggage_claim left_luggage mens womens baby_symbol restroom put_litter_in_its_place cinema signal_strength koko symbols information_source abc abcd capital_abcd ng ok up cool new free zero one two three four five six seven eight nine keycap_ten 1234 hash asterisk arrow_forward pause_button play_pause stop_button record_button eject track_next track_previous fast_forward rewind arrow_double_up arrow_double_down arrow_backward arrow_up_small arrow_down_small arrow_right arrow_left arrow_up arrow_down arrow_upper_right arrow_lower_right arrow_lower_left arrow_upper_left arrow_up_down left_right_arrow arrow_right_hook leftwards_arrow_with_hook arrow_heading_up arrow_heading_down twisted_rightwards_arrows repeat repeat_one arrows_counterclockwise arrows_clockwise musical_note notes heavy_plus_sign heavy_minus_sign heavy_division_sign heavy_multiplication_x heavy_dollar_sign currency_exchange tm copyright registered wavy_dash curly_loop loop end back on top soon heavy_check_mark ballot_box_with_check radio_button white_circle black_circle red_circle blue_circle small_red_triangle small_red_triangle_down small_orange_diamond small_blue_diamond large_orange_diamond large_blue_diamond white_square_button black_square_button black_small_square white_small_square black_medium_small_square white_medium_small_square black_medium_square white_medium_square black_large_square white_large_square speaker mute sound loud_sound bell no_bell mega loudspeaker speech_left eye_in_speech_bubble speech_balloon thought_balloon anger_right spades clubs hearts diamonds black_joker flower_playing_cards mahjong clock1 clock2 clock3 clock4 clock5 clock6 clock7 clock8 clock9 clock10 clock11 clock12 clock130 clock230 clock330 clock430 clock530 clock630 clock730 clock830 clock930 clock1030 clock1130 clock1230"},flags:{icon:"flag_gb",title:"Flags",emoji:"flag_white flag_black checkered_flag triangular_flag_on_post rainbow_flag flag_af flag_ax flag_al flag_dz flag_as flag_ad flag_ao flag_ai flag_aq flag_ag flag_ar flag_am flag_aw flag_au flag_at flag_az flag_bs flag_bh flag_bd flag_bb flag_by flag_be flag_bz flag_bj flag_bm flag_bt flag_bo flag_ba flag_bw flag_br flag_io flag_vg flag_bn flag_bg flag_bf flag_bi flag_kh flag_cm flag_ca flag_ic flag_cv flag_bq flag_ky flag_cf flag_td flag_cl flag_cn flag_cx flag_cc flag_co flag_km flag_cg flag_cd flag_ck flag_cr flag_ci flag_hr flag_cu flag_cw flag_cy flag_cz flag_dk flag_dj flag_dm flag_do flag_ec flag_eg flag_sv flag_gq flag_er flag_ee flag_et flag_eu flag_fk flag_fo flag_fj flag_fi flag_fr flag_gf flag_pf flag_tf flag_ga flag_gm flag_ge flag_de flag_gh flag_gi flag_gr flag_gl flag_gd flag_gp flag_gu flag_gt flag_gg flag_gn flag_gw flag_gy flag_ht flag_hn flag_hk flag_hu flag_is flag_in flag_id flag_ir flag_iq flag_ie flag_im flag_il flag_it flag_jm flag_jp crossed_flags flag_je flag_jo flag_kz flag_ke flag_ki flag_xk flag_kw flag_kg flag_la flag_lv flag_lb flag_ls flag_lr flag_ly flag_li flag_lt flag_lu flag_mo flag_mk flag_mg flag_mw flag_my flag_mv flag_ml flag_mt flag_mh flag_mq flag_mr flag_mu flag_yt flag_mx flag_fm flag_md flag_mc flag_mn flag_me flag_ms flag_ma flag_mz flag_mm flag_na flag_nr flag_np flag_nl flag_nc flag_nz flag_ni flag_ne flag_ng flag_nu flag_nf flag_kp flag_mp flag_no flag_om flag_pk flag_pw flag_ps flag_pa flag_pg flag_py flag_pe flag_ph flag_pn flag_pl flag_pt flag_pr flag_qa flag_re flag_ro flag_ru flag_rw flag_ws flag_sm flag_st flag_sa flag_sn flag_rs flag_sc flag_sl flag_sg flag_sx flag_sk flag_si flag_gs flag_sb flag_so flag_za flag_kr flag_ss flag_es flag_lk flag_bl flag_sh flag_kn flag_lc flag_pm flag_vc flag_sd flag_sr flag_sz flag_se flag_ch flag_sy flag_tw flag_tj flag_tz flag_th flag_tl flag_tg flag_tk flag_to flag_tt flag_tn flag_tr flag_tm flag_tc flag_tv flag_vi flag_ug flag_ua flag_ae flag_gb flag_us flag_uy flag_uz flag_vu flag_va flag_ve flag_vn flag_wf flag_eh flag_ye flag_zm flag_zw flag_ac flag_ta flag_bv flag_hm flag_sj flag_um flag_ea flag_cp flag_dg flag_mf united_nations england scotland wales"}}:b.filters={tones:{title:"Diversity",emoji:"santa runner surfer swimmer lifter ear nose point_up_2 point_down point_left point_right punch wave ok_hand thumbsup thumbsdown clap open_hands boy girl man woman cop bride_with_veil person_with_blond_hair man_with_gua_pi_mao man_with_turban older_man grandma baby construction_worker princess angel information_desk_person guardsman dancer nail_care massage haircut muscle spy hand_splayed middle_finger vulcan no_good ok_woman bow raising_hand raised_hands person_frowning person_with_pouting_face pray rowboat bicyclist mountain_bicyclist walking bath metal point_up basketball_player fist raised_hand v writing_hand"},recent:{icon:"clock3",title:"Recent",emoji:""},smileys_people:{icon:"yum",title:"Smileys & People",emoji:"grinning grimacing grin joy smiley smile sweat_smile laughing innocent wink blush slight_smile upside_down relaxed yum relieved heart_eyes kissing_heart kissing kissing_smiling_eyes kissing_closed_eyes stuck_out_tongue_winking_eye stuck_out_tongue_closed_eyes stuck_out_tongue money_mouth nerd sunglasses hugging smirk no_mouth neutral_face expressionless unamused rolling_eyes thinking flushed disappointed worried angry rage pensive confused slight_frown frowning2 persevere confounded tired_face weary triumph open_mouth scream fearful cold_sweat hushed frowning anguished cry disappointed_relieved sleepy sweat sob dizzy_face astonished zipper_mouth mask thermometer_face head_bandage sleeping zzz poop smiling_imp imp japanese_ogre japanese_goblin skull ghost alien robot smiley_cat smile_cat joy_cat heart_eyes_cat smirk_cat kissing_cat scream_cat crying_cat_face pouting_cat raised_hands clap wave thumbsup thumbsdown punch fist v ok_hand raised_hand open_hands muscle pray point_up point_up_2 point_down point_left point_right middle_finger hand_splayed metal vulcan writing_hand nail_care lips tongue ear nose eye eyes bust_in_silhouette busts_in_silhouette speaking_head baby boy girl man woman person_with_blond_hair older_man older_woman man_with_gua_pi_mao man_with_turban cop construction_worker guardsman spy santa angel princess bride_with_veil walking runner dancer dancers couple two_men_holding_hands two_women_holding_hands bow information_desk_person no_good ok_woman raising_hand person_with_pouting_face person_frowning haircut massage couple_with_heart couple_ww couple_mm couplekiss kiss_ww kiss_mm family family_mwg family_mwgb family_mwbb family_mwgg family_wwb family_wwg family_wwgb family_wwbb family_wwgg family_mmb family_mmg family_mmgb family_mmbb family_mmgg womans_clothes shirt jeans necktie dress bikini kimono lipstick kiss footprints high_heel sandal boot mans_shoe athletic_shoe womans_hat tophat helmet_with_cross mortar_board crown school_satchel pouch purse handbag briefcase eyeglasses dark_sunglasses ring closed_umbrella"},animals_nature:{icon:"hamster",title:"Animals & Nature",emoji:"dog cat mouse hamster rabbit bear panda_face koala tiger lion_face cow pig pig_nose frog octopus monkey_face see_no_evil hear_no_evil speak_no_evil monkey chicken penguin bird baby_chick hatching_chick hatched_chick wolf boar horse unicorn bee bug snail beetle ant spider scorpion crab snake turtle tropical_fish fish blowfish dolphin whale whale2 crocodile leopard tiger2 water_buffalo ox cow2 dromedary_camel camel elephant goat ram sheep racehorse pig2 rat mouse2 rooster turkey dove dog2 poodle cat2 rabbit2 chipmunk feet dragon dragon_face cactus christmas_tree evergreen_tree deciduous_tree palm_tree seedling herb shamrock four_leaf_clover bamboo tanabata_tree leaves fallen_leaf maple_leaf ear_of_rice hibiscus sunflower rose tulip blossom cherry_blossom bouquet mushroom chestnut jack_o_lantern shell spider_web earth_americas earth_africa earth_asia full_moon waning_gibbous_moon last_quarter_moon waning_crescent_moon new_moon waxing_crescent_moon first_quarter_moon waxing_gibbous_moon new_moon_with_face full_moon_with_face first_quarter_moon_with_face last_quarter_moon_with_face sun_with_face crescent_moon star star2 dizzy sparkles comet sunny white_sun_small_cloud partly_sunny white_sun_cloud white_sun_rain_cloud cloud cloud_rain thunder_cloud_rain cloud_lightning zap fire boom snowflake cloud_snow snowman2 snowman wind_blowing_face dash cloud_tornado fog umbrella2 umbrella droplet sweat_drops ocean"},food_drink:{icon:"pizza",title:"Food & Drink",emoji:"green_apple apple pear tangerine lemon banana watermelon grapes strawberry melon cherries peach pineapple tomato eggplant hot_pepper corn sweet_potato honey_pot bread cheese poultry_leg meat_on_bone fried_shrimp egg hamburger fries hotdog pizza spaghetti taco burrito ramen stew fish_cake sushi bento curry rice_ball rice rice_cracker oden dango shaved_ice ice_cream icecream cake birthday custard candy lollipop chocolate_bar popcorn doughnut cookie beer beers wine_glass cocktail tropical_drink champagne sake tea coffee baby_bottle fork_and_knife fork_knife_plate"},activity:{icon:"basketball",title:"Activity",emoji:"soccer basketball football baseball tennis volleyball rugby_football 8ball golf golfer ping_pong badminton hockey field_hockey cricket ski skier snowboarder ice_skate bow_and_arrow fishing_pole_and_fish rowboat swimmer surfer bath basketball_player lifter bicyclist mountain_bicyclist horse_racing levitate trophy running_shirt_with_sash medal military_medal reminder_ribbon rosette ticket tickets performing_arts art circus_tent microphone headphones musical_score musical_keyboard saxophone trumpet guitar violin clapper video_game space_invader dart game_die slot_machine bowling"},travel_places:{icon:"rocket",title:"Travel & Places",emoji:"red_car taxi blue_car bus trolleybus race_car police_car ambulance fire_engine minibus truck articulated_lorry tractor motorcycle bike rotating_light oncoming_police_car oncoming_bus oncoming_automobile oncoming_taxi aerial_tramway mountain_cableway suspension_railway railway_car train monorail bullettrain_side bullettrain_front light_rail mountain_railway steam_locomotive train2 metro tram station helicopter airplane_small airplane airplane_departure airplane_arriving sailboat motorboat speedboat ferry cruise_ship rocket satellite_orbital seat anchor construction fuelpump busstop vertical_traffic_light traffic_light checkered_flag ship ferris_wheel roller_coaster carousel_horse construction_site foggy tokyo_tower factory fountain rice_scene mountain mountain_snow mount_fuji volcano japan camping tent park motorway railway_track sunrise sunrise_over_mountains desert beach island city_sunset city_dusk cityscape night_with_stars bridge_at_night milky_way stars sparkler fireworks rainbow homes european_castle japanese_castle stadium statue_of_liberty house house_with_garden house_abandoned office department_store post_office european_post_office hospital bank hotel convenience_store school love_hotel wedding classical_building church mosque synagogue kaaba shinto_shrine"},objects:{icon:"bulb",title:"Objects",emoji:"watch iphone calling computer keyboard desktop printer mouse_three_button trackball joystick compression minidisc floppy_disk cd dvd vhs camera camera_with_flash video_camera movie_camera projector film_frames telephone_receiver telephone pager fax tv radio microphone2 level_slider control_knobs stopwatch timer alarm_clock clock hourglass_flowing_sand hourglass satellite battery electric_plug bulb flashlight candle wastebasket oil money_with_wings dollar yen euro pound moneybag credit_card gem scales wrench hammer hammer_pick tools pick nut_and_bolt gear chains gun bomb knife dagger crossed_swords shield smoking skull_crossbones coffin urn amphora crystal_ball prayer_beads barber alembic telescope microscope hole pill syringe thermometer label bookmark toilet shower bathtub key key2 couch sleeping_accommodation bed door bellhop frame_photo map beach_umbrella moyai shopping_bags balloon flags ribbon gift confetti_ball tada dolls wind_chime crossed_flags izakaya_lantern envelope envelope_with_arrow incoming_envelope e-mail love_letter postbox mailbox_closed mailbox mailbox_with_mail mailbox_with_no_mail package postal_horn inbox_tray outbox_tray scroll page_with_curl bookmark_tabs bar_chart chart_with_upwards_trend chart_with_downwards_trend page_facing_up date calendar calendar_spiral card_index card_box ballot_box file_cabinet clipboard notepad_spiral file_folder open_file_folder dividers newspaper2 newspaper notebook closed_book green_book blue_book orange_book notebook_with_decorative_cover ledger books book link paperclip paperclips scissors triangular_ruler straight_ruler pushpin round_pushpin triangular_flag_on_post flag_white flag_black closed_lock_with_key lock unlock lock_with_ink_pen pen_ballpoint pen_fountain black_nib pencil pencil2 crayon paintbrush mag mag_right"},symbols:{icon:"heartpulse",title:"Symbols",emoji:"heart yellow_heart green_heart blue_heart purple_heart broken_heart heart_exclamation two_hearts revolving_hearts heartbeat heartpulse sparkling_heart cupid gift_heart heart_decoration peace cross star_and_crescent om_symbol wheel_of_dharma star_of_david six_pointed_star menorah yin_yang orthodox_cross place_of_worship ophiuchus aries taurus gemini cancer leo virgo libra scorpius sagittarius capricorn aquarius pisces id atom u7a7a u5272 radioactive biohazard mobile_phone_off vibration_mode u6709 u7121 u7533 u55b6 u6708 eight_pointed_black_star vs accept white_flower ideograph_advantage secret congratulations u5408 u6e80 u7981 a b ab cl o2 sos no_entry name_badge no_entry_sign x o anger hotsprings no_pedestrians do_not_litter no_bicycles non-potable_water underage no_mobile_phones exclamation grey_exclamation question grey_question bangbang interrobang 100 low_brightness high_brightness trident fleur-de-lis part_alternation_mark warning children_crossing beginner recycle u6307 chart sparkle eight_spoked_asterisk negative_squared_cross_mark white_check_mark diamond_shape_with_a_dot_inside cyclone loop globe_with_meridians m atm sa passport_control customs baggage_claim left_luggage wheelchair no_smoking wc parking potable_water mens womens baby_symbol restroom put_litter_in_its_place cinema signal_strength koko ng ok up cool new free zero one two three four five six seven eight nine ten 1234 arrow_forward pause_button play_pause stop_button record_button track_next track_previous fast_forward rewind twisted_rightwards_arrows repeat repeat_one arrow_backward arrow_up_small arrow_down_small arrow_double_up arrow_double_down arrow_right arrow_left arrow_up arrow_down arrow_upper_right arrow_lower_right arrow_lower_left arrow_upper_left arrow_up_down left_right_arrow arrows_counterclockwise arrow_right_hook leftwards_arrow_with_hook arrow_heading_up arrow_heading_down hash asterisk information_source abc abcd capital_abcd symbols musical_note notes wavy_dash curly_loop heavy_check_mark arrows_clockwise heavy_plus_sign heavy_minus_sign heavy_division_sign heavy_multiplication_x heavy_dollar_sign currency_exchange copyright registered tm end back on top soon ballot_box_with_check radio_button white_circle black_circle red_circle large_blue_circle small_orange_diamond small_blue_diamond large_orange_diamond large_blue_diamond small_red_triangle black_small_square white_small_square black_large_square white_large_square small_red_triangle_down black_medium_square white_medium_square black_medium_small_square white_medium_small_square black_square_button white_square_button speaker sound loud_sound mute mega loudspeaker bell no_bell black_joker mahjong spades clubs hearts diamonds flower_playing_cards thought_balloon anger_right speech_balloon clock1 clock2 clock3 clock4 clock5 clock6 clock7 clock8 clock9 clock10 clock11 clock12 clock130 clock230 clock330 clock430 clock530 clock630 clock730 clock830 clock930 clock1030 clock1130 clock1230 eye_in_speech_bubble"
},flags:{icon:"flag_gb",title:"Flags",emoji:"ac af al dz ad ao ai ag ar am aw au at az bs bh bd bb by be bz bj bm bt bo ba bw br bn bg bf bi cv kh cm ca ky cf td flag_cl cn co km cg flag_cd cr hr cu cy cz dk dj dm do ec eg sv gq er ee et fk fo fj fi fr pf ga gm ge de gh gi gr gl gd gu gt gn gw gy ht hn hk hu is in flag_id ir iq ie il it ci jm jp je jo kz ke ki xk kw kg la lv lb ls lr ly li lt lu mo mk mg mw my mv ml mt mh mr mu mx fm md mc mn me ms ma mz mm na nr np nl nc nz ni ne flag_ng nu kp no om pk pw ps pa pg py pe ph pl pt pr qa ro ru rw sh kn lc vc ws sm st flag_sa sn rs sc sl sg sk si sb so za kr es lk sd sr sz se ch sy tw tj tz th tl tg to tt tn tr flag_tm flag_tm ug ua ae gb us vi uy uz vu va ve vn wf eh ye zm zw re ax ta io bq cx cc gg im yt nf pn bl pm gs tk bv hm sj um ic ea cp dg as aq vg ck cw eu gf tf gp mq mp sx ss tc "}},b}function w(b){var c=v();if(b&&b.filters){var d=c.filters;a.each(b.filters,function(b,c){return!s(c)||a.isEmptyObject(c)?void delete d[b]:void a.each(c,function(a,c){d[b][a]=c})}),b.filters=d}return a.extend({},c,b)}var x,y;window.getSelection&&document.createRange?(x=function(a){var b=window.getSelection&&window.getSelection();return b&&b.rangeCount>0?b.getRangeAt(0):void 0},y=function(a,b){var c=document.createRange();c.setStart(b.startContainer,b.startOffset),c.setEnd(b.endContainer,b.endOffset),b=window.getSelection(),b.removeAllRanges(),b.addRange(c)}):document.selection&&document.body.createTextRange&&(x=function(a){return document.selection.createRange()},y=function(a,b){var c=document.body.createTextRange();c.moveToElementText(a),c.setStart(b.startContanier,b.startOffset),c.setEnd(b.endContainer,b.endOffset),c.select()});var z;function A(a,b){return a.replace(z,function(a){var c=e[0===k?"jsecapeMap":"jsEscapeMap"];return"undefined"!=typeof a&&a in c?o(b,c[a]):a})}function B(a,b){return a=a.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#x27;").replace(/`/g,"&#x60;").replace(/(?:\r\n|\r|\n)/g,"\n").replace(/(\n+)/g,"<div>$1</div>").replace(/\n/g,"<br/>").replace(/<br\/><\/div>/g,"</div>"),b.shortnames&&(a=e.shortnameToUnicode(a)),A(a,b.emojiTemplate).replace(/\t/g,"&nbsp;&nbsp;&nbsp;&nbsp;").replace(/  /g,"&nbsp;&nbsp;")}function C(a,b){switch(a=a.replace(/&#10;/g,"\n").replace(/&#09;/g,"	").replace(/<img[^>]*alt="([^"]+)"[^>]*>/gi,"$1").replace(/\n|\r/g,"").replace(/<br[^>]*>/gi,"\n").replace(/(?:<(?:div|p|ol|ul|li|pre|code|object)[^>]*>)+/gi,"<div>").replace(/(?:<\/(?:div|p|ol|ul|li|pre|code|object)>)+/gi,"</div>").replace(/\n<div><\/div>/gi,"\n").replace(/<div><\/div>\n/gi,"\n").replace(/(?:<div>)+<\/div>/gi,"\n").replace(/([^\n])<\/div><div>/gi,"$1\n").replace(/(?:<\/div>)+/gi,"</div>").replace(/([^\n])<\/div>([^\n])/gi,"$1\n$2").replace(/<\/div>/gi,"").replace(/([^\n])<div>/gi,"$1\n").replace(/\n<div>/gi,"\n").replace(/<div>\n/gi,"\n\n").replace(/<(?:[^>]+)?>/g,"").replace(new RegExp(l,"g"),"").replace(/&nbsp;/g," ").replace(/&lt;/g,"<").replace(/&gt;/g,">").replace(/&quot;/g,'"').replace(/&#x27;/g,"'").replace(/&#x60;/g,"`").replace(/&#60;/g,"<").replace(/&#62;/g,">").replace(/&amp;/g,"&"),b.saveEmojisAs){case"image":a=A(a,b.emojiTemplate);break;case"shortname":a=e.toShort(a)}return a}function D(){var a=this,b=a.editor[0].offsetWidth-a.editor[0].clientWidth,c=parseInt(a.button.css("marginRight"));c!==b&&(a.button.css({marginRight:b}),a.floatingPicker&&a.picker.css({right:parseInt(a.picker.css("right"))-c+b}))}function E(){var b=this;if(!b.sprite&&b.lasyEmoji[0]){var c=b.picker.offset().top,d=c+b.picker.height()+20;b.lasyEmoji.each(function(){var b=a(this),e=b.offset().top;e>c&&d>e&&b.attr("src",b.data("src")).removeClass("lazy-emoji")}),b.lasyEmoji=b.lasyEmoji.filter(".lazy-emoji")}}function F(a,b){return(b?"":".")+j+(a?"-"+a:"")}function G(b){var c=a("<div/>",s(b)?b:{"class":F(b,!0)});return a.each(i.call(arguments).slice(1),function(b,d){a.isFunction(d)&&(d=d.call(c)),d&&a(d).appendTo(c)}),c}function H(){return localStorage.getItem("recent_emojis")||""}function I(b,c){var d=H();if(!b.recent||b.recent!==d||c){if(d.length){var e=b.scrollArea.is(".skinnable"),f,g;e||(f=b.scrollArea.scrollTop(),c&&b.recentCategory.show(),g=b.recentCategory.is(":visible")?b.recentCategory.height():0);var h=p(d,b.emojiBtnTemplate,!0).split("|").join("");if(b.recentCategory.children(".emojibtn").remove(),a(h).insertAfter(b.recentCategory.children(".emoj-category-title")),b.recentCategory.children(".emojibtn").on("click",function(){b.trigger("emojibtn.click",a(this))}),b.recentFilter.show(),!e){b.recentCategory.show();var i=b.recentCategory.height();g!==i&&b.scrollArea.scrollTop(f+i-g)}}else b.recentFilter.hasClass("active")&&b.recentFilter.removeClass("active").next().addClass("active"),b.recentCategory.hide(),b.recentFilter.hide();b.recent=d}}function J(a,b){var c=H(),d=c.split("|"),e=d.indexOf(b);-1!==e&&d.splice(e,1),d.unshift(b),d.length>9&&d.pop(),localStorage.setItem("recent_emojis",d.join("|")),I(a)}function K(){var a="test";try{return localStorage.setItem(a,a),localStorage.removeItem(a),!0}catch(b){return!1}}function L(b,c,d){b.options=d=w(d),b.sprite=d.sprite&&3>k,b.inline=null===d.inline?c.is("INPUT"):d.inline,b.shortnames=d.shortnames,b.saveEmojisAs=d.saveEmojisAs,b.standalone=d.standalone,b.emojiTemplate='<img alt="{alt}" class="emojione'+(b.sprite?'-{uni}" src="'+h+'"/>':'emoji" src="{img}"/>'),b.emojiTemplateAlt=b.sprite?'<i class="emojione-{uni}"/>':'<img class="emojioneemoji" src="{img}"/>',b.emojiBtnTemplate='<i class="emojibtn" role="button" data-name="{name}" title="{friendlyName}">'+b.emojiTemplateAlt+"</i>",b.recentEmojis=d.recentEmojis&&K();var f=d.pickerPosition;b.floatingPicker="top"===f||"bottom"===f,b.source=c,(c.is(":disabled")||c.is(".disabled"))&&b.disable();var g=c.is("TEXTAREA")||c.is("INPUT")?"val":"text",i,o,r,t,u,v,z,A,L,M,N=G("tones",d.tones?function(){this.addClass(F("tones-"+d.tonesStyle,!0));for(var b=0;5>=b;b++)this.append(a("<i/>",{"class":"btn-tone btn-tone-"+b+(b?"":" active"),"data-skin":b,role:"button"}))}:null),O=G({"class":j+(b.standalone?" "+j+"-standalone ":" ")+(c.attr("class")||""),role:"application"},i=b.editor=G("editor").attr({contenteditable:!b.standalone,placeholder:d.placeholder||c.data("placeholder")||c.attr("placeholder")||"",tabindex:0}),o=b.button=G("button",G("button-open"),G("button-close")).attr("title",d.buttonTitle),r=b.picker=G("picker",G("wrapper",t=G("filters"),d.search?v=G("search-panel",G("search",d.search?function(){b.search=a("<input/>",{placeholder:d.searchPlaceholder||"",type:"text","class":"search"}),this.append(b.search)}:null),N):null,M=G("scroll-area",d.tones&&!d.search?G("tones-panel",N):null,z=G("emojis-list")))).addClass(F("picker-position-"+d.pickerPosition,!0)).addClass(F("filters-position-"+d.filtersPosition,!0)).addClass(F("search-position-"+d.searchPosition,!0)).addClass("hidden"));d.search&&v.addClass(F("with-search",!0)),b.searchSel=null,i.data(c.data()),a.each(d.attributes,function(a,b){i.attr(a,b)});var P=G("category-block").attr({"data-tone":0}).prependTo(z);if(a.each(d.filters,function(c,e){var f=0;if("recent"!==c||b.recentEmojis){if("tones"!==c)a("<i/>",{"class":F("filter",!0)+" "+F("filter-"+c,!0),"data-filter":c,title:e.title}).wrapInner(p(e.icon,b.emojiTemplateAlt)).appendTo(t);else{if(!d.tones)return;f=5}do{var g,h=e.emoji.replace(/[\s,;]+/g,"|");g=0===f?G("category").attr({name:c,"data-tone":f}).appendTo(P):G("category-block").attr({name:c,"data-tone":f}).appendTo(z),f>0&&(g.hide(),h=h.split("|").join("_tone"+f+"|")+"_tone"+f),"recent"===c&&(h=H()),h=p(h,b.sprite?'<i class="emojibtn" role="button" data-name="{name}" title="{friendlyName}"><i class="emojione-{uni}"></i></i>':'<i class="emojibtn" role="button" data-name="{name}" title="{friendlyName}"><img class="emojioneemoji lazy-emoji" data-src="{img}"/></i>',!0).split("|").join(""),g.html(h),a('<div class="emoj-category-title"/>').text(e.title).prependTo(g)}while(--f>0)}}),d.filters=null,b.sprite||(b.lasyEmoji=z.find(".lazy-emoji")),u=t.find(F("filter")),u.eq(0).addClass("active"),L=z.find(F("category-block")),A=z.find(F("category")),b.recentFilter=u.filter('[data-filter="recent"]'),b.recentCategory=A.filter("[name=recent]"),b.scrollArea=M,d.container?a(d.container).wrapInner(O):O.insertAfter(c),d.hideSource&&c.hide(),b.setText(c[g]()),c[g](b.getText()),D.apply(b),b.standalone&&!b.getText().length){var Q=a(c).data("emoji-placeholder")||d.emojiPlaceholder;b.setText(Q),i.addClass("has-placeholder")}n(b,z.find(".emojibtn"),{click:"emojibtn.click"}),n(b,window,{resize:"!resize"}),n(b,N.children(),{click:"tone.click"}),n(b,[r,o],{mousedown:"!mousedown"},i),n(b,o,{click:"button.click"}),n(b,i,{paste:"!paste"},i),n(b,i,["focus","blur"],function(){return b.stayFocused?!1:i}),n(b,r,{mousedown:"picker.mousedown",mouseup:"picker.mouseup",click:"picker.click",keyup:"picker.keyup",keydown:"picker.keydown",keypress:"picker.keypress"}),n(b,i,["mousedown","mouseup","click","keyup","keydown","keypress"]),n(b,r.find(".emoj-filter"),{click:"filter.click"}),n(b,c,{change:"source.change"}),d.search&&n(b,b.search,{keyup:"search.keypress",focus:"search.focus",blur:"search.blur"});var R=!1;if(M.on("scroll",function(){if(!R&&(E.call(b),M.is(":not(.skinnable)"))){var c=A.eq(0),d=M.offset().top;A.each(function(b,e){return a(e).offset().top-d>=10?!1:void(c=a(e))});var e=u.filter('[data-filter="'+c.attr("name")+'"]');e[0]&&!e.is(".active")&&(u.removeClass("active"),e.addClass("active"))}}),b.on("@filter.click",function(a){var c=a.is(".active");if(M.is(".skinnable")){if(c)return;N.children().eq(0).click()}R=!0,c||(u.filter(".active").removeClass("active"),a.addClass("active"));var d=A.filter('[name="'+a.data("filter")+'"]').offset().top,e=M.scrollTop(),f=M.offset().top;M.stop().animate({scrollTop:d+e-f-2},200,"swing",function(){E.call(b),R=!1})}).on("@picker.show",function(){b.recentEmojis&&I(b),E.call(b)}).on("@tone.click",function(a){N.children().removeClass("active");var c=a.addClass("active").data("skin");c?(M.addClass("skinnable"),L.hide().filter("[data-tone="+c+"]").show(),u.removeClass("active")):(M.removeClass("skinnable"),L.hide().filter("[data-tone=0]").show(),u.eq(0).click()),E.call(b),d.search&&b.trigger("search.keypress")}).on("@button.click",function(a){a.is(".active")?b.hidePicker():(b.showPicker(),b.searchSel=null)}).on("@!paste",function(c,d){var e=function(d){var e="caret-"+(new Date).getTime(),f=B(d,b);q(f),q('<i id="'+e+'"></i>'),c.scrollTop(h);var g=a("#"+e),i=g.offset().top-c.offset().top,j=c.height();(h+i>=j||h>i)&&c.scrollTop(h+i-2*j/3),g.remove(),b.stayFocused=!1,D.apply(b),m(b,"paste",[c,d,f])};if(d.originalEvent.clipboardData){var f=d.originalEvent.clipboardData.getData("text/plain");return e(f),d.preventDefault?d.preventDefault():d.stop(),d.returnValue=!1,d.stopPropagation(),!1}b.stayFocused=!0,q("<span>"+l+"</span>");var g=x(c[0]),h=c.scrollTop(),i=a("<div/>",{contenteditable:!0}).css({position:"fixed",left:"-999px",width:"1px",height:"1px",top:"20px",overflow:"hidden"}).appendTo(a("BODY")).focus();window.setTimeout(function(){c.focus(),y(c[0],g);var a=C(i.html().replace(/\r\n|\n|\r/g,"<br>"),b);i.remove(),e(a)},200)}).on("@emojibtn.click",function(a){i.removeClass("has-placeholder"),null!==b.searchSel&&(i.focus(),y(i[0],b.searchSel),b.searchSel=null),b.standalone?(i.html(p(a.data("name"),b.emojiTemplate)),b.trigger("blur")):(x(i[0]),q(p(a.data("name"),b.emojiTemplate))),b.recentEmojis&&J(b,a.data("name")),b.trigger("search.keypress")}).on("@!resize @keyup @emojibtn.click",D).on("@!mousedown",function(c,d){return a(d.target).hasClass("search")?(b.stayFocused=!0,null===b.searchSel&&(b.searchSel=x(c[0]))):(O.is(".focused")||c.focus(),d.preventDefault()),!1}).on("@change",function(){var a=b.editor.html().replace(/<\/?(?:div|span|p)[^>]*>/gi,"");a.length&&!/^<br[^>]*>$/i.test(a)||b.editor.html(b.content=""),c[g](b.getText())}).on("@source.change",function(){b.setText(c[g]()),m("change")}).on("@focus",function(){O.addClass("focused")}).on("@blur",function(){O.removeClass("focused"),d.hidePickerOnBlur&&b.hidePicker();var a=b.editor.html();b.content!==a?(b.content=a,m(b,"change",[b.editor]),c.blur().trigger("change")):c.blur(),d.search&&(b.search.val(""),b.trigger("search.keypress",!0))}),d.search&&b.on("@search.focus",function(){b.stayFocused=!0,b.search.addClass("focused")}).on("@search.keypress",function(c){var e=r.find(".emoj-filter"),f=d.tones?N.find("i.active").data("skin"):0,g=b.search.val().replace(/ /g,"_").replace(/"/g,'\\"');g&&g.length?(b.recentFilter.hasClass("active")&&b.recentFilter.removeClass("active").next().addClass("active"),b.recentCategory.hide(),b.recentFilter.hide(),L.each(function(){var b=function(a,b){var c=a.find('.emojibtn[data-name*="'+g+'"]');if(0===c.length)a.data("tone")===b&&a.hide(),e.filter('[data-filter="'+a.attr("name")+'"]').hide();else{var d=a.find('.emojibtn:not([data-name*="'+g+'"])');d.hide(),c.show(),a.data("tone")===b&&a.show(),e.filter('[data-filter="'+a.attr("name")+'"]').show()}},c=a(this);0===c.data("tone")?A.filter(':not([name="recent"])').each(function(){b(a(this),0)}):b(c,f)}),R?E.call(b):M.trigger("scroll")):(I(b,!0),L.filter('[data-tone="'+N.find("i.active").data("skin")+'"]:not([name="recent"])').show(),a(".emojibtn",L).show(),e.show(),c||E.call(b))}).on("@search.blur",function(){b.stayFocused=!1,b.search.removeClass("focused"),b.trigger("blur")}),d.shortcuts&&b.on("@keydown",function(a,c){c.ctrlKey||(9==c.which?(c.preventDefault(),o.click()):27==c.which&&(c.preventDefault(),o.is(".active")&&b.hidePicker()))}),s(d.events)&&!a.isEmptyObject(d.events)&&a.each(d.events,function(a,c){b.on(a.replace(/_/g,"."),c)}),d.autocomplete){var S=function(){var c={maxCount:d.textcomplete.maxCount,placement:d.textcomplete.placement};d.shortcuts&&(c.onKeydown=function(a,b){return a.ctrlKey||13!=a.which?void 0:b.KEY_ENTER});var f=a.map(e.emojioneList,function(a,b){return d.autocompleteTones?b:/_tone[12345]/.test(b)?null:b});f.sort(),i.textcomplete([{id:j,match:/\B(:[\-+\w]*)$/,search:function(b,c){c(a.map(f,function(a){return 0===a.indexOf(b)?a:null}))},template:function(a){return p(a,b.emojiTemplate)+" "+a.replace(/:/g,"")},replace:function(a){return p(a,b.emojiTemplate)},cache:!0,index:1}],c),d.textcomplete.placement&&"static"==a(i.data("textComplete").option.appendTo).css("position")&&a(i.data("textComplete").option.appendTo).css("position","relative")},T=function(){if(b.disabled){var a=function(){b.off("enabled",a),S()};b.on("enabled",a)}else S()};a.fn.textcomplete?T():a.ajax({url:"https://cdn.rawgit.com/yuku-t/jquery-textcomplete/v1.3.4/dist/jquery.textcomplete.js",dataType:"script",cache:!0,success:T})}b.inline&&(O.addClass(F("inline",!0)),b.on("@keydown",function(a,b){13==b.which&&b.preventDefault()})),/firefox/i.test(navigator.userAgent)&&document.execCommand("enableObjectResizing",!1,!1),b.isReady=!0,b.trigger("onLoad",i),b.trigger("ready",i)}var M={defaultBase:"https://cdnjs.cloudflare.com/ajax/libs/emojione/",defaultBase3:"https://cdn.jsdelivr.net/",base:null,isLoading:!1};function N(b){var c=r();if(b=w(b),!M.isLoading)if(!e||u(t(e))<2){M.isLoading=!0;var d;d=u(c)>5?M.defaultBase3+"npm/emojione@"+c:u(c)>4?M.defaultBase3+"emojione/"+c:M.defaultBase+"/"+c,a.ajax({url:d+"/lib/js/emojione.min.js",dataType:"script",cache:!0,success:function(){e=window.emojione,c=t(e),k=u(c);var d;k>4?(M.base=M.defaultBase3+"emojione/assets/"+c,d=M.base+"/sprites/emojione-sprite-"+e.emojiSize+".css"):(M.base=M.defaultBase+c+"/assets",d=M.base+"/sprites/emojione.sprites.css"),b.sprite&&(document.createStyleSheet?document.createStyleSheet(d):a("<link/>",{rel:"stylesheet",href:d}).appendTo("head"));while(f.length)f.shift().call();M.isLoading=!1}})}else c=t(e),k=u(c),k>4?M.base=M.defaultBase3+"emojione/assets/"+c:M.base=M.defaultBase+c+"/assets";g(function(){var a="";b.useInternalCDN&&(k>4&&(a=e.emojiSize+"/"),e.imagePathPNG=M.base+"/png/"+a,e.imagePathSVG=M.base+"/svg/"+a,e.imagePathSVGSprites=M.base+"/sprites/emojione.sprites.svg",e.imageType=b.imageType),u(c)>4?(z=e.regUnicode,e.imageType=b.imageType||"png"):z=new RegExp("<object[^>]*>.*?</object>|<span[^>]*>.*?</span>|<(?:object|embed|svg|img|div|span|p|a)[^>]*>|("+e.unicodeRegexp+")","gi")})}var O=function(a,e){var f=this;N(e),c[f.id=++b]={},d[f.id]={},g(function(){L(f,a,e)})};function P(b,c){c=c.replace(/^@/,"");var e=b.id;d[e][c]&&(a.each(d[e][c],function(d,e){a.each(a.isArray(e[0])?e[0]:[e[0]],function(d,f){a(f).on(e[1],function(){var d=i.call(arguments),f=a.isFunction(e[2])?e[2].apply(b,[c].concat(d)):e[2];f&&m(b,c,[f].concat(d))})})}),d[e][c]=null)}O.prototype.on=function(b,d){if(b&&a.isFunction(d)){var e=this;a.each(b.toLowerCase().split(" "),function(a,b){P(e,b),(c[e.id][b]||(c[e.id][b]=[])).push(d)})}return this},O.prototype.off=function(b,d){if(b){var e=this.id;a.each(b.toLowerCase().replace(/_/g,".").split(" "),function(b,f){c[e][f]&&!/^@/.test(f)&&(d?a.each(c[e][f],function(a,b){b===d&&(c[e][f]=c[e][f].splice(a,1))}):c[e][f]=[])})}return this},O.prototype.trigger=function(){var a=i.call(arguments),b=[this].concat(a.slice(0,1));return b.push(a.slice(1)),m.apply(this,b)},O.prototype.setFocus=function(){var a=this;return g(function(){a.editor.focus()}),a},O.prototype.setText=function(a){var b=this;return g(function(){b.editor.html(B(a,b)),b.content=b.editor.html(),m(b,"change",[b.editor]),D.apply(b)}),b},O.prototype.getText=function(){return C(this.editor.html(),this)},O.prototype.showPicker=function(){var a=this;return a._sh_timer&&window.clearTimeout(a._sh_timer),a.picker.removeClass("hidden"),a._sh_timer=window.setTimeout(function(){a.button.addClass("active")},50),m(a,"picker.show",[a.picker]),a},O.prototype.hidePicker=function(){var a=this;return a._sh_timer&&window.clearTimeout(a._sh_timer),a.button.removeClass("active"),a._sh_timer=window.setTimeout(function(){a.picker.addClass("hidden")},500),m(a,"picker.hide",[a.picker]),a},O.prototype.enable=function(){var a=this,b=function(){a.disabled=!1,a.editor.prop("contenteditable",!0),a.button.show();var b=a[a.standalone?"button":"editor"];b.parent().removeClass("emoj-disable"),m(a,"enabled",[b])};return a.isReady?b():a.on("ready",b),a},O.prototype.disable=function(){var a=this;a.disabled=!0;var b=function(){a.editor.prop("contenteditable",!1),a.hidePicker(),a.button.hide();var b=a[a.standalone?"button":"editor"];b.parent().addClass("emoj-disable"),m(a,"disabled",[b])};return a.isReady?b():a.on("ready",b),a},a.fn.emojioneArea=function(b){return this.each(function(){return this.emojioneArea?this.emojioneArea:(a.data(this,"emojioneArea",this.emojioneArea=new O(a(this),b)),this.emojioneArea)})},a.fn.emojioneArea.defaults=v(),a.fn.emojioneAreaText=function(b){b=w(b);var c=this,d={shortnames:b&&"undefined"!=typeof b.shortnames?b.shortnames:!0,emojiTemplate:'<img alt="{alt}" class="emojione'+(b&&b.sprite&&3>k?'-{uni}" src="'+h:'emoji" src="{img}')+'"/>'};return N(b),g(function(){c.each(function(){var b=a(this);return b.hasClass("emoj-text")||b.addClass("emoj-text").html(B(b.is("TEXTAREA")||b.is("INPUT")?b.val():b.text(),d)),b})}),this}},window);
/**
 * Owl Carousel v2.2.1
 * Copyright 2013-2017 David Deutsch
 * Licensed under  ()
 */
/**
 * Owl carousel
 * @version 2.1.6
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 * @todo Lazy Load Icon
 * @todo prevent animationend bubling
 * @todo itemsScaleUp
 * @todo Test Zepto
 * @todo stagePadding calculate wrong active classes
 */
;(function($, window, document, undefined) {

	/**
	 * Creates a carousel.
	 * @class The Owl Carousel.
	 * @public
	 * @param {HTMLElement|jQuery} element - The element to create the carousel for.
	 * @param {Object} [options] - The options
	 */
	function Owl(element, options) {

		/**
		 * Current settings for the carousel.
		 * @public
		 */
		this.settings = null;

		/**
		 * Current options set by the caller including defaults.
		 * @public
		 */
		this.options = $.extend({}, Owl.Defaults, options);

		/**
		 * Plugin element.
		 * @public
		 */
		this.$element = $(element);

		/**
		 * Proxied event handlers.
		 * @protected
		 */
		this._handlers = {};

		/**
		 * References to the running plugins of this carousel.
		 * @protected
		 */
		this._plugins = {};

		/**
		 * Currently suppressed events to prevent them from beeing retriggered.
		 * @protected
		 */
		this._supress = {};

		/**
		 * Absolute current position.
		 * @protected
		 */
		this._current = null;

		/**
		 * Animation speed in milliseconds.
		 * @protected
		 */
		this._speed = null;

		/**
		 * Coordinates of all items in pixel.
		 * @todo The name of this member is missleading.
		 * @protected
		 */
		this._coordinates = [];

		/**
		 * Current breakpoint.
		 * @todo Real media queries would be nice.
		 * @protected
		 */
		this._breakpoint = null;

		/**
		 * Current width of the plugin element.
		 */
		this._width = null;

		/**
		 * All real items.
		 * @protected
		 */
		this._items = [];

		/**
		 * All cloned items.
		 * @protected
		 */
		this._clones = [];

		/**
		 * Merge values of all items.
		 * @todo Maybe this could be part of a plugin.
		 * @protected
		 */
		this._mergers = [];

		/**
		 * Widths of all items.
		 */
		this._widths = [];

		/**
		 * Invalidated parts within the update process.
		 * @protected
		 */
		this._invalidated = {};

		/**
		 * Ordered list of workers for the update process.
		 * @protected
		 */
		this._pipe = [];

		/**
		 * Current state information for the drag operation.
		 * @todo #261
		 * @protected
		 */
		this._drag = {
			time: null,
			target: null,
			pointer: null,
			stage: {
				start: null,
				current: null
			},
			direction: null
		};

		/**
		 * Current state information and their tags.
		 * @type {Object}
		 * @protected
		 */
		this._states = {
			current: {},
			tags: {
				'initializing': [ 'busy' ],
				'animating': [ 'busy' ],
				'dragging': [ 'interacting' ]
			}
		};

		$.each([ 'onResize', 'onThrottledResize' ], $.proxy(function(i, handler) {
			this._handlers[handler] = $.proxy(this[handler], this);
		}, this));

		$.each(Owl.Plugins, $.proxy(function(key, plugin) {
			this._plugins[key.charAt(0).toLowerCase() + key.slice(1)]
				= new plugin(this);
		}, this));

		$.each(Owl.Workers, $.proxy(function(priority, worker) {
			this._pipe.push({
				'filter': worker.filter,
				'run': $.proxy(worker.run, this)
			});
		}, this));

		this.setup();
		this.initialize();
	}

	/**
	 * Default options for the carousel.
	 * @public
	 */
	Owl.Defaults = {
		items: 3,
		loop: false,
		center: false,
		rewind: false,

		mouseDrag: true,
		touchDrag: true,
		pullDrag: true,
		freeDrag: false,

		margin: 0,
		stagePadding: 0,

		merge: false,
		mergeFit: true,
		autoWidth: false,

		startPosition: 0,
		rtl: false,

		smartSpeed: 250,
		fluidSpeed: false,
		dragEndSpeed: false,

		responsive: {},
		responsiveRefreshRate: 200,
		responsiveBaseElement: window,

		fallbackEasing: 'swing',

		info: false,

		nestedItemSelector: false,
		itemElement: 'div',
		stageElement: 'div',

		refreshClass: 'owl-refresh',
		loadedClass: 'owl-loaded',
		loadingClass: 'owl-loading',
		rtlClass: 'owl-rtl',
		responsiveClass: 'owl-responsive',
		dragClass: 'owl-drag',
		itemClass: 'owl-item',
		stageClass: 'owl-stage',
		stageOuterClass: 'owl-stage-outer',
		grabClass: 'owl-grab'
	};

	/**
	 * Enumeration for width.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Width = {
		Default: 'default',
		Inner: 'inner',
		Outer: 'outer'
	};

	/**
	 * Enumeration for types.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Type = {
		Event: 'event',
		State: 'state'
	};

	/**
	 * Contains all registered plugins.
	 * @public
	 */
	Owl.Plugins = {};

	/**
	 * List of workers involved in the update process.
	 */
	Owl.Workers = [ {
		filter: [ 'width', 'settings' ],
		run: function() {
			this._width = this.$element.width();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = this._items && this._items[this.relative(this._current)];
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			this.$stage.children('.cloned').remove();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var margin = this.settings.margin || '',
				grid = !this.settings.autoWidth,
				rtl = this.settings.rtl,
				css = {
					'width': 'auto',
					'margin-left': rtl ? margin : '',
					'margin-right': rtl ? '' : margin
				};

			!grid && this.$stage.children().css(css);

			cache.css = css;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var width = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
				merge = null,
				iterator = this._items.length,
				grid = !this.settings.autoWidth,
				widths = [];

			cache.items = {
				merge: false,
				width: width
			};

			while (iterator--) {
				merge = this._mergers[iterator];
				merge = this.settings.mergeFit && Math.min(merge, this.settings.items) || merge;

				cache.items.merge = merge > 1 || cache.items.merge;

				widths[iterator] = !grid ? this._items[iterator].width() : width * merge;
			}

			this._widths = widths;
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			var clones = [],
				items = this._items,
				settings = this.settings,
				// TODO: Should be computed from number of min width items in stage
				view = Math.max(settings.items * 2, 4),
				size = Math.ceil(items.length / 2) * 2,
				repeat = settings.loop && items.length ? settings.rewind ? view : Math.max(view, size) : 0,
				append = '',
				prepend = '';

			repeat /= 2;

			while (repeat--) {
				// Switch to only using appended clones
				clones.push(this.normalize(clones.length / 2, true));
				append = append + items[clones[clones.length - 1]][0].outerHTML;
				clones.push(this.normalize(items.length - 1 - (clones.length - 1) / 2, true));
				prepend = items[clones[clones.length - 1]][0].outerHTML + prepend;
			}

			this._clones = clones;

			$(append).addClass('cloned').appendTo(this.$stage);
			$(prepend).addClass('cloned').prependTo(this.$stage);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				size = this._clones.length + this._items.length,
				iterator = -1,
				previous = 0,
				current = 0,
				coordinates = [];

			while (++iterator < size) {
				previous = coordinates[iterator - 1] || 0;
				current = this._widths[this.relative(iterator)] + this.settings.margin;
				coordinates.push(previous + current * rtl);
			}

			this._coordinates = coordinates;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var padding = this.settings.stagePadding,
				coordinates = this._coordinates,
				css = {
					'width': Math.ceil(Math.abs(coordinates[coordinates.length - 1])) + padding * 2,
					'padding-left': padding || '',
					'padding-right': padding || ''
				};

			this.$stage.css(css);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var iterator = this._coordinates.length,
				grid = !this.settings.autoWidth,
				items = this.$stage.children();

			if (grid && cache.items.merge) {
				while (iterator--) {
					cache.css.width = this._widths[this.relative(iterator)];
					items.eq(iterator).css(cache.css);
				}
			} else if (grid) {
				cache.css.width = cache.items.width;
				items.css(cache.css);
			}
		}
	}, {
		filter: [ 'items' ],
		run: function() {
			this._coordinates.length < 1 && this.$stage.removeAttr('style');
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = cache.current ? this.$stage.children().index(cache.current) : 0;
			cache.current = Math.max(this.minimum(), Math.min(this.maximum(), cache.current));
			this.reset(cache.current);
		}
	}, {
		filter: [ 'position' ],
		run: function() {
			this.animate(this.coordinates(this._current));
		}
	}, {
		filter: [ 'width', 'position', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				padding = this.settings.stagePadding * 2,
				begin = this.coordinates(this.current()) + padding,
				end = begin + this.width() * rtl,
				inner, outer, matches = [], i, n;

			for (i = 0, n = this._coordinates.length; i < n; i++) {
				inner = this._coordinates[i - 1] || 0;
				outer = Math.abs(this._coordinates[i]) + padding * rtl;

				if ((this.op(inner, '<=', begin) && (this.op(inner, '>', end)))
					|| (this.op(outer, '<', begin) && this.op(outer, '>', end))) {
					matches.push(i);
				}
			}

			this.$stage.children('.active').removeClass('active');
			this.$stage.children(':eq(' + matches.join('), :eq(') + ')').addClass('active');

			if (this.settings.center) {
				this.$stage.children('.center').removeClass('center');
				this.$stage.children().eq(this.current()).addClass('center');
			}
		}
	} ];

	/**
	 * Initializes the carousel.
	 * @protected
	 */
	Owl.prototype.initialize = function() {
		this.enter('initializing');
		this.trigger('initialize');

		this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl);

		if (this.settings.autoWidth && !this.is('pre-loading')) {
			var imgs, nestedSelector, width;
			imgs = this.$element.find('img');
			nestedSelector = this.settings.nestedItemSelector ? '.' + this.settings.nestedItemSelector : undefined;
			width = this.$element.children(nestedSelector).width();

			if (imgs.length && width <= 0) {
				this.preloadAutoWidthImages(imgs);
			}
		}

		this.$element.addClass(this.options.loadingClass);

		// create stage
		this.$stage = $('<' + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>')
			.wrap('<div class="' + this.settings.stageOuterClass + '"/>');

		// append stage
		this.$element.append(this.$stage.parent());

		// append content
		this.replace(this.$element.children().not(this.$stage.parent()));

		// check visibility
		if (this.$element.is(':visible')) {
			// update view
			this.refresh();
		} else {
			// invalidate width
			this.invalidate('width');
		}

		this.$element
			.removeClass(this.options.loadingClass)
			.addClass(this.options.loadedClass);

		// register event handlers
		this.registerEventHandlers();

		this.leave('initializing');
		this.trigger('initialized');
	};

	/**
	 * Setups the current settings.
	 * @todo Remove responsive classes. Why should adaptive designs be brought into IE8?
	 * @todo Support for media queries by using `matchMedia` would be nice.
	 * @public
	 */
	Owl.prototype.setup = function() {
		var viewport = this.viewport(),
			overwrites = this.options.responsive,
			match = -1,
			settings = null;

		if (!overwrites) {
			settings = $.extend({}, this.options);
		} else {
			$.each(overwrites, function(breakpoint) {
				if (breakpoint <= viewport && breakpoint > match) {
					match = Number(breakpoint);
				}
			});

			settings = $.extend({}, this.options, overwrites[match]);
			if (typeof settings.stagePadding === 'function') {
				settings.stagePadding = settings.stagePadding();
			}
			delete settings.responsive;

			// responsive class
			if (settings.responsiveClass) {
				this.$element.attr('class',
					this.$element.attr('class').replace(new RegExp('(' + this.options.responsiveClass + '-)\\S+\\s', 'g'), '$1' + match)
				);
			}
		}

		this.trigger('change', { property: { name: 'settings', value: settings } });
		this._breakpoint = match;
		this.settings = settings;
		this.invalidate('settings');
		this.trigger('changed', { property: { name: 'settings', value: this.settings } });
	};

	/**
	 * Updates option logic if necessery.
	 * @protected
	 */
	Owl.prototype.optionsLogic = function() {
		if (this.settings.autoWidth) {
			this.settings.stagePadding = false;
			this.settings.merge = false;
		}
	};

	/**
	 * Prepares an item before add.
	 * @todo Rename event parameter `content` to `item`.
	 * @protected
	 * @returns {jQuery|HTMLElement} - The item container.
	 */
	Owl.prototype.prepare = function(item) {
		var event = this.trigger('prepare', { content: item });

		if (!event.data) {
			event.data = $('<' + this.settings.itemElement + '/>')
				.addClass(this.options.itemClass).append(item)
		}

		this.trigger('prepared', { content: event.data });

		return event.data;
	};

	/**
	 * Updates the view.
	 * @public
	 */
	Owl.prototype.update = function() {
		var i = 0,
			n = this._pipe.length,
			filter = $.proxy(function(p) { return this[p] }, this._invalidated),
			cache = {};

		while (i < n) {
			if (this._invalidated.all || $.grep(this._pipe[i].filter, filter).length > 0) {
				this._pipe[i].run(cache);
			}
			i++;
		}

		this._invalidated = {};

		!this.is('valid') && this.enter('valid');
	};

	/**
	 * Gets the width of the view.
	 * @public
	 * @param {Owl.Width} [dimension=Owl.Width.Default] - The dimension to return.
	 * @returns {Number} - The width of the view in pixel.
	 */
	Owl.prototype.width = function(dimension) {
		dimension = dimension || Owl.Width.Default;
		switch (dimension) {
			case Owl.Width.Inner:
			case Owl.Width.Outer:
				return this._width;
			default:
				return this._width - this.settings.stagePadding * 2 + this.settings.margin;
		}
	};

	/**
	 * Refreshes the carousel primarily for adaptive purposes.
	 * @public
	 */
	Owl.prototype.refresh = function() {
		this.enter('refreshing');
		this.trigger('refresh');

		this.setup();

		this.optionsLogic();

		this.$element.addClass(this.options.refreshClass);

		this.update();

		this.$element.removeClass(this.options.refreshClass);

		this.leave('refreshing');
		this.trigger('refreshed');
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onThrottledResize = function() {
		window.clearTimeout(this.resizeTimer);
		this.resizeTimer = window.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate);
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onResize = function() {
		if (!this._items.length) {
			return false;
		}

		if (this._width === this.$element.width()) {
			return false;
		}

		if (!this.$element.is(':visible')) {
			return false;
		}

		this.enter('resizing');

		if (this.trigger('resize').isDefaultPrevented()) {
			this.leave('resizing');
			return false;
		}

		this.invalidate('width');

		this.refresh();

		this.leave('resizing');
		this.trigger('resized');
	};

	/**
	 * Registers event handlers.
	 * @todo Check `msPointerEnabled`
	 * @todo #261
	 * @protected
	 */
	Owl.prototype.registerEventHandlers = function() {
		if ($.support.transition) {
			this.$stage.on($.support.transition.end + '.owl.core', $.proxy(this.onTransitionEnd, this));
		}

		if (this.settings.responsive !== false) {
			this.on(window, 'resize', this._handlers.onThrottledResize);
		}

		if (this.settings.mouseDrag) {
			this.$element.addClass(this.options.dragClass);
			this.$stage.on('mousedown.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('dragstart.owl.core selectstart.owl.core', function() { return false });
		}

		if (this.settings.touchDrag){
			this.$stage.on('touchstart.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('touchcancel.owl.core', $.proxy(this.onDragEnd, this));
		}
	};

	/**
	 * Handles `touchstart` and `mousedown` events.
	 * @todo Horizontal swipe threshold as option
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragStart = function(event) {
		var stage = null;

		if (event.which === 3) {
			return;
		}

		if ($.support.transform) {
			stage = this.$stage.css('transform').replace(/.*\(|\)| /g, '').split(',');
			stage = {
				x: stage[stage.length === 16 ? 12 : 4],
				y: stage[stage.length === 16 ? 13 : 5]
			};
		} else {
			stage = this.$stage.position();
			stage = {
				x: this.settings.rtl ?
					stage.left + this.$stage.width() - this.width() + this.settings.margin :
					stage.left,
				y: stage.top
			};
		}

		if (this.is('animating')) {
			$.support.transform ? this.animate(stage.x) : this.$stage.stop()
			this.invalidate('position');
		}

		this.$element.toggleClass(this.options.grabClass, event.type === 'mousedown');

		this.speed(0);

		this._drag.time = new Date().getTime();
		this._drag.target = $(event.target);
		this._drag.stage.start = stage;
		this._drag.stage.current = stage;
		this._drag.pointer = this.pointer(event);

		$(document).on('mouseup.owl.core touchend.owl.core', $.proxy(this.onDragEnd, this));

		$(document).one('mousemove.owl.core touchmove.owl.core', $.proxy(function(event) {
			var delta = this.difference(this._drag.pointer, this.pointer(event));

			$(document).on('mousemove.owl.core touchmove.owl.core', $.proxy(this.onDragMove, this));

			if (Math.abs(delta.x) < Math.abs(delta.y) && this.is('valid')) {
				return;
			}

			event.preventDefault();

			this.enter('dragging');
			this.trigger('drag');
		}, this));
	};

	/**
	 * Handles the `touchmove` and `mousemove` events.
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragMove = function(event) {
		var minimum = null,
			maximum = null,
			pull = null,
			delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this.difference(this._drag.stage.start, delta);

		if (!this.is('dragging')) {
			return;
		}

		event.preventDefault();

		if (this.settings.loop) {
			minimum = this.coordinates(this.minimum());
			maximum = this.coordinates(this.maximum() + 1) - minimum;
			stage.x = (((stage.x - minimum) % maximum + maximum) % maximum) + minimum;
		} else {
			minimum = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum());
			maximum = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum());
			pull = this.settings.pullDrag ? -1 * delta.x / 5 : 0;
			stage.x = Math.max(Math.min(stage.x, minimum + pull), maximum + pull);
		}

		this._drag.stage.current = stage;

		this.animate(stage.x);
	};

	/**
	 * Handles the `touchend` and `mouseup` events.
	 * @todo #261
	 * @todo Threshold for click event
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragEnd = function(event) {
		var delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this._drag.stage.current,
			direction = delta.x > 0 ^ this.settings.rtl ? 'left' : 'right';

		$(document).off('.owl.core');

		this.$element.removeClass(this.options.grabClass);

		if (delta.x !== 0 && this.is('dragging') || !this.is('valid')) {
			this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed);
			this.current(this.closest(stage.x, delta.x !== 0 ? direction : this._drag.direction));
			this.invalidate('position');
			this.update();

			this._drag.direction = direction;

			if (Math.abs(delta.x) > 3 || new Date().getTime() - this._drag.time > 300) {
				this._drag.target.one('click.owl.core', function() { return false; });
			}
		}

		if (!this.is('dragging')) {
			return;
		}

		this.leave('dragging');
		this.trigger('dragged');
	};

	/**
	 * Gets absolute position of the closest item for a coordinate.
	 * @todo Setting `freeDrag` makes `closest` not reusable. See #165.
	 * @protected
	 * @param {Number} coordinate - The coordinate in pixel.
	 * @param {String} direction - The direction to check for the closest item. Ether `left` or `right`.
	 * @return {Number} - The absolute position of the closest item.
	 */
	Owl.prototype.closest = function(coordinate, direction) {
		var position = -1,
			pull = 30,
			width = this.width(),
			coordinates = this.coordinates();

		if (!this.settings.freeDrag) {
			// check closest item
			$.each(coordinates, $.proxy(function(index, value) {
				// on a left pull, check on current index
				if (direction === 'left' && coordinate > value - pull && coordinate < value + pull) {
					position = index;
				// on a right pull, check on previous index
				// to do so, subtract width from value and set position = index + 1
				} else if (direction === 'right' && coordinate > value - width - pull && coordinate < value - width + pull) {
					position = index + 1;
				} else if (this.op(coordinate, '<', value)
					&& this.op(coordinate, '>', coordinates[index + 1] || value - width)) {
					position = direction === 'left' ? index + 1 : index;
				}
				return position === -1;
			}, this));
		}

		if (!this.settings.loop) {
			// non loop boundries
			if (this.op(coordinate, '>', coordinates[this.minimum()])) {
				position = coordinate = this.minimum();
			} else if (this.op(coordinate, '<', coordinates[this.maximum()])) {
				position = coordinate = this.maximum();
			}
		}

		return position;
	};

	/**
	 * Animates the stage.
	 * @todo #270
	 * @public
	 * @param {Number} coordinate - The coordinate in pixels.
	 */
	Owl.prototype.animate = function(coordinate) {
		var animate = this.speed() > 0;

		this.is('animating') && this.onTransitionEnd();

		if (animate) {
			this.enter('animating');
			this.trigger('translate');
		}

		if ($.support.transform3d && $.support.transition) {
			this.$stage.css({
				transform: 'translate3d(' + coordinate + 'px,0px,0px)',
				transition: (this.speed() / 1000) + 's'
			});
		} else if (animate) {
			this.$stage.animate({
				left: coordinate + 'px'
			}, this.speed(), this.settings.fallbackEasing, $.proxy(this.onTransitionEnd, this));
		} else {
			this.$stage.css({
				left: coordinate + 'px'
			});
		}
	};

	/**
	 * Checks whether the carousel is in a specific state or not.
	 * @param {String} state - The state to check.
	 * @returns {Boolean} - The flag which indicates if the carousel is busy.
	 */
	Owl.prototype.is = function(state) {
		return this._states.current[state] && this._states.current[state] > 0;
	};

	/**
	 * Sets the absolute position of the current item.
	 * @public
	 * @param {Number} [position] - The new absolute position or nothing to leave it unchanged.
	 * @returns {Number} - The absolute position of the current item.
	 */
	Owl.prototype.current = function(position) {
		if (position === undefined) {
			return this._current;
		}

		if (this._items.length === 0) {
			return undefined;
		}

		position = this.normalize(position);

		if (this._current !== position) {
			var event = this.trigger('change', { property: { name: 'position', value: position } });

			if (event.data !== undefined) {
				position = this.normalize(event.data);
			}

			this._current = position;

			this.invalidate('position');

			this.trigger('changed', { property: { name: 'position', value: this._current } });
		}

		return this._current;
	};

	/**
	 * Invalidates the given part of the update routine.
	 * @param {String} [part] - The part to invalidate.
	 * @returns {Array.<String>} - The invalidated parts.
	 */
	Owl.prototype.invalidate = function(part) {
		if ($.type(part) === 'string') {
			this._invalidated[part] = true;
			this.is('valid') && this.leave('valid');
		}
		return $.map(this._invalidated, function(v, i) { return i });
	};

	/**
	 * Resets the absolute position of the current item.
	 * @public
	 * @param {Number} position - The absolute position of the new item.
	 */
	Owl.prototype.reset = function(position) {
		position = this.normalize(position);

		if (position === undefined) {
			return;
		}

		this._speed = 0;
		this._current = position;

		this.suppress([ 'translate', 'translated' ]);

		this.animate(this.coordinates(position));

		this.release([ 'translate', 'translated' ]);
	};

	/**
	 * Normalizes an absolute or a relative position of an item.
	 * @public
	 * @param {Number} position - The absolute or relative position to normalize.
	 * @param {Boolean} [relative=false] - Whether the given position is relative or not.
	 * @returns {Number} - The normalized position.
	 */
	Owl.prototype.normalize = function(position, relative) {
		var n = this._items.length,
			m = relative ? 0 : this._clones.length;

		if (!this.isNumeric(position) || n < 1) {
			position = undefined;
		} else if (position < 0 || position >= n + m) {
			position = ((position - m / 2) % n + n) % n + m / 2;
		}

		return position;
	};

	/**
	 * Converts an absolute position of an item into a relative one.
	 * @public
	 * @param {Number} position - The absolute position to convert.
	 * @returns {Number} - The converted position.
	 */
	Owl.prototype.relative = function(position) {
		position -= this._clones.length / 2;
		return this.normalize(position, true);
	};

	/**
	 * Gets the maximum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.maximum = function(relative) {
		var settings = this.settings,
			maximum = this._coordinates.length,
			iterator,
			reciprocalItemsWidth,
			elementWidth;

		if (settings.loop) {
			maximum = this._clones.length / 2 + this._items.length - 1;
		} else if (settings.autoWidth || settings.merge) {
			iterator = this._items.length;
			reciprocalItemsWidth = this._items[--iterator].width();
			elementWidth = this.$element.width();
			while (iterator--) {
				reciprocalItemsWidth += this._items[iterator].width() + this.settings.margin;
				if (reciprocalItemsWidth > elementWidth) {
					break;
				}
			}
			maximum = iterator + 1;
		} else if (settings.center) {
			maximum = this._items.length - 1;
		} else {
			maximum = this._items.length - settings.items;
		}

		if (relative) {
			maximum -= this._clones.length / 2;
		}

		return Math.max(maximum, 0);
	};

	/**
	 * Gets the minimum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.minimum = function(relative) {
		return relative ? 0 : this._clones.length / 2;
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.items = function(position) {
		if (position === undefined) {
			return this._items.slice();
		}

		position = this.normalize(position, true);
		return this._items[position];
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.mergers = function(position) {
		if (position === undefined) {
			return this._mergers.slice();
		}

		position = this.normalize(position, true);
		return this._mergers[position];
	};

	/**
	 * Gets the absolute positions of clones for an item.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @returns {Array.<Number>} - The absolute positions of clones for the item or all if no position was given.
	 */
	Owl.prototype.clones = function(position) {
		var odd = this._clones.length / 2,
			even = odd + this._items.length,
			map = function(index) { return index % 2 === 0 ? even + index / 2 : odd - (index + 1) / 2 };

		if (position === undefined) {
			return $.map(this._clones, function(v, i) { return map(i) });
		}

		return $.map(this._clones, function(v, i) { return v === position ? map(i) : null });
	};

	/**
	 * Sets the current animation speed.
	 * @public
	 * @param {Number} [speed] - The animation speed in milliseconds or nothing to leave it unchanged.
	 * @returns {Number} - The current animation speed in milliseconds.
	 */
	Owl.prototype.speed = function(speed) {
		if (speed !== undefined) {
			this._speed = speed;
		}

		return this._speed;
	};

	/**
	 * Gets the coordinate of an item.
	 * @todo The name of this method is missleanding.
	 * @public
	 * @param {Number} position - The absolute position of the item within `minimum()` and `maximum()`.
	 * @returns {Number|Array.<Number>} - The coordinate of the item in pixel or all coordinates.
	 */
	Owl.prototype.coordinates = function(position) {
		var multiplier = 1,
			newPosition = position - 1,
			coordinate;

		if (position === undefined) {
			return $.map(this._coordinates, $.proxy(function(coordinate, index) {
				return this.coordinates(index);
			}, this));
		}

		if (this.settings.center) {
			if (this.settings.rtl) {
				multiplier = -1;
				newPosition = position + 1;
			}

			coordinate = this._coordinates[position];
			coordinate += (this.width() - coordinate + (this._coordinates[newPosition] || 0)) / 2 * multiplier;
		} else {
			coordinate = this._coordinates[newPosition] || 0;
		}

		coordinate = Math.ceil(coordinate);

		return coordinate;
	};

	/**
	 * Calculates the speed for a translation.
	 * @protected
	 * @param {Number} from - The absolute position of the start item.
	 * @param {Number} to - The absolute position of the target item.
	 * @param {Number} [factor=undefined] - The time factor in milliseconds.
	 * @returns {Number} - The time in milliseconds for the translation.
	 */
	Owl.prototype.duration = function(from, to, factor) {
		if (factor === 0) {
			return 0;
		}

		return Math.min(Math.max(Math.abs(to - from), 1), 6) * Math.abs((factor || this.settings.smartSpeed));
	};

	/**
	 * Slides to the specified item.
	 * @public
	 * @param {Number} position - The position of the item.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.to = function(position, speed) {
		var current = this.current(),
			revert = null,
			distance = position - this.relative(current),
			direction = (distance > 0) - (distance < 0),
			items = this._items.length,
			minimum = this.minimum(),
			maximum = this.maximum();

		if (this.settings.loop) {
			if (!this.settings.rewind && Math.abs(distance) > items / 2) {
				distance += direction * -1 * items;
			}

			position = current + distance;
			revert = ((position - minimum) % items + items) % items + minimum;

			if (revert !== position && revert - distance <= maximum && revert - distance > 0) {
				current = revert - distance;
				position = revert;
				this.reset(current);
			}
		} else if (this.settings.rewind) {
			maximum += 1;
			position = (position % maximum + maximum) % maximum;
		} else {
			position = Math.max(minimum, Math.min(maximum, position));
		}

		this.speed(this.duration(current, position, speed));
		this.current(position);

		if (this.$element.is(':visible')) {
			this.update();
		}
	};

	/**
	 * Slides to the next item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.next = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) + 1, speed);
	};

	/**
	 * Slides to the previous item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.prev = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) - 1, speed);
	};

	/**
	 * Handles the end of an animation.
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onTransitionEnd = function(event) {

		// if css2 animation then event object is undefined
		if (event !== undefined) {
			event.stopPropagation();

			// Catch only owl-stage transitionEnd event
			if ((event.target || event.srcElement || event.originalTarget) !== this.$stage.get(0)) {
				return false;
			}
		}

		this.leave('animating');
		this.trigger('translated');
	};

	/**
	 * Gets viewport width.
	 * @protected
	 * @return {Number} - The width in pixel.
	 */
	Owl.prototype.viewport = function() {
		var width;
		if (this.options.responsiveBaseElement !== window) {
			width = $(this.options.responsiveBaseElement).width();
		} else if (window.innerWidth) {
			width = window.innerWidth;
		} else if (document.documentElement && document.documentElement.clientWidth) {
			width = document.documentElement.clientWidth;
		} else {
			console.warn('Can not detect viewport width.');
		}
		return width;
	};

	/**
	 * Replaces the current content.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The new content.
	 */
	Owl.prototype.replace = function(content) {
		this.$stage.empty();
		this._items = [];

		if (content) {
			content = (content instanceof jQuery) ? content : $(content);
		}

		if (this.settings.nestedItemSelector) {
			content = content.find('.' + this.settings.nestedItemSelector);
		}

		content.filter(function() {
			return this.nodeType === 1;
		}).each($.proxy(function(index, item) {
			item = this.prepare(item);
			this.$stage.append(item);
			this._items.push(item);
			this._mergers.push(item.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}, this));

		this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0);

		this.invalidate('items');
	};

	/**
	 * Adds an item.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The item content to add.
	 * @param {Number} [position] - The relative position at which to insert the item otherwise the item will be added to the end.
	 */
	Owl.prototype.add = function(content, position) {
		var current = this.relative(this._current);

		position = position === undefined ? this._items.length : this.normalize(position, true);
		content = content instanceof jQuery ? content : $(content);

		this.trigger('add', { content: content, position: position });

		content = this.prepare(content);

		if (this._items.length === 0 || position === this._items.length) {
			this._items.length === 0 && this.$stage.append(content);
			this._items.length !== 0 && this._items[position - 1].after(content);
			this._items.push(content);
			this._mergers.push(content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		} else {
			this._items[position].before(content);
			this._items.splice(position, 0, content);
			this._mergers.splice(position, 0, content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}

		this._items[current] && this.reset(this._items[current].index());

		this.invalidate('items');

		this.trigger('added', { content: content, position: position });
	};

	/**
	 * Removes an item by its position.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {Number} position - The relative position of the item to remove.
	 */
	Owl.prototype.remove = function(position) {
		position = this.normalize(position, true);

		if (position === undefined) {
			return;
		}

		this.trigger('remove', { content: this._items[position], position: position });

		this._items[position].remove();
		this._items.splice(position, 1);
		this._mergers.splice(position, 1);

		this.invalidate('items');

		this.trigger('removed', { content: null, position: position });
	};

	/**
	 * Preloads images with auto width.
	 * @todo Replace by a more generic approach
	 * @protected
	 */
	Owl.prototype.preloadAutoWidthImages = function(images) {
		images.each($.proxy(function(i, element) {
			this.enter('pre-loading');
			element = $(element);
			$(new Image()).one('load', $.proxy(function(e) {
				element.attr('src', e.target.src);
				element.css('opacity', 1);
				this.leave('pre-loading');
				!this.is('pre-loading') && !this.is('initializing') && this.refresh();
			}, this)).attr('src', element.attr('src') || element.attr('data-src') || element.attr('data-src-retina'));
		}, this));
	};

	/**
	 * Destroys the carousel.
	 * @public
	 */
	Owl.prototype.destroy = function() {

		this.$element.off('.owl.core');
		this.$stage.off('.owl.core');
		$(document).off('.owl.core');

		if (this.settings.responsive !== false) {
			window.clearTimeout(this.resizeTimer);
			this.off(window, 'resize', this._handlers.onThrottledResize);
		}

		for (var i in this._plugins) {
			this._plugins[i].destroy();
		}

		this.$stage.children('.cloned').remove();

		this.$stage.unwrap();
		this.$stage.children().contents().unwrap();
		this.$stage.children().unwrap();

		this.$element
			.removeClass(this.options.refreshClass)
			.removeClass(this.options.loadingClass)
			.removeClass(this.options.loadedClass)
			.removeClass(this.options.rtlClass)
			.removeClass(this.options.dragClass)
			.removeClass(this.options.grabClass)
			.attr('class', this.$element.attr('class').replace(new RegExp(this.options.responsiveClass + '-\\S+\\s', 'g'), ''))
			.removeData('owl.carousel');
	};

	/**
	 * Operators to calculate right-to-left and left-to-right.
	 * @protected
	 * @param {Number} [a] - The left side operand.
	 * @param {String} [o] - The operator.
	 * @param {Number} [b] - The right side operand.
	 */
	Owl.prototype.op = function(a, o, b) {
		var rtl = this.settings.rtl;
		switch (o) {
			case '<':
				return rtl ? a > b : a < b;
			case '>':
				return rtl ? a < b : a > b;
			case '>=':
				return rtl ? a <= b : a >= b;
			case '<=':
				return rtl ? a >= b : a <= b;
			default:
				break;
		}
	};

	/**
	 * Attaches to an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The event handler to attach.
	 * @param {Boolean} capture - Wether the event should be handled at the capturing phase or not.
	 */
	Owl.prototype.on = function(element, event, listener, capture) {
		if (element.addEventListener) {
			element.addEventListener(event, listener, capture);
		} else if (element.attachEvent) {
			element.attachEvent('on' + event, listener);
		}
	};

	/**
	 * Detaches from an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The attached event handler to detach.
	 * @param {Boolean} capture - Wether the attached event handler was registered as a capturing listener or not.
	 */
	Owl.prototype.off = function(element, event, listener, capture) {
		if (element.removeEventListener) {
			element.removeEventListener(event, listener, capture);
		} else if (element.detachEvent) {
			element.detachEvent('on' + event, listener);
		}
	};

	/**
	 * Triggers a public event.
	 * @todo Remove `status`, `relatedTarget` should be used instead.
	 * @protected
	 * @param {String} name - The event name.
	 * @param {*} [data=null] - The event data.
	 * @param {String} [namespace=carousel] - The event namespace.
	 * @param {String} [state] - The state which is associated with the event.
	 * @param {Boolean} [enter=false] - Indicates if the call enters the specified state or not.
	 * @returns {Event} - The event arguments.
	 */
	Owl.prototype.trigger = function(name, data, namespace, state, enter) {
		var status = {
			item: { count: this._items.length, index: this.current() }
		}, handler = $.camelCase(
			$.grep([ 'on', name, namespace ], function(v) { return v })
				.join('-').toLowerCase()
		), event = $.Event(
			[ name, 'owl', namespace || 'carousel' ].join('.').toLowerCase(),
			$.extend({ relatedTarget: this }, status, data)
		);

		if (!this._supress[name]) {
			$.each(this._plugins, function(name, plugin) {
				if (plugin.onTrigger) {
					plugin.onTrigger(event);
				}
			});

			this.register({ type: Owl.Type.Event, name: name });
			this.$element.trigger(event);

			if (this.settings && typeof this.settings[handler] === 'function') {
				this.settings[handler].call(this, event);
			}
		}

		return event;
	};

	/**
	 * Enters a state.
	 * @param name - The state name.
	 */
	Owl.prototype.enter = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
			if (this._states.current[name] === undefined) {
				this._states.current[name] = 0;
			}

			this._states.current[name]++;
		}, this));
	};

	/**
	 * Leaves a state.
	 * @param name - The state name.
	 */
	Owl.prototype.leave = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
			this._states.current[name]--;
		}, this));
	};

	/**
	 * Registers an event or state.
	 * @public
	 * @param {Object} object - The event or state to register.
	 */
	Owl.prototype.register = function(object) {
		if (object.type === Owl.Type.Event) {
			if (!$.event.special[object.name]) {
				$.event.special[object.name] = {};
			}

			if (!$.event.special[object.name].owl) {
				var _default = $.event.special[object.name]._default;
				$.event.special[object.name]._default = function(e) {
					if (_default && _default.apply && (!e.namespace || e.namespace.indexOf('owl') === -1)) {
						return _default.apply(this, arguments);
					}
					return e.namespace && e.namespace.indexOf('owl') > -1;
				};
				$.event.special[object.name].owl = true;
			}
		} else if (object.type === Owl.Type.State) {
			if (!this._states.tags[object.name]) {
				this._states.tags[object.name] = object.tags;
			} else {
				this._states.tags[object.name] = this._states.tags[object.name].concat(object.tags);
			}

			this._states.tags[object.name] = $.grep(this._states.tags[object.name], $.proxy(function(tag, i) {
				return $.inArray(tag, this._states.tags[object.name]) === i;
			}, this));
		}
	};

	/**
	 * Suppresses events.
	 * @protected
	 * @param {Array.<String>} events - The events to suppress.
	 */
	Owl.prototype.suppress = function(events) {
		$.each(events, $.proxy(function(index, event) {
			this._supress[event] = true;
		}, this));
	};

	/**
	 * Releases suppressed events.
	 * @protected
	 * @param {Array.<String>} events - The events to release.
	 */
	Owl.prototype.release = function(events) {
		$.each(events, $.proxy(function(index, event) {
			delete this._supress[event];
		}, this));
	};

	/**
	 * Gets unified pointer coordinates from event.
	 * @todo #261
	 * @protected
	 * @param {Event} - The `mousedown` or `touchstart` event.
	 * @returns {Object} - Contains `x` and `y` coordinates of current pointer position.
	 */
	Owl.prototype.pointer = function(event) {
		var result = { x: null, y: null };

		event = event.originalEvent || event || window.event;

		event = event.touches && event.touches.length ?
			event.touches[0] : event.changedTouches && event.changedTouches.length ?
				event.changedTouches[0] : event;

		if (event.pageX) {
			result.x = event.pageX;
			result.y = event.pageY;
		} else {
			result.x = event.clientX;
			result.y = event.clientY;
		}

		return result;
	};

	/**
	 * Determines if the input is a Number or something that can be coerced to a Number
	 * @protected
	 * @param {Number|String|Object|Array|Boolean|RegExp|Function|Symbol} - The input to be tested
	 * @returns {Boolean} - An indication if the input is a Number or can be coerced to a Number
	 */
	Owl.prototype.isNumeric = function(number) {
		return !isNaN(parseFloat(number));
	};

	/**
	 * Gets the difference of two vectors.
	 * @todo #261
	 * @protected
	 * @param {Object} - The first vector.
	 * @param {Object} - The second vector.
	 * @returns {Object} - The difference.
	 */
	Owl.prototype.difference = function(first, second) {
		return {
			x: first.x - second.x,
			y: first.y - second.y
		};
	};

	/**
	 * The jQuery Plugin for the Owl Carousel
	 * @todo Navigation plugin `next` and `prev`
	 * @public
	 */
	$.fn.owlCarousel = function(option) {
		var args = Array.prototype.slice.call(arguments, 1);

		return this.each(function() {
			var $this = $(this),
				data = $this.data('owl.carousel');

			if (!data) {
				data = new Owl(this, typeof option == 'object' && option);
				$this.data('owl.carousel', data);

				$.each([
					'next', 'prev', 'to', 'destroy', 'refresh', 'replace', 'add', 'remove'
				], function(i, event) {
					data.register({ type: Owl.Type.Event, name: event });
					data.$element.on(event + '.owl.carousel.core', $.proxy(function(e) {
						if (e.namespace && e.relatedTarget !== this) {
							this.suppress([ event ]);
							data[event].apply(this, [].slice.call(arguments, 1));
							this.release([ event ]);
						}
					}, data));
				});
			}

			if (typeof option == 'string' && option.charAt(0) !== '_') {
				data[option].apply(data, args);
			}
		});
	};

	/**
	 * The constructor for the jQuery Plugin
	 * @public
	 */
	$.fn.owlCarousel.Constructor = Owl;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoRefresh Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto refresh plugin.
	 * @class The Auto Refresh Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoRefresh = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Refresh interval.
		 * @protected
		 * @type {number}
		 */
		this._interval = null;

		/**
		 * Whether the element is currently visible or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._visible = null;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoRefresh) {
					this.watch();
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, AutoRefresh.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	AutoRefresh.Defaults = {
		autoRefresh: true,
		autoRefreshInterval: 500
	};

	/**
	 * Watches the element.
	 */
	AutoRefresh.prototype.watch = function() {
		if (this._interval) {
			return;
		}

		this._visible = this._core.$element.is(':visible');
		this._interval = window.setInterval($.proxy(this.refresh, this), this._core.settings.autoRefreshInterval);
	};

	/**
	 * Refreshes the element.
	 */
	AutoRefresh.prototype.refresh = function() {
		if (this._core.$element.is(':visible') === this._visible) {
			return;
		}

		this._visible = !this._visible;

		this._core.$element.toggleClass('owl-hidden', !this._visible);

		this._visible && (this._core.invalidate('width') && this._core.refresh());
	};

	/**
	 * Destroys the plugin.
	 */
	AutoRefresh.prototype.destroy = function() {
		var handler, property;

		window.clearInterval(this._interval);

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoRefresh = AutoRefresh;

})(window.Zepto || window.jQuery, window, document);

/**
 * Lazy Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the lazy plugin.
	 * @class The Lazy Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Lazy = function(carousel) {

		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Already loaded items.
		 * @protected
		 * @type {Array.<jQuery>}
		 */
		this._loaded = [];

		/**
		 * Event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel change.owl.carousel resized.owl.carousel': $.proxy(function(e) {
				if (!e.namespace) {
					return;
				}

				if (!this._core.settings || !this._core.settings.lazyLoad) {
					return;
				}

				if ((e.property && e.property.name == 'position') || e.type == 'initialized') {
					var settings = this._core.settings,
						n = (settings.center && Math.ceil(settings.items / 2) || settings.items),
						i = ((settings.center && n * -1) || 0),
						position = (e.property && e.property.value !== undefined ? e.property.value : this._core.current()) + i,
						clones = this._core.clones().length,
						load = $.proxy(function(i, v) { this.load(v) }, this);

					while (i++ < n) {
						this.load(clones / 2 + this._core.relative(position));
						clones && $.each(this._core.clones(this._core.relative(position)), load);
						position++;
					}
				}
			}, this)
		};

		// set the default options
		this._core.options = $.extend({}, Lazy.Defaults, this._core.options);

		// register event handler
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Lazy.Defaults = {
		lazyLoad: false
	};

	/**
	 * Loads all resources of an item at the specified position.
	 * @param {Number} position - The absolute position of the item.
	 * @protected
	 */
	Lazy.prototype.load = function(position) {
		var $item = this._core.$stage.children().eq(position),
			$elements = $item && $item.find('.owl-lazy');

		if (!$elements || $.inArray($item.get(0), this._loaded) > -1) {
			return;
		}

		$elements.each($.proxy(function(index, element) {
			var $element = $(element), image,
				url = (window.devicePixelRatio > 1 && $element.attr('data-src-retina')) || $element.attr('data-src');

			this._core.trigger('load', { element: $element, url: url }, 'lazy');

			if ($element.is('img')) {
				$element.one('load.owl.lazy', $.proxy(function() {
					$element.css('opacity', 1);
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}, this)).attr('src', url);
			} else {
				image = new Image();
				image.onload = $.proxy(function() {
					$element.css({
						'background-image': 'url("' + url + '")',
						'opacity': '1'
					});
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}, this);
				image.src = url;
			}
		}, this));

		this._loaded.push($item.get(0));
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Lazy.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this._core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Lazy = Lazy;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoHeight Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto height plugin.
	 * @class The Auto Height Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoHeight = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight) {
					this.update();
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight && e.property.name == 'position'){
					this.update();
				}
			}, this),
			'loaded.owl.lazy': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight
					&& e.element.closest('.' + this._core.settings.itemClass).index() === this._core.current()) {
					this.update();
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, AutoHeight.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	AutoHeight.Defaults = {
		autoHeight: false,
		autoHeightClass: 'owl-height'
	};

	/**
	 * Updates the view.
	 */
	AutoHeight.prototype.update = function() {
		var start = this._core._current,
			end = start + this._core.settings.items,
			visible = this._core.$stage.children().toArray().slice(start, end),
			heights = [],
			maxheight = 0;

		$.each(visible, function(index, item) {
			heights.push($(item).height());
		});

		maxheight = Math.max.apply(null, heights);

		this._core.$stage.parent()
			.height(maxheight)
			.addClass(this._core.settings.autoHeightClass);
	};

	AutoHeight.prototype.destroy = function() {
		var handler, property;

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoHeight = AutoHeight;

})(window.Zepto || window.jQuery, window, document);

/**
 * Video Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the video plugin.
	 * @class The Video Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Video = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Cache all video URLs.
		 * @protected
		 * @type {Object}
		 */
		this._videos = {};

		/**
		 * Current playing item.
		 * @protected
		 * @type {jQuery}
		 */
		this._playing = null;

		/**
		 * All event handlers.
		 * @todo The cloned content removale is too late
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					this._core.register({ type: 'state', name: 'playing', tags: [ 'interacting' ] });
				}
			}, this),
			'resize.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.video && this.isInFullScreen()) {
					e.preventDefault();
				}
			}, this),
			'refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.is('resizing')) {
					this._core.$stage.find('.cloned .owl-video-frame').remove();
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'position' && this._playing) {
					this.stop();
				}
			}, this),
			'prepared.owl.carousel': $.proxy(function(e) {
				if (!e.namespace) {
					return;
				}

				var $element = $(e.content).find('.owl-video');

				if ($element.length) {
					$element.css('display', 'none');
					this.fetch($element, $(e.content));
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Video.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);

		this._core.$element.on('click.owl.video', '.owl-video-play-icon', $.proxy(function(e) {
			this.play(e);
		}, this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Video.Defaults = {
		video: false,
		videoHeight: false,
		videoWidth: false
	};

	/**
	 * Gets the video ID and the type (YouTube/Vimeo/vzaar only).
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {jQuery} item - The item containing the video.
	 */
	Video.prototype.fetch = function(target, item) {
			var type = (function() {
					if (target.attr('data-vimeo-id')) {
						return 'vimeo';
					} else if (target.attr('data-vzaar-id')) {
						return 'vzaar'
					} else {
						return 'youtube';
					}
				})(),
				id = target.attr('data-vimeo-id') || target.attr('data-youtube-id') || target.attr('data-vzaar-id'),
				width = target.attr('data-width') || this._core.settings.videoWidth,
				height = target.attr('data-height') || this._core.settings.videoHeight,
				url = target.attr('href');

		if (url) {

			/*
					Parses the id's out of the following urls (and probably more):
					https://www.youtube.com/watch?v=:id
					https://youtu.be/:id
					https://vimeo.com/:id
					https://vimeo.com/channels/:channel/:id
					https://vimeo.com/groups/:group/videos/:id
					https://app.vzaar.com/videos/:id

					Visual example: https://regexper.com/#(http%3A%7Chttps%3A%7C)%5C%2F%5C%2F(player.%7Cwww.%7Capp.)%3F(vimeo%5C.com%7Cyoutu(be%5C.com%7C%5C.be%7Cbe%5C.googleapis%5C.com)%7Cvzaar%5C.com)%5C%2F(video%5C%2F%7Cvideos%5C%2F%7Cembed%5C%2F%7Cchannels%5C%2F.%2B%5C%2F%7Cgroups%5C%2F.%2B%5C%2F%7Cwatch%5C%3Fv%3D%7Cv%5C%2F)%3F(%5BA-Za-z0-9._%25-%5D*)(%5C%26%5CS%2B)%3F
			*/

			id = url.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);

			if (id[3].indexOf('youtu') > -1) {
				type = 'youtube';
			} else if (id[3].indexOf('vimeo') > -1) {
				type = 'vimeo';
			} else if (id[3].indexOf('vzaar') > -1) {
				type = 'vzaar';
			} else {
				throw new Error('Video URL not supported.');
			}
			id = id[6];
		} else {
			throw new Error('Missing video URL.');
		}

		this._videos[url] = {
			type: type,
			id: id,
			width: width,
			height: height
		};

		item.attr('data-video', url);

		this.thumbnail(target, this._videos[url]);
	};

	/**
	 * Creates video thumbnail.
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {Object} info - The video info object.
	 * @see `fetch`
	 */
	Video.prototype.thumbnail = function(target, video) {
		var tnLink,
			icon,
			path,
			dimensions = video.width && video.height ? 'style="width:' + video.width + 'px;height:' + video.height + 'px;"' : '',
			customTn = target.find('img'),
			srcType = 'src',
			lazyClass = '',
			settings = this._core.settings,
			create = function(path) {
				icon = '<div class="owl-video-play-icon"></div>';

				if (settings.lazyLoad) {
					tnLink = '<div class="owl-video-tn ' + lazyClass + '" ' + srcType + '="' + path + '"></div>';
				} else {
					tnLink = '<div class="owl-video-tn" style="opacity:1;background-image:url(' + path + ')"></div>';
				}
				target.after(tnLink);
				target.after(icon);
			};

		// wrap video content into owl-video-wrapper div
		target.wrap('<div class="owl-video-wrapper"' + dimensions + '></div>');

		if (this._core.settings.lazyLoad) {
			srcType = 'data-src';
			lazyClass = 'owl-lazy';
		}

		// custom thumbnail
		if (customTn.length) {
			create(customTn.attr(srcType));
			customTn.remove();
			return false;
		}

		if (video.type === 'youtube') {
			path = "//img.youtube.com/vi/" + video.id + "/hqdefault.jpg";
			create(path);
		} else if (video.type === 'vimeo') {
			$.ajax({
				type: 'GET',
				url: '//vimeo.com/api/v2/video/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data[0].thumbnail_large;
					create(path);
				}
			});
		} else if (video.type === 'vzaar') {
			$.ajax({
				type: 'GET',
				url: '//vzaar.com/api/videos/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data.framegrab_url;
					create(path);
				}
			});
		}
	};

	/**
	 * Stops the current video.
	 * @public
	 */
	Video.prototype.stop = function() {
		this._core.trigger('stop', null, 'video');
		this._playing.find('.owl-video-frame').remove();
		this._playing.removeClass('owl-video-playing');
		this._playing = null;
		this._core.leave('playing');
		this._core.trigger('stopped', null, 'video');
	};

	/**
	 * Starts the current video.
	 * @public
	 * @param {Event} event - The event arguments.
	 */
	Video.prototype.play = function(event) {
		var target = $(event.target),
			item = target.closest('.' + this._core.settings.itemClass),
			video = this._videos[item.attr('data-video')],
			width = video.width || '100%',
			height = video.height || this._core.$stage.height(),
			html;

		if (this._playing) {
			return;
		}

		this._core.enter('playing');
		this._core.trigger('play', null, 'video');

		item = this._core.items(this._core.relative(item.index()));

		this._core.reset(item.index());

		if (video.type === 'youtube') {
			html = '<iframe width="' + width + '" height="' + height + '" src="//www.youtube.com/embed/' +
				video.id + '?autoplay=1&rel=0&v=' + video.id + '" frameborder="0" allowfullscreen></iframe>';
		} else if (video.type === 'vimeo') {
			html = '<iframe src="//player.vimeo.com/video/' + video.id +
				'?autoplay=1" width="' + width + '" height="' + height +
				'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		} else if (video.type === 'vzaar') {
			html = '<iframe frameborder="0"' + 'height="' + height + '"' + 'width="' + width +
				'" allowfullscreen mozallowfullscreen webkitAllowFullScreen ' +
				'src="//view.vzaar.com/' + video.id + '/player?autoplay=true"></iframe>';
		}

		$('<div class="owl-video-frame">' + html + '</div>').insertAfter(item.find('.owl-video'));

		this._playing = item.addClass('owl-video-playing');
	};

	/**
	 * Checks whether an video is currently in full screen mode or not.
	 * @todo Bad style because looks like a readonly method but changes members.
	 * @protected
	 * @returns {Boolean}
	 */
	Video.prototype.isInFullScreen = function() {
		var element = document.fullscreenElement || document.mozFullScreenElement ||
				document.webkitFullscreenElement;

		return element && $(element).parent().hasClass('owl-video-frame');
	};

	/**
	 * Destroys the plugin.
	 */
	Video.prototype.destroy = function() {
		var handler, property;

		this._core.$element.off('click.owl.video');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Video = Video;

})(window.Zepto || window.jQuery, window, document);


;(function($, window, document, undefined) {

	/**
	 * Creates the animate plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Animate = function(scope) {
		this.core = scope;
		this.core.options = $.extend({}, Animate.Defaults, this.core.options);
		this.swapping = true;
		this.previous = undefined;
		this.next = undefined;

		this.handlers = {
			'change.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.previous = this.core.current();
					this.next = e.property.value;
				}
			}, this),
			'drag.owl.carousel dragged.owl.carousel translated.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					this.swapping = e.type == 'translated';
				}
			}, this),
			'translate.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn)) {
					this.swap();
				}
			}, this)
		};

		this.core.$element.on(this.handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Animate.Defaults = {
		animateOut: false,
		animateIn: false
	};

	/**
	 * Toggles the animation classes whenever an translations starts.
	 * @protected
	 * @returns {Boolean|undefined}
	 */
	Animate.prototype.swap = function() {

		if (this.core.settings.items !== 1) {
			return;
		}

		if (!$.support.animation || !$.support.transition) {
			return;
		}

		this.core.speed(0);

		var left,
			clear = $.proxy(this.clear, this),
			previous = this.core.$stage.children().eq(this.previous),
			next = this.core.$stage.children().eq(this.next),
			incoming = this.core.settings.animateIn,
			outgoing = this.core.settings.animateOut;

		if (this.core.current() === this.previous) {
			return;
		}

		if (outgoing) {
			left = this.core.coordinates(this.previous) - this.core.coordinates(this.next);
			previous.one($.support.animation.end, clear)
				.css( { 'left': left + 'px' } )
				.addClass('animated owl-animated-out')
				.addClass(outgoing);
		}

		if (incoming) {
			next.one($.support.animation.end, clear)
				.addClass('animated owl-animated-in')
				.addClass(incoming);
		}
	};

	Animate.prototype.clear = function(e) {
		$(e.target).css( { 'left': '' } )
			.removeClass('animated owl-animated-out owl-animated-in')
			.removeClass(this.core.settings.animateIn)
			.removeClass(this.core.settings.animateOut);
		this.core.onTransitionEnd();
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Animate.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this.core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Animate = Animate;

})(window.Zepto || window.jQuery, window, document);

/**
 * Autoplay Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the autoplay plugin.
	 * @class The Autoplay Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Autoplay = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * The autoplay timeout.
		 * @type {Timeout}
		 */
		this._timeout = null;

		/**
		 * Indicates whenever the autoplay is paused.
		 * @type {Boolean}
		 */
		this._paused = false;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'settings') {
					if (this._core.settings.autoplay) {
						this.play();
					} else {
						this.stop();
					}
				} else if (e.namespace && e.property.name === 'position') {
					//console.log('play?', e);
					if (this._core.settings.autoplay) {
						this._setAutoPlayInterval();
					}
				}
			}, this),
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoplay) {
					this.play();
				}
			}, this),
			'play.owl.autoplay': $.proxy(function(e, t, s) {
				if (e.namespace) {
					this.play(t, s);
				}
			}, this),
			'stop.owl.autoplay': $.proxy(function(e) {
				if (e.namespace) {
					this.stop();
				}
			}, this),
			'mouseover.owl.autoplay': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}, this),
			'mouseleave.owl.autoplay': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.play();
				}
			}, this),
			'touchstart.owl.core': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}, this),
			'touchend.owl.core': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause) {
					this.play();
				}
			}, this)
		};

		// register event handlers
		this._core.$element.on(this._handlers);

		// set default options
		this._core.options = $.extend({}, Autoplay.Defaults, this._core.options);
	};

	/**
	 * Default options.
	 * @public
	 */
	Autoplay.Defaults = {
		autoplay: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		autoplaySpeed: false
	};

	/**
	 * Starts the autoplay.
	 * @public
	 * @param {Number} [timeout] - The interval before the next animation starts.
	 * @param {Number} [speed] - The animation speed for the animations.
	 */
	Autoplay.prototype.play = function(timeout, speed) {
		this._paused = false;

		if (this._core.is('rotating')) {
			return;
		}

		this._core.enter('rotating');

		this._setAutoPlayInterval();
	};

	/**
	 * Gets a new timeout
	 * @private
	 * @param {Number} [timeout] - The interval before the next animation starts.
	 * @param {Number} [speed] - The animation speed for the animations.
	 * @return {Timeout}
	 */
	Autoplay.prototype._getNextTimeout = function(timeout, speed) {
		if ( this._timeout ) {
			window.clearTimeout(this._timeout);
		}
		return window.setTimeout($.proxy(function() {
			if (this._paused || this._core.is('busy') || this._core.is('interacting') || document.hidden) {
				return;
			}
			this._core.next(speed || this._core.settings.autoplaySpeed);
		}, this), timeout || this._core.settings.autoplayTimeout);
	};

	/**
	 * Sets autoplay in motion.
	 * @private
	 */
	Autoplay.prototype._setAutoPlayInterval = function() {
		this._timeout = this._getNextTimeout();
	};

	/**
	 * Stops the autoplay.
	 * @public
	 */
	Autoplay.prototype.stop = function() {
		if (!this._core.is('rotating')) {
			return;
		}

		window.clearTimeout(this._timeout);
		this._core.leave('rotating');
	};

	/**
	 * Stops the autoplay.
	 * @public
	 */
	Autoplay.prototype.pause = function() {
		if (!this._core.is('rotating')) {
			return;
		}

		this._paused = true;
	};

	/**
	 * Destroys the plugin.
	 */
	Autoplay.prototype.destroy = function() {
		var handler, property;

		this.stop();

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.autoplay = Autoplay;

})(window.Zepto || window.jQuery, window, document);

/**
 * Navigation Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the navigation plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} carousel - The Owl Carousel.
	 */
	var Navigation = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Indicates whether the plugin is initialized or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._initialized = false;

		/**
		 * The current paging indexes.
		 * @protected
		 * @type {Array}
		 */
		this._pages = [];

		/**
		 * All DOM elements of the user interface.
		 * @protected
		 * @type {Object}
		 */
		this._controls = {};

		/**
		 * Markup for an indicator.
		 * @protected
		 * @type {Array.<String>}
		 */
		this._templates = [];

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * Overridden methods of the carousel.
		 * @protected
		 * @type {Object}
		 */
		this._overrides = {
			next: this._core.next,
			prev: this._core.prev,
			to: this._core.to
		};

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'prepared.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.push('<div class="' + this._core.settings.dotClass + '">' +
						$(e.content).find('[data-dot]').addBack('[data-dot]').attr('data-dot') + '</div>');
				}
			}, this),
			'added.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 0, this._templates.pop());
				}
			}, this),
			'remove.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 1);
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.draw();
				}
			}, this),
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && !this._initialized) {
					this._core.trigger('initialize', null, 'navigation');
					this.initialize();
					this.update();
					this.draw();
					this._initialized = true;
					this._core.trigger('initialized', null, 'navigation');
				}
			}, this),
			'refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._initialized) {
					this._core.trigger('refresh', null, 'navigation');
					this.update();
					this.draw();
					this._core.trigger('refreshed', null, 'navigation');
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Navigation.Defaults, this._core.options);

		// register event handlers
		this.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 * @todo Rename `slideBy` to `navBy`
	 */
	Navigation.Defaults = {
		nav: false,
		navText: [ 'prev', 'next' ],
		navSpeed: false,
		navElement: 'div',
		navContainer: false,
		navContainerClass: 'owl-nav',
		navClass: [ 'owl-prev', 'owl-next' ],
		slideBy: 1,
		dotClass: 'owl-dot',
		dotsClass: 'owl-dots',
		dots: true,
		dotsEach: false,
		dotsData: false,
		dotsSpeed: false,
		dotsContainer: false
	};

	/**
	 * Initializes the layout of the plugin and extends the carousel.
	 * @protected
	 */
	Navigation.prototype.initialize = function() {
		var override,
			settings = this._core.settings;

		// create DOM structure for relative navigation
		this._controls.$relative = (settings.navContainer ? $(settings.navContainer)
			: $('<div>').addClass(settings.navContainerClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$previous = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[0])
			.html(settings.navText[0])
			.prependTo(this._controls.$relative)
			.on('click', $.proxy(function(e) {
				this.prev(settings.navSpeed);
			}, this));
		this._controls.$next = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[1])
			.html(settings.navText[1])
			.appendTo(this._controls.$relative)
			.on('click', $.proxy(function(e) {
				this.next(settings.navSpeed);
			}, this));

		// create DOM structure for absolute navigation
		if (!settings.dotsData) {
			this._templates = [ $('<div>')
				.addClass(settings.dotClass)
				.append($('<span>'))
				.prop('outerHTML') ];
		}

		this._controls.$absolute = (settings.dotsContainer ? $(settings.dotsContainer)
			: $('<div>').addClass(settings.dotsClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$absolute.on('click', 'div', $.proxy(function(e) {
			var index = $(e.target).parent().is(this._controls.$absolute)
				? $(e.target).index() : $(e.target).parent().index();

			e.preventDefault();

			this.to(index, settings.dotsSpeed);
		}, this));

		// override public methods of the carousel
		for (override in this._overrides) {
			this._core[override] = $.proxy(this[override], this);
		}
	};

	/**
	 * Destroys the plugin.
	 * @protected
	 */
	Navigation.prototype.destroy = function() {
		var handler, control, property, override;

		for (handler in this._handlers) {
			this.$element.off(handler, this._handlers[handler]);
		}
		for (control in this._controls) {
			this._controls[control].remove();
		}
		for (override in this.overides) {
			this._core[override] = this._overrides[override];
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	/**
	 * Updates the internal state.
	 * @protected
	 */
	Navigation.prototype.update = function() {
		var i, j, k,
			lower = this._core.clones().length / 2,
			upper = lower + this._core.items().length,
			maximum = this._core.maximum(true),
			settings = this._core.settings,
			size = settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items;

		if (settings.slideBy !== 'page') {
			settings.slideBy = Math.min(settings.slideBy, settings.items);
		}

		if (settings.dots || settings.slideBy == 'page') {
			this._pages = [];

			for (i = lower, j = 0, k = 0; i < upper; i++) {
				if (j >= size || j === 0) {
					this._pages.push({
						start: Math.min(maximum, i - lower),
						end: i - lower + size - 1
					});
					if (Math.min(maximum, i - lower) === maximum) {
						break;
					}
					j = 0, ++k;
				}
				j += this._core.mergers(this._core.relative(i));
			}
		}
	};

	/**
	 * Draws the user interface.
	 * @todo The option `dotsData` wont work.
	 * @protected
	 */
	Navigation.prototype.draw = function() {
		var difference,
			settings = this._core.settings,
			disabled = this._core.items().length <= settings.items,
			index = this._core.relative(this._core.current()),
			loop = settings.loop || settings.rewind;

		this._controls.$relative.toggleClass('disabled', !settings.nav || disabled);

		if (settings.nav) {
			this._controls.$previous.toggleClass('disabled', !loop && index <= this._core.minimum(true));
			this._controls.$next.toggleClass('disabled', !loop && index >= this._core.maximum(true));
		}

		this._controls.$absolute.toggleClass('disabled', !settings.dots || disabled);

		if (settings.dots) {
			difference = this._pages.length - this._controls.$absolute.children().length;

			if (settings.dotsData && difference !== 0) {
				this._controls.$absolute.html(this._templates.join(''));
			} else if (difference > 0) {
				this._controls.$absolute.append(new Array(difference + 1).join(this._templates[0]));
			} else if (difference < 0) {
				this._controls.$absolute.children().slice(difference).remove();
			}

			this._controls.$absolute.find('.active').removeClass('active');
			this._controls.$absolute.children().eq($.inArray(this.current(), this._pages)).addClass('active');
		}
	};

	/**
	 * Extends event data.
	 * @protected
	 * @param {Event} event - The event object which gets thrown.
	 */
	Navigation.prototype.onTrigger = function(event) {
		var settings = this._core.settings;

		event.page = {
			index: $.inArray(this.current(), this._pages),
			count: this._pages.length,
			size: settings && (settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items)
		};
	};

	/**
	 * Gets the current page position of the carousel.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.current = function() {
		var current = this._core.relative(this._core.current());
		return $.grep(this._pages, $.proxy(function(page, index) {
			return page.start <= current && page.end >= current;
		}, this)).pop();
	};

	/**
	 * Gets the current succesor/predecessor position.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.getPosition = function(successor) {
		var position, length,
			settings = this._core.settings;

		if (settings.slideBy == 'page') {
			position = $.inArray(this.current(), this._pages);
			length = this._pages.length;
			successor ? ++position : --position;
			position = this._pages[((position % length) + length) % length].start;
		} else {
			position = this._core.relative(this._core.current());
			length = this._core.items().length;
			successor ? position += settings.slideBy : position -= settings.slideBy;
		}

		return position;
	};

	/**
	 * Slides to the next item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.next = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(true), speed);
	};

	/**
	 * Slides to the previous item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.prev = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(false), speed);
	};

	/**
	 * Slides to the specified item or page.
	 * @public
	 * @param {Number} position - The position of the item or page.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 * @param {Boolean} [standard=false] - Whether to use the standard behaviour or not.
	 */
	Navigation.prototype.to = function(position, speed, standard) {
		var length;

		if (!standard && this._pages.length) {
			length = this._pages.length;
			$.proxy(this._overrides.to, this._core)(this._pages[((position % length) + length) % length].start, speed);
		} else {
			$.proxy(this._overrides.to, this._core)(position, speed);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Navigation = Navigation;

})(window.Zepto || window.jQuery, window, document);

/**
 * Hash Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the hash plugin.
	 * @class The Hash Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Hash = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Hash index for the items.
		 * @protected
		 * @type {Object}
		 */
		this._hashes = {};

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.startPosition === 'URLHash') {
					$(window).trigger('hashchange.owl.navigation');
				}
			}, this),
			'prepared.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					var hash = $(e.content).find('[data-hash]').addBack('[data-hash]').attr('data-hash');

					if (!hash) {
						return;
					}

					this._hashes[hash] = e.content;
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'position') {
					var current = this._core.items(this._core.relative(this._core.current())),
						hash = $.map(this._hashes, function(item, hash) {
							return item === current ? hash : null;
						}).join();

					if (!hash || window.location.hash.slice(1) === hash) {
						return;
					}

					window.location.hash = hash;
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Hash.Defaults, this._core.options);

		// register the event handlers
		this.$element.on(this._handlers);

		// register event listener for hash navigation
		$(window).on('hashchange.owl.navigation', $.proxy(function(e) {
			var hash = window.location.hash.substring(1),
				items = this._core.$stage.children(),
				position = this._hashes[hash] && items.index(this._hashes[hash]);

			if (position === undefined || position === this._core.current()) {
				return;
			}

			this._core.to(this._core.relative(position), false, true);
		}, this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Hash.Defaults = {
		URLhashListener: false
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Hash.prototype.destroy = function() {
		var handler, property;

		$(window).off('hashchange.owl.navigation');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Hash = Hash;

})(window.Zepto || window.jQuery, window, document);

/**
 * Support Plugin
 *
 * @version 2.1.0
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	var style = $('<support>').get(0).style,
		prefixes = 'Webkit Moz O ms'.split(' '),
		events = {
			transition: {
				end: {
					WebkitTransition: 'webkitTransitionEnd',
					MozTransition: 'transitionend',
					OTransition: 'oTransitionEnd',
					transition: 'transitionend'
				}
			},
			animation: {
				end: {
					WebkitAnimation: 'webkitAnimationEnd',
					MozAnimation: 'animationend',
					OAnimation: 'oAnimationEnd',
					animation: 'animationend'
				}
			}
		},
		tests = {
			csstransforms: function() {
				return !!test('transform');
			},
			csstransforms3d: function() {
				return !!test('perspective');
			},
			csstransitions: function() {
				return !!test('transition');
			},
			cssanimations: function() {
				return !!test('animation');
			}
		};

	function test(property, prefixed) {
		var result = false,
			upper = property.charAt(0).toUpperCase() + property.slice(1);

		$.each((property + ' ' + prefixes.join(upper + ' ') + upper).split(' '), function(i, property) {
			if (style[property] !== undefined) {
				result = prefixed ? property : true;
				return false;
			}
		});

		return result;
	}

	function prefixed(property) {
		return test(property, true);
	}

	if (tests.csstransitions()) {
		/* jshint -W053 */
		$.support.transition = new String(prefixed('transition'))
		$.support.transition.end = events.transition.end[ $.support.transition ];
	}

	if (tests.cssanimations()) {
		/* jshint -W053 */
		$.support.animation = new String(prefixed('animation'))
		$.support.animation.end = events.animation.end[ $.support.animation ];
	}

	if (tests.csstransforms()) {
		/* jshint -W053 */
		$.support.transform = new String(prefixed('transform'));
		$.support.transform3d = tests.csstransforms3d();
	}

})(window.Zepto || window.jQuery, window, document);/************************************
          MINIMALECT 0.8b
  A minimalistic select replacement
        http://git.io/Xedg9w
************************************/
!function(e,t,s){function i(t,s){this.element=e(t),this.options=e.extend({},a,s),this._defaults=a,this._name=l,this.label=e('[for="'+this.element.attr("id")+'"]').attr("for","minict_"+this.element.attr("id")),this._init()}var l="minimalect",a={theme:"",reset:!1,transition:"fade",transition_time:150,remove_empty_option:!0,searchable:!0,ajax:null,debug:!1,live:!0,placeholder:select2choice,empty:"No results match your keyword.",error_message:"There was a problem with the request.",class_container:"minict_wrapper",class_group:"minict_group",class_empty:"minict_empty",class_active:"active",class_disabled:"disabled",class_selected:"selected",class_hidden:"hidden",class_highlighted:"highlighted",class_first:"minict_first",class_last:"minict_last",class_reset:"minict_reset",beforeinit:function(){},afterinit:function(){},onchange:function(){},onopen:function(){},onclose:function(){},onfilter:function(){}};i.prototype={_init:function(){this.options.beforeinit();var i=this.options,l=this;if(this.wrapper=e('<div class="'+i.class_container+'"></div>'),this.element.hide().after(this.wrapper),i.theme&&this.wrapper.addClass(i.theme),this.element.prop("disabled")&&this.wrapper.addClass(i.class_disabled),this.input=e("<span "+(i.searchable?'contenteditable="true"':"")+' data-placeholder="'+(this.element.find("option[selected]").text()||this.element.attr("placeholder")||null!=i.placeholder?i.placeholder:this.element.find("option:first").text())+'" '+(this.element.is("[tabindex]")?"tabindex="+this.element.attr("tabindex"):"")+">"+(this.element.find("option[selected]").html()||"")+"</span>").appendTo(this.wrapper),i.reset&&(this.reset=e('<a href="#" class="'+i.class_reset+'">&#215;</a>').appendTo(this.wrapper)),this.ul=e("<ul>"+this._parseSelect()+'<li class="'+i.class_empty+'">'+i.empty+"</li></ul>").appendTo(this.wrapper),this.items=this.wrapper.find("li"),this.element.find("option[selected]").length&&(this._showResetLink(),this.items.filter('[data-value="'+this.element.find("option[selected]").val()+'"]').addClass(i.class_selected)),e(s).on("click",function(){l._hideChoices(l.wrapper)}),e("*").not(this.wrapper).not(this.wrapper.find("*")).on("focus",function(){l._hideChoices(l.wrapper)}),this.wrapper.on("click",function(e){e.stopPropagation(),l.element.prop("multiple")||l.element.prop("disabled")||l._toggleChoices()}),this.label.on("click",function(e){e.stopPropagation(),l.input.trigger("focus")}),this.wrapper.on("click","li:not(."+i.class_group+", ."+i.class_empty+", ."+i.class_disabled+")",function(){l._selectChoice(e(this))}),this.wrapper.on("click","li."+i.class_group+", li."+i.class_empty+", li."+i.class_disabled,function(e){e.stopPropagation(),l.input.focus()}),this.element.on("focus",function(){l.element.blur(),l._showChoices()}).on("blur",l._hideChoices).on("update",l.update),i.reset&&this.wrapper.on("click","a."+i.class_reset,function(e){return e.stopPropagation(),l._resetChoice(),!1}),this.input.on("focus click",function(e){e.stopPropagation(),l.element.prop("disabled")?l.input.blur():l._showChoices()}).on("keydown",function(e){switch(e.keyCode){case 38:e.preventDefault(),l._navigateChoices("up");break;case 40:e.preventDefault(),l._navigateChoices("down");break;case 13:case 9:l.items.filter("."+i.class_highlighted).length?l._selectChoice(l.items.filter("."+i.class_highlighted)):l.input.text()&&l._selectChoice(l.items.not("."+i.class_group+", ."+i.class_empty).filter(":visible").first()),13===e.keyCode&&(e.preventDefault(),l._hideChoices(l.wrapper));break;case 27:e.preventDefault(),l._hideChoices(l.wrapper)}}).on("keyup",function(t){-1===e.inArray(t.keyCode,[38,40,13,9,27])&&l._filterChoices()}),t.MutationObserver&&(this.observer=new MutationObserver(function(e){e.length>0&&(l.ul.html(l._parseSelect()+'<li class="'+i.class_empty+'">'+i.empty+"</li>"),l.items=l.wrapper.find('li'),l.options.debug&&console.log("Minimalect detected a DOM change for ",l.element))}),this.observer.observe(l.element[0],{childList:!0})),i.live){var a=this.element.val();setInterval(function(){a!=l.element.val()&&null!=l.element.val()&&""!=l.element.val()?(a=l.element.val(),"array"==typeof a?a.each(function(e,t){l._selectChoice(l.wrapper.find("li[data-value='"+t+"']"))}):l._selectChoice(l.wrapper.find("li[data-value='"+a+"']"))):(null==l.element.val()||""==l.element.val())&&(a=l.element.val(),l.items.removeClass(l.options.class_selected),l.input.text("").attr("data-placeholder",l.options.placeholder)),l.element.prop("disabled")?l.wrapper.addClass(i.class_disabled):l.wrapper.removeClass(i.class_disabled)},100)}i.afterinit()},_navigateChoices:function(e){var t=(this.wrapper,this.options),s=this.items,i="."+t.class_hidden+", ."+t.class_empty+", ."+t.class_group;if(!s.filter("."+t.class_highlighted).length)return"up"===e?s.not(i).last().addClass(t.class_highlighted):"down"===e&&s.not(i).first().addClass(t.class_highlighted),!1;if(cur=s.filter("."+t.class_highlighted),cur.removeClass(t.class_highlighted),"up"===e)if(s.not(i).first()[0]!=cur[0]){cur.prevAll("li").not(i).first().addClass(t.class_highlighted);var l=s.filter("."+t.class_highlighted).offset().top-this.ul.offset().top+this.ul.scrollTop();this.ul.scrollTop()>l&&this.ul.scrollTop(l)}else s.not(i).last().addClass(t.class_highlighted),this.ul.scrollTop(this.ul.height());else if("down"===e)if(s.not(i).last()[0]!=cur[0]){cur.nextAll("li").not(i).first().addClass(t.class_highlighted);var a=this.ul.height(),n=s.filter("."+t.class_highlighted).offset().top-this.ul.offset().top+s.filter("."+t.class_highlighted).outerHeight();n>a&&this.ul.scrollTop(this.ul.scrollTop()+n-a)}else s.not(i).first().addClass(t.class_highlighted),this.ul.scrollTop(0)},_parseSelect:function(){var t="";return this.element.find("optgroup").length?this.element.find("optgroup").each(function(){t+='<li class="'+this.options.class_group+'">'+e(this).attr("label")+"</li>",t+=this._parseElements(e(this).html())}):t=this._parseElements(this.element.html()),t},_parseElements:function(t){var s=this,i="";return e(e.trim(t)).filter("option").each(function(){var t=e(this);""===t.attr("value")&&s.options.remove_empty_option||(i+='<li data-value="'+t.val().replace(/"/g,"&quot;")+'" class="'+(t.attr("class")||"")+(t.prop("disabled")?" "+s.options.class_disabled:"")+'">'+t.text()+"</li>")}),i},_toggleChoices:function(){this.wrapper.hasClass(this.options.class_active)?this._hideChoices(this.wrapper):this._showChoices()},_showChoices:function(t){var s=this,i=this.wrapper,l=this.options;if(i.hasClass(l.class_active))"function"==typeof t&&t.call();else{switch(this._updateFirstLast(!1),e("."+l.class_container).each(function(){e(this)[0]!==i[0]&&s._hideChoices(e(this))}),"function"==typeof t&&t.call(),i.addClass(l.class_active),l.transition){case"fade":this.ul.fadeIn(l.transition_time);break;default:this.ul.show()}this.input.text("").focus(),this._hideResetLink(),this.options.onopen()}},_resetDropdown:function(e){var t=this.options;this.items.removeClass(t.class_hidden),this.wrapper.find("."+t.class_empty).hide(),this.items.filter("."+t.class_highlighted).removeClass(t.class_highlighted),"function"==typeof e&&e.call()},_hideChoices:function(e,t){var s=this.options,i=s.transition_time,l=this;if(e.hasClass(s.class_active)){switch(e.removeClass(s.class_active),s.transition){case"fade":e.children("ul").fadeOut(s.transition_time);break;default:e.children("ul").hide(),i=0}setTimeout(function(){l._resetDropdown(t),l.input.blur(),l.input.attr("data-placeholder")!=s.placeholder?l.input.text(l.input.attr("data-placeholder")):l.items.filter("."+s.class_selected).length||l.input.text("")},i),l._showResetLink(),s.onclose()}else"function"==typeof t&&t.call()},_filterChoices:function(){var t=this.wrapper,s=this.options,i=this;if(s.ajax)e.post(s.ajax,{q:this.input.text()}).success(function(l){if(s.debug&&console.log("Minimalect received ",l," for query '"+i.input.text()+"' in ",i.element),l.length){var a="";e.each(l,function(e,t){a+='<option value="'+t.value+'">'+t.name+"</option>"}),i.element.html(a),i.ul.html(i._parseSelect()+'<li class="'+s.class_empty+'">'+s.empty+"</li>"),t.find("."+s.class_empty).hide(),i.items=t.find("li"),i.options.onfilter(!0)}else i.ul.html('<li class="'+s.class_empty+'">'+s.empty+"</li>"),t.find("."+s.class_empty).show(),s.debug&&console.log("Minimalect didn't find any results for '"+i.input.text()+"' from ",i.element),i.options.onfilter(!1)}).error(function(e){t.find("."+s.class_empty).text(s.error_message),t.find("li").not("."+s.class_empty).addClass(s.class_hidden),t.find("."+s.class_empty).show(),s.debug&&console.error("Minimalect's AJAX query failed for ",i.element," - came back with ",e)});else{var l=this.input.text().replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&");this.items.filter("."+s.class_highlighted).removeClass(s.class_highlighted),this.items.not(s.class_group).each(function(){e(this).text().search(new RegExp(l,"i"))<0||e(this).hasClass(s.class_disabled)?e(this).addClass(s.class_hidden):e(this).removeClass(s.class_hidden)}),this.items.filter("."+s.class_group).removeClass(s.class_hidden).each(function(){nextlis=e(this).nextAll("li").not("."+s.class_hidden+", ."+s.class_empty),(nextlis.first().hasClass(s.class_group)||!nextlis.length)&&e(this).addClass(s.class_hidden)}),t.find("."+s.class_empty).hide(),this.items.not("."+s.class_hidden+", ."+s.class_empty).length?this.options.onfilter(!0):(t.find("."+s.class_empty).show(),s.debug&&console.log("Minimalect didn't find any results for '"+this.input.text()+"' from ",this.element),this.options.onfilter(!1)),this._updateFirstLast(!0)}},_selectChoice:function(t){var s=this.element,i=this.options,l=[],a=[];return t.hasClass(this.options.class_disabled)?!1:(this.element.prop("multiple")||this.items.removeClass(i.class_selected),t.addClass(i.class_selected),this.items.filter("."+i.class_selected).each(function(){l.push(e(this).data("value")),a.push(e(this).text())}),this.input.text(a.join(", ")).attr("data-placeholder",a.join(", ")),(s.val()!=t.data("value")||s.val()!=l)&&(s.val(l),s.trigger("change")),this._showResetLink(),void this.options.onchange(t.data("value"),t.text()))},_resetChoice:function(){this.element.val("").trigger("change"),this._hideResetLink()},_showResetLink:function(){(this.input.text().length>0||this.ul.find("li."+this.options.class_selected).length>0)&&this.options.reset&&this.reset.show()},_hideResetLink:function(){this.options.reset&&this.reset.hide()},_updateFirstLast:function(e){var t=this.wrapper,s=this.options;t.find("."+s.class_first+", ."+s.class_last).removeClass(s.class_first+" "+s.class_last),e?(this.items.filter(":visible").first().addClass(s.class_first),this.items.filter(":visible").last().addClass(s.class_last)):(this.items.first().addClass(s.class_first),this.items.not("."+s.class_empty).last().addClass(s.class_last))},destroy:function(){this.wrapper.remove(),this.element.off("change focus blur").show(),t.MutationObserver&&this.observer.disconnect(),this.options.debug&&console.log("Minimalect destroyed for ",this.element)},update:function(){this.ul.html(this._parseSelect()+'<li class="'+this.options.class_empty+'">'+this.options.empty+"</li>")}},e.fn[l]=function(t,s){return this.each(function(){e.isFunction(i.prototype[t])&&"_"!=t.charAt(0)?1==arguments.length?e.data(this,"plugin_"+l)[t]():e.data(this,"plugin_"+l)[t](s):e.data(this,"plugin_"+l)||e.data(this,"plugin_"+l,new i(this,t))})}}(jQuery,window,document);!function(t){"use strict";function e(e){return e.is('[type="checkbox"]')?e.prop("checked"):e.is('[type="radio"]')?!!t('[name="'+e.attr("name")+'"]:checked').length:e.is("select[multiple]")?(e.val()||[]).length:e.val()}var r=function(a,i){this.options=i,this.validators=t.extend({},r.VALIDATORS,i.custom),this.$element=t(a),this.$btn=t('button[type="submit"], input[type="submit"]').filter('[form="'+this.$element.attr("id")+'"]').add(this.$element.find('input[type="submit"], button[type="submit"]')),this.update(),this.$element.on("input.bs.validator change.bs.validator focusout.bs.validator",t.proxy(this.onInput,this)),this.$element.on("submit.bs.validator",t.proxy(this.onSubmit,this)),this.$element.on("reset.bs.validator",t.proxy(this.reset,this)),this.$element.find("[data-match]").each(function(){var r=t(this),a=r.attr("data-match");t(a).on("input.bs.validator",function(t){e(r)&&r.trigger("input.bs.validator")})}),this.$inputs.filter(function(){return e(t(this))&&!t(this).closest(".has-error").length}).trigger("focusout"),this.$element.attr("novalidate",!0)};function a(e){return this.each(function(){var a=t(this),i=t.extend({},r.DEFAULTS,a.data(),"object"==typeof e&&e),o=a.data("bs.validator");(o||"destroy"!=e)&&(o||a.data("bs.validator",o=new r(this,i)),"string"==typeof e&&o[e]())})}r.VERSION="0.11.9",r.INPUT_SELECTOR=':input:not([type="hidden"], [type="submit"], [type="reset"], button)',r.FOCUS_OFFSET=20,r.DEFAULTS={delay:500,html:!1,disable:!0,focus:!0,custom:{},errors:{match:"Does not match",minlength:"Not long enough"},feedback:{success:"glyphicon-ok",error:"glyphicon-remove"}},r.VALIDATORS={native:function(t){var e=t[0];if(e.checkValidity)return!e.checkValidity()&&!e.validity.valid&&(e.validationMessage||"error!")},match:function(e){var a=e.attr("data-match");return e.val()!==t(a).val()&&r.DEFAULTS.errors.match},minlength:function(t){var e=t.attr("data-minlength");return t.val().length<e&&r.DEFAULTS.errors.minlength}},r.prototype.update=function(){var e=this;return this.$inputs=this.$element.find(r.INPUT_SELECTOR).add(this.$element.find('[data-validate="true"]')).not(this.$element.find('[data-validate="false"]').each(function(){e.clearErrors(t(this))})),this.toggleSubmit(),this},r.prototype.onInput=function(e){var r=this,a=t(e.target),i="focusout"!==e.type;this.$inputs.is(a)&&this.validateInput(a,i).done(function(){r.toggleSubmit()})},r.prototype.validateInput=function(r,a){e(r);var i=r.data("bs.validator.errors");r.is('[type="radio"]')&&(r=this.$element.find('input[name="'+r.attr("name")+'"]'));var o=t.Event("validate.bs.validator",{relatedTarget:r[0]});if(this.$element.trigger(o),!o.isDefaultPrevented()){var s=this;return this.runValidators(r).done(function(e){r.data("bs.validator.errors",e),e.length?a?s.defer(r,s.showErrors):s.showErrors(r):s.clearErrors(r),i&&e.toString()===i.toString()||(o=e.length?t.Event("invalid.bs.validator",{relatedTarget:r[0],detail:e}):t.Event("valid.bs.validator",{relatedTarget:r[0],detail:i}),s.$element.trigger(o)),s.toggleSubmit(),s.$element.trigger(t.Event("validated.bs.validator",{relatedTarget:r[0]}))})}},r.prototype.runValidators=function(r){var a=[],i=t.Deferred();function o(t){return function(t){return r.attr("data-"+t+"-error")}(t)||((e=r[0].validity).typeMismatch?r.attr("data-type-error"):e.patternMismatch?r.attr("data-pattern-error"):e.stepMismatch?r.attr("data-step-error"):e.rangeOverflow?r.attr("data-max-error"):e.rangeUnderflow?r.attr("data-min-error"):e.valueMissing?r.attr("data-required-error"):null)||r.attr("data-error");var e}return r.data("bs.validator.deferred")&&r.data("bs.validator.deferred").reject(),r.data("bs.validator.deferred",i),t.each(this.validators,t.proxy(function(t,i){var s=null;!e(r)&&!r.attr("required")||void 0===r.attr("data-"+t)&&"native"!=t||!(s=i.call(this,r))||(s=o(t)||s,!~a.indexOf(s)&&a.push(s))},this)),!a.length&&e(r)&&r.attr("data-remote")?this.defer(r,function(){var s={};s[r.attr("name")]=e(r),t.get(r.attr("data-remote"),s).fail(function(t,e,r){a.push(o("remote")||r)}).always(function(){i.resolve(a)})}):i.resolve(a),i.promise()},r.prototype.validate=function(){var e=this;return t.when(this.$inputs.map(function(r){return e.validateInput(t(this),!1)})).then(function(){e.toggleSubmit(),e.focusError()}),this},r.prototype.focusError=function(){if(this.options.focus){var e=this.$element.find(".has-error :input:first");0!==e.length&&(t("html, body").animate({scrollTop:e.offset().top-r.FOCUS_OFFSET},250),e.focus())}},r.prototype.showErrors=function(e){var r=this.options.html?"html":"text",a=e.data("bs.validator.errors"),i=e.closest(".form-group"),o=i.find(".help-block.with-errors"),s=i.find(".form-control-feedback");a.length&&(a=t("<ul/>").addClass("list-unstyled").append(t.map(a,function(e){return t("<li/>")[r](e)})),void 0===o.data("bs.validator.originalContent")&&o.data("bs.validator.originalContent",o.html()),o.empty().append(a),i.addClass("has-error has-danger"),i.hasClass("has-feedback")&&s.removeClass(this.options.feedback.success)&&s.addClass(this.options.feedback.error)&&i.removeClass("has-success"))},r.prototype.clearErrors=function(t){var r=t.closest(".form-group"),a=r.find(".help-block.with-errors"),i=r.find(".form-control-feedback");a.html(a.data("bs.validator.originalContent")),r.removeClass("has-error has-danger has-success"),r.hasClass("has-feedback")&&i.removeClass(this.options.feedback.error)&&i.removeClass(this.options.feedback.success)&&e(t)&&i.addClass(this.options.feedback.success)&&r.addClass("has-success")},r.prototype.hasErrors=function(){return!!this.$inputs.filter(function(){return!!(t(this).data("bs.validator.errors")||[]).length}).length},r.prototype.isIncomplete=function(){return!!this.$inputs.filter("[required]").filter(function(){var r=e(t(this));return!("string"==typeof r?t.trim(r):r)}).length},r.prototype.onSubmit=function(t){this.validate(),(this.isIncomplete()||this.hasErrors())&&t.preventDefault()},r.prototype.toggleSubmit=function(){this.options.disable&&this.$btn.toggleClass("disabled",this.isIncomplete()||this.hasErrors())},r.prototype.defer=function(e,r){if(r=t.proxy(r,this,e),!this.options.delay)return r();window.clearTimeout(e.data("bs.validator.timeout")),e.data("bs.validator.timeout",window.setTimeout(r,this.options.delay))},r.prototype.reset=function(){return this.$element.find(".form-control-feedback").removeClass(this.options.feedback.error).removeClass(this.options.feedback.success),this.$inputs.removeData(["bs.validator.errors","bs.validator.deferred"]).each(function(){var e=t(this),r=e.data("bs.validator.timeout");window.clearTimeout(r)&&e.removeData("bs.validator.timeout")}),this.$element.find(".help-block.with-errors").each(function(){var e=t(this),r=e.data("bs.validator.originalContent");e.removeData("bs.validator.originalContent").html(r)}),this.$btn.removeClass("disabled"),this.$element.find(".has-error, .has-danger, .has-success").removeClass("has-error has-danger has-success"),this},r.prototype.destroy=function(){return this.reset(),this.$element.removeAttr("novalidate").removeData("bs.validator").off(".bs.validator"),this.$inputs.off(".bs.validator"),this.options=null,this.validators=null,this.$element=null,this.$btn=null,this.$inputs=null,this};var i=t.fn.validator;t.fn.validator=a,t.fn.validator.Constructor=r,t.fn.validator.noConflict=function(){return t.fn.validator=i,this},t(window).on("load",function(){t('form[data-toggle="validator"]').each(function(){var e=t(this);a.call(e,e.data())})})}(jQuery);/*

	jQuery Tags Input Plugin 1.3.3

	Copyright (c) 2011 XOXCO, Inc

	Documentation for this plugin lives here:
	http://xoxco.com/clickable/jquery-tags-input

	Licensed under the MIT license:
	http://www.opensource.org/licenses/mit-license.php

	ben@xoxco.com

*/

(function($) {

	var delimiter = new Array();
	var tags_callbacks = new Array();
	$.fn.doAutosize = function(o){
	    var minWidth = $(this).data('minwidth'),
	        maxWidth = $(this).data('maxwidth'),
	        val = '',
	        input = $(this),
	        testSubject = $('#'+$(this).data('tester_id'));

	    if (val === (val = input.val())) {return;}

	    // Enter new content into testSubject
	    var escaped = val.replace(/&/g, '&amp;').replace(/\s/g,' ').replace(/</g, '&lt;').replace(/>/g, '&gt;');
	    testSubject.html(escaped);
	    // Calculate new width + whether to change
	    var testerWidth = testSubject.width(),
	        newWidth = (testerWidth + o.comfortZone) >= minWidth ? testerWidth + o.comfortZone : minWidth,
	        currentWidth = input.width(),
	        isValidWidthChange = (newWidth < currentWidth && newWidth >= minWidth)
	                             || (newWidth > minWidth && newWidth < maxWidth);

	    // Animate width
	    if (isValidWidthChange) {
	        input.width(newWidth);
	    }


  };
  $.fn.resetAutosize = function(options){
    // alert(JSON.stringify(options));
    var minWidth =  $(this).data('minwidth') || options.minInputWidth || $(this).width(),
        maxWidth = $(this).data('maxwidth') || options.maxInputWidth || ($(this).closest('.tagsinput').width() - options.inputPadding),
        val = '',
        input = $(this),
        testSubject = $('<tester/>').css({
            position: 'absolute',
            top: -9999,
            left: -9999,
            width: 'auto',
            fontSize: input.css('fontSize'),
            fontFamily: input.css('fontFamily'),
            fontWeight: input.css('fontWeight'),
            letterSpacing: input.css('letterSpacing'),
            whiteSpace: 'nowrap'
        }),
        testerId = $(this).attr('id')+'_autosize_tester';
    if(! $('#'+testerId).length > 0){
      testSubject.attr('id', testerId);
      testSubject.appendTo('body');
    }

    input.data('minwidth', minWidth);
    input.data('maxwidth', maxWidth);
    input.data('tester_id', testerId);
    input.css('width', minWidth);
  };

	$.fn.addTag = function(value,options) {
			options = jQuery.extend({focus:false,callback:true},options);
			this.each(function() {
				var id = $(this).attr('id');

				var tagslist = $(this).val().split(delimiter[id]);
				if (tagslist[0] == '') {
					tagslist = new Array();
				}

				value = jQuery.trim(value);

				if (options.unique) {
					var skipTag = $(this).tagExist(value);
					if(skipTag == true) {
					    //Marks fake input as not_valid to let styling it
    				    $('#'+id+'_tag').addClass('not_valid');
    				}
				} else {
					var skipTag = false;
				}

				if (value !='' && skipTag != true) {
                    $('<span>').addClass('tag').append(
                        $('<span>').text(value).append('&nbsp;&nbsp;'),
                        $('<a>', {
                            href  : '#',
                            title : 'Removing tag',
                            text  : 'x'
                        }).click(function () {
                            return $('#' + id).removeTag(escape(value));
                        })
                    ).insertBefore('#' + id + '_addTag');

					tagslist.push(value);

					$('#'+id+'_tag').val('');
					if (options.focus) {
						$('#'+id+'_tag').focus();
					} else {
						$('#'+id+'_tag').blur();
					}

					$.fn.tagsInput.updateTagsField(this,tagslist);

					if (options.callback && tags_callbacks[id] && tags_callbacks[id]['onAddTag']) {
						var f = tags_callbacks[id]['onAddTag'];
						f.call(this, value);
					}
					if(tags_callbacks[id] && tags_callbacks[id]['onChange'])
					{
						var i = tagslist.length;
						var f = tags_callbacks[id]['onChange'];
						f.call(this, $(this), tagslist[i-1]);
					}
				}

			});

			return false;
		};

	$.fn.removeTag = function(value) {
			value = unescape(value);
			this.each(function() {
				var id = $(this).attr('id');

				var old = $(this).val().split(delimiter[id]);

				$('#'+id+'_tagsinput .tag').remove();
				str = '';
				for (i=0; i< old.length; i++) {
					if (old[i]!=value) {
						str = str + delimiter[id] +old[i];
					}
				}

				$.fn.tagsInput.importTags(this,str);

				if (tags_callbacks[id] && tags_callbacks[id]['onRemoveTag']) {
					var f = tags_callbacks[id]['onRemoveTag'];
					f.call(this, value);
				}
			});

			return false;
		};

	$.fn.tagExist = function(val) {
		var id = $(this).attr('id');
		var tagslist = $(this).val().split(delimiter[id]);
		return (jQuery.inArray(val, tagslist) >= 0); //true when tag exists, false when not
	};

   // clear all existing tags and import new ones from a string
   $.fn.importTags = function(str) {
      var id = $(this).attr('id');
      $('#'+id+'_tagsinput .tag').remove();
      $.fn.tagsInput.importTags(this,str);
   }

	$.fn.tagsInput = function(options) {
    var settings = jQuery.extend({
      interactive:true,
      defaultText:'add a tag',
      minChars:0,
      width:'300px',
      height:'100px',
      autocomplete: {selectFirst: false },
      hide:true,
      delimiter: ',',
      unique:true,
      removeWithBackspace:true,
      placeholderColor:'#666666',
      autosize: true,
      comfortZone: 20,
      inputPadding: 6*2
    },options);

    	var uniqueIdCounter = 0;

		this.each(function() {
         // If we have already initialized the field, do not do it again
         if (typeof $(this).attr('data-tagsinput-init') !== 'undefined') {
            return;
         }

         // Mark the field as having been initialized
         $(this).attr('data-tagsinput-init', true);

			if (settings.hide) {
				$(this).hide();
			}
			var id = $(this).attr('id');
			if (!id || delimiter[$(this).attr('id')]) {
				id = $(this).attr('id', 'tags' + new Date().getTime() + (uniqueIdCounter++)).attr('id');
			}

			var data = jQuery.extend({
				pid:id,
				real_input: '#'+id,
				holder: '#'+id+'_tagsinput',
				input_wrapper: '#'+id+'_addTag',
				fake_input: '#'+id+'_tag'
			},settings);

			delimiter[id] = data.delimiter;

			if (settings.onAddTag || settings.onRemoveTag || settings.onChange) {
				tags_callbacks[id] = new Array();
				tags_callbacks[id]['onAddTag'] = settings.onAddTag;
				tags_callbacks[id]['onRemoveTag'] = settings.onRemoveTag;
				tags_callbacks[id]['onChange'] = settings.onChange;
			}

			var markup = '<div id="'+id+'_tagsinput" class="tagsinput"><div id="'+id+'_addTag">';

			if (settings.interactive) {
				markup = markup + '<input id="'+id+'_tag" value="" data-default="'+settings.defaultText+'" />';
			}

			markup = markup + '</div><div class="tags_clear"></div></div>';

			$(markup).insertAfter(this);

			$(data.holder).css('width',settings.width);
			$(data.holder).css('min-height',settings.height);
			$(data.holder).css('height',settings.height);

			if ($(data.real_input).val()!='') {
				$.fn.tagsInput.importTags($(data.real_input),$(data.real_input).val());
			}
			if (settings.interactive) {
				$(data.fake_input).val($(data.fake_input).attr('data-default'));
				$(data.fake_input).css('color',settings.placeholderColor);
		        $(data.fake_input).resetAutosize(settings);

				$(data.holder).bind('click',data,function(event) {
					$(event.data.fake_input).focus();
				});

				$(data.fake_input).bind('focus',data,function(event) {
					if ($(event.data.fake_input).val()==$(event.data.fake_input).attr('data-default')) {
						$(event.data.fake_input).val('');
					}
					$(event.data.fake_input).css('color','#000000');
				});

				if (settings.autocomplete_url != undefined) {
					autocomplete_options = {source: settings.autocomplete_url};
					for (attrname in settings.autocomplete) {
						autocomplete_options[attrname] = settings.autocomplete[attrname];
					}

					if (jQuery.Autocompleter !== undefined) {
						$(data.fake_input).autocomplete(settings.autocomplete_url, settings.autocomplete);
						$(data.fake_input).bind('result',data,function(event,data,formatted) {
							if (data) {
								$('#'+id).addTag(data[0] + "",{focus:true,unique:(settings.unique)});
							}
					  	});
					} else if (jQuery.ui.autocomplete !== undefined) {
						$(data.fake_input).autocomplete(autocomplete_options);
						$(data.fake_input).bind('autocompleteselect',data,function(event,ui) {
							$(event.data.real_input).addTag(ui.item.value,{focus:true,unique:(settings.unique)});
							return false;
						});
					}


				} else {
						// if a user tabs out of the field, create a new tag
						// this is only available if autocomplete is not used.
						$(data.fake_input).bind('blur',data,function(event) {
							var d = $(this).attr('data-default');
							if ($(event.data.fake_input).val()!='' && $(event.data.fake_input).val()!=d) {
								if( (event.data.minChars <= $(event.data.fake_input).val().length) && (!event.data.maxChars || (event.data.maxChars >= $(event.data.fake_input).val().length)) )
									$(event.data.real_input).addTag($(event.data.fake_input).val(),{focus:true,unique:(settings.unique)});
							} else {
								$(event.data.fake_input).val($(event.data.fake_input).attr('data-default'));
								$(event.data.fake_input).css('color',settings.placeholderColor);
							}
							return false;
						});

				}
				// if user types a default delimiter like comma,semicolon and then create a new tag
				$(data.fake_input).bind('keypress',data,function(event) {
					if (_checkDelimiter(event)) {
					    event.preventDefault();
						if( (event.data.minChars <= $(event.data.fake_input).val().length) && (!event.data.maxChars || (event.data.maxChars >= $(event.data.fake_input).val().length)) )
							$(event.data.real_input).addTag($(event.data.fake_input).val(),{focus:true,unique:(settings.unique)});
					  	$(event.data.fake_input).resetAutosize(settings);
						return false;
					} else if (event.data.autosize) {
			            $(event.data.fake_input).doAutosize(settings);

          			}
				});
				//Delete last tag on backspace
				data.removeWithBackspace && $(data.fake_input).bind('keydown', function(event)
				{
					if(event.keyCode == 8 && $(this).val() == '')
					{
						 event.preventDefault();
						 var last_tag = $(this).closest('.tagsinput').find('.tag:last').text();
						 var id = $(this).attr('id').replace(/_tag$/, '');
						 last_tag = last_tag.replace(/[\s]+x$/, '');
						 $('#' + id).removeTag(escape(last_tag));
						 $(this).trigger('focus');
					}
				});
				$(data.fake_input).blur();

				//Removes the not_valid class when user changes the value of the fake input
				if(data.unique) {
				    $(data.fake_input).keydown(function(event){
				        if(event.keyCode == 8 || String.fromCharCode(event.which).match(/\w+|[áéíóúÁÉÍÓÚñÑ,/]+/)) {
				            $(this).removeClass('not_valid');
				        }
				    });
				}
			} // if settings.interactive
		});

		return this;

	};

	$.fn.tagsInput.updateTagsField = function(obj,tagslist) {
		var id = $(obj).attr('id');
		$(obj).val(tagslist.join(delimiter[id]));
	};

	$.fn.tagsInput.importTags = function(obj,val) {
		$(obj).val('');
		var id = $(obj).attr('id');
		var tags = val.split(delimiter[id]);
		for (i=0; i<tags.length; i++) {
			$(obj).addTag(tags[i],{focus:false,callback:false});
		}
		if(tags_callbacks[id] && tags_callbacks[id]['onChange'])
		{
			var f = tags_callbacks[id]['onChange'];
			f.call(obj, obj, tags[i]);
		}
	};

   /**
     * check delimiter Array
     * @param event
     * @returns {boolean}
     * @private
     */
   var _checkDelimiter = function(event){
      var found = false;
      if (event.which == 13) {
         return true;
      }

      if (typeof event.data.delimiter === 'string') {
         if (event.which == event.data.delimiter.charCodeAt(0)) {
            found = true;
         }
      } else {
         $.each(event.data.delimiter, function(index, delimiter) {
            if (event.which == delimiter.charCodeAt(0)) {
               found = true;
            }
         });
      }

      return found;
   }
})(jQuery);
/*! jssocials - v1.4.0 - 2016-10-10
* http://js-socials.com
* Copyright (c) 2016 Artem Tabalin; Licensed MIT */
! function(a, b, c) {
    function d(a, c) {
        var d = b(a);
        d.data(f, this), this._$element = d, this.shares = [], this._init(c), this._render()
    }
    var e = "JSSocials",
        f = e,
        g = function(a, c) {
            return b.isFunction(a) ? a.apply(c, b.makeArray(arguments).slice(2)) : a
        },
        h = /(\.(jpeg|png|gif|bmp|svg)$|^data:image\/(jpeg|png|gif|bmp|svg\+xml);base64)/i,
        i = /(&?[a-zA-Z0-9]+=)?\{([a-zA-Z0-9]+)\}/g,
        j = {
            G: 1e9,
            M: 1e6,
            K: 1e3
        },
        k = {};
    d.prototype = {
        url: "",
        text: "",
        shareIn: "blank",
        showLabel: function(a) {
            return this.showCount === !1 ? a > this.smallScreenWidth : a >= this.largeScreenWidth
        },
        showCount: function(a) {
            return a <= this.smallScreenWidth ? "inside" : !0
        },
        smallScreenWidth: 640,
        largeScreenWidth: 1024,
        resizeTimeout: 200,
        elementClass: "jssocials",
        sharesClass: "jssocials-shares",
        shareClass: "jssocials-share",
        shareButtonClass: "jssocials-share-button",
        shareLinkClass: "jssocials-share-link",
        shareLogoClass: "jssocials-share-logo",
        shareLabelClass: "jssocials-share-label",
        shareLinkCountClass: "jssocials-share-link-count",
        shareCountBoxClass: "jssocials-share-count-box",
        shareCountClass: "jssocials-share-count",
        shareZeroCountClass: "jssocials-share-no-count",
        _init: function(a) {
            this._initDefaults(), b.extend(this, a), this._initShares(), this._attachWindowResizeCallback()
        },
        _initDefaults: function() {
            this.url = a.location.href, this.text = b.trim(b("meta[name=description]").attr("content") || b("title").text())
        },
        _initShares: function() {
            this.shares = b.map(this.shares, b.proxy(function(a) {
                "string" == typeof a && (a = {
                    share: a
                });
                var c = a.share && k[a.share];
                if (!c && !a.renderer) throw Error("Share '" + a.share + "' is not found");
                return b.extend({
                    url: this.url,
                    text: this.text
                }, c, a)
            }, this))
        },
        _attachWindowResizeCallback: function() {
            b(a).on("resize", b.proxy(this._windowResizeHandler, this))
        },
        _detachWindowResizeCallback: function() {
            b(a).off("resize", this._windowResizeHandler)
        },
        _windowResizeHandler: function() {
            (b.isFunction(this.showLabel) || b.isFunction(this.showCount)) && (a.clearTimeout(this._resizeTimer), this._resizeTimer = setTimeout(b.proxy(this.refresh, this), this.resizeTimeout))
        },
        _render: function() {
            this._clear(), this._defineOptionsByScreen(), this._$element.addClass(this.elementClass), this._$shares = b("<div>").addClass(this.sharesClass).appendTo(this._$element), this._renderShares()
        },
        _defineOptionsByScreen: function() {
            this._screenWidth = b(a).width(), this._showLabel = g(this.showLabel, this, this._screenWidth), this._showCount = g(this.showCount, this, this._screenWidth)
        },
        _renderShares: function() {
            b.each(this.shares, b.proxy(function(a, b) {
                this._renderShare(b)
            }, this))
        },
        _renderShare: function(a) {
            var c;
            c = b.isFunction(a.renderer) ? b(a.renderer()) : this._createShare(a), c.addClass(this.shareClass).addClass(a.share ? "jssocials-share-" + a.share : "").addClass(a.css).appendTo(this._$shares)
        },
        _createShare: function(a) {
            var c = b("<div>"),
                d = this._createShareLink(a).appendTo(c);
            if (this._showCount) {
                var e = "inside" === this._showCount,
                    f = e ? d : b("<div>").addClass(this.shareCountBoxClass).appendTo(c);
                f.addClass(e ? this.shareLinkCountClass : this.shareCountBoxClass), this._renderShareCount(a, f)
            }
            return c
        },
        _createShareLink: function(a) {
            var c = this._getShareStrategy(a),
                d = c.call(a, {
                    shareUrl: this._getShareUrl(a)
                });
            return d.addClass(this.shareLinkClass).append(this._createShareLogo(a)), this._showLabel && d.append(this._createShareLabel(a)), b.each(this.on || {}, function(c, e) {
                b.isFunction(e) && d.on(c, b.proxy(e, a))
            }), d
        },
        _getShareStrategy: function(a) {
            var b = m[a.shareIn || this.shareIn];
            if (!b) throw Error("Share strategy '" + this.shareIn + "' not found");
            return b
        },
        _getShareUrl: function(a) {
            var b = g(a.shareUrl, a);
            return this._formatShareUrl(b, a)
        },
        _createShareLogo: function(a) {
            var c = a.logo,
                d = h.test(c) ? b("<img>").attr("src", a.logo) : b("<i>").addClass(c);
            return d.addClass(this.shareLogoClass), d
        },
        _createShareLabel: function(a) {
            return b("<span>").addClass(this.shareLabelClass).text(a.label)
        },
        _renderShareCount: function(a, c) {
            var d = b("<span>").addClass(this.shareCountClass);
            c.addClass(this.shareZeroCountClass).append(d), this._loadCount(a).done(b.proxy(function(a) {
                a && (c.removeClass(this.shareZeroCountClass), d.text(a))
            }, this))
        },
        _loadCount: function(a) {
            var c = b.Deferred(),
                d = this._getCountUrl(a);
            if (!d) return c.resolve(0).promise();
            var e = b.proxy(function(b) {
                c.resolve(this._getCountValue(b, a))
            }, this);
            return b.getJSON(d).done(e).fail(function() {
                b.get(d).done(e).fail(function() {
                    c.resolve(0)
                })
            }), c.promise()
        },
        _getCountUrl: function(a) {
            var b = g(a.countUrl, a);
            return this._formatShareUrl(b, a)
        },
        _getCountValue: function(a, c) {
            var d = (b.isFunction(c.getCount) ? c.getCount(a) : a) || 0;
            return "string" == typeof d ? d : this._formatNumber(d)
        },
        _formatNumber: function(a) {
            return b.each(j, function(b, c) {
                return a >= c ? (a = parseFloat((a / c).toFixed(2)) + b, !1) : void 0
            }), a
        },
        _formatShareUrl: function(b, c) {
            return b.replace(i, function(b, d, e) {
                var f = c[e] || "";
                return f ? (d || "") + a.encodeURIComponent(f) : ""
            })
        },
        _clear: function() {
            a.clearTimeout(this._resizeTimer), this._$element.empty()
        },
        _passOptionToShares: function(a, c) {
            var d = this.shares;
            b.each(["url", "text"], function(e, f) {
                f === a && b.each(d, function(b, d) {
                    d[a] = c
                })
            })
        },
        _normalizeShare: function(a) {
            return b.isNumeric(a) ? this.shares[a] : "string" == typeof a ? b.grep(this.shares, function(b) {
                return b.share === a
            })[0] : a
        },
        refresh: function() {
            this._render()
        },
        destroy: function() {
            this._clear(), this._detachWindowResizeCallback(), this._$element.removeClass(this.elementClass).removeData(f)
        },
        option: function(a, b) {
            return 1 === arguments.length ? this[a] : (this[a] = b, this._passOptionToShares(a, b), void this.refresh())
        },
        shareOption: function(a, b, c) {
            return a = this._normalizeShare(a), 2 === arguments.length ? a[b] : (a[b] = c, void this.refresh())
        }
    }, b.fn.jsSocials = function(a) {
        var e = b.makeArray(arguments),
            g = e.slice(1),
            h = this;
        return this.each(function() {
            var e, i = b(this),
                j = i.data(f);
            if (j)
                if ("string" == typeof a) {
                    if (e = j[a].apply(j, g), e !== c && e !== j) return h = e, !1
                } else j._detachWindowResizeCallback(), j._init(a), j._render();
            else new d(i, a)
        }), h
    };
    var l = function(a) {
            var c;
            b.isPlainObject(a) ? c = d.prototype : (c = k[a], a = arguments[1] || {}), b.extend(c, a)
        },
        m = {
            popup: function(c) {
                return b("<a>").attr("href", "#").on("click", function() {
                    return a.open(c.shareUrl, null, "width=600, height=400, location=0, menubar=0, resizeable=0, scrollbars=0, status=0, titlebar=0, toolbar=0"), !1
                })
            },
            blank: function(a) {
                return b("<a>").attr({
                    target: "_blank",
                    href: a.shareUrl
                })
            },
            self: function(a) {
                return b("<a>").attr({
                    target: "_self",
                    href: a.shareUrl
                })
            }
        };
    a.jsSocials = {
        Socials: d,
        shares: k,
        shareStrategies: m,
        setDefaults: l
    }
}(window, jQuery),
function(a, b, c) {
    b.extend(c.shares, {
        email: {
            label: "E-mail",
            logo: "jssico-envelope-o",
            shareUrl: "mailto:{to}?subject={text}&body={url}",
            countUrl: "",
            shareIn: "self"
        },
        twitter: {
            label: "Tweet",
            logo: "jssico-twitter3",
            shareUrl: "https://twitter.com/share?url={url}&text={text}&via={via}&hashtags={hashtags}",
            countUrl: ""
        },
        facebook: {
            label: "Like",
            logo: "jssico-facebook",
            shareUrl: "https://facebook.com/sharer/sharer.php?u={url}",
            countUrl: "https://graph.facebook.com/?id={url}",
            getCount: function(a) {
                return a.share && a.share.share_count || 0
            }
        },
        googleplus: {
            label: "+1",
            logo: "jssico-google-plus",
            shareUrl: "https://plus.google.com/share?url={url}",
            countUrl: ""
        },
        linkedin: {
            label: "Share",
            logo: "jssico-linkedin2",
            shareUrl: "https://www.linkedin.com/shareArticle?mini=true&url={url}",
            countUrl: "https://www.linkedin.com/countserv/count/share?format=jsonp&url={url}&callback=?",
            getCount: function(a) {
                return a.count
            }
        },
        pinterest: {
            label: "Pin it",
            logo: "jssico-pinterest",
            shareUrl: "https://pinterest.com/pin/create/bookmarklet/?media={media}&url={url}&description={text}",
            countUrl: "https://api.pinterest.com/v1/urls/count.json?&url={url}&callback=?",
            getCount: function(a) {
                return a.count
            }
        },
        whatsapp: {
            label: "WhatsApp",
            logo: "jssico-whatsapp",
            shareUrl: "whatsapp://send?text={url} {text}",
            countUrl: "",
            shareIn: "self"
        },
        messenger: {
            label: "Share",
            logo: "jssico-messenger",
            shareUrl: "fb-messenger://share?link={url}",
            countUrl: "",
            shareIn: "self"
        }
    })
}(window, jQuery, window.jsSocials);
        $("#jsshare").jsSocials({
			  showLabel: false,
              showCount: true,
			  shareIn: "popup",
			  url: $("#jsshare").attr("data-url"),
              text: $("#jsshare").attr("data-title"),
            shares: [ "facebook", "googleplus", "linkedin", "pinterest", "email", "twitter", "messenger", "whatsapp"]
        });


!function(t,e){"function"==typeof define&&define.amd?define("jquery-bridget/jquery-bridget",["jquery"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("jquery")):t.jQueryBridget=e(t,t.jQuery)}(window,function(t,e){"use strict";function i(i,r,a){function h(t,e,n){var o,r="$()."+i+'("'+e+'")';return t.each(function(t,h){var u=a.data(h,i);if(!u)return void s(i+" not initialized. Cannot call methods, i.e. "+r);var d=u[e];if(!d||"_"==e.charAt(0))return void s(r+" is not a valid method");var l=d.apply(u,n);o=void 0===o?l:o}),void 0!==o?o:t}function u(t,e){t.each(function(t,n){var o=a.data(n,i);o?(o.option(e),o._init()):(o=new r(n,e),a.data(n,i,o))})}a=a||e||t.jQuery,a&&(r.prototype.option||(r.prototype.option=function(t){a.isPlainObject(t)&&(this.options=a.extend(!0,this.options,t))}),a.fn[i]=function(t){if("string"==typeof t){var e=o.call(arguments,1);return h(this,t,e)}return u(this,t),this},n(a))}function n(t){!t||t&&t.bridget||(t.bridget=i)}var o=Array.prototype.slice,r=t.console,s="undefined"==typeof r?function(){}:function(t){r.error(t)};return n(e||t.jQuery),i}),function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},n=i[t]=i[t]||[];return-1==n.indexOf(e)&&n.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},n=i[t]=i[t]||{};return n[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var n=i.indexOf(e);return-1!=n&&i.splice(n,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){i=i.slice(0),e=e||[];for(var n=this._onceEvents&&this._onceEvents[t],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(t,r),delete n[r]),r.apply(this,e)}return this}},e.allOff=function(){delete this._events,delete this._onceEvents},t}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("get-size/get-size",[],function(){return e()}):"object"==typeof module&&module.exports?module.exports=e():t.getSize=e()}(window,function(){"use strict";function t(t){var e=parseFloat(t),i=-1==t.indexOf("%")&&!isNaN(e);return i&&e}function e(){}function i(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0;u>e;e++){var i=h[e];t[i]=0}return t}function n(t){var e=getComputedStyle(t);return e||a("Style returned "+e+". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"),e}function o(){if(!d){d=!0;var e=document.createElement("div");e.style.width="200px",e.style.padding="1px 2px 3px 4px",e.style.borderStyle="solid",e.style.borderWidth="1px 2px 3px 4px",e.style.boxSizing="border-box";var i=document.body||document.documentElement;i.appendChild(e);var o=n(e);r.isBoxSizeOuter=s=200==t(o.width),i.removeChild(e)}}function r(e){if(o(),"string"==typeof e&&(e=document.querySelector(e)),e&&"object"==typeof e&&e.nodeType){var r=n(e);if("none"==r.display)return i();var a={};a.width=e.offsetWidth,a.height=e.offsetHeight;for(var d=a.isBorderBox="border-box"==r.boxSizing,l=0;u>l;l++){var c=h[l],f=r[c],m=parseFloat(f);a[c]=isNaN(m)?0:m}var p=a.paddingLeft+a.paddingRight,g=a.paddingTop+a.paddingBottom,y=a.marginLeft+a.marginRight,v=a.marginTop+a.marginBottom,_=a.borderLeftWidth+a.borderRightWidth,z=a.borderTopWidth+a.borderBottomWidth,E=d&&s,b=t(r.width);b!==!1&&(a.width=b+(E?0:p+_));var x=t(r.height);return x!==!1&&(a.height=x+(E?0:g+z)),a.innerWidth=a.width-(p+_),a.innerHeight=a.height-(g+z),a.outerWidth=a.width+y,a.outerHeight=a.height+v,a}}var s,a="undefined"==typeof console?e:function(t){console.error(t)},h=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"],u=h.length,d=!1;return r}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("desandro-matches-selector/matches-selector",e):"object"==typeof module&&module.exports?module.exports=e():t.matchesSelector=e()}(window,function(){"use strict";var t=function(){var t=window.Element.prototype;if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0;i<e.length;i++){var n=e[i],o=n+"MatchesSelector";if(t[o])return o}}();return function(e,i){return e[t](i)}}),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["desandro-matches-selector/matches-selector"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.matchesSelector)}(window,function(t,e){var i={};i.extend=function(t,e){for(var i in e)t[i]=e[i];return t},i.modulo=function(t,e){return(t%e+e)%e},i.makeArray=function(t){var e=[];if(Array.isArray(t))e=t;else if(t&&"object"==typeof t&&"number"==typeof t.length)for(var i=0;i<t.length;i++)e.push(t[i]);else e.push(t);return e},i.removeFrom=function(t,e){var i=t.indexOf(e);-1!=i&&t.splice(i,1)},i.getParent=function(t,i){for(;t.parentNode&&t!=document.body;)if(t=t.parentNode,e(t,i))return t},i.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},i.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},i.filterFindElements=function(t,n){t=i.makeArray(t);var o=[];return t.forEach(function(t){if(t instanceof HTMLElement){if(!n)return void o.push(t);e(t,n)&&o.push(t);for(var i=t.querySelectorAll(n),r=0;r<i.length;r++)o.push(i[r])}}),o},i.debounceMethod=function(t,e,i){var n=t.prototype[e],o=e+"Timeout";t.prototype[e]=function(){var t=this[o];t&&clearTimeout(t);var e=arguments,r=this;this[o]=setTimeout(function(){n.apply(r,e),delete r[o]},i||100)}},i.docReady=function(t){var e=document.readyState;"complete"==e||"interactive"==e?setTimeout(t):document.addEventListener("DOMContentLoaded",t)},i.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var n=t.console;return i.htmlInit=function(e,o){i.docReady(function(){var r=i.toDashed(o),s="data-"+r,a=document.querySelectorAll("["+s+"]"),h=document.querySelectorAll(".js-"+r),u=i.makeArray(a).concat(i.makeArray(h)),d=s+"-options",l=t.jQuery;u.forEach(function(t){var i,r=t.getAttribute(s)||t.getAttribute(d);try{i=r&&JSON.parse(r)}catch(a){return void(n&&n.error("Error parsing "+s+" on "+t.className+": "+a))}var h=new e(t,i);l&&l.data(t,o,h)})})},i}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/item",["ev-emitter/ev-emitter","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("ev-emitter"),require("get-size")):(t.Outlayer={},t.Outlayer.Item=e(t.EvEmitter,t.getSize))}(window,function(t,e){"use strict";function i(t){for(var e in t)return!1;return e=null,!0}function n(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}function o(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}var r=document.documentElement.style,s="string"==typeof r.transition?"transition":"WebkitTransition",a="string"==typeof r.transform?"transform":"WebkitTransform",h={WebkitTransition:"webkitTransitionEnd",transition:"transitionend"}[s],u={transform:a,transition:s,transitionDuration:s+"Duration",transitionProperty:s+"Property",transitionDelay:s+"Delay"},d=n.prototype=Object.create(t.prototype);d.constructor=n,d._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},d.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},d.getSize=function(){this.size=e(this.element)},d.css=function(t){var e=this.element.style;for(var i in t){var n=u[i]||i;e[n]=t[i]}},d.getPosition=function(){var t=getComputedStyle(this.element),e=this.layout._getOption("originLeft"),i=this.layout._getOption("originTop"),n=t[e?"left":"right"],o=t[i?"top":"bottom"],r=this.layout.size,s=-1!=n.indexOf("%")?parseFloat(n)/100*r.width:parseInt(n,10),a=-1!=o.indexOf("%")?parseFloat(o)/100*r.height:parseInt(o,10);s=isNaN(s)?0:s,a=isNaN(a)?0:a,s-=e?r.paddingLeft:r.paddingRight,a-=i?r.paddingTop:r.paddingBottom,this.position.x=s,this.position.y=a},d.layoutPosition=function(){var t=this.layout.size,e={},i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop"),o=i?"paddingLeft":"paddingRight",r=i?"left":"right",s=i?"right":"left",a=this.position.x+t[o];e[r]=this.getXValue(a),e[s]="";var h=n?"paddingTop":"paddingBottom",u=n?"top":"bottom",d=n?"bottom":"top",l=this.position.y+t[h];e[u]=this.getYValue(l),e[d]="",this.css(e),this.emitEvent("layout",[this])},d.getXValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&!e?t/this.layout.size.width*100+"%":t+"px"},d.getYValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&e?t/this.layout.size.height*100+"%":t+"px"},d._transitionTo=function(t,e){this.getPosition();var i=this.position.x,n=this.position.y,o=parseInt(t,10),r=parseInt(e,10),s=o===this.position.x&&r===this.position.y;if(this.setPosition(t,e),s&&!this.isTransitioning)return void this.layoutPosition();var a=t-i,h=e-n,u={};u.transform=this.getTranslate(a,h),this.transition({to:u,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},d.getTranslate=function(t,e){var i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop");return t=i?t:-t,e=n?e:-e,"translate3d("+t+"px, "+e+"px, 0)"},d.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},d.moveTo=d._transitionTo,d.setPosition=function(t,e){this.position.x=parseInt(t,10),this.position.y=parseInt(e,10)},d._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},d.transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(t);var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var n=this.element.offsetHeight;n=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var l="opacity,"+o(a);d.enableTransition=function(){if(!this.isTransitioning){var t=this.layout.options.transitionDuration;t="number"==typeof t?t+"ms":t,this.css({transitionProperty:l,transitionDuration:t,transitionDelay:this.staggerDelay||0}),this.element.addEventListener(h,this,!1)}},d.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},d.onotransitionend=function(t){this.ontransitionend(t)};var c={"-webkit-transform":"transform"};d.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,n=c[t.propertyName]||t.propertyName;if(delete e.ingProperties[n],i(e.ingProperties)&&this.disableTransition(),n in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[n]),n in e.onEnd){var o=e.onEnd[n];o.call(this),delete e.onEnd[n]}this.emitEvent("transitionEnd",[this])}},d.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(h,this,!1),this.isTransitioning=!1},d._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var f={transitionProperty:"",transitionDuration:"",transitionDelay:""};return d.removeTransitionStyles=function(){this.css(f)},d.stagger=function(t){t=isNaN(t)?0:t,this.staggerDelay=t+"ms"},d.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},d.remove=function(){return s&&parseFloat(this.layout.options.transitionDuration)?(this.once("transitionEnd",function(){this.removeElem()}),void this.hide()):void this.removeElem()},d.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("visibleStyle");e[i]=this.onRevealTransitionEnd,this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0,onTransitionEnd:e})},d.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},d.getHideRevealTransitionEndProperty=function(t){var e=this.layout.options[t];if(e.opacity)return"opacity";for(var i in e)return i},d.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("hiddenStyle");e[i]=this.onHideTransitionEnd,this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:e})},d.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},d.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},n}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("outlayer/outlayer",["ev-emitter/ev-emitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(i,n,o,r){return e(t,i,n,o,r)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):t.Outlayer=e(t,t.EvEmitter,t.getSize,t.fizzyUIUtils,t.Outlayer.Item)}(window,function(t,e,i,n,o){"use strict";function r(t,e){var i=n.getQueryElement(t);if(!i)return void(h&&h.error("Bad element for "+this.constructor.namespace+": "+(i||t)));this.element=i,u&&(this.$element=u(this.element)),this.options=n.extend({},this.constructor.defaults),this.option(e);var o=++l;this.element.outlayerGUID=o,c[o]=this,this._create();var r=this._getOption("initLayout");r&&this.layout()}function s(t){function e(){t.apply(this,arguments)}return e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e}function a(t){if("number"==typeof t)return t;var e=t.match(/(^\d*\.?\d*)(\w*)/),i=e&&e[1],n=e&&e[2];if(!i.length)return 0;i=parseFloat(i);var o=m[n]||1;return i*o}var h=t.console,u=t.jQuery,d=function(){},l=0,c={};r.namespace="outlayer",r.Item=o,r.defaults={containerStyle:{position:"relative"},initLayout:!0,originLeft:!0,originTop:!0,resize:!0,resizeContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}};var f=r.prototype;n.extend(f,e.prototype),f.option=function(t){n.extend(this.options,t)},f._getOption=function(t){var e=this.constructor.compatOptions[t];return e&&void 0!==this.options[e]?this.options[e]:this.options[t]},r.compatOptions={initLayout:"isInitLayout",horizontal:"isHorizontal",layoutInstant:"isLayoutInstant",originLeft:"isOriginLeft",originTop:"isOriginTop",resize:"isResizeBound",resizeContainer:"isResizingContainer"},f._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),n.extend(this.element.style,this.options.containerStyle);var t=this._getOption("resize");t&&this.bindResize()},f.reloadItems=function(){this.items=this._itemize(this.element.children)},f._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,n=[],o=0;o<e.length;o++){var r=e[o],s=new i(r,this);n.push(s)}return n},f._filterFindItemElements=function(t){return n.filterFindElements(t,this.options.itemSelector)},f.getItemElements=function(){return this.items.map(function(t){return t.element})},f.layout=function(){this._resetLayout(),this._manageStamps();var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;this.layoutItems(this.items,e),this._isLayoutInited=!0},f._init=f.layout,f._resetLayout=function(){this.getSize()},f.getSize=function(){this.size=i(this.element)},f._getMeasurement=function(t,e){var n,o=this.options[t];o?("string"==typeof o?n=this.element.querySelector(o):o instanceof HTMLElement&&(n=o),this[t]=n?i(n)[e]:o):this[t]=0},f.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},f._getItemsForLayout=function(t){return t.filter(function(t){return!t.isIgnored})},f._layoutItems=function(t,e){if(this._emitCompleteOnItems("layout",t),t&&t.length){var i=[];t.forEach(function(t){var n=this._getItemLayoutPosition(t);n.item=t,n.isInstant=e||t.isLayoutInstant,i.push(n)},this),this._processLayoutQueue(i)}},f._getItemLayoutPosition=function(){return{x:0,y:0}},f._processLayoutQueue=function(t){this.updateStagger(),t.forEach(function(t,e){this._positionItem(t.item,t.x,t.y,t.isInstant,e)},this)},f.updateStagger=function(){var t=this.options.stagger;return null===t||void 0===t?void(this.stagger=0):(this.stagger=a(t),this.stagger)},f._positionItem=function(t,e,i,n,o){n?t.goTo(e,i):(t.stagger(o*this.stagger),t.moveTo(e,i))},f._postLayout=function(){this.resizeContainer()},f.resizeContainer=function(){var t=this._getOption("resizeContainer");if(t){var e=this._getContainerSize();e&&(this._setContainerMeasure(e.width,!0),this._setContainerMeasure(e.height,!1))}},f._getContainerSize=d,f._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},f._emitCompleteOnItems=function(t,e){function i(){o.dispatchEvent(t+"Complete",null,[e])}function n(){s++,s==r&&i()}var o=this,r=e.length;if(!e||!r)return void i();var s=0;e.forEach(function(e){e.once(t,n)})},f.dispatchEvent=function(t,e,i){var n=e?[e].concat(i):i;if(this.emitEvent(t,n),u)if(this.$element=this.$element||u(this.element),e){var o=u.Event(e);o.type=t,this.$element.trigger(o,i)}else this.$element.trigger(t,i)},f.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},f.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},f.stamp=function(t){t=this._find(t),t&&(this.stamps=this.stamps.concat(t),t.forEach(this.ignore,this))},f.unstamp=function(t){t=this._find(t),t&&t.forEach(function(t){n.removeFrom(this.stamps,t),this.unignore(t)},this)},f._find=function(t){return t?("string"==typeof t&&(t=this.element.querySelectorAll(t)),t=n.makeArray(t)):void 0},f._manageStamps=function(){this.stamps&&this.stamps.length&&(this._getBoundingRect(),this.stamps.forEach(this._manageStamp,this))},f._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},f._manageStamp=d,f._getElementOffset=function(t){var e=t.getBoundingClientRect(),n=this._boundingRect,o=i(t),r={left:e.left-n.left-o.marginLeft,top:e.top-n.top-o.marginTop,right:n.right-e.right-o.marginRight,bottom:n.bottom-e.bottom-o.marginBottom};return r},f.handleEvent=n.handleEvent,f.bindResize=function(){t.addEventListener("resize",this),this.isResizeBound=!0},f.unbindResize=function(){t.removeEventListener("resize",this),this.isResizeBound=!1},f.onresize=function(){this.resize()},n.debounceMethod(r,"onresize",100),f.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},f.needsResizeLayout=function(){var t=i(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},f.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},f.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},f.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},f.reveal=function(t){if(this._emitCompleteOnItems("reveal",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.reveal()})}},f.hide=function(t){if(this._emitCompleteOnItems("hide",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.hide()})}},f.revealItemElements=function(t){var e=this.getItems(t);this.reveal(e)},f.hideItemElements=function(t){var e=this.getItems(t);this.hide(e)},f.getItem=function(t){for(var e=0;e<this.items.length;e++){var i=this.items[e];if(i.element==t)return i}},f.getItems=function(t){t=n.makeArray(t);var e=[];return t.forEach(function(t){var i=this.getItem(t);i&&e.push(i)},this),e},f.remove=function(t){var e=this.getItems(t);this._emitCompleteOnItems("remove",e),e&&e.length&&e.forEach(function(t){t.remove(),n.removeFrom(this.items,t)},this)},f.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="",this.items.forEach(function(t){t.destroy()}),this.unbindResize();var e=this.element.outlayerGUID;delete c[e],delete this.element.outlayerGUID,u&&u.removeData(this.element,this.constructor.namespace)},r.data=function(t){t=n.getQueryElement(t);var e=t&&t.outlayerGUID;return e&&c[e]},r.create=function(t,e){var i=s(r);return i.defaults=n.extend({},r.defaults),n.extend(i.defaults,e),i.compatOptions=n.extend({},r.compatOptions),i.namespace=t,i.data=r.data,i.Item=s(o),n.htmlInit(i,t),u&&u.bridget&&u.bridget(t,i),i};var m={ms:1,s:1e3};return r.Item=o,r}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer"),require("get-size")):t.Masonry=e(t.Outlayer,t.getSize)}(window,function(t,e){var i=t.create("masonry");i.compatOptions.fitWidth="isFitWidth";var n=i.prototype;return n._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns(),this.colYs=[];for(var t=0;t<this.cols;t++)this.colYs.push(0);this.maxY=0,this.horizontalColIndex=0},n.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}var n=this.columnWidth+=this.gutter,o=this.containerWidth+this.gutter,r=o/n,s=n-o%n,a=s&&1>s?"round":"floor";r=Math[a](r),this.cols=Math.max(r,1)},n.getContainerWidth=function(){var t=this._getOption("fitWidth"),i=t?this.element.parentNode:this.element,n=e(i);this.containerWidth=n&&n.innerWidth},n._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,i=e&&1>e?"round":"ceil",n=Math[i](t.size.outerWidth/this.columnWidth);n=Math.min(n,this.cols);for(var o=this.options.horizontalOrder?"_getHorizontalColPosition":"_getTopColPosition",r=this[o](n,t),s={x:this.columnWidth*r.col,y:r.y},a=r.y+t.size.outerHeight,h=n+r.col,u=r.col;h>u;u++)this.colYs[u]=a;return s},n._getTopColPosition=function(t){var e=this._getTopColGroup(t),i=Math.min.apply(Math,e);return{col:e.indexOf(i),y:i}},n._getTopColGroup=function(t){if(2>t)return this.colYs;for(var e=[],i=this.cols+1-t,n=0;i>n;n++)e[n]=this._getColGroupY(n,t);return e},n._getColGroupY=function(t,e){if(2>e)return this.colYs[t];var i=this.colYs.slice(t,t+e);return Math.max.apply(Math,i)},n._getHorizontalColPosition=function(t,e){var i=this.horizontalColIndex%this.cols,n=t>1&&i+t>this.cols;i=n?0:i;var o=e.size.outerWidth&&e.size.outerHeight;return this.horizontalColIndex=o?i+t:this.horizontalColIndex,{col:i,y:this._getColGroupY(i,t)}},n._manageStamp=function(t){var i=e(t),n=this._getElementOffset(t),o=this._getOption("originLeft"),r=o?n.left:n.right,s=r+i.outerWidth,a=Math.floor(r/this.columnWidth);a=Math.max(0,a);var h=Math.floor(s/this.columnWidth);h-=s%this.columnWidth?0:1,h=Math.min(this.cols-1,h);for(var u=this._getOption("originTop"),d=(u?n.top:n.bottom)+i.outerHeight,l=a;h>=l;l++)this.colYs[l]=Math.max(d,this.colYs[l])},n._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this._getOption("fitWidth")&&(t.width=this._getContainerFitWidth()),t},n._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},n.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!=this.containerWidth},i});

//Initialize
jQuery(function($) {
    /*Detect touch device*/
    var tryTouch;
    try {
        document.createEvent("TouchEvent");
        tryTouch = 1;
    } catch (e) {
        tryTouch = 0;
    }
    /*Browser detection*/
    var $is_mobile = false;
    var $is_tablet = false;
    var $is_pc = false;
    if ($(window).width() < 600) {
        $is_mobile = true;
    } else if ($(window).width() < 1000) {
        $is_tablet = true;
    } else {
        $is_pc = true;
    }
	if ($(window).width() < 1000) {
		$('.searchWidget').removeClass('hide');
		 $('.searchWidget').clone().appendTo('.search-now-clone');       
		 $('.header > .searchWidget').remove();
		 
	}
    $('.tags').tagsInput({
        width: '100%',
        height: '44px'
    });
    $(".select").minimalect();
 	$(".pv_pop ,[rel=popover], .doPop").popover(); 
	$('.pv_tip, .tipN, .tipS, .tipW, .tipE').tooltip({
    'trigger' : 'hover'
    }); 
    $('#share-embed-code, #share-embed-code-small, #share-embed-code-large, #share-this-link').tooltip({
        'trigger': 'focus'
    });
	$('#myTab a,#myTabs a').click(function (e) {
     e.preventDefault();
     $(this).tab('show');
    });
  
    $('.dropdown-toggle').dropdown();
    var bodyHeight = $(window).height();
    var convBody = bodyHeight - 164;
    $('.app-message-chats').slimScroll({
        height: convBody,
        size: 9,
        start: 'bottom',
        color: '#a3afb7',
        railOpacity: 0.45,
        wheelStep : 16,
        touchScrollStep : 75,
        allowPageScroll: false
    });
    $('.page-aside-inner ').slimScroll({
        height: convBody,
        size: 5,
        start: 'top',
        color: '#a3afb7',
        railOpacity: 0.2
    });
	
    
    /* Ajax forms */
    $('.ajax-form').ajaxForm({
        target: '.ajax-form-result',
        success: function(data) {
            $('.ajax-form').hide();
        }
    });
    $('.ajax-form-video').ajaxForm({
		beforeSubmit: function() {
			$('.ajax-form-video').validator('validate');
		},
        target: '.ajax-form-result',
        success: function(data) {}
    });
    /* Infinite scroll for videos */
    var $container = $('.loop-content:last');
    if ($('#page_nav').html()) {
        $container.infiniteScroll({
                path: '#page_nav a', 
                append: '.video', 
				status: '.page-load-status',
                history: 'push'
            },
            function(newElements) {
                var $newElems = jQuery(newElements).hide(); // hide to begin with
                // ensure that images load before adding to layout
                $newElems.imagesLoaded(function() {
                    $newElems.fadeIn(); // fade in when ready	
                });
            });
    };
	/* Infinite scroll for comments */
    var $comstainer = $('ul.comments');
    if ($('#page_nav').html()) {
		var $ComsPath = $('#page_nav a').attr("href").slice(0,-1) +'{{#}}';
        $comstainer.infiniteScroll({
				path: '#page_nav a',
                append: '.comment-0', 
				status: '.page-load-status',
				button: '.view-more-button',
				scrollThreshold: false,
                history: false
            },
            function(newElements) {
                var $newElems = jQuery(newElements).hide(); // hide to begin with
                // ensure that images load before adding to layout
                $newElems.imagesLoaded(function() {
                    $newElems.fadeIn(); // fade in when ready										
                });
				
            });
    };
	$comstainer.on( 'append.infiniteScroll', function( ) {	
	$('.tipS').tooltip();
                       $('.deleteCom').on({
						mouseenter: function () {
						   $(this).parent().closest('li').addClass('indanger');
						},
						mouseleave: function () {
							$(this).parent().closest('li').removeClass('indanger');
						}
					   });
	});

    /* Infinite scroll for music */
    var $mcontainer = $('ul.songs');
    if ($('#page_nav').html()) {
        $mcontainer.infiniteScroll({
                history: false,
                path: '#page_nav a', // selector for the NEXT link (to page 2)
                append: 'li.song', // selector for all items you'll retrieve
                bufferPx: 60,
                loading: {
                    msgText: 'Loading next',
                    finishedMsg: 'The End.',
                    img: site_url + 'tpl/main/images/load.gif'
                }
            },
            function(newmElements) {
                var $newmElems = jQuery(newmElements).hide(); // hide to begin with
                // ensure that images load before adding to layout
                $newmElems.imagesLoaded(function() {
                    $newmElems.fadeIn(); // fade in when ready	
                });
            });
    };
  
  
    if ($('#home-content').html()) {
        setTimeout(function() {
            $('.loop-content, .gfluid').removeClass('hide');
            $('.homeLoader').hide();
        }, 600);
    }
	if($('p[class="empty-content"]').html()) {
		$("#imagelist-content").removeClass('hides');
			$(".removeonload").remove();	
		}
    if ($('.gfluid').html()) {
        /* Gallery grid */
      	
		$(".gfluid").imagesLoaded(function() {			
			var $mgrid = $(".gfluid").masonry({
           //columnWidth: $gitem,
           itemSelector: '.image-item',
		   isAnimated: true,
		   stagger: 30
        });
			$("#imagelist-content").removeClass('hides');
			$(".removeonload").remove();
		

        /* Infinite scroll for image gallery */
        var $igcontainer = $('.gfluid');
		var msnry = $mgrid.data('masonry');

        if ($('#page_nav').html() && !$igcontainer.hasClass('noInf')) {
            $igcontainer.infiniteScroll({
                    history: 'push',
                    path: '#page_nav a', 
                    append: '.image-item',
					status: '.page-load-status',
					outlayer: msnry                 
                },
                function(newmElements) {
                    var $newigElems = jQuery(newmElements).hide(); // hide to begin with
                    // ensure that images load before adding to layout
                    $newigElems.imagesLoaded(function() {
                        //$newigElems.fadeIn(); // fade in when ready	
                 $mgrid.masonry().append( elem ).masonry( 'appended', $newigElems ).masonry();
                 $mgrid.masonry('layout');
                    });
                });
        };
		});
        /* End gallery */
    }
	
    /* Size categories */
	if ($('.load-cats').html()) {
	var catType = $('.load-cats').data('type');	
	var catUrl = site_url + 'api/categories?list=' + catType;	
	$(".load-cats").load(catUrl, function() {
    if ($('.cats').html()) {
		$('.NoAvatar').initial({charCount:1}); 
        if ($is_mobile || $is_tablet ) {
		var $size = parseInt($(".cats").width());	
		} else {
        var $size = parseInt($(".cats").width() - 42);
		}
        $('.cats').css({
            right: "-" + $size + "px"
        });
        $('.cats').prepend('<span class="cats-pull opull-left"><i class="material-icons">&#xE314;</i></span>');
        //Cats bar
        $(".cats-pull").click(function() {
            $(".cats").toggleClass("cats-visible");
            if ($(".cats-pull").hasClass("opull-left")) {
                $(".cats").css({
                    right: 0
                });
            } else {
                $('.cats').css({
                    right: "-" + $size + "px"
                });
            }
            $(".cats-pull").toggleClass("opull-left").toggleClass("opull-right");
			$(".cats-pull.opull-left").html('<i class="material-icons">&#xE314;</i>');
			$(".cats-pull.opull-right").html('<i class="material-icons">&#xE315;</i>');
        });
		
        //Cats scroll
        var catsBody = parseInt($(".cats").height() - 2);
        $('.cats-inner').slimScroll({
            height: catsBody,
            size: 5,
            color: '#a3afb7',
            railOpacity: 0.2,
            wheelStep: 20,
			touchScrollStep : 75,
            allowPageScroll: false
        });
		
    }
	});	
	 }
    $('#searchform input').blur(function()
    {
        if ($(this).val()) {
            $('#searchform input').removeClass('empty');
        }
        if (!$(this).val()) {
            $('#searchform input').addClass('empty');
        }
    });
    /* END */
});
$(window).resize(function() {
    if ($(window).width() < 1530) {
        $("#sidebar").addClass("hide");
		 $("#wrapper").removeClass('haside');
    }
  
    //Goes both ways
    if ($(window).width() > 1000) {
        if ($(".searchWidget").hasClass("hide")) {
            $(".searchWidget").removeClass("hide");
        }
    }
    //Chat app resize
    var bodyHeight = $(window).height();
    var convBody = bodyHeight - 178;
    $('.app-message-chats').slimScroll({
        height: convBody,
        start: 'bottom'
    });
    $('.page-aside-inner ').slimScroll({
        height: convBody,
        start: 'top'
    });
});
/*! Ripple */
!function(t){t.fn.ripple=function(e){if(this.length>1)return this.each(function(n,i){t(i).ripple(e)});if(e=e||{},this.off(".ripple").data("unbound",!0),e.unbind)return this;var n=function(){return d&&!d.data("unbound")};this.addClass("legitRipple").removeData("unbound").on("tap.ripple",function(e){n()||(d=t(this),w(e.coords))}).on("dragstart.ripple",function(t){g.allowDragging||t.preventDefault()}),t(document).on("move.ripple",function(t){n()&&b(t.coords)}).on("end.ripple",function(){n()&&y()}),t(window).on("scroll.ripple",function(t){n()&&y()});var i,o,a,r,s=function(t){return!!t.type.match(/^touch/)},l=function(t,e){return s(t)&&(t=c(t.originalEvent.touches,e)),[t.pageX,t.pageY]},c=function(e,n){return t.makeArray(e).filter(function(t,e){return t.identifier==n})[0]},p=0,u=function(t){"touchstart"==t.type&&(p=3),"scroll"==t.type&&(p=0);var e=p&&!s(t);return e&&p--,!e};this.on("mousedown.ripple touchstart.ripple",function(e){u(e)&&(i=s(e)?e.originalEvent.changedTouches[0].identifier:-1,o=t(this),a=t.Event("tap",{coords:l(e,i)}),~i?r=setTimeout(function(){o.trigger(a),r=null},g.touchDelay):o.trigger(a))}),t(document).on("mousemove.ripple touchmove.ripple mouseup.ripple touchend.ripple touchcancel.ripple",function(e){var n=e.type.match(/move/);r&&!n&&(clearTimeout(r),r=null,o.trigger(a)),u(e)&&(s(e)?c(e.originalEvent.changedTouches,i):!~i)&&t(this).trigger(n?t.Event("move",{coords:l(e,i)}):"end")}).on("contextmenu.ripple",function(t){u(t)}).on("touchmove",function(){clearTimeout(r),r=null});var d,f,h,m,g={},v=0,x=function(){var n={fixedPos:null,get dragging(){return!g.fixedPos},get adaptPos(){return g.dragging},get maxDiameter(){return Math.sqrt(Math.pow(h[0],2)+Math.pow(h[1],2))/d.outerWidth()*Math.ceil(g.adaptPos?100:200)+"%"},scaleMode:"fixed",template:null,allowDragging:!1,touchDelay:100,callback:null};t.each(n,function(t,n){g[t]=t in e?e[t]:n})},w=function(e){h=[d.outerWidth(),d.outerHeight()],x(),m=e,f=t("<span/>").addClass("legitRipple-ripple"),g.template&&f.append(("object"==typeof g.template?g.template:d.children(".legitRipple-template").last()).clone().removeClass("legitRipple-template")).addClass("legitRipple-custom"),f.appendTo(d),D(e,!1);var n=f.css("transition-duration").split(","),i=[5.5*parseFloat(n[0])+"s"].concat(n.slice(1)).join(",");f.css("transition-duration",i).css("width",g.maxDiameter),f.on("transitionend webkitTransitionEnd oTransitionEnd",function(){t(this).data("oneEnded")?t(this).off().remove():t(this).data("oneEnded",!0)})},b=function(t){var e;if(v++,"proportional"===g.scaleMode){var n=Math.pow(v,v/100*.6);e=n>40?40:n}else if("fixed"==g.scaleMode&&Math.abs(t[1]-m[1])>6)return void y();D(t,e)},y=function(){f.css("width",f.css("width")).css("transition","none").css("transition","").css("width",f.css("width")).css("width",g.maxDiameter).css("opacity","0"),d=null,v=0},D=function(e,n){var i=[],o=g.fixedPos===!0?[.5,.5]:[(g.fixedPos?g.fixedPos[0]:e[0]-d.offset().left)/h[0],(g.fixedPos?g.fixedPos[1]:e[1]-d.offset().top)/h[1]],a=[.5-o[0],.5-o[1]],r=[100/parseFloat(g.maxDiameter),100/parseFloat(g.maxDiameter)*(h[1]/h[0])],s=[a[0]*r[0],a[1]*r[1]],l=g.dragging||0===v;if(l&&"inline"==d.css("display")){var c=t("<span/>").text("Hi!").css("font-size",0).prependTo(d),p=c.offset().left;c.remove(),i=[e[0]-p+"px",e[1]-d.offset().top+"px"]}l&&f.css("left",i[0]||100*o[0]+"%").css("top",i[1]||100*o[1]+"%"),f.css("transform","translate3d(-50%, -50%, 0)"+(g.adaptPos?"translate3d("+100*s[0]+"%, "+100*s[1]+"%, 0)":"")+(n?"scale("+n+")":"")),g.callback&&g.callback(d,f,o,g.maxDiameter)};return this},t.ripple=function(e){t.each(e,function(e,n){t(e).ripple(n)})},t.ripple.destroy=function(){t(".legitRipple").removeClass("legitRipple").add(window).add(document).off(".ripple"),t(".legitRipple-ripple").remove()}}(jQuery);
//Initial plugin
 !function(e){var t=function(e,t){var a,n=e.charCodeAt(t);return 55296>n||n>56319||e.length<=t+1||(a=e.charCodeAt(t+1),56320>a||a>57343)?e[t]:e.substring(t,t+2)},a=function(e,a,n){for(var i,r="",o=0,c=0,d=e.length;d>o;)i=t(e,o),c>=a&&n>c&&(r+=i),o+=i.length,c+=1;return r};e.fn.initial=function(t){var n,i=["#1abc9c","#16a085","#f1c40f","#f39c12","#2ecc71","#27ae60","#e67e22","#d35400","#3498db","#2980b9","#e74c3c","#c0392b","#9b59b6","#8e44ad","#bdc3c7","#34495e","#2c3e50","#95a5a6","#7f8c8d","#ec87bf","#d870ad","#f69785","#9ba37e","#b49255","#b49255","#a94136"];return this.each(function(){var r=e(this),o=e.extend({name:"Name",color:null,seed:0,charCount:1,textColor:"#ffffff",height:100,width:100,fontSize:60,fontWeight:400,fontFamily:"HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica, Arial,Lucida Grande, sans-serif",radius:0},t);o=e.extend(o,r.data());var c=a(o.name,0,o.charCount).toUpperCase(),d=e('<text text-anchor="middle"></text>').attr({y:"50%",x:"50%",dy:"0.35em","pointer-events":"auto",fill:o.textColor,"font-family":o.fontFamily}).html(c).css({"font-weight":o.fontWeight,"font-size":o.fontSize+"px"});if(null==o.color){var h=Math.floor((c.charCodeAt(0)+o.seed)%i.length);n=i[h]}else n=o.color;var f=e("<svg></svg>").attr({xmlns:"http://www.w3.org/2000/svg","pointer-events":"none",width:o.width,height:o.height}).css({"background-color":n,width:o.width+"px",height:o.height+"px","border-radius":o.radius+"px","-moz-border-radius":o.radius+"px"});f.append(d);var l=window.btoa(unescape(encodeURIComponent(e("<div>").append(f.clone()).html())));r.attr("src","data:image/svg+xml;base64,"+l)})}}(jQuery);
// jquery.alertable.js - Minimal alert, confirmation, and prompt alternatives.  Developed by Cory LaViska for A Beautiful Site, LLC
// alert
jQuery&&function(e){"use strict";function t(t,u,s){var d=e.Deferred();return i=document.activeElement,i.blur(),e(l).add(r).remove(),s=e.extend({},e.alertable.defaults,s),l=e(s.modal).hide(),r=e(s.overlay).hide(),n=e(s.okButton),o=e(s.cancelButton),s.html?l.find(".alertable-message").html(u):l.find(".alertable-message").text(u),"prompt"===t?l.find(".alertable-prompt").html(s.prompt):l.find(".alertable-prompt").remove(),e(l).find(".alertable-buttons").append("alert"===t?"":o).append(n),e(s.container).append(r).append(l),s.show.call({modal:l,overlay:r}),"prompt"===t?e(l).find(".alertable-prompt :input:first").focus():e(l).find(':input[type="submit"]').focus(),e(l).on("submit.alertable",function(r){var n,o,i=[];if(r.preventDefault(),"prompt"===t)for(o=e(l).serializeArray(),n=0;n<o.length;n++)i[o[n].name]=o[n].value;else i=null;a(s),d.resolve(i)}),o.on("click.alertable",function(){a(s),d.reject()}),e(document).on("keydown.alertable",function(e){27===e.keyCode&&(e.preventDefault(),a(s),d.reject())}),e(document).on("focus.alertable","*",function(t){e(t.target).parents().is(".alertable")||(t.stopPropagation(),t.target.blur(),e(l).find(":input:first").focus())}),d.promise()}function a(t){t.hide.call({modal:l,overlay:r}),e(document).off(".alertable"),l.off(".alertable"),o.off(".alertable"),i.focus()}var l,r,n,o,i;e.alertable={alert:function(e,a){return t("alert",e,a)},confirm:function(e,a){return t("confirm",e,a)},prompt:function(e,a){return t("prompt",e,a)},defaults:{container:"body",html:!1,cancelButton:'<button class="alertable-cancel btn btn-default" type="button">Cancel</button>',okButton:'<button class="alertable-ok btn btn-primary" type="submit">OK</button>',overlay:'<div class="alertable-overlay"></div>',prompt:'<input class="alertable-input" type="text" name="value">',modal:'<form class="alertable"><div class="alertable-message"></div><div class="alertable-prompt"></div><div class="alertable-buttons"></div></form>',hide:function(){e(this.modal).add(this.overlay).fadeOut(100)},show:function(){e(this.modal).add(this.overlay).fadeIn(100)}}}}(jQuery);
/*!
 * @preserve  *  * Readmore.js jQuery plugin  * Author: @jed_foster  * Project home: http://jedfoster.github.io/Readmore.js
 * Licensed under the MIT license  *  * Debounce function from http://davidwalsh.name/javascript-debounce-function  */
!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){"use strict";function e(t,e,i){var o;return function(){var n=this,a=arguments,s=function(){o=null,i||t.apply(n,a)},r=i&&!o;clearTimeout(o),o=setTimeout(s,e),r&&t.apply(n,a)}}function i(t){var e=++h;return String(null==t?"rmjs-":t)+e}function o(t){var e=t.clone().css({height:"auto",width:t.width(),maxHeight:"none",overflow:"hidden"}).insertAfter(t),i=e.outerHeight(),o=parseInt(e.css({maxHeight:""}).css("max-height").replace(/[^-\d\.]/g,""),10),n=t.data("defaultHeight");e.remove();var a=o||t.data("collapsedHeight")||n;t.data({expandedHeight:i,maxHeight:o,collapsedHeight:a}).css({maxHeight:"none"})}function n(t){if(!d[t.selector]){var e=" ";t.embedCSS&&""!==t.blockCSS&&(e+=t.selector+" + [data-readmore-toggle], "+t.selector+"[data-readmore]{"+t.blockCSS+"}"),e+=t.selector+"[data-readmore]{transition: height "+t.speed+"ms;overflow: hidden;}",function(t,e){var i=t.createElement("style");i.type="text/css",i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),t.getElementsByTagName("head")[0].appendChild(i)}(document,e),d[t.selector]=!0}}function a(e,i){this.element=e,this.options=t.extend({},r,i),n(this.options),this._defaults=r,this._name=s,this.init(),window.addEventListener?(window.addEventListener("load",c),window.addEventListener("resize",c)):(window.attachEvent("load",c),window.attachEvent("resize",c))}var s="readmore",r={speed:100,collapsedHeight:200,heightMargin:16,moreLink:'<a href="#">Read More</a>',lessLink:'<a href="#">Close</a>',embedCSS:!0,blockCSS:"display: block; width: 100%;",startOpen:!1,blockProcessed:function(){},beforeToggle:function(){},afterToggle:function(){}},d={},h=0,c=e(function(){t("[data-readmore]").each(function(){var e=t(this),i="true"===e.attr("aria-expanded");o(e),e.css({height:e.data(i?"expandedHeight":"collapsedHeight")})})},100);a.prototype={init:function(){var e=t(this.element);e.data({defaultHeight:this.options.collapsedHeight,heightMargin:this.options.heightMargin}),o(e);var n=e.data("collapsedHeight"),a=e.data("heightMargin");if(e.outerHeight(!0)<=n+a)return this.options.blockProcessed&&"function"==typeof this.options.blockProcessed&&this.options.blockProcessed(e,!1),!0;var s=e.attr("id")||i(),r=this.options.startOpen?this.options.lessLink:this.options.moreLink;e.attr({"data-readmore":"","aria-expanded":this.options.startOpen,id:s}),e.after(t(r).on("click",function(t){return function(i){t.toggle(this,e[0],i)}}(this)).attr({"data-readmore-toggle":s,"aria-controls":s})),this.options.startOpen||e.css({height:n}),this.options.blockProcessed&&"function"==typeof this.options.blockProcessed&&this.options.blockProcessed(e,!0)},toggle:function(e,i,o){o&&o.preventDefault(),e||(e=t('[aria-controls="'+this.element.id+'"]')[0]),i||(i=this.element);var n=t(i),a="",s="",r=!1,d=n.data("collapsedHeight");n.height()<=d?(a=n.data("expandedHeight")+"px",s="lessLink",r=!0):(a=d,s="moreLink"),this.options.beforeToggle&&"function"==typeof this.options.beforeToggle&&this.options.beforeToggle(e,n,!r),n.css({height:a}),n.on("transitionend",function(i){return function(){i.options.afterToggle&&"function"==typeof i.options.afterToggle&&i.options.afterToggle(e,n,r),t(this).attr({"aria-expanded":r}).off("transitionend")}}(this)),t(e).replaceWith(t(this.options[s]).on("click",function(t){return function(e){t.toggle(this,i,e)}}(this)).attr({"data-readmore-toggle":n.attr("id"),"aria-controls":n.attr("id")}))},destroy:function(){t(this.element).each(function(){var e=t(this);e.attr({"data-readmore":null,"aria-expanded":null}).css({maxHeight:"",height:""}).next("[data-readmore-toggle]").remove(),e.removeData()})}},t.fn.readmore=function(e){var i=arguments,o=this.selector;return e=e||{},"object"==typeof e?this.each(function(){if(t.data(this,"plugin_"+s)){var i=t.data(this,"plugin_"+s);i.destroy.apply(i)}e.selector=o,t.data(this,"plugin_"+s,new a(this,e))}):"string"==typeof e&&"_"!==e[0]&&"init"!==e?this.each(function(){var o=t.data(this,"plugin_"+s);o instanceof a&&"function"==typeof o[e]&&o[e].apply(o,Array.prototype.slice.call(i,1))}):void 0}});
 
var $header = $('.fixed-top'),
    scrollClass = 'on-scroll',
    activateAtY = 125;

function deactivateHeader() {
    if (!$header.hasClass(scrollClass)) {
        $header.addClass(scrollClass);
		$('body').addClass('noheader');
    }
}

function activateHeader() {
    if ($header.hasClass(scrollClass)) {
        $header.removeClass(scrollClass);
		$('body').removeClass('noheader');
    }
}

$(window).scroll(function() {
    if($(window).scrollTop() > activateAtY) {
        deactivateHeader();
    } else {
        activateHeader();
    }
});
/* Doc ready*/
$(document).ready(function() {
	$('.icon-material,button:not(".vjs-control"):not(".vjs-button"), a.btn').ripple();
	if($(window).width() < 1000) {
		$('body').addClass('isdevice');			
    }
	
	
    //Process image errors
    $('img').error(function() {
         $(this).removeAttr("src").data('name', 'X').addClass("NoAvatar");
    });
	 var rougueAvatars = $('img[src*="def-avatar.jpg"]');
	 $.each( rougueAvatars, function( key, value ) {
	 $(this).removeAttr("src").addClass("NoAvatar");	  
     });
	 $('.NoAvatar').initial({charCount:1}); 
	 //Notifs
    $.getJSON(site_url + "api/noty/", function(data) {
        if (data) {
            if(data.msg) {
            $("li.my-inbox > a").append('<span class="badge badge-danger pull-right">'+ data.msg + '</span>');
			}	
            if(data.buzz) {
			$("a#notifs").append('<span class="badge badge-primary">'+ data.buzz + '</span>');
			}
			 var $da =  parseInt(data.msg);
			 var $db =  parseInt(data.buzz);
             var $dc = 	$da + $db;		
			if($dc > 0) {
			$("a#openusr").prepend('<span class="badge badge-success pull-right">'+ $dc + '</span>');
			}
        }
    }).error(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + textStatus);
        console.log("incoming Text " + jqXHR.responseText);
    });
	
	// Hide owl on mobiles	
    $(".owl-carousel").owlCarousel({
	  responsiveClass:true,
        items: 1,
        navigation: true,
		navText: ["<i class='material-icons icon-white'>&#xE314;</i>","<i class='material-icons icon-white'>&#xE315;</i>"],
		loop : true,
		 lazyLoad:true,
       responsive:{
        0:{
            items:1,
            nav:true
        },
		460:{
            items:2,
            nav:true
        },
        668:{
            items:3,
            nav:true
        },
		920:{
            items:4,
            nav:true
        },
        1200:{
            items:5,
            nav:true,
            loop:true
        }
		,
        1600:{
            items:6,
            nav:true,
            loop:true
        }
    }
    });
    if ($(window).width() < 1530) {
        $("#sidebar").addClass("hide");
		 $("#wrapper").removeClass('haside');
    }
   
    //Chat
	
$("#insertChat").emojioneArea({
    standalone: false,
	 inline: true,
	 hideSource: true,
        autocomplete: true,
		useSprite: false,
		shortnames : true,
		filtersPosition: "bottom"
});
    $(".emoji-holder > img").click(function() {
        var emojiT = $(this).attr('title');
        var currentText = $('textarea#insertChat').val();
        $('textarea#insertChat').val(currentText + " :" + emojiT + ": ")
    });
    $("#sendChat").click(function() {
          if ($('textarea#insertChat').val()) {
            var conv = $('.chats').attr("id");
			if ($('textarea#insertChat').parent().find(".emoj-editor").length > 0){
	   var initialTxt = $('textarea#insertChat').parent().find(".emoj-editor").html();		
       var toAddTXT = encodeURIComponent(String.fromHtmlEntities(initialTxt));
	   $('textarea#insertChat').parent().find(".emoj-editor").html('');
		} else {
		var initialTxt =	$('textarea#insertChat').val();
		var toAddTXT = encodeURIComponent(initialTxt);
		}	

            var fakebody = '<div class="chat chat-left animated rollIn">' + $(".dummy-chat").html() + '</div>';
            $('.chats').append(fakebody);
            $(".chat-content:last").html("<p>" + initialTxt + "</p>");
            $('.app-message-chats').slimscroll({
                scrollBy: '39px',
				 start: 'bottom'
            });
           
            $('.tipS').tooltip();
			
            $.post(
                site_url + 'lib/ajax/reply.php', {
                    message: toAddTXT,
                    conversation: conv
                },
                function(data) {
                    if (data.ok > 0) {
                        $('textarea#insertChat').val('');
						$('textarea#insertChat').parent().find(".emoj-editor").html('')
                    } else {
                        $(".chat-content:last").addClass("errored");
                    }
                }, "json");
        } else {
            $('#insertChat').focus();
        }
        return false;
    });
    
    //Kill ad
    $(".close-ad").click(function() {
        $(this).closest(".adx").hide();
    });
    //Add to
    $("#addtolist").click(function() {
        $("#bookit").slideToggle();
    });
    //Disabled comments
    $('textarea#addDisable').on("focus", function() {
        showLogin();
    });
	$('textarea#addDisable').change(function(){
		showLogin();
     });
	$('.deleteCom').on({
    mouseenter: function () {
       $(this).parent().closest('li').addClass('indanger');
    },
    mouseleave: function () {
        $(this).parent().closest('li').removeClass('indanger');
    }
   });
    //Show more desc
    $('#media-description').readmore({
     speed: 75,
	 collapsedHeight: 80,
     moreLink: '<a href="#" class="readmore">'+ $('#media-description').data("small") +' <i class="material-icons">&#xE313;</i></a>',
	 lessLink: '<a href="#" class="readmore">'+ $('#media-description').data("big") +' <i class="material-icons">&#xE316;</i></a>'
    });
	
     //Mobi Share
    $("#social-share").click(function() {
        $(".sharing-icos").toggleClass('hide');
    });
    //Chat handler
    $(".page-aside-switch , page-aside-switch > i").click(function() {
        $(".page-aside").toggleClass('open');
    });
    //Sidebar 
    $("#show-sidebar").click(function() {
        $("#sidebar").toggleClass('hide');
        $("#wrapper").toggleClass('haside');
        if (!$("#sidebar").hasClass("hide")) {
            var sideSpace = parseInt($("#wrapper").offset().left);
            if (sideSpace < 240) {
                $("#wrapper").css({
                    "margin-left": "240px",
                    "margin-right": "auto"
                });
            }
        } else {
            var sideSpace = $("#wrapper").offset().left;
            if (sideSpace == 240) {
                $("#wrapper").css({
                    "margin-left": "auto",
                    "margin-right": "auto"
                });
            }
        }
    });
    if (!$("#sidebar").hasClass("hide")) {
        var sideSpace = $("#wrapper").offset().left;
        if (sideSpace < 240) {
            $("#wrapper").css({
                "margin-left": "240px",
                "margin-right": "auto"
            }).addClass('haside');
        }
		 
    }
    //End sidebar
  
    //VideoPlayer Container
    var vpWidth = $('.video-player').width();
    var vpHeight = Math.round((vpWidth / 16) * 9);
	//Related & Lists
    $(".video-player").css("min-height", vpHeight);
    var vh = $("#video-content").height() - 2;	
	if ($('.video-player-sidebar').html()) {
	var RRUrl = $('.ajaxreqList').data('url');	
	var RUrl = site_url + 'api/' + RRUrl;	
	$(".ajaxreqList").load(RUrl, function() {
	$(".ajaxreqList").contents().unwrap();	
      if ($(window).width() < 600) {        
        $('.items').slimScroll({
            height: 280,
			start: $('li#playingNow'),
			size: 5,
		    railVisible: true,
            railOpacity: '0.9',
            color: '#c6c6c6',
            railColor: '#f5f5f5',
		    wheelStep : 22,
			touchScrollStep : 75
        });
    } else {        
        $('.items').slimScroll({
            height: vh,
			start: $('li#playingNow'),
			size: 5,
		    railVisible: true,
            railOpacity: '0.9',
            color: '#c6c6c6',
            railColor: '#f5f5f5',
		    wheelStep : 16,
			touchScrollStep : 75
        });
    }
	//Get next in playlist
	if($("li#playingNow").html()) {	
	var nextPlayed = $("li#playingNow").next().find("a.clip-link");
	$('#ComingNext').attr('href',nextPlayed.attr("href"));
	$('#ComingNext').attr('data-original-title', nextPlayed.attr("title"));
	}
    });	 	
	}
	if ($('.ajaxreqRelated').html()) {		
	var RRUrl = $('.ajaxreqRelated').data('url');

	var RUrl = site_url + 'api/' + RRUrl;	
	$(".ajaxreqRelated").load(RUrl, function(data) {
	if ($(window).width() < 990) {
       var $mobiR = $('.related').clone();
        $('.related-mobi').prepend($mobiR);
		$('.rur').remove();
		$('.related li:nth-child(8)').nextAll().addClass('hide');
	}	
	$(".ajaxreqRelated").contents().unwrap();	
	    //Autoplay
	
	var $autoR = $('li.AutoplHold').clone();
	$( "li.AutoplHold").addClass('toRemoveLI');	
	$( "li.toRemoveLI").remove();
    $('.related ul:first-of-type').prepend($autoR);	
	
		$('#autoplayHandler').change(function(){
		console.log('ajax-clicked');
		$.get( site_url + "api/autoplay/" );		
		if($(".PlayUP").is("#autoplay")) {
		$(".PlayUP").attr("id","NoAuto");	
		} else {
		$(".PlayUP").attr("id","autoplay");	
		}
	});
	
	
    });	 	
	}
	
	//Show more related
    $("#revealRelated").click(function() {
		$('.related li:nth-child(8)').nextAll().toggleClass('hide');
		$("#revealRelated > span").toggleClass('hide');
    });
	
	if (!$('.ajaxreqRelated').html()) {
		if ($(window).width() < 990) {
		var $mobiR = $('.related').clone();
        $('.related-mobi').prepend($mobiR);
		$('.rur').remove();
		$('.related li:nth-child(8)').nextAll().addClass('hide');
	}
	}
	
	var $autoR = $('li.AutoplHold').clone();
	$( "li.AutoplHold" ).remove();
	$('.related ul').prepend($autoR);
	
	if ($(window).width() < 990) {
	   var hinit = $('.vibe-interactions > h1').html();
	   $('ul#media-info').parent('.mtop10').addClass('hide');
	   $('.vibe-interactions > h1').html(hinit + '<a href="javascript:void(0)" class="description-pull pull-right"><i class="material-icons mpulldown"></i></a>');
       $(".description-pull").click(function() {
	   $("ul#media-info").parent('.mtop10').toggleClass("hide");
       $(".description-pull > i").toggleClass("mpullup").toggleClass("mpulldown");
	   $('#media-description').readmore({
		 speed: 75,
		 collapsedHeight: 80,
		 moreLink: '<a href="#" class="readmore">'+ $('#media-description').data("small") +' <i class="material-icons">&#xE313;</i></a>',
		 lessLink: '<a href="#" class="readmore">'+ $('#media-description').data("big") +' <i class="material-icons">&#xE316;</i></a>'
		});
	   });
       $('.sharing-icos').addClass('hide');     
       var $listH = $('.playlistvibe').clone();
	   $('#ListRelated').prepend($listH);
	   $('#LH, .fullit').remove();
	   $('.next-an').html('');
	   $('.next-an').html('<a href="javascript:void(0)" class="vlist-pull"><i class="material-icons mpullup"></i></a>');
       $(".vlist-pull").click(function() {
	   $("#ListRelated > .video-player-sidebar").toggleClass("hide");
       $(".vlist-pull > i").toggleClass("mpullup").toggleClass("mpulldown");
	   });  
	}
	if ($(window).width() < 800) {
        $('.scroll-items').slimScroll({
            height: 280,
			wheelStep : 22,
			touchScrollStep : 75
        });      
    } else {
        $('.scroll-items').slimScroll({
            height: 340,
			wheelStep : 16,
			touchScrollStep : 75
        });       
    }
	  var sum = 0;
	   $('li#playingNow').prevAll().each(function() {
	   sum += 66;
	   }); 
	   sum = sum - 190; 
	   $('.items').animate({scrollTop: sum}, 'slow');
	//Autoplay for non-ajax
	$('#autoplayHandler').change(function(){
		console.log('non-ajax-clicked');
		$.get( site_url + "api/autoplay/" );		
		if($(".PlayUP").is("#autoplay")) {
		$(".PlayUP").attr("id","NoAuto");	
		} else {
		$(".PlayUP").attr("id","autoplay");	
		}
	});
   //Fill the screen
    $(".fullit").click(function() {
        $(".video-holder").toggleClass('gofullscreen');	   
    });
	  
	   
	var sidebarsh = screen.height - 67;
    $('.sidescroll').slimScroll({
        height: sidebarsh,
        position: 'right',
        size: 5,
		railVisible: true,
        railOpacity: '0.66',
        color: '#c6c6c6',
        railColor: '#f5f5f5',
		wheelStep : 22,
		touchScrollStep : 75
    });
	//Emoji
	$(".addEmComment").emojioneArea({
        hideSource: true,
        autocomplete: true,
		useSprite: false,
		shortnames : true,
		filtersPosition: "bottom"
      });
	//Table checks
	$('#DashContent .check-all').click(function(){
		var parentTable = $('.content--items');										   
		var ch = parentTable.find('input[type=checkbox]');										 
		if($(this).is(':checked')) {
		
			//check all rows in table
			ch.each(function(){ 
				$(this).attr('checked',true);
				
			});
						
			//check both table header and footer
			parentTable.find('.check-all').each(function(){ $(this).attr('checked',true); });
		
		} else {
			
			//uncheck all rows in table
			ch.each(function(){ 
				$(this).attr('checked',false); 
				$(this).parent().removeClass('checked');	//used for the custom checkbox style
				$(this).parents('tr').removeClass('selected');
			});	
			
			//uncheck both table header and footer
			parentTable.find('.check-all').each(function(){ $(this).attr('checked',false); });
		}
	});
    $(".backtotop").addClass("hidden");
    $(window).scroll(function() {
        if ($(this).scrollTop() === 0) {
            $(".backtotop").addClass("hidden")
        } else {
            $(".backtotop").removeClass("hidden")
        }
    });
    $('.backtotop').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 1200);
        return false;
    });
    $('.form-material').each(function() {
        var $this = $(this);
        if ($this.data('material') === true) {
            return;
        }
        var $control = $this.find('.form-control');
        // Add hint label if required
        if ($control.attr("data-hint")) {
            $control.after("<div class=hint>" + $control.attr("data-hint") + "</div>");
        }
        if ($this.hasClass("floating")) {
            // Add floating label if required
            if ($control.hasClass("floating-label")) {
                var placeholder = $control.attr("placeholder");
                $control.attr("placeholder", null).removeClass("floating-label");
                $control.after("<div class=floating-label>" + placeholder + "</div>");
            }
            // Set as empty if is empty
            if ($control.val() === null || $control.val() == "undefined" || $control.val() === "") {
                $control.addClass("empty");
            }
        }
        // Support for file input
        if ($control.next().is("[type=file]")) {
            $this.addClass('form-material-file');
        }
        $this.data('material', true);
    });
    $('.form-material-file [type=file]').on("focus", function() {
        $(".form-material-file .form-control").addClass("focus");
    });
    $('.form-material-file [type=file]').on("blur", function() {
        $(".form-material-file .form-control").removeClass("focus");
    });
    $('.form-material-file [type=file]').on("change", function() {
        var value = "";
        $.each($(this)[0].files, function(i, file) {
            value += file.name + ", ";
        });
        value = value.substring(0, value.length - 2);
        if (value) {
            $(this).prev().removeClass("empty");
        } else {
            $(this).prev().addClass("empty");
        }
        $(this).prev().val(value);
    });
    $('.form-control').on("keyup", function() {
        var $this = $(this);
        if ($this.val() === "") {
            $this.addClass("empty");
        } else {
            $this.removeClass("empty");
        }
    });
	
	
$('#CustomWidth').keyup(function() {
modIframeW($(this).val());	
});	
$('#CustomHeight').keyup(function() {
modIframeH($(this).val());	
});	
$("input:radio[name=changeEmbed]").click(function() {
    var value = $(this).val();
	 switch (value) {
        case '1':
          modIframeW(1920);
          modIframeH(1080);
          break;
        case '2':
          modIframeW(1280);
          modIframeH(720);
          break;
        case '3':
         modIframeW(854);
         modIframeH(480);
          break;
        case '4':
         modIframeW(640);
         modIframeH(360);
          break;
        default:
          modIframeW(426);
          modIframeH(240);
      }
});	
	
	
    /* End document ready */
});
function SearchSwitch(com) {	
	$('input#switch-com').val(com);
	//alert($('a#s-' +com + ' > i').html());
	var $button = $('a#s-' +com + ' > i').clone();
	$('a#switch-search').html($button);
}
function iHeartThis(vid) {
    $.post(
        site_url + 'lib/ajax/heart.php', {
            video_id: vid,
            type: 1
        },
        function(data) {   
            var $hearts = $('#i-like-it > span').html();
			$hearts = $hearts.replace(/[^0-9\.]/g, '').trim();
            var decH = $hearts-1;			
            var a = JSON.parse(data);
			if(a.type == 1) {
			$('#i-like-it').addClass('done-like');	
			$('#i-like-it > span').html(++$hearts)
			} else {
			$('#i-like-it').removeClass('done-like');	
			$('#i-like-it > span').html(decH)
			}
		   $.notify(a.title + ' ' + a.text);
        });
}
function iLikeThis(vid) {
	if($('#i-like-it').hasClass('done-like')) {
	RemoveLike(vid);	
	} else {
    $.post(
        site_url + 'lib/ajax/like.php', {
            video_id: vid,
            type: 1
        },
        function(data) {            
            var a = JSON.parse(data);          
			if(typeof a.added != 'undefined') {
			var ahandler = a.added;
			} else {
			var ahandler = 0;
			}
			if(ahandler == "1") {
			$('#i-like-it').addClass('done-like');	
			var likesNr = $('#i-like-it > span').text();
			likesNr = likesNr.replace(/[^0-9\.]/g, '').trim();
			$('#i-like-it > span').html(++likesNr);
			}
		 $.notify(a.title + ' ' + a.text);	
        });
}
}
function iHateThis(vid) {
	if(!$('#i-dislike-it').hasClass('done-dislike')) {
    $.post(
        site_url + 'lib/ajax/like.php', {
            video_id: vid,
            type: 2
        },
        function(data) {
           
            var a = JSON.parse(data);
         	$.notify(a.title + ' ' + a.text);
			//console.log(a);
			var likesNr = $('#i-dislike-it > span').text();
			likesNr = likesNr.replace(/[^0-9\.]/g, '').trim();
			if(typeof a.added != 'undefined') {
			var ahandler = a.added;
			} else {
			var ahandler = 0;
			}
			if(ahandler == "2") {
			$('#i-dislike-it > span').html(likesNr -1);
            $('#i-dislike-it').removeClass('done-dislike');			
			} else if (ahandler == "3") {
			 $('#i-dislike-it > span').html(++likesNr);
			  $('#i-dislike-it').addClass('done-dislike');
			}
			
        });
}
}
function DOtrackview(vid) {
    $.post(site_url + 'lib/ajax/track.php', {
            video_id: vid
        },
        function(data) {
            //console.log(data);	
        }
    );
}
function DOtrackviewIMG(vid) {
    $.post(site_url + 'lib/ajax/track-img.php', {
            video_id: $.trim(vid)
        },
        function(data) {
            console.log(data);	
        }
    );
}
function Padd(vid, pid) {
    $.post(
        site_url + 'lib/ajax/addto.php', {
            video_id: vid,
            playlist: pid
        },
        function(data) {
            var a = JSON.parse(data);
            $.notify(a.title + ' ' + a.text);
            if ($('li#PAdd-' + pid).html()) {
                $('li#PAdd-' + pid).remove();
            }
            if ($('#video-' + vid).html()) {
                $('#video-' + vid + ' a.laterit').remove();
            }
        });
}
function ReplyCom(cid) {
    $('li#' + cid).toggleClass('hide');
}
function RemoveLike(vid) {
    $.post(
        site_url + 'lib/ajax/dislike.php', {
            video_id: vid,
            type: 1
        },
        function(data) {
			if($('#i-like-it').hasClass('done-like')) {
			 var a = JSON.parse(data);
            $.notify(a.title + ' ' + a.text);	
			}
            $('#i-like-it').removeClass('isLiked').removeClass('done-like');           
			 var likesNr = $('#i-like-it > span').text();	
			 if(likesNr >= 1) {
			 $('#i-like-it > span').html(likesNr - 1);
			 }
        });
}

function showLogin() {
    $('#login-now').modal('toggle');
}
function Subscribe(user, type) {
	
    $.post(
        site_url + 'lib/ajax/subscribe.php', {
            the_user: user,
            the_type: type
        },
        function(data) {
            var a = JSON.parse(data);
            $.notify(a.title + ' ' + a.text);
			if($('#subscribe-' + user).attr('data-next')){
		    $('#subscribe-' + user).text($('#subscribe-' + user).data('next'));
	        }
        });
}
String.fromHtmlEntities = function(string) {
    return (string+"").replace(/&#\d+;/gm,function(s) {
        return String.fromCharCode(s.match(/\d+/gm)[0]);
    })
};
function addEMComment(oid, toid) {
    if ($('textarea#addEmComment_' + toid).val()) {
		if ($('textarea#addEmComment_' + toid).parent().find(".emoj-editor").length > 0){
	   var initialTxt = $('textarea#addEmComment_' + toid).parent().find(".emoj-editor").html();		
       var toAddTXT = encodeURIComponent(String.fromHtmlEntities(initialTxt));
	   $('textarea#addEmComment_' + toid).parent().find(".emoj-editor").html('');
		} else {
		var initialTxt =	$('textarea#addEmComment_' + toid).val();
		var toAddTXT = encodeURIComponent(initialTxt);
		}	

        $.post(
            site_url + 'lib/ajax/addComment.php', {
                comment: toAddTXT,
                object_id: oid,
                reply: toid
            },
            function(data) {				
                $('#emContent_' + oid + '-' + toid + ' li:first').after('<li id="comment-' + data.id + '" class="left animated rollIn"><img class="avatar" src="' + data.image + '" /><div class="message"><span class="arrow"> </span><a class="name" href="' + data.url + '">' + data.name + '</a> <span class="date-time"> ' + data.date + ' </span> <div class="body"></div> </div></li>');
				var shtml = data.text;
				$('#comment-' + data.id).find('.body').html(shtml);
				$('textarea#addEmComment_' + toid).val('');
                
            }, "json");
    } else {
        $('#addEmComment_' + toid).focus();
    }
    return false;
}
function iLikeThisComment(cid) {
    $.post(
        site_url + 'lib/ajax/likeComment.php', {
            comment_id: cid
        },
        function(data) {
            $('#iLikeThis_' + cid + '> a').remove();
            $('#iLikeThis_' + cid + '> .tooltip').remove();
            $('#iLikeThis_' + cid).prepend(data.text + '! &nbsp;');
        }, "json");
}
function DeleteThisComment(id,key) {
	$.alertable.confirm(delete_com_text).then(function() {
    RemoveThisComment(id,key);
    });
}
function RemoveThisComment(id,key) {	
    $.post(
        site_url + 'lib/ajax/delComment.php', {
           key: key,
		   id : id
        },
        function(data) {
            $('li#comment-id-' + id).hide("slow", function(){ $(this).remove()});
        }, "json");
}
function processVid(file) {
    $('#vfile').val(file);
    $('#Subtn').prop('disabled', false).html('Save').addClass("btn-success");
}
function DOtrackview(vid) {
    $.post(site_url + 'lib/ajax/track.php', {
            video_id: vid
        },
        function(data) {
            //console.log(data);	
        }
    );
}
function modIframeW(w){
var str = $('#share-embed-code-small').val();                        
str = str.replace(/width="[\s\S]*?"/, 'width="'+ w +'"');
$('#share-embed-code-small').val(str);
}
function modIframeH(h){
var str = $('#share-embed-code-small').val();                        
str = str.replace(/height="[\s\S]*?"/, 'height="'+ h +'"');	
$('#share-embed-code-small').val(str);
}$(window).load(function(){
    startNextVideo = function() {
        if ($("li#playingNow").html()) {
            var nextPlay = $("li#playingNow").next();
        } else {
            if ($("#autoplay").html()) {
                var nextPlay = $("#autoplay").parent('li');
            }
        }
		console.log(nextPlay);
        if (typeof nextPlay != 'undefined') {
            nextPlay.addClass('imNext').prepend('<a href="#" id="btnCancel" class="btn btn-success btn-xs">' + acanceltext + '</a>');
            nextPlayUrl = nextPlay.find("a.clip-link").attr("href");
            moveToNext = function() {
                if (nextPlayUrl.length) {
                    window.location.href = nextPlayUrl;
                }
            };
            var timeoutId = setTimeout(moveToNext, 5000);
            $('a#btnCancel').unbind("click").click(function() {
                clearTimeout(timeoutId);
                nextPlay.removeClass('imNext');
                $('a#btnCancel').remove();
                return false;
            });

        }
    }

    if ($("#suggest-results").length) {
        $(".header input[name=tag]").keyup(function() {
            var searched = $(this).val();
            var gghref = 'https://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&cp=1&q=' + searched;
            var result;
            $.ajax({
                url: gghref,
                type: "POST",
                dataType: 'jsonp',
                success: function(data) {
                    for (var i = 1; i < data[1].length; i++) {
                        if (data[1][i][0].length && data[1][i]) {
                            result += '<li class="gsuggested"><a href="#">' + data[1][i][0] + '</a></li>';
                        }
                    }
                    $("#suggest-results").html("<ul>" + result.replace("undefined", "") + "</ul>");
                    $('.gsuggested > a').click(function() {
                        var valoare = $(this).text();
                        $(".header input[name=tag]").val(valoare).focus();
						$("#suggest-results").html('&nbsp;');
                        return false;
                    });
                }
            });
        });
    }


});