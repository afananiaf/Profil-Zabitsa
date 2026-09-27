@php
    $address = \App\Models\Setting::get('contact_address', 'Alamat resmi Wilayah Zaid bin Tsabit akan diinformasikan lebih lanjut');
    $email = \App\Models\Setting::get('contact_email', 'info@wilayahzaidbintsabit.id');
    $phone = \App\Models\Setting::get('contact_phone', '+62 000-0000-0000');
@endphp

<x-layouts.app active="contact" title="Kontak — Wilayah Zaid bin Tsabit" description="Hubungi Wilayah Zaid bin Tsabit melalui laman kontak resmi.">

    <x-page-hero title="Kontak" eyebrow="Komunikasi" description="Sampaikan pertanyaan, masukan, atau informasi kepada Wilayah Zaid bin Tsabit." :breadcrumb="true" />

    <div class="container-app py-14 sm:py-16">
        <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="space-y-5">
                <div class="reveal rounded-xl border border-line bg-surface p-7 shadow-[0_1px_3px_rgba(11,43,38,0.05)]">
                    <h2 class="font-serif text-xl text-primary">Hubungi Kami</h2>
                    <ul class="mt-7 space-y-6">
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/8 text-secondary">
                                <x-icon name="map-pin" class="h-5 w-5" />
                            </span>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-muted">Alamat</p>
                                <p class="mt-1.5 text-sm font-medium leading-6 text-primary">{{ $address }}</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/8 text-secondary">
                                <x-icon name="mail" class="h-5 w-5" />
                            </span>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-muted">Email</p>
                                <a href="mailto:{{ $email }}" class="mt-1.5 block text-sm font-medium text-primary transition-colors hover:text-secondary">{{ $email }}</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary/8 text-secondary">
                                <x-icon name="phone" class="h-5 w-5" />
                            </span>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-muted">Telepon</p>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" class="mt-1.5 block text-sm font-medium text-primary transition-colors hover:text-secondary">{{ $phone }}</a>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-7 border-t border-line pt-6">
                        <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-muted">Media Sosial</p>
                        <div class="mt-3 flex gap-2.5">
                            @php
                                $socials = [
                                    'facebook' => \App\Models\Setting::get('social_facebook'),
                                    'instagram' => \App\Models\Setting::get('social_instagram'),
                                    'youtube' => \App\Models\Setting::get('social_youtube'),
                                    'twitter' => \App\Models\Setting::get('social_twitter'),
                                    'tiktok' => \App\Models\Setting::get('social_tiktok'),
                                ];
                            @endphp
                            @forelse (array_filter($socials) as $network => $url)
                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ ucfirst($network) }}" class="flex h-10 w-10 items-center justify-center rounded-full border border-line text-muted transition-all hover:-translate-y-0.5 hover:border-primary hover:bg-primary hover:text-white">
                                    <x-icon :name="$network" class="h-4 w-4" />
                                </a>
                            @empty
                                <p class="text-[13px] italic text-muted">Akun media sosial resmi akan diinformasikan kemudian.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="reveal rounded-xl border border-line bg-cream p-6">
                    <div class="flex items-start gap-3">
                        <x-icon name="info" class="mt-0.5 h-4.5 w-4.5 shrink-0 text-secondary" />
                        <p class="text-[13px] leading-6 text-muted">
                            Informasi kontak di atas merupakan placeholder dan akan diperbarui dengan informasi resmi. Seluruh pesan yang masuk akan ditindaklanjuti oleh pengurus.
                        </p>
                    </div>
                </div>
            </div>

            <div class="reveal" style="transition-delay: 100ms">
                <x-contact-form />
            </div>
        </div>
    </div>

</x-layouts.app>