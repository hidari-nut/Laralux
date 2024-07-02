<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($roomId)
    {
        //
        $roomDatas = Product::with(['rooms'])
            ->where('rooms_id', $roomId)
            ->first();
        $productsDatas = Product::with(['rooms'])
            ->where('rooms_id', $roomId)
            ->get();
        return view('products.productslist', compact('productsDatas', 'roomDatas'));
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
        //
        //dd($request);

        try {
            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'icon' => 'required',
                'qty',
                'rooms_id' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }

        $newProduct = new Product();
        $newProduct->name = $request->get("name");
        $newProduct->category = $request->get("category");
        $newProduct->icon = $request->get("icon");
        $newProduct->qty = $request->get("qty");
        $newProduct->rooms_id = $request->get("rooms_id");
        $newProduct->save();

        return redirect(url()->previous())->with('status', 'Your product has been successfully created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $request->validate([
                'name' => 'required',
                'category' => 'required',
                'icon' => 'required',
                'quantity',
                'rooms_id' => 'required'
            ]);
        } catch (ValidationException $e) {
            dd($e->errors());
        }
        $updatedProduct = Product::find($id);

        $updatedProduct->name = $request->get("name");
        $updatedProduct->category = $request->get("category");
        $updatedProduct->icon = $request->get("icon");
        $updatedProduct->qty = $request->get("qty");
        $updatedProduct->rooms_id = $request->get("rooms_id");


        $updatedProduct->save();

        return redirect(url()->previous())->with('status', 'Your product is successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect(url()->previous())->with('status', 'Product successfully deleted!');
        }
        return redirect(url()->previous())->with('error', 'Hotel type not found!');
    }

    public function trashedProduct($roomId)
    {

        $productDatas = Product::with('rooms')
            ->where('rooms_id', $roomId)
            ->first();

        $trashedProducts = Product::onlyTrashed()->where('rooms_id', $roomId)->get();
        return view('products.trashedProduct', compact('trashedProducts'));
    }

    public function restore(Request $request)
    {
        $id = $request->input('product_id');
        //dd($id);
        $product = Product::withTrashed()->find($id);
        if ($product) {
            $product->restore();
            return redirect()->back()->with('status', 'Product successfully restored!');
        }
        return redirect()->back()->with('error', 'Product not found!');
    }

    public function getEditForm(Request $request)
    {

        $id = $request->id;
        $product = Product::find($id);
        //dd($type);
        return response()->json(
            [
                'status' => 'oke',
                'msg' => view('products.editproduct', compact('product'))->render(),
            ],
            200,
        );
    }
}
