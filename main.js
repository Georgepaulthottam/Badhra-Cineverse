var forEach = function (array, callback, scope) {
    for (var i = 0; i < array.length; i++) {
      callback.call(scope, i, array[i]);
    }
  };
  window.onload = function(){
    var max = -219.99078369140625;
    forEach(document.querySelectorAll('.progress'), function (index, value) {
    percent = value.getAttribute('data-progress');
      value.querySelector('.fill').setAttribute('style', 'stroke-dashoffset: ' + ((100 - percent) / 100) * max);
      value.querySelector('.value').innerHTML = percent + '%';
    });
  }


let  circularProgress=document.querySelector(".circular-progress"),
       progressValue=document.querySelector(".progress-value");

let progressStartValue=0,
      progressEndValue=30,
      speed=100;

let progress=setInterval(()=>{
  progressStartValue++;
  progressValue.textContent =`${progressStartValue}%`
  circularProgress.style.background=`conic-gradient(#7d2ae8 ${3.6}deg,#ededed 0deg)`
  
  if(progressStartValue==progressEndValue){
    clearInterval(progress);
  }
  console.log(progressStartValue);
},speed);