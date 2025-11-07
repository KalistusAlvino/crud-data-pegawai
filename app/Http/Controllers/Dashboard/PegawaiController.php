<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Gender;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Unit;
use App\Repositories\SwalRepository;
use App\Repositories\UploadFotoRepository;

use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    protected $swalRepository;
    protected $uploadFotoRepository;
    public function __construct(SwalRepository $swalRepository, UploadFotoRepository $uploadFotoRepository)
    {
        $this->swalRepository = $swalRepository;
        $this->uploadFotoRepository = $uploadFotoRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $units = Unit::all();
        $pegawais = Pegawai::with('gender', 'agama', 'golongan', 'eselon', 'jabatan', 'unit')
            ->when(
                $request->filter_unit,
                fn($q) => $q->where('unit_id', $request->filter_unit)
            )
            ->when(
                $request->nama_pegawai,
                fn($q) => $q->where('nama_pegawai', 'like', "%{$request->nama_pegawai}%")
            )
            ->orderBy('NIP')
            ->paginate(10);
        return view('dashboard.pegawai.index', compact('pegawais', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agamas = Agama::all();
        $genders = Gender::all();
        $golongans = Golongan::all();
        $eselons = Eselon::all();
        $jabatans = Jabatan::all();
        $units = Unit::all();
        return view('dashboard.pegawai.create.create', compact('agamas', 'genders', 'golongans', 'eselons', 'jabatans', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nip' => 'required|digits_between:10,18|unique:pegawais',
                'nama_pegawai' => 'required|string',
                'foto_path' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string',
                'no_hp' => 'required|digits_between:10,15|unique:pegawais',
                'gender_id' => 'required|exists:genders,id',
                'agama_id' => 'required|exists:agamas,id',
                'gol_id' => 'required|exists:golongans,id',
                'eselon_id' => 'required|exists:eselons,id',
                'jabatan_id' => 'required|exists:jabatans,id',
                'unit_id' => 'required|exists:units,id',
                'tempat_tugas' => 'required|string',
                'npwp' => 'required|string|max:20'
            ]);
            if ($request->hasFile('foto_path')) {
                $validate['foto_path'] = $this->uploadFotoRepository::upload($request->file('foto_path'), $request->nip);
            }
            Pegawai::create($validate);
            $this->swalRepository::fire('Data pegawai berhasil ditambahkan', 'success');
            return redirect()->route('pegawai.index');
        } catch (Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan data pegawai. Silahkan coba lagi' . $e->getMessage(), 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        $pegawai->load(['gender', 'golongan', 'eselon', 'jabatan', 'unit', 'agama']);
        return view('dashboard.pegawai.show.detail', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $agamas = Agama::all();
        $genders = Gender::all();
        $golongans = Golongan::all();
        $eselons = Eselon::all();
        $jabatans = Jabatan::all();
        $units = Unit::all();
        $pegawai->load(['gender', 'golongan', 'eselon', 'jabatan', 'unit', 'agama']);
        return view('dashboard.pegawai.update.edit', compact('agamas', 'genders', 'golongans', 'eselons', 'jabatans', 'units', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        try {
            $validate = $request->validate([
                'nip' => ['required', 'digits:18', Rule::unique('pegawais', 'nip')->ignore($pegawai->id)],
                'nama_pegawai' => 'required|string',
                'foto_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string',
                'no_hp' => ['required', 'digits_between:10,15', Rule::unique('pegawais', 'no_hp')->ignore($pegawai->id)],
                'gender_id' => 'required|exists:genders,id',
                'agama_id' => 'required|exists:agamas,id',
                'gol_id' => 'required|exists:golongans,id',
                'eselon_id' => 'required|exists:eselons,id',
                'jabatan_id' => 'required|exists:jabatans,id',
                'unit_id' => 'required|exists:units,id',
                'tempat_tugas' => 'required|string',
                'npwp' => 'required|string|max:20'
            ]);
            if ($request->hasFile('foto_path')) {
                $validate['foto_path'] = $this->uploadFotoRepository::upload($request->file('foto_path'), $request->nip, $pegawai->foto_path);
            }
            $pegawai->update($validate);
            $this->swalRepository::fire('Data pegawai berhasil diubah', 'success');
            return redirect()->route('pegawai.index');
        } catch (Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menambahkan ubah data pegawai. Silahkan coba lagi', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        try {
            $this->uploadFotoRepository::delete($pegawai->foto_path);
            $pegawai->delete();
            $this->swalRepository->fire('Data pegawai berhasil dihapus.', 'success');
            return redirect()->route('pegawai.index');
        } catch (Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat menghapus data pegawai. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    public function print(Request $request)
    {
        $pegawais = Pegawai::with('gender', 'agama', 'golongan', 'eselon', 'jabatan', 'unit')
            ->when(
                $request->filter_unit,
                fn($q) => $q->where('unit_id', $request->filter_unit)
            )
            ->when(
                $request->nama_pegawai,
                fn($q) => $q->where('nama_pegawai', 'like', "%{$request->nama_pegawai}%")
            )
            ->orderBy('NIP')
            ->get();
        $pdf = Pdf::loadView('dashboard.print.print', compact('pegawais'));

        return $pdf->stream('data-pegawai.pdf');
    }
}
