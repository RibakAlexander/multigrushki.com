@extends('layouts.site')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>{{$header}}</h1>
            <p>{{$message}}</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">

            <div class="form">

                <form method="POST" action="{{route('articleStore')}}">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок">
                    </div>
                    <div class="form-group">
                        <label for="alias">Псевдоним</label>
                        <input type="text" class="form-control" id="alias" name="alias" placeholder="Псевдоним">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Краткое описание</label>
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Полный текст</label>
                        <textarea class="form-control" name="text"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>

                    {{ csrf_field() }}

                </form>

            </div>
        </div>

        <hr>

        <footer>
            <p>&copy; 2016 Company, Inc.</p>
        </footer>
    </div> <!-- /container -->

@endsection