<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <header>
        <div class="container pt-4 pb-4 mt-4">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#"><strong>laravel Crud</strong> </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                </div>
                </nav>


            </div>
        </div>

        </div>

    </header>



    <div class="container ml-4 pl-4 ">
        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="{{route('article_add')}}">Create</a>
            </div>
            @if(Session::has('msg'))
            <div class="col-md-12">
                <div class="alert alert-success">{{Session::get('msg')}}</div>
            </div>
            @endif
            @if(Session::has('errormsg'))
            <div class="col-md-12">
                <div class="alert alert-danger">{{Session::get('errormsg')}}</div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Articles / List
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="50" scope="col">id</th>
                                    <th width="100" scope="col">Title</th>
                                    <th width="400" scope="col">Discription</th>
                                    <th width="100" scope="col">Author</th>
                                    <th width="300" scope="col">Image</th>
                                    <th width="200" class="tex-center" scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if($articles)
                                @foreach($articles as $article)
                                <tr>
                                    <th scope="row">{{$article->id}}</th>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->description}}</td>
                                    <td>{{$article->author}}</td>
                                    <td><img width="200px" src="{{asset('storage/image/'.$article->image)}}"></td>
                                    <td>
                                        <a href="{{url('article/edit/'.$article->id)}}"
                                            class="btn btn-primary btn btn-sm">Edit</a>
                                        <a href="{{url('article/delete/'.$article->id)}}"
                                            class="btn btn-danger btn btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">Record Not Found</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

</body>

</html>