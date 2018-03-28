<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Days;
use App\Hours;
use App\Http\Requests\CreateAdRequest;
use App\Orders;
use App\Shedule;
use App\User;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\While_;

class AdvertisementController extends Controller
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

    public function newAdvertisementView()
    {
        //todo: have to give busy date or javascript and update according.
        $data = [
            'days' => $this->days->all(),
            'hours' => $this->hours->all(),
        ];

        return view('profile.newAd', $data);
    }

    public function createAd(CreateAdRequest $request)
    {
        $ad = $this->createAdDataBase($request);
        $order = $this->createOrder($request, $ad->id, $request->price);
        $this->createShedule($request, $ad->id, $order->id);

        return redirect('profile')->with('success', 'ad added!');
    }

    public function showAd($id)
    {
        $ad = $this->ad->find($id);
        $shedule = $ad->shedule()->get();
        $order = $ad->order()->first();
//        dd($order);
        $data = [
            'path_art' => $this->buildUrl($ad->path_art),
            'path_audio' => url('/') . '/' . $this->buildUrl($ad->path_audio),
            'title' => $ad->title,
            'shedule' => $shedule,
            'order' => $order,
        ];

        return view('profile.ad', $data);
    }

    //region helpers

    private function buildUrl($path)
    {
        return $this->disk . '/' . $path;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    private function createAdDataBase($request)
    {
//        dd($request->all());
        $dbData = [
            'title' => $request->title,
            'user_id' => Auth::id(),
        ];

        $dbData = $this->checkUploadFile($request->file('artFile'), $dbData, 'art');
        $dbData = $this->checkUploadFile($request->file('audioFile'), $dbData, 'audio');

        try {
            $ad = $this->ad->create($dbData);
            return $ad;
        } catch (Exception $e) {
            return back()->with('error', 'something went wrong at file uploads, try again');
        }

//        if ($ad = $this->ad->create($dbData)) {
//            return $ad;
//        } else {
//            return back()->with('error', 'something went wrong at file uploads, try again');
//        }

    }

    /**
     * @param $request
     * @param $adId
     * @param $order_id
     * todo:error message if create fails
     */
    private function createShedule($request, $adId, $order_id)
    {
        $days = $request->days;
        $hours = $request->hours;
        $weeks = $request->weeks;

        $data = [
            'user_id' => Auth::id(),
            'ad_id' => $adId,
            'order_id' => $order_id, //to change
        ];

        for ($week = 0; $week <= $weeks; $week++) {
            foreach ($days as $day) {
                $date = new Carbon('next ' . $day);
                $dateWithWeek = $date->addWeeks($week);
                foreach ($hours as $hour) {
                    $splitHour = explode(":", $hour);
                    $dateWithHour = $dateWithWeek->copy();
                    $dateWithHour->addHours((int)$splitHour[0]);
                    $data = $this->checkAvailability($dateWithHour, $data);
                    $this->shedule->create($data);
                }
            }
        }

    }

    /**
     * @param $request
     * @param $adId
     * @return \Illuminate\Http\RedirectResponse
     */
    private function createOrder($request, $adId, $price)
    {
        $data = [
            'user_id' => Auth::id(),
            'ad_id' => $adId,
            'price' => $price,
        ];

        if ($orders = $this->orders->create($data)) {
            return $orders;
        } else {
            return back()->with('error', 'something went wrong at creating order, try again');
        }
    }

    /**
     * @param $dateWithHour
     * @param $data
     * @return mixed
     *
     */
    //todo: alround checken if not every slot is filled + hardcoded weg werkengot
    private function checkAvailability($dateWithHour, $data)
    {
        $count = $this->shedule->countSlot($dateWithHour);
        if ($count < 5)
            $data['slot'] = $dateWithHour;
        else {
            $addHour = $dateWithHour->copy()->addHour();
            $subHour = $dateWithHour->copy()->subHour();
            if ($addHour->hour < 23)
                $data['slot'] = $addHour;
            elseif ($subHour > 18)
                $data['slot'] = $subHour;
        }
        return $data;
    }

    /**
     * @param $fileData
     * @param $dbData
     * @param $dbName
     * @return mixed
     */
    private function checkUploadFile($fileData, $dbData, $dbName)
    {
        $file = null;
        if ($fileData != null) {
            $file = Storage::disk('uploads')->put('art', $fileData);
        }
        $dbData['path_' . $dbName] = $file;

        return $dbData;
    }

    //endregion
}
