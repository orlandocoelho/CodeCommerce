<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;


class CheckoutController extends Controller
{
    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {

            $order = $orderModel->create(['user_id' => Auth::User()->id, 'total' => $cart->getTotal()]);
            foreach ($cart->all() as $k => $item) {
                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
            }

            $cart->clear();
            event(new CheckoutEvent(Auth::User(), $order));
            return view('store.checkout', compact('order'));

        }

        return redirect()->route('cart');

    }

    public function test(CheckoutService $checkoutService)
    {
        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());

    }

}
