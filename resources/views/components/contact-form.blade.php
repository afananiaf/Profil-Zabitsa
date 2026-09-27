@props([])

<div class="rounded-xl border border-line bg-white p-7 shadow-[0_1px_3px_rgba(11,59,46,0.05)] sm:p-9">
    <h2 class="font-sans text-xl text-primary">Kirim Pesan</h2>
    <p class="mt-2 text-sm leading-6 text-muted">Silakan isi formulir berikut. Pesan Anda akan tersimpan dan ditindaklanjuti oleh pengurus.</p>

    @if (session('success'))
        <div class="mt-6 flex items-start gap-3 rounded-md border border-secondary/20 bg-secondary/5 p-4" role="status">
            <x-icon name="check-circle" class="mt-0.5 h-5 w-5 shrink-0 text-secondary" />
            <p class="text-sm font-medium text-secondary">{{ session('success') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}" class="mt-7 space-y-5" novalidate>
        @csrf
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="name" class="label">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama Anda" class="field" required>
                @error('name') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="email" class="label">Alamat Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@contoh.id" class="field" required>
                @error('email') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>
        <div>
            <label for="subject" class="label">Subjek</label>
            <input id="subject" type="text" name="subject" value="{{ old('subject') }}" placeholder="Subjek pesan" class="field" required>
            @error('subject') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="message" class="label">Pesan</label>
            <textarea id="message" name="message" rows="6" placeholder="Tuliskan pesan Anda..." class="field resize-y" required>{{ old('message') }}</textarea>
            @error('message') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="btn-primary w-full sm:w-auto sm:!px-8">
            <x-icon name="send" class="h-4 w-4" />
            Kirim Pesan
        </button>
    </form>
</div>