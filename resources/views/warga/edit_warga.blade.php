<x-modal-lg id="editWarga-{{ $item->id }}" btn-label="" action="{{ route('warga.update', $item->id) }}" method="PUT"
    icon="bi-pen" btn="warning">
    <div class="d-flex align-items-center my-3">
        <hr class="flex-grow-1">
        <div class="px-3 fw-bold text-muted text-uppercase small">Identitas Dasar</div>
        <hr class="flex-grow-1">
    </div>
    <div class="row">
        <div class="col-md-12">
            <x-form.input name="nama" label="Nama" value="{{ $item->nama ?? '' }}" type="text"
                :required="true" />
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat warga" id="alamat"
                    name="alamat">{{ $item->alamat }}</textarea>
                <label for="alamat">
                    Alamat <span class="text-danger">*</span>
                </label>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <x-form.select name="jk" label="Jenis Kelamin">
                <option selected value="{{ $item->jk }}">{{ $item->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </x-form.select>
        </div>
        <div class="col-md-6">
            <x-form.input name="no_telp" label="No Telp" value="{{ $item->no_telp ?? '' }}" type="text" />
        </div>
        <div class="col-md-6">
            <x-form.input name="tempat_lahir" label="Tempat Lahir" value="{{ $item->tempat_lahir ?? '' }}"
                type="text" :required="true" />
        </div>
        <div class="col-md-6">
            <x-form.input name="tanggal_lahir" label="Tanggal Lahir" value="{{ $item->tanggal_lahir ?? '' }}"
                type="date" :required="true" />
        </div>
        <div class="col-md-6">
            <x-form.input name="no_kk" label="No KK" value="{{ $item->no_kk ?? '' }}" type="text"
                :required="true" />
        </div>
        <div class="col-md-6">
            <x-form.input name="catatan" label="Catatan" value="{{ $item->catatan ?? '' }}" type="text" />
        </div>
        <div class="col-md-6">
            <x-form.select name="status_keluarga_id" label="Status Keluarga">
                <option selected value="{{ $item->statusKeluarga->id }}">{{ $item->statusKeluarga->status_keluarga }}
                </option>
                @foreach ($statusKeluargas as $statusKeluarga)
                    <option value="{{ $statusKeluarga->id }}">{{ $statusKeluarga->status_keluarga }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div class="col-md-6">
            <x-form.select name="status_nikah_id" label="Status Nikah">
                <option selected value="{{ $item->statusNikah->id }}">{{ $item->statusNikah->status_nikah }}</option>
                @foreach ($statusNikahs as $statusNikah)
                    <option value="{{ $statusNikah->id }}">{{ $statusNikah->status_nikah }}</option>
                @endforeach
            </x-form.select>
        </div>
    </div>
    <div class="d-flex align-items-center my-3">
        <hr class="flex-grow-1">
        <div class="px-3 fw-bold text-muted text-uppercase small">Latar Belakang Personal</div>
        <hr class="flex-grow-1">
    </div>
    <div class="row">
        <div class="col-md-4">
            <x-form.select name="pendidikan_id" label="Pendidikan">
                <option selected value="{{ $item->pendidikan->id }}">{{ $item->pendidikan->pendidikan }}</option>
                @foreach ($pendidikans as $pendidikan)
                    <option value="{{ $pendidikan->id }}">{{ $pendidikan->pendidikan }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div class="col-md-4">
            <x-form.select name="talenta_id" label="Talenta">
                <option selected value="{{ $item->talenta->id }}">{{ $item->talenta->talenta }}</option>
                @foreach ($talentas as $talenta)
                    <option value="{{ $talenta->id }}">{{ $talenta->talenta }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div class="col-md-4">
            <x-form.select name="pekerjaan_id" label="Pekerjaan">
                <option selected value="{{ $item->pekerjaan->id }}">{{ $item->pekerjaan->pekerjaan }}</option>
                @foreach ($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->pekerjaan }}</option>
                @endforeach
            </x-form.select>
        </div>
    </div>
    <div class="d-flex align-items-center my-3">
        <hr class="flex-grow-1">
        <div class="px-3 fw-bold text-muted text-uppercase small">Data Sakramen</div>
        <hr class="flex-grow-1">
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.input name="tempat_baptis" label="Tempat Baptis" value="{{ $item->tempat_baptis ?? '' }}"
                type="text" />
        </div>
        <div class="col-md-6">
            <x-form.input name="tanggal_baptis" label="Tanggal Baptis" value="{{ $item->tanggal_baptis ?? '' }}"
                type="date" />
        </div>
        <div class="col-md-6">
            <x-form.input name="tempat_sidhi" label="Tempat Sidhi" value="{{ $item->tempat_sidhi ?? '' }}"
                type="text" />
        </div>
        <div class="col-md-6">
            <x-form.input name="tanggal_sidhi" label="Tanggal Sidhi" value="{{ $item->tanggal_sidhi ?? '' }}"
                type="date" />
        </div>
        <div class="col-md-6">
            <x-form.input name="tempat_nikah" label="Tempat Nikah" value="{{ $item->tempat_nikah ?? '' }}"
                type="text" />
        </div>
        <div class="col-md-6">
            <x-form.input name="tanggal_nikah" label="Tanggal Nikah" value="{{ $item->tanggal_nikah ?? '' }}"
                type="date" />
        </div>
    </div>
    <div class="d-flex align-items-center my-3">
        <hr class="flex-grow-1">
        <div class="px-3 fw-bold text-muted text-uppercase small">Keanggotaan Gereja</div>
        <hr class="flex-grow-1">
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-form.select name="kelompok_id" label="Pilih Kelompok">
                <option selected value="{{ $item->kelompok->kode_kelompok }}">{{ $item->kelompok->nama_kelompok }}
                </option>
                @foreach ($kelompoks as $kelompok)
                    <option value="{{ $kelompok->kode_kelompok }}">{{ $kelompok->nama_kelompok }}</option>
                @endforeach
            </x-form.select>
        </div>
        <div class="col-md-6">
            <x-form.select name="status_warga_id" label="Status Warga">
                <option selected value="{{ $item->statusWarga->id }}">{{ $item->statusWarga->status_warga }}</option>
                @foreach ($statusWargas as $statusWarga)
                    <option value="{{ $statusWarga->id }}">{{ $statusWarga->status_warga }}</option>
                @endforeach
            </x-form.select>
        </div>
    </div>
</x-modal-lg>
