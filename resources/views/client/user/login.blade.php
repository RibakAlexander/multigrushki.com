@extends('layouts.site')

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <form method="POST" action="{{route('userLogin')}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Логин</label>
                    <input type="text" name="login" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div hidden class="checkbox">
                    <label>
                        <input type="checkbox"> Проверить меня
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Отправить</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection