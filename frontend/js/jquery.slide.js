!function(a) {
    a.fn.extend({
        YuxiSlider: function(b) {
            var c = {
                width: 640,
                height: 360,
                control: null,
                auto: !0,
                during: 3e3,
                speed: 800,
                mousewheel: !1,
                direkey: !1,
                dotDom: null
            },
            d = a.extend(c, b);
            return a(this).each(function() {
                var b = a(this),
                c = a("ul", b),
                e = a("li", b),
                f = e.length,
                g = 0,
                h = null;
                var m = 0,
                n = {},
                o = {},
                p = {
                    mobileDevice: navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i),
                    init: function() {
                        if (p.style(), p.mobileDevice) {
                            var e = a(window).width(),
                            g = d.width / d.height;
                            d.width = e,
                            d.height = e / g,
                            b.css({
                                fontSize: a(window).width() / 640 * 1.285 + "rem"
                            })
                        }
                        b.add("img", b).width(d.width).height(d.height),
                        c.width(f * d.width),
                        p.description(),
                        p.bindControl(),
                        // p.bindDotClick(),
                        f > 2 && c.prepend(a("li", c).last()).css({
                            left: -d.width
                        }),
                        d.auto && p.auto()
                    },
                    auto: function() {
                        h = d.auto ? setInterval(function() {
                            p.moving(!0)
                        },
                        d.during) : null
                    },
                    stop: function() {
                        h && clearInterval(h)
                    },
                    description: function() {
                        if (d.dotDom) {
                            d.dotDom.find('.item-selected').removeClass('item-selected');
                            d.dotDom.find('.item').eq(g).addClass('item-selected');
                        }
                    },
                    bindDotClick: function() {
                        if (d.dotDom) {
                            d.dotDom.find('.item').on('click', function(e){
                                var dotIndex = $(e.currentTarget).index();
                                p.movingTo(dotIndex);
                            })
                        }
                    },
                    bindControl: function() {
                        if (p.mobileDevice) {
                            if (d.control && d.control.remove(), 2 >= f) return;
                            c.get(0).addEventListener("touchstart", p.touchstart, !1),
                            c.get(0).addEventListener("touchmove", p.touchmove, !1),
                            c.get(0).addEventListener("touchend", p.touchend, !1)
                        } else {
                            b.hover(function() {
                                d.auto && p.stop(),
                                a(document).on("keydown",
                                function(a) {
                                    a.preventDefault(),
                                    (39 === a.keyCode || 40 === a.keyCode) && p.moving(!0),
                                    (37 === a.keyCode || 38 === a.keyCode) && p.moving(!1)
                                })
                            },
                            function() {
                                a(document).unbind(),
                                d.auto && p.auto()
                            });
                            var e = void 0 !== document.mozHidden ? "DOMMouseScroll": "mousewheel";
                            d.mousewheel && b.on(e,
                            function(a) {
                                a.preventDefault(),
                                a.stopPropagation();
                                var c = a.originalEvent.wheelDelta ? a.originalEvent.wheelDelta: -a.originalEvent.detail,
                                d = b.data("timeoutId");
                                d && clearInterval(d),
                                b.data("timeoutId", setTimeout(function() {
                                    p.moving(0 > c ? !0 : !1),
                                    b.removeData("timeoutId")
                                },
                                100))
                            }),
                            d.control && d.control.on("click",
                            function() {
                                p.moving(a(this).index() ? !0 : !1)
                            }).hover(function() {
                                d.auto && p.stop()
                            },
                            function() {
                                d.auto && p.auto()
                            })
                        }
                    },
                    moving: function(b, step) {
                        if (1 != f) {
                            var e = 0,
                            h = !0;
                            "boolean" == typeof b ? h = b: (h = b > 0 ? !1 : !0, e = b);
                            g = h ? g >= f - 1 ? 0 : g + 1 : 0 >= g ? f - 1 : g - 1;
                            var speedNew = d.speed;
                            if (step===undefined) {
                                p.description();
                            } else {
                                speedNew = d.speed/step;
                            }
                            
                            f > 2 ? (h ? c.append(a("li", c).first()).css({
                                left: 0 + e
                            }) : c.prepend(a("li", c).last()).css({
                                left: -2 * d.width + e
                            }), c.stop().animate({
                                left: [ - d.width, "easeOutExpo"]
                            },
                            speedNew)) : h ? c.stop().animate({
                                left: -d.width
                            },
                            .6 * speedNew,
                            function() {
                                a(this).append(a("li", this).first()).css({
                                    left: 0
                                })
                            }) : c.prepend(a("li", c).last()).css({
                                left: -d.width + e
                            }).stop().animate({
                                left: 0
                            },
                            .6 * speedNew)
                        }
                    },
                    movingTo: function(num) {
                        if (g > num) {console.log((g-num)+'***********'+new Date().getTime())
                            for(var i=0; i<g-num; i++) {
                                p.moving(false, g-num);
                            }
                        } else if (g < num) {console.log((num-g)+'***********'+new Date().getTime())
                            for(var i=0; i<num-g; i++) {
                                p.moving(true, num-g);
                            }
                        }
                        p.description();
                    },
                    touchPos: function(a) {
                        for (var c, d, e, b = a.changedTouches,
                        f = {},
                        g = 0; g < b.length; g++) c = b[g],
                        d = c.clientX,
                        e = c.clientY;
                        return f.x = d,
                        f.y = e,
                        f
                    },
                    touchstart: function(a) {
                        p.stop(),
                        m = (new Date).getTime(),
                        n = p.touchPos(a),
                        o.left = c.offset().left
                    },
                    touchmove: function(a) {
                        a.preventDefault();
                        var b = p.touchPos(a).x - n.x;
                        c.stop().css({
                            left: o.left + b
                        })
                    },
                    touchend: function(a) {
                        var b = p.touchPos(a).x - n.x,
                        e = (new Date).getTime() - m;
                        0 !== Math.abs(b) && (350 >= e ? p.moving(b) : Math.abs(b) <= d.width / 2 ? c.stop().animate({
                            left: [o.left, "easeOutExpo"]
                        },
                        d.speed / 2) : p.moving(b), d.auto && p.auto())
                    },
                    style: function() {
                        b.css({
                            position: "relative",
                            overflow: "hidden"
                        }).fadeIn(450),
                        e.css({
                            display: "inline",
                            "float": "left"
                        }),
                        c.add(a(".bg", b)).css({
                            position: "absolute"
                        }),
                        a(".bg", b).css({
                            background: "#000",
                            filter: "alpha(opacity=50)",
                            opacity: .5
                        }),
                        a("em", b).css({
                            display: "inline-block",
                            position: "relative"
                        })
                    }
                };
                p.init()
            })
        }
    })
} (jQuery),
$.extend($.easing, {
    easeOutExpo: function(a, b, c, d, e) {
        return b == e ? c + d: d * ( - Math.pow(2, -10 * b / e) + 1) + c
    }
});