window.onload = function () {
    var items = document.getElementsByClassName('item');
    var points = document.getElementsByClassName('point');
    var Pre = document.getElementById('goPre');
    var Next = document.getElementById('goNext');
    var index = 0;  //图片位置下标
    var NextNavTime = 0;

    //清除active
    function clearActive() {
        for (var i = 0; i < items.length; i++) {
            items[i].className = 'item';
        }
        for (var k = 0; k < points.length; k++) {
            points[k].className = 'point';
        }
    }

    function goIndex() {
        clearActive();
        points[index].className = 'point active';
        items[index].className = 'item active';
    }

    function goNext() {
        if (index < 4) {
            index++;
        } else {
            index = 0;
        }
        goIndex();
    }

    function goPre() {
        if (index === 0) {
            index = 4
        } else {
            index--;
        }
        goIndex();
    }


    Next.addEventListener('click', function () {
        goNext();
    })

    Pre.addEventListener('click', function () {
        goPre();
    })

    for (var i = 0; i < points.length; i++) {
        points[i].addEventListener('click', function () {
            var pointIndex = this.getAttribute('date-index');
            index = pointIndex;
            goIndex();
            NextNavTime = 0;
        })
    }

    setInterval(function () {
        NextNavTime++;
        if (NextNavTime === 30) {
            goNext();
            NextNavTime = 0;
        }
    }, 100);

    //choose goods
    var v_li = document.querySelectorAll(".choose-ver-ul>li");
    var c_li = document.querySelectorAll(".choose-col-ul>li");

    //加入购物车的手机版本，颜色，服务，价格
    var choose_name = document.getElementsByClassName("choose-name");
    var choose_price = document.getElementsByClassName("choose-price");
    var col_name = document.getElementsByClassName("col-name");
    var version = document.getElementsByClassName("version")[0];
    var color = document.getElementsByClassName("color")[0];
    var money = document.getElementsByClassName("money")[0];
    var totalPrice = document.getElementsByClassName("totalPrice")[0];

    var check_price = document.getElementsByClassName("check-price");
    var insurance_ul_li = document.querySelectorAll(".insurance-ul>li");
    var s_1 = document.getElementById("service");
    var a_1 = document.querySelector("#agree");

    var pro_list_ul = document.querySelector(".pro-list-ul");
    var pro_list_ul_li = document.querySelectorAll(".pro-list-ul>li");
    var insurance_text = document.querySelectorAll(".insurance-text");
    var s_img;//缩略图路径
    var good_name = document.getElementById("good-name");
    var ser = document.querySelectorAll(".ser");

    var go_buy_cart = document.getElementById("go-buy-cart");
    var s_service = "";
    var s_service_spent = 0;
    var insurance_money = document.querySelectorAll(".pro-list-ul>li>.money");//服务费用
    var s_service_spent_last = "";
    var s_service_spent_add = ""; //服务费用总计

    function v_clearList() {
        for (var i = 0; i < v_li.length; i++) {
            v_li[i].classList = null;
        }
    }

    function c_clearList() {
        for (var i = 0; i < c_li.length; i++) {
            c_li[i].classList = null;
        }
    }

    //选择小米提供的意外保护
    insurance_ul_li[0].addEventListener('click', function () {
        var clearBefore;
        if (s_2.checked === true) {
            clearBefore = parseInt(totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1)) - parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1));
        } else {
            clearBefore = parseInt(totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1));
        }
        if (s_1.checked === false) {
            s_2.checked = 0;
            a_2.checked = 0;
        }
        if (s_1.checked === false) {
            s_1.checked = 1;
        } else {
            s_1.checked = 0;
        }
        if (s_1.checked === true) {
            a_1.checked = 1;
            var total = clearBefore + parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1));
            totalPrice.innerHTML = "总计 ：" + total + " 元";
            pro_list_ul_li[1].style.display = "block";
            pro_list_ul_li[2].style.display = "none";
        } else {
            a_1.checked = 0;
            var total = clearBefore - parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1));
            totalPrice.innerHTML = "总计 ：" + total + " 元";
            pro_list_ul_li[1].style.display = "none";
        }
    });
    a_1.addEventListener('click', function () {
        if (a_1.checked === true) {
            s_1.checked = 1;
        } else {
            s_1.checked = 0;
        }
    });

    var s_2 = document.getElementById("service-2");
    var a_2 = document.getElementById("agree-2");

    insurance_ul_li[1].addEventListener('click', function () {
        var clearBefore;
        if (s_1.checked === true) {
            clearBefore = parseInt(totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1)) - parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1));
        } else {
            clearBefore = parseInt(totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1));
        }
        if (s_2.checked === false) {
            s_1.checked = 0;
            a_1.checked = 0;
        }
        if (s_2.checked === false) {
            s_2.checked = 1;
        } else {
            s_2.checked = 0;
        }
        if (s_2.checked === true) {
            a_2.checked = 1;
            var total = clearBefore + parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1));
            totalPrice.innerHTML = "总计 ：" + total + " 元";
            pro_list_ul_li[2].style.display = "block";
            pro_list_ul_li[1].style.display = "none";
        } else {
            a_2.checked = 0;
            var total = clearBefore - parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1));
            totalPrice.innerHTML = "总计 ：" + total + " 元";
            pro_list_ul_li[2].style.display = "none";
        }
    });
    a_2.addEventListener('click', function () {
        if (a_2.checked === true) {
            s_2.checked = 1;
        } else {
            s_2.checked = 0;
        }
    });

    var s_3 = document.getElementById("service-3");
    var a_3 = document.getElementById("agree-3");

    insurance_ul_li[2].addEventListener('click', function () {
        if (s_3.checked === false) {
            s_3.checked = 1;
        } else {
            s_3.checked = 0;
        }
        if (s_3.checked === true) {
            a_3.checked = 1;
            var total = parseInt(totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1)) + parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1));
            totalPrice.innerHTML = "总计 ：" + total + " 元";
            pro_list_ul_li[3].style.display = "block";
        } else {
            a_3.checked = 0;
            var total = parseInt(totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1)) - parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1));
            totalPrice.innerHTML = "总计 ：" + total + " 元";
            pro_list_ul_li[3].style.display = "none";
        }
    });
    a_3.addEventListener('click', function () {
        if (a_3.checked === true) {
            s_3.checked = 1;
        } else {
            s_3.checked = 0;
        }
    });

    //选择版本
    v_li[0].addEventListener('click', function () {
        v_clearList();
        this.classList = "n-active";
        version.innerHTML = choose_name[0].innerHTML;
        money.innerHTML = choose_price[0].innerHTML;
        if (s_1.checked === false && s_2.checked === false && s_3.checked === false) {
            totalPrice.innerHTML = "总计 ：" + choose_price[0].innerHTML;
        } else {
            if (s_1.checked === true) {
                var total = parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1)) + parseInt(choose_price[0].innerHTML.substring(0, choose_price[0].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_2.checked === true) {
                var total = parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1)) + parseInt(choose_price[0].innerHTML.substring(0, choose_price[0].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_1.checked === true && s_3.checked === true) {
                var total = parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1)) + parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1)) + parseInt(choose_price[0].innerHTML.substring(0, choose_price[0].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_2.checked === true && s_3.checked === true) {
                var total = parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1)) + parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1)) + parseInt(choose_price[0].innerHTML.substring(0, choose_price[0].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
        }

    });

    v_li[1].addEventListener('click', function () {
        v_clearList();
        this.classList = "n-active";
        version.innerHTML = choose_name[1].innerHTML;
        money.innerHTML = choose_price[1].innerHTML;
        if (s_1.checked === false && s_2.checked === false && s_3.checked === false) {
            totalPrice.innerHTML = "总计 ：" + choose_price[1].innerHTML;
        } else {
            if (s_1.checked === true) {
                var total = parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1)) + parseInt(choose_price[1].innerHTML.substring(0, choose_price[1].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_2.checked === true) {
                var total = parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1)) + parseInt(choose_price[1].innerHTML.substring(0, choose_price[1].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_1.checked === true && s_3.checked === true) {
                var total = parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1)) + parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1)) + parseInt(choose_price[1].innerHTML.substring(0, choose_price[1].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_2.checked === true && s_3.checked === true) {
                var total = parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1)) + parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1)) + parseInt(choose_price[1].innerHTML.substring(0, choose_price[1].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
        }
    });

    v_li[2].addEventListener('click', function () {
        v_clearList();
        this.classList = "n-active";
        version.innerHTML = choose_name[2].innerHTML;
        money.innerHTML = choose_price[2].innerHTML;
        if (s_1.checked === false && s_2.checked === false && s_3.checked === false) {
            totalPrice.innerHTML = "总计 ：" + choose_price[2].innerHTML;
        } else {
            if (s_1.checked === true) {
                var total = parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1)) + parseInt(choose_price[2].innerHTML.substring(0, choose_price[2].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_2.checked === true) {
                var total = parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1)) + parseInt(choose_price[2].innerHTML.substring(0, choose_price[2].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_1.checked === true && s_3.checked === true) {
                var total = parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1)) + parseInt(check_price[0].innerHTML.substring(0, check_price[0].innerHTML.length - 1)) + parseInt(choose_price[2].innerHTML.substring(0, choose_price[2].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
            if (s_2.checked === true && s_3.checked === true) {
                var total = parseInt(check_price[2].innerHTML.substring(0, check_price[2].innerHTML.length - 1)) + parseInt(check_price[1].innerHTML.substring(0, check_price[1].innerHTML.length - 1)) + parseInt(choose_price[2].innerHTML.substring(0, choose_price[2].innerHTML.length - 1));
                totalPrice.innerHTML = "总计 ：" + total + " 元";
            }
        }
    });

    //选择颜色
    c_li[0].addEventListener('click', function () {
        c_clearList();
        this.classList = "c-active";
        color.innerHTML = col_name[0].innerHTML;

    });

    c_li[1].addEventListener('click', function () {
        c_clearList();
        this.classList = "c-active";
        color.innerHTML = col_name[1].innerHTML;
    });

    go_buy_cart.addEventListener("click", function () {

        for (var i = 0; i < c_li.length; i++) {
            if (c_li[i].className === "c-active") {
                var src = document.getElementsByClassName("c-img")[i].src;
                var begin = src.indexOf("/image");
                var last = src.length;
                s_img = src.substring(begin, last);
            }
        }

        for (var k = 1; k < pro_list_ul_li.length - 2; k++) {
            if (pro_list_ul_li[k].style.display === "block") {
                if (s_service.indexOf(s_service) !== -1) {
                    s_service = "";
                    s_service += ser[k - 1].innerHTML.substring(0,ser[k - 1].innerHTML.indexOf(" ")) + ",";
                    s_service_spent = parseInt(insurance_money[k].innerHTML.substring(0, insurance_money[k].innerHTML.length - 1));
                } else {
                    s_service += ser[k - 1].innerHTML + ",";
                    s_service_spent = parseInt(insurance_money[k].innerHTML.substring(0, insurance_money[k].innerHTML.length - 1));
                }
            }
        }

        for (var d = 1; d < pro_list_ul_li.length - 2; d++) {
            if (pro_list_ul_li[d].style.display === "none") {
                s_service = s_service.replace(ser[d - 1].innerHTML, "");
            }
        }
        // console.log(s_service_spent);
        if (pro_list_ul_li[3].style.display === "block") {
            s_service += ser[2].innerHTML.substring(0,ser[k - 1].innerHTML.indexOf(" "));
            s_service_spent_last = parseInt(insurance_money[3].innerHTML.substring(0, insurance_money[3].innerHTML.length - 1));
            // console.log(s_service_spent_last);
        }

        if (pro_list_ul_li[3].style.display === "none") {
            s_service += "";
            s_service_spent_last = "";
        }

        if (s_service === undefined && s_service === "" && s_service === null || s_service === ",") {
            s_service = "";
        }
        // console.log('no = ' + s_service);
        s_service_spent_add = s_service_spent + s_service_spent_last;

        // window.open("../../user/add_cart_action.php?s_name=" + good_name.innerHTML
        //     + "&s_version=" + version.innerHTML + " "+ color.innerHTML + "&s_price=" + money.innerHTML.substring(0, money.innerHTML.length - 1)
        //     + "&s_count=" + totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1)
        //     + "&s_service=" + s_service + "&s_service_spent=" + s_service_spent_add + "&s_img=" + s_img);

        var URL = "../../user/add_cart_action.php?s_name=" + good_name.innerHTML
            + "&s_version=" + version.innerHTML + " "+ color.innerHTML + "&s_price=" + money.innerHTML.substring(0, money.innerHTML.length - 1)
            + "&s_count=" + totalPrice.innerHTML.substring(4, totalPrice.innerHTML.length - 1)
            + "&s_service=" + s_service + "&s_service_spent=" + s_service_spent_add + "&s_img=" + s_img;

       window.open(URL);
    });

};