<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Repositories\SwalRepository;
use Illuminate\Http\Request;

class UnitController extends Controller
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
        $units = Unit::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.organisasi.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.organisasi.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nama_unit' => 'required|string|max:255',
            ]);

            Unit::create($validate);
            $this->swalRepository::fire('Data unit berhasil ditambahkan', 'success');
            return redirect()->route('dashboard-unit-index');
        } catch (\Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan data unit. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Unit $unit)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Unit $unit)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Unit $unit)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Unit $unit)
    // {
    //     //
    // }
}
