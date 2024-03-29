# framework
A simple MVC scaffold for PHP and REST API for MySQL/MariaDB. Using this as a learning experience.

## Features
- MVC Architecture and Routing
- Page templating with buffered output
- Independent REST API for database operations
- Supports environment variables for sensitive credentials
- Argon2id password hashing
- Authenticated user sessions

> [!NOTE]
> There is support for a 3-component system on one server: Application, API, and a public-facing website. However, the public-facing website is not part of this codebase.

## Requirements
- PHP: Vesion 7.4 or higher
- MySQL 5.7 or 8.0+ (with modifications, see "MySQL Integration" section of this document)
  - MySQL 5.7 configuration compatible with MariaDB


## Setup and Initialization
1. Extract downloaded zip archive into your webserver's root directory
2. Create `.env` file in root directory and configure variables
3. Configure constants in `app/inc/global.php` and `api/inc/global.php`

### MySQL Integration

1. Framework: Ensure your application DB credentials are mapped to `APP_DB_HOST`, `APP_DB_NAME`, `APP_DB_USER`, and `APP_DB_PASS`
2. API: Ensure your API DB credentials are mapped to `API_DB_HOST`, `API_DB_NAME`, `API_DB_USER`, and `API_DB_PASS`
3. Follow setup guide for application and API database tables (This guide is WIP)
4. Create stored prodecure listed below
   - Function `uuid_unbin()` : `CREATE FUNCTION uuid_unbin(uuid BINARY(16)) RETURNS VARCHAR(36) RETURN LOWER(CONCAT(SUBSTR(HEX(uuid), 1, 8), '-',SUBSTR(HEX(uuid), 9, 4), '-',SUBSTR(HEX(uuid), 13, 4), '-',SUBSTR(HEX(uuid), 17, 4), '-',SUBSTR(HEX(uuid), 21)));`

> [!TIP]
> If using MySQL 8.0 or higher, it is advisable to replace `UNHEX(REPLACE(UUID(),'-','')` and its parameterized version, `UNHEX(REPLACE(?,'-',''))` with `UUID_TO_BIN(UUID())` and `UUID_TO_BIN(?)`, repsectively. When selecting UUIDs, you can then use `BIN_TO_UUID()` instead of the `uuid_unbin()` stored function.

## API
The API is completely separable from the framework (i.e., they do not have to live on the same server). The default configuration works (and looks) best with the `api` directory is configured as a subdomain.

### Separating the API from PHP Framework
1. Place `api` and `public_html/api` directories into another server's root directory.
2. Move files from `public_html/api` to `public_html` and delete the now-empty `api` directory.
3. Copy `.htaccess`, `compsoer.json`, `composer.lock` and your environment variable config (`.env`) to the new root directory.
4. Ensure `HOST` constant is accurate in `inc/global.php`






