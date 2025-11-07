@extends('dashboard.asset.main')
@section('title', 'Dashboard Page | Article')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Article</li>
        </ol>
    </nav>
    <div class="row py-3 px-3">
        <div class="col-12 p-0 py-4">
            <div class="card boder border-0 shadow-lg rounded-4">
                <div class="card-header bg-transparent card-body-custom pt-5 pb-3">
                    <h4 class="card-title border-0 px-2 py-2">
                        Article
                    </h4>
                </div>
                <div class="card-body px-5">
                    <div class="row py-3 px-3">
                        <div class="d-flex flex-column d-md-inline-flex flex-md-row p-2 justify-content-end gap-4">
                            <form method="GET" class="d-flex flex-column d-md-inline-flex flex-md-row gap-4"
                                action="{{ route('dashboard-article-index') }}">
                                <input type="text" class="form-control" placeholder="Cari kata" name="pencarian_kata"
                                    value="{{ request('pencarian_kata') }}">
                                <input type="text" class="form-control" placeholder="Kata diubah" name="kata_diubah"
                                    value="{{ request('kata_diubah') }}">
                                <input type="text" class="form-control" placeholder="Menjadi" name="menjadi"
                                    value="{{ request('menjadi') }}">
                                <button type="submit" class="btn btn-outline-primary input-group-text">
                                    <i class="fa-solid fa-magnifying-glass text-primary"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <p><strong class="me-2">Kata {{ request('pencarian_kata') }} ditemukan :</strong>{{ $kataDitemukan }}
                    </p>
                    <p style="text-align: justify">
                        {{ $article }}
                    </p>
                    <hr>
                    <strong class="me-2">Sorted Kata :</strong>
                    <p style="text-align: justify">
                        @foreach ($sortedKata as $item)
                            {{ $item }}
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
