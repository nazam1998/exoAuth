@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check() && Auth::id()<2)
        <h1>Ajouter un nouveau rôle</h1>
    <form action="{{route('saveRole')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Role">Role</label>
            @error('role')
        <small>{{$message}}</small>
            @enderror
            <input type="text" class="form-control" id="Role" placeholder="Membre" name="role">
            <button type="submit" class="btn btn-primary my-5">Ajouter</button>
          </div>
    </form>
    @else
    <h1 class="text-danger">Désolé, vous n'avez pas l'autorisation d'accéder à cette page
        <span class="text-danger">Veuillez vous connecter</span>
    </h1>
    @endif
    </div>
@endsection