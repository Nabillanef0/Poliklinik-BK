<div class="row p-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/jadwal_periksa/{{ $jadwal_periksa->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <label for="hari">Hari</label>
                        <input type="text" name="hari" class="form-control @error('hari') is-invalid @enderror" placeholder="Hari" value="{{ old('hari', $jadwal_periksa->hari) }}" disabled>
                        @error('hari')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="text" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" placeholder="Jam Mulai" value="{{ old('jam_mulai', $jadwal_periksa->jam_mulai) }}" disabled>
                        @error('jam_mulai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="text" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid @enderror" placeholder="Jam Selesai" value="{{ old('jam_selesai', $jadwal_periksa->jam_selesai) }}" disabled>
                        @error('jam_selesai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="status">Status</label>
                        <select class="form-control select2" id="status" name="status" required>
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>

                        <br>
                        <a href="/jadwal_periksa" class="btn btn-info mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>