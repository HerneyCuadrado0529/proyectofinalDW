$(document).ready(function () {
    getUsuarios();
    getActas();

    $("#guardar").on("click", function () {
        guardarActa();
    });
});

function getUsuarios() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=usuario&a=list",
        data: {}
    }).done(function (response) {
        $("#responsable").empty();
        $("#responsable").append(`<option value="">-- seleccionar --<option>`);
        response = response[0];
        response.data.forEach(element => {
            $("#responsable").append(`<option value="${element.id}">${element.nombres + ' ' + element.apellidos}<option>`);
        });


    });
}

function getActas() {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=acta&a=list",
        data: {}
    }).done(function (response) {
        $("#cuerpo_tabla_actas").empty();
        let cuerpo_tabla_actas = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_actas += `<tr>
                                    <td>${a.id}</td>
                                    <td>${a.asunto}</td>
                                    <td>${a.fecha_creacion}</td>
                                    <td>${a.hora_inicio + " - " + a.hora_final}</td>
                                    <td>${a.orden_del_dia}</td>
                                    <td>${a.descripcion_hechos}</td>
                                    <td><div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="eliminarActas('${a.id}')">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" onclick="getEditarActa('${a.id}')">
                                      <i class="fas fa-edit"></i>
                                    </button>                                   
                                    <button type="button" class="btn btn-sm btn-info" onclick="getInfoActa('${a.id}')">
                                      <i class="fas fa-eye"></i>
                                    </button>                                   
                                  </div></td>
                                    </tr>`;
        });
        $("#cuerpo_tabla_actas").html(cuerpo_tabla_actas);
    });
}

function guardarActa() {
    let id = $("#id").val();
    let asunto = $("#asunto").val();
    let fecha = $("#fecha").val();
    let responsable = $("#responsable").val();
    let hi = $("#hi").val();
    let hf = $("#hf").val();
    let orden = $("#orden").val();
    let descripcion = $("#descripcion").val();

    if (validarDatos()) {
        $.ajax({
            method: "POST",
            url: "../../index.php?c=acta&a=store",
            data: {
                op: "guardar",
                id: id,
                asunto: asunto,
                fecha: fecha,
                responsable: responsable,
                hi: hi,
                hf: hf,
                orden: orden,
                descripcion: descripcion
            }
        }).done(function (response) {
            getActas();
            $("#id").val(0);
            $("#asunto").val("");
            $("#responsable").val("");
            $("#hi").val("");
            $("#hf").val("");
            $("#orden").val("");
            $("#descripcion").val("");
        });
    }else{
        alert('Todos lo datos son obligatorios');
    }

}

function getEditarActa(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=acta&a=edit",
        data: {
            id: id
        }
    }).done(function (response) {
        response = response[0];
        $("#id").val(response.data[0].id);
        $("#asunto").val(response.data[0].asunto);
        $("#responsable").val(response.data[0].responsable_id);
        $("#fecha").val(response.data[0].fecha_creacion);
        $("#hi").val(response.data[0].hora_inicio);
        $("#hf").val(response.data[0].hora_final);
        $("#orden").val(response.data[0].orden_del_dia);
        $("#descripcion").val(response.data[0].descripcion_hechos);
    });
}

function eliminarActas(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=acta&a=destroy",
        data: {
            id: id
        }
    }).done(function (response) {
        getActas();
        console.log(response);
    });
}

function getInfoActa(id) {
    $.ajax({
        method: "POST",
        url: "../../index.php?c=acta&a=info",
        data: {
            id: id
        }
    }).done(function (response) {
        response = response[0];
        $("#d_asunto").html(response.data.acta[0].asunto);
        $("#d_creador").html(response.data.acta[0].creador);
        $("#d_creada").html(response.data.acta[0].fecha_creacion);
        $("#d_horas").html("Hora inicio: " + response.data.acta[0].hora_inicio + " - Hora inicio: " + response.data.acta[0].hora_final);
        $("#d_orden").html(response.data.acta[0].orden_del_dia);
        $("#d_descripcion").html(response.data.acta[0].descripcion_hechos);

        $("#cuerpo_tabla_compromisos").empty();
        let cuerpo_tabla_compromisos = "";
        response.data.compromisos.forEach((a, i) => {
            cuerpo_tabla_compromisos += `<tr>
                                    <td>${a.resposable}</td>
                                    <td>${a.fecha_inicio}</td>
                                    <td>${a.fecha_final}</td>
                                    <td>${a.descripcion}</td>                                    
                                    </tr>`;
        });
        $("#cuerpo_tabla_compromisos").html(cuerpo_tabla_compromisos);

        $("#cuerpo_tabla_asistente").empty();
        let cuerpo_tabla_asistente = "";
        response.data.asistentes.forEach((a, i) => {
            cuerpo_tabla_asistente += `<tr>
                                    <td>${a.asistente}</td>                                    
                                    </tr>`;
        });
        $("#cuerpo_tabla_asistente").html(cuerpo_tabla_asistente);

        $("#modal_acta").modal('show');
    });
}

function validarDatos() {
    let asunto = $("#asunto").val();
    let fecha = $("#fecha").val();
    let responsable = $("#responsable").val();
    let hi = $("#hi").val();
    let hf = $("#hf").val();
    let orden = $("#orden").val();
    let descripcion = $("#descripcion").val();
    if (asunto == "" || fecha == "" || responsable == "" || hi == "" || hf == "" || orden == "" || descripcion == "") {
        return false;
    } else {
        return true;
    }
}