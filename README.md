# 0 秒思考メモ Web アプリ（バックエンド API）

Vue.js で構築した「0 秒思考メモ」アプリと連携する Laravel API です。  
もともとは Firebase を使用していましたが、**Laravel API によるバックエンドとの連携に置き換える**形で構築し直しています。

---

## 実装済みの主な機能

すべて Sanctum 認証による保護付き API です。

### 認証系

-   ユーザー登録（メール・パスワード）
-   ログイン・ログアウト
-   ログインユーザー情報の取得
-   アカウント削除（ユーザーに紐づく全メモも同時削除）

### メモ機能

-   メモの登録
-   メモの取得
-   メモの削除

---

## デプロイについて

このプロジェクトは **Laravel API と Vue.js の構成を学習することを目的としたローカル環境用アプリ**です。  
現在のところ、本番環境へのデプロイは **予定していません**。

---

## リポジトリ構成

このアプリは、以下の 2 つのリポジトリに分かれています：

-   `zero-thinking-api`: Laravel API（バックエンド）← このリポジトリ
-   `zero-thinking-ui`: Vue 3（フロントエンド）

---

## 使用技術

-   Laravel 12
-   Sanctum（API トークン認証）
-   MySQL（ローカル開発環境では `.env` で接続情報を管理）
-   Docker（Laravel Sail）

---

## 開発環境構築手順（Laravel Sail を利用）

### 1. リポジトリのクローン

```bash
git clone https://github.com/marumaru-3/zero-thinking-api.git
cd zero-thinking-api
```

### 2. `.env` を作成し、環境変数を設定

```bash
cp .env.example .env
```

必要に応じて DB 接続情報などを変更してください。

### 3. Laravel Sail の起動

```bash
./vendor/bin/sail up -d
```

### 4. Composer install（初回のみ）

```bash
./vendor/bin/sail composer install
```

### 5. アプリケーションキー生成

```bash
./vendor/bin/sail artisan key:generate
```

### 6. マイグレーション実行

```bash
./vendor/bin/sail artisan migrate
```

---

## API エンドポイント一覧（例）

| メソッド | エンドポイント     | 概要             | 認証 |
| -------- | ------------------ | ---------------- | ---- |
| POST     | `/api/register`    | ユーザー登録     | 不要 |
| POST     | `/api/login`       | ログイン         | 不要 |
| POST     | `/api/logout`      | ログアウト       | 要   |
| GET      | `/api/user`        | ユーザー情報取得 | 要   |
| DELETE   | `/api/user`        | アカウント削除   | 要   |
| GET      | `/api/papers`      | メモ一覧取得     | 要   |
| POST     | `/api/papers`      | メモ登録         | 要   |
| DELETE   | `/api/papers/{id}` | メモ削除         | 要   |

---

## 備考

-   今後、UI 側のデザインや機能の拡張を予定していますが、この API はあくまで学習目的のため、構成はシンプルに保っています。
-   Laravel Sail を使って構築していますが、ローカルに直接インストールしても動作可能です。
