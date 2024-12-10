<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <h5><b>{{ $title }}</b></h5>
            @isset($daftar_poli)
                <form action="/daftar_poli/{{ $daftar_poli->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
            @else
                <form action="/daftar_poli" method="POST" enctype="multipart/form-data">
            @endisset

                @csrf

                <input type="hidden" value="12" name="id_pasien">
                <div class="mb-3">
                  <label for="no_rm" class="form-label">Nomor Rekam Medis</label>
                  <input type="text" name="no_rm" id="no_rm"  class="form-control @error('no_rm') is-invalid @enderror" value="{{ auth()->user()->pasien->no_rm }}" readonly>
                </div>

                <div class="mb-3">
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
                </div>
                
                <div class="mb-3">
                  <label for="inputJadwal" class="form-label">Pilih Jadwal</label>
                  <div class="col-sm-10" id="container_id_jadwal">
                      <p>- Silahkan Pilih Hari</p>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="keluhan" class="form-label">Keluhan</label>
                  <textarea class="form-control" id="keluhan" rows="3" name="keluhan"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  "use strict";

  const getJadwal = () => {
    const id_dokter = $('#id_dokter').val();
    const hari = $('input[name="hari"]:checked').val();
    console.log('id_dokter', id_dokter);
    console.log('hari', hari);
    $.ajax({
        url: `{{ url('/') }}/daftar_poli/data_jadwal_periksa`,
        data: {
            id_dokter: id_dokter,
            hari: hari
        },
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response);
            $('#container_id_jadwal').empty();
            let options = response.map(jadwal => `
                <input type="radio" class="btn-check" name="id_jadwal" id="${jadwal.id}" value="${jadwal.id}">
                <label class="btn btn-outline-warning btn-sm" for="${jadwal.id}">
                    ${jadwal.dokter.nama}
                    <br>
                    ${jadwal.hari}
                    <br>
                    ${jadwal.jam_mulai} - ${jadwal.jam_selesai}
                </label>
            `);

            if (options.length === 0) {
                options = '<p>- Tidak ada jadwal tersedia</p>';
            }
            $('#container_id_jadwal').html(options);
        }
    });
  }

  jQuery(document).ready(function() {
      $(document.body).on("change","#id_poli",function(){
          getJadwal();
      });
  });
</script>
