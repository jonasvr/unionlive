<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
       
class ProfileController extends Controller
{

	private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
    	$ads = Auth::user()->ads()->get();
    	$data = [
    		'ads' => $ads,
    	];

 		return view('profile.profile',$data);
    }
}
