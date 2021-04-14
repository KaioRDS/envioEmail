$('#submit-email').click(function (e) { 
    e.preventDefault();
    let nome = $("#nome").val();
    let email = $("#email").val();
    let msg = $("#msg").val() ;

    $.ajax({
        type: "POST",
        url: "src/enviaEmail.php",
        data: {
            nome : nome,
            email : email,
            msg : msg
        },
        dataType: "json",
        success: function (response) {
            alert(response.resposta);
        }
    });
});