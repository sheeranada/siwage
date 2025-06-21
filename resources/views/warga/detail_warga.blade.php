<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detailWarga-{{ $item->id }}">
    <i class="bi bi-eye"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="detailWarga-{{ $item->id }}" tabindex="-1" aria-labelledby="detailWargaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailWargaLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered table-striped display responsive mt-3 mb-3"
                        width="100%">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No Induk</th>
                                <th scope="col">No KK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">JK</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Status Keluarga</th>
                                <th scope="col">Tempat, Tanggal Lahir</th>
                                <th scope="col">Tempat, Tgl Baptis</th>
                                <th scope="col">Tempat, Tgl Sidhi</th>
                                <th scope="col">Tempat, Tgl Menikah</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Talenta</th>
                                <th scope="col">Status Warga</th>
                                <th scope="col">Status Nikah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $item->no_induk }}</td>
                                <td class="text-center">{{ $item->no_kk }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->jk }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td class="text-center">{{ $item->kelompok->nama_kelompok }}</td>
                                <td>{{ $item->statusKeluarga->status_keluarga }}</td>
                                <td>
                                    {{ $item->tempat_lahir === '-' || $item->tanggal_lahir === '30-11--0001' ? 'Belum ditentukan' : $item->tempat_lahir . ', ' . $item->tanggal_lahir }}
                                </td>

                                <td>
                                    {{ $item->tempat_baptis === '-' || $item->tanggal_baptis === '30-11--0001' ? 'Belum ditentukan' : $item->tempat_baptis . ', ' . $item->tanggal_baptis }}
                                </td>
                                <td>
                                    {{ $item->tempat_sidhi === '-' || $item->tanggal_sidhi === '30-11--0001' ? 'Belum ditentukan' : $item->tempat_sidhi . ', ' . $item->tanggal_sidhi }}
                                </td>
                                <td>
                                    {{ $item->tempat_nikah === '-' || $item->tanggal_nikah === '30-11--0001' ? 'Belum ditentukan' : $item->tempat_nikah . ', ' . $item->tanggal_nikah }}
                                </td>
                                <td>{{ $item->pendidikan->pendidikan }}</td>
                                <td>{{ $item->pekerjaan->pekerjaan }}</td>
                                <td>{{ $item->talenta->talenta }}</td>
                                <td>{{ $item->statusWarga->status_warga }}</td>
                                <td>{{ $item->statusNikah->status_nikah }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
