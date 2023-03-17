<!DOCTYPE html>
<html>
    <head>
        <title>Gestion des machines</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <ul class="nav justify-content-center sticky-top bg-dark py-3">
            <li class="nav-item">
                <a class="nav-link text-dark bg-light" href="/gestionMachine">Gestion des Machines</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/gestionSalle">Gestion des Salles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/chart">Chart</a>
            </li>
        </ul>

        <div class="container">
            <div class="card bg-white" >
                <div class="card-header card-color">
                    <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des Machines</p>
                </div>
                <div class="card-body container-fluid" >
                    <form method="post" action="{{route('saveMachine')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <label for="reference">Reference </label>
                                <input type="text" class="form-control" name="reference">
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="nom">Marque </label>
                                <input type="text" class="form-control" name="nom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" name="prix">
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="salleid">Salle Id</label>
                                <select class="form-select" name="salleid">
                                    <option>Choisir une salle</option>
                                    @foreach($salleList as $list)
                                    <option value="{{$list->id}}">Salle {{$list->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-black mt-3 mb-3" >Ajouter</button>
                            </div>
                        </div>
                    </form>
                    <div class="row table-responsive m-auto rounded">
                        <table id="fct" class="table table-hover">
                            <thead>
                                <tr class="text-uppercase bg-light">
                                    <th scope="col">Id</th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Marque</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Salle ID</th>
                                    <th scope="col">Date D'achat</th>
                                    <th scope="col">Supprimer</th>
                                    <th scope="col">Modifier</th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                            @foreach($machineList as $machine)
                              <tr>
                                <td>{{$machine->id}}</td>
                                <td>{{$machine->reference}}</td>
                                <td>{{$machine->nom}}</td>
                                <td>{{$machine->prix}}</td>
                                <td>{{$machine->salleId}}</td>
                                <td>{{$machine->created_at}}</td>
                                <td>
                                <form method='post' action="{{route('removeMachine', $machine->id)}}">
                                  {{csrf_field()}}
                                  <button type='submit' class='btn btn-outline-dark'>Supprimer</button>
                                </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('showMachine', $machine->id)}}">
                                        {{csrf_field()}}
                                        <button type='submit' class='btn btn-outline-dark'>Modifier</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
