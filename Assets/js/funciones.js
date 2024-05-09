let tblUsuarios, tblClientes, tblCategorias, tblMedidas, tblProductos;
document.addEventListener("DOMContentLoaded", function(){
    $('#cliente').select2();
   tblUsuarios = $('#tblUsuarios').DataTable( {
        lengthMenu: [5,10,15,20],
        columnDefs: [
            {className: 'text-center', target:[0,1,2,3,4]}
            
        ],
        
        "responsive": true, "lengthChange": true, "autoWidth": false,
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        
        columns: [ {
            'data' : 'id'
        },
        {
            'data' : 'nombre'
        },
        {   
            'data' : 'apellido'
        },
        {
            'data' : 'cedula'
        },
        {
            'data' : 'acciones'
        }
    
    ],
    
    language: {
        "url": base_url+"Assets/js/Spanish.json"
    },
    
    /*dom: "<'div'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",*/
                    buttons: [{
                        //Botón para Excel
                        extend: 'excelHtml5',
                        footer: true,
                        title: 'Archivo',
                        filename: 'Export_File',
         
                        //Aquí es donde generas el botón personalizado
                        text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                    },
                    //Botón para PDF
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        footer: true,
                        title: 'Reporte de usuarios',
                        filename: 'Reporte de usuarios',
                        text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para copiar
                    {
                        extend: 'copyHtml5',
                        footer: true,
                        title: 'Reporte de usuarios',
                        filename: 'Reporte de usuarios',
                        text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para print
                    {
                        extend: 'print',
                        footer: true,
                        filename: 'Export_File_print',
                        text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                    },
                    //Botón para cvs
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        filename: 'Export_File_csv',
                        text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                    },
                    {
                        extend: 'colvis',
                        text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                        postfixButtons: ['colvisRestore']
                    }
                ]
    });
    //Fin de la tabla usuarios
    tblClientes = $('#tblClientes').DataTable( {
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc: ''
        },
        lengthMenu: [5,10,15,20],
        columnDefs: [
            {className: 'text-center', target:[0,1,2,3]}
        ],
        columns: [ {
            'data' : 'id'
        },
        {   
            'data' : 'nombre'
        },
        {
            'data' : 'apellido'
        },
        {
            'data' : 'acciones'
        }
        
        

    ],
    language: {
        "url": base_url+"Assets/js/Spanish.json"
    },
    /*dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",*/
                    buttons: [{
                        //Botón para Excel
                        extend: 'excelHtml5',
                        footer: true,
                        title: 'Archivo',
                        filename: 'Export_File',
         
                        //Aquí es donde generas el botón personalizado
                        text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                    },
                    //Botón para PDF
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        footer: true,
                        title: 'Reporte de usuarios',
                        filename: 'Reporte de usuarios',
                        text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para copiar
                    {
                        extend: 'copyHtml5',
                        footer: true,
                        title: 'Reporte de usuarios',
                        filename: 'Reporte de usuarios',
                        text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para print
                    {
                        extend: 'print',
                        footer: true,
                        filename: 'Export_File_print',
                        text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                    },
                    //Botón para cvs
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        filename: 'Export_File_csv',
                        text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                    },
                    {
                        extend: 'colvis',
                        text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                        postfixButtons: ['colvisRestore']
                    }
                ]
    });
    //Fin de la tabla Clientes
    tblCategorias = $('#tblCategorias').DataTable( {
        ajax: {
            url: base_url + "Categorias/listar",
            dataSrc: ''
        },
        columns: [ {
            'data' : 'id_categoria'
        },
        {
            'data' : 'nombre'
        },
        {
            'data' : 'acciones'
        }

    
    ],
    language: {
        "url": base_url+"Assets/js/Spanish.json"
    },
    /*dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",*/
                    buttons: [{
                        //Botón para Excel
                        extend: 'excelHtml5',
                        footer: true,
                        title: 'Archivo',
                        filename: 'Export_File',
         
                        //Aquí es donde generas el botón personalizado
                        text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                    },
                    //Botón para PDF
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        footer: true,
                        title: 'Reporte de usuarios',
                        filename: 'Reporte de usuarios',
                        text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para copiar
                    {
                        extend: 'copyHtml5',
                        footer: true,
                        title: 'Reporte de usuarios',
                        filename: 'Reporte de usuarios',
                        text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    //Botón para print
                    {
                        extend: 'print',
                        footer: true,
                        filename: 'Export_File_print',
                        text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                    },
                    //Botón para cvs
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        filename: 'Export_File_csv',
                        text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                    },
                    {
                        extend: 'colvis',
                        text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                        postfixButtons: ['colvisRestore']
                    }
                ]
    });
//Fin de la tabla categorias

tblMedidas = $('#tblMedidas').DataTable( {
    ajax: {
        url: base_url + "Medidas/listar",
        dataSrc: ''
    },
    columns: [ {
        'data' : 'id_medidas'
    },
    {
        'data' : 'nombre'
    },
    {
        'data' : 'nombre_corto'
    },
    {
        'data' : 'acciones'
    }


],
language: {
    "url": base_url+"Assets/js/Spanish.json"
},
/*dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",*/
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
});
//Fin de la tabla Medidas

tblProductos = $('#tblProductos').DataTable( {
    ajax: {
        url: base_url + "Productos/listar",
        dataSrc: ''
    },
    columns: [ {
        'data' : 'id'
    },
    {
        'data' : 'imagen'
    },
    {
        'data' : 'codigo'
    },
    {
        'data' : 'descripcion'
    },
    {
        'data' : 'precio_venta'
    },
    {
        'data' : 'estado'
    },
    {
        'data' : 'acciones'
    }

],
language: {
    "url": base_url+"Assets/js/Spanish.json"
},
/*dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-'p>>",*/
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
});
//Fin de la tabla productos
$('#t_historial_compra').DataTable( {
    ajax: {
        url: base_url + "Compras/listar_historial",
        dataSrc: ''
    },
    columns: [ {
        'data' : 'id'
    },
    {
        'data' : 'total'
    },
    {
        'data' : 'fecha'
    },
    {
        'data' : 'acciones'
    }


]
});
$('#t_historial_v').DataTable( {
    ajax: {
        url: base_url + "Compras/listar_historial_venta",
        dataSrc: ''
    },
    columns: [ {
        'data' : 'id'
    },
    {
        'data' : 'nombre'
    },
    {
        'data' : 'total'
    },
    {
        'data' : 'fecha'
    },
    {
        'data' : 'acciones'
    }


]
});

})

