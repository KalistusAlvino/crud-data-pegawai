<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Repositories\SwalRepository;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    protected $swalRepository;
    public function __construct(SwalRepository $swalRepository)
    {
        $this->swalRepository = $swalRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agamas = Agama::all();
        return view('dashboard.klasifikasi.agama.index', compact('agamas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.klasifikasi.agama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'agama' => 'required|string|max:255|unique:agamas,agama',
            ]);
            Agama::create($validated);
            $this->swalRepository::fire('Data agama berhasil ditambahkan', 'success');
            return redirect()->route('dashboard-agama-index');
        } catch (\Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan data agama. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Agama $agama)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Agama $agama)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Agama $agama)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Agama $agama)
    // {
    //     //
    // }
}
