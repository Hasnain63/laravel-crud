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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit / Article
                    </div>
                    <div class="card-body ">
                        <form action="{{url('article/edit/'. $article->id)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Name</label>
                                <input type="text"
                                    class="form-control {{($errors->any() && $errors->first('title'))?'is-invalid':''}} "
                                    id="title" value="{{old('title',$article->title)}}" name="title" placeholder="Name">
                                @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="discription" class="form-label">Description</label>
                                <textarea name="description" value="" cols="10" rows="8"
                                    class="form-control {{($errors->any() && $errors->first('description')) ?'is-invalid':''}} "
                                    id="description"
                                    placeholder="description">{{old('discription',$article->description)}}</textarea>
                                @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                             <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file"
                                    class="form-control {{($errors->any() && $errors->first('image'))?'is-invalid':''}} "
                                    id="image" value="{{old('image')}}" name="image">
                                @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('image')}}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text"
                                    class="form-control {{($errors->any() && $errors->first('author'))?'is-invalid':''}} "
                                    id="author" value="{{old('author',$article->author)}}" placeholder="Author"
                                    name="author">
                                @if($errors->any())
                                <p class="invalid-feedback">{{$errors->first('author')}}</p>
                                @endif
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{route('article_list')}}">Back</a>
                        </form>

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