function frmCambiarPass(e){
    e.preventDefault();
    const cedula = document.getElementById('cedula').value;
    if (cedula == '' ) {
        alertas('todos los campos son obligatorios', 'warning');
    }else{
        const url = base_url + "Usuarios/cambiarPass";
        const frm = document.getElementById("frmCambiarPass");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "ok") {
                    Swal.fire({
                        title: "Mensaje!",
                        text: 'El usuario existe. Vas por buen camino Raul',
                        icon: "success"
                      });
                    
                    
                   
                
                }else{
                    Swal.fire({
                        title: "Mensaje!",
                        text: res,
                        icon: "error"
                      });
                }
            }
        }
        
    }
}
 

function frmUsuario(){
    document.getElementById("title").innerHTML = "Nuevo Empleado";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}
function registrarUser(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const cedula = document.getElementById("cedula");
    if(nombre.value == "" || apellido.value == "" || cedula.value == ""){
        alertas('Todos los campos son obligatorios', 'warning');
    }else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                    frm.reset();
                    alertas(res.msg, res.icono);
                    tblUsuarios.ajax.reload();
                    $("#nuevo_usuario").modal("hide");
            }
        }
    }
}
function btnEditarUser(id_nombre){
    document.getElementById("title").innerHTML = "Actualizar Datos";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Usuarios/editar/"+id_nombre;
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText);
           document.getElementById("id").value = res.id_nombre;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("apellido").value = res.apellido;
           document.getElementById("cedula").value = res.cedula;
           document.getElementById("claves").classList.add("d-none");
           $("#nuevo_usuario").modal("show");
        }
    }
    
}
function btnEliminarUser(id_nombre){
    Swal.fire({
        title: "Estas seguro de eliminar?",
        text: "El Usuario se eliminara de forma permanente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+id_nombre;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res = JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblUsuarios.ajax.reload();
                    
                }
            }

        }
      });
}
function btnReingresarUser(id_nombre){
    Swal.fire({
        title: "Estas seguro de Reingresar?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/"+id_nombre;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje!",
                            text: "Usuario reingresado con exito.",
                            icon: "success"
                          });
                          tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                          });
                    }
                }
            }

        }
      });
}

