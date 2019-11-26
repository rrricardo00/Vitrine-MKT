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
              <!--trigger modal-->
              <button type="button" class="btn btn-light float-right" data-toggle="modal" data-target="#modal">
                  Adicionar
              </button>
              <!--trigger modal-->
          </div>
        </header>

          <!-- Modal -->
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Adicionar MKT</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
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
                              <button type="submit" class="btn btn-primary my-2">Cadastrar</button>
                              <button type="reset" class="btn btn-secondary my-2">Limpar</button>
                            </p>
                          </form>
                        </div>
                      </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
          <!--modal-->
        <main role="main">

        

          <div class="album py-5 bg-light">
            <div class="container">
            <span class="justify-content-sm-center">{{$posts->links()}}</span>
              <div class="row">
              
                @foreach ($posts as $post)
                <div class="">
                
                    <div class="card-body">
                      <h5 class="card-title"><span class="btn btn-warning">ID: {{ $post->numero }}</span> <button class="btn btn-primary" data-toggle="modal" data-target="#{{ $post->descricao }}">Expandir</button></h5>
                      
                      <div class="modal fade"  id="{{ $post->descricao }}" tabindex="-1" role="dialog" aria-labelledby="{{ $post->descricao }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                      <h5 class="modal-title full-width" id="{{ $post->descricao }}">{{ $post->descricao }}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                              <div {{--  class="modal-body"  --}}>
                                                <iframe class="iframe" src="{{ $post->link }}" frameborder="0" height="1000" width="800" scrolling="auto" ></iframe>
                              </div>
                              <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                      
                              </div>
                              </div>
                            </div>
                            </div>              
                                    
                                                      
                      <iframe class="iframe" src="{{ $post->link }}" frameborder="0" height="1700" width="320"></iframe>
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

          //Ano Atual----------------------------------------
          let data = new Date();
          let ano = data.getFullYear();
          document.getElementById("anoLocal").innerHTML = ano + " Ricardo Rolha Rosa";
          //---------------------------------------------------

        </script>
    </body>
    </html>

