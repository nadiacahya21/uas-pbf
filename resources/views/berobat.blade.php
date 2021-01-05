@extends('layouts.admin')

@section('content')
<div class="am-mainpanel">

    <div class="am-pagetitle">
      <h5 class="am-title">Data Berobat</h5>
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
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
        <div class="card pd-20 pd-sm-40">
            <div class="table-responsive">
              <table class="table mg-b-0">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Pasien</th>
                    <th>Umur</th>
                    <th>Dokter</th>
                    <th>Rekam Medis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($berobat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->pasien->nama_pasien }}</td>
                        <td>{{ $item->pasien->umur }}</td>
                        <td>{{ $item->dokter->nama_dokter }}</td>
                        <td><a href="{{ route('berobat.edit', $item->id) }}" class="btn btn-primary">Rekam Medis</a></td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{ $item->id }}">Edit</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{ $item->id }}">Hapus</button>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!-- MODAL TAMBAH -->
        <div id="modalTambah" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('berobat.store') }}" method="POST">
                    @csrf
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Form Input</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                        <label class="form-control-label">Tanggal: <span class="tx-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" required class="form-control">
                        <label class="form-control-label">Pasien: <span class="tx-danger">*</span></label>
                        <select name="id_pasien" id="id_pasien" required class="form-control">
                            @foreach ($pasien as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pasien }}</option>
                            @endforeach
                        </select>
                        <label class="form-control-label">Dokter: <span class="tx-danger">*</span></label>
                        <select name="id_dokter" id="id_dokter" required class="form-control">
                            @foreach ($dokter as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_dokter }}</option>
                            @endforeach
                        </select>

                    </div><!-- modal-body -->
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Simpan</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">batal</button>
                    </div>
                </form>
            </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- MODAL EDIT -->
        @foreach ($berobat as $item)
        <div id="modalEdit{{ $item->id }}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('berobat.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Form Input</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                        <label class="form-control-label">Tanggal: <span class="tx-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ $item->tanggal }}" required class="form-control">
                        <label class="form-control-label">Pasien: <span class="tx-danger">*</span></label>
                        <select name="id_pasien" id="id_pasien" required class="form-control">
                            @foreach ($pasien as $p)
                            <option value="{{ $p->id }}" @if ($p->id == $item->pasien->id)
                                    selected
                                @endif>{{ $p->nama_pasien }}</option>
                            @endforeach
                        </select>
                        <label class="form-control-label">Dokter: <span class="tx-danger">*</span></label>
                        <select name="id_dokter" id="id_dokter" required class="form-control">
                            @foreach ($dokter as $d)
                                <option value="{{ $d->id }}" @if ($d->id == $item->dokter->id)
                                    selected
                                @endif>{{ $d->nama_dokter }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Simpan</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">batal</button>
                </div>
                </form>
            </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        @endforeach

        <!-- MODAL HAPUS -->
        @foreach ($berobat as $item)
        <div id="modalHapus{{ $item->id }}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('berobat.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Pesan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                    <h4 class=" lh-3 mg-b-20"><a href="" class="tx-inverse hover-primary">Hapus data</a></h4>
                    <p class="mg-b-5">Yakin menghapus data?</p>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Ya</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        @endforeach
    </div><!-- am-pagebody -->
  </div><!-- am-mainpanel -->
@endsection
