@extends('template.layouts.layout')

@section('content')
    <form class="form-horizontal" role="form" method="post" action="{{ route('contact') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="text" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input name="password" type="text" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Войти</button>
            </div>
        </div>
    </form>
@endsection