// Fin de Usuarios

function frmCliente(){
    document.getElementById("title").innerHTML = "Nuevo Cliente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmCliente").reset();
    $("#nuevo_cliente").modal("show");
    document.getElementById("bgmodal").classList.remove("bg-success");
    document.getElementById("bgmodal").classList.add("bg-primary");
    document.getElementById("id").value = "";
    document.getElementById("lapellido").hidden=false;
    document.getElementById("apellido").hidden=false;
    document.getElementById("btnAccion").hidden = false;
    document.getElementById("lnombre").hidden=false;
    document.getElementById("nombre").hidden=false;
    document.getElementById("dni").disabled = false;
    document.getElementById("telefono").disabled=false;
    document.getElementById("direccion").disabled = false;
}
function registrarCli(e){
    e.preventDefault();
    const dni = document.getElementById("dni");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");
    if(dni.value == "" || nombre.value == "" || apellido.value == "" || telefono.value == "" || direccion.value == ""){
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 3000
          });
    }else{
        const url = base_url + "Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText)
                
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: res,
                    showConfirmButton: false,
                    timer: 3000
                  })
                  
                if (res == "si") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Cliente registrado con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();
                      $("#nuevo_cliente").modal("hide");
                      tblClientes.ajax.reload();
                }else if (res == "modificado") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Cliente modificado con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_cliente").modal("hide");
                      tblClientes.ajax.reload();
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "warning",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                      });
                }
            }
        }
    }
}
function btnEditarCli(id_cliente){
    document.getElementById("title").innerHTML = "Actualizar Datos";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    document.getElementById("bgmodal").classList.remove("bg-success");
    document.getElementById("bgmodal").classList.add("bg-primary");
    document.getElementById("btnAccion").hidden = false;
    const url = base_url + "Clientes/editar/"+ id_cliente;
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText);
           document.getElementById("id").value = res.id_cliente;
           document.getElementById("dni").value = res.cedula;
           document.getElementById("dni").disabled = false;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("lnombre").hidden=false;
           document.getElementById("nombre").hidden=false;
           document.getElementById("apellido").value = res.apellido;
           document.getElementById("lapellido").hidden=false;
           document.getElementById("apellido").hidden=false;
           document.getElementById("telefono").value = res.telefono;
           document.getElementById("telefono").disabled=false;
           document.getElementById("direccion").value = res.direccion;
           document.getElementById("direccion").disabled = false;
           $("#nuevo_cliente").modal("show");
        }
    }
    
}
function btnObservar(id_cliente){
    document.getElementById("title").innerHTML = "Datos del Cliente";
    document.getElementById("bgmodal").classList.remove("bg-primary");
    document.getElementById("bgmodal").classList.add("bg-success");
    document.getElementById("btnAccion").hidden = true;
    const url = base_url + "Clientes/editar/"+ id_cliente;
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText);
           document.getElementById("id").value = res.id_cliente;
           document.getElementById("dni").value = res.cedula;
           document.getElementById("dni").disabled = true;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("lnombre").hidden=true;
           document.getElementById("nombre").hidden=true;
           document.getElementById("apellido").value = res.apellido;
           document.getElementById("lapellido").hidden=true;
           document.getElementById("apellido").hidden=true;
           document.getElementById("telefono").value = res.telefono;
           document.getElementById("telefono").disabled=true;
           document.getElementById("direccion").value = res.direccion;
           document.getElementById("direccion").disabled = true;
           $("#nuevo_cliente").modal("show");
        }
    }
    
}
function btnEliminarCli(id_cliente){
    Swal.fire({
        title: "Estas seguro de eliminar?",
        text: "El Usuario se eliminara de forma permanente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/eliminar/"+id_cliente;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje!",
                            text: "Usuario eliminado con exito.",
                            icon: "success"
                          });
                          tblClientes.ajax.reload();
                    }else{
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                          });
                    }
                }
            }

        }
      });
}


