@extends('m4.layout')
@section('content')
    <h2>Skill</h2>
    <p>skill saya</p>
    <ol>
        @for ($a = 0; $a < count($skill); $a++)
            <li>{{$skill[$a]}}</li>
        @endfor
    </ol>
@endsection