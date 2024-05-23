@extends('admin.dashboard')

@section('dashboard')

        
        <div class="row">
            <div class="col-md-3">
                
                <div class="cardb card-body font-semibold text-center mb-3">
                    <i class="fa-solid fa-users-viewfinder"></i>
                    <label >Total All User </label> 
                    <h1 class="font-extrabold mb-0 text-center">{{ $total }}</h1>
                   
                </div>
            </div>
            <div class="col-md-3">
                <div class="cardb card-body font-semibold text-center mb-3" >
                    <i class="fa-solid fa-users-between-lines"></i>
                    <label >Users approuvés</label>
                    <h1 class="font-extrabold mb-0 text-center">{{ $userapp }}</h1>
                   
                </div>
            </div>
            <div class="col-md-3">
                <div class="cardb card-body  font-semibold text-center mb-3">
                    <i class="fa-solid fa-users-slash"></i>
                    <label >Users non approuvés</label>
                    <h1 class="font-extrabold mb-0 text-center">{{ $usernoapp }}</h1>
                   
                </div>
            </div>
                
                <div class="col-md-3">
                    <div class="cardb card-body  font-semibold text-center mb-3">
                        <i class="fa-solid fa-users-between-lines"></i>
                        
                        <label >Admin approuvés</label>
                        <h1 class="font-extrabold mb-0 text-center">{{ $admappr }}</h1>
                       
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cardb card-body  font-semibold text-center mb-3">
                        <i class="fa-solid fa-users-slash"></i>
                      
                        <label >Admin  non approuvés</label>
                        <h1 class="font-extrabold mb-0 text-center">{{ $admnapp }}</h1>
                       
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="cardb card-body  font-semibold text-center mb-3">
                        <i class="fa-solid fa-users-between-lines"></i>
                      
                        <label >Users validé</label>
                        <h1 class="font-extrabold mb-0 text-center">{{ $scorep }}</h1>
                       
                    </div>

                   
                </div>
                <div class="col-md-3">
                    <div class="cardb card-body  font-semibold text-center mb-3">
                        <i class="fa-solid fa-users-slash"></i>
                      
                        <label >User  non validé</label>
                        <h1 class="font-extrabold mb-0 text-center">{{ $scoren }}</h1>
                       
                    </div>
                   
                </div>
        </div>
    
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-dark">Demandes</h3>
                        <div class="chart-container"  style="width: 400px; height: 350px;">
                            <canvas id="myChart" width="300" height="300"></canvas>
                        </div>
                
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-dark">Tests</h3>
                        <div class="chart-container" style="width: 350px; height: 350px;">
                            <canvas id="myPieChart" width="300" height="200"></canvas>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['user approuvés', 'user non approuvés', 'Admin approuvés', 'Admin non approuvés'],
                datasets: [{
                    label: 'Nombre',
                    data: [{{ $userapp }}, {{ $usernoapp }}, {{ $admappr }}, {{ $admnapp }}],
                    backgroundColor: ['#ab1414', '#030720', '#4286f5', '#f5b642'],
                    borderColor: '#000000',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                     scales: {
                            y: {
            beginAtZero: true,
            max: 25, // Définir la valeur maximale de l'axe y à 15
            stepSize: 5 // Définir l'intervalle entre chaque étape de l'axe y à 5
            }
         }
    }
 });

 var ctx = document.getElementById('myPieChart').getContext('2d');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Validé', 'Non Validé'],
        datasets: [{
            data: [{{ $scorep }}, {{ $scoren }}],
            backgroundColor: ['#ab1414', '#030720']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            },
            tooltip: {
                enabled: false
            },
            datalabels: {
                formatter: (value, ctx) => {
                    let sum = {{ $admappr }} + {{ $admnapp }};
                    let percentage = (value * 100 / sum).toFixed(2) + "%";
                    return percentage;
                },
                color: '#fff',
                font: {
                    weight: 'bold'
                }
            }
        },
        layout: {
            padding: {
                left: 20,
                right: 20,
                top: 20,
                bottom: 20
            }
        }
    }
});

    </script>    
@endsection

