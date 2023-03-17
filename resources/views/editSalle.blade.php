<!DOCTYPE html>
<html>
  <head>
    <title>Modifier Salle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container bg-light">
      <h1 class="text-center text-white bg-dark py-3">MODIFICATION DE LA SALLE {{$salle->code}}</h1>
      <form method="post" action="{{route('editSalle')}}">
        {{csrf_field()}}
        <div class="row">
          <div class="col-sm-6 mb-2">
            <input type="hidden" name="id" value="{{$salle->id}}">
            <label for="code">Code </label>
            <input type="text" class="form-control" name="code" value="{{$salle->code}}">
          </div>
          <div class="col-sm-6 mb-2">
            <label for="libelle">Libelle </label>
            <input type="text" class="form-control" name="libelle" value="{{$salle->libelle}}">
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