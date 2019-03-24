@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="css/itempage.css">
  <div class="container">


    <div class="col-md-12">

    <!--Row For Image and Short Description-->

    <div class="row">

        <div class="col-md-7 col-md-offset-">
           <img class="img-responsive" src="{{$playlist->snippet->thumbnails->maxres->url}}" alt="">

        </div>

        <div class="col-md-5">

            <div class="thumbnail">


        <div class="text-center " style="text-font: bold;">
            <h4><a href="course/{{ $course->id }}">{{ $playlist->snippet->title }}</a> </h4>
            <hr>

            <p>{{ $course->descreption }}</p>


        <form action="" style="">
            <div class="form-group">

                <a href="/course/{{$course->id}}" class="btn btn-primary " >Play</a>

            </div>
        </form>

        </div>

      </div>

      </div>


    </div><!--Row For Image and Short Description-->

    </div>

  </div>
@endsection
