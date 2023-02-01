$(document).ready(function () {
    getCompromisos();
    getUsuarios();
    getActas();

    $("#guardar").on("click", function () {
        guardarCompromisos();
    });
});

function getUsuarios() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=usuario&a=list",
        data: {}
    }).done(function (response) {
        response = response[0];
        $("#responsable").empty();
        let responsable = (`<option value="">-- seleccionar --<option>`);
        for (let i = 0; i <  response.data.length; i++) {
            responsable += (`<option value="${response.data[i].id}">${response.data[i].nombres + ' ' + response.data[i].apellidos}<option>`);
        }
        
        $("#responsable").html(responsable);
    });
}

function getActas() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=acta&a=list",
        data: {}
    }).done(function (response) {
        $("#acta").empty();
        $("#acta").append(`<option value="">-- seleccionar --<option>`);
        response.data.forEach(element => {
            $("#acta").append(`<option value="${element.id}">${element.asunto}<option>`);
        });
    });
}

function getCompromisos() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=compromiso&a=list",
        data: {}
    }).done(function (response) {
        $("#cuerpo_tabla_compromisos").empty();
        let cuerpo_tabla_compromisos = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_compromisos += `<tr>
                                    <td>${a.asunto}</td>
                                    <td>${a.responsable}</td>
                                    <td>${a.fecha_inicio}</td>
                                    <td>${a.fecha_final}</td>
                                    <td>${a.descripcion}</td>
                                    <td><div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="eliminarCompromiso('${a.id}')">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" onclick="getEditarCompromiso('${a.id}')">
                                      <i class="fas fa-edit"></i>
                                    </button>                                   
                                  </div></td>
                                    </tr>`;
        });
        $("#cuerpo_tabla_compromisos").html(cuerpo_tabla_compromisos);
    });
}

function guardarCompromisos() {
    let id = $("#id").val();
    let acta = $("#acta").val();
    let responsable = $("#responsable").val();
    let fi = $("#fi").val();
    let ff = $("#ff").val();
    let descripcion = $("#descripcion").val();

    if (validarDatos()) {
        $.ajax({
            method: "POST",
            url: "../../index.php?c=compromiso&a=store",
            data: {
                id: id,
                acta: acta,
                responsable: responsable,
                fi: fi,
                ff: ff,
                descripcion: descripcion
            }
        }).done(function (response) {
            getCompromisos();
            $("#id").val(0);
            $("#acta").val("");
            $("#responsable").val("");
            $("#fi").val("");
            $("#ff").val("");
            $("#descripcion").val("");
        });        
    }else{
        alert('Todos lo datos son obligatorios');
    }
    
}

function getEditarCompromiso(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=compromiso&a=edit",
        data: {
            op: "editar",
            id: id
        }
    }).done(function (response) {
        response = response[0];
        $("#id").val(response.data[0].id);
        $("#acta").val(response.data[0].acta_id);
        $("#responsable").val(response.data[0].responsable_id);
        $("#fi").val(response.data[0].fecha_inicio);
        $("#ff").val(response.data[0].fecha_final);
        $("#descripcion").val(response.data[0].descripcion);
    });
}

function eliminarCompromiso(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=compromiso&a=destroy",
        data: {
            op: "eliminar",
            id: id
        }
    }).done(function (response) {
        getCompromisos();
    });
}

function validarDatos() {
    let acta = $("#acta").val();
    let responsable = $("#responsable").val();
    let fi = $("#fi").val();
    let ff = $("#ff").val();
    let descripcion = $("#descripcion").val();
    if (acta == "" || responsable == "" || fi == "" || ff == "" || descripcion == "") {
        return false;
    } else {
        return true;
    }
}