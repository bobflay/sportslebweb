# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 11 application called "Woodstyle" that appears to be a fitness/gym management system with features for:
- User authentication (Sanctum-based API)
- Gym/studio reservations and check-ins
- Push notifications
- Content management (posts)
- Admin dashboard (Laravel Nova)
- Queue management (Laravel Horizon)
- Development debugging (Laravel Telescope)

## Common Development Commands

### Backend (PHP/Laravel)

```bash
# Install dependencies
composer install

# Run migrations
php artisan migrate

# Run tests
php artisan test
# or
./vendor/bin/phpunit

# Run a single test
php artisan test --filter TestName
# or
./vendor/bin/phpunit --filter TestName

# Code formatting (Laravel Pint)
./vendor/bin/pint

# Clear various caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Queue workers (using Horizon)
php artisan horizon

# Generate application key
php artisan key:generate

# Database seeding
php artisan db:seed
```

### Frontend (JavaScript/Vue)

```bash
# Install dependencies
npm install

# Development server with hot reload
npm run dev

# Production build
npm run build
```

## Architecture Overview

### Directory Structure

- **app/**: Core application code
  - **Console/**: Custom artisan commands (GetToken, SendTestEmail)
  - **Http/Controllers/API/**: RESTful API controllers for mobile app
  - **Jobs/**: Queued jobs (SendNotification)
  - **Mail/**: Email templates (client subscriptions, reservations, OTP)
  - **Models/**: Eloquent models (User, Game, Team, Player, Post, Device, Notification)
  - **Nova/**: Laravel Nova admin panel resources and metrics
  - **Observers/**: Model observers (NotificationObserver)
  - **Policies/**: Authorization policies

- **config/**: Application configuration files
- **database/**: Migrations, factories, and seeders
- **nova-components/**: Custom Nova components (Monitoring tool)
- **public/**: Publicly accessible files
- **resources/**: Frontend assets (Vue components, Sass, Blade views)
- **routes/**: API and web routes
- **storage/**: File storage (photos, PDFs, reports)
- **tests/**: Unit and feature tests

### Key Technologies

- **Backend**: Laravel 11, PHP 8.2+
- **Database**: MySQL
- **API**: Laravel Sanctum for authentication
- **Admin Panel**: Laravel Nova 4
- **Queue Management**: Laravel Horizon with Redis
- **Frontend**: Vue 2, Vite, Bootstrap 5
- **File Management**: Intervention Image for image processing
- **PDF Generation**: Dompdf
- **Push Notifications**: Google Cloud services integration

### API Structure

The API is primarily mobile-focused with endpoints for:
- Authentication (login, register, OTP verification)
- Password reset flow
- Device registration for push notifications
- Content retrieval (posts)
- Notification management

All authenticated routes use Sanctum middleware and expect Bearer token authentication.

### Nova Admin Panel

Custom resources configured:
- User management
- Post management with photo uploads
- Dashboard with metrics (new check-ins, subscriptions, users, reservations)
- Custom monitoring tool

### Environment Configuration

Key environment variables needed:
- Database connection (MySQL)
- Redis connection for queues
- Mail configuration
- Firebase credentials (firebase_key.json)
- Nova license key

### Testing

The project uses PHPUnit with separate test suites:
- Unit tests: `tests/Unit/`
- Feature tests: `tests/Feature/`

Test database is configured to use a separate `testing` database.