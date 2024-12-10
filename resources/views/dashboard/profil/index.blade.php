<div class="row p-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <label for="name">Nama Dokter</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Dokter" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="alamat">Alamat Dokter</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Dokter">{{ old('alamat', $user->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="no_hp">No HP</label>
                        <textarea name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No HP">{{ old('no_hp', $user->no_hp) }}</textarea>
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <br>
                        <a href="/user" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>