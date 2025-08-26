# コミュニティポータル - 町内会・自治会向けWebサイトサンプル

このプロジェクトは、町内会や自治会などの地域コミュニティ向けのWebサイトのサンプルです。Laravel 12を使用して構築されており、地域住民への情報発信や活動報告、イベント管理などの機能を提供します。

## 🌐 デモサイト

実際の動作を確認できるサンプルサイトをご覧いただけます：
**[https://community-portal.ystechspace.net](https://community-portal.ystechspace.net)**

※ デモサイトでは公開ページのみご覧いただけます。管理機能については、ローカル環境でのセットアップ後にお試しください。

## 🌟 特徴

- **レスポンシブデザイン**: スマートフォンからデスクトップまで対応
- **お知らせ管理**: 地域住民への重要な情報を発信
- **イベント管理**: 行事予定の管理と表示
- **活動報告**: 町内会活動の記録と共有
- **公開資料**: 規約や名簿などの資料管理
- **スライドショー**: トップページでの情報発信
- **管理機能**: 管理者による各種コンテンツの管理

## 🛠️ 技術スタック

- **フレームワーク**: Laravel 12
- **フロントエンド**: Tailwind CSS, Alpine.js
- **データベース**: MySQL
- **その他**: Vite, Swiper.js

## 📋 必要な環境

- PHP 8.2以上
- Composer
- Node.js & npm
- MySQL 8.0以上

## 🚀 インストール手順

1. **リポジトリのクローン**
```bash
git clone https://github.com/your-username/community-portal.git
cd community-portal
```

2. **依存関係のインストール**
```bash
composer install
npm install
```

3. **環境設定**
```bash
cp .env.example .env
php artisan key:generate
```

4. **データベース設定**
`.env`ファイルでデータベース接続情報を設定してください：
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **組織情報の設定**
`.env`ファイルで組織情報を設定してください：
```env
ORGANIZATION_NAME="あなたの町内会名"
ORGANIZATION_SHORT_NAME="略称"
ORGANIZATION_CONTACT_EMAIL="contact@example.com"
```

6. **データベースのマイグレーションとシード**
```bash
php artisan migrate
php artisan db:seed
```

7. **アセットのビルド**
```bash
npm run build
```

8. **ストレージリンクの作成**
```bash
php artisan storage:link
```
※ このコマンドは `storage/app/public` フォルダを `public/storage` にシンボリックリンクで接続します。これにより、アップロードされたファイル（画像・PDF等）がWebブラウザからアクセス可能になります。

9. **開発サーバーの起動**
```bash
php artisan serve
```

## 👤 デフォルトユーザー

シード実行後、以下のユーザーでログインできます：

- **ルートユーザー（全権限）**
  - メール: `admin@example.com`（.envのROOT_USER_IDで設定）
  - パスワード: `samplepass`（.envのROOT_USER_PASSWORDで設定）
  - ※ ユーザー管理機能にアクセス可能

- **一般ユーザー**
  - メール: `user@example.com`
  - パスワード: `password`

### ルートユーザーのパスワード変更

ルートユーザーのパスワードは、セキュリティ上の理由から管理画面では変更できません。パスワードを変更する場合は、以下のArtisanコマンドを使用してください：

```bash
# 対話式でパスワード変更
php artisan root:change-password

# コマンドライン引数でパスワード指定
php artisan root:change-password --password="新しいパスワード"
```

**注意**: パスワード変更後は、`.env`ファイルの`ROOT_USER_PASSWORD`も同じ値に更新することを推奨します。これにより、次回のシーダー実行時に一貫性が保たれます。

## 📁 主要な機能

### 公開ページ
- **ホーム**: スライドショーとお知らせ一覧
- **組織について**: 町内会の概要と活動内容
- **入会案内**: 入会方法と連絡先
- **行事予定**: 今後のイベント一覧
- **活動報告**: 過去の活動記録
- **公開資料**: 規約や資料のダウンロード

### 管理機能
- **お知らせ管理**: 作成・編集・削除
- **イベント管理**: 行事予定の管理
- **活動報告管理**: 報告書の管理
- **公開資料管理**: ファイルアップロード機能
- **スライド管理**: トップページスライドの管理
- **ユーザー管理**: 会員情報の管理

## 🎨 カスタマイズ

### 組織情報の変更
`config/organization.php`または`.env`ファイルで組織情報を変更できます。

### デザインの変更
- `resources/css/styles.css`: カスタムスタイル
- `tailwind.config.js`: Tailwind CSSの設定
- `resources/views/`: ビューファイル

### カラーパターンの変更
`resources/views/layouts/app.blade.php`の`body`タグの`data-theme`属性を変更することで、カラーパターンを切り替えできます：

```html
<body data-theme="green" class="font-sans antialiased">
```

利用可能なテーマ：
- `green`: 緑系（デフォルト）
- `dark-orange`: オレンジ系
- `forest-green`: 森の緑系
- `azuki`: 小豆色系
- `aiiro`: 藍色系
- `shoubu`: 菖蒲色系
- `uguisu`: 鶯色系
- `coffee`: コーヒー色系

### 画像の変更
`public/images/`ディレクトリ内の画像ファイルを置き換えてください：
- `logo.png`: ロゴ画像
- `map.png`: 地域マップ
- `line_qr.png`: LINE QRコード

## 📝 ライセンス

このプロジェクトはMITライセンスの下で公開されています。

## 🤝 貢献

プルリクエストや課題報告を歓迎します。大きな変更を行う前に、まずissueを作成して議論してください。

##  サポート

質問や問題がある場合は、GitHubのIssuesページでお知らせください。

## 🔒 セキュリティに関する重要な注意事項

### 本番環境での運用時の推奨設定

1. **管理ページのURLを変更**
   - デフォルトのログインURL（`/login`）をランダムな文字列に変更することを強く推奨します
   - `routes/auth.php` でログインルートのパスを変更してください
   - 例：`/login` → `/admin-xyz123` など

2. **環境設定の見直し**
   - `.env` ファイルの `APP_DEBUG=false` に設定
   - 強力なパスワードの設定
   - データベース認証情報の適切な管理

3. **その他のセキュリティ対策**
   - SSL証明書の導入（HTTPS化）
   - 定期的なバックアップの実施
   - アクセスログの監視

---

**注意**: このプロジェクトはサンプル・デモ用途です。実際の運用前には、上記のセキュリティ設定やプライバシー保護の観点から適切な設定を行ってください。
