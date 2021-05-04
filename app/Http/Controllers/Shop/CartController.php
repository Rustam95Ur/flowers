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
        $cart_items = session()->get('cart');
        $products = [];
        $total_price = 0;

        $shipping_price = Voyager::setting('site.shipping_price') ? (int)Voyager::setting('site.shipping_price') : 0;
        if ($cart_items) {
            foreach ($cart_items as $item) {
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
        if ($count_cart_items) {
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


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function wishlists()
    {
        $wish_products = [];
        $wish_items = session()->get('wish');
        if ($wish_items) {
            foreach ($wish_items as $item) {
                $product = Product::where('id', $item)->first()->toarray();
                array_push($wish_products, $product);
            }
        }
        return view('pages.wishlist', [
            'wish_products' => $wish_products
        ]);
    }

    /**
     * @param int $product_id
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_wishlist(int $product_id, $type = 'add'): \Illuminate\Http\JsonResponse
    {
        $message = trans('cart.success.add-wish');
        $wish_lists = session()->get('wish');
        if ($wish_lists) {
            if ($type == 'add' and !in_array($product_id, $wish_lists)) {
                session()->push('wish', $product_id);
            } elseif ($type == 'remove') {
                if (($key = array_search($product_id, $wish_lists)) !== false) {
                    $message = trans('cart.success.remove-wish');
                    unset($wish_lists[$key]);
                    session()->put('wish', $wish_lists);
                }
            }
        } elseif ($type == 'add') {

            session()->push('wish', $product_id);
        }
        return response()->json(['success' => $message], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function count_wish(): \Illuminate\Http\JsonResponse
    {
        $wish_count = 0;
        $count_wish_items = session()->get('wish');
        if ($count_wish_items) {

            $wish_count = count($count_wish_items);
        }
        return response()->json(['count' => $wish_count], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

}
