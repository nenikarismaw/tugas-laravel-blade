@extends('layout.master')
@section('content')
<div class="ml-3 mt-3"> 
    <h2>{{$questions->judul}}</h2>
    <p>{{$questions->isi}}</p>
</div>
@endsection