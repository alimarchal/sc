@extends('layouts.page')
@section('page-title', 'Create User')

@section('breadcrumb-item','Create User')

@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Create New User</h2>
                <br>
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'Name'))}}</label>
                                <input type="text" name="name" required  class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <label>{{strtoupper(str_replace('_',' ', 'battalion'))}}</label>
                            <select class="form-control" name="battalion" required >
                                <option value="">None</option>
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-4">
                            <label>{{strtoupper(str_replace('_',' ', 'district'))}}</label>
                            <select class="form-control" name="district" required >
                                <option value="">None</option>
                                @foreach(\App\Models\User::district() as $dist)
                                    <option value="{{$dist}}">{{$dist}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'email'))}}</label>
                                <input type="text" name="email" class="form-control" required >
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'password'))}}</label>
                                <input type="password" name="password" required  class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'section'))}}</label>
                                <select class="form-control" name="section" required >
                                    <option value="">None</option>
                                    <option value="SCO Sec HQ">SCO Sec HQ</option>
                                    <option value="AOTR">AOTR</option>
                                    <option value="61 CSB">61 CSB</option>
                                    <option value="64 CSB">64 CSB</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'user_type'))}}</label>
                                <select class="form-control" name="user_type" required >
                                    <option value="">None</option>
                                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                        <option value="User">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Create User</button>
                    <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
                </form>

            </div>
        </div>
    </div>


@endsection


