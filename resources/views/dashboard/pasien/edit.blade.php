<div class="row p-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/pasien/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Pasien" value="{{ old('nama', $pasien->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat">{{ old('alamat', $pasien->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="no_ktp">No KTP</label>
                        <textarea name="no_ktp" class="form-control @error('no_ktp') is-invalid @enderror" placeholder="No KTP">{{ old('no_ktp', $pasien->no_ktp) }}</textarea>
                        @error('no_ktp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="no_hp">No HP</label>
                        <textarea name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No HP">{{ old('no_hp', $pasien->no_hp) }}</textarea>
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
                            value="{{ old('no_rm', $pasien->no_rm) }}" 
                            readonly>
                        @error('no_rm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <br>
                        <a href="/pasien" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>