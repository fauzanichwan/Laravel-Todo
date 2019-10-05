<html>
  <head>
    <title>Laravel Todo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <style>
      .reset {
        margin-top: 5%;
      }

      .txt {
        text-transform: capitalize;
        font-size: 18px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <!-- start -->
    <div class="container">
      <div class="row reset">
        <div class="col-md-10 offset-md-1">
          <div class="row">
            <div class="col-md-12">
              <h1 style="font-family: 'Lobster', cursive;">Welcome To Laravel Todo</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <!-- card -->
              <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="row">
                  <div class="col-md-11">
                    <form class="input-group" method="post" action="/item">
                      @csrf
                      <input type="text" class="form-control" placeholder="Type in a new todo..." name="name">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add</button>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-1">
                    <button class="btn btn-light">@php echo count($items) @endphp</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    @if($errors->has('name'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('name') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @elseif(session('msgSuccess'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('msgSuccess') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @elseif(session('msg'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    @if(count($items))
                      <form action="/item/deleteSelected" method="post">
                      @csrf
                      @method('DELETE')
                      @foreach($items as $row)
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-11">
                              <input type="checkbox" name="check[]" value="{{ $row->id }}">
                              <span  class="txt"> {{ $row->name }}</span> <span style="color: gray">{{ $row->created_at->diffforhumans() }}</span>
                            </div>
                            <div class="col-md-1">
                              <a href="/item/{{ $row->id }}/delete">
                                <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                              </a>
                            </div>
                          </div>
                        </li>
                      </ul>
                      @endforeach
                      <br><button type="submit" class="btn btn-danger">Delete Cheked</button>&nbsp;
                      <a href="/item/deleteAll">
                        <button type="button" class="btn btn-outline-danger">Delete All</button>
                      </a>
                      </form>
                    @else
                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-warning" role="alert">
                            No Record !
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <!-- card -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end -->
  <script src="{{ asset('/js/app.js') }}"></script>
  </body>
</html>