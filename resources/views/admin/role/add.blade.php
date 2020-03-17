@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un nouveau rôle</h1>
    <form action="{{route('editRole',$role->id)}}" method="POST">
        <div class="form-group">
            <label for="Role">Role</label>
            @error('role')
        <small>{{$message}}</small>
            @enderror
            <input type="text" class="form-control" id="Role" placeholder="Password" name="role">
            <button type="submit">Ajouter</button>
          </div>
    </form>
    </div>
@endsection