// Fin de Clientes


function frmCategoria(){
    document.getElementById("title").innerHTML = "Nueva Categoria";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmCategoria").reset();
    $("#nueva_categoria").modal("show");
    document.getElementById("id").value = "";
}
function registrarCategoria(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if(nombre.value == ""){
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Ingrese un dato para continuar",
            showConfirmButton: false,
            timer: 3000
          });
    }else{
        const url = base_url + "Categorias/registrar";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Categorias registrada con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();
                      $("#nueva_categoria").modal("hide");
                      tblCategorias.ajax.reload();
                }else if (res == "modificado") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Categoria modificada con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nueva_categoria").modal("hide");
                      tblCategorias.ajax.reload();
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                      });
                }
            }
        }
    }
}
function btnEditarCate(id_categoria){
    document.getElementById("title").innerHTML = "Actualizar Categoria";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Categorias/editar/"+id_categoria;
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText);
           document.getElementById("id").value = res.id_categoria;
           document.getElementById("nombre").value = res.nombre;
           $("#nueva_categoria").modal("show");
        }
    }
    
}
function btnEliminarCate(id_categoria){
    Swal.fire({
        title: "Estas seguro de eliminar?",
        text: "La categoria se eliminara de forma permanente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/eliminar/"+id_categoria;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Categoria eliminada con exito!",
                            icon: "success"
                          });
                          tblCategorias.ajax.reload();
                    }else{
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                          });
                    }
                }
            }

        }
      });
}
function btnReingresarUser(id_nombre){
    Swal.fire({
        title: "Estas seguro de Reingresar?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/"+id_nombre;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Mensaje!",
                            text: "Usuario reingresado con exito.",
                            icon: "success"
                          });
                          tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                          });
                    }
                }
            }

        }
      });
}

// Fin de Categorias

function frmmedida(){
    document.getElementById("title").innerHTML = "Nueva Medida";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmmedida").reset();
    $("#nueva_medida").modal("show");
    document.getElementById("id").value = "";
}
function registrarMedida(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const nombreC = document.getElementById("nombreC");
    if(nombre.value == "" || nombreC.value == ""){
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Ningun campo puede estar vacion",
            showConfirmButton: false,
            timer: 3000
          });
    }else{
        const url = base_url + "Medidas/registrar";
        const frm = document.getElementById("frmmedida");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Medida registrada con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();
                      $("#nueva_medida").modal("hide");
                      tblMedidas.ajax.reload();
                }else if (res == "modificado") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Medida modificada con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nueva_medida").modal("hide");
                      tblMedidas.ajax.reload();
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                      });
                }
            }
        }
    }
}
function btnEditarMedi(id_medidas){
    document.getElementById("title").innerHTML = "Actualizar Medida";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Medidas/editar/"+id_medidas;
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText);
           document.getElementById("id").value = res.id_medidas;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("nombreC").value = res.nombre_corto;
           $("#nueva_medida").modal("show");
        }
    }
    
}
function btnEliminarMedi(id_medidas){
    Swal.fire({
        title: "Estas seguro de eliminar?",
        text: "La medida se eliminara de forma permanente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Medidas/eliminar/"+id_medidas;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Medida eliminada con exito!",
                            icon: "success"
                          });
                          tblMedidas.ajax.reload();
                    }else{
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                          });
                    }
                }
            }

        }
      });
}

// fin de medidas

