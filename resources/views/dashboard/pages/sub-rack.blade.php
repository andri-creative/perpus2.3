@extends('dashboard.layouts.main')

@section('contents')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Apps Sub</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Apps
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Sub</li>
        </ul>
    </div>

    <div class="row gy-4" id="some">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sub Rak</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('create.sub') }}" method="POST">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Kode Sub</label>
                                <input type="text" name="code_sub" class="form-control" placeholder="Input Sub code">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kode Rak</label>
                                <select name="code_rack" class="form-control" id="">
                                    <option selected disabled>Opcion</option>
                                    @foreach ($rack as $racks)
                                        <option value="{{ $racks->id }}">{{ $racks->code_rack }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" id="uploadData" class="btn btn-primary-600">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Table Sub</h5>
                </div>
                <div class="card-body">
                    @include('dashboard/components/tables/rack/tabel-sub')
                </div>
            </div>
        </div>

    </div>
@endsection
