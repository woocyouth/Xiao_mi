//购物车列表
var Cart_all_list = document.querySelector(".Cart-all-list");

//去购物车结算
var go_To_Cart = document.getElementById("go-To-Cart");
go_To_Cart.addEventListener('click',function () {
    window.open("../user/shoppingCart.php");
});

// 侧边栏返回顶部
window.onscroll = function () {
    if (document.documentElement.scrollTop < 500) {
        document.getElementById("Top").style.opacity = '0';
    } else {
        document.getElementById("Top").style.opacity = '1';
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


// video
var vd = document.getElementsByTagName("video")[0];
var vl = document.getElementById("volume");
var pro = document.getElementById("progress");
var dia = document.getElementById("dia");
var bar = document.getElementById("bar");
var vol_bar = document.getElementById("volume_bar");
var big_play = document.getElementsByClassName("big_play_btn")[0];
var TimCur = document.getElementById("current");
var TimDur = document.getElementById("duration");
var star = document.getElementById("star");
var pau = document.getElementById("pau");
var timer = 0;
var position = 0;
var vol_position = 0;

// star.addEventListener("onclick",function () {
//       star.style.display = "none";
//       pau.style.display = "block";
// });
//
// pau.addEventListener("onclick",function () {
//     star.style.display = "block";
//     pau.style.display = "none";
// });

function star_click() {
    star.style.display = "none";
    pau.style.display = "block";
}

function pau_click() {
    star.style.display = "block";
    pau.style.display = "none";
}

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

// 手动切换滚动图片
var cot = 0;
var flash_shop_ul = document.querySelectorAll(".flash-shop-ul>li");
var pre = document.getElementById("pre");
var next = document.getElementById("next");

function flash_next() {
    for (var i = 0; i < flash_shop_ul.length - 8; i++) {
        if (cot < 4) {
            $(".flash-shop-ul li").eq(cot).animate({'margin-left': '-248px'}, 500);
            cot++;
        }
    }
}


function flash_next_two() {
    for (var i = 0; i < flash_shop_ul.length - 4; i++) {
        if (cot < 8) {
            $(".flash-shop-ul li").eq(cot).animate({'margin-left': '-248px'}, 500);
            cot++;
        }
    }
}

function flash_pre() {
    for (var i = 0; i < flash_shop_ul.length-4; i++) {
        if (cot > 0) {
            cot--;
            $(".flash-shop-ul li").eq(cot).animate({'margin-left': '14px'}, 500);
        }
        if (cot === 0) {
            $(".flash-shop-ul li").eq(cot).animate({'margin-left': '0'}, 500);
        }
    }
}

var flash_time = setInterval(function () {
    if (cot < 4) {
        flash_next();
    }
    // if (cot > 4 && cot < 8){
    //     flash_next_two();
    // }
    cot++;
    if (cot > 5) {
        flash_pre();
        cot = 0;
    }
    // console.log(cot);
}, 3000);

pre.addEventListener('click', function () {
    clearInterval(flash_time);
});
next.addEventListener('click', function () {
    clearInterval(flash_time);
});

// 输出时间字符串 01:01:01 格式
function TimeToMinute(times) {
    var t;
    if (times >= 0) {
        var hour = Math.floor(times / 3600);
        var min = Math.floor(times / 60) % 60;
        var sec = times % 60;
        if (hour < 10) {
            t = '0';
        }
        t += hour + ":";

        if (min < 10) {
            t += "0";
        }
        t += min + ":";

        if (sec < 10) {
            t += "0";
        }
        t += sec.toFixed(2);
    }
    t = t.substring(0, t.length - 3);
    return t;
}

// 监听视频是否就绪，当视频预加载完成时显示视频总时间
vd.addEventListener("canplay", function () {
    var timers = Math.ceil(this.duration);
    TimDur.innerHTML = TimeToMinute(timers);
});

// 监听视频播放进度，显示进度时间
vd.addEventListener("timeupdate", function () {
    var timers = Math.ceil(this.currentTime);
    TimCur.innerHTML = TimeToMinute(timers);
});

// 视频进度初始化
function init() {
    pro.max = vd.duration.toFixed(0);
}

// 进度条
function change() {
    position = vd.currentTime = pro.value;
}

// 进度条
// function vol_change() {
//
// }

// 音量条
function vo_change() {
    vol_bar.style.width = vl.value + "px";
    vd.volume = vl.value / 100;
    // console.log(vl.value);
}

// 对话框显示，并且播放视频
function dia_show() {
    // dia.show();
    dia.showModal();
    vd.play();
    timer = setInterval(function () {
        pro.value++;
        // console.log(pro.value);
        for (var i = 1; i <= pro.value; i++) {
            bar.style.width = (i * 9.36) + "px";
        }
    }, 1000);
    star.style.display = "none";
    pau.style.display = "block";
}

// 监听视频结束时，进度条清零
vd.addEventListener("ended", function () {
    // alert(position);
    clearInterval(timer);
    bar.style.width = "0px";
    position = vd.currentTime = pro.value = 0;
});

// 点击视频暂停/开始
function video_play_pause() {
    if (vd.paused) {
        vd.play();
        timer = setInterval(function () {
            pro.value++;
            for (var i = 1; i <= pro.value; i++) {
                bar.style.width = (i * 9.36) + "px";
            }
            star.style.display = "none";
            pau.style.display = "block";
        }, 1000);
        big_play.style.display = "none";
    } else {
        vd.pause();
        clearInterval(timer);
        big_play.style.display = "block";
        star.style.display = "block";
        pau.style.display = "none";
    }
}

// 对话框关闭，并且关闭视频，进度初始化为0
function close_d() {
    dia.close();
    vd.pause();
    clearInterval(timer);
    big_play.style.display = "none";
    bar.style.width = "0px";
    position = vd.currentTime = pro.value = 0;
}

// 视频播放/暂停
function play() {
    if (vd.paused) {
        vd.play();
        timer = setInterval(function () {
            pro.value++;
            for (var i = 1; i <= pro.value; i++) {
                bar.style.width = (i * 9.36) + "px";
            }
        }, 1000);

        big_play.style.display = "none";
    } else if (!vd.paused) {
        vd.pause();
        clearInterval(timer);
        big_play.style.display = "block";
    }
}

// 视频全屏
function fullScreen() {
    vd.requestFullscreen();
}

// 家电
function hot_1() {
    var ul_1 = document.getElementById("ul_1");
    var ul_2 = document.getElementById("ul_2");
    var li_1 = document.getElementById("li_1");
    var li_2 = document.getElementById("li_2");
    ul_1.style.display = "block";
    ul_2.style.display = "none";
    li_1.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_2.style.cssText = "color:#424242;border-bottom:none;";
}

function other_1() {
    var ul_1 = document.getElementById("ul_1");
    var ul_2 = document.getElementById("ul_2");
    var li_1 = document.getElementById("li_1");
    var li_2 = document.getElementById("li_2");
    ul_1.style.display = "none";
    ul_2.style.display = "block";
    li_2.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_1.style.cssText = "color:#424242;border-bottom:none;";
}

// 搭配
function hot_1_2() {
    var ul_1 = document.getElementById("ul_1_1");
    var ul_2 = document.getElementById("ul_1_2");
    var li_1 = document.getElementById("li_1_1");
    var li_2 = document.getElementById("li_1_2");
    ul_1.style.display = "block";
    ul_2.style.display = "none";
    li_1.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_2.style.cssText = "color:#424242;border-bottom:none;";
}

function other_1_2() {
    var ul_1 = document.getElementById("ul_1_1");
    var ul_2 = document.getElementById("ul_1_2");
    var li_1 = document.getElementById("li_1_1");
    var li_2 = document.getElementById("li_1_2");
    ul_1.style.display = "none";
    ul_2.style.display = "block";
    li_2.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_1.style.cssText = "color:#424242;border-bottom:none;";
}

// 周边
function hot_1_3() {
    var ul_1 = document.getElementById("ul_1_3");
    var ul_2 = document.getElementById("ul_1_4");
    var li_1 = document.getElementById("li_1_3");
    var li_2 = document.getElementById("li_1_4");
    ul_1.style.display = "block";
    ul_2.style.display = "none";
    li_1.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_2.style.cssText = "color:#424242;border-bottom:none;";
}

function other_1_3() {
    var ul_1 = document.getElementById("ul_1_3");
    var ul_2 = document.getElementById("ul_1_4");
    var li_1 = document.getElementById("li_1_3");
    var li_2 = document.getElementById("li_1_4");
    ul_1.style.display = "none";
    ul_2.style.display = "block";
    li_2.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_1.style.cssText = "color:#424242;border-bottom:none;";
}

// 智能
function hot_2() {
    var ul_3 = document.getElementById("ul_3");
    var ul_4 = document.getElementById("ul_4");
    var ul_5 = document.getElementById("ul_5");
    var li_3 = document.getElementById("li_3");
    var li_4 = document.getElementById("li_4");
    var li_5 = document.getElementById("li_5");
    ul_3.style.display = "block";
    ul_4.style.display = "none";
    ul_5.style.display = "none";
    li_3.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_4.style.cssText = "color:#424242;border-bottom:none;";
    li_5.style.cssText = "color:#424242;border-bottom:none;";
}

function other_2() {
    var ul_3 = document.getElementById("ul_3");
    var ul_4 = document.getElementById("ul_4");
    var ul_5 = document.getElementById("ul_5");
    var li_3 = document.getElementById("li_3");
    var li_4 = document.getElementById("li_4");
    var li_5 = document.getElementById("li_5");
    ul_3.style.display = "none";
    ul_4.style.display = "block";
    ul_5.style.display = "none";
    li_4.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_3.style.cssText = "color:#424242;border-bottom:none;";
    li_5.style.cssText = "color:#424242;border-bottom:none;";
}

function other_3() {
    var ul_3 = document.getElementById("ul_3");
    var ul_4 = document.getElementById("ul_4");
    var ul_5 = document.getElementById("ul_5");
    var li_3 = document.getElementById("li_3");
    var li_4 = document.getElementById("li_4");
    var li_5 = document.getElementById("li_5");
    ul_3.style.display = "none";
    ul_4.style.display = "none";
    ul_5.style.display = "block";
    li_5.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_3.style.cssText = "color:#424242;border-bottom:none;";
    li_4.style.cssText = "color:#424242;border-bottom:none;";
}

// 配件
function hot_2_3() {
    var ul_3 = document.getElementById("ul_2_3");
    var ul_4 = document.getElementById("ul_2_4");
    var ul_5 = document.getElementById("ul_2_5");
    var li_3 = document.getElementById("li_2_3");
    var li_4 = document.getElementById("li_2_4");
    var li_5 = document.getElementById("li_2_5");
    ul_3.style.display = "block";
    ul_4.style.display = "none";
    ul_5.style.display = "none";
    li_3.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_4.style.cssText = "color:#424242;border-bottom:none;";
    li_5.style.cssText = "color:#424242;border-bottom:none;";
}

function other_2_4() {
    var ul_3 = document.getElementById("ul_2_3");
    var ul_4 = document.getElementById("ul_2_4");
    var ul_5 = document.getElementById("ul_2_5");
    var li_3 = document.getElementById("li_2_3");
    var li_4 = document.getElementById("li_2_4");
    var li_5 = document.getElementById("li_2_5");
    ul_3.style.display = "none";
    ul_4.style.display = "block";
    ul_5.style.display = "none";
    li_4.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_3.style.cssText = "color:#424242;border-bottom:none;";
    li_5.style.cssText = "color:#424242;border-bottom:none;";
}

function other_3_5() {
    var ul_3 = document.getElementById("ul_2_3");
    var ul_4 = document.getElementById("ul_2_4");
    var ul_5 = document.getElementById("ul_2_5");
    var li_3 = document.getElementById("li_2_3");
    var li_4 = document.getElementById("li_2_4");
    var li_5 = document.getElementById("li_2_5");
    ul_3.style.display = "none";
    ul_4.style.display = "none";
    ul_5.style.display = "block";
    li_5.style.cssText = "color: #ff6700;border-bottom: 2px solid #ff6700;cursor: pointer;";
    li_3.style.cssText = "color:#424242;border-bottom:none;";
    li_4.style.cssText = "color:#424242;border-bottom:none;";
}
