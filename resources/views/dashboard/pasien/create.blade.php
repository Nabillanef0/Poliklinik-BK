<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <h5><b>{{ $title }}</b></h5>
            @isset($pasien)
                <form action="/pasien/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form action="/pasien" method="POST" enctype="multipart/form-data">
            @endisset

                @csrf

                <label for="nama">Nama Pasien</label>
                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Pasien" value="{{ isset($pasien) ? $pasien->nama : old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{ isset($pasien) ? $pasien->alamat : old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="no_ktp">No. KTP</label>
                <textarea name="no_ktp" id="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" placeholder="No KTP">{{ isset($pasien) ? $pasien->no_ktp : old('no_ktp') }}</textarea>
                @error('no_ktp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="no_hp">No. HP</label>
                <textarea name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No HP">{{ isset($pasien) ? $pasien->no_hp : old('no_hp') }}</textarea>
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="no_rm">No. RM</label>
                <input 
                    type="text" 
                    name="no_rm" 
                    id="no_rm" 
                    class="form-control @error('no_rm') is-invalid @enderror" 
                    value="{{ old('no_rm', $noRM) }}" 
                    readonly>
                @error('no_rm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <br>
                <!-- Button Back and Save -->
                <a href="/pasien" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>

            </form>
            </div>
        </div>
    </div>
</div>
