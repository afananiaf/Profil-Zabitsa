<x-admin-layouts.app title="Dashboard">
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @php
            $cards = [
                ['label' => 'Total Berita', 'value' => $stats['news'], 'sub' => $stats['newsPublished'] . ' terbit', 'icon' => 'newspaper', 'route' => 'admin.news.index'],
                ['label' => 'Kegiatan', 'value' => $stats['activities'], 'sub' => 'Agenda wilayah', 'icon' => 'calendar', 'route' => 'admin.activities.index'],
                ['label' => 'Tokoh Aktif', 'value' => $stats['figures'], 'sub' => 'Biografi', 'icon' => 'users', 'route' => 'admin.figures.index'],
                ['label' => 'Dokumen', 'value' => $stats['documents'], 'sub' => 'Pusat unduhan', 'icon' => 'file-text', 'route' => 'admin.documents.index'],
            ];
        @endphp
        @foreach ($cards as $card)
            <a href="{{ route($card['route']) }}" class="group rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(11,36,27,0.08)]">
                <div class="flex items-center justify-between">
                    <span class="flex h-11 w-11 items-center justify-center rounded-md bg-primary/5 text-gold transition-colors group-hover:bg-primary group-hover:text-goldlight">
                        <x-icon :name="$card['icon']" class="h-5 w-5" />
                    </span>
                    <x-icon name="arrow-up-right" class="h-4 w-4 text-muted/40 transition-colors group-hover:text-gold" />
                </div>
                <p class="mt-5 font-sans text-3xl font-bold text-primary">{{ $card['value'] }}</p>
                <p class="mt-1 text-[13px] font-semibold text-ink/80">{{ $card['label'] }}</p>
                <p class="text-xs text-muted">{{ $card['sub'] }}</p>
            </a>
        @endforeach
    </div>

    <div class="mt-6 grid gap-5 rounded-lg border border-gold/30 bg-gold/5 p-5 sm:grid-cols-3">
        <div class="flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-md bg-white text-gold shadow-sm">
                <x-icon name="inbox" class="h-5 w-5" />
            </span>
            <div>
                <p class="font-sans text-2xl font-bold text-primary">{{ $stats['messagesUnread'] }}</p>
                <p class="text-xs font-semibold text-muted">Pesan Belum Dibaca</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-md bg-white text-gold shadow-sm">
                <x-icon name="database" class="h-5 w-5" />
            </span>
            <div>
                <p class="font-sans text-2xl font-bold text-primary">{{ $stats['messages'] }}</p>
                <p class="text-xs font-semibold text-muted">Total Pesan Masuk</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-md bg-white text-gold shadow-sm">
                <x-icon name="check-circle" class="h-5 w-5" />
            </span>
            <div>
                <p class="font-sans text-2xl font-bold text-primary">{{ $stats['newsPublished'] }}</p>
                <p class="text-xs font-semibold text-muted">Berita Terbit</p>
            </div>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <section class="rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div class="flex items-center justify-between border-b border-line px-6 py-4">
                <h2 class="font-sans text-lg text-primary">Pesan Terbaru</h2>
                <a href="{{ route('admin.messages.index') }}" class="text-[13px] font-bold text-secondary hover:text-gold">Lihat Semua</a>
            </div>
            @if ($latestMessages->isEmpty())
                <p class="px-6 py-10 text-center text-sm text-muted">Belum ada pesan masuk.</p>
            @else
                <ul class="divide-y divide-line">
                    @foreach ($latestMessages as $message)
                        <li>
                            <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center gap-4 px-6 py-4 transition-colors hover:bg-cream/60">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full {{ $message->is_read ? 'bg-cream text-muted' : 'bg-primary text-goldlight' }} text-sm font-bold">
                                    {{ strtoupper(mb_substr($message->name, 0, 1)) }}
                                </span>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold {{ $message->is_read ? 'text-ink/70' : 'text-primary' }}">{{ $message->name }} <span class="font-normal text-muted">· {{ $message->subject }}</span></p>
                                    <p class="mt-0.5 truncate text-[13px] text-muted">{{ $message->message }}</p>
                                </div>
                                <time class="shrink-0 text-xs text-muted">{{ $message->created_at->diffForHumans() }}</time>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>

        <section class="rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div class="flex items-center justify-between border-b border-line px-6 py-4">
                <h2 class="font-sans text-lg text-primary">Berita Terakhir</h2>
                <a href="{{ route('admin.news.index') }}" class="text-[13px] font-bold text-secondary hover:text-gold">Kelola</a>
            </div>
            @if ($latestNews->isEmpty())
                <p class="px-6 py-10 text-center text-sm text-muted">Belum ada berita. <a href="{{ route('admin.news.create') }}" class="font-semibold text-secondary hover:text-gold">Buat berita pertama</a>.</p>
            @else
                <ul class="divide-y divide-line">
                    @foreach ($latestNews as $article)
                        <li class="flex items-center gap-4 px-6 py-4">
                            <span class="tag {{ $article->status === 'published' ? 'bg-secondary/10 text-secondary' : 'bg-muted/10 text-muted' }}">{{ $article->status === 'published' ? 'Terbit' : 'Draft' }}</span>
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-semibold text-primary">{{ $article->title }}</p>
                                <p class="mt-0.5 text-xs text-muted">{{ $article->category?->name ?? 'Tanpa kategori' }} · {{ $article->published_at?->translatedFormat('d M Y') ?: 'Belum terjadwal' }}</p>
                            </div>
                            <a href="{{ route('admin.news.edit', $article) }}" class="shrink-0 text-[13px] font-bold text-secondary hover:text-gold">Edit</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </div>

    <div class="mt-6 rounded-lg border border-line bg-white p-5">
        <div class="flex items-start gap-3">
            <x-icon name="info" class="mt-0.5 h-4.5 w-4.5 shrink-0 text-gold" />
            <p class="text-[13px] leading-6 text-muted">
                Seluruh konten yang saat ini tampil di website merupakan <strong class="font-semibold text-primary">data placeholder</strong>. Gantilah dengan data resmi melalui menu kelola di panel ini sebelum memublikasikan situs secara luas.
            </p>
        </div>
    </div>
</x-admin-layouts.app>