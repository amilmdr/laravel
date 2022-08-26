<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PageCreateValidation;
use App\Http\Requests\PageUpdateValidation;
use Illuminate\Pagination\Paginator;
use App\Models\PageTitle;

class PageController extends Controller
{ private $uploadpath;
    private $thumbpath;
    private $width;
    private $height;
    public function __construct()
    {
        $this->middleware('auth')
        ->except('logout');


        $this->uploadpath = public_path("/images");
        $this->thumbpath = public_path("/images/thumb");
        $this->width = 200;
        $this->height = 200;

        if(!File::exists($this->uploadpath)) {
            File::makeDirectory($this->uploadpath, 0777, true, true);
        }

        if(!File::exists($this->thumbpath)) {
            File::makeDirectory($this->thumbpath, 0777, true, true);
        }
    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pages=Page::paginate(3);
     $pages=Page::join('page_titles','pages.pages_pageTitle','=','page_titles.page_titles_id')->paginate(3);
        return view(('page.index'),compact('pages'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $pages=PageTitle::all();
        return view(('page.create'),compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageCreateValidation $request)
    {
        // $path = public_path('/images');

        // if(!(File::isDirectory($path))){
        //     File::makeDirectory($path, 0777, true, true);
        // }

        if($request->hasfile('pages_image'))
        {
            $pages_image = $request->file('pages_image');
            $filename = time() . "." . $pages_image->getClientOriginalExtension();
            $pages_image->move($this->uploadpath, $filename);
            $resize_image = Image::make( $this->uploadpath.'/'.$filename);
            // dd($resize_image);
            $resize_image->resize($this->width,$this->height)->save( $this->thumbpath.'/' .$filename);
            // dd($pages_image);
                // dd($request);
        $page= new Page();
        $page->pages_title=$request->input('pages_title');
        $page->pages_slug=$request->input('pages_slug');
        $page->pages_description=$request->input('pages_description');
        $page->pages_pageTitle=$request->input('pages_pageTitle');
        $page->pages_image=$filename;
        $page->save();
        request()->session()->flash('message','Record Install Successfully',array('timeout' => 1));
        return redirect(route('page.index'));
        }
        else{
            request()->session()->flash('message','File Not Found',array('timeout' => 1));
            dd($error);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pages_id)
    {
        //  dd($pages_id);
        $pages=Page::find($pages_id);
        $pages_pageTitle = PageTitle::pluck('page_titles_name', 'page_titles_id')->all();
        return view(('page.edit'),compact('pages','pages_id','pages_pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageCreateValidation $request, $pages_id)
    {
        
         $image_path = public_path('/images');

         if(!(File::isDirectory($image_path))){
             File::makeDirectory($image_path, 0777, true, true);
         }
 
         if($request->hasfile('pages_image'))
         {
            $page=Page::find($pages_id);
            $image=$page->pages_image;
             File::delete($image_path.'/'. $image);
             $pages_image = $request->file('pages_image');
             $filename = time() . "." . $pages_image->getClientOriginalExtension();
             $pages_image->move($image_path, $filename);
             $page->pages_title=$request->input('pages_title');
             $page->pages_slug=$request->input('pages_slug');
             $page->pages_description=$request->input('pages_description');
             $page->pages_pageTitle=$request->input('pages_pageTitle');
             $page->pages_image=$filename;
             $page->update();
             request()->session()->flash('message','Record Updated Successfully',array('timeout' => 1));
             return redirect(route('page.index'));
         }
         else{
            $pages = Page::findOrFail($pages_id);
            $image=$pages->pages_image;
            $page=Page::find($pages_id);
             $page->pages_title=$request->input('pages_title');
             $page->pages_slug=$request->input('pages_slug');
             $page->pages_description=$request->input('pages_description');
             $page->pages_pageTitle=$request->input('pages_pageTitle');
             $page->pages_image=$image;
             $page->update();
             request()->session()->flash('message','Record Updated Successfully',array('timeout' => 1));
             return redirect(route('page.index'));
             


         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pages_id)
 
    {
        $pages = Page::findOrFail($pages_id);
        $image_path = public_path('images');
        $image =$pages->pages_image;

      
    
        if (File::exists($image_path)) {
            File::delete($image_path.'/'. $image);

        }
        $pages=Page::destroy($pages_id);
        request()->session()->flash('message','Record Delete Successfully');
        return redirect(route('page.index'));
    
    }
    public function dashboardindex(){
        return view('Dashboard.dashboard');
    }
}
