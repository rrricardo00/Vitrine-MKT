<!doctype html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Adicione o MKT Padrão</h1>
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
              <button type="submit" class="btn btn-primary my-2">Enviar</button>
              <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
            </p>
          </form>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
         <span class="justify-content-sm-center">{{$posts->links()}}</span>
          <div class="row">
          
            @foreach ($posts as $post)
            <div class="">
            
                <div class="card-body">
                  <h5 class="card-title"><span class="btn btn-warning">ID: {{ $post->numero }}</span> <button class="btn btn-primary" onclick="aumentar()">Expandir</button></h5>
                  <iframe class="iframe" src="{{ $post->link }}" frameborder="0" height="1000"></iframe>
                  <div class="row">
                    <form method="POST" action="/{{ $post->id }}">
                      @csrf
                      {{-- <input type="hidden" name="_method" value="delete"> --}}
                      <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                    </form>
                    <form action="/atualizar/{{$post->id}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-dark btn-sm">Atualizar</button>
                    </form>
                  </div>
                  
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
      
    </main>
    
    <footer class="text-muted">
      <div class="container">
      <p class="justify-content-sm-center">{{$posts->links()}}</p>
        <p class="float-right">
          <a href="#" class="btn btn-primary"><i class="material-icons">keyboard_arrow_up</i></a>
        </p>
        <p id="anoLocal"></p>
      </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>

        let responsivo = false;

      
                function aumentar() {  

                  responsivo = !responsivo;

                    let pegarId = document.querySelectorAll('.iframe');
                    console.log(pegarId);

                    if (responsivo) {
                      for (let i = 0; i < pegarId.length; i++) {
                      const element = pegarId[i].classList.add('expandir');
                      console.log(element);
                    }
                    } else {
                      for (let i = 0; i < pegarId.length; i++) {
                      const element = pegarId[i].classList.remove('expandir');
                      console.log(element);
                    }
                    }

                  }
               

       //Ano Atual----------------------------------------
       let data = new Date();
       let ano = data.getFullYear();
       document.getElementById("anoLocal").innerHTML = ano + " Ricardo Rolha Rosa";
       //---------------------------------------------------

    </script>
</body>
</html>

