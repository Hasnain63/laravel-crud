<?php

namespace App\Http\Controllers;

use App\Article;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function show()
    {
        // With Query bilder
        // $articles = DB::table('articles')->orderBy('id', 'DESC')->get();
        // return View('list')->with(compact('articles'));

        // with Elocant

        $articles = article::orderBy('id', 'DESC')->get()->all();
        return View('list')->with(compact('articles'));
        // echo "hello";
    }
    public function addArticle()
    {
        return view('add');
    }
    public function saveArticle(Request $request)
    {
       // this line og code store image but with out name save by path
        // $path = $request->file('image')->store('public/image');
        $image=$request->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAS('/public/image',$file);


        $validator = validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'author' => 'required|max:100',

        ]);

        if ($validator->fails()) {
            // error
            return redirect('addArticle')->withErrors($validator)->withInput();
        }
 
         else {
            // data sve in db
           
            $article = new Article;
            $article->title = $request->title;
            $article->description = $request->description;
            $article->image = $file;
            $article->author = $request->author;
            $article->save();
            $request->Session()->flash('msg', 'Article Added Successfully!');
            return redirect('articles');
        }
        // dd($request->all());
    }
    public function editArticle($id, Request $request)
    {
        $article = article::where('id', $id)->first();
        if (!$article) {
            $request->Session()->flash('errormsg', 'Article Record Not Found!');
            return redirect('articles');
        }
        return view('edit')->with(compact('article'));
    }
    public function updateArticle($id, Request $request)
    {
        $validator = validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:100',

        ]);
        if ($validator->fails()) {
            // error
            return redirect('article/edit/' . $id)->withErrors($validator)->withInput();
        }
 if($request->hasfile('image')){
// this line og code store image but with out name save by path
        // $path = $request->file('image')->store('public/image');
        $image=$request->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAS('/public/image',$file);
// data sve in db
            $article =  Article::find($id);
            $article->title = $request->title;
            $article->description = $request->description;
            $article->author = $request->author;
            $article->image = $file;
            $article->save();
            $request->Session()->flash('msg', 'Article updated Successfully!');
            return redirect('articles');
        }

         else {
            // data sve in db
            $article =  Article::find($id);
            $article->title = $request->title;
            $article->description = $request->description;
            $article->author = $request->author;
           
            $article->save();
            $request->Session()->flash('msg', 'Article updated Successfully!');
            return redirect('articles');
        }


    }
    public function deleteArticle($id, Request $request)
    {
        $article = article::where('id', $id)->first();
        if (!$article) {
            $request->Session()->flash('errormsg', 'Article Record Not Found!');
            return redirect('articles');
        }
        article::where('id', $id)->delete();
        $request->Session()->flash('errormsg', 'Record has been deleted successfully!');
        return redirect('articles');
    }
}