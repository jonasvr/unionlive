<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ad;
use Illuminate\Support\Facades\Auth;
       
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

    public function createAd(Request $request)
    {
        dd($request->all());
    	// $this->ad->create()
    }
}
