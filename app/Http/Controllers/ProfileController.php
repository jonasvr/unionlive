<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ad;
use App\Days;
use App\Hours;
use App\Shedule;
use App\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateAdRequest;
use Storage;
       
class ProfileController extends Controller
{

	protected $user, $ad, $hours, $days, $orders, $shedule;
    Private $disk = 'uploads';

    public function __construct(User $user, Ad $ad, Days $days, Hours $hours, Shedule $shedule, Orders $orders)
    {
        $this->user = $user;
        $this->ad = $ad;
        $this->hours = $hours;
        $this->days = $days;
        $this->orders = $orders;
        $this->shedule = $shedule;
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
