@extends('layouts.page')
@section('page-title', 'Events')
@section('custom-header')
    <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>
@endsection
@section('breadcrumb-item','')
@section('body-start')
    <div class="row">
        <div class="col-12">


            <div class="invoice p-3 mb-3 rounded">
                <h2 class="text-center">Events</h2>


                <div class="row">
                    <div class="col-12">

                        @foreach($collection as $g)
                            @php
                                $attachment = explode(',',$g->attachments);
                            @endphp
                            <div class="gallery">
                                <a target="_blank" href="{{route('gallery.show',$g->id)}}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($attachment[0])}}" alt="Cinque Terre" width="600" height="400">
                                </a>
                                <div class="desc">
                                    <span class="font-weight-bold">BTN: {{$g->btn}}</span><br>
                                    <span class="font-weight-bold">Company: {{$g->company}}</span><br>
                                    <span class="font-weight-bold">Title: {{$g->title}}</span><br>
                                    <p> {{$g->description}}</p>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>


                </div>
            </div>
        </div>
@endsection


