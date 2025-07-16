<?php

$nav = 'index';
require_once("Views/header.php");


?>


<div class="cards">
    <div class="cards-header">
        <div class="cardheader color1">
            <div class="cards-value">
                <p class="values"><?= count($usuarios) ?></p>
                <p class="descriptio">Usuarios</p>
            </div>
            <div class="cards-icons">
                <i class="fa-solid fa-users colors1"></i>
            </div>
        </div>
        <div class="cardfooter colorfooter1">
            <p class="ticket">Todos os usuarios cadastrado no sistema</p>
        </div>
    </div>

    <!-- card 2 -->
    <div class="cards-header">
        <div class="cardheader color2">
            <div class="cards-value">
                <p class="values"><?= count($conversation) ?></p>
                <p class="descriptio">Conversas</p>
            </div>
            <div class="cards-icons">
                <i class="fa fa-bar-chart colors2"></i>
            </div>
        </div>
        <div class="cardfooter colorfooter2">
            <p class="ticket">Total de conversas trocadas</p>
        </div>
    </div>


    <!-- card 3 -->
    <div class="cards-header">
        <div class="cardheader color3">
            <div class="cards-value">
                <p class="values"><?= count($blocked) ?></p>
                <p class="descriptio">Bloqueados</p>
            </div>
            <div class="cards-icons">
                <i class="fa fa-bar-chart colors3"></i>
            </div>
        </div>
        <div class="cardfooter colorfooter3">
            <p class="ticket">Todos os usuarios blockeados</p>

        </div>
    </div>
</div>
<div class="conteiner">
    <div class="list-pays">
        <table class="table table-sm">
            <thead class="text-center">
                <tr>
                    <th>Usuarios</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">

                <?php
                if (empty($active)) {
                    echo "<tr><td colspan='7'>Nenhum dado encontrado</td></tr>";
                } else {
                    foreach ($active as $use) :
                ?>
                        <tr>
                            <td><?=$use['nome']?></td>
                            <td>80,0</td>
                            <td><button class="btn rounded-0">ACTIVE</button></td>
                        </tr>
                       

                <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="charts">
        <div class="Chart-Titles">
            <p class="vendasChart">Usuarios mais Activo (Diario)</p>
        </div>
        <canvas style="width: 500px; height: 500px;" id="myChart"></canvas>
    </div>
</div>

<?php

require_once("Views/footer.php")

?>