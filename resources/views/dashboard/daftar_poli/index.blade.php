<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5><b>{{ $title }}</b></h5>
                <a href="/daftar_poli/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>Tambah</a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Poli</th>
                        <th>Dokter</th>
                        <th>Hari</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Antrian</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($daftar_poli as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jadwalPeriksa->dokter->poli->nama_poli }}</td>
                        <td>{{ $item->jadwalPeriksa->dokter->nama }}</td>
                        <td>{{ $item->jadwalPeriksa->hari }}</td>
                        <td>{{ $item->jadwalPeriksa->jam_mulai }}</td>
                        <td>{{ $item->jadwalPeriksa->jam_selesai }}</td>
                        <td>{{ $item->no_antrian }}</td>
                        <td>
                            <span class="badge {{ $item->periksa ? 'badge-soft-success' : 'badge-soft-warning' }}">{{ $item->periksa ? 'Selesai' : 'Menunggu Pemeriksaan' }}</span>
                        </td>
                        <td>
                        <a href="/daftar_poli/{{ $item->id }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Detail</a>
                            </a>
                        </td>
                    </tr> 
                    @endforeach     
                </table>
            </div>
        </div>
    </div>
</div>
