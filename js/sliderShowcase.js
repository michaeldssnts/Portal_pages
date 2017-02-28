/*
 *  slider showcase 1.0
 *
 *  Made by altsniffer
 */

"use strict";

function Timer(callback, delay) {
    var timerId, start, remaining = delay;

    this.pause = function() {
        window.clearInterval(timerId);
        remaining -= new Date() - start;
    };

    this.resume = function() {
        start = new Date();
        window.clearInterval(timerId);
        timerId = window.setInterval(callback, remaining);
    };

    this.clear = function() {
        window.clearInterval(timerId);
    }

    this.resume();
}

;( function( $, window, document, undefined ) {

		// Create the defaults once
		var pluginName = "SliderShowcase",
            defaults = {
                autoPlay: false,
                pauseOnHover: false,
                speed: 5000,
                slide: 'vertical',
                random: false,
                backgroundImage: 'cover',
                labelClass: 'label label-info',
                prevKey: 37,
                nextKey: 39,
                showCount: true,
                showCountLabel: '%c / %t',
                nextBtn: '<img src="images/slider_arrow_right.jpg">',
                prevBtn: '<img src="images/slider_arrow_left.jpg">',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            imageHeight: 200
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            imageHeight: 200
                        }
                    }
                  ]
            };

		// The actual plugin constructor
		function SliderShowcase ( element, options ) {

			this.element = element;

			this.settings = $.extend( {}, defaults, options );
            this.currentItem = 0;
            this.isAnimating = false;
            this._lastRand = 0;
            this._action = 'next';

            this.refreshIntervalId;

			this.init();
		}

		// Avoid Plugin.prototype conflicts
		$.extend( SliderShowcase.prototype, {
			init: function() {
                //this._loadDependences();
                this._initSkeleton();
                $(this.element).imagesLoaded( $.proxy(function() {
                    this._events();
                    if (this.settings.autoPlay) {
                        this._createProgress();
                        this._startProgress();
                        this._startAutoPlay();
                    }
                    this._initResponsive();
                }, this));
                var that = this;
                $(window).on('resize', function(){
                    that._initResponsive();
                });
			},
            _loadDependences: function ( ) {
            },
			_initSkeleton: function( ) {

                var $element = $(this.element);
                $element.addClass('sc--container');
                $element.children('div').wrapAll("<div class='sc--content'>").addClass('sc--content--element');

                $element.append("<div class='sc--slider'>");
                $element.find('.sc--slider').append("<div class='sc--slider--content'>");

                var className = this.settings.labelClass;

                var _ = this;

                $element.find('.sc--content--element').each(function () {
                    var image = $(this).find('img');
                    var imgSrc = image.attr('src');
                    var imgInfo = image.data('info');
                    var cssStyle = {'background-image': 'url(' + imgSrc + ')'};
                    if(_.settings.backgroundImage != null)
                    {
                        cssStyle = {'background-image': 'url(' + imgSrc + ')', 'background-size': _.settings.backgroundImage}
                    }

                    var imgDiv = $("<div>", {
                        css: cssStyle
                    }).appendTo('.sc--slider--content');

                    if (imgInfo) {
                        $("<span>", {
                            class: className,
                            text: imgInfo
                        }).appendTo(imgDiv);
                    }

                });
                $element.find('.sc--content--element img').remove();
                this._totalImages = $element.find('.sc--content--element').length;

                if (this.settings.random && this.settings.autoPlay) {
                    this._setRandom();
                }
                var cssStyle =  null;
                if (this.settings.slide == 'vertical') {
                    cssStyle = {'top': 0, 'z-index': 1000};
                }
                else {
                    cssStyle = {'left': 0, 'z-index': 1000};
                }

                $element.find('.sc--content div').eq(this.currentItem).css(cssStyle);
                $element.find('.sc--slider--content div').eq(this.currentItem).css(cssStyle);

                this._createNav();

                if (this.settings.showCount) {
                    this._createCount();
                    this._updateCount();
                }

			},
            _createNav: function ( ) {
                var prevClass = 'left';
                var nextClass = 'right';
                if(this.settings.slide == 'vertical')
                {
                    prevClass = 'bottom';
                    nextClass = 'top';
                }
                $(this.element).append('<nav><div class="' + prevClass + '"><a class="sc--slider--prev" href="#">' + this.settings.prevBtn + '</a></div><div class="' + nextClass+ '"><a class="sc--slider--next" href="#">' + this.settings.nextBtn + '</a></div></nav>');
            },
            _createCount: function (  ) {
                $(this.element).find('.sc--slider--content').append("<span class='totalCount'></span>");
            },
            _updateCount: function ( ) {
                var html = this.settings.showCountLabel.replace(/%c/g, this.currentItem + 1).replace(/%t/g,this._totalImages);
                $(this.element).find('.totalCount').html(html);
            },
            _events: function ( ) {

                var that = this;

                $('.sc--slider--prev, .sc--slider--next', this.element).on('click', $.proxy(function (item) {
                    if (!this.isAnimating) {
                        $(that.element).stop();
                        this._action = item.currentTarget.className.replace('sc--slider--', '');
                        this._showItem();
                    }
                    return false;
                }, this));

                $(window).keypress($.proxy(function( event ) {
                    var key = event.keyCode || event.which;
                    if ($.inArraykey, [that.settings.prevKey, that.settings.nextKey]) {
                        if (!this.isAnimating) {
                            if (key === that.settings.prevKey) {
                                $(that.element).stop();
                                that._action = 'prev';
                                that._showItem();
                                $('.sc--slider--prev').addClass('active');
                                setTimeout(function () {
                                    $('.sc--slider--prev').removeClass('active');
                                }, 200);
                            }
                            if (key === that.settings.nextKey) {
                                that._action = 'next';
                                that._showItem();
                                $('.sc--slider--next').addClass('active');
                                setTimeout(function () {
                                    $('.sc--slider--next').removeClass('active');
                                }, 200);
                            }
                        }
                    }

                }, this));

                if (this.settings.autoPlay && this.settings.pauseOnHover) {
                    $(that.element).hover(function () {
                        that.refreshIntervalId.pause();
                        $(that.element).find('.sc--progressbar--bar').pause();
                    }, function () {
                        that.refreshIntervalId.resume('resume');
                        $(that.element).find('.sc--progressbar--bar').resume();
                    });
                }

                $('.sc--content--element, .sc--slider--content > div', $(this.element)).on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                    $(this).removeClass('sc-animate');
                });
                $('.sc--content--element, .sc--slider--content > div', $(this.element)).on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', $.proxy(function () {
                    this.isAnimating = false;
                }, this));

            },
            _createProgress: function ( ) {
                $('<div/>', {
                    class: 'sc--container--progressbar'
                }).prependTo($(this.element));

                $('<div/>', {
                    class: 'sc--progressbar--bar'
                }).appendTo($(this.element).find('.sc--container--progressbar'));
            },
            _startProgress: function ( ) {

                var width = $(this.element).find('.sc--container--progressbar').width();
                $(this.element).find('.sc--progressbar--bar').stop( true, true ).width(0);
                $(this.element).find('.sc--progressbar--bar').width(0).animate({
                    width: width
                }, {
                    duration: this.settings.speed,
                    complete: function(){
                        $(this.element).find('.sc--progressbar--bar').width(0);
                    }
                });
            },
            _startAutoPlay: function ( ) {
                if (this.settings.autoPlay && this._totalImages > 1)
                {
                    this.refreshIntervalId = new Timer($.proxy(function () {
                        this._showItem();
                    }, this), this.settings.speed);
                }
            },
            _clearAutoPlay: function ( ) {
                this.refreshIntervalId.clear();
            },
            _setRandom: function ( ) {
                do {
                    var rand = Math.floor(Math.random() * this._totalImages);
                }
                while (this._lastRand == rand);
                this._lastRand = rand;
                this.currentItem = rand;
            },
            _showItem: function ( ) {
                this.isAnimating = true;

                var $currentItem = $(this.element).find('.sc--content div').eq(this.currentItem), $currentImage = $(this.element).find('.sc--slider--content > div').eq(this.currentItem);

                if (this._action === 'next') {
                    (this.currentItem < this._totalImages - 1) ? this.currentItem++ : (this.currentItem = 0);
                }
                if(this._action === 'prev') {
                    (this.currentItem > 0) ? this.currentItem-- : (this.currentItem = this._totalImages - 1);
                }

                if (this.settings.random && this.settings.autoPlay) {
                    this._setRandom();
                }
                if (this.settings.showCount) {
                    this._updateCount();
                }

                if (this.settings.autoPlay) {
                    this._startProgress();
                    this._clearAutoPlay();
                    this._startAutoPlay();
                }

                var $nextItem = $(this.element).find('.sc--content > div').eq(this.currentItem), $nextImage = $(this.element).find('.sc--slider--content > div').eq(this.currentItem);

                if (this.settings.slide == 'vertical') {
                    $nextItem.css({
                        top: ( this._action === 'next' ) ? '100%' : '-100%',
                        zIndex: 1000
                    });
                    $nextImage.css({
                        top: ( this._action === 'next' ) ? '-100%' : '100%',
                        zIndex: 1000
                    });
                }
                else {
                    $nextItem.css({
                        left: ( this._action === 'next' ) ? '100%' : '-100%',
                        top: 0,
                        zIndex: 1000
                    });
                    $nextImage.css({
                        left: ( this._action === 'next' ) ? '-100%' : '100%',
                        top: 0,
                        zIndex: 1000
                    });
                }

                setTimeout( $.proxy(function() {
                    if(this.settings.slide == 'vertical') {
                        $currentItem.addClass('sc-animate').css({
                            top: ( this._action === 'next' ) ? '-100%' : '100%',
                            zIndex: 1
                        });
                        $currentImage.addClass('sc-animate').css({
                            top: ( this._action === 'next' ) ? '100%' : '-100%',
                            zIndex: 1
                        });
                        $nextItem.addClass('sc-animate').css('top', 0);
                        $nextImage.addClass('sc-animate').css('top', 0);
                    }
                    else
                    {
                        $currentItem.addClass('sc-animate').css({
                            left: ( this._action === 'next' ) ? '-100%' : '100%',
                            zIndex: 1
                        });
                        $currentImage.addClass('sc-animate').css({
                            left: ( this._action === 'next' ) ? '100%' : '-100%',
                            zIndex: 1
                        });
                        $nextItem.addClass('sc-animate').css('left', 0);
                        $nextImage.addClass('sc-animate').css('left', 0);
                    }

                }, this), 100);
            },
            _initResponsive: function ( )
            {
                var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
                var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

                var _ = this, targetBreakpoint, settings;
                var respondToWidth = window.innerWidth || $(window).width();

                for ( var i = 0, l =  _.settings.responsive.length; i < l; i++ ) {
                    if (respondToWidth <= _.settings.responsive[i].breakpoint) {
                        targetBreakpoint = _.settings.responsive[i].breakpoint;
                    }
                }

                $(_.settings.responsive).each(function(key, val) {
                   if(targetBreakpoint == val.breakpoint)
                   {
                        settings = val.settings;
                   }
                });
                if( typeof settings == 'undefined')
                {
                        $(this.element).find('.sc--content').height('100%').css('top', 0);
                        $(this.element).find('.sc--slider--content').height('100%').css('top', 0);
                    return;
                }


                var sliderHeight,contentHeight;
                sliderHeight = $(this.element).height();

                if(settings.imageHeight)
                {
                    $(this.element).find('.sc--slider--content').height(settings.imageHeight);
                    $(this.element).find('.sc--content').height(sliderHeight - settings.imageHeight);
                }

                contentHeight = sliderHeight - $(this.element).find('.sc--slider--content').height();
                $(this.element).find('.sc--content').height(contentHeight -5).css('top', $(this.element).find('.sc--slider--content').height());
            }
		} );


    /**
     * Plugin definition.
     */
    $.fn[pluginName] = function (options) {
        // If the first parameter is a string, treat this as a call to
        // a public method.
        if (typeof arguments[0] === 'string') {
            var methodName = arguments[0];
            var args = Array.prototype.slice.call(arguments, 1);
            var returnVal;
            this.each(function () {
                // Check that the element has a plugin instance, and that
                // the requested public method exists.
                if ($.data(this, 'plugin_' + pluginName) && typeof $.data(this, 'plugin_' + pluginName)[methodName] === 'function') {
                    // Call the method of the Plugin instance, and Pass it
                    // the supplied arguments.
                    returnVal = $.data(this, 'plugin_' + pluginName)[methodName].apply(this, args);
                } else {
                    throw new Error('Method ' + methodName + ' does not exist on jQuery.' + pluginName);
                }
            });
            if (returnVal !== undefined) {
                // If the method returned a value, return the value.
                return returnVal;
            } else {
                // Otherwise, returning 'this' preserves chainability.
                return this;
            }
            // If the first parameter is an object (options), or was omitted,
            // instantiate a new instance of the plugin.
        } else if (typeof options === "object" || !options) {
            return this.each(function () {
                // Only allow the plugin to be instantiated once.
                if (!$.data(this, 'plugin_' + pluginName)) {
                    // Pass options to Plugin constructor, and store Plugin
                    // instance in the elements jQuery data object.
                    $.data(this, 'plugin_' + pluginName, new SliderShowcase(this, options));
                }
            });
        }
    };



} )( jQuery, window, document );


