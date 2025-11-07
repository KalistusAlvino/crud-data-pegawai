@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Ubah Data Pegawai')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Pegawai</li>
        </ol>
    </nav>
    <div class="col-12 p-0 py-4">
        <div class="card boder border-0 shadow-lg rounded-4">
            <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                <h4 class="card-title border-0 px-2 py-2">
                    Ubah Data Pegawai
                </h4>
            </div>
            <div class="card-body px-5">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="data-pribadi-tab" data-bs-toggle="tab"
                            data-bs-target="#data-pribadi-panel" type="button" role="tab"
                            aria-controls="data-pribadi-panel" aria-selected="true" disabled>Data Pribadi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="data-kepegawaian-tab" data-bs-toggle="tab"
                            data-bs-target="#data-kepegawaian-panel" type="button" role="tab"
                            aria-controls="data-kepegawaian-panel" aria-selected="false" disabled>Data Kepegawaian</button>
                    </li>
                </ul>
                <form action="{{ route('pegawai.update', $pegawai) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="tab-content py-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="data-pribadi-panel" role="tabpanel"
                            aria-labelledby="data-pribadi-tab" tabindex="0">
                            @include('dashboard.pegawai.form.data-pribadi')
                            <hr>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary btn-next">Selanjutnya</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="data-kepegawaian-panel" role="tabpanel"
                            aria-labelledby="data-kepegawaian-tab" tabindex="0">
                            @include('dashboard.pegawai.form.data-kepegawaian')
                            <hr>
                            <div class="d-flex justify-content-end gap-3">
                                <button type="button" class="btn btn-outline-secondary btn-prev">Kembali</button>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nextButtons = document.querySelectorAll(".btn-next");
            const prevButtons = document.querySelectorAll(".btn-prev");

            nextButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const activeTab = document.querySelector("#myTab .nav-link.active");
                    const nextTab = activeTab.parentElement.nextElementSibling?.querySelector(
                        ".nav-link");
                    if (nextTab) new bootstrap.Tab(nextTab).show();
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const activeTab = document.querySelector("#myTab .nav-link.active");
                    const prevTab = activeTab.parentElement.previousElementSibling?.querySelector(
                        ".nav-link");
                    if (prevTab) new bootstrap.Tab(prevTab).show();
                });
            });
        });
    </script>
@endsection
