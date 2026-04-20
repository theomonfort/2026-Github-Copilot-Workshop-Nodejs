# Hikari Denki SAV - Service Après-Vente Portal
# ヒカリ電機 アフターサービス ポータル

## ⚠️ LEGACY CODE - DO NOT MODIFY ⚠️

This is the Hikari Denki After-Sales Service (SAV) portal website.  
Built in **2005** by the Hikari Denki IT team (Tanaka-san, Suzuki-san, Yamamoto-san, Nakamura-san).

### Requirements
- PHP 4.3+ (tested on PHP 5.0)
- MySQL 4.1
- Apache 1.3 with mod_php
- Internet Explorer 6.0+ (Netscape 7 partially supported)
- Screen resolution: 800x600 minimum

### Installation
1. Copy files to `/var/www/html/hikari-sav/`
2. Import `database.sql` into MySQL
3. Update `config.php` with your database credentials
4. Make sure `counter.txt` is writable by Apache (`chmod 666 counter.txt`)
5. Place image files in `images/` directory

### Pages
- `index.php` - Homepage with contact info and news
- `faq.php` - Frequently Asked Questions (hardcoded)
- `contact.php` - Contact form (saves to database + sends email)
- `pieces.php` - Spare parts search
- `garantie.php` - Warranty information and verification

### Known Issues
- [ ] FAQ should probably use a database (TODO since 2005...)
- [ ] Contact form has no CAPTCHA (getting lots of spam...)
- [ ] Parts search is slow when database is large
- [ ] Site doesn't display well in Firefox (who uses that anyway?)
- [ ] Visitor counter resets when counter.txt gets corrupted
- [ ] Images directory needs to be populated

### Last Updated
2006-03-15 by Tanaka-san
