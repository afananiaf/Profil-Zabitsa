<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class SettingController extends Controller
{
    public function index()
    {
        $keys = [
            'site_logo',
            'announcement_text',
            'contact_address',
            'contact_email',
            'contact_phone',
            'social_facebook',
            'social_instagram',
            'social_youtube',
            'social_twitter',
            'social_tiktok',
        ];

        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key);
        }

        return View::make('admin.settings.index', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'announcement_text' => ['nullable', 'string', 'max:300'],
            'contact_address' => ['nullable', 'string', 'max:300'],
            'contact_email' => ['nullable', 'email', 'max:160'],
            'contact_phone' => ['nullable', 'string', 'max:60'],
            'social_facebook' => ['nullable', 'url', 'max:255'],
            'social_instagram' => ['nullable', 'url', 'max:255'],
            'social_youtube' => ['nullable', 'url', 'max:255'],
            'social_twitter' => ['nullable', 'url', 'max:255'],
            'social_tiktok' => ['nullable', 'url', 'max:255'],
            'site_logo' => ['nullable', 'file', 'mimes:jpeg,png,webp,svg', 'max:2048'],
        ]);

        $hasLogo = !empty($validated['site_logo'] ?? null);
        unset($validated['site_logo']);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        if ($hasLogo) {
            $path = $request->file('site_logo')->store('logos', 'public');
            $old = Setting::get('site_logo');
            if ($old && $old !== $path) {
                Storage::disk('public')->delete($old);
            }
            Setting::set('site_logo', $path);
            $this->syncFavicon($path);
        }

        if ($request->boolean('remove_site_logo')) {
            $old = Setting::get('site_logo');
            if ($old) {
                Storage::disk('public')->delete($old);
            }
            Setting::set('site_logo', null);
            if (file_exists(public_path('favicon.png'))) {
                unlink(public_path('favicon.png'));
            }
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    private function syncFavicon(string $path): void
    {
        $abs = Storage::disk('public')->path($path);
        $ext = strtolower(pathinfo($abs, PATHINFO_EXTENSION));

        if (!in_array($ext, ['png', 'jpg', 'jpeg', 'webp'], true)) {
            if (file_exists(public_path('favicon.png'))) {
                unlink(public_path('favicon.png'));
            }

            return;
        }

        [$w, $h] = getimagesize($abs);
        $src = match ($ext) {
            'png' => imagecreatefrompng($abs),
            'jpg', 'jpeg' => imagecreatefromjpeg($abs),
            'webp' => imagecreatefromwebp($abs),
        };

        $size = 256;
        $dst = imagecreatetruecolor($size, $size);
        imagealphablending($dst, false);
        imagesavealpha($dst, true);

        $srcSize = min($w, $h);
        imagecopyresampled(
            $dst,
            $src,
            0,
            0,
            (int) (($w - $srcSize) / 2),
            (int) (($h - $srcSize) / 2),
            $size,
            $size,
            $srcSize,
            $srcSize
        );

        imagepng($dst, public_path('favicon.png'));
        imagedestroy($src);
        imagedestroy($dst);
    }
}