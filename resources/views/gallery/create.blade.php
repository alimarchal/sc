@extends('layouts.page')
@section('page-title', 'Photo Gallery Create')
@section('breadcrumb-item','Create')




@section('body-start')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Photo Gallery</h2>
                <br>
                <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label>{{strtoupper(str_replace('_',' ', 'date/month'))}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>

                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'region'))}}</label>
                            <select class="form-control" name="region">
                                <option value="">None</option>
                                @if(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
                                    <option value="Sector HQ">Sector HQ AJK</option>
                                @endif
                                @foreach(\App\Models\User::btn_name() as $btn_name)
                                    <option value="{{$btn_name}}">{{$btn_name}}</option>
                                @endforeach
                                @foreach(\App\Models\User::region_court_case() as $region_court_case)
                                    <option value="{{$region_court_case}}">{{$region_court_case}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-3">
                            <label>{{strtoupper(str_replace('_',' ', 'Category'))}}</label>
                            <select class="form-control" name="category" required>
                                <option value="">None</option>
                                <option value="DG SCO">DG SCO</option>
                                <option value="Sector Commander">Sector Commander</option>
                                <option value="61 CSB MZD">CS 61 Signal Battalion</option>
                                <option value="64 CSB MPR">CS 64 Signal Battalion</option>
                                <option value="Events">Events</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>


                        <div class="col-12">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label>Images File</label>
                                <input class="form-control form-control-lg" name="attachments_1[]" type="file" multiple>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection


