</main>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Dados do usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="resps text-center"></div>
             <div class=" respostas"></div>
       
        </div>
    </div>
</div>



<script src="../public/js/jquery.js"></script>
<script src="../public/js/nav.js"></script>
<script src="../public/js/bootstrap.bundle.js"></script>
<script src="../public/js/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    let value = [];
    let nomes = []






    let grafico = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nomes,
            datasets: [{
                label: 'Usuarios Mais Activos',
                data: value,
                borderWidth: 1.5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const url = 'http://localhost/youtube/Chat/painel/data/ChartConversation.php';
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            for (let index = 0; index < resp.length; index++) {
                value.push(resp[index].number);
                nomes.push(resp[index].nome);
            }
            grafico.update();
            // console.log(value[0], nomes[1], value[2])
    })
</script>
</body>

</html>