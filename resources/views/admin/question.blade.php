@extends('layouts.app')


@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Add Question</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/addQuestionToDB') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('video_id') ? ' has-error' : '' }}">
                              <label for="video_id" class="col-md-4 control-label">video_id</label>

                              <div class="col-md-6">
                                  <input id="video_id" type="text" class="form-control" name="video_id" value="@if(isset($video_id)){{ $video_id }}@endif" required autofocus>

                                  @if ($errors->has('video_id'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('video_id') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('Question') ? ' has-error' : '' }}">
                              <label for="Question" class="col-md-4 control-label">Question</label>

                              <div class="col-md-6">
                                  <input id="Question" type="text" class="form-control" name="Question" value="{{ old('Question') }}" required autofocus>

                                  @if ($errors->has('Question'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('Question') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('Answer') ? ' has-error' : '' }}">
                              <label for="Answer" class="col-md-4 control-label">Answer</label>

                              <div class="col-md-6">
                                  <input id="Answer" type="text" class="form-control" name="Answer" value="{{ old('Answer') }}" required autofocus>

                                  @if ($errors->has('Answer'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('Answer') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Add Question
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
