@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                    <div class="container mx-auto">
                        <li class="mx-auto my-3">Name : {{$user->name}}</li>
                        <li class="mx-auto my-3">Email : {{$user->email}}</li>
                        <li class="mx-auto my-3">Rôle : {{App\Role::find($user->id_role)->role}}</li>
                        <a href="{{route('editProfile')}}"><button class="btn btn-warning">Editer</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
