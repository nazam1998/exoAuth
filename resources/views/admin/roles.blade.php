@extends('layouts.app')

@section('content')
<div class="container text-center">
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
</div>
@endsection
