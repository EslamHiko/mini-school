@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Courses</div>
                    <div class="panel-body" id="manage">
                      <ul class="form-group">
                        @foreach ($courses as $course )
                          <li class="list-group-item" style="margin:20px">

                              <form action="courseRemove" method="post" >
                                {{ csrf_field() }}
                                <span>{{$course->title}}</span>
                                <span class="pull-right clearfix">Added {{$course->created_at->diffForHumans()}}
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <button type="submit" class="btn btn-danger btn-xs" style="margin-right: 10px;">Remove</span>

                              </form>
                              <form action="editCourse/{{$course->id}}" method="get">
                                {{ csrf_field() }}

                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <button type="submit" class="btn btn-warning btn-xs">Edit</span>

                              </form>

                            </li>
                        @endforeach
                      </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
