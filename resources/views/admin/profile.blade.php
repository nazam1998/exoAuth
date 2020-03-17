@extends('layouts.app')

@section('content')
    <div class="container">
    <p>name : {{$user->name}}</p>
    <p>email : {{$user->email}}</p>
    <p>password : {{$user->password}}</p>
    <p>rôle : {{App\Role::find($user->id_role)->role}}</p>
    <a href="{{route('editProfile')}}"><button class="btn btn-warning">Editer</button></a>
</div>
@endsection