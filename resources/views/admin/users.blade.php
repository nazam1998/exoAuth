@extends('layouts.app')

@section('content')
<div class="container text-center">
    @if(Auth::check()&&Auth::user()->id_role<=2) <table>
        <thead>
            <tr>
                <th colspan="5">Liste des users</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Rôle</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            @if(Auth::id()!=$item->id)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{App\Role::find($item->id_role)->role}}</td>
                @if((Auth::user()->id_role<=2 && $item->id_role>Auth::user()->id_role))
                <td><a href="{{route('editUserRole',$item->id)}}"><button class="btn btn-warning">Edit</button></a></td>
                <td><a href="{{route('deleteUserRole',$item->id)}}"><button class="btn btn-danger">Supprimer</button></a></td>
                @else
                <td><span class="text-danger">You can't access this user</span></td>
                @endif
            </tr>
            @endif
            @endforeach
        </tbody>
        </table>
    <a href="{{route('addUserRole')}}" class="my-5"><button class="btn btn-primary">Ajouter User</button></a>
        @else
        <h1 class="text-danger">Désolé, vous n'avez pas l'autorisation d'accéder à cette page
            <span class="text-danger">Veuillez vous connecter avec le compte admin</span>
        </h1>
        @endif
</div>
@endsection
