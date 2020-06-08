var back_pre = document.getElementById("back-pre");
var go_shoppingCart = document.getElementById("go-shoppingCart");

back_pre.addEventListener('click',function () {
    window.location.href = "./index.php";
});

go_shoppingCart.addEventListener('click',function () {
    window.location.href = "./shoppingCart.php";
});