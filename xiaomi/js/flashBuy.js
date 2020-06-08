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

// 小米闪购
var h_time = document.getElementById("h_time");
var m_time = document.getElementById("m_time");
var s_time = document.getElementById("s_time");

function addZero(TimVal) {
    return TimVal < 10 ? "0" + TimVal : TimVal;
}

function countTime() {
    var nowTime = new Date();
    var stopTime = new Date("2021/4/13,19:28:00");
    var continueTime = parseInt((stopTime.getTime() - nowTime.getTime()) / 1000);
    var h = parseInt(continueTime / (60 * 60) % 24);
    var m = parseInt(continueTime / 60 % 60);
    var s = parseInt(continueTime % 60);
    h = addZero(h);
    m = addZero(m);
    s = addZero(s);

    if (continueTime > 0) {
        h_time.innerHTML = h;
        m_time.innerHTML = m;
        s_time.innerHTML = s;
    }
}

countTime();
setInterval(countTime, 1000);

//点击抢购时间更换背景

var ul = document.querySelectorAll(".title_ul>li");
// console.log(ul.length);
ul[0].addEventListener('click', function () {
    this.style.background = "#f1393a";
    for (var i = 1; i < ul.length; i++) {
        ul[i].style.background = "#414141";
    }
});
ul[1].addEventListener('click', function () {
    this.style.background = "#f1393a";
    ul[0].style.background = "#414141";
    for (var i = 2; i < ul.length; i++) {
        ul[i].style.background = "#414141";
    }
});
ul[2].addEventListener('click', function () {
    this.style.background = "#f1393a";
    for (var i = 0; i < ul.length - 3; i++) {
        ul[i].style.background = "#414141";
    }
    for (var i = 3; i < ul.length; i++) {
        ul[i].style.background = "#414141";
    }
});
ul[3].addEventListener('click', function () {
    this.style.background = "#f1393a";
    for (var i = 0; i < ul.length - 2; i++) {
        ul[i].style.background = "#414141";
    }
    for (var i = 4; i < ul.length; i++) {
        ul[i].style.background = "#414141";
    }
});
ul[4].addEventListener('click', function () {
    this.style.background = "#f1393a";
    for (var i = 0; i < ul.length - 1; i++) {
        ul[i].style.background = "#414141";
    }

});