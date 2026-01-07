@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>

        <div class="mb-3">
            <label>File Surat</label>
            <input type="file" name="file" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
