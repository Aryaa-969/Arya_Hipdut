@extends('Admin.layout.Admin.app')

@section('content')
    <main class="content">

        <h3 class="mb-4">Detail Pelanggan</h3>

        <div class="card mb-4">
            <div class="card-body">
                <h5>{{ $pelanggan->first_name }} {{ $pelanggan->last_name }}</h5>
                <p>Email: {{ $pelanggan->email }}</p>
                <p>Phone: {{ $pelanggan->phone }}</p>
            </div>
        </div>

        {{-- Upload Multiple Files --}}
        <div class="card">
            <div class="card-header">
                <h5>File Pendukung</h5>
            </div>
            <div class="card-body">

                <form action="{{ route('pelanggan.uploadFiles', ['id' => $pelanggan->pelanggan_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="files[]" multiple class="form-control mb-3">

                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>


                <hr>

                <h6>File yang sudah di-upload:</h6>
                <ul class="list-group">
                    @foreach ($files as $file)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">
                                {{ basename($file->file_path) }}
                            </a>

                            <form action="{{ route('pelanggan.deleteFile', $file->id) }}" method="POST"
                                onsubmit="return confirm('Hapus file ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

    </main>
@endsection
