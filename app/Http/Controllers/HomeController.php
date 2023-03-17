<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $symfony_skeleton_username = config('app.symfony_skeleton_username');
        $symfony_skeleton_password = config('app.symfony_skeleton_password');
        
        $token = $this->postApi('api/v2/token',[
            'email' => $symfony_skeleton_username,
            'password' => $symfony_skeleton_password
        ]);

        if(!empty($token) && !empty($token->token_key)){
            $data['authors'] = $this->postmanApi('api/v2/authors?orderBy=id&direction=ASC&limit=50&page=1',$token->token_key);
        }
        return view('home',$data);
    }

    public function deleteAuther(Request $request)
    {
        if(!empty($request->id)){

            $symfony_skeleton_username = config('app.symfony_skeleton_username');
            $symfony_skeleton_password = config('app.symfony_skeleton_password');
            
            $token = $this->postApi('api/v2/token',[
                'email' => $symfony_skeleton_username,
                'password' => $symfony_skeleton_password
            ]);
            $this->postmanApi('api/v2/authors/'.$request->id,$token->token_key,'DELETE');
            
            return back()->with('message', 'Auther deleted successfully.');
        }
    }

    public function viewAuther(Request $request)
    {
        if(!empty($request->id)){

            $symfony_skeleton_username = config('app.symfony_skeleton_username');
            $symfony_skeleton_password = config('app.symfony_skeleton_password');
            
            $token = $this->postApi('api/v2/token',[
                'email' => $symfony_skeleton_username,
                'password' => $symfony_skeleton_password
            ]);

            if(!empty($token) && !empty($token->token_key)){
                $data['author'] = $this->postmanApi('api/v2/authors/'.$request->id,$token->token_key,'GET');
            }
            
            return view('view',$data);
        }
    }

    public function deleteBook(Request $request)
    {
        if(!empty($request->id)){

            $symfony_skeleton_username = config('app.symfony_skeleton_username');
            $symfony_skeleton_password = config('app.symfony_skeleton_password');
            
            $token = $this->postApi('api/v2/token',[
                'email' => $symfony_skeleton_username,
                'password' => $symfony_skeleton_password
            ]);
            if(!empty($token) && !empty($token->token_key)){
                $this->postmanApi('api/v2/books/'.$request->id,$token->token_key,'DELETE');
            }
            return back()->with('message', 'Book deleted successfully.');
        }
    }

    public function addBook(Request $request)
    {

        $symfony_skeleton_username = config('app.symfony_skeleton_username');
        $symfony_skeleton_password = config('app.symfony_skeleton_password');
        
        $token = $this->postApi('api/v2/token',[
            'email' => $symfony_skeleton_username,
            'password' => $symfony_skeleton_password
        ]);

        if(!empty($token) && !empty($token->token_key)){
            $data['authors'] = $this->postmanApi('api/v2/authors?orderBy=id&direction=ASC&limit=50&page=1',$token->token_key);
        }
        return view('book',$data);
        
    }
     
    public function newbook(Request $request)
    {
        $symfony_skeleton_username = config('app.symfony_skeleton_username');
        $symfony_skeleton_password = config('app.symfony_skeleton_password');
        
        $token = $this->postApi('api/v2/token',[
            'email' => $symfony_skeleton_username,
            'password' => $symfony_skeleton_password
        ]);

        $post = $request->all();

        $postData = [
            'author' => [
                'id' => !empty($post['auther'])?$post['auther']:'0'
            ],
            'title' => !empty($post['title'])?$post['title']:'',
            'release_date' => !empty($post['release_date'])?$post['release_date']:'',
            'description' => !empty($post['description'])?$post['description']:'',
            'isbn' => !empty($post['isbn'])?$post['isbn']:'',
            'format' => !empty($post['format'])?$post['format']:'',
            'number_of_pages' => 0
        ];

        if(!empty($token) && !empty($token->token_key)){
           $response = $this->postmanPostApi('api/v2/books',$token->token_key,$postData);
           if(!empty($response->id)){
                return back()->with('message', 'Book added successfully.');
           }else{
             return back()->with('message', 'Something went wrong. Please try again.');
           }
        }
    }

    
}
