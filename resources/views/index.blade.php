@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Bienvenue</h1>
        <table>
            <thead>
                <tr>
                <th colspan="2">Users</th>
            </tr>
            <tr>
                <th>Nom</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{App\Role::find($item->id_role)->role}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection