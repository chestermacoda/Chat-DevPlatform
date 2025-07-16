$(function () {
    let users = $("#users").val();
 
    // Script de Meus Amigos do Chat 
    function MeusAmigos() {
        $.ajax({
            url: "php/data/mypeople.php",
            method: "POST",
        }).done(function (data) {
            $(".allusers").html(data)
        })
    }

    MeusAmigos();

    $(document).on("click", ".usuarios", function(){
        // alert("bbb")
        $.ajax({
            url: "php/data/AllUsers.php",
            method: "POST",

        }).done(function (data) {
            $(".allusers").html(data)
        })
    })

    // Script para pegar a conversas do amigo clicado
    $(document).on("click", ".firstuser", function(){
        // alert($(this).attr("data-value"))
        const iduser = $(this).attr("data-value")
        $("#users").attr("value",iduser)
        $.ajax({
            url: "php/data/conversation.php",
            method: "POST",
            data:{
                admin : admin,
                iduser: iduser
            }

        }).done(function (data) {
            $(".conversation").html(data)
            // alert(data)
        })

        // Sript para pegar o usuario clicado e mostrar a imagem e o nome e ver se esta online

        $.ajax({
            url: "php/data/UserChoose.php",
            method: "POST",
            data:{
                iduser: iduser
            }

        }).done(function (data) {
            $(".other-user").html(data)
            // alert(data)
        })
        // conversas(iduser)
    })



    // Requisitar o status do usuarios

    function statusUser(){
        let iduser = $("#users").val();
        $.ajax({
            url: "php/data/UserChoose.php",
            method: "POST",
            data:{
                iduser: iduser
            }

        }).done(function (data) {
            $(".other-user").html(data)
            // alert(data)
        })
    }

    setInterval(statusUser, 200)
   

    function conversas(iduser){
        iduser = $("#users").val();
        $.ajax({
            url: "php/data/conversation.php",
            method: "POST",
            data:{
                admin : admin,
                iduser: iduser
            }

        }).done(function (data) {
            $(".conversation").html(data)
            // alert(data)
        })
    }


   
    setInterval(conversas,200)

    // INICIAR UMA CONVERSA
    $(document).on("click", ".submit", function(e){
        e.preventDefault()
        const conversation = $("#message").val();
            // alert(conversation)
        let users = $("#users").val();
        $.ajax({
            url: "php/data/sendMessage.php",
            method: "POST",
            data:{
                admin : admin,
                users: users,
                conversation:conversation
            }

        }).done(function (data) {
            // $(".conversation").html(data)
            // alert(data)
            conversas(users)
            $("#message").val('');
        })
      
    })


    $(document).on("click", ".datas-check", function(e){
        e.preventDefault();
         $(".mains").css({
            display:"block",
            transition: "0.4s"
         })

         id = $(this).attr("data-id");
      
         $.ajax({
             url: "php/data/DadosPerfil.php",
             method: "POST",
             data:{
                 id : id,

             }
 
         }).done(function (data) {
             $(".mains").html(data)
             // alert(data)
         })
    })

    $(document).on("click", ".btn-closes", function(e){
        e.preventDefault();
         $(".mains").css({
            display:"none",
            transition: "0.4s"
         })
    })
    $(document).on("click", ".show", function(e){
        e.preventDefault();
         $(".form-denunciar").toggle("2000")
         $(this).hide("2000")
    })
    

})