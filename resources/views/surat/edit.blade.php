@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Surat</h3>

    @include('components.alert')

    <form action="{{ route('surat.update', $surat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('surat.form', ['surat' => $surat])

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
