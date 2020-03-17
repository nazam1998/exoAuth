@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le rôle</h1>
    <form action="{{route('saveRole')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Role">Role</label>
        <input type="text" class="form-control" id="Role" name="role" value="{{old('role',$role->role)}}">
          </div>
          <button type="submit">Modifier</button>
    </form>
    </div>
@endsection