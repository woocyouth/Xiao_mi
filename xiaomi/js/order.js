var address_ul = document.querySelectorAll(".address-ul");
var u_modify = document.querySelectorAll(".u-modify");
var user_address = document.querySelectorAll(".user-address");
var u_modify_details = document.querySelector(".u-modify-details");
var u_modify_close = document.querySelector(".u-modify-close");
var d_cancel = document.querySelector(".d-cancel");
var user_name = document.querySelectorAll(".user-name");
var user_phone = document.querySelectorAll(".user-phone");
var user_address_part_1 = document.querySelectorAll(".user-address-part-1");
var user_address_part_2 = document.querySelectorAll(".user-address-part-2");
var dia_input = document.querySelectorAll(".d-in");
var add_address = document.querySelector(".add-address");
var u_add_details = document.querySelector(".u-add-details");
var u_add_close = document.querySelector(".u-add-close");
var d_add_cancel = document.querySelector(".d-add-cancel");
var pay_modify = document.querySelectorAll(".pay-modify");
var u_add_id = document.querySelectorAll(".u_add_id");
var add = document.querySelectorAll(".good-choose>.count");
var count_money = document.querySelectorAll(".add-money");
var s_final_add = document.getElementById("s-add");
var s_count = document.getElementById("s-count");
var sum_add = 0;
var sum_count = 0;
var payed = document.querySelector(".payed");
var back_cart = document.querySelector(".back-cart");


var buy_name = document.querySelectorAll(".user-address>.name");
var buy_phone = document.querySelector(".user-address>.phone");
var buy_address = document.querySelectorAll(".user-address>.u-address");

var good_name = document.querySelectorAll(".good-name");
var service_name = document.querySelectorAll(".service-name");

var good_name_arr = "";
for (var n = 0; n < good_name.length;n++){
    good_name_arr += good_name[n].innerHTML+",";
}

var service_name_arr = "";
for (var s = 0; s < service_name.length;s++){
    service_name_arr += service_name[s].innerHTML+",";
}

//获取下单商品的单价
var good_choose_money = document.querySelectorAll(".good-choose-money");
var good_choose_money_arr = "";
for (var i = 0; i < good_choose_money.length;i++){
    good_choose_money_arr += good_choose_money[i].innerHTML + ",";
}

//获取下单商品的数量
var good_choose_count = document.querySelectorAll(".good-choose-count");
var good_choose_count_arr = "";
for (var i = 0; i < good_choose_count.length;i++){
    good_choose_count_arr += good_choose_count[i].innerHTML + ",";
}

//获取下单的商品图片地址
var good_img = document.querySelectorAll(".good-img>img");
var g_pic = good_img[0].src.indexOf("/image");
var or_pic = "";
for (var p = 0; p < good_img.length;p++){
    or_pic += good_img[p].src.substr(g_pic,good_img[p].src.length) + ",";
}

//下单
var cot = 0;
payed.onclick = function(){
    for (var i = 0; i < user_address.length;i++){
        if (user_address[i].style.display === "none"){
            cot++;
        }
    }
    if (cot === 1){
        cot = 0;
    }
    if (cot > user_address.length-1){
        cot = 0;
        alert("收货地址为空！请选择或添加一个收货地址！");
    } else{
        for (var k = 0; k < user_address.length;k++){
            if (user_address[k].style.display === "block"){
                var b_name = buy_name[k].innerHTML;
                var b_address = buy_address[k].innerHTML;
            }
        }
        window.location.href = "orderAction.php?u_addressee="
                    +b_name+"&u_add_phone="
                    +buy_phone.innerHTML+"&u_add_details="
                    +b_address+"&s_name="+good_name_arr+"&s_service="+service_name_arr
                    + "&count_money="+s_count.innerHTML+"&s_add="+good_choose_count_arr
                    + "&s_single_price="+good_choose_money_arr
                    +"&s_img="+or_pic;
        // console.log(b_address);
    }
};

//返回购物车
back_cart.onclick = function () {
   window.location.href = "shoppingCart.php";
};

//计算下单商品数量
for (var w = 0; w < add.length; w++) {
    sum_add += parseInt(add[w].innerHTML);
}
s_final_add.innerHTML = sum_add;

//计算下单商品总价格
for (var w = 0; w < count_money.length; w++) {
    sum_count += parseInt(count_money[w].innerHTML);
}
s_count.innerHTML = sum_count;

for (var i = 0; i < address_ul.length; i++) {
    address_ul[i].onclick = function () {
        clear_check_address_ul();
        if (this.className === "address-ul") {
            this.className = "address-ul ad-active";
        } else {
            this.className = "address-ul";
        }
        check_u_modify();
        check_user_address();
    }
}

//选择收货地址
function clear_check_address_ul() {
    for (var i = 0; i < address_ul.length; i++) {
        if (address_ul[i].className === "address-ul ad-active") {
            address_ul[i].className = "address-ul";
        }
    }
}

//选择修改地址
function check_u_modify() {
    for (var k = 0; k < u_modify.length; k++) {
        if (address_ul[k].className === "address-ul ad-active") {
            u_modify[k].style.display = "block";
        } else {
            u_modify[k].style.display = "none";
        }

    }
}

//确定的地址
function check_user_address() {
    for (var k = 0; k < user_address.length; k++) {
        if (address_ul[k].className === "address-ul ad-active") {
            user_address[k].style.display = "block";
        } else {
            user_address[k].style.display = "none";
        }

    }
}

//开启修改地址
for (var m = 0; m < u_modify.length; m++) {
    u_modify[m].onclick = function () {
        u_modify_details.show();
        var get_details_arr = get_details();
        for (var i = 0; i < dia_input.length; i++) {
            dia_input[i].value = get_details_arr[i];
        }
    };
}

//最后修改地址
for (var last = 0; last < pay_modify.length; last++) {
    pay_modify[last].onclick = function () {
        u_modify_details.show();
        var get_details_arr = get_details();
        for (var i = 0; i < dia_input.length; i++) {
            dia_input[i].value = get_details_arr[i];
        }
    }
}

//关闭修改地址
u_modify_close.onclick = function () {
    u_modify_details.close();
};

//关闭修改地址--取消按钮
d_cancel.onclick = function () {
    u_modify_details.close();
};

//选择修改哪个地址
function get_details() {
    for (var k = 0; k < address_ul.length; k++) {
        if (address_ul[k].className === "address-ul ad-active") {
            var arr = [user_name[k].innerHTML, user_phone[k].innerHTML, user_address_part_1[k].innerHTML, user_address_part_2[k].innerHTML, u_add_id[k].innerHTML];
        }
    }
    return arr;
}

//添加收货地址
add_address.onclick = function () {
    u_add_details.show();
};

//关闭添加收货地址
u_add_close.onclick = function () {
    u_add_details.close();
};

//关闭添加收货地址--取消按钮
d_add_cancel.onclick = function () {
    u_add_details.close();
};


