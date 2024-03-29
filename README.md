# framework
A simple MVC scaffold for PHP and REST API for MySQL/MariaDB. Using this as a learning experience.
## Features
- MVC Architecture and Routing
- Page templating with buffered output
- Independent REST API for database operations
- Supports environment variables for sensitive credentials
- Argon2id password hashing
- Authenticated user sessions

## API
The API is completely separable from the framework (i.e., they do not have to live on the same server). The default configuration works (and looks) best with the `api` directory is configured as a subdomain.

### Separating the API from PHP Framework
1. Place `api` and `public_html/api` directories into another server's root directory.
2. Move files from `public_html/api` to `public_html` and delete the now-empty `api` directory.
3. Copy `.htaccess`, `compsoer.json`, `composer.lock` and your environment variable config (`.env`) to the new root directory.
4. Ensure `HOST` constant is accurate in `inc/global.php`






