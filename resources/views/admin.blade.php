@extends('layouts.app')

@section('content')

<div class="row container text-center mx-auto my-5">
    @if(Auth::check())
    @if(Auth::user()->id_role==1)
    <a href="{{route('user')}}" class="btn btn-primary col-3">Users</a>
    @endif
    @if (Auth::user()->id_role==1 || Auth::user()->id_role==2)
    <a href="{{route('role')}}" class="btn btn-primary col-3 mx-3">Rôles</a>
    @endif
    <a href="{{route('profile')}}" class="btn btn-primary col-3">Profile</a>
    @else
    <h1 class="text-danger">Désolé, vous n'avez pas l'autorisation d'accéder à cette page
        <h2 class="text-danger">Veuillez vous connecter</span>
    </h1>
    @endif
</div>
@endsection
