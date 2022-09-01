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
                                <input type="text" name="name" required class="form-control">
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'Username'))}}</label>
                                <input type="text" name="username" required class="form-control">
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'password'))}}</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                        </div>


                        @livewire('designation')


                    </div>

                    <button type="submit" class="btn btn-danger">Create User</button>
                    <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
                </form>

            </div>
        </div>
    </div>


@endsection


