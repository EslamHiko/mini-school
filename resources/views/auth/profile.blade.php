@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Profile</div>
                  <div class="panel-body">
                      <label class="col-md-12 " style="margin: 10px 0px 10px;">Name : {{ Auth::user()->name }}</label>
                      <label class="col-md-12 " style="margin: 10px 0px 10px;">E-Mail Address : {{ Auth::user()->email }}</label>
                      <a class="btn btn-primary btn-sm col-md-2" style="margin-top: 5px;" href="edit">Edit</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
