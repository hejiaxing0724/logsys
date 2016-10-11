define("waimai:widget/landing/citybar/citybar.js", function(i, t, n) {
    var c = i("waimai:widget/common/ui/citybar/citybar.js");
    n.exports = {
        init: function(i) {
            new c({
                $el: $("#landing-citybar"),
                cityList: i.city_list,
                currentCity: i.current_city
            })
        }
    }
});;
define("waimai:widget/landing/muti/muti.js", function(i, t, n) {
    var m = i("waimai:widget/common/ui/muticities/muti.js");
    n.exports = {
        init: function() {
            m.init()
        }
    }
});;
define("waimai:widget/landing/search/search.js", function(require, exports, module) {
    function clearItemSelected() {
        $el.find("li").removeClass("s-on")
    }
    function setItemTopAttr(e) {
        for (var t = e.find("li"), a = e.offset().top, i = 0, n = t.length; n > i; i++) {
            var d = t.eq(i).offset().top,
                s = t.eq(i).outerHeight(!0),
                o = d - s - a;
            t.eq(i).attr("data-top", o)
        }
    }
    function showHistory() {
        clearItemSelected(), 0 != $el.find(".search-history li").length && ($el.find(".s-item").not(".search-history").addClass("s-hide"), $el.find(".search-history").removeClass("s-hide"), setItemTopAttr($el.find(".search-history")))
    }
    function showSuggestion() {
        clearItemSelected(), $el.find(".s-item").not(".mod-search-sug").addClass("s-hide"), $el.find(".search-sug").removeClass("s-hide"), setItemTopAttr($el.find(".search-sug"))
    }
    function showResult() {
        clearItemSelected(), $el.find(".s-item").not(".search-result").addClass("s-hide"), $el.find(".search-result").removeClass("s-hide"), setItemTopAttr($el.find(".search-result")), showColse()
    }
    function showEmpty() {
        $el.find(".s-item").not(".search-empty").addClass("s-hide"), $el.find(".search-empty").removeClass("s-hide"), showColse()
    }
    function showLoading() {
        $el.find(".search-loading").removeClass("s-hide"), $el.find(".search-close").addClass("s-hide")
    }
    function showColse() {
        $el.find(".search-close").removeClass("s-hide")
    }
    function hideClose() {
        $el.find(".search-close").addClass("s-hide")
    }
    function hideAll() {
        $el.find(".s-item").addClass("s-hide")
    }
    function stopBubble(e) {
        e.preventDefault(), e.stopPropagation()
    }
    function goSearch(e, t, a) {
        showLoading();
        var e = e ? e : $searchCon.val();
        !t && (t = ""), !a && (a = ""), addNStat({
            da_src: "findBk.searchBtn",
            da_act: "click",
            da_trd: "waimai"
        });
        var i = "/waimai?qt=poisearch&from=pc&ie=utf-8&sug=0&tn=B_NORMAL_MAP&oue=1&res=1&c=" + CookieDataCenter.getCity().code;
        $.ajax({
            type: "GET",
            url: i,
            dataType: "json",
            data: {
                wd: e,
                _t: +new Date,
                lat: t,
                lng: a
            },
            success: function(e) {
                if (0 == e.error_no) if ("" == e.result.url) {
                    var t = resultTpl({
                        data: e.result.content,
                        city_id: e.result.city_id
                    });
                    $el.find(".search-result").html(t), showResult()
                } else {
                    var a = e.result.content[0] || {
                        shopnum: 0
                    };
                    if (a.shopnum) {
                        var i = {};
                        i.name = a.name, i.address = a.address, i.lat = a.latitude, i.lng = a.longitude, i.shopnum = a.shopnum, i.city_id = e.result.city_id, AddressDataCenter.add(i), window.location.href = "https://waimai.baidu.com" + e.result.url
                    } else showEmpty()
                } else showEmpty()
            }
        })
    }
    function getSug(e) {
        var t = CookieDataCenter.getCity().code,
            a = "<ul>";
        $.ajax({
            url: "/waimai?qt=poisug",
            type: "POST",
            dataType: "json",
            data: {
                cid: t,
                type: 0,
                wd: e,
                from: "pc"
            },
            success: function(t) {
                var i = t.s || [];
                i.length > 0 && ($.each(i, function(t, i) {
                    var n = i.split("$"),
                        d = n[3],
                        s = n[5].split(",")[0],
                        o = n[5].split(",")[1],
                        l = "<i></i>" + d.replace(e, "<b>" + e + "</b>");
                    a += "<li data-name='" + d + "' data-lat='" + s + "' data-lng='" + o + "'>" + l + "</li>"
                }), a += "</ul>", $el.find(".search-sug").html(a), showSuggestion())
            }
        })
    }
    function enterOption() {
        var e = $el.find(".search-history:not('.s-hide')");
        if (e.length > 0) {
            var t = e.find("li.s-on");
            if (t.length > 0) return void t.click()
        }
        var e = $el.find(".search-result:not('.s-hide')");
        if (e.length > 0) {
            var t = e.find("li.s-on");
            if (t.length > 0) return void t.click()
        }
        $(".search-btn").click()
    }
    function initEvent() {
        $searchCon.on("click", function(e) {
            listener.trigger("mask", "hide");
            var t = $searchCon.val(),
                a = CookieDataCenter.getCity();
            0 == t.length ? a.hasaoi ? (listener.trigger("city", "hasaoi", a), hideAll()) : (hideClose(), showHistory()) : (showColse(), getSug(t)), e.stopPropagation()
        }), $searchCon.on("keyup focus", function(e) {
            var t = $(e.currentTarget),
                a = t.val(),
                i = CookieDataCenter.getCity();
            i.hasaoi && "" === a ? (listener.trigger("city", "hasaoi", i), hideAll()) : listener.trigger("city", "hide")
        }), $searchCon.on("keydown", function(e) {
            if (13 == e.which) return void enterOption();
            if (38 == e.which) {
                var t = $el.find(".search-show:not('.s-hide')").find("ul");
                if (t.length > 0) {
                    var a = t.find("li.s-on");
                    0 == a.length || 0 == a.index() ? (t.find("li:last").addClass("s-on"), a.removeClass("s-on")) : (a.prev("li").addClass("s-on"), a.removeClass("s-on"));
                    var i = t.find("li.s-on"),
                        n = i.attr("data-name");
                    listScroll(), n && $searchCon.val(n)
                }
                return e.preventDefault(), void e.stopPropagation()
            }
            if (40 == e.which) {
                var t = $el.find(".search-show:not('.s-hide')").find("ul");
                if (t.length > 0) {
                    var a = t.find("li.s-on");
                    0 == a.length || a.index() == t.find("li").length - 1 ? (t.find("li:first").addClass("s-on"), a.removeClass("s-on")) : (a.next("li").addClass("s-on"), a.removeClass("s-on"));
                    var i = t.find("li.s-on"),
                        n = i.attr("data-name");
                    listScroll(), n && $searchCon.val(n)
                }
                return e.preventDefault(), void e.stopPropagation()
            }
            var d = CookieDataCenter.getCity();
            setTimeout(function() {
                var e = $searchCon.val();
                0 == e.length ? d.hasaoi ? (listener.trigger("city", "hasaoi", d), hideAll()) : (hideClose(), showHistory()) : (showColse(), getSug(e))
            }, 0)
        }), $el.find(".search-btn").on("click", function() {
            listener.trigger("mask", "show");
            var e = $searchCon.val();
            return e && 0 != e.length ? void goSearch(e, "", "") : void $searchCon.focus()
        }), $el.on("click", ".search-sug li", function(e) {
            stopBubble(e);
            var t = $(this),
                a = t.data("name"),
                i = t.data("lat"),
                n = t.data("lng");
            $searchCon.val(a), listener.trigger("mask", "show");
            var d = $searchCon.val();
            return d && 0 != d.length ? void goSearch(d, i, n) : void $searchCon.focus()
        }), $el.on("click", ".search-result li", function(e) {
            if (stopBubble(e), !$(this).find(".addr-shop-num").hasClass("addr-no-open")) {
                var t = $(this).attr("data-link"),
                    a = $(this).attr("data-msg"),
                    i = a.split("$"),
                    n = {};
                n.name = i[0], n.address = i[1], n.lat = i[2], n.lng = i[3], n.shopnum = i[4], n.city_id = i[5], AddressDataCenter.add(n), window.location.href = t
            }
        }), $el.on("click", ".search-close", function() {
            $searchCon.val(""), $searchCon.click(), $searchCon.focus()
        }), $el.on("click", ".search-history li", function() {
            var e = $(this).attr("data-link");
            window.location.href = e
        }), $el.on("click", ".clear-btn", function() {
            AddressDataCenter.clearAll(), $el.find(".search-history").empty()
        }), $(document).on("click", hideAll), $el.hover(function() {
            $(document).unbind("click", hideAll)
        }, function() {
            $(document).on("click", hideAll)
        }), listener.on("muticities", "show", function() {
            hideAll(), setTimeout(function() {
                $el.find("#search-con").val("")
            }, 0)
        })
    }
    function listScroll() {
        var e = $el.find(".search-show:not('.s-hide')"),
            t = [];
        if (e.length > 0) {
            if (t = e.find("li"), e.hasClass("search-sug")) {
                if (t.size() < 7) return
            } else if (t.size() < 5) return;
            var a = e.find("li.s-on").attr("data-top");
            e.scrollTop(a)
        }
    }
    function initHistory() {
        var e = AddressDataCenter.getAll();
        if (e && e.length) {
            var t = historyTpl({
                data: e
            });
            $el.find(".search-history").html(t)
        }
    }
    function initAld() {
        var e = util.getParams(window.location.href),
            t = CookieDataCenter.getCity().code;
        e && e.city && e.cname && e.query && (e.city != t && CookieDataCenter.setCity({
            code: e.city,
            name: decodeURIComponent(e.cname)
        }), setTimeout(function() {
            $searchCon.val(decodeURIComponent(e.query)), $el.find(".search-btn").click()
        }, 500))
    }
    var CookieDataCenter = require("waimai:static/utils/CookieDataCenter.js"),
        AddressDataCenter = require("waimai:static/utils/AddressDataCenter.js");
    require("waimai:static/utils/statis.js");
    var resultTpl = [function(_template_object) {
        var _template_fun_array = [],
            fn = function(__data__) {
                var _template_varName = "";
                for (var name in __data__) _template_varName += "var " + name + '=__data__["' + name + '"];';
                eval(_template_varName), _template_fun_array.push('<div class="search-title">    <div class="search-desc">请确定您的地址</div></div><div class="search-list s-list">    <ul>        ');
                for (var i = 0, len = data.length; len > i; i++) {
                    var item = data[i];
                    _template_fun_array.push('            <li data-uid = "', "undefined" == typeof item.uid ? "" : baidu.template._encodeHTML(item.uid), '" data-link = "/waimai?qt=shoplist&lat=', "undefined" == typeof item.latitude ? "" : baidu.template._encodeHTML(item.latitude), "&lng=", "undefined" == typeof item.longitude ? "" : baidu.template._encodeHTML(item.longitude), "&address=", "undefined" == typeof item.name ? "" : baidu.template._encodeHTML(item.name), "&city_id=", "undefined" == typeof city_id ? "" : baidu.template._encodeHTML(city_id), '" data-msg = "', "undefined" == typeof item.name ? "" : baidu.template._encodeHTML(item.name), "$", "undefined" == typeof(item.address ? item.address : "") ? "" : baidu.template._encodeHTML(item.address ? item.address : ""), "$", "undefined" == typeof item.latitude ? "" : baidu.template._encodeHTML(item.latitude), "$", "undefined" == typeof item.longitude ? "" : baidu.template._encodeHTML(item.longitude), "$", "undefined" == typeof item.shopnum ? "" : baidu.template._encodeHTML(item.shopnum), "$", "undefined" == typeof city_id ? "" : baidu.template._encodeHTML(city_id), '" data-name="', "undefined" == typeof decodeURIComponent(item.name) ? "" : baidu.template._encodeHTML(decodeURIComponent(item.name)), '">                <div class="addr addr-icon"></div>                <div class="addr addr-content">                    <p class="addr-name">', "undefined" == typeof item.name ? "" : baidu.template._encodeHTML(item.name), '</p>                    <p class="addr-desc">', "undefined" == typeof(item.address ? item.address : "") ? "" : baidu.template._encodeHTML(item.address ? item.address : ""), "</p>                    "), item.shopnum && 0 !== parseInt(item.shopnum, 10) ? _template_fun_array.push('                        <p class="addr-shop-num">', "undefined" == typeof item.shopnum ? "" : baidu.template._encodeHTML(item.shopnum), "家餐厅</p>                    ") : _template_fun_array.push('                        <p class="addr-shop-num addr-no-open">暂无开通</p>                    '), _template_fun_array.push("                </div>            </li>        ")
                }
                _template_fun_array.push("    </ul></div>"), _template_varName = null
            }(_template_object);
        return fn = null, _template_fun_array.join("")
    }][0],
        historyTpl = [function(_template_object) {
            var _template_fun_array = [],
                fn = function(__data__) {
                    var _template_varName = "";
                    for (var name in __data__) _template_varName += "var " + name + '=__data__["' + name + '"];';
                    eval(_template_varName), _template_fun_array.push('<div class="s-list search-list">    <ul>        ');
                    for (var i = 0, len = data.length; len > i; i++) {
                        var item = data[i];
                        _template_fun_array.push('        <li data-link = "https://waimai.baidu.com/waimai?qt=shoplist&lat=', "undefined" == typeof item.lat ? "" : baidu.template._encodeHTML(item.lat), "&lng=", "undefined" == typeof item.lng ? "" : baidu.template._encodeHTML(item.lng), "&address=", "undefined" == typeof decodeURIComponent(item.name) ? "" : baidu.template._encodeHTML(decodeURIComponent(item.name)), "&city_id=", "undefined" == typeof decodeURIComponent(item.city_id) ? "" : baidu.template._encodeHTML(decodeURIComponent(item.city_id)), "&uid=", "undefined" == typeof decodeURIComponent(item.uid) ? "" : baidu.template._encodeHTML(decodeURIComponent(item.uid)), '" data-name="', "undefined" == typeof decodeURIComponent(item.name) ? "" : baidu.template._encodeHTML(decodeURIComponent(item.name)), '">                <div class="addr his-icon"></div>                <div class="addr addr-content">                    <p class="addr-name">', "undefined" == typeof decodeURIComponent(item.name) ? "" : baidu.template._encodeHTML(decodeURIComponent(item.name)), '</p>                    <p class="addr-desc">', "undefined" == typeof decodeURIComponent(item.address) ? "" : baidu.template._encodeHTML(decodeURIComponent(item.address)), "</p>                    "), item.shopnum && 0 !== parseInt(item.shopnum, 10) ? _template_fun_array.push('                        <p class="addr-shop-num">', "undefined" == typeof item.shopnum ? "" : baidu.template._encodeHTML(item.shopnum), "家外卖餐厅</p>                    ") : _template_fun_array.push('                        <p class="addr-shop-num addr-no-open">暂无开通</p>                    '), _template_fun_array.push("                </div>            </li>        ")
                    }
                    _template_fun_array.push('    </ul></div><div class="search-history-clear">    <a class="clear-btn">清空历史记录</a></div>'), _template_varName = null
                }(_template_object);
            return fn = null, _template_fun_array.join("")
        }][0],
        $el = $("#landing-search"),
        $searchCon = $("#search-con"),
        $targetSelect = null;
    module.exports = {
        init: function() {
            initEvent(), initHistory(), initAld(), $(function() {
                $(".placeholder-con").placeholder()
            })
        }
    }
});;
define("waimai:page/landing.js", function() {
    window.onresize = function() {
        var n = $(window).outerHeight();
        n > 1215 && $("#content").css("height", n - 1010)
    }, $(function() {
        console._log("好吧，藏在这里都被你发现了！\n说明你不仅是一名吃货，还是一名会敲代码的吃货！\n那么，你一定是我们的菜了，快到碗里来！\n世界那么大，我想都尝尝！"), console._log("请发送简历至：%chr_talent@iwaimai.baidu.com（邮件标题请以“姓名-应聘XX职位-来自console”命名）", "color:red;"), console._log("职位介绍：http://dwz.cn/1jjsJ6");
        var n = $(window).outerHeight();
        n > 1215 && $("#content").css("height", n - 1010)
    })
});