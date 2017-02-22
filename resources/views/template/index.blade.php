@extends('template.layouts.layout')

@section('h1')
    @parent
    <p>Дополнительный текст</p>
@endsection

@section('content')
    $title - {{$title}}

    {{-- {{$a or $b}} тернарный оператор: если есть $a, то она отобразиться; если нет - то отобразиться $b --}}

    {{--@if($c > 0)
        условие
    @endif--}}

    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    @include('template.content')
@endsection