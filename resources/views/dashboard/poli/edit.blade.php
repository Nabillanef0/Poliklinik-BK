<div class="row p-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/poli/{{ $poli->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <label for="nama_poli">Nama Poli</label>
                        <input type="text" name="nama_poli" class="form-control @error('nama_poli') is-invalid @enderror" placeholder="Nama Poli" value="{{ old('nama_poli', $poli->nama_poli) }}">
                        @error('nama_poli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan">{{ old('keterangan', $poli->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <br>
                        <a href="/poli" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>