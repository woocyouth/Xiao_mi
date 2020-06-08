// 侧边栏返回顶部
window.onscroll = function () {
    if (document.documentElement.scrollTop >= 200) {
        document.getElementById("Top").style.opacity = '1';
    } else {
        document.getElementById("Top").style.opacity = '0';
    }
};

function goToTop(acceleration, time) {
    acceleration = acceleration || 0.05;
    time = time || 16;

    var x1 = 0;
    var y1 = 0;
    var x2 = 0;
    var y2 = 0;
    var x3 = 0;
    var y3 = 0;

    if (document.documentElement) {
        x1 = document.documentElement.scrollLeft || 0;
        y1 = document.documentElement.scrollTop || 0;

    }
    if (document.body) {
        x2 = document.body.scrollLeft || 0;
        y2 = document.body.scrollTop || 0;

    }
    var x3 = window.scrollX || 0;
    var y3 = window.scrollY || 0;

    // 滚动条到页面顶部的水平距离
    var x = Math.max(x1, Math.max(x2, x3));
    // 滚动条到页面顶部的垂直距离
    var y = Math.max(y1, Math.max(y2, y3));

    // 滚动距离 = 目前距离 / 速度, 因为距离原来越小, 速度是大于 1 的数, 所以滚动距离会越来越小
    var speed = 1 + acceleration;
    // console.log(speed);
    window.scrollTo(Math.floor(x / speed), Math.floor(y / speed));

    // 如果距离不为零, 继续调用迭代本函数
    if (x > 0 || y > 0) {
        var invokeFunction = "goToTop(" + acceleration + ", " + time + ")";
        var win = window.setTimeout(invokeFunction, time);
    }

    var scrollFunc = function (e) {
        e = e || window.event;
        if (e.wheelDelta) {  //判断浏览器IE，谷歌滑轮事件
            clearTimeout(win);
        }
    };
    //给页面绑定滑轮滚动事件
    if (document.addEventListener) {
        document.addEventListener('DOMMouseScroll', scrollFunc, false);
    }
    //滚动滑轮触发scrollFunc方法
    window.onmousewheel = document.onmousewheel = scrollFunc;
}

// search
var search = document.getElementById("search");
var sear = document.getElementById("sear");
var sear_a = document.getElementById("sear_a");
var sear_for = document.getElementById("sear_for");
var sear_btn = document.getElementById("sear_btn");
sear.value = null;
sear.addEventListener('blur', function () {
    search.style.border = "1px solid #e0e0e0";
    sear_btn.style.cssText = "border-left:1px solid #e0e0e0";
    sear_for.style.display = "none";

    search.addEventListener('mouseover', function () {
        this.style.border = "1px solid #b0b0b0";
        sear_btn.style.cssText = "border-left:1px solid #b0b0b0";
    });
    search.addEventListener('mouseout', function () {
        this.style.border = "1px solid #e0e0e0";
        sear_btn.style.cssText = "border-left:1px solid #e0e0e0";
    });
    if (sear.value == null || sear.value === "" || sear.value === undefined) {
        sear_a.style.display = "block";
    } else {
        sear_a.style.display = "none";
    }

});
sear.addEventListener('focus', function () {
    // this.style.border = "1px solid #ff6700";
    search.style.border = "1px solid #ff6700";
    sear_btn.style.cssText = "border-left:1px solid #ff6700";
    sear_for.style.display = "block";
    sear_a.style.display = "none";
    search.addEventListener('mouseover', function () {
        this.style.border = "1px solid #ff6700";
        sear_btn.style.cssText = "border-left:1px solid #ff6700";
    });
    search.addEventListener('mouseout', function () {
        this.style.border = "1px solid #ff6700";
        sear_btn.style.cssText = "border-left:1px solid #ff6700";
    });
});

//screen-list 筛选列表
var all = document.getElementById("all");
var phone = document.getElementById("phone");
var screen_ul = document.querySelectorAll(".screen-list>ul");
var recommend_li = document.querySelectorAll(".recommend-Wrap-ul>li");
var one_list = document.getElementById("one-list");
var two_list = document.getElementById("two-list");
var one = document.getElementById("one-list");
var one_list_span = document.getElementById("one-li");
var two = document.querySelector(".two");
var two_list_span = document.getElementById("two-li");
var screen_ul_li = screen_ul[5].querySelectorAll(".screen-list-ul>li");
var list_show = document.getElementsByClassName("list-show");
var list_show_last = document.getElementsByClassName("list-show-active-last");
var list_more = document.getElementById("list-more");

