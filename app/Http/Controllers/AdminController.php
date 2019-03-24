<?php

namespace MiniSchool\Http\Controllers;

use Illuminate\Http\Request;
use MiniSchool\Course;
use Illuminate\Support\Facades\Validator;
use MiniSchool\User;
use MiniSchool\Question;
use DB;
class AdminController extends Controller
{
    // As No One Can Access These Functions But The Admin
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    // Go To The Dashboard
    public function index(){
      return View('admin.index');
    }
    //Add Course Function
    public function addCourse(Request $request){
      $validator = Validator::make($request->all(), [
          'title' => 'required|max:255',
          'link' => 'required|max:255|unique:courses',
      ]);
      if ($validator->fails()) {
        return redirect('addCoursesPage')
                        ->withErrors($validator)
                        ->withInput();
      }
      $linkId = explode('=', $request['link']);

      Course::create([
          'title' => $request['title'],
          'link_id' => $linkId[1],
          'link' => $request['link'],
          'descreption' => $request['descreption'],
      ]);
      return View('admin.addcourse')->withSuccess("Course Added Successfully");
    }
    //Add Course Page (Get Request)
    public function addCoursesPage(){
      return View('admin.addcourse');
    }
    //Edit Course Page (Get Request)
    public function editPage($course_id){
      $course = Course::find($course_id);
      return View('admin.editcourse',compact('course'));
    }
    // Edit Course Function
    public function editCourse(Request $request){
      $linkId = explode('=', $request['link']);
      $validator = Validator::make($request->all(), [
          'title' => 'required|max:255',
          'link' => 'required|max:255|unique:courses',
      ]);
      if ($validator->fails()) {
        return redirect('admin/editCourse/'.$request->course_id)
                        ->withErrors($validator)
                        ->withInput();
      }

      DB::table('courses')->where('id' , '=', $request->course_id)
                          ->update([
                            'title' => $request->title,
                            'link_id' => $linkId[1],
                            'link' => $request->link,
                            'descreption' => $request->descreption,
                          ]);
      return redirect('admin/editCourse/'.$request->course_id)
                      ->with("message", "Course Was Modified Successfully !");


    }
    // Get All Courses For The Admin To Manage
    public function courses(){
      $courses = Course::all();
      return View('admin.courses',compact('courses'));
    }
    // Remove Course Function
    public function courseRemove(Request $request){
      DB::table('courses')->where('id' ,'=' ,$request->course_id)->delete();
      $courses = Course::all();
      return View('admin.courses',compact('courses'));
    }
    // Get All Users For The Admin To Manage
    public function users(){
      $users = User::paginate(10);
      return View('admin.users', compact('users'));
    }
    // Upgrade User To Admin Function
    public function makeAdmin(Request $request){
      DB::table('users')->where('id', '=', $request->admin)
                        ->update([
                          'admin' => '1'
                        ]);
      return redirect('admin/users')->with("message", "User Is Admin Now !");
    }
    // Downgrade Admin To User Function
    public function removeAdmin(Request $request){
      DB::table('users')->where('id', '=', $request->admin)
                        ->update([
                          'admin' => '0'
                        ]);
      return redirect('admin/users')->with("message", "User Isn't Admin Anymore !");

    }
    // Remove User Function
    public function removeUser(Request $request){
      DB::table('users')->where('id', '=', $request->remove)
                        ->delete();
      return redirect('admin/users')->with("message", "User Has Been Removed Successfully !");

    }
    // Add Question Page (Get Request)
    public function addQuestionGet(){

      return View('admin.question');
    }
    // A Function Just To Get video_id
    public function getVideoId(Request $request){
      $video_id = $request->video_id;
      return View('admin.question', compact('video_id'));
    }
    // Add Question To The DB Function
    public function addQuestionToDB(Request $request){
      $validator = Validator::make($request->all(), [
          'video_id' => 'required|max:255|unique:courses',
      ]);
      if ($validator->fails()) {
        return redirect('admin/addQuestion')
                        ->withErrors($validator)
                        ->withInput();
      }
      Question::create([
            'video_id' => $request['video_id'],
            'question' => $request['Question'],
            'answer' => $request['Answer']
      ]);
      return redirect('admin/addQuestion')->with("message", "Questoin Added Successfully !");
    }
}
