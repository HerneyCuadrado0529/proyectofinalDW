$(document).ready(function () {

    $("#alerta").hide();
    $("#login").on("click", function () {
        login();
    })
});



function login() {
    $("#alerta").hide();
    let user  = $("#user").val();
    let pass  = $("#pass").val();
    $.ajax({
        method: "POST",
        url: "../index.php?c=auth&a=login",
        data: {
            user: user,
            pass: pass
        }
    }).done(function (response) {
        console.log(response);
        if (response[0].status == "success") {
            location.href = 'views/index.php';
        }else{
            $("#alerta").html(response.message);
            $("#alerta").show();
        }
    });
}