<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Http\Requests\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $companies= Companies::paginate(10);




        return view('companies/index', ['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Company $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['logo']);
        $image = $request->file('logo');
        if(isset($image)){
            $data['logo']= $this->saveImage($image);
        } else {
            $data['logo']= null;
        }

        $company=  Companies::create($data);





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
    public function edit($id)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function saveImage(UploadedFile $image){
        $fileName = time().$image->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'images/', $image, $fileName
        );
        return 'Storage/images/'. $fileName;
    }
}
