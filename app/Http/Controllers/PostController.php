<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Post;

use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    
    public function __construct()
    {
        
        
    }


    public function check_access($user_id, $role_id){

        $query = "SELECT * FROM adminpermission where userid='$user_id' AND roleid='$role_id'";
        $result = DB::select($query);

        if($result){
            return true;
        }

        return false;
    }

    public function page1(){

        if(!self::check_access('1', '1')){
            return "Premission denied";
        }

        return view('page1');
    }


    public function page2(){

        if(!self::check_access('3', '2')){
            return "Premission denied";
        }

        return view('page2');
    }


//    public function page2($id)
//    {
//        $post=Post::where('id',$id)->first();
//        return view('page2');
//    }
//    public function page3($id)
//    {
       
//        return view('page3');
//    }









//     public function addPost()
//     {
//         return view('add-post');
//     }
//     public function createPost(Request $request)
//     {
//         $post=new Post;
//         $post->title=$request->title;
//         $post->body=$request->body;
//         $post->save();
//         return back()->with('post_created','Post has been successfully Created!');
//     }
//     public function getPost()
//     {
//         $posts=POST::orderby('id','DESC')->get();
//         return view('posts',compact('posts'));
//     }
//    public function getPostById($id)
//    {
//        $post=Post::where('id',$id)->first();
//        return view('single-post',compact('post'));
//    }
//    public function deletePost($id)
//    {
//        Post::where('id',$id)->delete();
//        return back()->with('post_deleted','Post has been successfully Deleted!');
//    }
//    public function showeditPost($id)
//    {
//        $post=Post::find($id);
//        return view('edit-post',compact('post'));
//    }
//    public function updatePost(Request $request)
//    {
//        $post=Post::find($request->id);
//        $post->title=$request->title;
//        $post->body=$request->body;
//        $post->save();
//        return back()->with('post_updated','Post Has been Successfully Updated!');
//    }
//    function logout()
//  {
//      if(session()->has('LoggedUser'))
//      {
//          session()->pull('LoggedUser');
//          return redirect('/authentication/login');
//      }
//  }
}
