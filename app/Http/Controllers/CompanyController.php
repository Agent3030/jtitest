<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Http\Requests\Company;
use App\Traits\FileUploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class CompanyController extends Controller
{
    use FileUploadTrait;
    protected  $mail;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Mailer $mail)
    {
        $this->mail= $mail;
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
        $this->mail->send('emails/NewCompany', ['company'=> $company], function($m) use($company){
            $m->to($company-> email);
        });

        return redirect()->action('CompanyController@index');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Companies::findOrFail($id);

        return view('companies/show',['company'=> $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \  Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company= Companies::findOrFail($id);
        return view('companies/create',['id'=>$id, 'company'=> $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $request, $id)
    {
        $data = $request->all();
        $company = Companies::findOrFail($id);
        if (isset($data['logo'])) {
            $data['logo'] = $this->updateImage($data['logo'], $company->getLogo());
        }
        $company->update($data);
        return redirect()->action('CompanyController@index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Companies::findOrFail($id);
        $this->deleteImage($company->getLogo());
        $company->delete();

        return redirect()->action('CompanyController@index');
    }




}
