<div class="table-responsive">
    <table class="table table-striped mb-0 table-bordered table-hover">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Induk</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th style="width: 250px">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i => $warga)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $warga->nama }}</td>
                    <td class="text-center">{{ $warga->no_induk }}</td>
                    <td>{{ $warga->alamat }}</td>
                    <td>{{ $warga->no_telp }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('keluarga.detail', ['kode' => explode('.', $warga->no_induk)[0]]) }}"
                                class="btn btn-sm btn-info">
                                <i class="fas fa-info-circle"></i> Tampilkan anggota keluarga
                            </a>
                        </div>
                    </td>


                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Tidak ada kepala keluarga ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@if (method_exists($data, 'links'))
    <div class="paginasi-halaman mt-3">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
@endif
