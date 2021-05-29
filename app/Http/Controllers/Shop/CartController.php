<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSizePrice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use TCG\Voyager\Facades\Voyager;

class CartController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $cart_items = session()->get('cart');
        $products = [];
        $total_price = 0;

        $shipping_price = Voyager::setting('site.shipping_price') ? (int)Voyager::setting('site.shipping_price') : 0;
        if ($cart_items) {
            foreach ($cart_items as $item) {
                $product = Product::where('id', $item['product_id'])->first();
                $product_price = $product->updated_price;
                $product = $product->toarray();
                $product['qty'] = $item['qty'];
                $product['price'] = $product_price;
                array_push($products, $product);
                $total_price += $product_price * $item['qty'];
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
     * @return JsonResponse
     */
    protected function count_cart(): JsonResponse
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

    /**
     * @param int $product_id
     * @param int $qty
     * @param string $type
     * @param int|null $size_id
     * @return JsonResponse
     */
    protected function update_to_cart(int $product_id, int $qty, string $type = 'add', int $size_id = null): JsonResponse
    {
        $product = Product::where('id', '=', $product_id)->firstOrFail();
        $sizes_info = [];

        if ($size_id) {
            $product_price = $product->size_price($product->id, $size_id, $product->updated_price);

            $sizes_info = ['id' => $size_id, 'price' => $product_price];
        }
        $item = ['product_id' => $product_id, 'qty' => $qty, 'sizes' => $sizes_info];
        $message = trans('cart.success.add-cart');
        $session_items = session()->get('cart');
        if ($session_items and count($session_items) > 0) {
            $size_exist = array_filter($session_items, function ($value) use ($product_id, $size_id) {
                if (count($value['sizes']) > 0 and $product_id ==  $value['product_id'] and $value['sizes']['id'] == $size_id) {
                    return true;
                }
                return false;
            });
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
                                'sizes' => $sizes_info,
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
        return response()->json(['success' => $message], 201, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }


    /**
     * @return Application|Factory|View
     */
    public function wishlists()
    {
        $wish_products = [];
        $wish_items = session()->get('wish');
        if ($wish_items) {
            foreach ($wish_items as $item) {
                $product = Product::where('id', $item)->first();
                $product_price = $product->updated_price;
                $product_array = $product->toarray();
                $product_array['updated_price'] = $product_price;
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
     * @return JsonResponse
     */
    public function update_wishlist(int $product_id, $type = 'add'): JsonResponse
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
     * @return JsonResponse
     */
    protected function count_wish(): JsonResponse
    {
        $wish_count = 0;
        $count_wish_items = session()->get('wish');
        if ($count_wish_items) {

            $wish_count = count($count_wish_items);
        }
        return response()->json(['count' => $wish_count], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

}