/*
 * Pause jQuery plugin v0.1
 *
 * Copyright 2010 by Tobia Conforto <tobia.conforto@gmail.com>
 *
 * Based on Pause-resume-animation jQuery plugin by Joe Weitzel
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or(at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 51
 * Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */
(function(){var e=jQuery,f="jQuery.pause",d=1,b=e.fn.animate,a={};function c(){return new Date().getTime()}e.fn.animate=function(k,h,j,i){var g=e.speed(h,j,i);g.complete=g.old;return this.each(function(){if(!this[f]){this[f]=d++}var l=e.extend({},g);b.apply(e(this),[k,e.extend({},l)]);a[this[f]]={run:true,prop:k,opt:l,start:c(),done:0}})};e.fn.pause=function(){return this.each(function(){if(!this[f]){this[f]=d++}var g=a[this[f]];if(g&&g.run){g.done+=c()-g.start;if(g.done>g.opt.duration){delete a[this[f]]}else{e(this).stop();g.run=false}}})};e.fn.resume=function(){return this.each(function(){if(!this[f]){this[f]=d++}var g=a[this[f]];if(g&&!g.run){g.opt.duration-=g.done;g.done=0;g.run=true;g.start=c();b.apply(e(this),[g.prop,e.extend({},g.opt)])}})}})();


