<!DOCTYPE html>
<html>
    <head>
        <title>Gestion des machines</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    </head>
    <body>
        <ul class="nav justify-content-center sticky-top bg-dark py-3">
            <li class="nav-item">
                <a class="nav-link text-white" href="/gestionMachine" >Gestion des Machines</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/gestionSalle">Gestion des Salles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark bg-light " href="#">Chart</a>
            </li>
        </ul>
        <div class="container border bg-light">
        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
        </div>

        <script>
             var x = @json($x);
             var y = @json($y);
            var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: x,
                datasets: [{
                    label: 'Machine par Classe',
                    data: y,
                    backgroundColor: 'orange',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
    </script>
    </canvas>


   
        
        
    </body>
</html>