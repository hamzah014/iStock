<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Company;
use App\Models\User;
use App\Models\FavoriteCompany;
use App\Models\UserProfile;

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
        $profile = UserProfile::where('user_id',$id)->first();

        return view('users.profile',compact('user','profile'));

    }

    public function profileUpdate(Request $request,$id)
    {
        $request->validate([
            'name' => ['required'],
            'birthdate' => ['required']
        ]);

        //dump($request);

        $user = User::where('id',$id)->first();
        $userProfile = UserProfile::where('user_id',$id)->get();
        
        //dump($user);
        //dump(count($user));

        //update table user
        $user->name = $request->name;
        $user->save();

        $rowData = count($userProfile);

        //update user profile table

        if($rowData > 0){
    
            $profile = UserProfile::where('user_id',$id)->first();
            $profile->birthdate = $request->birthdate;
            $profile->bio = $request->bio;
    
            $profile->save();

        }else{
        
            $profile = new UserProfile([
                'user_id' => $id,
                'birthdate' => $request->birthdate,
                'bio' => $request->bio
            ]);
    
            $profile->save();

        }

        Alert::success('Profile Updated!', 'Your profile has been successfully updated.');
        return redirect()->back();

    }

    public function resetPassword(Request $request,$id)
    {
        $request->validate([
            'password' => ['required'],
            'repeat_password' => ['required']
        ]);

        //dump($request);

        $password = $request->password;
        $repeat_password = $request->repeat_password;

        if($repeat_password == $password){


            $user = User::where('id',$id)->first();
            $user->password = Hash::make($password);
            $user->save();

            Alert::success('Profile Updated!', 'Your password has been successfully updated.');
            return redirect()->back();  

        }else{
            $errors = "Password are not matched. Please try again.";
            return redirect()->back()->withErrors($errors);
        }



    }

    public function aboutus()
    {
        //get users - exclude admin
        $adminRole = "admin";
        $users = User::where('role','!=',$adminRole)->get();
        
        //get company 
        $companies = Company::all();
        
        //get sector 
        $sectors = $companies->groupBy('sector');

        return view('aboutus', compact('users','sectors','companies'));
    }
    
}
