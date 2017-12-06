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

    public function __construct(User $user, Ad $ad, Days $days, Hours $hours,Shedule $shedule, Orders $orders)
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

    public function newAd()
    {
        //todo: have to give busy date or javascript and update according.
        $data = [
            'days' => $this->days->all(),
            'hours' => $this->hours->all(),
        ];

        return view('profile.newAd', $data);
    }

    //alles opsplitsen
    public function createAd(CreateAdRequest $request)
    {
        $ad = $this->createAdDataBase($request);
        $order = $this->createOrder($request,$ad->id);
        $this->createShedule($request,$ad->id, $order->id);
        
        return redirect('profile')->with('success', 'ad added!');
    }

    public function showAd($id)
    {
        $ad = $this->ad->find($id);
        $shedule = $ad->shedule()->get();
        $order = $ad->order()->first();
        $data = [
            'path_art' => $this->buildUrl($ad->path_art),
            'path_audio' => url('/').'/'.$this->buildUrl($ad->path_audio),
            'title' => $ad->title,
            'shedule' => $shedule,
            'order' => $order,
        ];
        
        return view('profile.ad',$data);
    }

    private function buildUrl($path)
    {
        return $this->disk.'/'.$path;
    }

    private function createAdDataBase($request)
    {
        $artFile = Storage::disk('uploads')->put('art', $request->file('artFile'));
        $audioFile = Storage::disk('uploads')->put('audioFile', $request->file('audioFile'));
        $dbData = [
            'path_art' => $artFile,
            'path_audio' => $audioFile,
            'title' => $request->title,
            'user_id' => Auth::id(),
        ];

        if($ad = $this->ad->create($dbData)){
            return $ad;
       } else {
            return back()->with('error', 'something went wrong at file uploads, try again');
       }

    }

    private function createShedule($request,$adId, $order_id)
    {

        $days = $request->days;
        $hours = $request->hours;
        $weeks = $request->weeks;

        $data = [
            'user_id' => Auth::id(),
            'ad_id' => $adId,
            'order_id' => $order_id, //to change
        ];

        for($week = 0; $week <= $weeks; $week++){
            foreach($days as $day){
                $date =  new Carbon('next '.$day);
                $dateWithWeek = $date->addWeeks($week); 
                foreach($hours as $hour){
                    $splitHour = explode(":",$hour );
                    $dateWithHour = $dateWithWeek->copy();
                    $dateWithHour->addHours( (int)$splitHour[0] );
                    $data['slot'] = $dateWithHour;
                    $this->shedule->create($data);
                }
            }
        }

    }

    private function createOrder($request, $adId)
    {
        $days = $request->days;
        $hours = $request->hours;
        $weeks = $request->weeks;

        $total = sizeof($hours) * sizeof($days) * $weeks;
        $pricePerAd = 10;
        
        $data = [
            'user_id' => Auth::id(),
            'ad_id' => $adId,
            'price' => $pricePerAd * $total,
        ];

        if($orders = $this->orders->create($data)){
            return $orders;
        }else{
            return back()->with('error', 'something went wrong at creating order, try again');
        }
    }
}
