<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('public/css/mdTest.css')}}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <title>Document</title>
</head>
<body>
    <div class="">
        <div class="main-body">
        
              <!-- Breadcrumb -->
              <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Joueur</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User show</li>
                </ol>
              </nav>
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    {{-- card profil et image --}}
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>Ada Gueye</h4>
                          <p class="text-secondary mb-1">Joueur</p>
                          <p class="text-muted font-size-sm">Dakar, Ouest-foire</p>
                          <button class="btn btn-primary">Follow</button>
                          <button class="btn btn-outline-primary">Message</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- en bas de ce profil, là où je dois faire une présentation diagramme --}}
                  <div class="card mt-3">
                    {{-- <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                        <span class="text-secondary">https://bootdey.com</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                        <span class="text-secondary">bootdey</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                        <span class="text-secondary">@bootdey</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                        <span class="text-secondary">bootdey</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                        <span class="text-secondary">bootdey</span>
                      </li>
                    </ul> --}}
                    <div style="min-height: 300px">
                        <canvas id="radar-chart" style="width: 100%"></canvas>
                      </div>

                    <script>
                        // Récupérez les données des critères physiques des joueurs
                      
                        // Obtenez les clés et les valeurs des critères physiques
                       
                        const data = {
                            labels: [
                                'vitesse',
                                'puissance',
                                'endurance',
                                'controle',
                                'passe',
                                'tir',
                                'drible',
                                'tete',
                            ],
                            datasets: [{
                                label: 'My First Dataset',
                                data: [65, 99, 90, 81, 79, 55, 40, 70],
                                fill: true,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgb(255, 99, 132)',
                                pointBackgroundColor: 'rgb(255, 99, 132)',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: 'rgb(255, 99, 132)'
                            }]
                        };

                        const config = {
                            type: 'radar',
                            data: data,
                            options: {
                                elements: {
                                line: {
                                    borderWidth: 3
                                }
                                },
                                scale: {
                                ticks: {
                                    beginAtZero: true,
                                    min: 0,
                                    max: 100,
                                    stepSize: 20,
                                    callback: function(value) {
                                    return value + '%';
                                    }
                                }
                                },
                                maintainAspectRatio: false
                            }
                            };

                            const radarChart = new Chart(document.getElementById('radar-chart'), config);


                    </script>

                  </div>

                </div>


                {{-- l'autre coté, droit --}}
                <div class="col-md-8">
                  
                    {{-- haut  --}}
                  <div class="card mb-3 small">
                    <div class="card-body" >
                      
                      <div class="row border-bottom pt-2">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          adagueye@gmail.com
                        </div>
                      </div>
                      <div class="row border-bottom pt-2">
                        <div class="col-sm-3">
                          <p class="mb-0">Téléphone</p>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          78 609 40 21
                        </div>
                      </div>
                      <div class="row border-bottom pt-2">
                        <div class="col-sm-3">
                          <p class="mb-0">Lieu naissance</p>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          Dakar
                        </div>
                      </div>

                      <div class="row border-bottom pt-2">
                        <div class="col-sm-3">
                          <p class="mb-0">Date de naissance</p>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          01 / 05 / 2004
                        </div>
                      </div>

                      <div class="row border-bottom pt-2">
                        <div class="col-sm-3">
                          <p class="mb-0">Dernière modification</p>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            2023-07-10 12:51:47
                        </div>
                      </div>

                      <div class="row border-bottom pt-2">
                        <div class="col-sm-3">
                          <p class="mb-0">Validé</p>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <span class="" style="background-color: green; color : white; padding : 2px 10px; border-radius : 6px; font-size : 10px">OUI</span>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-sm-12">
                          <a class="btn btn-info " href="">Modifier</a>
                        </div>
                      </div>

                      

                    </div>
                  </div>
                  
                  {{-- bas --}}
                  <div class="row gutters-sm">
                    {{-- liste critere physique --}}
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                            <p>criteres physiques</p>
                          {{-- <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6> --}}
                          <small>Vitesse</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>puissance</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Endurance</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Taille</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Contrôle</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Passe</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Pied Gauche</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Pied droit</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>



                          <small>Dribble</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>

                        </div>
                      </div>
                    </div>

                    {{-- liste recruteurs qui le suivent --}}
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Liste recruteurs qui lie suivent</h6>
                          
                            <div class="d-flex align-items-center flex-wrap" style="flex-wrap: nowrap">
                                <img
                                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                    alt=""
                                    style="width: 80px; height: 80px"
                                    class="rounded-circle"
                                    />
                                <p style="margin : 0px 0px 0px 10px; color : black;">Generation foot</p>
                            </div>
                                
                        </div>
                      </div>
                    </div>
                  </div>
    
    
    
                </div>

              </div>
    
        </div>
    </div>

    <style>
        body{
            margin-top:20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;    
        }
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>
</body>
</html>

