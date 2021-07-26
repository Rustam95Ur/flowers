<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Locale;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
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
        $shipping_price = Voyager::setting('site.shipping_price') ? (int)Voyager::setting('site.shipping_price') : 0;
        $session_product = $this->get_cart_products();
        if (request()->ajax()) {
            return view('cart.header_cart', [
                'mini_cart_products' => $session_product['products'],
                'total_price' => $session_product['total_price'],
            ]);
        }
        return view('cart.show', [
            'products' => $session_product['products'],
            'total_price' =>  $session_product['total_price'],
            'shipping_price' => $shipping_price,
        ]);
    }


    /**
     * @return JsonResponse
     */
    protected function count_cart(): JsonResponse
    {
        $count = 0;
        $cart_items = session()->get('cart');
        $size_cart_items = session()->get('size_cart');
        if ($cart_items) {
            foreach ($cart_items as $item) {
                if ($item) {
                    $count += $item['qty'];
                }
            }
        }
        if ($size_cart_items) {
            foreach ($size_cart_items as $item) {
                if ($item) {
                    $count += $item['qty'];
                }
            }
        }
        return response()->json(['count' => $count], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    /***
     * @param $product_id
     * @param int $qty
     * @param string $type
     * @param int|null $size_id
     * @return JsonResponse
     */
    protected function update_to_cart_size($product_id, int $qty, string $type = 'add', int $size_id = null): JsonResponse
    {
        $product = Product::where('id', '=', $product_id)->firstOrFail();
        $sizes_info = [];
        if ($size_id) {
            $product_price = $product->size_price($product->id, $size_id, $product->updated_price);

            $sizes_info = ['id' => $size_id, 'price' => $product_price];
        }
        $item = ['product_id' => $product_id, 'qty' => $qty, 'sizes' => $sizes_info];
        $sessions = session()->get('size_cart');
        if ($sessions and count($sessions) > 0) {
            $current_item = [];
            $sessions_items = [];
            for ($i = 0; $i < count($sessions); $i++) {
                if ($sessions[$i]['product_id'] == $product_id and $sessions[$i]['sizes']['id'] == $size_id) {
                    $current_item = $sessions[$i];
                } else {
                    array_push($sessions_items, $sessions[$i]);
                }
            }
            if ($current_item) {
                if ($qty > 0) {
                    $new_qty = $current_item['qty'] + $qty;
                    if ($type == 'remove') {
                        $new_qty = $current_item['qty'] - $qty;
                    }
                    if ($new_qty > 0) {
                        $current_item['qty'] = $new_qty;
                        array_push($sessions_items, $current_item);
                    }
                }
            } else {
                array_push($sessions_items, $item);
            }
            session()->put('size_cart', $sessions_items);
        } else {
            if ($type == 'add') {
                session()->push('size_cart', $item);
            }
        }
        return response()->json(['success' => 'success'], 201, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param int $product_id
     * @param int $qty
     * @param string $type
     * @return JsonResponse
     */
    protected function update_to_cart(int $product_id, int $qty, string $type = 'add'): JsonResponse
    {
        Product::where('id', '=', $product_id)->firstOrFail();
        $item = ['product_id' => $product_id, 'qty' => $qty];

        $session_items = session()->get('cart');
        $updated_cart_message = $this->update_session_cart($session_items, $item, $product_id, $qty, $type, 'cart');
        return response()->json(['success' => $updated_cart_message], 201, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
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

    /**
     * @param $session
     * @param $item
     * @param $product_id
     * @param $qty
     * @param $type
     * @param $cart_name
     * @return array|Application|\Illuminate\Contracts\Translation\Translator|string|null
     */
    protected function update_session_cart($session, $item, $product_id, $qty, $type, $cart_name)
    {
        $message = trans('cart.success.add-cart');
        if ($session and count($session) > 0) {
            $product_exist = array_search($product_id, array_column($session, 'product_id'));
            if ($product_exist === false and $type == 'add') {
                array_push($session, $item);
                session()->put($cart_name, $session);
            } else {
                if ($qty == 0 and $type == 'remove') {
                    $message = trans('cart.success.remove-cart');
                    unset($session[$product_exist]);
                    $session = array_values($session);
                    session()->put($cart_name, $session);
                } else {
                    $results = [];
                    for ($i = 0; $i < count($session); $i++) {
                        $new_qty = $session[$i]['qty'] + $qty;
                        if ($type == 'remove') {
                            $new_qty = $session[$i]['qty'] - $qty;
                        }
                        $product_qty = ($session[$i]['product_id'] == $product_id) ? $new_qty : $session[$i]['qty'];
                        if ($product_qty > 0) {
                            $new_product_array = [
                                'product_id' => $session[$i]['product_id'],
                                'qty' => $product_qty,
                            ];
                            if ($cart_name == 'size_cart') {
                                $new_product_array['sizes'] = $session[$i]['sizes'];
                            }
                            array_push($results, $new_product_array);
                        }
                    }
                    session()->put($cart_name, $results);
                }
            }
        } else {
            if ($type == 'add') {
                session()->push($cart_name, $item);
            }
        }
        return $message;
    }

    public function get_cart_products(): array
    {
        $cart_items = session()->get('cart');
        $size_cart_items = session()->get('size_cart');
        $products = [];
        $total_price = 0;
        $total_product = 0;
        if ($cart_items) {
            foreach ($cart_items as $item) {
                $product = Product::where('id', $item['product_id'])->first();
                $product_price = $product->updated_price;
                $product['title'] = $product->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale');
                $product['description'] = $product->getTranslatedAttribute('description', Locale::lang(), 'fallbackLocale');
                $product = $product->toarray();
                $product['size_title'] = '';
                $product['qty'] = $item['qty'];
                $product['type'] = 'default';
                $product['price'] = $product_price;
                array_push($products, $product);
                $total_price += $product_price * $item['qty'];
                $total_product += $item['qty'];
            }
        }
        if ($size_cart_items) {
            foreach ($size_cart_items as $item) {
                $product = Product::where('id', $item['product_id'])->first();
                $product['title'] = $product->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale');
                $product['description'] = $product->getTranslatedAttribute('description', Locale::lang(), 'fallbackLocale');
                $product = $product->toarray();
                $size_title = '';
                if (isset($item['sizes'])) {
                    $size_info = Size::find($item['sizes']['id']);
                    $size_title = '(' . $size_info->title . ')';
                }
                $product_price = $item['sizes']['price'];
                $product['size_title'] = $size_title;
                $product['qty'] = $item['qty'];
                $product['type'] = 'size';
                $product['size_id'] = $item['sizes']['id'];
                $product['price'] = $product_price;
                array_push($products, $product);
                $total_price += $product_price * $item['qty'];
                $total_product += $item['qty'];
            }
        }
        return ['products' => $products, 'total_price' => $total_price, 'total_product' => $total_product];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buy_one_product(Request $request): \Illuminate\Http\RedirectResponse
    {
        $products = [];
        $total_sum = 0;
        $product = Product::where('id', '=', $request['product_id'])->firstOrFail();
        $size_info = Size::find($request['size']);
        if($size_info) {
            $size_title = '(' . $size_info->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale') . ')';
        } else {
            $size_title = '';
        }
        if($size_info) {
            $product_price = $product->size_price($product->id, $size_info->id, $product->updated_price);
        } else {
            $product_price = $product->updated_price;
        }
        $results = [
            'id' => $product->id,
            'title' => $product->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale'),
            'price' => $product_price,
            'size_title' => $size_title,
            'qty' => (int)$request['qty']
        ];
        array_push($products, $results);
        $total_sum += $product_price * $request['qty'];
        $extra_products = $request['extra_products'];
        if ($extra_products) {
            foreach ($extra_products as $item) {
                if($item) {
                    $product = Product::where('id', '=', $item)->first();
                    $product_price = $product->updated_price;
                    $results = [
                        'id' => $product->id,
                        'title' => $product->getTranslatedAttribute('title', Locale::lang(), 'fallbackLocale'),
                        'price' => $product_price,
                        'size_title' => '',
                        'qty' => 1
                    ];
                    array_push($products, $results);
                    $total_sum += $product_price * 1;
                }
            }
        }

        session()->put('one_product', ['products' => $products, 'total_sum' => $total_sum]);

        return redirect()->route('checkout');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buy_all_product(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('one_product');
        return redirect()->route('checkout');
    }
}
