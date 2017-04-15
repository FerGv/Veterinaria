function Mostrar_Pass() {
    let pass = document.getElementById('pass');
    if (pass.type == 'password') {
        pass.type = 'text';
    } else {
        pass.type = 'password';
    }
}

function Mostrar_Slider() {
    let slider = document.getElementById('slider');
    let wrap = document.getElementById('wrap');
    if (slider.style.left == '-300px') {
        slider.style.left = '0';
        wrap.style.opacity = '0.5';
    } else {
        slider.style.left = '-300px';
        wrap.style.opacity = '1';
    }
}

function Mostrar_Clientes() {
    let funciones_clientes = document.getElementById('funciones_clientes'); 
    if (funciones_clientes.style.height == '0px') {
        funciones_clientes.style.height = 'auto';
        funciones_clientes.parentElement.children[0].className = funciones_clientes.parentElement.children[0].className + " active";
    } else {
        funciones_clientes.style.height = '0px';
        funciones_clientes.parentElement.children[0].className = funciones_clientes.parentElement.children[0].className.replace(" active", "");
    }
}

function Mostrar_Mascotas() {
    let funciones_mascotas = document.getElementById('funciones_mascotas'); 
    if (funciones_mascotas.style.height == '0px') {
        funciones_mascotas.style.height = 'auto';
        funciones_mascotas.parentElement.children[0].className = funciones_mascotas.parentElement.children[0].className + " active";
    } else {
        funciones_mascotas.style.height = '0px';
        funciones_mascotas.parentElement.children[0].className = funciones_mascotas.parentElement.children[0].className.replace(" active", "");
    }
}

function Mostrar_Medicos() {
    let funciones_medicos = document.getElementById('funciones_medicos'); 
    if (funciones_medicos.style.height == '0px') {
        funciones_medicos.style.height = 'auto';
        funciones_medicos.parentElement.children[0].className = funciones_medicos.parentElement.children[0].className + " active";
    } else {
        funciones_medicos.style.height = '0px';
        funciones_medicos.parentElement.children[0].className = funciones_medicos.parentElement.children[0].className.replace(" active", "");
    }
}

function Mostrar_Servicios() {
    let funciones_servicios = document.getElementById('funciones_servicios'); 
    if (funciones_servicios.style.height == '0px') {
        funciones_servicios.style.height = 'auto';
        funciones_servicios.parentElement.children[0].className = funciones_servicios.parentElement.children[0].className + " active";
    } else {
        funciones_servicios.style.height = '0px';
        funciones_servicios.parentElement.children[0].className = funciones_servicios.parentElement.children[0].className.replace(" active", "");
    }
}

function Mostrar_Consultas() {
    let funciones_consultas = document.getElementById('funciones_consultas'); 
    if (funciones_consultas.style.height == '0px') {
        funciones_consultas.style.height = 'auto';
        funciones_consultas.parentElement.children[0].className = funciones_consultas.parentElement.children[0].className + " active";
    } else {
        funciones_consultas.style.height = '0px';
        funciones_consultas.parentElement.children[0].className = funciones_consultas.parentElement.children[0].className.replace(" active", "");
    }
}

function Mostrar_Facturas() {
    let funciones_facturas = document.getElementById('funciones_facturas');
    if (funciones_facturas.style.height == '0px') {
        funciones_facturas.style.height = 'auto';
        funciones_facturas.parentElement.children[0].className = funciones_facturas.parentElement.children[0].className + " active";
        this.style.background == '#000';
    } else {
        funciones_facturas.style.height = '0px';
        funciones_facturas.parentElement.children[0].className = funciones_facturas.parentElement.children[0].className.replace(" active", "");
    }
}