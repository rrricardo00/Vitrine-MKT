<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Vitrine MKT</title>
    <style>
        body { padding: 20px; }
        .navbar { margin-bottom: 20px; }
        :root { --jumbotron-padding-y: 10px; }
        .jumbotron {
          padding-top: var(--jumbotron-padding-y);
          padding-bottom: var(--jumbotron-padding-y);
          margin-bottom: 0;
          background-color: #fff;
        }
        @media (min-width: 768px) {
          .jumbotron {
            padding-top: calc(var(--jumbotron-padding-y) * 2);
            padding-bottom: calc(var(--jumbotron-padding-y) * 2);
          }
        }
        .jumbotron p:last-child { margin-bottom: 0; }
        .jumbotron-heading { font-weight: 300; }
        .jumbotron .container { max-width: 40rem; }
        .btn-card { margin: 4px; }
        .btn { margin-right: 5px; }
        footer { padding-top: 3rem; padding-bottom: 3rem; }
        footer p { margin-bottom: .25rem; }


    </style>
</head>
<body>

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <a href="/" class="navbar-brand d-flex align-items-center">
              <strong>Vitrine MKT</strong>
            </a>
        </div>
      </header>
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Atualizar MKT</h1>
          <form method="POST" action="/" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-left">
              <label for="numero">Número ID</label>
              <input type="number" class="form-control" id="numero" name="numero" placeholder="ID">
            </div>
            <div class="form-group text-left">
              <label for="link">Link</label>
              <input class="form-control" id="link" name="link">
            </div>
            <div class="form-group text-left">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
              </div>
            <p>
              <button type="submit" class="btn btn-primary my-2">Atualizar</button>
              <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
            </p>
          </form>
        </div>
      </section>
      <footer class="text-muted">
        <div class="container">
        
          <p class="float-right">
            <a href="#" class="btn btn-primary"><i class="material-icons">keyboard_arrow_up</i></a>
          </p>
          <p id="anoLocal"></p>
        </div>
      </footer>
  
      <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>