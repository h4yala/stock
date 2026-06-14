<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'user_id' => auth()->id(),
        ]);

        return redirect('/products')
            ->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($validated);

        return redirect('/products')
            ->with('success', 'Produto atualizado com sucesso!');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products')
            ->with('success', 'Produto removido com sucesso!');
    }

    public function dashboard() 
    {
        $totalProducts = Product::count();
        $totalQuantity = Product::sum('quantity');
        $totalValue = Product::sum(\DB::raw('quantity * price'));
        
        return view('dashboard', compact(
            'totalProducts',
            'totalQuantity',
            'totalValue'
        ));
    }

    public function movement(Request $request, Product $product)
    {
        $request->validate([
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($request->type === 'out' && $product->quantity < $request->quantity) {
            return back()->withErrors([
                'quantity' => 'Quantidade insuficiente em estoque.'
            ]);
        }

        if ($request->type === 'in') {
            $product->quantity += $request->quantity;
        } else {
            $product->quantity -= $request->quantity;
        }

        $product->save();

        $product->movements()->create([
            'type' => $request->type,
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'Movimentação registrada com sucesso.');
    }

    public function history(Product $product)
    {
        $movements = $product->movements()
                            ->latest()
                            ->get();

        return view('products.history', compact('product', 'movements'));
    }

}