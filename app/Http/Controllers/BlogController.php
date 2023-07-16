<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Validator;
use Auth;
use Mail;

use App\Models\Blog;

use App\Mail\BlogPostedMail;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order_col = $request->order_col;
        $dir = $request->dir;

        $page_count = 10;
        $q = $request->q;

        if (isset($order_col))
        {
            $blogs = Blog::orderBy($order_col, $dir);
        }
        else
        {
            $blogs = Blog::orderBy("created_at", "desc");            
        }

        if (isset($q)) 
        {
            $blogs = $blogs->where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'content', 'LIKE', '%' . $q . '%' )->paginate($page_count)->setPath('');
            $pagination = $blogs->appends(array( 'q' => $q ));
        }
        else
        {
            $blogs = $blogs->paginate($page_count);
        }
        return view("blogs.index", ["blogs" => $blogs, "q" => $q, "order_col" => $order_col, "dir" => $dir]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        
        return view("blogs.create", ["categories" => $categories]);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $rules = array(
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer'
        );
        
        $messages = [
            'title.required' => 'You need to type the title!',
            'content.required' => 'You need to type the content!',
            'category_id.required' => 'You need to select the category!',
            'category_id.integer' => 'You need to select the category!',
        ];

        $validator = Validator::make($params, $rules, $messages);
        if ($validator->fails()) {
            $request->merge(array('add_form_validate' => 1));
            // print_r($request->all());die('jjj');
            $input['add_form_validate'] = '1';
            return redirect()->route('blogs.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $author = Auth::User();

            $new_blog = new Blog();
            $new_blog->title = $request->title;
            $new_blog->content = $request->content;
            $new_blog->category_id = $request->category_id;
            $new_blog->author_id = $author->id;
            $new_blog->save();

            $email = $author->email;
            Mail::to($email)->send(new BlogPostedMail());

            // flash()->success('The blog has been posted successfully.');
            return redirect()->route('blogs.index');  
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        return view('blogs.show', ["blog" => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editing_blog = Blog::find($id);
        $categories = BlogCategory::all();

        return view('blogs.edit', ["blog" => $editing_blog, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $rules = array(
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer'
        );
        
        $messages = [
            'title.required' => 'You need to type the title!',
            'content.required' => 'You need to type the content!',
            'category_id.required' => 'You need to select the category!',
            'category_id.integer' => 'You need to select the category!',
        ];

        $validator = Validator::make($params, $rules, $messages);
        if ($validator->fails()) {
            $request->merge(array('add_form_validate' => 1));
            // print_r($request->all());die('jjj');
            $input['add_form_validate'] = '1';
            return redirect()->route('blogs.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $updating_blog = Blog::find($id);
            $updating_blog->title = $request->title;
            $updating_blog->content = $request->content;
            $updating_blog->category_id = $request->category_id;
            $updating_blog->save();

            // flash()->success('The blog has been posted successfully.');
            return redirect()->route('blogs.index');  
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect('/blogs');
    }


    /**
     * Seach the specified resource from storage.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function searchBlog(Request $request)
    {

        $q = $request->q;
        if ($q != "")
        {
            $blogs = Blog::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'content', 'LIKE', '%' . $q . '%' )->paginate(5)->setPath('');
            $pagination = $blogs->appends(array( 'q' => $q ));
            if (count ($blogs) > 0)
                return view ('blogs.index', ["blogs" => $blogs])->withQuery($q);
        }
        return view ( 'blogs.index' );
    }

}