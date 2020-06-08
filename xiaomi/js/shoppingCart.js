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

window.onload = function () {
    // ie兼容
    if (!document.getElementsByTagName) {
        document.getElementsByTagName = function (cls) {
            var ret = [];
            var els = document.getElementsByTagName('*');
            for (var i = 0, len = els.length; i < len; i++) {
                if (els[i].className === cls
                    || els[i].className.indexOf(" " + cls) >= 0
                    || els[i].className.indexOf(" " + cls + "") >= 0
                    || els[i].className.indexOf(cls + " ") >= 0
                ) {
                    ret.push(els[i]);
                }
            }
            return ret;
        }
    }
    var checkAll = document.getElementsByClassName('checkAll')[0];
    var checkAll_span = document.getElementsByClassName("check-span")[0];
    var check_one = document.getElementsByClassName("check-one");
    var check_one_span = document.getElementsByClassName('check-one-span');
    var count = 0;
    var cartTable = document.getElementById("cartTable");
    var tr = cartTable.children[1].rows;
    var t_price = document.getElementsByClassName("t-price")[0];
    var shop_total = document.getElementById("shop-total");
    var selected = document.getElementById('selected');
    var delete_tr = document.getElementsByClassName('delete');
    var bar_right = document.getElementsByClassName("bar-right")[0];
    var choose_g_name = document.querySelectorAll(".g-name");
    var choose_g_version = document.querySelectorAll(".g-version");
    var bill_goods;

    var checked = document.querySelectorAll(".check-one-span");
    // console.log(checked.length);

    // 小计
    function getSubTotal(tr) {
        var tds = tr.cells;
        // console.log('SUB tr :' + tr.cells);
        var s_price = tds[2].getElementsByClassName('price')[0].innerHTML;
        var sp = s_price.substring(0, s_price.length - 1);
        var price = parseFloat(sp);
        var count = tr.getElementsByTagName('input')[0].value;
        var subTotal = parseFloat(count * price);
        var subTotalHtml = "<span class='Small-count' style='color: #ff6700;'>" + subTotal.toFixed(2) + "元</span>";
        tds[4].innerHTML = subTotalHtml;
    }

    // 购物车内商品总数量
    shop_total.innerHTML = tr.length;
    // console.log(t_price.innerHTML);

    // 增减商品数量
    for (var i = 0; i < tr.length; i++) {
        tr[i].onclick = function (e) {
            e = e || window.event;
            var el = e.srcElement;
            var cls = el.className;
            // console.log(cls);
            var input = this.getElementsByClassName('text-input')[0];
            var val = parseInt(input.value);
            switch (cls) {
                case 'add':
                    input.value = val + 1;
                    // console.log('this  ' + this);
                    getSubTotal(this);
                    break;
                case 'reduce':
                    input.value = val - 1;
                    if (val <= 1) {
                        input.value = 1;
                    }
                    getSubTotal(this);
                    break;
                case 'delete-x':
                    var conf = confirm('确认删除吗？');
                    if (conf) {
                        this.parentNode.removeChild(this);
                    }
                    break;
                default:
                    break;
            }
            getTotal();
        };

        // 手动输入选购商品数量
        tr[i].getElementsByTagName('input')[0].onkeyup = function () {
            var val = parseInt(this.value);
            if (isNaN(val) || val <= 1) {
                val = 1;
            }
            this.value = val;
            getSubTotal(this.parentNode.parentNode.parentNode);
        }
    }

    function add_ser(){
        var sum = 0;//计算服务费总和
        var choose_ser = document.querySelectorAll(".choose-ser-money");
        for (var k = 0; k < choose_ser.length;k++){
            var sum_ser;
            sum_ser = parseInt(choose_ser[k].innerHTML);
            sum += sum_ser;
        }
        return sum;
    }

    function check_ser(str){
        var spent;
        var choose_ser = document.querySelectorAll(".choose-ser-money");
        var s_name_ser = document.querySelectorAll(".s-name-ser");
        for (var k = 0; k < choose_ser.length;k++){
            if (str === s_name_ser[k].innerHTML){
                spent = parseInt(choose_ser[k].innerHTML);
            }
        }
        return spent;
    }

    // 所有商品价格总和
    function getTotal() {
        var select = 0;
        var price = 0;
        var sum = 0;
        var add = 0;
        var s_name = document.querySelectorAll(".name>.g-name");
        var s_version = document.querySelectorAll(".name>.g-version");
        var s_name_ser = document.querySelectorAll(".s-name-ser");
        var ser_price;
        for (var i = 0; i < tr.length; i++) {
            if (check_one[i].className === "check-one checked_add") {
                select += parseInt(tr[i].getElementsByTagName("input")[0].value);
                price = tr[i].cells[4].innerText;
                var tp = price.substring(0, price.length - 1);
                price = parseFloat(tp);
                for (var k = 0; k < s_name_ser.length; k++){
                    if ((s_name[i].innerHTML+" "+s_version[i].innerHTML) === s_name_ser[k].innerHTML) {
                        ser_price = check_ser((s_name[i].innerHTML+" "+s_version[i].innerHTML));
                        add = add + ser_price;
                    }
                }
                sum += price;
            }
        }
        sum += add;
        t_price.innerText = sum.toFixed(2);
        selected.innerHTML = select;
    }

    // 取消全选，价格归零
    function clear() {
        t_price.innerText = "0.00";
        selected.innerHTML = "0";
    }

    // 全选
    checkAll.onclick = function () {
        if (checkAll.className === "checkAll") {
            checkAll.className = "checkAll checked_add";
            checkAll_span.style.display = "none";
            // 判断check-one是否选中
            count = check_one.length;
            // console.log(count);
            for (var i = 0; i < check_one.length; i++) {
                if (check_one[i].className === "check-one") {
                    check_one[i].className = "check-one checked_add";
                    for (var k = 0; k < check_one_span.length; k++) {
                        check_one_span[k].style.display = "none";
                    }
                }
            }
          getTotal();
        } else {
            checkAll.className = "checkAll";
            checkAll_span.style.display = "block";
            count = 0;
            // 判断check-one是否选中
            for (var i = 0; i < check_one.length; i++) {
                check_one[i].className = "check-one";
                for (var s = 0; s < check_one_span.length; s++) {
                    check_one_span[s].style.display = "block";
                }
            }
            clear();
        }

    };

    // 单选
    for (var i = 0; i < check_one.length; i++) {
        check_one[i].onclick = function () {
            if (this.className === "check-one") {
                this.className = "check-one checked_add";
                count += 1;
                for (var k = 0; k < check_one_span.length; k++) {
                    check_one_span[k].style.display = "none";
                    for (var w = 0; w < check_one.length; w++) {
                        if (check_one[w].className === "check-one") {
                            check_one_span[w].style.display = "block";
                        }
                    }
                }
                getTotal();
            } else {
                this.className = "check-one";
                count -= 1;
                for (var s = 0; s < check_one_span.length; s++) {
                    check_one_span[s].style.display = "none";
                    for (var j = 0; j < check_one.length; j++) {
                        if (check_one[j].className === "check-one") {
                            check_one_span[j].style.display = "block";
                        }
                    }
                }
                getTotal();
            }

            if (this.className === "check-one") {
                checkAll.className = "checkAll";
            }
            // console.log(count);
            // 单选框全部被点击后，全选框自动点击
            if (count === check_one.length) {
                checkAll.className = "checkAll checked_add";
            }
        };
    }

    //下单
    bar_right.onclick = function () {
       bill_goods = checked_bill();
       var b = new Array(bill_goods.split("|"));//存放商品名与商品版本
       window.location.href = "order.php?s_name="+b[0][0]+"&s_version="+b[0][1];
    };

    //最终选择的商品下单
    function checked_bill() {
        var c_g_name = "";
        var c_g_version = "";
        for (var x = 0; x < checked.length;x++){
            if (check_one[x].className === "check-one checked_add"){
                c_g_name += choose_g_name[x].innerHTML + ",";
                c_g_version += choose_g_version[x].innerHTML + ",";
            }
        }
        return c_g_name+"|"+c_g_version;
    }

};