function frmProducto(){
    document.getElementById("title").innerHTML = "Nuevo Producto";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmProducto").reset();
    $("#nuevo_producto").modal("show");
    document.getElementById("id").value = "";
    deleteimg();
}
function registrarPro(e){
    e.preventDefault();
    const codigo = document.getElementById("codigo");
    const nombre = document.getElementById("nombre");
    const precio_compra = document.getElementById("precio_compra");
    const precio_venta = document.getElementById("precio_venta");
    const id_medida = document.getElementById("medida");
    const id_categoria = document.getElementById("categoria");
    if(codigo.value == "" || nombre.value == "" || precio_compra.value == "" || precio_venta.value == ""){
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 3000
          });
    }else{
        const url = base_url + "Productos/registrar";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Producto registrado con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();
                      $("#nuevo_producto").modal("hide");
                      tblProductos.ajax.reload();
                }else if (res == "modificado") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Producto modificado con exito",
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_producto").modal("hide");
                      tblProductos.ajax.reload();
                }else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                      });
                }
                
            }
            
        }
    }
}
function btnEditarPro(id_producto){
    document.getElementById("title").innerHTML = "Actualizar Producto";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url = base_url + "Productos/editar/"+id_producto;
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText);
           document.getElementById("id").value = res.id_producto;
           document.getElementById("codigo").value = res.codigo;
           document.getElementById("nombre").value = res.descripcion;
           document.getElementById("precio_compra").value = res.precio_compra;
           document.getElementById("precio_venta").value = res.precio_venta;
           document.getElementById("medida").value = res.id_medida;
           document.getElementById("categoria").value = res.id_categoria;
           document.getElementById("img-preview").src = base_url + 'Assets/img/'+ res.foto;
           document.getElementById("icon-cerrar").innerHTML = `
           <button class="btn btn-danger" onclick="deleteimg()"><i class="fas fa-times"></i></button>`;
           document.getElementById("icon-image").classList.add("d-none");
           document.getElementById("foto_actual").value = res.foto;
           $("#nuevo_producto").modal("show");
        }
    }
    
}
function btnEliminarPro(id_producto){
    Swal.fire({
        title: "Estas seguro de eliminar?",
        text: "El Producto se eliminara de forma permanente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/eliminar/"+id_producto;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire({
                            title: "Producto eliminado con exito!",
                            icon: "success"
                          });
                          tblProductos.ajax.reload();
                    }else{
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                          });
                    }
                }
            }

        }
      });
}
function preview(e){
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src =urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `
    <button class="btn btn-danger" onclick="deleteimg()"><i class="fas fa-times"></i></button>
    ${url['name']}`;
}
function deleteimg(){
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src ='';
    document.getElementById("imagen").value = '';
    document.getElementById("foto_actual").value = '';
}
function buscarCodigo(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if(e.which == 13){
            const url = base_url + "Compras/buscarCodigo/"+ cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res) {
                        document.getElementById("nombre").value = res.descripcion;
                        document.getElementById("precion").value = res.precio_compra;
                        document.getElementById("id").value = res.id_producto;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();
                    }else{
                        alertas('El producto no existe', 'warning');
                        document.getElementById("codigo").value = '';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{
        alertas('Ingrese un codigo', 'warning');
    }
}
function buscarCodigoVenta(e){
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if(e.which == 13){
            const url = base_url + "Compras/buscarCodigo/"+ cod;
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res) {
                        document.getElementById("nombre").value = res.descripcion;
                        document.getElementById("precion").value = res.precio_venta;
                        document.getElementById("id").value = res.id_producto;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();
                    }else{
                        alertas('El producto no existe', 'warning');
                        document.getElementById("codigo").value = '';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{
        alertas('Ingrese un codigo', 'warning');
    }
}
function calcularPrecio(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precion").value;
    document.getElementById("sub_total").value = precio * cant;
    if (e.which == 13) {
        if(cant > 0){
        const url = base_url + "Compras/ingresar/";
        const frm = document.getElementById("frmCompra");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargarDetalle();
                document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                document.getElementById("codigo").focus();

            }
        } 
        }
    }
}
function calcularPrecioVenta(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const precio = document.getElementById("precion").value;
    document.getElementById("sub_total").value = precio * cant;
    if (e.which == 13) {
        if(cant > 0){
        const url = base_url + "Compras/ingresarVenta/";
        const frm = document.getElementById("frmVenta");
        const http = new XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargarDetalleVenta();
                document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                document.getElementById("codigo").focus();

            }
        } 
        }
    }
}
if (document.getElementById('tblDetalle')) {
    cargarDetalle();
}
if (document.getElementById('tblDetalleVenta')) {
    cargarDetalleVenta();
}

