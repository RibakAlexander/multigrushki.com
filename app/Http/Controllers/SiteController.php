<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Category;

class SiteController extends Controller
{
    //
    protected $header;
    protected $message;
    protected $sections;

    public function __construct(){
        $this->header = 'Hello World!!!';
        $this->sections = Category::getSections();
    }

    public function profile($id){
        if(!(int)$id) return redirect('/404', 301);
        $user = DB::select('select * from jg_users where user_id = ?', [$id]);

        return view('user.profile', [
            "user" => current($user),
            "sections" => $this->sections
        ]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login/');
    }

    public function login(Request $request){
        if(session('userLogin')) return redirect('/');
        if ($request->isMethod('get')) {
            return view('user.login');
        }else if($request->isMethod('post')){
            $login = $request->input('login');
            $password = $request->input('password');
            $errors = [];

            if(!$login){
                $errors['login'] = "invalid_login";
            }
            if(!$password){
                $errors['password'] = "invalid_password";
            }

            if(!$errors){
                $user = User::where('username', '=', $login)->get();
                if(!$user){
                    $errors['login'] = "invalid_login";
                }else{
                    $password = User::hashPassword($login,$password);
                    $user = User::where('username', '=', $login)
                        ->where('password', '=', $password)
                        ->get();
                    if(!$user){
                        $errors['login'] = "invalid_password";
                    }else{
                        session([
                            'userLogin' => $login,
                            'userPassword' => $password,
                            'user' => $user
                        ]);

                        return response()->json([
                            'success' => 'Success auth!'
                        ]);
                    }
                }
            }
            if($errors){
                return response()->json([
                    'error' => $errors
                ]);
            }
        }else{
            return redirect('/404');
        }
    }

    public function index(){

        $articles = Article::select(['id', 'title', 'desc'])->get();

        return view('page')->with([
            'header' => $this->header,
            'message' => $this->message,
            'articles' => $articles
        ]);
    }

    public function show($id){
        //$article = Article::find($id);

        //WHERE id = $id
        $article = Article::select(['id', 'title', 'text'])->where('id', "=", $id)->first();
        return view('article-content')->with([
            'header' => $this->header,
            'message' => $this->message,
            'article' => $article
        ]);
    }

    public function add(){
        return view('add-content')->with([
                'header' => $this->header,
                'message' => $this->message
            ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required|max:255',
            'alias' => 'required|unique:articles,alias',
            'text' => 'required'
        ]);

        $data = $request->all();

        $article = new Article;

        $article->fill($data);

        $article->save();

        return redirect('/', 301);
    }

    public function combine(){
        $start_time = microtime(true);
        $articles = Article::getArticles();
        //dd($articles);
        $html = view('combine')->with([
            'header' => $this->header,
            'message' => $this->message,
            'article' => $article
        ]);
        $end_time = microtime(true);
        // авторизация юзера
        //$password = md5(crypto($password));
        return $html;

    }

    public function registration(){
        return view('user.regNewUser');
    }
}
