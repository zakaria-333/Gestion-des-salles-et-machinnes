<!DOCTYPE html>
<html>
  <head>
    <title>Modifier Machine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container bg-light">
      <h1 class="text-center text-white bg-dark py-3">MODIFICATION DE LA MACHINE{{$machine->nom}}</h1>
      <form method="post" action="{{route('editMachine')}}">
        {{csrf_field()}}
        <div class="row">
          <div class="col-sm-6 mb-2">
            <input type="hidden" name="id" value="{{$machine->id}}">
            <label for="reference">Reference </label>
            <input type="text" class="form-control" name="reference" value="{{$machine->reference}}">
          </div>
          <div class="col-sm-6 mb-2">
            <label for="nom">Marque </label>
            <input type="text" class="form-control" name="nom" value="{{$machine->nom}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-2">
            <label for="prix">Prix</label>
            <input type="number" class="form-control" name="prix" value="{{$machine->prix}}">
          </div>
          <div class="col-sm-6 mb-2">
            <label for="salleid">Salle Id</label>
            <select class="form-select" name="salleid" value="{{$machine->salleId}}">
              <option>Choisir une salle</option>
              @foreach($salleList as $list)
              <option value="{{$list->id}}">Salle {{$list->code}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-outline-dark mt-3 mb-3" id="btn">Modifier</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>