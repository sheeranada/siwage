<div class="container">

    {{-- Data Keluarga --}}
    <div class="row mb-3">
        <div class="col-3">
            <x-input label="Kode KK *" name="kode_kk" type="text" :value="$warga->keluarga->kode_kk ?? ''" />
        </div>
        <div class="col-3 mb-3">
            <x-select name="kelompok_id" label="Kelompok*">
                @foreach ($kelompoks as $kelompok)
                    <option value="{{ $kelompok->id }}"
                        {{ $warga->keluarga && $warga->keluarga->kelompok_id == $kelompok->id ? 'selected' : '' }}>
                        {{ $kelompok->nama }} ({{ $kelompok->kode_kelompok }})
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="col-6">
            <x-input label="Catatan" name="catatan" type="text" :value="$warga->keluarga->catatan ?? ''" />
        </div>
    </div>


    {{-- Data Warga --}}
    <div class="row mb-3">
        <div class="col-12">
            <x-input label="Nama Lengkap *" name="nama" type="text" :value="$warga->nama" />
        </div>
        <div class="col-12">
            <x-input label="Alamat *" name="alamat" type="text" :value="$warga->alamat" />
        </div>
        <div class="col-md-3">
            <x-input label="No Telp *" name="telp" type="text" :value="$warga->telp" />
        </div>
        <div class="col-md-3">
            <x-select name="jk" label="Jenis Kelamin*">
                <option value="L" {{ $warga->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $warga->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
            </x-select>
        </div>
        <div class="col-md-3">
            <x-input label="Tempat Lahir *" name="tempat_lahir" type="text" :value="$warga->tempat_lahir" />
        </div>
        <div class="col-md-3">
            <x-input label="Tanggal Lahir *" name="tanggal_lahir" type="date" :value="$warga->tanggal_lahir" />
        </div>
    </div>

    {{-- Data Kompetensi, Status & Pendidikan --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <x-select name="talenta_id" label="Talenta*">
                @foreach ($talentas as $talenta)
                    <option value="{{ $talenta->id }}" {{ $warga->talenta_id == $talenta->id ? 'selected' : '' }}>
                        {{ $talenta->talenta }}
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4">
            <x-select name="pendidikan_id" label="Pendidikan*">
                @foreach ($pendidikans as $p)
                    <option value="{{ $p->id }}" {{ $warga->pendidikan_id == $p->id ? 'selected' : '' }}>
                        {{ $p->pendidikan }}
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4">
            <x-select name="pekerjaan_id" label="Pekerjaan*">
                @foreach ($pekerjaans as $p)
                    <option value="{{ $p->id }}" {{ $warga->pekerjaan_id == $p->id ? 'selected' : '' }}>
                        {{ $p->pekerjaan }}
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4 mt-3">
            <x-select name="status_keluarga_id" label="Status Keluarga*">
                @foreach ($statusKeluarga as $status)
                    <option value="{{ $status->id }}"
                        {{ $warga->status_keluarga_id == $status->id ? 'selected' : '' }}>
                        {{ $status->status_keluarga }}
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4 mt-3">
            <x-select name="status_warga_id" label="Status Warga*">
                @foreach ($statusWarga as $status)
                    <option value="{{ $status->id }}"
                        {{ $warga->status_warga_id == $status->id ? 'selected' : '' }}>
                        {{ $status->status_warga }}
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4 mt-3">
            <x-select name="status_nikah_id" label="Status Nikah*">
                @foreach ($statusNikah as $status)
                    <option value="{{ $status->id }}"
                        {{ $warga->status_nikah_id == $status->id ? 'selected' : '' }}>
                        {{ $status->status_nikah }}
                    </option>
                @endforeach
            </x-select>
        </div>
    </div>

    {{-- Data Baptis, Sidhi & Nikah --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <x-input label="Tempat Baptis *" name="tempat_baptis" type="text" :value="$warga->tempat_baptis" />
        </div>
        <div class="col-md-2">
            <x-input label="Tanggal Baptis *" name="tanggal_baptis" type="date" :value="$warga->tanggal_baptis" />
        </div>
        <div class="col-md-4">
            <x-input label="Tempat Sidhi *" name="tempat_sidhi" type="text" :value="$warga->tempat_sidhi" />
        </div>
        <div class="col-md-2">
            <x-input label="Tanggal Sidhi *" name="tanggal_sidhi" type="date" :value="$warga->tanggal_sidhi" />
        </div>
        <div class="col-md-4 mt-3">
            <x-input label="Tempat Menikah *" name="tempat_menikah" type="text" :value="$warga->tempat_menikah" />
        </div>
        <div class="col-md-2 mt-3">
            <x-input label="Tanggal Menikah *" name="tanggal_menikah" type="date" :value="$warga->tanggal_menikah" />
        </div>
    </div>
</div>
