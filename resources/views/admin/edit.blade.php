@extends('admin.index')

@section('content')
<form action="">
    @csrf
    <div class="form-group"><label for="title">Nama Bencana</label><input type="text" class="form-control"></div>
</form>
@endsection