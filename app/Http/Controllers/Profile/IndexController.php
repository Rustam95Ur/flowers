<?php


namespace App\Http\Controllers\Profile;


use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Payment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $cities = City::all();
        $orders = Payment::limit(10)->get();
        return view('profile.index', [
            'orders' => $orders,
            'cities' => $cities,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $client = Auth::user();

        $client->first_name = $request['first_name'];
        $client->last_name = $request['last_name'];
//        $client->phone = $request['phone'];
        $client->birth_date = $request['birth_date'];

        if ($request['new_password'] !== null && $request['old_password'] !== null) {
            if (!Hash::check($request['old_password'],$client->password)) {
                return redirect()->route('profile')->with('error', trans('validation.current_password'));
            }
            $newPass = Hash::make($request['new_password']);
            $client->password = $newPass;
        }

        $client->save();

        return redirect()->route('profile')->with('success',  trans('profile.success_update'));
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update_address(Request $request): RedirectResponse
    {
        $client = Auth::user();
        $client->address = $request['address'];
        $client->city_id = $request['city_id'];
        $client->save();
        return redirect()->route('profile')->with('success',  trans('profile.success_update'));
    }
}
