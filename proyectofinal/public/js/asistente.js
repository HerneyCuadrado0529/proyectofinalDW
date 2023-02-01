$(document).ready(function () {
    getAsistentes();
    getUsuarios();
    getActas();

    $("#guardar").on("click", function () {
        guardarAsistente();
    });
});

function getUsuarios() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=usuario&a=list",
        data: {}
    }).done(function (response) {
        response = response[0];
        $("#asistente").empty();
        let responsable = (`<option value="">-- seleccionar --<option>`);
        for (let i = 0; i < response.data.length; i++) {
            responsable += (`<option value="${response.data[i].id}">${response.data[i].nombres + ' ' + response.data[i].apellidos}<option>`);
        }

        $("#asistente").html(responsable);
    });
}

function getActas() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=acta&a=list",
        data: {}
    }).done(function (response) {
        $("#acta").empty();
        let acta = '<option value="">-- seleccionar --<option>';
        response.data.forEach(element => {
            acta += '<option value="' + element.id + '">' + element.asunto + '<option>';
        });
        $("#acta").html(acta);
    });
}

function getAsistentes() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=asistente&a=list",
        data: {}
    }).done(function (response) {
        response = response[0];
        $("#cuerpo_tabla_asistente").empty();
        let cuerpo_tabla_asistente = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_asistente += `<tr>
                                    <td>${a.acta}</td>
                                    <td>${a.asistente}</td>
                                    <td><div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="eliminarAsistente('${a.id}')">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" onclick="getEditarAsistente('${a.id}')">
                                      <i class="fas fa-edit"></i>
                                    </button>                                   
                                  </div></td>
                                    </tr>`;
        });
        $("#cuerpo_tabla_asistente").html(cuerpo_tabla_asistente);
    });
}

function guardarAsistente() {
    let id = $("#id").val();
    let acta = $("#acta").val();
    let asistente = $("#asistente").val();

    if (validarDatos()) {
        $.ajax({
            method: "POST",
            url: "../../index.php?c=asistente&a=store",
            data: {
                id: id,
                acta: acta,
                asistente: asistente
            }
        }).done(function (response) {
            getAsistentes();
            $("#id").val(0);
            $("#acta").val("");
            $("#asistente").val("");
        });        
    }else{
        alert('Todos lo datos son obligatorios');
    }
    
}

function getEditarAsistente(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=asistente&a=edit",
        data: {
            op: "editar",
            id: id
        }
    }).done(function (response) {
        response = response[0];
        $("#id").val(response.data[0].id);
        $("#acta").val(response.data[0].acta_id);
        $("#asistente").val(response.data[0].asistente_id);
    });
}

function eliminarAsistente(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=asistente&a=destroy",
        data: {
            op: "eliminar",
            id: id
        }
    }).done(function (response) {
        getAsistentes();
    });
}

function validarDatos() {
    let acta = $("#acta").val();
    let asistente = $("#asistente").val();

    if (acta == "" || asistente == "") {
        return false;
    } else {
        return true;
    }

}