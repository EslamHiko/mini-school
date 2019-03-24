@extends('layouts.app')

@section('content')
  <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default panel-table">
              <div class="panel-body">
                @if (session()->has('message') && session()->get('message') == "User Has Been Removed Successfully !")
                  <p class="text-center text-danger" style="margin-top: 15px;">{{ session()->get('message') }}</p>
                @elseif (session()->has('message') && session()->get('message') == "User Isn't Admin Anymore !")
                  <p class="text-center text-warning" style="margin-top: 15px;">{{ session()->get('message') }}</p>
                @elseif (session()->has('message'))
                  <p class="text-center text-success" style="margin-top: 15px;">{{ session()->get('message') }}</p>
                @endif
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td align="center">
                            @if(!$user->admin)
                            <form class="" style="float:left; margin-left:25px;" action="users/admin" method="post">
                              {{ csrf_field() }}
                              <button type="submit" name="admin" value="{{$user->id}}" class="btn btn-default"><em class="fa fa-flag"></em></button>
                            </form>
                          @else
                            <form class="" style="float:left; margin-left:25px;" action="users/noadmin" method="post">
                              {{ csrf_field() }}
                              <button type="submit" name="admin" value="{{$user->id}}" class="btn btn-default"><em class="fa fa-flag-o"></em></button>
                            </form>
                          @endif
                            <form class="form-horizontal"  action="users/remove" method="post">
                              {{ csrf_field() }}
                              <button type="submit" name="remove" value="{{$user->id}}" class="btn btn-danger"><em class="fa fa-trash"></em></a>

                            </form>

                            </td>
                            <td class="hidden-xs">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                </table>
                {{$users->links()}}
              </div>

            </div>
          </div>
@endsection
