<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <h5><b>{{ $title }}</b></h5>
            @isset($jadwal_periksa)
                <form action="/jadwal_periksa/{{ $jadwal_periksa->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form action="/jadwal_periksa" method="POST" enctype="multipart/form-data">
            @endisset

                @csrf

                <label class="form-label">Hari</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="senin" value="Senin" required>
                    <label class="form-check-label" for="senin">Senin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="selasa" value="Selasa" required>
                    <label class="form-check-label" for="selasa">Selasa</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="rabu" value="Rabu" required>
                    <label class="form-check-label" for="rabu">Rabu</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="kamis" value="Kamis" required>
                    <label class="form-check-label" for="kamis">Kamis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="jumat" value="Jumat" required>
                    <label class="form-check-label" for="jumat">Jumat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="sabtu" value="Sabtu" required>
                    <label class="form-check-label" for="sabtu">Sabtu</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hari" id="minggu" value="Minggu" required>
                    <label class="form-check-label" for="minggu">Minggu</label>
                </div>

                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>

                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>

                <label for="status" class="form-label">Status</label>
                <select class="form-control select2" id="status" name="status" required>
                    <option value="0">Tidak Aktif</option>
                    <option value="1">Aktif</option>
                </select>

                <br>
                <!-- Button Back and Save -->
                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
            </form>
            </div>
        </div>
    </div>
</div>
