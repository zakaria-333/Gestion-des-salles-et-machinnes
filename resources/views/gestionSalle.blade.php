<!DOCTYPE html>
<html>
    <head>
      <title>Gestion des salles</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    </head>
    <body>
    <ul class="nav justify-content-center sticky-top bg-dark py-3">
            <li class="nav-item">
                <a class="nav-link text-white font-weight-bold" href="/gestionMachine">Gestion des Machines</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark bg-light" href="/gestionSalle">Gestion des Salles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white font-weight-bold" href="/chart">Chart</a>
            </li>
        </ul>
        <div class="container">
            <div class="card bg-white" >
                <div class="card-header card-color">
                    <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des Salles</p>
                </div>
                <div class="card-body container-fluid" >
                    <form method="post" action="{{route('saveSalle')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <label for="code">Code </label>
                                <input type="text" class="form-control" name="code" required>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <label for="libelle">Libelle </label>
                                <input type="text" class="form-control" name="libelle" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-dark mt-3 mb-3" id="btn">Ajouter</button>
                            </div>
                        </div>
                    </form>
                    <div class="row table-responsive m-auto rounded">
                        <table id="fct" class="table table-hover">
                            <thead>
                                <tr class="text-uppercase bg-light">
                                    <th scope="col">Id</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Libelle</th>
                                    <th scope="col">Supprimer</th>
                                    <th scope="col">Modifier</th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                              @foreach($salleList as $salle)
                              <tr>
                                <td>{{$salle->id}}</td>
                                <td>{{$salle->code}}</td>
                                <td>{{$salle->libelle}}</td>
                                <td>
                                <form method='post' action="{{route('removeSalle', $salle->id)}}">
                                  {{csrf_field()}}
                                  <button type='submit' class='btn btn-outline-dark'>Supprimer</button>
                                </form>
                                </td>
                                <td>
                                <form method='post' action="{{route('showSalle', $salle->id)}}">
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
