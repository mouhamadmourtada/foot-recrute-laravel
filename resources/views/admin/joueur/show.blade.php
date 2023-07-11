
@extends('base.base')

@section('main')

    <div class="mt-3">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.centre.index')}}">Accueil</a></li>
                  <li class="breadcrumb-item"><a href="{{route('admin.joueur.index')}}">Joueur</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User show</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
    
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    {{-- profil etc... --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4 class="text-center">
                                        <span>
                                            {{$joueur->prenomJoueur}}
                                        </span>
                                        <span>
                                            {{$joueur->nomJoueur}}
                                        </span>
                                    </h4>
                                    {{-- <p class="text-secondary mb-1">Joueur</p> --}}
                                    <p class="text-secondary mb-1 text-center">
                                        <?php if ($joueur->estGardien): ?>
                                            Gardien
                                        <?php else: ?>
                                            Joueur
                                        <?php endif; ?>
                                    </p>
                                    
                                    <p class="text-center" class="text-muted font-size-sm">{{$joueur->adresseJoueur}}</p>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- chart en bas --}}
                    <div class="card mt-3">
                        <div style="min-height: 300px">
                            <canvas id="radar-chart" style="width: 100%"></canvas>
                        </div>
                        <script>
                            // const criterePhysique = <?php echo json_encode($criterePhysique); ?>;
                            const criterePhysique = {!! json_encode($criterePhysique) !!};

                            const data = {
                                labels: [
                                    'vitesse',
                                    'puissance',
                                    'endurance',
                                    'controle',
                                    'passe',
                                    'tir',
                                    'dribble',
                                    'tete',
                                ],
                                datasets: [{
                                    label: 'My First Dataset',
                                    data: [
                                        criterePhysique.vitesse,
                                        criterePhysique.puissance,
                                        criterePhysique.endurance,
                                        criterePhysique.controle,
                                        criterePhysique.passe,
                                        criterePhysique.tir,
                                        criterePhysique.dribble,
                                        criterePhysique.tete,
                                    ],
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
                    <div class="card mt-3">

                        <div class="mb-5 text-center" >
                            <div class="bg-white rounded shadow-sm px-1">
                                <div class="text-center">
                                    <img src="https://bootstrapious.com/i/snippets/sn-team/teacher-2.jpg" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                </div>
                                <p class="mb-0 text-center">{{$joueur->centreFormation->nomCentre}}</p>
                                {{-- <span class="small text-uppercase text-muted">CEO - Founder</span> --}}
                                <div class="row border-bottom pt-2 small">
                                    
                                    {{-- <div class="col-sm-5">
                                        <p class="mb-0">Nom</p>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                       {{$joueur->centreFormation->nomCentre }}
                                    </div> --}}
                                    <div class="col-sm-6">
                                        <p class="mb-0">adresse</p>
                                    </div>
                                    <div class="col-sm-6 text-secondary">
                                       {{$joueur->centreFormation->adresseCentre }}
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0">Tél</p>
                                    </div>
                                    <div class="col-sm-6 text-secondary">
                                       {{$joueur->centreFormation->telephoneCenter }}
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0"> Email</p>
                                    </div>
                                    <div class="col-sm-6 text-secondary">
                                       {{$joueur->centreFormation->mailCentre }}
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->


                    </div>
                </div>
    
                {{-- partie droite --}}
                <div class="col-md-8">

                    {{-- haut --}}
                    <div class="card mb-3 small">
                        <div class="card-body">
                            <div class="row border-bottom pt-2">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$joueur->mailJoueur}}
                                </div>
                            </div>
                            
                            <div class="row border-bottom pt-2">
                                <div class="col-sm-3">
                                    <p class="mb-0">Lieu naissance</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$joueur->lieuNaissance}}
                                </div>
                            </div>
                            <div class="row border-bottom pt-2">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date de naissance</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$joueur->dateNaissance}}
                                </div>
                            </div>
                            <div class="row border-bottom pt-2">
                                <div class="col-sm-3">
                                    <p class="mb-0">Dernière mise à jour</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$joueur->updated_at}}
                                </div>
                            </div>
                            <div class="row border-bottom pt-2">
                                <div class="col-sm-3">
                                    <p class="mb-0">Poste</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$joueur->poste}}
                                </div>
                            </div>
                            <div class="row border-bottom pt-2">
                                <div class="col-sm-3">
                                    <p class="mb-0">Validé</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php if ($joueur->estValide): ?>
                                        <span class="" style="background-color: green; color: white; padding: 2px 10px; border-radius: 6px; font-size: 10px">OUI</span>
                                    <?php else: ?>
                                        <span class="" style="background-color: red; color: white; padding: 2px 10px; border-radius: 6px; font-size: 10px">NON</span>
                                    <?php endif; ?>
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
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->vitesse}}%" aria-valuenow="{{$criterePhysique->vitesse}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>puissance</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->puissance}}%" aria-valuenow="{{$criterePhysique->puissance}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Endurance</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->endurance}}%" aria-valuenow="{{$criterePhysique->endurance}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            
                              <small>Contrôle</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->controle}}%" aria-valuenow="{{$criterePhysique->controle}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Passe</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->passe}}%" aria-valuenow="{{$criterePhysique->passe}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Pied Gauche</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->piedGauche}}%" aria-valuenow="{{$criterePhysique->piedGauche}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Pied droit</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->piedDroit}}%" aria-valuenow="{{$criterePhysique->piedDroit}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
    
    
                              <small>Dribble</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->dribble}}%" aria-valuenow="{{$criterePhysique->dribble}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>

                              <small>Tête</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->tete}}%" aria-valuenow="{{$criterePhysique->tete}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>

                              <small>Tir</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$criterePhysique->tir}}%" aria-valuenow="{{$criterePhysique->tir}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>



                            <div class="row border-bottom pt-2 small">
                                <div class="col-sm-7">
                                    <p class="mb-0">Taille</p>
                                </div>
                                <div class="col-sm-5 text-secondary">
                                   {{$criterePhysique->taille }}cm
                                </div>
                            </div>

                            <div class="row border-bottom pt-2 small text-small">
                                <div class="col-sm-7">
                                    <p class="mb-0">Pied fort</p>
                                </div>
                                <div class="col-sm-5 text-secondary">
                                    {{$criterePhysique->piedFort}}
                                </div>
                            </div>
                            <div class="row border-bottom pt-2 small text-small">
                                <div class="col-sm-7">
                                    <p class="mb-0">Poids</p>
                                </div>
                                <div class="col-sm-5 text-secondary">
                                    {{$criterePhysique->poids}} kg
                                </div>
                            </div>
                            
    
                            </div>
                          </div>
                        </div>
    
                      
                       
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Liste recruteurs qui lie suivent</i></h6>


                                    @if ($joueur->recruteurs->count() > 0)
                                        @foreach ($joueur->recruteurs as $recruteur)
                                          
                                            <div class="d-flex align-items-center flex-wrap" style="flex-wrap: nowrap">
                                                <a href="{{ route('admin.recruteur.show', $recruteur->id) }}">
                                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 80px; height: 80px" class="rounded-circle">
                                                </a>
                                                <div>
                                                    <p style="margin: 0px 0px 0px 10px; color: black;">{{ $recruteur->prenomRecruteur }}</p>
                                                    <p style="margin: 0px 0px 0px 10px; color: black;">{{ $recruteur->nomRecruteur }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    @endif



                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
@endsection

