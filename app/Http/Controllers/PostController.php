<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    function __construct() {
        $this->middleware('verified');
    }
    function index(){
        $posts = Post::all();
        return view('home', ['posts' => $posts]);
    }
    
    
    function show(Post $post){
         
        return view('posts.show', ['post' => $post,
        ]);
    }
    
    function view(){
         $post = Upload::all();
        return view('uploads.view', ['post' => $post, 'storage' => $storage
        ]);
    }
    function create(){
        
        return view('posts.create');
    }
    function store(Request $request){
        
        
        
         if($request->hasFile('file') && $request->file('file')->isValid()) {
            
            $file = $request->file('file'); // $request->file
            $path = $file->getRealPath();
            $fileContent = file_get_contents($path);
            $upload = new Post();
            $upload->title = $request->title;
            $upload->message = $request->message;
            $upload->tipoid = $request->type;
            $upload->file = base64_encode($fileContent);
            $upload->userid = Auth::user()->id;
            
            $upload->save();
            
           
            
              
            if($request->hasFile('uploads') && $request->file('uploads')->isValid()) {
            
            $extraposts = new Upload();
            $extrafile = $request->uploads;
            $extrapath = $extrafile->getRealPath();
            $newfileContent = file_get_contents($extrapath);
            
            $extraposts->file = $request->uploads;
            $extraposts->userid = $upload->userid;
            $extraposts->postid = $upload->id;
            
            $date = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('YmdHis');
            $name = $date . '.' . $extraposts->file->getClientOriginalExtension();
           
            
           
            
            $extraposts->file->storeAs('public/postpics', $name);
            $extraposts->save();
                
            }
         }
         
        
                // $this->saveInDB($file, $newname);
            
            
            // $file->storeAs('storage/images', $newname);
             
          //$file->move($target, $newname );
        
        return back();
    }
    public function edit(Post $post)
    {
        if($post->userid == Auth::id()) {
            return view('posts.edit', ['post' => $post]);
        } else {
            return back();
        }
    }
    function upload(Request $request){
        if($request->hasFile('file') && $request->file('file')->isValid()) {
           
            $file = $request->file('file'); // $request->file
            $target = 'subidas/';
            
            $result = DB::select('SELECT id FROM upload ORDER BY ID DESC LIMIT 1');
            if(!empty($result)) {
                $newname = $result[0]->id+1 . '.' . $file->extension();
                $this->saveInDB($file, $newname);}
            else {
                $newname = '1' . '.' . $file->extension();
            }
            
            $file->storeAs('storage/images', $newname);
             
          //$file->move($target, $newname );
        }
        return back();
    }
    function saveInDB($file, $newname){
        $upload = new Post();
       
        
        $path = $file->getRealPath();
        $fileContent = file_get_contents($path);
        // $img = Image::make($fileContent)->resize(64, null, function ($constraint) {
        //     $constraint->aspectRatio();
        //     });
        // $img->encode($file->extension());
        
        // $upload->file = base64_encode($img);
        $upload->file = base64_encode($fileContent);
        
        $date = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('YmdHis');
        $name = $date . $file->getClientOriginalName();
        $upload->name = $newname;
        
        $upload->originalname = $name;
        $upload->save();
        
    }
    
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->message = $request->message;
        $post->updated_at = \Carbon\Carbon::now();
        if($request->hasFile('file') && $request->file('file')->isValid()) {
         $file = $request->file('file');
         $path = $file->getRealPath();
         $image = file_get_contents($path);
         $post->file = base64_encode($image);
        }
        
        
        
        if($request->has('uploads')) {
            foreach($request->uploads as $photo) {
                $image = new Upload();
                $image->saveInStorage($photo, $review->id);
            }
        }
        
        try {
            $post->update();
            return redirect('post/' . $post->id);
        } catch(\Exception) {
            return back()->withInput();
        }
    }

    function updateInDB($file, $name){
        $upload = new Upload();
        $path = $file->getRealPath();
        $fileContent = file_get_contents($path);
        $upload->file = base64_encode($fileContent);
        $upload->originalname = $name;
        $upload->update();
        
    }
    
    
    
    function imagestore(Request $request){
        
        
        if($request->hasFile('file') && $request->file('file')->isValid()) {
           
            $file = $request->file('file'); // $request->file
            $date = Carbon::parse(Carbon::now())->format('YmdHis');
            $name = $date . $file->getClientOriginalName();
           
            
           
            
            $file->storeAs('public/images', $name);
            
            $this->saveInDB($file);
            
           
        }
        return back();
    }
    function thumbnail(Request $request) {
        if($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();

            $filenametostore = 'original.' . $extension;
            $smallthumbnail = 'small_original.' . $extension;

            $request->file('file')->storeAs('public/profile_images', $filenametostore);
            $request->file('file')->storeAs('public/profile_images', $smallthumbnail);
            $request->file('file')->storeAs('profile_images', $filenametostore);

            $smallthumbnailpath = public_path('storage/profile_images/' . $smallthumbnail);
            $this->createThumbnail($smallthumbnailpath, 64, null);

            return view('thumbnail', ['file' => $filenametostore, 'thumbnail' => $smallthumbnail]);
        }
    }
    
    public function destroy(Post $post) {
    $post->delete();
        
        return redirect('home')->with('message', 'yas');
    }
}
