@extends('layouts.admin')

@section('content')
<div class="am-mainpanel">

    <div class="am-pagetitle">
      <h5 class="am-title">Data Pasien</h5>
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
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_pasien }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->umur }}</td>
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
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Form Input</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                        <label class="form-control-label">Nama Pasien: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan nama pasien" name="nama_pasien" required>
                        <label class="form-control-label">Umur: <span class="tx-danger">*</span></label>
                        <input type="number" min="1" class="form-control" placeholder="Masukkan umur" name="umur" required>
                        <label> Jenis Kelamin:  <span class="tx-danger">*</span> </label>
                        <label class="rdiobox">
                            <input name="jenis_kelamin" type="radio" value="Pria">
                            <span>Pria</span>
                        </label>
                        <label class="rdiobox">
                            <input name="jenis_kelamin" type="radio" value="Wanita">
                            <span>Wanita</span>
                        </label>

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
        @foreach ($pasien as $item)
        <div id="modalEdit{{ $item->id }}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('pasien.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Form Input</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body pd-20">
                        <label class="form-control-label">Nama Pasien: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Masukkan nama pasien" value="{{ $item->nama_pasien }}" name="nama_pasien" required>
                        <label class="form-control-label">Umur: <span class="tx-danger">*</span></label>
                        <input type="number" min="1" class="form-control" value="{{ $item->umur }}" placeholder="Masukkan umur" name="umur" required>
                        <label> Jenis Kelamin:  <span class="tx-danger">*</span> </label>
                        <label class="rdiobox">
                            <input name="jenis_kelamin" type="radio" value="Pria" @if ($item->nama_pasien == "Pria")
                                selected
                            @endif>
                            <span>Pria</span>
                        </label>
                        <label class="rdiobox">
                            <input name="jenis_kelamin" type="radio" value="Wanita" @if ($item->nama_pasien == "Wanita")
                                selected @endif>
                            <span>Wanita</span>
                        </label>
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
        @foreach ($pasien as $item)
        <div id="modalHapus{{ $item->id }}" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form action="{{ route('pasien.destroy', $item->id) }}" method="POST">
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
