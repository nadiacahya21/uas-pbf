@extends('layouts.admin')

@section('content')
<div class="am-mainpanel">

    <div class="am-pagetitle">
      <h5 class="am-title">Data Berobat</h5>
    </div><!-- am-pagetitle -->

    @if (session('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div>
    @endif
    @if ($errors->any())
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            Terjadi kesalahan saat menyimpan data
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    <div class="am-pagebody">
            <div class="row row-sm mg-t-15 mg-sm-t-20">
                <div class="col-md-6">
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Data Pasien</h6>
                    <label class="form-control-label">Nama:</label>
                    <input type="text" value="{{ $berobat->pasien->nama_pasien }}" class="form-control" readonly>
                    <label class="form-control-label">Umur:</label>
                    <input type="text" value="{{ $berobat->pasien->umur }}" class="form-control" readonly>
                    <label class="form-control-label">Jenis Kelamin:</label>
                    <input type="text" value="{{ $berobat->pasien->jenis_kelamin }}" class="form-control" readonly>
                  </div><!-- card -->
                </div><!-- col-6 -->
                <div class="col-md-6 mg-t-15 mg-sm-t-20 mg-md-t-0">
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Catatan Rekam Medis</h6>
                    <form action="{{ route('berobat.update', $berobat->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <label class="form-control-label">Keluhan:</label>
                        <input type="text" value="{{ $berobat->keluhan }}" class="form-control" name="keluhan" required>
                        <label class="form-control-label">Diagnosa:</label>
                        <input type="text" value="{{ $berobat->diagnosa }}" class="form-control" name="diagnosa" required>
                        <label class="form-control-label">Penatalaksanaan:</label>
                        <select name="penatalaksanaan" id="penatalaksanaan" class="form-control">
                            <option value="rawat jalan" @if ($berobat->penatalaksanaan == 'rawat jalan')
                                selected
                            @endif>rawat jalan</option>
                            <option value="rawat inap" @if ($berobat->penatalaksanaan == 'rawat inap')
                                selected
                            @endif>rawat inap</option>
                            <option value="rujuk" @if ($berobat->penatalaksanaan == 'rujuk')
                                selected
                            @endif>rujuk</option>
                            <option value="lainnya" @if ($berobat->penatalaksanaan == 'lainnya')
                                selected
                            @endif>lainnya</option>
                        </select>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div><!-- card -->
                </div><!-- col-6 -->
              </div>
              <div class="row row-sm mg-t-15 mg-sm-t-20">
                <div class="col-md-6">
                  <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Data Obat</h6>
                    <form action="{{ route('berobat.update', $berobat->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <label class="form-control-label">Obat:</label>
                        <select name="obat" id="obat" class="form-control">
                            @foreach ($obat as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                    <table class="table mg-b-0 mt-3">
                        <thead>
                          <tr>
                            <th>Nomor</th>
                            <th>Obat</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($berobat->resep as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_obat }}</td>
                                <td>
                                    <form action="{{ route('berobat.hapusobat', $berobat->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="text" hidden name="obathapus" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div><!-- card -->
                </div><!-- col-6 -->
              </div>
        </div>
    </div><!-- am-pagebody -->
  </div><!-- am-mainpanel -->
@endsection
