$(function(){
    $(document).on("submit", "form", function (e) {
        e.preventDefault();
        var url = $(this).attr("action")
        var load ="<p class='text-center'><img src='../images/load.gif' style='width:40px; height:30px'></p>";
        $(".resp").html(load);
          $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
          }).done(function (data) {
            if(data == 'Registado com sucesso'  || data == 'logado com sucesso' ){
                $('.response').html(data);
                var submeter = $(".enviar").attr("value",'Logado com sucesso');
                setTimeout(function(){location.reload()},2000 );
            }else{
                $('.response').html(data);
            }
          });
      });
})
// <!-- function(){location.assign("Admin/index.php?Home.php");}, 2000 -->