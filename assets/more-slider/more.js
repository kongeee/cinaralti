(function ($, window) {


    function log(v)
    {

        console.log(v);

    }

    var isChrome = function () {
        var isChromium = window.chrome,
                vendorName = window.navigator.vendor;
        if (isChromium !== null && vendorName === "Google Inc.") {
            return true;
        }
        return false;
    };


    function getTouchCoords(event)
    {

        var coords = {};

        if (event.touches != undefined)
        {
            coords.x = event.touches[0].pageX;
            coords.y = event.touches[0].pageY;
        }
        else
        {
            if (event.pageX !== undefined)
            {
                coords.x = event.pageX;
                coords.y = event.pageY;
            }
            else
            {
                coords.x = event.clientX;
                coords.y = event.clientY;
            }
        }

        return coords;

    }

    More.pipeline = [
        {
            process: ['items', 'height', 'width'],
            update: function () {

                for (var i = 0, total = this.items.length; i < total; i++)
                {
                    this.positions.push(100 * -i);
                    var obj = $(this.items[i]);
                    obj.addClass(this.options.slideClass);
                    this.labels.push(obj.attr('data-more-label'));
                }

            }
        },
        {
            process: ['position'],
            update: function () {

                if (this.options.viewMode == 'vertical')
                {
                    this.animate(this.getPosition(this.current) || 0);
                }

            }
        }
    ];



    function More(obj, options)
    {

        this.positions = [];

        this.processes = {};

        this.labels = [];

        this.touch = {};

        this.pipes = [];

        this.options = $.extend({}, More.defaultOptions, options);

        this.speed = this.options.speed;

        this.element = obj;

        if (this.element.length)
        {
            this.isScrolling = false;

            $('html').addClass('moreMain');

            this.items = this.element.children();

            this.current = 0;

            $.each(More.pipeline, $.proxy(function (c, worker) {
                this.pipes.push(
                        {
                            process: worker.process,
                            update: $.proxy(worker.update, this)
                        }
                );
            }, this));

            if (this.options.viewMode == 'horizontal')
            {
                this.element.children('.slide').addClass('horizontalSlide');
                this.options.paginationAtBottom = true;
            }


            this.setSpeed();

            this.element.children('.slide').eq(this.current).addClass('active');


            this.addProcess('items');

            this.update();

            this.dotPagination();

            this.setBtns();

            if (this.options.drag)
            {
                this.element.on(More.events.drag.start, $.proxy(this.eventTarget, this));
            }

            if (this.options.wheel)
            {
                this.element.on('mousewheel DOMMouseScroll MozMousePixelScroll', $.proxy(this.mouseWheel, this));
            }


            if (this.options.hasHash)
            {
                this.setHash();
                this.element.on('More-evnt-changed_position', $.proxy(function () {
                    var item = this.element.find('.slide').eq(this.current);
                    window.location.hash = item[0].id;
                }, this));
            }


            if (this.options.loader)
            {
                var obj = this.element;

                obj.after('<div class="more_loader"><div class="more_progress"></div></div>');

                obj.on('More-evnt-changed_position', $.proxy(this.loader, this));

            }


            this.setCurrentItem();

            $.proxy(this.options.done, this)();
        }


    }


    More.prototype.loader = function ()
    {

        var css = {};

        var percent = Math.ceil((this.current + 1) / this.positions.length * 100);

        if (this.options.loaderProp == 'width')
        {
            css['width'] = percent + '%';
        }
        else
        {
            css['height'] = percent + '%';
        }

        $('.more_loader .more_progress').css(css);
    }


    More.prototype.setHash = function ()
    {

        $('.slide', this.element).each(function (c) {
            var item = $(this);
            if (!item.attr('id')) {
                item.attr('id', 'item-' + (c + 1));
            }
        });

        $(window).on('hashchange', $.proxy(this.setCurrentItem, this));


    }

    More.prototype.setCurrentItem = function ()
    {
        if (window.location.hash !== '') {
            var itemID = window.location.hash;
            var current = this.element.find(itemID);
            this.to(current.index());
        }
    }


    More.prototype.mouseWheel = function (event)
    {

        var e, wheel, target, delta;

        e = window.event || event;

        wheel = (e.wheelDelta || -e.detail || e.originalEvent.detail);
        
	var delta = Math.max( -1, Math.min( 1, wheel ) );

        target = $(e.target);

        if (!this.isScrolling && Math.abs(wheel) > 5)
        {
            this.isScrolling = true;
            var scrollNow = true;
            if (scrollNow)
            {

                if (isChrome())
                {
                    delta = Math.floor(wheel / 5);
                }
                
                if( e.originalEvent && e.originalEvent.detail ) {
				if( delta > 0 ) {
                                  this.next();
				}
                                else
                                {
                                  this.prev();   
                                }
			} else if( delta < 0 ) {
				  this.next();
			}else
                        {
                               this.prev();
                        }

            }
            else
            {
                this.isScrolling = false;
            }
        }

    }

    More.prototype.eventTarget = function (e)
    {
        var type = e.type;
        switch (type)
        {
            case 'mousedown':
            case 'touchstart':
                this.dragStart(e);
                break;
            case 'mousemove':
            case 'touchmove':
                this.dragMove(e);
                break;
            case 'mouseup':
            case 'touchend':
                this.dragEnd(e);
                break;
        }

    }


    More.prototype.dragStart = function (e)
    {

        var pageX, pageY, event, coords, offset = {};

        event = e.originalEvent || window.event || e;

        coords = getTouchCoords(event);

        pageX = coords.x;

        pageY = coords.y;

        offset.x = this.element.position().left;

        offset.y = this.element.position().top;

        var $forbiddenItems = ['img', 'a'];

        this.touch.target = event.target || event.srcElement;

        if ($.inArray(this.touch.target.tagName.toLowerCase(), $forbiddenItems) !== -1)
        {
            this.touch.target.draggable = false;
        }

        this.element.addClass('turbo-drag');

        this.touch.start = pageY;

        $(document).on(More.events.drag.end, $.proxy(this.eventTarget, this));


    };

    More.prototype.dragMove = function (e)
    {

        var pageX, pageY, event, coords, offset = {}, distance, type, direction, destProperty;

        event = e.originalEvent || window.event || e;


    };


    More.prototype.dragEnd = function (e)
    {

        var dest, coords, pos, event;

        event = e.originalEvent || window.event || e;

        this.element.removeClass('turbo-drag');

        coords = getTouchCoords(event);

        this.touch.destY = coords.y;

        dest = this.touch.destY;

        coords = this.getPosition();

        this.touch.target.removeAttribute('draggable');

        if (dest > (this.touch.start + this.options.wheelSwipeDisance))
        {
            this.prev();
        }
        else if (dest < (this.touch.start - this.options.wheelSwipeDisance))
        {
            this.next();
        }

        $(document).off(More.events.drag.move);

        $(document).off(More.events.drag.end);

    };



    More.prototype.transitionEnd = function ()
    {

        if (this.options.wheel)
        {
            this.isScrolling = false;
        }
    }


    More.prototype.compare = function (a, b, operator)
    {
        var res;

        switch (operator)
        {
            case '<':
                res = a < b;
                break;
            case '>':
                res = a > b;
                break;
            case '>=':
                res = a >= b;
                break;
            case '<=':
                res = a <= b;
                break;
        }

        return res;
    }


    More.prototype.trigger = function (evnt, data)
    {

        var evnt_prefix = 'More-evnt-';

        data["time"] = new Date();

        data["type"] = evnt_prefix + evnt;

        return this.element.trigger(evnt_prefix + evnt, data);

    }


    More.prototype.setSpeed = function ()
    {
        var speed = this.speed / 1000;

        this.element.css({
            '-webkit-transition': 'all ' + speed + 's',
            '-moz-transition': 'all ' + speed + 's',
            '-o-transition': 'all ' + speed + 's',
            'transition': 'all ' + speed + 's'
        });
    }


    More.prototype.dotPagination = function ()
    {

        if ($('.more_pagination').length) {
            $('.more_pagination').remove();
        }

        var css = {}, label;

        var pagination = $('<div class="more_pagination"></div>');

        for (var i = 0, total = this.items.length; i < total; i++)
        {
            label = '';
            if (typeof this.labels[i] != "undefined")
            {
                label = this.labels[i];
            }

            pagination.append('<div class="more_dot"><span>' + label + '</span></div>');
        }

        var obj = this.element;

        if (this.options.navParent)
        {
            obj = $(this.options.navParent);
        }

        obj.after(pagination);

        if (this.options.paginationAtBottom)
        {
            pagination.addClass('more_pagination_bottom');
            css['margin-left'] = '-' + pagination.outerWidth(true) / 2 + 'px';
        }
        else
        {
            css['margin-top'] = '-' + pagination.height() / 2 + 'px';
        }

        pagination.css(css);

        pagination.find('.more_dot').eq(this.current).addClass('active');

        pagination.on('click', '.more_dot', $.proxy(function (e) {

            var obj = $(e.currentTarget);

            var c = obj.index();

            this.to(c)

        }, this));


        this.element.on('More-evnt-changed_position', $.proxy(function () {
            pagination.find('.more_dot').removeClass('active');
            pagination.find('.more_dot').eq(this.current).addClass('active');
        }, this));


    }



    More.prototype.getMax = function ()
    {
        return this.positions.length - 1;
    }


    More.prototype.getMin = function ()
    {
        return 0;
    }


    More.prototype.setCurrent = function (pos)
    {

        var prev = this.current;

        this.current = pos;

        this.trigger('changed_position', {
            'value':
                    {
                        'position': pos,
                        'previous': prev
                    }
        });


    }


    More.prototype.to = function (pos)
    {

        if (this.options.circular)
        {
            if (pos > this.getMax())
            {
                pos = this.getMin();
            }
            else if (pos < this.getMin())
            {
                pos = this.getMax();
            }
        }
        else
        {
            if (pos > this.getMax())
            {
                pos = this.getMax();
                this.isScrolling = false;
            }
            else if (pos < this.getMin())
            {
                pos = this.getMin();
                this.isScrolling = false;
            }
        }


        if (pos == this.current)
            return;


        this.addProcess('flush');

        this.update();

        // this.element.children('.slide').eq(this.current).addClass('animated '+this.options.outClass).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', $.proxy(this.clearAnimation, this));

        //update


        var $currentSlide = this.element.find('.slide').eq(this.current);


        this.setCurrent(pos);

        this.addProcess("position");

        if (this.options.viewMode == 'horizontal')
        {

            var isNext = $currentSlide.index() < pos ? true : false;

            if (isNext)
            {
                var t = 'right';
            }
            else
            {
                var t = 'left';
            }

            var $nextSlide = this.element.find('.slide').eq(this.current).addClass('active ' + t);

            setTimeout($.proxy(function () {

                this.setTransition(this.element.children('.slide'));

                this.element.addClass('transition');

                $currentSlide.addClass('shift-' + t);

            }, this), 100);




            setTimeout($.proxy(function () {
                this.element.removeClass('transition');
                this.removeTransition(this.element.children('.slide'));
                $currentSlide.removeClass('active shift-left shift-right');
                $nextSlide.removeClass(t);
                $.proxy(this.transitionEnd, this)();
            }, this), 100 + this.options.speed);



        }

        this.update();

    }


    More.prototype.setTransition = function (items)
    {
        var _obj = this;
        items.each(function () {
            this.style['transitionDuration'] = _obj.options.speed + 'ms';
        });

    }

    More.prototype.removeTransition = function (items)
    {
        var _obj = this;
        items.each(function () {
            this.style['transitionDuration'] = '';
        });

    }


    More.prototype.setBtns = function ()
    {
        $("body").on("keyup", $.proxy(function (e) {

            var key = e.which;

            if (key == 38)
            {
                this.prev();
            }
            else if (key == 40)
            {
                this.next();
            }

        }, this));
    }


    More.prototype.next = function ()
    {

        this.to(this.current + 1);

    }


    More.prototype.prev = function ()
    {

        this.to(this.current - 1);

    }


    More.prototype.animate = function (position)
    {

        var css = {}, speed;

        this.element.off('transitionend', $.proxy(this.transitionEnd, this));

        if (this.options.viewMode == 'horizontal')
        {
            css["transform"] = "translate3d(" + position + "%,0px,0px)";
        }
        else
        {
            css["transform"] = "translate3d(0px," + position + "%,0px)";
        }

        speed = this.speed / 1000;

        css["transition"] = speed + "s";

        setTimeout($.proxy(function () {

            this.element.css(css);

            if (this.options.viewMode == 'horizontal')
            {
                this.element.find('.slide').eq(this.current).addClass('next active');
            }
            else
            {
                this.element.on('transitionend', $.proxy(this.transitionEnd, this));

                this.element.children('.slide').removeClass('active');

                this.element.children('.slide').eq(this.current).addClass('active');

                this.element.children('.slide').eq(this.current).addClass('animated ' + this.options.inClass).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', $.proxy(this.clearAnimation, this));

            }

        }, this));

    }



    More.prototype.clearAnimation = function (e)
    {
        $(e.target).removeClass(this.options.outClass);
        $(e.target).removeClass(this.options.inClass);
    }



    More.prototype.getPosition = function (item)
    {

        if (typeof item == 'undefined')
        {
            return this.positions;
        }

        return this.positions[item] || 0;

    }


    More.prototype.addProcess = function (process)
    {
        this.processes[process] = true;
    }


    More.prototype.update = function ()
    {

        var c = 0;

        var pipesCount = this.pipes.length;

        var processType = $.proxy(function (i) {
            return this[i]
        }, this.processes);


        while (c < pipesCount)
        {

            if ($.grep(this.pipes[c].process, processType).length)
            {
                this.pipes[c].update();
            }

            c++;
        }

        this.processes = {};

    }



    More.prototype.destroy = function ()
    {
        $('html').removeClass('moreMain');

        this.element.children('.slide').removeClass('horizontalSlide active animated');

        this.element.off('mousewheel DOMMouseScroll MozMousePixelScroll', $.proxy(this.mouseWheel, this));

        $(window).off('hashchange', $.proxy(this.setCurrentItem, this));

        this.element.css({
            'transform': 'translate3d(0,0,0)'
        });

        $('.more_loader, .more_pagination').remove();

        //window.location.hash = '' ;

        this.element.removeData('More');

        jQuery.removeData([0], 'More');

    }








    function MoreLoader(options)
    {
        if (!$(this).data('More')) {
            $(this).data('More', new More($(this), options));
        }

        return $(this).data('More');

    }



    $.fn.More = MoreLoader;

    More.defaultOptions =
            {
                drag: true,
                wheel: false,
                speed: 1000,
                hasHash: false,
                circular: false,
                slideClass: '',
                inClass: 'more_enter',
                outClass: 'more_leave',
                wheelSwipeDisance: 1,
                wheelDelay: false,
                loader: false,
                loaderProp: 'width',
                viewMode: 'horizontal',
                paginationAtBottom: false,
                loaderParent: false,
                before: function () {
                },
                after: function () {
                },
                init: function () {
                },
                done: function () {

                }
            };

    More.events =
            {
                drag:
                        {
                            start: 'mousedown touchstart',
                            move: 'mousemove touchmove',
                            end: 'mouseup touchend'
                        }
            };







}(jQuery, window));