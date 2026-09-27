<x-admin-layouts.app title="{{ $level->exists ? 'Edit Jenjang Pendidikan' : 'Jenjang Pendidikan Baru' }}">
    <form method="POST" action="{{ $level->exists ? route('admin.education.update', $level) : route('admin.education.store') }}" class="grid gap-6 lg:grid-cols-[1fr_320px]">
        @csrf
        @if ($level->exists) @method('PUT') @endif

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div class="grid gap-5 sm:grid-cols-3">
                <div>
                    <label for="name" class="label">Nama Jenjang</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $level->name) }}" placeholder="Contoh: Tahfidz Al-Qur'an" class="field" required>
                    @error('name') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="short_name" class="label">Singkatan</label>
                    <input id="short_name" type="text" name="short_name" value="{{ old('short_name', $level->short_name) }}" placeholder="Contoh: Tahfidz" class="field">
                </div>
                <div>
                    <label for="icon" class="label">Ikon</label>
                    <input id="icon" type="text" name="icon" value="{{ old('icon', $level->icon) }}" placeholder="book-open, users, dll." class="field">
                    <p class="mt-1.5 text-xs text-muted">book-open · book · users · graduation-cap · compass · target · layers</p>
                </div>
            </div>
<div>
                    <label for="description" class="label">Deskripsi</label>
                    <textarea id="description" name="description" rows="3" placeholder="Deskripsi singkat untuk kartu..." class="field resize-y">{{ old('description', $level->description) }}</textarea>
                </div>
                <div>
                    <label for="duration" class="label">Masa Belajar</label>
                    <input id="duration" type="text" name="duration" value="{{ old('duration', $level->duration) }}" placeholder="Contoh: ±1 Tahun 9 Bulan" class="field">
                </div>
            <div>
                <label for="overview" class="label">Overview</label>
                <textarea id="overview" name="overview" rows="5" placeholder="Penjelasan umum jenjang..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('overview', $level->overview) }}</textarea>
            </div>
            <div>
                <label for="objectives" class="label">Tujuan</label>
                <textarea id="objectives" name="objectives" rows="5" placeholder="Tujuan jenjang..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('objectives', $level->objectives) }}</textarea>
            </div>
            <div>
                <label for="curriculum" class="label">Kurikulum</label>
                <textarea id="curriculum" name="curriculum" rows="6" placeholder="Isi kurikulum..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('curriculum', $level->curriculum) }}</textarea>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="programs" class="label">Program</label>
                    <textarea id="programs" name="programs" rows="5" placeholder="Program yang diselenggarakan..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('programs', $level->programs) }}</textarea>
                </div>
                <div>
                    <label for="activities" class="label">Kegiatan</label>
                    <textarea id="activities" name="activities" rows="5" placeholder="Kegiatan penunjang..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('activities', $level->activities) }}</textarea>
                </div>
            </div>
            <div>
                <label for="info" class="label">Informasi Lainnya</label>
                <textarea id="info" name="info" rows="4" placeholder="Informasi tambahan..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('info', $level->info) }}</textarea>
            </div>
        </div>

        <div class="space-y-5">
            <div class="rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <label for="order_column" class="label">Urutan Tampil</label>
                <input id="order_column" type="number" name="order_column" value="{{ old('order_column', $level->order_column ?? 0) }}" min="0" class="field">
                <p class="mt-2 text-xs text-muted">Angka lebih kecil tampil lebih awal.</p>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="btn-primary flex-1">
                    <x-icon name="check" class="h-4 w-4" />
                    Simpan Jenjang
                </button>
                <a href="{{ route('admin.education.index') }}" class="btn-outline">Batal</a>
            </div>
        </div>
    </form>
</x-admin-layouts.app>