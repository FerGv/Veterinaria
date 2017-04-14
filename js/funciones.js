function Mostrar_Pass() {
    let pass = document.getElementById('pass');
    if (pass.type == 'password') {
        pass.type = 'text';
    }
    else {
        pass.type = 'password';
    }
}


function Mostrar_Slider() {
    let slider = document.getElementById('slider');
    let wrap = document.getElementById('wrap');
    if (slider.style.left == '-300px') {
        slider.style.left = '0';
        wrap.style.opacity = '0.5';
    }
    else {
        slider.style.left = '-300px';
        wrap.style.opacity = '1';
    }
    wrap.on('click', function(){
    alert('click en wrap');
    });
}

