<x-admin-layouts.app title="Kelola Struktur Organisasi">
    @php
        $levelNames = ['Pengarah & Pengawas', 'Pimpinan Eksekutif', 'Pelaksana Teknis'];
    @endphp
    <div class="flex items-center justify-between gap-4">
        <p class="text-sm text-muted">Susunan kepengurusan wilayah berdasarkan tingkatan: {{ implode(' · ', $levelNames) }}.</p>
        <a href="{{ route('admin.structures.create') }}" class="btn-primary !px-4 !py-2.5 text-[13px]">
            <x-icon name="plus" class="h-4 w-4" />
            Tambah Bagian
        </a>
    </div>

    <div class="mt-6 space-y-4">
        @forelse ($structures as $node)
            @include('admin.structures._node', ['node' => $node, 'level' => 0, 'levelNames' => $levelNames])
        @empty
            <div class="rounded-lg border border-dashed border-line bg-white p-12 text-center">
                <x-icon name="building-2" class="mx-auto h-8 w-8 text-gold" />
                <p class="mt-3 font-sans text-lg text-primary">Belum ada struktur</p>
                <p class="mt-1 text-sm text-muted">Tambahkan bagian organisasi untuk mulai menyusun bagan.</p>
            </div>
        @endforelse
    </div>

    <p class="mt-6 text-xs text-muted">Keterangan urutan tingkatan: 1. Pengarah &amp; Pengawas, 2. Pimpinan Eksekutif, 3. Pelaksana Teknis.</p>
</x-admin-layouts.app>