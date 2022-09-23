@extends('layouts.main')
@section('container')
    <h1>Daftar Barang</h1>
    <div class="row d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-md-4">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createBarang">Tambah Barang</button>
        </div>
        <div class="col-lg-4">
            </form>
        </div>
    </div>
    <div class="row mx-1 dashboard-con">
        <div class="table-responsive-lg">
            <table class="table">
                <thead>
                    <tr class="text-center" style="color: #2f4b77">
                        <td scope="col"><h6 class="fw-bold">#</h6></td>
                        <td scope="col"><h6 class="fw-bold">Nama Barang</h6></td>
                        <td scope="col"><h6 class="fw-bold">Harga</h6></td>
                        <td scope="col"><h6 class="fw-bold">Jumlah Stok</h6></td>
                        <td scope="col"><h6 class="fw-bold">Action </h6></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($barang as $item)
                    <tr class="text-center align-middle">
                        <td scope="row">{{ $i++ }}</th>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <form action="/barang/{{ $item->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <a id="edit-brg" class="btn text-warning" data-bs-toggle="modal" data-bs-target="#editBarang" data-id="{{ $item->id }}"><i class="fa fa-pencil-square"></i></a>
                            <button class="btn text-danger" onclick="return confirm('Are you sure want to delete {{ $item->nama_barang }}?')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="createBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/barang" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <label class="col-form-label fw-bold" for="name">Nama Barang</label>
                            <input type="" name="nama_barang" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Barang" value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="col-form-label fw-bold" for="name">Harga Barang</label>
                            <input type="" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga Barang" value="{{ old('harga') }}">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $harga }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="col-form-label fw-bold" for="name">Jumlah Barang</label>
                            <input type="" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah Barang" value="{{ old('jumlah') }}">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $jumlah }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer mb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                            {{-- <button class="btn btn-warning" onclick="return confirm('Are you sure want to change status from {{ $pipeline->status }} to ?')" type="submit">Request</button> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editBarangForm" action="/barang" method="POST">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="edt-id" name="id" class="form-control @error('name') is-invalid @enderror" placeholder="username" value="{{ old('name') }}">

                        <div class="modal-body">
                        <div class="mb-1">
                            <label class="col-form-label fw-bold" for="name">Nama Barang</label>
                            <input id="edt-nama"type="" name="nama_barang" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Barang" value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="col-form-label fw-bold" for="name">Harga Barang</label>
                            <input id="edt-harga" type="" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga Barang" value="{{ old('harga') }}">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $harga }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label class="col-form-label fw-bold" for="name">Jumlah Barang</label>
                            <input id="edt-jumlah" type="" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah Barang" value="{{ old('jumlah') }}">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $jumlah }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer mb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                            {{-- <button class="btn btn-warning" onclick="return confirm('Are you sure want to change status from {{ $pipeline->status }} to ?')" type="submit">Request</button> --}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
@endsection