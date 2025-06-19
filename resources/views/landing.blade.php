
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SearchBook</title>

    {{-- @vite(['resources/scss/app.scss']) --}}
    {{-- <link href="{{ asset('../resources/css/app.css') }}" rel="stylesheet" type="text/css" >
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Search top 250 IMDB Movies</span>
          </a>
    
          <ul class="nav nav-pills">
              <form action="#" method="GET" onsubmit="return false">
          <div class="input-group">
            <li class='nav-item'>
                <input type="text" class="form-control" placeholder="Search "  id="cari">
            </li>
              <div class="col-lg-1">
                <li class="nav-item dropdown">
                    <select class="form-control"  id="rank">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                      </select>
                    </div>
                </li>
              <div class="input-group-append">
              <input class="btn btn-secondary fas fa-search" id="search" type="submit" value="Search">
              </div>
          </div>
      </form>
          </ul>
        </header>
      </div>
    {{-- <header>
        <nav style="background-image: linear-gradient( 111.4deg,  rgb(209, 255, 4) 30.8%, rgb(122, 233, 194) 100.2% );" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded">
            <a class="navbar-brand" href="#">Book Searching</a>
        </nav>
    </header> --}}

    {{-- <main role="main" style="height:200px; background-image: linear-gradient( 111.4deg,  rgb(122, 233, 194) 18.8%, rgb(209, 255, 4) 100.2% );">
        <div class="container pt-5">
            <!-- Another variation with a button -->
            <form action="#" method="GET" onsubmit="return false">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search the Book"  id="cari">
                <div class="col-lg-1">
                <select class="form-control"  id="rank">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <div class="input-group-append">
                <input class="btn btn-secondary fas fa-search" id="search" type="submit" value="Search">
                </div>
            </div>
        </form>
        </div>
    </main> --}}

    <div class="row m-4" id="content">
     
    </div>
    {{-- @vite(['resources/js/app.js']) --}}

    <script>
        $(document).ready(function() {
            $("#search").click(function(){
                var cari = $("#cari").val();
                var rank = $("#rank").val();
                // console.log(cari.rank);
                $.ajax({
                    url:'/search?q='+cari+'&rank='+rank,
                    //dataType : "json",
                    
                    success: function(data){
                            console.log('ini di function cari2');
                             $('#content').html(data);
                        },
                        error: function(data){
                            $('#content').html(data);
                            //alert("Please insert your command");
                        }
                });
                //console.log(cari.rank);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>