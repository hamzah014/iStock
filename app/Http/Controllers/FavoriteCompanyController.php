<?php

namespace App\Http\Controllers;

use App\Models\FavoriteCompany;
use Illuminate\Http\Request;

class FavoriteCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        //dump($request->get('user_id'));
        // $user_id = $request->get('user_id');
        // $company_id = $request->get('company_id');

        // $favoriteCompany = new FavoriteCompany;
    
        // $favoriteCompany->user_id = $user_id;
        // $favoriteCompany->company_id = $company_id;
    
        // $favoriteCompany->save();

        //return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavoriteCompany  $favoriteCompany
     * @return \Illuminate\Http\Response
     */
    public function show(FavoriteCompany $favoriteCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavoriteCompany  $favoriteCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoriteCompany $favoriteCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FavoriteCompany  $favoriteCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavoriteCompany $favoriteCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavoriteCompany  $favoriteCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(FavoriteCompany $favoriteCompany)
    {
        //
    }

    
    public function saveFavorite(Request $request, $id)
    {
        $user_id = $request->get('user_id');
        $company_id = $request->get('company_id');
        $id = 0;

        $fCompany = FavoriteCompany::where('user_id',$user_id)->where('company_id',$company_id)->get();

        $codes = 0;

        if(count($fCompany) > 0){
            
            foreach ($fCompany as $fc) {
            
                $id = $fc->id;
            
            }
            
            $favCom = FavoriteCompany::find($id);
            $favCom->delete();

        }else{


            $favCompany = new FavoriteCompany;
    
            $favCompany->user_id = $user_id;
            $favCompany->company_id = $company_id;
            $favCompany->status = 'active';
    
            $favCompany->save();

            $codes = 1;

        }

        return $codes;

    }

    

}
