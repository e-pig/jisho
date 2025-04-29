# Dictionary App

このアプリは、Laravelで作成したシンプルな辞書アプリです。

## 機能
- ユーザーIDでログイン
- キーワードと説明を登録
- 登録した内容を一覧表示
- キーワード検索機能（新しい順に表示）

## 使用技術
- Laravel 8.75
- PHP 7.4.9
- MySQL 8.0
- Nginx 1.21.1
- Docker（オプション）

## インストール手順
```bash
git clone https://github.com/e-pig/dictionary-app.git
cd dictionary-app
composer install
npm install
npm run dev
php artisan migrate
php artisan serve
