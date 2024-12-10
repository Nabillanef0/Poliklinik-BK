<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5><b>{{ $title }}</b></h5>
                <a href="/jadwal_periksa/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>Tambah</a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($jadwal_periksa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->dokter->nama }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->jam_mulai }}</td>
                        <td>{{ $item->jam_selesai }}</td>
                        <td>
                            @if ($item->status)
                                <span class="badge badge-soft-success">Aktif</span>
                            @else 
                                <span class="badge badge-soft-danger">Tidak Aktif</span>    
                            @endif
                        </td>
                        <td>
                            <a href="/jadwal_periksa/{{ $item->id }}/edit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Edit</a>
                        </div>
                        </td>
                    </tr> 
                    @endforeach   
                </table>
            </div>
        </div>
    </div>
</div>
