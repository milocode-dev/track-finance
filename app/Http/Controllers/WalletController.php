<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = Wallet::where('user_id', Auth::id())->latest()->get();

        return view('wallets.index', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'type' => 'required|in:jajan,tabungan,kebutuhan,investasi',
            'balance' => 'required',
        ]);

        $validated['user_id'] = Auth::id();
        Wallet::create($validated);

        return redirect()->route('wallets.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wallet = Wallet::findOrFail($id);

        if ($wallet->user_id !== Auth::id()) {
            abort(403);
        } else {
            $wallet->delete();
        }
        return redirect()->route('wallets.index')->with('success', 'Data berhasil dihapus!');
    }
}