function cargarDetalle(){
    const url = base_url + "Compras/listar/detalles";
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalles.forEach(row => {
                html += `<tr>
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 1)"><i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`;
            });
            document.getElementById("tblDetalle").innerHTML = html;
            document.getElementById("total").value = res.total_pagar.total;

        }
    } 
}
function cargarDetalleVenta(){
    const url = base_url + "Compras/listar/detalle_temp";
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalles.forEach(row => {
                html += `<tr>
                <td>${row['id']}</td>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td><input class="form-control" placeholder="Descuento" type="text" onkeyup="calcularDescuento(event, ${row['id']} )"></input></td>
                <td>${row['descuento']}</td>
                <td>${row['precio']}</td>
                <td>${row['sub_total']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['id']}, 2)"><i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`;
            });
            document.getElementById("tblDetalleVenta").innerHTML = html;
            document.getElementById("total").value = res.total_pagar.total;

        }
    } 
}
function calcularDescuento(e, id){
    e.preventDefault();
    if(e.target.value == ''){
        alertas('ingrese el descuento', 'warning');
    }else{
        if(e.which == 13){
    const url = base_url + "Compras/calcularDescuento/"+id + "/" + e.target.value;
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            cargarDetalleVenta();

        }
    } 
        }
    }
}
function deleteDetalle(id, accion){
    let url;
    if (accion == 1) {
        url = base_url + "Compras/delete/"+id;  
    }else{
        url = base_url + "Compras/deleteVenta/"+id; 
    }
    const http = new XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            if (accion == 1) {
                cargarDetalle();  
            }else{
                cargarDetalleVenta(); 
            }
            
            

        }
    } 
}
function procesar(accion){
    let url;
    Swal.fire({
        title: "Estas seguro de realizar la compra?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si!",
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            if (accion == 1) {
        
                url = base_url + "Compras/registrarCompra";
            }else{
                const id_cliente = document.getElementById('cliente').value;
                url = base_url + "Compras/registrarVenta/"+ id_cliente;
            }
            const http = new XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                  const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire({
                            title: "Mensaje!",
                            text: "Compra generada con exito.",
                            icon: "success"
                          });
                          let ruta;
                          if (accion == 1) {
                            ruta = base_url + 'Compras/generarPdf/' + res.id_compra;
                          }else{
                            ruta = base_url + 'Compras/generarPdfVenta/' + res.id_venta;
                          }
                          window.open(ruta);
                          setTimeout(() => {
                            window.location.reload();
                          }, 300);
                    }else{
                        Swal.fire({
                            title: "Mensaje!",
                            text: res,
                            icon: "error"
                          });
                    }
                }
            }

        }
      });
}
function modificarEmpresa(){
    const frm = document.getElementById('frmEmpresa');
    const url = base_url + "Administracion/modificar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true );
    http.send(new FormData(frm));
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            if (res == 'ok') {
                alert('modificado');
            }
        }
    } 
}
function alertas(mensaje, icono){
    Swal.fire({
        position: "top-end",
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    });
}
function restaurar(){
    document.getElementById("title").innerHTML = "Restauracion de Base de Datos";
    document.getElementById("btnAccion").innerHTML = "Restaurar";
    document.getElementById("rest").reset();
    $("#restaurarbd").modal("show");
}
reporteStock();
function reporteStock(){
    const url = base_url + "Administracion/reporteStock";
    const http = new XMLHttpRequest();
    http.open("POST", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['cantidad']);
                
            }
            var ctx = document.getElementById("stock");
                var myPieChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: nombre,
                        datasets: [{
                        data: cantidad,
                        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                        }],
                    },
});
        }
    } 
}
reporteProductos();
function reporteProductos(){
    const url = base_url + "Administracion/reporteProductos";
    const http = new XMLHttpRequest();
    http.open("POST", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['descripcion']);
                cantidad.push(res[i]['total']);
                
            }
            var ctx = document.getElementById("masVendido");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: nombre,
                datasets: [{
                    data: cantidad,
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                    }],
                    },
                });
        }
    } 
}


