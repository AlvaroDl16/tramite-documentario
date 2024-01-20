<section class="section_index">
    <div class="cards_container">
        <article class="card">
            <div class="card_text">
                <p>Total pendientes</p>
                <p><?php echo $num_pendientes['pendientes']; ?></p>
            </div>
            <div class="icon_card yellow_icon">
                <i class="fa-regular fa-clock"></i>
            </div>
        </article>

        <article class="card">
            <div class="card_text">
                <p>En proceso</p>
                <p><?php echo $num_en_proceso['en_proceso']; ?></p>
            </div>
            <div class="icon_card orange_icon">
                <i class="fa-solid fa-spinner"></i>
            </div>
        </article>

        <article class="card">
            <div class="card_text">
                <p>Procesos finalizados</p>
                <p><?php echo $num_aceptados['aceptados']; ?></p>
            </div>
            <div class="icon_card green_icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </article>
    </div>

    <article class="card_enviados">
        <p>Reporte de documentos enviados</p>
        <div>
            <canvas id="myChart"></canvas>
        </div>
        <div>
            <div>
                <p>Total <span><?php echo $num_enviados['enviados']; ?></span> </p>
            </div>
            <div>
                <p>Aceptados <span><?php echo $num_aceptados['aceptados']; ?></span> </p>
            </div>
            <div>
                <p>En proceso <span><?php echo $num_en_proceso['en_proceso']; ?></span> </p>
            </div>
            <div>
                <p>Rechazados <span><?php echo $num_rechazados['rechazados']; ?></span> </p>
            </div>
        </div>
    </article>

    <article class="card_recibidos">
        <p>Reporte recibidos</p>
        <div>
            <canvas id="myChart2"></canvas>
        </div>

        <div>
            <div>
                <p>Total <span><?php echo $num_recibidos['recibidos']; ?></span> </p>
            </div>
            <div>
                <p>Aceptados <span><?php echo $num_aceptados2['aceptados2']; ?></span> </p>
            </div>
            <div>
                <p>Despachados <span>0</span> </p>
            </div>
            <div>
                <p>Rechazados <span><?php echo $num_rechazados2['rechazados2']; ?></span> </p>
            </div>
        </div>
    </article>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Solicitud', 'Informe', 'Carta', 'Requerimiento', 'Eleveacion', 'Coordinacion'],
      datasets: [{
        label: //'# of Votes',
        <?php echo "'Total de enviados'," ?>
        data: //[12, 19, 3, 5, 2, 3],
        <?php 
            $origen = $_SESSION['area_cargo'];
            $query = $conexion->prepare("SELECT COUNT(*) AS total, 
            SUM(CASE WHEN id_tipo = 1 THEN 1 ELSE 0 END) AS solicitud, 
            SUM(CASE WHEN id_tipo = 2 THEN 1 ELSE 0 END) AS informe, 
            SUM(CASE WHEN id_tipo = 3 THEN 1 ELSE 0 END) AS carta, 
            SUM(CASE WHEN id_tipo = 4 THEN 1 ELSE 0 END) AS requerimiento, 
            SUM(CASE WHEN id_tipo = 5 THEN 1 ELSE 0 END) AS elevacion, 
            SUM(CASE WHEN id_tipo = 6 THEN 1 ELSE 0 END) AS coordinacion 
            FROM documentos WHERE id_tipo IN (1, 2, 3, 4, 5, 6) AND area_origen='$origen'");
            $query->execute();
            $total_tipos = $query->fetch(PDO::FETCH_LAZY);
            echo "['".$total_tipos['solicitud']."',".$total_tipos['informe'].
            ",".$total_tipos['carta'].",".$total_tipos['requerimiento'].
            ",".$total_tipos['elevacion'].",".$total_tipos['coordinacion']."],";
        ?>
        backgroundColor:[
            'rgba(255, 99, 132, .3)',
            'rgba(54, 162, 235, .3)',
            'rgba(255, 206, 86, .3)',
            'rgba(75, 192, 192, .3)',
            'rgba(153, 102, 255, .3)',
            'rgba(153, 102, 10, .3)',
        ],
        borderColor:[
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(153, 102, 10, 1)',
        ],
        borderWidth: 1
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


  const ctx2 = document.getElementById('myChart2');

  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ['Aceptados', 'Despachados', 'Rechazados'],
      datasets: [{
        label: '# of Votes',
        data: //[30, 0, 0],
        <?php
            echo "['".$num_aceptados2['aceptados2']."',0,".$num_rechazados2['rechazados2']."],";
        ?>
        borderWidth: 1
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
</script>

