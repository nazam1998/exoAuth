@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le user</h1>
    <form action="{{route('updateProfile',Auth::id())}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            @error('name')
        <small class="text-danger">{{$message}}</small>
        @enderror
            <input type="text" class="form-control" id="name" name="name" value="{{old('user',$user->name)}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
            <input type="email" class="form-control" id="email" name="email" value="{{old('user',$user->email)}}">
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            @error('password')
        <small class="text-danger">{{$message}}</small>
        @enderror
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>
@endsection