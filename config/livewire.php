<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Temporary File Uploads
    |--------------------------------------------------------------------------
    |
    | Configure how Livewire handles temporary file uploads.
    |
    */

    'temporary_file_upload' => [
        'disk' => 'public',               // pakai storage/app
        'rules' => null,                  // bisa isi rule validasi jika mau
        'directory' => 'livewire-tmp',    // folder untuk file sementara
        'middleware' => null,          // middleware untuk akses file sementara
    ],

    /*
    |--------------------------------------------------------------------------
    | File Uploads Maximum Size
    |--------------------------------------------------------------------------
    |
    | Default maximum upload size (in kilobytes)
    |
    */

    'max_upload_file_size' => 10240, // 10MB default, bisa disesuaikan
];
