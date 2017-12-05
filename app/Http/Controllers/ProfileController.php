<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ad;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateAdRequest;
       
class ProfileController extends Controller
{

	private $user;
	private $ad;

    public function __construct(User $user, Ad $ad)
    {
        $this->user = $user;
        $this->ad = $ad;
    }

    public function index()
    {
    	$ads = Auth::user()->ads()->get();
    	$data = [
    		'ads' => $ads,
    	];

 		return view('profile.profile',$data);
    }

    public function newAd()
    {
        return view('profile.newAd');
    }

    public function createAd(CreateAdRequest $request)
    {
        $artFile = $request->file('artFile')->store('art');
        $audioFile = $request->file('audioFile')->store('audio');
        $dbData = [
            'path_art' => $artFile,
            'path_audio' => $audioFile,
            'title' => $request->title,
            'user_id' => Auth::id(),
        ];


       if($this->ad->create($dbData)){
            return redirect('dashboard')->with('success', 'ad added!');
       } else {
            return back()->with('error', 'something went wrong, try again');
       }
    }
}
