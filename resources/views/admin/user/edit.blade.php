@extends('layouts.app')

@section('content')
<div class="container text-center">
    @if(Auth::check() && Auth::id()<2)
    <form action="{{route('updateUserRole',$user->id)}}" method="POST">
        @csrf
            <span>{{$user->name}}</span>
            <div class="form-group">
                <label for="name">Name</label>
                @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                @error('email')
            <small class="text-danger">{{$message}}</small>
            @enderror
                <input type="email" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}">
            </div>
            <div class="form-group">
                <label for="email">Password</label>
                @error('password')
            <small class="text-danger">{{$message}}</small>
            @enderror
            <input type="password" class="form-control" id="password" name="password" value="{{old('password',$user->password)}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Rôle</label>
                @error('role')
                <small>{{$message}}</small>
                @enderror
                <select class="form-control" id="exampleFormControlSelect1" name="role">
                    @foreach ($roles as $item)
                    @if($item->id==$user->id_role)
                    <option selected value="{{$item->id}}">{{$item->role}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->role}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
    @else
    <h1 class="text-danger">Désolé, vous n'avez pas l'autorisation d'accéder à cette page
        <span class="text-danger">Veuillez vous connecter avec le compte correspondant</span>
    </h1>
    @endif
</div>
@endsection
