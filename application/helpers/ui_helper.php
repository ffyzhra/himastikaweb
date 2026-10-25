<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Small view helpers shared by the admin panel and the public site.
 */

if (!function_exists('icon')) {
    /** Inline SVG icon (stroke style). */
    function icon($name, $class = 'icon') {
        static $paths = [
            'home'      => '<path d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/>',
            'users'     => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
            'user-plus' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6M22 11h-6"/>',
            'clipboard' => '<rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/>',
            'megaphone' => '<path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/>',
            'check-sq'  => '<path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',
            'logout'    => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="m16 17 5-5-5-5M21 12H9"/>',
            'globe'     => '<circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
            'menu'      => '<path d="M4 6h16M4 12h16M4 18h16"/>',
            'x'         => '<path d="M18 6 6 18M6 6l12 12"/>',
            'plus'      => '<path d="M12 5v14M5 12h14"/>',
            'search'    => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
            'edit'      => '<path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/>',
            'trash'     => '<path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>',
            'check'     => '<path d="M20 6 9 17l-5-5"/>',
            'check-circle' => '<path d="M22 11.1V12a10 10 0 1 1-5.9-9.1"/><path d="m22 4-10 10-3-3"/>',
            'x-circle'  => '<circle cx="12" cy="12" r="10"/><path d="m15 9-6 6M9 9l6 6"/>',
            'alert'     => '<circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/>',
            'file'      => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 15h6M9 18h4"/>',
            'upload'    => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m17 8-5-5-5 5M12 3v12"/>',
            'calendar'  => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
            'clock'     => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
            'arrow-right' => '<path d="M5 12h14M13 5l7 7-7 7"/>',
            'arrow-left'  => '<path d="M19 12H5M12 19l-7-7 7-7"/>',
            'eye'       => '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>',
            'lock'      => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
            'user'      => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
            'mail'      => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/>',
            'phone'     => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/>',
            'sparkles'  => '<path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3z"/>',
            'target'    => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
            'heart'     => '<path d="M19 14c1.5-1.5 3-3.2 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.8 0-3 .5-4.5 2-1.5-1.5-2.7-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4 3 5.5l7 7z"/>',
            'book'      => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V2H6.5A2.5 2.5 0 0 0 4 4.5z"/><path d="M4 19.5V22h16v-5"/>',
            'trophy'    => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6M18 9h1.5a2.5 2.5 0 0 0 0-5H18M4 22h16M10 14.7V17c0 .6-.5 1-1 1.2C7.8 18.8 7 20.2 7 22M14 14.7V17c0 .6.5 1 1 1.2 1.2.6 2 2 2 3.8"/><path d="M18 2H6v7a6 6 0 0 0 12 0z"/>',
            'pen-tool'  => '<path d="m12 19 7-7 3 3-7 7z"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18z"/><path d="m2 2 7.6 7.6"/><circle cx="11" cy="11" r="2"/>',
            'handshake' => '<path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.9-3.9a3 3 0 0 0-4.2 0l-.9.9a1 1 0 1 1-3-3l2.8-2.8a5.8 5.8 0 0 1 7 .9L21 7.5"/><path d="M21 3 18 6M3 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 3h8"/>',
            'wallet'    => '<path d="M20 12V8H6a2 2 0 0 1 0-4h12v4"/><path d="M4 6v12a2 2 0 0 0 2 2h14v-4"/><path d="M18 12a2 2 0 0 0 0 4h4v-4z"/>',
            'layers'    => '<path d="m12 2 10 5-10 5L2 7z"/><path d="m2 17 10 5 10-5M2 12l10 5 10-5"/>',
            'zap'       => '<path d="M13 2 3 14h9l-1 8 10-12h-9z"/>',
        ];
        $d = isset($paths[$name]) ? $paths[$name] : $paths['sparkles'];
        return '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $d . '</svg>';
    }
}

if (!function_exists('initials')) {
    /** "Andi Pratama" -> "AP" */
    function initials($name) {
        $parts = preg_split('/\s+/', trim((string) $name));
        $out = '';
        foreach (array_slice($parts, 0, 2) as $p) {
            $out .= mb_substr($p, 0, 1);
        }
        return $out !== '' ? $out : '?';
    }
}

if (!function_exists('tgl')) {
    /** Indonesian date: 2025-07-24 -> 24 Jul 2025 */
    function tgl($date, $with_time = false) {
        if (empty($date) || strpos($date, '0000-00-00') === 0) return '-';
        $bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $t = strtotime($date);
        $out = date('j', $t) . ' ' . $bulan[(int) date('n', $t) - 1] . ' ' . date('Y', $t);
        return $with_time ? $out . ', ' . date('H:i', $t) : $out;
    }
}

if (!function_exists('bulan_singkat')) {
    function bulan_singkat($date) {
        $bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        return $bulan[(int) date('n', strtotime($date)) - 1];
    }
}

if (!function_exists('foto_url')) {
    /** URL of a stored photo path (assets/... or uploads/...), or null when missing. */
    function foto_url($path) {
        if (empty($path)) return null;
        $path = ltrim($path, '/');
        return is_file(FCPATH . $path) ? base_url($path) : null;
    }
}

if (!function_exists('divisi_slug')) {
    /** Slug of a division name as used in config/himastika.php, or null. */
    function divisi_slug($nama) {
        $CI =& get_instance();
        foreach ($CI->config->item('divisi') as $slug => $d) {
            if (strcasecmp(trim($d['nama']), trim((string) $nama)) === 0) return $slug;
        }
        return null;
    }
}

if (!function_exists('nama_panggilan')) {
    /** "Muhammad Febriyan Putrahariska" -> "Febriyan", "Fayza Azzahra" -> "Fayza" */
    function nama_panggilan($nama) {
        $parts = preg_split('/\s+/', trim((string) $nama));
        if (count($parts) > 1 && in_array(strtolower(rtrim($parts[0], '.')), ['muhammad', 'm', 'siti', 'ade'], true)) {
            return $parts[1];
        }
        return $parts[0];
    }
}
