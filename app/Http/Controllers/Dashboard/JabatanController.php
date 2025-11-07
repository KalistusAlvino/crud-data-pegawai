<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Repositories\SwalRepository;
use Illuminate\Http\Request;

class JabatanController extends Controller
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
        $jabatans = Jabatan::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.organisasi.jabatan.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.organisasi.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
             $validate = $request->validate([
                'nama_jabatan' => 'required|string|max:255',
            ]);

            Jabatan::create($validate);
            $this->swalRepository::fire('Data jabatan berhasil ditambahkan', 'success');
            return redirect()->route('dashboard-jabatan-index');
        } catch (\Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan data jabatan. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Jabatan $jabatan)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Jabatan $jabatan)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Jabatan $jabatan)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Jabatan $jabatan)
    // {
    //     //
    // }
}
