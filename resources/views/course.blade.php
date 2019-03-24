@extends('layouts.app')

@section('content')
  <div class="container">
	<div class="row">
		<h1>{{$playlist->snippet->title}}</h1>
        <div role="tabpanel">


            <div class="col-sm-3">
                <ul class="nav nav-pills brand-pills nav-stacked" role="tablist">
                  @php
                    $x = 0;
                  @endphp
                  @foreach ($playlistItems['results'] as $video)
                    <li role="presentation" class="brand-nav {{!$x ? 'active' : ''}}"><a href="#{{$video->snippet->resourceId->videoId}}" aria-controls="{{$video->snippet->resourceId->videoId}}" role="tab" data-toggle="tab">{{$video->snippet->title}}</a></li>
                    @php
                      $x++;
                    @endphp
                  @endforeach
                </ul>
            </div>

            <div class="col-sm-9">
                <div class="tab-content">
                  @for ($i = 0; $i < count($playlistItems['results']); $i++)
                    <div role="tabpane{{$i}}" class="tab-pane text-center {{$i == 0 ? 'active' : ''}}" id="{{$playlistItems['results'][$i]->snippet->resourceId->videoId}}" >
                        <iframe src="https://www.youtube.com/embed/{{$playlistItems['results'][$i]->snippet->resourceId->videoId}}" width="80%" height="500"></iframe>
                        @if (Auth::user()->admin)
                          <form class="text-center" action="/admin/getVideoId" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="video_id" value="{{$playlistItems['results'][$i]->snippet->resourceId->videoId}}">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Question">
                          </form>

                        @endif
                        @foreach ($questions->where('video_id' , '=', $playlistItems['results'][$i]->snippet->resourceId->videoId) as $question)
                          <h3>{{$question->question}}</h3>
                          <input type="hidden" name="" id="question_answer" value="{{$question->answer}}">
                          <input type="text" name="answer" id="answer" value="">
                          <button onclick="$(document).ready(function(){
                              if(document.getElementById('answer').value == document.getElementById('question_answer').value)
                                alert('Right !');
                              else {
                                alert('Wrong !');
                              }
                          });" class="btn btn-success" name="button">Check</button>


                        @endforeach
                        <ul class="pager">
                        @if ($i == 0)
                          <li class="previous disabled"><a href="#">Previous</a></li>
                        @else
                          <li class="previous"><a href="#{{$playlistItems['results'][$i-1]->snippet->resourceId->videoId}}" aria-controls="{{$playlistItems['results'][$i-1]->snippet->resourceId->videoId}}"  data-toggle="tab">Previous</a></li>
                        @endif
                        @if ($i == count($playlistItems['results'])- 1)
                          <li class="next disabled"><a href="#">Next</a></li>
                        @else
                          <li class="next"><a href="#{{$playlistItems['results'][$i+1]->snippet->resourceId->videoId}}" aria-controls="{{$playlistItems['results'][$i+1]->snippet->resourceId->videoId}}" data-toggle="tab">Next</a></li>
                        @endif
                        </ul>
                    </div>
                  @endfor
                </div>
            </div>

        </div>
	</div>
</div>
@endsection
