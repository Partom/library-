<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use App\User;
use Auth;
use DB;

class bookController extends Controller
{
    public function insertBook(Request $request) 
    {
        //validating the Request
         $this->validate($request, [
            'title' => 'required|max:255',
            'authur' => 'required|max:255',
            'edition' => 'required|max:255',
            'bookFile' => 'required',
        ]);

        //storing book in book model
        $book = new Book;
        $book->title=$request->title;
        $book->authur=$request->authur;
        $book->edition=$request->edition;
        $book->number=$request->number;
        $coverName=$book->title."_cover";
        if ($request->file('cover')->isValid()) 
        {
            $ext=$request->file('cover')->getClientOriginalExtension();
        	$coverName=$coverName.'.'.$ext;
            $request->file('cover')->move('uploads/covers', $coverName);
            $book->cover=$coverName;
        }
        $fileName=$book->title.$book->id;
        if ($request->file('bookFile')->isValid()) 
        {
            $ext=$request->file('bookFile')->getClientOriginalExtension();
        	$fileName=$fileName.'.'.$ext;
            $request->file('bookFile')->move('uploads/books', $fileName);
            $book->download_path=$fileName;
        }
        $book->user_id=$request->userid;
        $book->url_slug=sha1($book->title);
        $book->save();
        return redirect('/');
	}
	public function addBook()
	{
		if (Auth::guest()) {
			return redirect('/login');
		}
		return view('addbook');
	} 
	public function showBooks()
	{
		$books = Book::all();
        return view('home',compact('books'));
		
	}
	public function showBook($url_slug)
	{
		$book=Book::where('url_slug',$url_slug)->first();
		return view('book',compact('book'));
	}
	public function download($url_slug){
		$downloadPath=Book::where('url_slug',$url_slug)->first()->download_path;
    	return redirect("uploads/books/$downloadPath");
	}
    public function profile()
    {
       $user= Auth::user();
        return view('books',compact('user'));   
    }


     public function pubprofile($id)
    {

        $user=User::where('id',$id)->first();
        if (Auth::guest())
        {
            return view('books',compact('user'));
        }
        else if ($user == Auth::user()) 
        {
            return redirect('/profile');            
        }
        else
        {
            return view('books',compact('user'));
        }   
    }
    public function follow(Request $request)
    {
            DB::table('user_user')->insert([
                ['follower_id' => "$request->follower_id",'following_id' => "$request->following_id"]
            ]);
            return back();
    }
    public function unfollow(Request $request)
    {
        $user=User::where('id',$request->following_id)->first();
        if (Auth::guest())
        {
        }
        else
        {
            DB::table('user_user')->where([['follower_id','=',$request->follower_id],['following_id', '=', $request->following_id],])->delete();
        }
        return back(); 
    }
    
    public function follower($id)
    {
        $user=User::find($id);
        
        return view('followers',compact('user'));        

    }
    public function following($id)
    {
        $user=User::find($id);
        
        return view('following',compact('user'));        
    }
}
