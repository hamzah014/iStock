<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Company;
use App\Models\User;
use App\Models\FavoriteCompany;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $companies = Company::all();
        $rowCount = $companies->count();

        $count = 0;
        $loop = false;

        $arrayRandom = [];

        while($loop == false){

            $count++;
            $randNumber = rand(0,$rowCount);

            if (!in_array($randNumber, $arrayRandom))
            {
                //dump($companies[$randNumber]->symbol);
                $symbol = $companies[$randNumber]->symbol;
                array_push($arrayRandom,$symbol);
            }

            if(count($arrayRandom) == 3){
                $loop = true;
            }

        }

        //dump($arrayRandom);
        //return view('home');
        return view('home', compact('arrayRandom'));
    }

    public function dashboard()
    {
        if(Auth::user()->role == 'admin'){

            //admin dashboard
            $companies = Company::all();
            $users = User::where('role','trader')->get();
    
            $sectors = $companies->groupBy('sector');
    
            return view('users.admin_dashboard',compact('companies','users','sectors'));
        }else{

            //trader dashboard
            $favoriteCompany = FavoriteCompany::where('user_id',Auth::user()->id)->with('company')->get();

            //dump($favoriteCompany);
            return view('users.dashboard', compact('favoriteCompany'));
        }
    }

    public function profile()
    {
        $id = Auth::user()->id;

        $user = User::where('id',$id)->first();

        return view('users.profile',compact('user'));

    }

    public function updateprofile($id)
    {
        $user = User::where('id',$id)->get();
        

        Alert::success('Profile Updated!', 'Your profile has been successfully updated.');
        return redirect()->back();

    }

    public function updateprofile1($id)
    {
        $user = User::where('id',$id)->get();
        

        Alert::success('Profile Updated!', 'Your profile has been successfully updated.');
        return redirect()->back();

    }
    
}
