<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Eselon;
use App\Repositories\SwalRepository;
use Illuminate\Http\Request;

class EselonController extends Controller
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
        $eselons = Eselon::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.organisasi.eselon.index', compact('eselons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.organisasi.eselon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
            $validate = $request->validate([
                'kode_eselon' => 'required|string|max:5',
            ]);

            Eselon::create($validate);
            $this->swalRepository::fire('Data eselon berhasil ditambahkan', 'success');
            return redirect()->route('dashboard-eselon-index');
        } catch (\Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan data eselon. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Eselon $eselon)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Eselon $eselon)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Eselon $eselon)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Eselon $eselon)
    // {
    //     //
    // }
}
