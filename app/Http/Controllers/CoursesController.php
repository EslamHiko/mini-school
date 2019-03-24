<?php

namespace MiniSchool\Http\Controllers;

use Illuminate\Http\Request;
use MiniSchool\Course;
use MiniSchool\Question;
use Illuminate\Support\Facades\Validator;
use Youtube;
use DB;
use Auth;
class CoursesController extends Controller
{
    //Returning The Public Page With The Youtube Object To Get Thumbnail & Course Title
    public function index($course_id){
      $course = Course::find($course_id);
      $playlist = Youtube::getPlaylistById($course['link_id']);

      return View('coursep', compact(['course','playlist']));
    }
    // Getting All Courses
    public function courses()
    {
      $courses = Course::paginate(10);
      $playlists = array();
      foreach ($courses as $course) {
        $playlist = Youtube::getPlaylistById($course->link_id);
        array_push($playlists,$playlist);
      }
      return view('courses',compact(['playlists','courses']));
    }
    // Course Search (Get Function)
    public function search(Request $request){
      return redirect('courses/'.$request->search);
    }
    // Course Search Function
    public function coursesSearch($keyword)
    {
      $courses = Course::where("title", "LIKE" , "%$keyword%")->paginate(10);
      $playlists = array();
      foreach ($courses as $course) {
        $playlist = Youtube::getPlaylistById($course->link_id);
        array_push($playlists,$playlist);
      }
      return view('courses',compact(['playlists','courses']));
    }
    // Getting The Course Info For The Public Course Page
    public function coursePage($course_id){
      $course = Course::find($course_id);
      $playlist = Youtube::getPlaylistById($course->link_id);
      $playlistItems = Youtube::getPlaylistItemsByPlaylistId($course->link_id);
      $questions = Question::all();
      return view('course',compact(['playlist','playlistItems','questions']));
    }
}