// console.log(screen_ul_li.length);
list_more.addEventListener('click',function () {
    if (screen_ul_li[8].style.display === "none"){
        screen_ul_li[8].style.display = "block";
    }else{
        screen_ul_li[8].style.display = "none";
    }

});

screen_ul_li[1].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show[0].classList.add("list-show-active");
    list_show[0].style.display = "block";

});
screen_ul_li[1].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show[0].classList.remove("list-show-active");
    list_show[0].style.display = "none";
});
screen_ul_li[2].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show[1].classList.add("list-show-active");
    list_show[1].style.display = "block";

});
screen_ul_li[2].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show[1].classList.remove("list-show-active");
    list_show[1].style.display = "none";
});
screen_ul_li[3].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show[2].classList.add("list-show-active");
    list_show[2].style.display = "block";

});
screen_ul_li[3].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show[2].classList.remove("list-show-active");
    list_show[2].style.display = "none";
});
screen_ul_li[4].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show[3].classList.add("list-show-active");
    list_show[3].style.display = "block";

});
screen_ul_li[4].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show[3].classList.remove("list-show-active");
    list_show[3].style.display = "none";
});
screen_ul_li[5].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show[4].classList.add("list-show-active");
    list_show[4].style.display = "block";

});
screen_ul_li[5].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show[4].classList.remove("list-show-active");
    list_show[4].style.display = "none";
});
screen_ul_li[6].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show[5].classList.add("list-show-active");
    list_show[5].style.display = "block";

});
screen_ul_li[6].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show[5].classList.remove("list-show-active");
    list_show[5].style.display = "none";
});
screen_ul_li[7].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show[6].classList.add("list-show-active");
    list_show[6].style.display = "block";

});
screen_ul_li[7].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show[6].classList.remove("list-show-active");
    list_show[6].style.display = "none";
});
screen_ul_li[8].addEventListener('mouseover', function () {
    this.classList.add("screen-list-ul-li-active");
    list_show_last[0].classList.add("list-show-active");
    list_show_last[0].style.display = "block";

});
screen_ul_li[8].addEventListener('mouseout', function () {
    this.classList.remove("screen-list-ul-li-active");
    list_show_last[0].classList.remove("list-show-active");
    list_show_last[0].style.display = "none";
});

for (var i = 1; i < screen_ul.length; i++) {
    screen_ul[i].style.display = "none";
}

screen_ul[0].style.padding = "18px 0";

phone.addEventListener('click', function () {
    this.style.color = "#ff6700";
    all.style.color = "#424242";
    screen_ul[0].style.padding = "18px 0 0 0";
    for (var i = 1; i < screen_ul.length; i++) {
        screen_ul[i].style.display = "block";
    }
});

all.addEventListener('click', function () {
    this.style.color = "#ff6700";
    phone.style.color = "#424242";
    screen_ul[0].style.padding = "18px 0";
    for (var i = 1; i < screen_ul.length; i++) {
        screen_ul[i].style.display = "none";
    }
});

two_list.addEventListener('click', function () {
    recommend_li[0].style.margin = "0 0 0 -234px";
    for (var i = 1; i < recommend_li.length - 5; i++) {
        recommend_li[i].style.margin = "0 0 0 -249px";
    }
    two.className = "active-next-w";
    two_list_span.className = "active-next";
    one.className = "active-pre-w";
    one_list_span.className = "active-pre-close";
    one.addEventListener('mouseover', function () {
        one_list_span.style.background = "#ff6700";
    });
    one.addEventListener('mouseout', function () {
        one_list_span.style.background = "#757575";
    });
    two.addEventListener('mouseover', function () {
        two_list_span.style.background = "#fff";
    });
    two.addEventListener('mouseout', function () {
        two_list_span.style.background = "#fff";
    });
});

one_list.addEventListener('click', function () {
    recommend_li[0].style.cssText = "margin-left:0";
    for (var i = 1; i < recommend_li.length - 5; i++) {
        recommend_li[i].style.cssText = "margin-left:15px";
    }
    one.className = "active-pre-w";
    one_list_span.className = "active-pre";
    two.className = "active-next-w-close";
    two_list_span.className = "active-next-close";
    two.addEventListener('mouseover', function () {
        two_list_span.style.background = "#ff6700";
    });
    two.addEventListener('mouseout', function () {
        two_list_span.style.background = "#757575";
    });
    one.addEventListener('mouseover', function () {
        one_list_span.style.background = "#fff";
    });
    one.addEventListener('mouseout', function () {
        one_list_span.style.background = "#fff";
    });
});
