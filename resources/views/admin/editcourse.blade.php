@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Course</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/editCourse') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $course->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Playlist Link</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="link" value="{{ $course->link }}" required autofocus>

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descreption') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Descreption</label>

                            <div class="col-md-6">
                                <textarea placeholder="Descreption...." id="descreption" class="form-control" name="descreption" value="{{ $course->descreption }}" required autofocus></textarea>

                                @if ($errors->has('descreption'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descreption') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Course
                                </button>
                                @if (session()->has('message'))
                                  <p class="text-center text-success" style="margin-top: 15px;">{{ session()->get('message') }}</p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
