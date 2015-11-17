# OAuth2 server with CodeIgniter 3.0.3

```bash
# CodeIgniterが動作しているパスに移動
cd /path/to/ci

# composerがインストールされていない場合は先にインストール
curl -sS https://getcomposer.org/installer | php
```

composer.json の require項目に追記

```json
"bshaffer/oauth2-server-php": "~1.8"
```

composerの実行

```bash
php composer.phar update
```

---

# マイグレーションの実行

```bash
php index.php migrate index
```

# デモデータの投入

```bash
php index.php initialize index
```
