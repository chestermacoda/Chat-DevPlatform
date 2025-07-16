<?php
$nav = 'blocked';
require_once("Views/header.php")


?>



<div class="conteiner-fluid">
 

    <div class="pages">
        <div class="page-names">
            <h5>Blocked users</h5>
        </div>
        <div class="page-names">
            <!-- <button class="btn btn-sm"><i class="fa-solid fa-add"></i> </button> -->
        </div>
    </div>
    <div class="border"></div>

    <div class="table-responsive">
        <table class="table table-trip">
            <thead>
                <tr>
                    <th>Data Created</th>
                    <th>Foto Perfil</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Satus</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                if(empty($blocked)){ 
                    echo "<tr><td colspan='7'>Nenhum dado encontrado</td></tr>";
                }else{
                    foreach($blocked as $use): 
                ?>
                <tr>
                    <td><?=$use['data_created']?></td>
                    <td><img src="../upload/<?=$use['foto']?>" alt=""></td>
                    <td><?=$use['nome']?></td>
                    <td><?=$use['email']?></td>
                    <td><?=$use['status']?></td>
                    <td><a href="#" class="btn btn-sm btn-info Desbloquear" data-id="<?=$use['id']?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Ver</a></td>
                </tr>
                <?php
                    endforeach;

                }
                ?>
            </tbody>
        </table>
    </div>


</div>



<?php

require_once("Views/footer.php")

?>