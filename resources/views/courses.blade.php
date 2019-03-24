@extends('layouts.app')

@section('content')


  <div class="container">
    <div class="row" style="margin-bottom:15px;">
             <div id="custom-search-input">
                              <form class="input-group col-md-12" action="/courses/search" method="post">
                                {{ csrf_field() }}
                                  <input type="text" class="  search-query form-control" placeholder="Search" name="search" />
                                  <span class="input-group-btn">
                                      <button class="btn btn-primary" type="submit">
                                          <span class=" fa fa-search"></span>
                                      </button>
                                  </span>
                              </form>
                          </div>
  	</div>
  @for ($i = 0; $i < count($courses); $i++)
    <div id="products" class="row list-group">
        <div class="item  col-xs-4 col-lg-4 list-group-item">
            <div class="thumbnail">
                <a href="/coursep/{{$courses[$i]->id}}"><img class="group list-group-image" src="{{$playlists[$i]->snippet->thumbnails->medium->url}}" alt="" /></a>
                <div class="caption">
                    <a href="/coursep/{{$courses[$i]->id}}" class="group inner list-group-item-heading"><h3>{{$playlists[$i]->snippet->title}}</h3></a>
                    <p class="group inner list-group-item-text">
                      {{$playlists[$i]->snippet->description}}  </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                </p>
                        </div>
                        <div class="col-xs-12 col-md-6">


                            <a style="submit" class="btn btn-primary" href="course/{{$courses[$i]->id}}">Play</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{$courses->links()}}
    @endfor
    </div>
</div>

@endsection
