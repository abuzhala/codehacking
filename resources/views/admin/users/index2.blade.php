@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))

        <h3 class="bg-danger">{{session('deleted_user')}}</h3>

    @endif

    <h1>Users</h1>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Role</th>
            <th>Active</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height = "40px" src="{{$user->photo ? $user->photo->file : "/images/1489232864avatar.png"}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active==1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection