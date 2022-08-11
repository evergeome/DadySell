@extends('layouts.master')

@section('content')

<div class="container text-center p-5">
    <h1>YouTube</h1>
    <p>Video Views ( {{$views}} )</p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/qeNZEmSCc58" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

@stop