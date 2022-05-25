<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    public function index(Request $r)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'serverKey';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            "item_details" => [
                [
                    'id' => 'item1',
                    'price' => 10000,
                    'quantity' => 1,
                    'name' => 'Midtrans Payment Gateway',
                ],
                [
                    'id' => 'item2',
                    'price' => 10000,
                    'quantity' => 1,
                    'name' => 'Midtrans Payment Gateway 2',
                ],
            ],
            "customer_details" => [
                "first_name" => "Budi",
                "last_name" => "Susanto",
                "email" => "budisusanto@example.com",
                "phone" => "+628123456789",
                "billing_address" => [
                    "first_name" => "Budi",
                    "last_name" => "Susanto",
                    "email" => "budisusanto@example.com",
                    "phone" => "08123456789",
                    "address" => "Sudirman No.12",
                    "city" => "Jakarta",
                    "postal_code" => "12190",
                    "country_code" => "IDN"
                ],
                "shipping_address" => [
                    "first_name" => "Budi",
                    "last_name" => "Susanto",
                    "email" => "budisusanto@example.com",
                    "phone" => "0812345678910",
                    "address" => "Sudirman",
                    "city" => "Jakarta",
                    "postal_code" => "12190",
                    "country_code" => "IDN"
                ]
            ]
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('home', ['snapToken' => $snapToken]);
    }
}
