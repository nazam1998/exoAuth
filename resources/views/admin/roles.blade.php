@extends('layouts.app')

@section('content')
<div class="container text-center">
    @if(Auth::check()&&Auth::id()<=2)
    <table>
        <thead>
            <tr>
                <th colspan="6">Table Rôles</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Rôle</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->role}}</td>
                <td><a href="{{route('editRole',$item->id)}}"><button class="btn btn-warning">Edit</button></a></td>
                <td><a href="{{route('deleteRole',$item->id)}}"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('addRole')}}"><button class="btn btn-primary my-5">Ajouter Rôle</button></a>
    @else
    <h1 class="text-danger">Désolé, vous n'avez pas l'autorisation d'accéder à cette page
        <span class="text-danger">Veuillez vous connecter</span>
    </h1>
    @endif
</div>
@endsection
