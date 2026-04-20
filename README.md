# 🏭 Hikari Denki - Legacy PHP Workshop

> ヒカリ電機 - レガシーPHPワークショップ

## 📋 Description

This repository contains a **legacy PHP website** for **Hikari Denki** (ヒカリ電機), a fictional Japanese electronics company. It is designed as a starting point for a **migration workshop** where participants will refactor this legacy PHP codebase into a modern **Node.js** application using **GitHub Copilot**.

📖 **Workshop instructions**: ワークショップの手順は講師からの配布URLをご参照ください。

## 🚀 Getting Started

This repo includes a **devcontainer** pre-configured with everything you need:

| Tool | Version | Usage |
|------|---------|-------|
| **Node.js** | 20.x | Target runtime for migration |
| **PHP** | 8.1 | Run the legacy site |
| **GitHub CLI** | latest | Copilot CLI & GitHub integrations |

### Launch a Codespace

1. Click the green **"Code"** button → **"Codespaces"** → **"Create codespace on main"**
2. Wait for the container to build (~1 min)
3. You're ready! 🎉

### Run the legacy PHP site

```bash
cd 1.hikari-legacy-php
php -S localhost:8080
```

The Codespace will automatically forward port **8080** — click **"Open in Browser"** to see the site.

## 🕸️ What's inside

The `1.hikari-legacy-php/` folder contains a 2005-era after-sales service portal with intentionally terrible code:

- 🐛 **SQL injection** everywhere (unsanitized user input)
- 💀 **`mysql_*` functions** (removed in PHP 7.0)
- 🎨 **Comic Sans**, `<marquee>`, `<font>` tags, table-based layouts
- 🔒 **Hardcoded credentials** in `config.php`
- 📧 **No input validation** on forms
- 🇫🇷🇯🇵 Bilingual French / Japanese content

## 📁 Structure

```
1.hikari-legacy-php/
├── config.php        # DB config (hardcoded password 💀)
├── index.php         # Homepage with visitor counter
├── contact.php       # Contact form (SQL injection demo)
├── faq.php           # FAQ (hardcoded, never migrated to DB)
├── garantie.php      # Warranty checker
├── pieces.php        # Spare parts search
├── database.sql      # MySQL schema
├── .htaccess         # Apache config
└── images/           # GIF assets (very 2005)
```
