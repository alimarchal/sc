@extends('layouts.page')
@section('page-title', 'User List')

@section('breadcrumb-item','')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">User List</h2>
                <a class="float-right btn btn-primary" href="{{route('user.create')}}">Create New User</a>
                <br>
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Designation</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\User::all() as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->designation}}</td>
                            <td><a class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('user.destroy',$user->id)}}" method="post">
                                    @csrf
                                    @method("delete")

                                    <button class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');"
                                    @if(auth()->user()->id == $user->id) disabled @endif
                                    >Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


