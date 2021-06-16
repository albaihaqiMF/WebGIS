@extends('admin.index')

@section('style')
<style>
    table {
        display: flex;
        flex-flow: column;
        width: 100%;
    }

    thead {
        flex: 0 0 auto;
    }

    tbody {
        flex: 1 1 auto;
        display: block;
        overflow-y: auto;
        overflow-x: hidden;
    }

    tr {
        width: 100%;
        display: table;
        table-layout: fixed;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row p-3">
        <div class="justify-content-center">
            <h1>Data Bencana Provinsi Lampung</h1>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        Masukkan Data Baru
    </button>
    <table class="table table-hover">
        <thead>
            <tr class="table-active">
                <th scope="col">Nama Bencana</th>
                <th scope="col">Jenis Bencana</th>
                <th scope="col">Kabupaten</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disaster as $item)
            <tr>
                <th>{{$item->title}}</th>
                <th>{{$item->masterDisaster->name ?? 'undefined'}}</th>
                <th>{{$item->masterKabupaten->name ?? 'undefined'}}</th>
                <th>{{ $item->created_at->diffForHumans()}} | {{date('d-m-Y', strtotime($item->created_at))}}</th>
            </tr>
            @endforeach
            {{ $disaster->links() }}
    </table>

    <!-- Modal -->
    <form action="{{route('admin.disaster.store')}}" method="POST">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Bencana</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Title">Nama Bencana</label>
                            <input type="text" name="title" class="form-control" id="title">
                            @error('title')
                            <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Date">Tanggal</label>
                            <input type="datetime-local" name="created_at" class="form-control" id="created_at">
                        </div>
                        <div class="form-group">
                            <label for="Kabupaten">Pilih Kabupaten</label>
                            <select class="form-control" id="kabupaten_id" name="kabupaten_id">
                                <option value="15542">Bandar Lampung</option>
                                <option value="15543">Lampung Barat</option>
                                <option value="15544">Lampung Selatan</option>
                                <option value="15545">Lampung Tengah</option>
                                <option value="15546">Lampung Timur</option>
                                <option value="15547">Lampung Utara</option>
                                <option value="15548">Metro</option>
                                <option value="15549">Tanggamus</option>
                                <option value="15550">Tulang Bawang</option>
                                <option value="15551">Way Kanan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Disaster">Pilih Jenis Bencana</label>
                            <select name="disaster_id" class="form-control" id="disaster_id">
                                <option value="18701">Bencana Air</option>
                                <option value="18702">Bencana Angin</option>
                                <option value="18703">Bencana Api</option>
                                <option value="18704">Bencana Tanah</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Selesai</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection