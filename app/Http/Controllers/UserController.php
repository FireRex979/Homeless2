<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Mail;
use App\Mail\MailtoAdmin;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Crypt;
use Auth;
use File;
use Laravel\Socialite\Facades\Socialite;
class UserController extends Controller
{

    public function index(){
        
    	return view('user.home');

    }

    public function register(Request $request){

    	$cek = DB::table('users')->where('email', '=', $request->email)->select('users.*')->first();
    	
    	if(isset($cek->id) && ctype_alpha(str_replace(' ', '', $request->name)) === false){
    		return response()->json(['notif'=>'eror-name-email']);
    	}else if(ctype_alpha(str_replace(' ', '', $request->name)) === false){
    		return response()->json(['notif'=>'eror-name']);
    	}else if(isset($cek->id)){
            return response()->json(['notif'=>'eror-email']);
    	}else if(is_null($cek)){
    		$user = new User;
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->password = Hash::make($request->password);
    		$user->role = $request->role;
    		$user->profile_image = "profile.png";
    		$user->save();
    		Mail::to($request->email)->send(new MailtoAdmin($user));
    		return response()->json(['notif'=>'success', 'id'=>$user->id]);
    	}

    }

    public function verify($id, $time, $token){
        if ((Crypt::decrypt($token)=='verify') && (Crypt::decrypt($time) > date('YmdHis'))) {
            $user = User::find($id);
            $user->email_verified_at = NOW();
            $user->save();
            return redirect('/home');
        }
        
    }

    public function resendEmailVerify($id){
        $user = User::find($id);
        if (is_null($user->email_verified_at)) {
            Mail::to($user->email)->send(new MailtoAdmin($user));
            return response()->json(['notif'=>'belum verify']);
        }
        else{
            return response()->json(['notif'=>'sudah verify']);
        }
    }

    public function login(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if($user->email_verified_at == NULL){
            return response()->json(['notif'=>'need verified']);
        }else{
            if (Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
                session()->regenerate();
                return response()->json(['notif'=>'success', 'name'=>Auth::user()->name, 'profile_image'=> Auth::user()->profile_image, 'id'=>Auth::user()->id, 'token'=>csrf_token()], 200);
            }else{
                return response()->json(['notif'=>'failed']);
            }
        }
        
    }

    public function logout(){
        Auth::guard('web')->logout();
        session()->regenerate();
        return response()->json(['token'=>csrf_token()], 200);
    }

    public function profile($id){
        $user = User::find($id);
        $route = 'profile';
        return view('user.profile', compact('user', 'route'));
    }

    public function editProfile(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_tlp = $request->no_tlp;
        $user->address = $request->address;
        $user->save();
        return response()->json(['user'=>$user]);
    }

    public function imageProfile(Request $request, $id){
        if ($request->ajax()) {
            $data = $request->file('file');
            $extension = $data->getClientOriginalName();
            $filename = time()."_".$extension;
            $path = public_path('/images/user/');
            $upload_success = $data->move($path, $filename);
            $user = User::find($id);
            $user->profile_image = $filename;
            $user->save();
        }
    }

    public function changePassword(Request $request, $id){
        $user = User::find($id);
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
            return response()->json(['notif'=>'success']);
        }else{
            return response()->json(['notif'=>'failed']);
        }
    }

    public function getCodeResetPassword(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if (isset($user)) {
            $code = mt_rand(100000, 999999);
            $otp = array('code'=>$code);
            Mail::to($user->email)->send(new ResetPassword($otp));
            return response()->json(['notif'=>'success', 'otp'=>$otp, 'id'=>$user->id]);    
        }else{
            return response()->json(['notif'=>'failed']);
        }  
    }

    public function forgetPassword(Request $request, $id){
        $user = User::find($id);
        $user->password = Hash::make($request->newpassword);
        $user->save();
        return response()->json(['notif'=>'success']);
    }

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/home');
            } else {
                $newUser = User::create(['name' => $user->name, 'email' => $user->email, 'facebook_id' => $user->id, 'profile_image' => 'profile.png', 'role' => 'user']);
                Auth::login($newUser);
                return redirect('/home');
            }
        }
        catch(Exception $e) {
            return redirect('/auth/facebook');
        }
    }
}
