$(document).ready(function () {
    $("#div_reporte_actas_fechas").attr("hidden", true);
    $("#div_reporte_compromisos").attr("hidden", true);
    $("#div_reporte_actas_usuarios").attr("hidden", true);
    $("#div_reporte_actas_busque_acta").attr("hidden", true);

    $("#informe").on("change", function () {
        if ($("#informe").val() == "f") {
            $("#div_reporte_actas_fechas").attr("hidden", false);
            $("#div_reporte_compromisos").attr("hidden", true);
            $("#div_reporte_actas_usuarios").attr("hidden", true);
            $("#div_reporte_actas_busque_acta").attr("hidden", true);
            $("#div_reporte_actas_busque_asunto").attr("hidden", true);

        } else if ($("#informe").val() == "cp") {
            $("#div_reporte_actas_fechas").attr("hidden", true);
            $("#div_reporte_compromisos").attr("hidden", false);
            $("#div_reporte_actas_usuarios").attr("hidden", true);
            $("#div_reporte_actas_busque_acta").attr("hidden", true);
            $("#div_reporte_actas_busque_asunto").attr("hidden", true);

        } else if ($("#informe").val() == "au") {
            getUsuarios();
            $("#div_reporte_actas_fechas").attr("hidden", true);
            $("#div_reporte_compromisos").attr("hidden", true);
            $("#div_reporte_actas_usuarios").attr("hidden", false);
            $("#div_reporte_actas_busque_acta").attr("hidden", true);
            $("#div_reporte_actas_busque_asunto").attr("hidden", true);

        } else if ($("#informe").val() == "ba") {
            $("#div_reporte_actas_fechas").attr("hidden", true);
            $("#div_reporte_compromisos").attr("hidden", true);
            $("#div_reporte_actas_usuarios").attr("hidden", true);
            $("#div_reporte_actas_busque_acta").attr("hidden", false);
            $("#div_reporte_actas_busque_asunto").attr("hidden", true);

        } else if ($("#informe").val() == "bna") {
            $("#div_reporte_actas_fechas").attr("hidden", true);
            $("#div_reporte_compromisos").attr("hidden", true);
            $("#div_reporte_actas_usuarios").attr("hidden", true);
            $("#div_reporte_actas_busque_acta").attr("hidden", true);
            $("#div_reporte_actas_busque_asunto").attr("hidden", false);
        }

    });

    $("#reporte_fecha").on("click", function () {
        getReporteActasFecha();
    });

    $("#reporte_cp").on("click", function () {
        getReporteCompromisosPendientes();
    });

    $("#reporte_au").on("click", function () {
        getReporteActasUsuarios();
    });

    $("#reporte_ba").on("click", function () {
        getReporteActasCodigo();
    });

    $("#reporte_a").on("click", function () {
        getReporteActasAsunto();
    });
});

function getUsuarios() {
    $.ajax({
        method: "GET",
        url: "../../index.php?c=usuario&a=list",
        data: {}
    }).done(function (response) {
        response = response[0];
        $("#usuario").empty();
        let responsable = (`<option value="">-- seleccionar --<option>`);
        for (let i = 0; i < response.data.length; i++) {
            responsable += (`<option value="${response.data[i].id}">${response.data[i].nombres + ' ' + response.data[i].apellidos}<option>`);
        }

        $("#usuario").html(responsable);
    });
}

function getReporteActasFecha() {
    let fecha_i = $("#fecha_i").val();
    let fecha_f = $("#fecha_f").val();
    $.ajax({
        method: "POST",
        url: "../../index.php?c=reporte&a=actas_fechas",
        data: {
            fecha_i: fecha_i,
            fecha_f: fecha_f
        }
    }).done(function (response) {
        $("#cuerpo_tabla_actas").empty();
        let cuerpo_tabla_actas = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_actas += `<tr>
                                    <td>${a.asunto}</td>
                                    <td>${a.fecha_creacion}</td>
                                    <td>${a.hora_inicio + " - " + a.hora_final}</td>
                                    <td>${a.orden_del_dia}</td>
                                    <td>${a.descripcion_hechos}</td>                                   
                                    </tr>`;
        });
        $("#cuerpo_tabla_actas").html(cuerpo_tabla_actas);
    });
}

function getReporteCompromisosPendientes() {
    let fecha_i = $("#fecha_i").val();
    let fecha_f = $("#fecha_f").val();
    $.ajax({
        method: "GET",
        url: "../../index.php?c=reporte&a=compromisos_pendientes",
        data: {}
    }).done(function (response) {
        $("#cuerpo_tabla_actas_cp").empty();
        let cuerpo_tabla_actas_cp = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_actas_cp += `<tr>
                                    <td>${a.asunto}</td>
                                    <td>${a.fecha_creacion}</td>
                                    <td>${a.hora_inicio + " - " + a.hora_final}</td>
                                    <td>${a.orden_del_dia}</td>
                                    <td>${a.descripcion_hechos}</td>                                   
                                    </tr>`;
        });
        $("#cuerpo_tabla_actas_cp").html(cuerpo_tabla_actas_cp);
    });
}

function getReporteActasUsuarios() {
    let usuario = $("#usuario").val();
    $.ajax({
        method: "POST",
        url: "../../index.php?c=reporte&a=actas_usuarios",
        data: {          
            usuario: usuario
        }
    }).done(function (response) {
        $("#cuerpo_tabla_actas_au").empty();
        let cuerpo_tabla_actas_au = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_actas_au += `<tr>
                                    <td>${a.asunto}</td>
                                    <td>${a.fecha_creacion}</td>
                                    <td>${a.hora_inicio + " - " + a.hora_final}</td>
                                    <td>${a.orden_del_dia}</td>
                                    <td>${a.descripcion_hechos}</td>                                   
                                    </tr>`;
        });
        $("#cuerpo_tabla_actas_au").html(cuerpo_tabla_actas_au);
    });
}

function getReporteActasCodigo() {
    let id = $("#codigo").val();
    $.ajax({
        method: "POST",
        url: "../../index.php?c=reporte&a=busqueda_codigo",
        data: {
            id: id
        }
    }).done(function (response) {
        $("#cuerpo_tabla_actas_ba").empty();
        let cuerpo_tabla_actas_ba = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_actas_ba += `<tr>
                                    <td>${a.asunto}</td>
                                    <td>${a.fecha_creacion}</td>
                                    <td>${a.hora_inicio + " - " + a.hora_final}</td>
                                    <td>${a.orden_del_dia}</td>
                                    <td>${a.descripcion_hechos}</td>                                   
                                    </tr>`;
        });
        $("#cuerpo_tabla_actas_ba").html(cuerpo_tabla_actas_ba);
    });
}

function getReporteActasAsunto() {
    let asunto = $("#asunto").val();
    $.ajax({
        method: "POST",
        url: "../../index.php?c=reporte&a=busqueda_asunto",
        data: {
            op: "busqueda_asunto",
            asunto: asunto
        }
    }).done(function (response) {
        $("#cuerpo_tabla_actas_a").empty();
        let cuerpo_tabla_actas_a = "";
        response.data.forEach((a, i) => {
            cuerpo_tabla_actas_a += `<tr>
                                    <td>${a.asunto}</td>
                                    <td>${a.fecha_creacion}</td>
                                    <td>${a.hora_inicio + " - " + a.hora_final}</td>
                                    <td>${a.orden_del_dia}</td>
                                    <td>${a.descripcion_hechos}</td>                                   
                                    </tr>`;
        });
        $("#cuerpo_tabla_actas_a").html(cuerpo_tabla_actas_a);
    });
}

