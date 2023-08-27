<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function dashboard()
    {
        $car1 = Order::where('car_id', 1)->get()->count();
        $car2 = Order::where('car_id', 2)->get()->count();
        $car3 = Order::where('car_id', 3)->get()->count();
        return view('dashboard', compact('car1', 'car2', 'car3'));
    }
    public function get()
    {
        $orders = Order::all();
        return view('orders')->with('orders', $orders);
    }
    public function create()
    {
        $cars = Car::all();
        return view('create-orders', compact('cars'));
    }
    public function store(Request $req)
    {
        Order::create([
            'car_id' => $req->car_id,
            'driver_name' => $req->driver_name,
        ]);

        $cars_id = Car::where('id', $req->car_id);
        $cars_id->update([
            'is_rented' => false,
        ]);

        return redirect()->route('orders.index');
    }
    public function approve($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->admin_approval && $order->head_approval) {
            Car::where('id', $order->car_id)->update([
                'is_rented' => true,
            ]);
            return redirect()->back();
        }
        if (Auth::user()->role == "admin") {
            Order::where('id', $id)->update([
                'admin_approval' => true,
            ]);
        }
        if (Auth::user()->role == "head") {
            Order::where('id', $id)->update([
                'head_approval' => true,
            ]);
        }
        return redirect()->back();
    }
    public function returned($id)
    {
        $order = Order::where('id', $id)->first();
        Car::where('id', $order->car_id)->update([
            "is_rented" => false,
        ]);
        Order::where('id', $id)->update([
            "returned_at" => now(),
        ]);
        return redirect()->back();
    }
}
