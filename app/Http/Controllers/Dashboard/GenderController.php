<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Repositories\SwalRepository;
use Illuminate\Http\Request;

class GenderController extends Controller
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
        $genders = Gender::all();
        return view('dashboard.klasifikasi.gender.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.klasifikasi.gender.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'gender' => 'required|in:L,P|unique:genders,gender',
            ]);
            Gender::create($validate);
            $this->swalRepository::fire('Data gender berhasil ditambahkan', 'success');
            return redirect()->route('dashboard-gender-index');
        } catch (\Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan data gender. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Gender $gender)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Gender $gender)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Gender $gender)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Gender $gender)
    // {
    //     //
    // }
}
