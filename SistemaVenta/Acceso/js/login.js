function frmLogin(e) {
    e.preventDefault();
    const Did = selector => document.getElementById(selector);
    const usuario = Did("usuario");
    const clave = Did("clave");
var l;

 
    if (usuario.value == "") {
        usuario.classList.add("is-invalid");
        clave.classList.remove("is-invalid");
        usuario.focus();

    } else if (clave.value == "") {
        clave.classList.add("is-invalid");
        usuario.classList.remove("is-invalid");
        clave.focus();
    } else {
        const url = base_url + "Users/validar";
        const frm = Did("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                console.log(this.responseText);
                const res = JSON.parse(this.responseText);

                if (res == "ok") {
                    window.location = base_url + "Users"
                } else {
                    Did("alerta").classList.remove("d-none");
                    Did("alerta").innerHTML = res;
                }
            }
        }

    }
}