<?php

namespace App\Http\Controllers;

use App\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(5);
        return view('company.index',compact('company'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:40',
            'email'  => 'required|string|email|max:255|unique:users',
            'website' => 'required|string|max:40',
            'logo' => 'required|mimes:png|dimensions:min_width=100,min_height=100|max:2042',
        ]);

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $file = $request['logo'];
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads', $filename);
                Company::create([
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],                   
                    'website' => $validated['website'],                   
                    'logo' => $filename,
                ]);
                return redirect('/company')->with('status','Post Sukses');
              
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.detail',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.update' ,compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        if ($request->file('logo')) {
            $validated = $request->validate([
                'nama' => 'required|string|max:40',
                'email'  => 'required|string|email|max:255|unique:users',
                'website' => 'required|string|max:40',
                'logo' => 'required|mimes:png|dimensions:min_width=100,min_height=100|max:2042',
            ]);
            $date = Carbon::now();
            $file = $request['logo'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads', $filename);
            Company::where('id',$company->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,                   
                'website' => $request->website,                
                'logo' => $filename,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect('/company')->with('status','Update Sukses');
        }
        else {            
            Company::where('id',$company->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,                   
                'website' => $request->website,   
                'logo' => $company->logo,    
                'updated_at' =>Carbon::now(),
            ]);
            return redirect('/company')->with('status','Update Sukses');
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
        Company::destroy($id);
        return redirect('/company')->with('status','Hapus Sukses');
    }
}