@extends('layouts.app')

@section('content')
<div class="container text-center">
    @if(Auth::check() && Auth::id()<2)
    <form action="{{route('saveUserRole')}}" method="POST">
        @csrf
        <h1>Ajout d'un nouveau user</h1>

            <div class="form-group">
                <label for="name">Name</label>
                @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                @error('email')
            <small class="text-danger">{{$message}}</small>
            @enderror
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="email">Password</label>
                @error('password')
            <small class="text-danger">{{$message}}</small>
            @enderror
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @if(Auth::user()->id_role==1)
            <div class="form-group">
                <label for="exampleFormControlSelect1">Rôle</label>
                @error('role')
                <small>{{$message}}</small>
                @enderror
                <select class="form-control" id="exampleFormControlSelect1" name="role">
                    @foreach ($roles as $item)
                    
                    <option value="{{$item->id}}">{{$item->role}}</option>
                    
                    @endforeach
                </select>
            </div>
            @endif
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
    @else
    <h1 class="text-danger">Désolé, vous n'avez pas l'autorisation d'accéder à cette page
        <span class="text-danger">Veuillez vous connecter avec le compte correspondant</span>
    </h1>
    @endif
</div>
@endsection
