<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use TCG\Voyager\Facades\Voyager;

class CartController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $count_cart_items = session()->get('cart');
        $products = [];
        $total_price = 0;

        $shipping_price = Voyager::setting('site.shipping_price') ? (int)Voyager::setting('site.shipping_price') : 0;
        if ($count_cart_items) {
            foreach ($count_cart_items as $item) {
                $product = Product::where('id', $item['product_id'])->first()->toarray();
                $product['qty'] = $item['qty'];
                array_push($products, $product);
                $total_price += $product['price'] * $item['qty'];
            }
        }
        if (request()->ajax()) {
            return view('cart.header_cart', [
                'mini_cart_products' => $products,
                'total_price' => $total_price,
            ]);
        }
        return view('cart.show', [
            'products' => $products,
            'total_price' => $total_price,
            'shipping_price' => $shipping_price,
        ]);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function count_cart(): \Illuminate\Http\JsonResponse
    {
        $count = 0;
        $count_cart_items = session()->get('cart');
        if ($count_cart_items != false) {
            foreach ($count_cart_items as $item) {
                $count += $item['qty'];
            }
        }
        return response()->json(['count' => $count], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }


    protected function update_to_cart(int $product_id, int $qty, string $type = 'add'): \Illuminate\Http\JsonResponse
    {
        Product::where('id', '=', $product_id)->firstOrFail();
        $item = ['product_id' => $product_id, 'qty' => $qty];
        $message = trans('cart.success.add-cart');
        $session_items = session()->get('cart');
        if ($session_items and count($session_items) > 0) {
            $product_exist = array_search($product_id, array_column($session_items, 'product_id'));
            if ($product_exist === false and $type == 'add') {
                array_push($session_items, $item);
                session()->put('cart', $session_items);
            } else {
                if ($qty == 0 and $type == 'remove') {
                    $message = trans('cart.success.remove-cart');
                    unset($session_items[$product_exist]);
                    session()->put('cart', $session_items);
                } else {
                    $results = [];
                    for ($i = 0; $i < count($session_items); $i++) {

                        $new_qty = $session_items[$i]['qty'] + $qty;
                        if ($type == 'remove') {
                            $new_qty = $session_items[$i]['qty'] - $qty;
                        }
                        $product_qty = ($session_items[$i]['product_id'] == $product_id) ? $new_qty : $session_items[$i]['qty'];
                        if ($product_qty > 0) {
                            $new_product_array = [
                                'product_id' => $session_items[$i]['product_id'],
                                'qty' => $product_qty,
                            ];
                            array_push($results, $new_product_array);
                        }
                    }
                    session()->put('cart', $results);
                }
            }
        } else {
            if ($type == 'add') {
                session()->push('cart', $item);
            }
        }
        return response()->json(['success' => $message], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }


    public function cart_products(): array
    {

    }

}
