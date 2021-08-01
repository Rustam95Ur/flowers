<?php


namespace App\Http\Controllers\Profile;


use App\Http\Controllers\Controller;
use App\Locale;
use App\Models\City;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;


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
        $orders = Payment::paginate(5);
        if (request()->ajax()) {
            return view('profile.order_list', [
                'orders' => $orders,
            ]);
        }
        return view('profile.index', [
            'orders' => $orders,
            'cities' => $cities,
        ]);
    }


    public function get_order($order_id)
    {
        $order = Payment::where('id', $order_id)->firstOrFail();
        $order_request = json_decode($order->request);
        $products = [];
        $total_sum = 0;
        foreach ($order_request->products as $product_request) {
            $product = Product::where('id', $product_request->product_id)->first();
            if ($product) {
                $product_info = [
                    'title' => $product->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale'),
                    'qty' => $product_request->qty,
                    'price' => $product_request->price,
                ];
                $total_sum += $product_request->qty * $product_request->price;
                array_push($products, $product_info);
            }
        }
        return view('profile.order_detail', [
            'order' => $order,
            'products' => $products,
            'order_total_sum' => $total_sum,
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
        $client->birth_date = $request['birth_date'];

        if ($request['new_password'] !== null && $request['old_password'] !== null) {
            if (!Hash::check($request['old_password'], $client->password)) {
                return redirect()->route('profile')->with('error', trans('validation.current_password'));
            }
            $newPass = Hash::make($request['new_password']);
            $client->password = $newPass;
        }

        $client->save();

        return redirect()->route('profile')->with('success', trans('profile.success_update'));
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
        return redirect()->route('profile')->with('success', trans('profile.success_update'));
    }
}
