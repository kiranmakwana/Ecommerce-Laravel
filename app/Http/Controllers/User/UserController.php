<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Profile_picture;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{

    public function index()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('user.editprofile', [
            'countries' => Country::all(),
            'states' => State::all(),
            'cities' => City::all(),
            'user' => Auth::user()
        ]);
    }

    public function update(UserUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        #params
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $dob = $request->input('dob');
        $country_code = $request->input('country_code');
        $phone = $request->input('phone');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $user_address = $request->input('address');
        $zipcode = $request->input('zipcode');
        $country = $request->input('country');
        $state = $request->input('state');
        $city = $request->input('city');
        $fileUpload = $request->file('fileUpload');

        #user update
        $user = User::find(Auth::user()->id);
        $user->f_name = $f_name;
        $user->l_name = $l_name;
        $user->dob = $dob;
        $user->country_code = $country_code;
        $user->contact_no = $phone;
        $user->gender = $gender;
        $user->email = $email;
        $user->save();

        #user address update
        $address = Address::where('user_id', $user->id)->first();
        $address->address = $user_address;
        $address->city_id = $city;
        $address->state_id = $state;
        $address->country_id = $country;
        $address->zipcode = $zipcode;
        $address->save();

        #user Profile update
        if ($request->hasFile('fileUpload')) {
            $profile = Profile_picture::where('user_id', $user->id)->first();
            if ($profile) {
                //delete old file
                //File::delete($image_path);
                unlink(public_path('/storage/UserProfile/' . $profile->name));
            } else {
                $profile = new Profile_picture();
            }
            #params
            $original_name = $fileUpload->getClientOriginalName();
            $mimeType = $fileUpload->getMimeType();
            $getSize = $fileUpload->getSize();
            $image_name = time() . '.' . $fileUpload->extension();

            #resize image & store
            $image_resize = Image::make($fileUpload->getRealPath());
            $image_resize->resize(225, 225);

            #save data
            $profile->user_id = $user->id;
            $profile->name = $image_name;
            $profile->original_name = $original_name;
            $profile->mime_type = $mimeType;
            $profile->size = $getSize;

            $path = public_path().'/storage/UserProfile/';
            if (file_exists($path)) {
                File::makeDirectory($path,0777, true, true);
            }
            $image_resize->save($path . $image_name);
            $profile->save();
        }
        return redirect()->route('user.profile.index');
    }

    public function checkPassword(Request $request): bool
    {
        return Hash::check($request->password, Auth::user()->getAuthPassword());
    }

    public function changePassword(Request $request)
    {
        $password = $request->password;
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($password);
        return $user->save();
    }
}