/*!
 * imagesLoaded PACKAGED v4.1.1
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */
/*
 * Pause jQuery plugin v0.1
 *
 * Copyright 2010 by Tobia Conforto <tobia.conforto@gmail.com>
 *
 * Based on Pause-resume-animation jQuery plugin by Joe Weitzel
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or(at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 51
 * Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */
!function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},n=i[t]=i[t]||[];return-1==n.indexOf(e)&&n.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},n=i[t]=i[t]||{};return n[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var n=i.indexOf(e);return-1!=n&&i.splice(n,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var n=0,o=i[n];e=e||[];for(var r=this._onceEvents&&this._onceEvents[t];o;){var s=r&&r[o];s&&(this.off(t,o),delete r[o]),o.apply(this,e),n+=s?0:1,o=i[n]}return this}},t}),function(t,e){"use strict";"function"==typeof define&&define.amd?define(["ev-emitter/ev-emitter"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter")):t.imagesLoaded=e(t,t.EvEmitter)}(window,function(t,e){function i(t,e){for(var i in e)t[i]=e[i];return t}function n(t){var e=[];if(Array.isArray(t))e=t;else if("number"==typeof t.length)for(var i=0;i<t.length;i++)e.push(t[i]);else e.push(t);return e}function o(t,e,r){return this instanceof o?("string"==typeof t&&(t=document.querySelectorAll(t)),this.elements=n(t),this.options=i({},this.options),"function"==typeof e?r=e:i(this.options,e),r&&this.on("always",r),this.getImages(),h&&(this.jqDeferred=new h.Deferred),void setTimeout(function(){this.check()}.bind(this))):new o(t,e,r)}function r(t){this.img=t}function s(t,e){this.url=t,this.element=e,this.img=new Image}var h=t.jQuery,a=t.console;o.prototype=Object.create(e.prototype),o.prototype.options={},o.prototype.getImages=function(){this.images=[],this.elements.forEach(this.addElementImages,this)},o.prototype.addElementImages=function(t){"IMG"==t.nodeName&&this.addImage(t),this.options.background===!0&&this.addElementBackgroundImages(t);var e=t.nodeType;if(e&&d[e]){for(var i=t.querySelectorAll("img"),n=0;n<i.length;n++){var o=i[n];this.addImage(o)}if("string"==typeof this.options.background){var r=t.querySelectorAll(this.options.background);for(n=0;n<r.length;n++){var s=r[n];this.addElementBackgroundImages(s)}}}};var d={1:!0,9:!0,11:!0};return o.prototype.addElementBackgroundImages=function(t){var e=getComputedStyle(t);if(e)for(var i=/url\((['"])?(.*?)\1\)/gi,n=i.exec(e.backgroundImage);null!==n;){var o=n&&n[2];o&&this.addBackground(o,t),n=i.exec(e.backgroundImage)}},o.prototype.addImage=function(t){var e=new r(t);this.images.push(e)},o.prototype.addBackground=function(t,e){var i=new s(t,e);this.images.push(i)},o.prototype.check=function(){function t(t,i,n){setTimeout(function(){e.progress(t,i,n)})}var e=this;return this.progressedCount=0,this.hasAnyBroken=!1,this.images.length?void this.images.forEach(function(e){e.once("progress",t),e.check()}):void this.complete()},o.prototype.progress=function(t,e,i){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!t.isLoaded,this.emitEvent("progress",[this,t,e]),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,t),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&a&&a.log("progress: "+i,t,e)},o.prototype.complete=function(){var t=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emitEvent(t,[this]),this.emitEvent("always",[this]),this.jqDeferred){var e=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[e](this)}},r.prototype=Object.create(e.prototype),r.prototype.check=function(){var t=this.getIsImageComplete();return t?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,this.proxyImage.addEventListener("load",this),this.proxyImage.addEventListener("error",this),this.img.addEventListener("load",this),this.img.addEventListener("error",this),void(this.proxyImage.src=this.img.src))},r.prototype.getIsImageComplete=function(){return this.img.complete&&void 0!==this.img.naturalWidth},r.prototype.confirm=function(t,e){this.isLoaded=t,this.emitEvent("progress",[this,this.img,e])},r.prototype.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},r.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},r.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},r.prototype.unbindEvents=function(){this.proxyImage.removeEventListener("load",this),this.proxyImage.removeEventListener("error",this),this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype=Object.create(r.prototype),s.prototype.check=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this),this.img.src=this.url;var t=this.getIsImageComplete();t&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},s.prototype.unbindEvents=function(){this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype.confirm=function(t,e){this.isLoaded=t,this.emitEvent("progress",[this,this.element,e])},o.makeJQueryPlugin=function(e){e=e||t.jQuery,e&&(h=e,h.fn.imagesLoaded=function(t,e){var i=new o(this,t,e);return i.jqDeferred.promise(h(this))})},o.makeJQueryPlugin(),o});


