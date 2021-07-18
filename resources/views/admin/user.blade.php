@extends('admin.index')

@section('content')
<div class="container-fluid">
    <div class="row p-3">
        <div class="justify-content-center">
            <h1>Data Pengguna</h1>
        </div>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr class="table-primary">
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Verifikasi Email</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <th>{{$item->name}}</th>
                <th>{{$item->email}}</th>
                <th align="center">@if ($item->email_verified_at != null)
                    <img src="{{asset('image/verified.png')}}" alt="" height="20px">
                    @else
                    <img src="{{asset('image/cross.png')}}" alt="" height="20px">
                    @endif</th>
                <th>{{date('d-m-Y', strtotime($item->created_at))}}</th>
            </tr>
            @endforeach
    </table>
    <a class="btn btn-primary" href="{{route('register')}}">Create User</a>
</div>
@endsection