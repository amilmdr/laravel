<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageTitle;
use App\Http\Requests\PageTitleCreateValidation;
use App\Http\Requests\PageTitleUpdateValidation;
use App\Imports\PageTitleImport;
use Excel;

class PageTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
        ->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageTitle=PageTitle::paginate(3);
        return view(('pageTitle.index'),compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pageTitle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageTitleCreateValidation $request)
    {
       $pagetitle= new PageTitle();
       $pagetitle->page_titles_name=$request->input('page_titles_name');
       $pagetitle->save();
       request()->session()->flash('message','Record insert successfully');
       return redirect(route('page_titlt.index'));

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
       
        $page_Title=PageTitle::find($pages_id);
        return view(('pageTitle.edit'),compact('page_Title','pages_id'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageTitleUpdateValidation $request, $page_titles_id)
    {
        $pagetitle=PageTitle::find($page_titles_id);
        $pagetitle->page_titles_name=$request->input('page_titles_name');
        $pagetitle->update();
        request()->session()->flash('message','Name update success!!!!');
        return redirect(route('page_titlt.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pages=PageTitle::destroy($id);
        }
        catch(\Illuminate\Database\QueryException $exception){

          if(!empty($exception->getMessage())){
           request()->session()->flash('message','Row can not be delete!!!!');
           return redirect(route('page_titlt.index'));
           }


        }
        request()->session()->flash('message','Record Delete Successfully');
        return redirect(route('page_titlt.index'));
        
    }
    public function csvFileImport(){
        return view('pageTitle.csvFileImport');
    }

    public function csvFileImportSave(Request $request){
        // Excel::import(new PageTitleImport,$request->file);
        // alternative 
        $imports=new PageTitleImport;
        $imports->import($request->file);
        if($imports->failures()->isNotEmpty()){
            return back()->withFailures($imports->failures());
        }
     

       request()->session()->flash('message','record save!!!!');
       return redirect(route('page_titlt.index'));
    }
}
