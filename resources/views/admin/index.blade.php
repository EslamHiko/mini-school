@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- It can be fixed with bootstrap affix http://getbootstrap.com/javascript/#affix-->
            <div id="sidebar" class="well sidebar-nav">
                <h5><i class=""></i>
                    <b>Courses</b>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="admin/addCoursesPage">Add</a></li>
                    <li><a href="admin/courses">List</a></li>
                </ul>
                <h5><i class=""></i>
                    <b>Users</b>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="admin/users">List</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Content Here -->
            <div class="jumbotron text-center">
              <h1>Welcome To <span class="green">Dashboard</span></h1>
              <p> Here You Can Manage Courses & users </p>
              
            </div>
        </div>
    </div>
</div>

@endsection
