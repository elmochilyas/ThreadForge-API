# ThreadForge API

<p>
  <img src="https://img.shields.io/badge/PHP-8.4-777BB4?style=flat-square&logo=php" alt="PHP 8.4"/>
  <img src="https://img.shields.io/badge/Laravel-13-F05340?style=flat-square&logo=laravel" alt="Laravel 13"/>
  <img src="https://img.shields.io/badge/Pest-4.7-1B1B2F?style=flat-square" alt="Pest 4.7"/>
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql" alt="MySQL"/>
  <img src="https://img.shields.io/badge/Azure-0078D4?style=flat-square&logo=microsoftazure" alt="Azure"/>
</p>

Headless Laravel API that transforms raw developer notes into polished X posts.  
Stores reusable writing rules as campaign blueprints, queues AI generation work via Laravel AI, and exposes a ghostwriter chat assistant with real database tool access.

**Production URL:** [http://104.214.178.76](http://104.214.178.76)

---

## Features

- **Authentication** – Sanctum bearer-token auth (register, login, logout)
- **Campaign Blueprints** – Full CRUD for reusable writing-style rules
- **Async AI Content Pipeline** – Submit raw content, receive `202 Accepted`, queued job generates posts via xAI/Grok
- **Generated Posts** – Browse, filter, update status (draft → archived → posted)
- **Ghostwriter Assistant** – AI chat agent per post with database tool access (`getCampaignRules`, `getPostHistory`)
- **Structured AI Contract** – Strict JSON schema validation before persistence
- **Database Queue** – Jobs processed through the `database` driver

---

## Tech Stack

| Layer         | Technology                             |
|---------------|----------------------------------------|
| Framework     | Laravel 13                             |
| Language      | PHP 8.4                                |
| Database      | MySQL (production), SQLite (testing)   |
| Auth          | Laravel Sanctum (Bearer tokens)        |
| Queues        | Laravel Queues with `database` driver  |
| AI            | `laravel/ai` – structured agents, tools, conversation memory |
| AI Provider   | xAI/Grok via `xai` SDK                 |
| API Docs      | Scribe (`knuckleswtf/scribe`)          |
| Testing       | Pest PHP 4.7                           |
| CI            | GitHub Actions (`ubuntu-latest`)       |
| Deployment    | Azure VM (Ubuntu 24.04, Nginx)         |

---

## Local Installation

```bash
# 1. Clone and install dependencies
composer install

# 2. Environment setup
cp .env.example .env
php artisan key:generate

# 3. Database and queued jobs table
php artisan migrate
php artisan queue:table
php artisan migrate

# 4. Configure AI credentials in .env
XAI_API_KEY=your-key
THREADFORGE_AI_PROVIDER=xai
THREADFORGE_AI_MODEL=grok-4-1-fast-reasoning
QUEUE_CONNECTION=database
```

Run everything (server, queue worker, logs, Vite):

```bash
composer run dev
```

---

## API Overview

All protected endpoints require `Authorization: Bearer <token>`.

### Public Auth

| Method | Endpoint        | Description       |
|--------|-----------------|-------------------|
| POST   | `/api/register` | Create an account |
| POST   | `/api/login`    | Get a token       |

### Protected Routes

| Method   | Endpoint                                                 | Description                              |
|----------|----------------------------------------------------------|------------------------------------------|
| POST     | `/api/logout`                                            | Revoke token                             |
| GET      | `/api/me`                                                | Current user                             |
| GET      | `/api/campaign-blueprints`                               | List all blueprints                      |
| POST     | `/api/campaign-blueprints`                               | Create a blueprint                       |
| GET      | `/api/campaign-blueprints/{id}`                          | View a blueprint                         |
| PATCH    | `/api/campaign-blueprints/{id}`                          | Update a blueprint                       |
| DELETE   | `/api/campaign-blueprints/{id}`                          | Delete a blueprint                       |
| POST     | `/api/content/repurpose`                                 | Submit content → `202 Accepted`, queued  |
| GET      | `/api/raw-contents`                                      | List raw content                         |
| GET      | `/api/raw-contents/{id}`                                 | View raw content                         |
| GET      | `/api/generated-posts`                                   | List generated posts                     |
| GET      | `/api/generated-posts/{id}`                              | View a generated post                    |
| PATCH    | `/api/generated-posts/{id}/status`                       | Update post status                       |
| POST     | `/api/generated-posts/{id}/chat`                         | Ghostwriter chat                         |

The content pipeline works asynchronously: `POST /api/content/repurpose` immediately returns `202 Accepted` and dispatches `ProcessRawContentJob`. The job invokes `PostGenerationAgent`, validates against a strict schema, and persists structured JSON columns through Eloquent casts.

---

## Testing

```bash
php artisan test
```

Feature tests fake Laravel AI responses, so no external API key is needed for CI or local verification.

---

## CI/CD

**GitHub Actions** runs on every push and pull request (`ubuntu-latest`, PHP 8.4):

1. Checkout repository
2. Setup PHP with `sqlite` and `pdo_sqlite` extensions
3. Copy `.env.example` → `.env`, install Composer dependencies
4. Generate application key, prepare SQLite database
5. Run `php artisan test`

The workflow is defined in `.github/workflows/ci.yml`.

---

## Production Deployment

- **URL:** [http://104.214.178.76](http://104.214.178.76)
- **Server:** Azure VM, Ubuntu 24.04
- **Stack:** PHP 8.4, MySQL, Nginx, Composer
- **Path:** `/var/www/threadforge-api`
- **Database:** `threadforge` (MySQL)

Migrations were executed with `php artisan migrate --force`.

> **Security:** `.env` is not committed to the repository. `APP_DEBUG=false` in production.  
> **Queue:** The `database` queue driver is configured. A supervisor (e.g., Supervisor) must monitor the queue worker in production to process jobs continuously.

---

## Generated API Documentation

```bash
php artisan scribe:generate
```

- **HTML docs:** `/docs`  
- **OpenAPI spec:** `/docs.openapi`  
- **Postman collection:** `/docs.postman`
