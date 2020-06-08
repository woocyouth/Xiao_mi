var items = document.getElementsByClassName('item');
var points = document.getElementsByClassName('point');
// var goPreBtn = document.getElementById('goPre');
// var goNextBtn = document.getElementById('goNext');
var time = 0;
var index = 0;
var clearActive = function () {
    for (var i = 0; i < items.length; i++) {
        items[i].className = 'item';
    }
    for (var i = 0; i < points.length; i++) {
        points[i].className = 'point';
    }
}
var goIndex = function () {
    clearActive();
    points[index].className = 'point active';
    items[index].className = 'item active';
}
var goNext = function () {
    if (index < 4) {
        index++;
    } else {
        index = 0;
    }
    goIndex();
}
var goPre = function () {
    if (index == 0) {
        index = 4;
    } else {
        index--;
    }
    goIndex();
}


window.onload = function () {
    document.getElementById("goNext").addEventListener('click', function () {
        goNext();
    })
    document.getElementById("goPre").addEventListener('click', function () {
        goPre();
    })
    for (var i = 0; i < points.length; i++) {
        points[i].addEventListener('click', function () {
            var pointIndex = this.getAttribute('date-index');
            index = pointIndex;
            time = 0;
            goIndex();
        })
    }

    setInterval(function () {
        time++;
        if(time === 50){
            goNext();
            time = 0;
        }
    },100)
}































