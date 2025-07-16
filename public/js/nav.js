
$(function () {


    $(document).on("click", ".ver", function(){
        // alert($(this).attr("data-value"))
        const id = $(this).attr("data-id")
        // // $("#users").attr("value",iduser)
        console.log(id)
// alert("bem")
        $.ajax({
            url: "data/Modaldados.php",
            method: "POST",
            data:{
                id : id,
            }

        }).done(function (data) {
            $(".respostas").html(data)
            // alert(data)
        })

    })


    // Bloquear Usuario na pagina User

    $(document).on("click", ".bloquear", function(){
        // alert($(this).attr("data-value"))
        const id = $(this).attr("data-id")
        // // $("#users").attr("value",iduser)
        console.log(id)
// alert("bem")
        $.ajax({
            url: "data/BloquearUser.php",
            method: "POST",
            data:{
                id : id,
            }

        }).done(function (data) {
            $(".resps").html(data)
            // alert(data)
        })

    })


    // usuarios bloqueados na pagina bloquead
    $(document).on("click", ".Desbloquear", function(){
        // alert($(this).attr("data-value"))
        const id = $(this).attr("data-id")
        // // $("#users").attr("value",iduser)
        console.log(id)
// alert("bem")
        $.ajax({
            url: "data/ModaldadosBloqued.php",
            method: "POST",
            data:{
                id : id,
            }

        }).done(function (data) {
            $(".resps").html(data)
            // alert(data)
        })

    })



    // Desbloquear Usuario na pagina User

    $(document).on("click", ".active", function(){
        const id = $(this).attr("data-id")
        console.log(id)
        $.ajax({
            url: "data/DesbloquearUser.php",
            method: "POST",
            data:{
                id : id,
            }
        }).done(function (data) {
            $(".resps").html(data)
        
        })

    })
})