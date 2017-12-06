<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ad;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateAdRequest;
use Storage;
       
class ProfileController extends Controller
{

	protected $user,$ad;
    Private $disk = 'uploads';

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
        $artFile = Storage::disk('uploads')->put('art', $request->file('artFile'));
        $audioFile = Storage::disk('uploads')->put('audioFile', $request->file('audioFile'));
        $dbData = [
            'path_art' => $artFile,
            'path_audio' => $audioFile,
            'title' => $request->title,
            'user_id' => Auth::id(),
        ];


       if($this->ad->create($dbData)){
            return redirect('profile')->with('success', 'ad added!');
       } else {
            return back()->with('error', 'something went wrong, try again');
       }
    }

    public function showAd($id)
    {
        $ad = $this->ad->find($id);
        $data = [
            'path_art' => $this->buildUrl($ad->path_art),
            'path_audio' => url('/').'/'.$this->buildUrl($ad->path_audio),
            'title' => $ad->title,
        ];
        
        return view('profile.ad',$data);
    }

    private function buildUrl($path)
    {
        return $this->disk.'/'.$path;
    }
}
