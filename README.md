# 🏭 Hikari Denki - レガシーPHPワークショップ

> ヒカリ電機 - Legacy PHP Migration Workshop

## 📋 概要

このリポジトリには、架空の日本の電機メーカー **ヒカリ電機**（Hikari Denki）の **レガシーPHPウェブサイト** が含まれています。**GitHub Copilot** を活用して、このレガシーPHPコードを **Node.js** アプリケーションにリファクタリングする **移行ワークショップ** の教材です。

📖 **ワークショップの手順**: 講師からの配布URLをご参照ください。

## 🚀 はじめに

このリポジトリには、必要なツールがすべてプリインストールされた **devcontainer** が含まれています：

| ツール | バージョン | 用途 |
|--------|-----------|------|
| **Node.js** | 20.x | 移行先のランタイム |
| **PHP** | 8.1 | レガシーサイトの実行 |
| **GitHub CLI** | 最新版 | Copilot CLI & GitHub連携 |

### Codespace の起動方法

1. 緑色の **「Code」** ボタン → **「Codespaces」** → **「Create codespace on main」** をクリック
2. コンテナのビルドを待つ（約1分）
3. 準備完了！🎉

### レガシーPHPサイトの起動

```bash
cd 1.hikari-legacy-php
php -S localhost:8080
```

Codespace が自動的にポート **8080** を転送します。**「Open in Browser」** をクリックしてサイトを確認してください。

## 🕸️ 中身について

`1.hikari-legacy-php/` フォルダには、意図的にひどいコードで書かれた2005年代のアフターサービスポータルが含まれています：

- 🐛 **SQLインジェクション** が至る所に（入力値のサニタイズなし）
- 💀 **`mysql_*` 関数** の使用（PHP 7.0で廃止済み）
- 🎨 **Comic Sans**、`<marquee>`、`<font>` タグ、テーブルレイアウト
- 🔒 `config.php` に **ハードコードされたパスワード**
- 📧 フォームの **入力バリデーションなし**
- 🇫🇷🇯🇵 フランス語 / 日本語のバイリンガルコンテンツ

## 📁 構成

```
1.hikari-legacy-php/
├── config.php        # DB設定（パスワードハードコード 💀）
├── index.php         # トップページ（訪問者カウンター付き）
├── contact.php       # お問い合わせフォーム（SQLインジェクションのデモ）
├── faq.php           # よくある質問（ハードコード、DB移行は未完了）
├── garantie.php      # 保証確認
├── pieces.php        # 部品検索
├── database.sql      # MySQLスキーマ
├── .htaccess         # Apache設定
└── images/           # GIF画像（2005年感満載）
```
