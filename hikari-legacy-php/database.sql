-- ヒカリ電機 カスタマーサポート データベーススキーマ
-- 作成日: 2005-06-01 田中
-- MySQL 4.1 互換
-- パスワード: hikari2005（変更禁止、全ファイルにハードコードされています）

CREATE DATABASE IF NOT EXISTS hikari_sav CHARACTER SET utf8;
USE hikari_sav;

-- お問い合わせフォームからのメッセージ
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    product_ref VARCHAR(50),
    subject VARCHAR(50),
    message TEXT,
    created_at DATETIME,
    status ENUM('new', 'read', 'replied', 'closed') DEFAULT 'new'
) ENGINE=MyISAM;

-- 部品カタログ
CREATE TABLE spare_parts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(50) NOT NULL,
    name VARCHAR(200) NOT NULL,
    name_jp VARCHAR(200),
    category VARCHAR(50),
    product_model VARCHAR(100),
    price DECIMAL(10,2),
    stock ENUM('在庫あり', '取り寄せ', '在庫切れ') DEFAULT '在庫あり',
    image_url VARCHAR(200),
    created_at DATETIME,
    updated_at DATETIME
) ENGINE=MyISAM;

-- 製品登録情報（保証確認用）
CREATE TABLE product_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    serial_number VARCHAR(50) NOT NULL,
    product_name VARCHAR(200),
    product_model VARCHAR(100),
    purchase_date DATE,
    warranty_end DATE,
    customer_name VARCHAR(100),
    customer_email VARCHAR(100),
    customer_phone VARCHAR(20),
    registered_at DATETIME
) ENGINE=MyISAM;

-- デモ用部品データの挿入（全製品カテゴリ対応）
INSERT INTO spare_parts (reference, name, name_jp, category, product_model, price, stock, created_at) VALUES
('FZ-Y30SFE', '交換用HEPAフィルター', '交換用HEPAフィルター', 'air_purifier', 'IP-Y30', 4800, '在庫あり', NOW()),
('FZ-Y30DFE', '脱臭フィルター', '脱臭フィルター', 'air_purifier', 'IP-Y30', 3400, '在庫あり', NOW()),
('UNT-Y1087DETZ', 'IonPureイオン発生ユニット', 'IonPureイオン発生ユニット', 'air_purifier', 'IP-Y30/IP-860', 5800, '在庫あり', NOW()),
('RRMCGA935WJSA', 'LUMINAリモコン', 'LUMINAリモコン', 'tv', 'LM-32/40/46X600', 2980, '在庫あり', NOW()),
('RUNTKA397WJQZ', 'LCD電源基板', 'LCD電源基板', 'tv', 'LM-32X600', 9800, '取り寄せ', NOW()),
('LPHDA255WJKZ', 'バックライトランプ', 'バックライトランプ', 'tv', 'LM-46X600', 7800, '在庫切れ', NOW()),
('GCOVPA206WRKZ', '電子レンジ回転皿', '電子レンジ回転皿', 'microwave', 'R-642BK', 2200, '在庫あり', NOW()),
('PCOVPA267WREZ', '回転リング', '回転リング', 'microwave', 'R-642BK', 1280, '在庫あり', NOW()),
('MGNTRON-R642', 'マグネトロン', 'マグネトロン', 'microwave', 'R-642BK', 12800, '取り寄せ', NOW()),
('CCOVPA061WRKZ', 'レンジフード活性炭フィルター', 'レンジフード活性炭フィルター', 'range_hood', 'KD-66EW', 1800, '取り寄せ', NOW()),
('TINSEB272WJQZ', '給紙ローラー', '給紙ローラー', 'copier', 'MX-2610N', 3500, '取り寄せ', NOW()),
('DRUM-MX2610', '感光ドラムユニット', '感光ドラムユニット', 'copier', 'MX-2610N', 18500, '在庫あり', NOW()),
('LNS-MTK50', 'レンズマウントユニット', 'レンズマウントユニット', 'camera', 'HK-D500', 6800, '在庫あり', NOW()),
('SHTR-HKD500', 'シャッターユニット', 'シャッターユニット', 'camera', 'HK-D500', 8900, '取り寄せ', NOW()),
('BATT-HKD500', '充電式バッテリーパック', '充電式バッテリーパック', 'camera', 'HK-D500/D300', 4500, '在庫あり', NOW()),
('STRAP-HK', 'カメラストラップ（ヒカリロゴ入り）', 'カメラストラップ', 'camera', '全機種対応', 1200, '在庫あり', NOW()),
('CAM-MOD-DR100', '車載カメラモジュール', '車載カメラモジュール', 'car', 'DR-100', 15800, '取り寄せ', NOW()),
('PARK-SNS-3P', '駐車センサーセット（3個入り）', '駐車センサーセット', 'car', 'PS-300', 9800, '在庫あり', NOW()),
('NAVI-TP-7', 'ナビ用タッチパネル7インチ', 'ナビ用タッチパネル', 'car', 'NV-700', 12500, '在庫切れ', NOW()),
('ENDO-LS100', '内視鏡用光源ユニット', '内視鏡用光源ユニット', 'medical', 'ES-100', 85000, '取り寄せ', NOW()),
('MICRO-LNS-40X', '顕微鏡レンズ 40倍', '顕微鏡レンズ 40倍', 'medical', 'BM-400', 32000, '在庫あり', NOW());

-- デモ用製品登録データの挿入
INSERT INTO product_registrations (serial_number, product_name, product_model, purchase_date, warranty_end, customer_name, customer_email, registered_at) VALUES
('SN-2005-00142', 'LUMINA LM-32X600', 'LM-32X600', '2005-06-15', '2007-06-15', '山田太郎', 'yamada@example.com', NOW()),
('SN-2005-00287', 'IonPure IP-Y30', 'IP-Y30', '2005-09-20', '2007-09-20', '鈴木花子', 'suzuki@example.com', NOW()),
('SN-2005-00401', 'HK-D500 デジタルカメラ', 'HK-D500', '2005-11-03', '2006-11-03', '佐藤健一', 'sato@example.com', NOW()),
('SN-2006-00033', 'ドライブレコーダー DR-100', 'DR-100', '2006-01-10', '2009-01-10', '高橋美咲', 'takahashi@example.com', NOW()),
('SN-2005-00512', '電子レンジ R-642BK', 'R-642BK', '2005-08-22', '2007-08-22', '田中誠', 'tanaka@example.com', NOW());
