
function lines(){
    let ancho = Math.random() * 12;
    let e = document.createElement('div');
    e.setAttribute('class','circulo');
    document.body.appendChild(e);
    e.style.width = 2+ancho+'px';
    e.style.left = Math.random() * + innerWidth + 'px';


    setTimeout(function(){
        document.body.removeChild(e);
    },5000);
}

setInterval(function(){
    lines();
},200);
