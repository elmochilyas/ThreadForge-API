# Deployment — ThreadForge API

## Overview

The API is deployed on an Azure VM running Ubuntu 24.04 with the following stack:

| Component   | Version / Detail               |
|-------------|--------------------------------|
| OS          | Ubuntu 24.04 LTS               |
| PHP         | 8.4                             |
| Composer    | Latest stable                   |
| MySQL       | 8.x                              |
| Nginx       | Latest stable                   |

## Server Paths

- Application root: `/var/www/threadforge-api`
- Nginx root: `/var/www/threadforge-api/public`
- Environment file: `/var/www/threadforge-api/.env` (not committed)

## Database

- Name: `threadforge`
- Host: localhost (MySQL)
- Migrations applied with:

```bash
php artisan migrate --force
```

## Nginx Configuration

Nginx is configured to serve the Laravel application from `/var/www/threadforge-api/public`. PHP-FPM handles `.php` requests through the FastCGI process manager.

## Public API URL

**Base URL:** [http://104.214.178.76](http://104.214.178.76)

### Test Commands

Verify the deployment responds correctly:

```bash
# Protected route — expects 401 Unauthorized
curl -i http://104.214.178.76/api/campaign-blueprints

# Public auth routes
curl -i http://104.214.178.76/api/register
curl -i http://104.214.178.76/api/login
```

Expected output for `/api/campaign-blueprints` without token:

```
HTTP/1.1 401 Unauthorized
...
{"message":"Unauthenticated."}
```

Expected output for `/api/register` (GET not allowed — POST only):

```
HTTP/1.1 405 Method Not Allowed
...
{"message":"The GET method is not supported for this route. Supported methods: POST."}
```

## Security

- `APP_DEBUG=false` in production
- `.env` is excluded from version control (`.gitignore`)
- All protected routes require a valid Sanctum Bearer token
