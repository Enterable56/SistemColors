function frmLogin(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    if(usuario.value == "" || clave.value == ""){
        Swal.fire({
            title: "Todos los campos son obligatorios!",
            text: 'Rellene los campos de forma correcta',
            icon: "warning"
          });
    }else{
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "ok"){
                    window.location = base_url + "Administracion/home";
                }else if(res == "no"){
                    Swal.fire({
                        title: "Error!",
                        text: 'Datos incorrectos',
                        icon: "error"
                      });
                }
            }
        }
    }
}