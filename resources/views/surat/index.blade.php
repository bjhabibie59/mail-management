@extends('layouts.app')

@section('content')
<div class="container">

    <form method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari judul / nomor" class="form-control">

        <select name="status" class="form-control">
            <option value="">-- Status --</option>
            <option value="draft" {{ request('status')=='draft'?'selected':'' }}>Draft</option>
            <option value="approved" {{ request('status')=='approved'?'selected':'' }}>Approved</option>
        </select>

        <button class="btn btn-primary">Filter</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($surat as $item)
        <tr>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->status }}</td>
            <td>
                @can('view', $item)
                    <a href="{{ route('surat.show', $item) }}" class="btn btn-sm btn-info">Detail</a>
                @endcan
            </td>
        </tr>
        @endforeach
    </table>

    {{ $surat->links() }}
</div>
@endsection
