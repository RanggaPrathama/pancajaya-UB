<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Http\Requests\StorecartRequest;
use App\Http\Requests\UpdatecartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $carts = DB::table('carts')
                ->select('products.id_product','carts.quantity','products.gambar_product','products.nama_product','products.harga_product')
                ->join('products','products.id_product','=','carts.id_product')
                ->where('id_user','=',$id)
                ->get();
        return view('user.cart',['carts' => $carts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $idProduct = (int)$request->id_product;
            $quantity = (int)$request->quantity;

            $userId = auth()->user()->id_user;


            $carts = DB::table('carts')->where('id_user', '=', $userId)->where('id_product', '=', $idProduct)->first();

            if ($carts) {
                // Jika item sudah ada, update quantity
                $updatedCarts = DB::table('carts')->where('id_cart', '=', $carts->id_cart)->update([
                    'quantity' => $carts->quantity + $quantity,

                ]);

                if ($updatedCarts) {
                    DB::commit();
                    return redirect()->route('cart', auth()->user()->id_user)->with('success', 'Cart successfully updated');
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Failed to update the cart');
                }
            } else {

                $newCart = DB::table('carts')->insert([
                    'id_product' => $idProduct,
                    'quantity' => $quantity,
                    'id_user' => $userId,

                ]);

                if ($newCart) {
                    DB::commit();
                    return redirect()->route('cart', auth()->user()->id_user)->with('success', 'Cart successfully created');
                } else {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Failed to create the cart');
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecartRequest $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {
        //
    }
}
