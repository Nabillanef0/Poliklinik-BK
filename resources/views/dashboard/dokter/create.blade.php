<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <h5><b>{{ $title }}</b></h5>
            @isset($dokter)
                <form action="/dokter/{{ $dokter->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form action="/dokter" method="POST" enctype="multipart/form-data">
            @endisset

                @csrf

                <label for="nama">Nama Dokter</label>
                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Dokter" value="{{ isset($dokter) ? $dokter->nama : old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{ isset($dokter) ? $dokter->alamat : old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="no_hp">No. HP</label>
                <textarea name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No HP">{{ isset($dokter) ? $dokter->no_hp : old('no_hp') }}</textarea>
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="id_poli">Poli</label>
                <select name="id_poli" id="id_poli" class="form-control @error('id_poli') is-invalid @enderror">
                    <option value="">-- Pilih Poli --</option>
                    @foreach($polis as $poli)
                        <option value="{{ $poli->id }}" {{ (isset($dokter) && $dokter->id_poli == $poli->id) || old('id_poli') == $poli->id ? 'selected' : '' }}>
                            {{ $poli->nama_poli }}
                        </option>
                    @endforeach
                </select>
                @error('id_poli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <br>
                <!-- Button Back and Save -->
                <a href="/dokter" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>

            </form>
            </div>
        </div>
    </div>
</div>
