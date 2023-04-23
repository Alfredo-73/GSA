function mostrar() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("contenido").style.marginLeft = "0px";
    document.getElementById("abrir").style.display = "none";
    document.getElementById("cerrar").style.display = "inline";
}

function ocultar() {
    document.getElementById("sidebar").style.width = "0px";
    document.getElementById("contenido").style.marginLeft = "150px";
    document.getElementById("abrir").style.display = "inline";
    document.getElementById("cerrar").style.display = "none";
    document.getElementById("customSwitch1").style.display = "checked";
}

document.cookie = 'same-site-cookie=foo; SameSite=Lax';
document.cookie = 'cross-site-cookie=bar; SameSite=None; Secure';