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
                <th>{{$item->masterDisaster->name}}</th>
                <th>{{$item->masterKabupaten->name}}</th>
                <th>{{ $item->created_at->diffForHumans()}} | {{date('d-m-Y', strtotime($item->created_at))}}</th>
            </tr>
            @endforeach
            {{-- {{ $disaster->links() }} --}}
    </table>
</div>
@endsection