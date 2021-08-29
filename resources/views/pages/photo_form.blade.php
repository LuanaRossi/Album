@extends('/layouts/main')

@section('content')
@include('/partials/navbar')
<div class="container">
  <!-- btn come back column-->
  <div class="row">
    <div class="col-12 my-4">
      <a href="/"><i class="fas fa-arrow-left"></i></a>
    </div>

    <!-- Card form column -->
    <div class="col-12">
      <div class="card shadow bg-white rounded">
        <div class="card-header gradient text-white">
          <h2 class="card-title p-3"><i class="fas fa-image"></i>
            {{ isset($photo) ? "Alterar Foto" : "Nova Foto" }}
          </h2>
        </div>
        <div class="card-body p-5">
          <!-- Form -->
          @if (isset($photo))
            <form action="/photos/{{$photo->id}}" method="POST">
            @method('PUT')
          @else
            <form action="/photos" method="POST" enctype="multipart/form-data">
          @endif

          @csrf

            <div class="row">
              <!--Photo Column-->
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <div
                    class="miniatura img-thumbnail d-flex flex-column justify-content-center align-items-center h-100 mt-4">
                    <!--<i class="far fa-image"></i>-->
                    <img id="imgPrev" class="w-100" style="object-fit: cover" height="340px" src="{{asset('/img/img_padrao.png')}}">
                  </div>
                  <div class="form-group mt-2">
                    <div class="custom-file">
                      <input type="file" id="photo" name="photo" class="custom-file-input" onchange="loadFile(event)">
                    </div>
                  </div>
                </div>
              </div><!-- End of Photo Column -->

              <!-- Inputs Column-->
              <div class="col-lg-6">
                <!-- Title -->
                <div class="form-group">
                  <label for="title">Título</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="fas fa-image"></i>
                    </div>
                    <input id="title" name="title" type="text" class="form-control" required
                      placeholder="Digite o título da sua imagem" value="{{ $photo->title ?? null }}">
                  </div>
                </div>

                <!-- Date -->
                <div class="form-group">
                  <label for="date">Data</label>
                  <div class="input-group">
                    <div class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </div>
                    <input id="date" name="date" type="date" class="form-control" required
                      value="{{ $photo->date ?? null }}">
                  </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                  <label for="description">Descrição</label>
                  <textarea id="description" name="description" cols="40" rows="5" class="form-control" required
                    placeholder="Digite uma pequena descrição da imagem">{{ $photo->description ?? null }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="form-group d-flex mt-3">
                  <button name="submit" type="reset" class="btn btn-laranja flex-grow-1 me-3">Limpar</button>
                  <button name="submit" type="submit" class="btn btn-primary flex-grow-1 ms-3">Salvar</button>
                </div>

              </div><!-- End of Inputs Column -->
            </div><!-- End of Row -->
          </form><!-- End of Form -->
        </div><!-- End of Card-body -->
      </div><!-- End of Card -->

    </div><!-- End of Card-form column -->
  </div><!-- End of Row -->

</div><!-- End of Container -->

<script src="{{asset('/js/script.js')}}"></script>
@endsection
