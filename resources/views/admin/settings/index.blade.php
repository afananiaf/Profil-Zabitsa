<x-admin-layouts.app title="Pengaturan Website">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="grid gap-6 lg:grid-cols-2">
        @csrf

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <h2 class="font-sans text-lg text-primary">Tampilan & Informasi Umum</h2>
            <div>
                <label for="site_logo" class="label">Logo Website</label>
                <div class="flex items-center gap-4">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-full bg-primary text-goldlight" aria-hidden="true">
                        @if (!empty($settings['site_logo']))
                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo saat ini" class="h-full w-full rounded-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" fill="none" class="h-8 w-8">
                                <g stroke="#E4D29A" stroke-width="1.4">
                                    <circle cx="22" cy="22" r="19" opacity="0.55" />
                                    <path d="M22 8l4.8 9.2L36 22l-9.2 4.8L22 36l-4.8-9.2L8 22l9.2-4.8z" opacity="0.95" />
                                </g>
                            </svg>
                        @endif
                    </span>
                    <div class="flex-1">
                        <input id="site_logo" type="file" name="site_logo" accept="image/jpeg,image/png,image/webp,image/svg+xml" class="block w-full cursor-pointer rounded-lg border border-line bg-white text-sm text-muted file:mr-3 file:rounded-lg file:border-0 file:bg-primary file:px-3 file:py-1.5 file:text-xs file:font-semibold file:uppercase file:tracking-wide file:text-goldlight hover:file:bg-primary-solid">
                        <p class="mt-1.5 text-xs text-muted">JPG, PNG, WebP, atau SVG. Maks 2 MB. Kosongkan bila ingin mempertahankan logo saat ini.</p>
                    </div>
                </div>
                @if (!empty($settings['site_logo']))
                    <label class="mt-3 inline-flex items-center gap-2 text-xs text-muted">
                        <input type="checkbox" name="remove_site_logo" value="1" class="rounded border-line text-primary focus:ring-primary">
                        Hapus logo dan kembalikan ke logo bawaan
                    </label>
                @endif
                @error('site_logo') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="announcement_text" class="label">Teks Pengumuman (Announcement Bar)</label>
                <input id="announcement_text" type="text" name="announcement_text" value="{{ $settings['announcement_text'] ?? '' }}" placeholder="Selamat Datang di Website Resmi Wilayah Zaid bin Tsabit" class="field">
                <p class="mt-1.5 text-xs text-muted">Kosongkan untuk menyembunyikan bar pengumuman di bagian atas website.</p>
            </div>
            <div>
                <label for="contact_address" class="label">Alamat</label>
                <input id="contact_address" type="text" name="contact_address" value="{{ $settings['contact_address'] ?? '' }}" placeholder="Alamat resmi wilayah" class="field">
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="contact_email" class="label">Email Resmi</label>
                    <input id="contact_email" type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" placeholder="info@wilayahzaidbintsabit.id" class="field">
                    @error('contact_email') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="contact_phone" class="label">Nomor Telepon</label>
                    <input id="contact_phone" type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" placeholder="+62 000-0000-0000" class="field">
                </div>
            </div>
        </div>

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <h2 class="font-sans text-lg text-primary">Media Sosial</h2>
            @php
                $socialFields = [
                    'social_facebook' => ['label' => 'Facebook', 'placeholder' => 'https://facebook.com/...'],
                    'social_instagram' => ['label' => 'Instagram', 'placeholder' => 'https://instagram.com/...'],
                    'social_youtube' => ['label' => 'YouTube', 'placeholder' => 'https://youtube.com/@...'],
                    'social_twitter' => ['label' => 'X (Twitter)', 'placeholder' => 'https://x.com/...'],
                    'social_tiktok' => ['label' => 'TikTok', 'placeholder' => 'https://tiktok.com/@...'],
                ];
            @endphp
            @foreach ($socialFields as $key => $field)
                <div>
                    <label for="{{ $key }}" class="label">{{ $field['label'] }}</label>
                    <input id="{{ $key }}" type="url" name="{{ $key }}" value="{{ $settings[$key] ?? '' }}" placeholder="{{ $field['placeholder'] }}" class="field">
                    @error($key) <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
            @endforeach
            <p class="text-xs text-muted">Kosongkan untuk menyembunyikan ikon media sosial dari footer dan halaman kontak.</p>
        </div>

        <div class="lg:col-span-2">
            <button type="submit" class="btn-primary">
                <x-icon name="check" class="h-4 w-4" />
                Simpan Pengaturan
            </button>
        </div>
    </form>
</x-admin-layouts.app>