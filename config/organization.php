<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Organization Configuration
    |--------------------------------------------------------------------------
    |
    | 組織固有の設定を管理します。新しいプロジェクトで流用する際は
    | この設定ファイルを編集するだけで組織情報をカスタマイズできます。
    |
    */

    'name' => env('ORGANIZATION_NAME', '組織名'),
    'short_name' => env('ORGANIZATION_SHORT_NAME', '略称'),
    'contact_email' => env('ORGANIZATION_CONTACT_EMAIL', 'info@example.com'),
];
