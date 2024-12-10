<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <h5><b>{{ $title }}</b></h5>
            @isset($poli)
                <form action="/poli/{{ $poli->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form action="/poli" method="POST" enctype="multipart/form-data">
            @endisset

                @csrf

                <!-- Input Nama Poli -->
                <label for="nama_poli">Nama Poli</label>
                <input type="text" id="nama_poli" name="nama_poli" class="form-control @error('nama_poli') is-invalid @enderror" placeholder="Nama Poli" value="{{ isset($poli) ? $poli->nama_poli : old('nama_poli') }}">
                @error('nama_poli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <!-- Input Keterangan -->
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan">{{ isset($poli) ? $poli->keterangan : old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <br>
                <!-- Button Back and Save -->
                <a href="/poli" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>

            </form>
            </div>
        </div>
    </div>
</div>
