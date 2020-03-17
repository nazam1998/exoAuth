@extends('layouts.app')

@section('content')
<div class="container text-center">

    <table>
        <thead>
            <tr>
                <th colspan="4">Liste des users</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{App\Role::find($item->id_role)->role}}</td>
                <td><a href="{{route('editUserRole',$item->id)}}"><button class="btn btn-warning">Edit</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
