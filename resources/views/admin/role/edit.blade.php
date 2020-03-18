@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check()&&Auth::id()<=2)
        <h1>Modifier le rôle</h1>
    <form action="{{route('updateRole',$role->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Role">Role</label>
            @error('role')
        <small>{{$message}}</small>
            @enderror
        <input type="text" class="form-control" id="Role" name="role" value="{{old('role',$role->role)}}">
          </div>
          <button type="submit">Modifier</button>
    </form>
    @else
    <h1 class="text-danger">Désolé, vous n'avez pas l'autorisation d'accéder à cette page
        <span class="text-danger">Veuillez vous connecter avec le compte correspondant</span>
    </h1>
    @endif
    </div>
@endsection