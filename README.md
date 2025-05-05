# Dictionary App

このアプリは、Laravelを使って作成した辞書アプリです。
ログインしたユーザーがキーワードと説明を登録し、一覧や検索ができるようになっています。

## 機能
-ユーザー登録（Fortify使用）
- ログイン / ログアウト機能
- キーワードと説明の登録機能
- 検索機能（キーワード・説明）
- 登録した内容を一覧表示
- 登録順に並べた一覧表示
- 日本語バリデーション対応
- シーダファイルで初期データ登録済

## 使用技術
- Laravel 8.75
- PHP 7.4.9
- MySQL 8.0
- Nginx 1.21.1
- Docker（オプション）
- Fortify (ログイン認証)

## インストール手順
以下の手順でこのアプリケーションをセットアップできます。

```bash
# ① リポジトリをクローン
git clone https://github.com/e-pig/dictionary-app.git
cd dictionary-app

# ② Dockerコンテナをビルド・起動
docker compose up -d --build

# ③ PHPコンテナに入る
docker compose exec php bash

# ④ Laravelのパッケージをインストール
composer install

# ⑤ .env ファイルを作成
cp .env.example .env

# ⑥ アプリケーションキーを生成
php artisan key:generate

# ⑦ マイグレーションを実行（テーブル作成）
php artisan migrate

# ⑧ 初期データを登録（シーダー実行）
php artisan db:seed
