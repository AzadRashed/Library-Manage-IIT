<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user_profile=User::where('id',auth()->user()->id)->get();
        $research_supervisions = auth()->user()->researchSupervisions()->get();
        $teachings = auth()->user()->Teaching()->get();
        return view('frontend.profile.index',compact('user_profile', 'research_supervisions','teachings'));
    }
    public function adminIndex()
    {
        $user_profile=User::where('id',auth()->user()->id)->get();
        return view('admin.profile.index',compact('user_profile'));
    }


    public function updateProfile(Request $request)
    {
         $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'mobile' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|string',
            'twiter_url' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $user = Auth::user();

        if($file=$request->file('image')){
        $filename=date('dmY').time().'.'.$file->getClientOriginalExtension();
        $file->move(storage_path('app/public/profiles'),$filename);
    }


             $user->name = $request->input('name');


            $profile = $user->profile;
            $profile->mobile = $request->input('mobile');
            $profile->address = $request->input('address');
            $profile->description = $request->input('description');
            $profile->facebook_url = $request->input('facebook_url');
            $profile->twiter_url = $request->input('twiter_url');
            $profile->linkedin_url = $request->input('linkedin_url');
            $profile->profession = $request->input('profession');
            $profile->image = $filename ?? $user->profile->image;

            $user->save();
            $profile->save();
               return redirect()->back()->withMessage('profile updated successfully')->withType('success');

    }

    public function changePassword(Request $request)
    {
          $request->validate([
    'password' => 'required|string|min:8',
    'newpassword' => [
        'required',
        'string',
        'min:8',
        'confirmed',
        'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
    ],
    'newpassword_confirmation' => 'required|string|min:8|same:newpassword',
], [
    'newpassword.regex' => 'The password must contain uppercase lowercase letter,number, and special character.',
]);


           $user = Auth::user();
        $currentPassword = $request->input('password');
        $newPassword = $request->input('newpassword');

        if (Hash::check($currentPassword, $user->password)) {
            $user->password = Hash::make($newPassword);
            $user->save();

           return redirect()->back()->with([ 'success' => 'Password updated successfully.', 'active' => 'show active',
]);

        } else {
            return redirect()->back()->withErrors(['password' => 'Incorrect current password.','active'=>'show active']);
        }
    }

}
