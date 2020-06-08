window.onload = function () {
    var items = document.getElementsByClassName('item');
    var points = document.getElementsByClassName('point');
    var Pre = document.getElementById('goPre');
    var Next = document.getElementById('goNext');
    var index = 0;  //图片位置下标
    var NextNavTime = 0;
    //清除active
    function clearActive() {
        for (var i = 0; i < items.length; i++){
            items[i].className = 'item';
        }
        for (var k = 0 ;k < points.length; k++){
            points[k].className = 'point';
        }
    }
    function goIndex() {
        clearActive();
        points[index].className = 'point active';
        items[index].className = 'item active';
    }
    function goNext() {
        if (index < 4){
            index++;
        }else{
            index = 0;
        }
        goIndex();
    }

    function goPre() {
       if (index === 0){
           index = 4
       }else{
           index--;
       }
       goIndex();
    }



    Next.addEventListener('click',function () {
         goNext();
    })

    Pre.addEventListener('click',function () {
        goPre();
    })

    for (var i = 0; i < points.length; i++){
        points[i].addEventListener('click',function () {
             var pointIndex = this.getAttribute('date-index');
             index = pointIndex;
             goIndex();
            NextNavTime = 0;
        })
    }

    setInterval(function () {
        NextNavTime++;
        if (NextNavTime == 30){
            goNext();
            NextNavTime = 0;
        }
    },100);
};