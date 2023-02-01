$(document).ready(function () {
    getUsuarios();

    $("#guardar").on("click", function () {
        guardarUsuario();
    });

    $("#identificacion").on("keyup", function () {
        $("#pass").val($("#identificacion").val());
    });
});

function getUsuarios() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=usuario&a=list",
        data: {}
    }).done(function (response) {
        $("#cuerpo_tabla_usuarios").empty();
        let cuerpo_tabla_usuarios = "";
        response[0].data.forEach((u, i) => {
            cuerpo_tabla_usuarios += `<tr>
                                    <td>${u.nombres + " " + u.apellidos}</td>
                                    <td>${u.username}</td>
                                    <td>${u.tipo_id}</td>
                                    <td>${u.identificacion}</td>
                                    <td>${u.tipo == 'A' ? 'ADMIN' : 'INFORME'}</td>
                                    <td><div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="eliminarUsuario('${u.id}')">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" onclick="getEditarUsuario('${u.id}')">
                                      <i class="fas fa-edit"></i>
                                    </button>                                   
                                  </div></td>
                                    </tr>`;
        });
        $("#cuerpo_tabla_usuarios").html(cuerpo_tabla_usuarios);
    });
}

function guardarUsuario() {
    let id = $("#id").val();
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let tipo_id = $("#tipo_id").val();
    let identificacion = $("#identificacion").val();
    let usuario = $("#usuario").val();
    let tipo = $("#tipo").val();

    if (validarDatos()) {
        $.ajax({
            method: "POST",
            url: "../../index.php?c=usuario&a=store",
            data: {
                op: "guardar",
                id: id,
                nombre: nombre,
                apellido: apellido,
                tipo_id: tipo_id,
                identificacion: identificacion,
                usuario: usuario,
                tipo: tipo
            }
        }).done(function (response) {
            getUsuarios();
            $("#id").val(0);
            $("#nombre").val("");
            $("#apellido").val("");
            $("#tipo_id").val("1");
            $("#identificacion").val("");
            $("#usuario").val("");
            $("#pass").val("");
        });

    } else {
        alert('Todos lo datos son obligatorios');
    }    
}

function getEditarUsuario(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=usuario&a=edit",
        data: {
            id: id
        }
    }).done(function (response) {
        response = response[0];
        $("#id").val(response.data[0].id);
        $("#nombre").val(response.data[0].nombres);
        $("#apellido").val(response.data[0].apellidos);
        $("#tipo_id").val(response.data[0].tipo_id);
        $("#identificacion").val(response.data[0].identificacion);
        $("#usuario").val(response.data[0].username);
        $("#pass").val(response.data[0].identificacion);
    });
}

function eliminarUsuario(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=usuario&a=destroy",
        data: {
            id: id
        }
    }).done(function (response) {
        getUsuarios();

    });
}

function validarDatos() {
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let tipo_id = $("#tipo_id").val();
    let identificacion = $("#identificacion").val();
    let usuario = $("#usuario").val();
    let tipo = $("#tipo").val();

    if (nombre == "" || apellido == "" || tipo_id == "" || identificacion == "" || usuario == "" || tipo == "") {
        return false;
    } else {
        return true;
    }
}