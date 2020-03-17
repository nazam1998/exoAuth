@extends('layouts.app')

@section('content')
<div class="container text-center">
    @if(Auth::check() && Auth::id()<2)
    <form action="{{route('updateUserRole',$user->id)}}" method="POST">
        @csrf
        <div class="row my-5">
            <span>{{$user->name}}</span>
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
