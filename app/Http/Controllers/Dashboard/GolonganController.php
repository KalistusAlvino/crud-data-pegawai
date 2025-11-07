<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Repositories\SwalRepository;
use Illuminate\Http\Request;

class GolonganController extends Controller
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
        $golongans = Golongan::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.organisasi.golongan.index', compact('golongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.organisasi.golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
            $validate = $request->validate([
                'kode_golongan' => 'required|string|max:5',
            ]);

            Golongan::create($validate);
            $this->swalRepository::fire('Data golongan berhasil ditambahkan', 'success');
            return redirect()->route('dashboard-golongan-index');
        } catch (\Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan data golongan. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Golongan $golongan)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Golongan $golongan)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Golongan $golongan)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Golongan $golongan)
    // {
    //     //
    // }
}
