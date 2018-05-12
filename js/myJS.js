$(document).ready(function() {
    if($(".scrolltop").length) {
        var e = function() {
            $(window).scrollTop() > 500 ? $(".scrolltop").addClass("show-btn") : $(".scrolltop").removeClass("show-btn")
        };
        e(),
        $(window).on("scroll", function() {
            e()
        }),
        $(".scrolltop").on("click", function(e) {
            e.preventDefault(),
            $("html,body").animate({
                scrollTop: 0
            }, 700)
        })
    }
    $(".menu-nav ul li").hover(function() {
        $(this).children("ul").stop(!0, !1, !0).fadeToggle(400)
    }),
    $(window).scroll(function() {
        $(window).scrollTop() > 187 ? ($("#menu").css( {
            position: "fixed",
            top: "0",
            width: "100%"
        }),
        $("#body").css("margin-top", "79px")) : ($("#menu").removeAttr("style"),
        $("#body").removeAttr("style"))
    }),
    $("#banner").owlCarousel({
        loop: true,
        margin:10,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout:3000,
        smartSpeed:1000,
        animateOut:"fadeOut",
        responsive: {
            0: {
                items: 1,
                nav: false,
                autoplay: false
            }
            , 498: {
                items: 1,
                nav: false
            }
            , 785: {
                items: 1,
                nav: false,
                dots: true
            }
            , 1200: {
                items: 1,
                nav: true,
                navText: ["&nbsp;", "&nbsp;"],
                margin: 10,
                dots: false
            }
        }
    }),
    $("#slide_sale").owlCarousel( {
        loop: true,
        margin:10,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        responsive: {
            0: {
                items: 1,
                nav: false,
                autoplay: false
            },
            498: {
                items: 2,
                nav: false
            }
            , 785: {
                items: 3,
                nav: false,
                dots: true
            }
            , 1200: {
                items: 4,
                nav: true,
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                margin: 30,
                dots: false
            }
        }
    }),
    $("#related").owlCarousel( {
        loop:!0, margin:10, responsiveClass:!0, autoplay:!0, autoplayTimeout:5e3, smartSpeed:800, responsive: {
            0: {
                items: 1, nav: !1, dots: !1, nav: !0, navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'], autoplay: !1
            }
            , 498: {
                items: 2, nav: !1
            }
            , 785: {
                items: 3, nav: !1, dots: !0
            }
            , 1200: {
                items: 3, nav: !0, navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'], margin: 30, dots: !1
            }
        }
    }),
    $(".sideTrigger").click(function() {
        $("body").toggleClass("sideOpen")
    }),
    $(".closeTrigger").click(function() {
        $("body").removeClass("sideOpen")
    }),
    $(".sideMenu ul li.has-children .click-dropdown").click(function() {
        $(this).parent().children("ul").stop(true, false, true).slideToggle(200)
    }),
    $("#frmSingin").validate(),
    $("#frmSignup").validate( {
        rules: {
            cpwd1: {
                equalTo: "#pwd1"
            }
        }
    }),
    $("#frmPay").validate(),
    $("#email1").on("input", function(e) {
        e.preventDefault();
        var a = $(this).val(), o = $("#hidden").attr("url");
        $.ajax( {
            url:o,
            type:"POST",
            dataType:"text",
            data: {
                email: a
            }
            , success:function(e) {
                "error" == e ? $('<label class="error" id="email1-lb">Email này đã tồn tại! </label>').insertAfter("#email1") : $("#email1-lb").remove()
            }
        })
    }),
    $("#frmChange").validate( {
        rules: {
            cpwd1: {
                equalTo: "#pwd1"
            }
        }
    }),
     $("#btn-back").click(function() {
        history.back();
    });
});