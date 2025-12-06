# Eagle Eye GRC System - Developer Guide

## Project Overview

Eagle Eye is a comprehensive Governance, Risk, and Compliance (GRC) management application built on Laravel 9, providing enterprise-grade tools for risk assessment, audit management, control evaluation, asset tracking, vulnerability management, and regulatory compliance reporting.

## Technology Stack

### Backend
- **PHP**: ^8.0.2
- **Laravel Framework**: ^9.19
- **Database**: MySQL (primary), SQLite (testing)
- **Authentication**: Laravel Sanctum (API tokens) + Session-based auth
- **ORM**: Eloquent with PSR-4 autoloading

### Frontend
- **Build Tool**: Vite 4.0
- **CSS Framework**: Tailwind CSS (TailAdmin theme)
- **JavaScript**: Axios 1.1.2, Lodash 4.17.19
- **Charts**: ApexCharts 5.3.2

### Key PHP Packages
- **maatwebsite/excel**: ^3.1 (Excel import/export)
- **mpdf/mpdf**: ^8.2 (PDF generation)
- **phpoffice/phppresentation**: ^1.1 (PowerPoint generation)
- **guzzlehttp/guzzle**: ^7.2 (HTTP client)
- **barryvdh/laravel-debugbar**: ^3.9 (development debugging)

### Development Tools
- **Testing**: PHPUnit ^9.5.10
- **Code Style**: Laravel Pint ^1.0
- **Local Development**: Laravel Sail ^1.0.1 (Docker-based)
- **Mocking**: Mockery ^1.4.4
- **Seeding**: Faker ^1.9.1

## Directory Structure

```
grc/
├── app/
│   ├── Http/
│   │   ├── Controllers/         # 118 controllers (business logic)
│   │   │   ├── _Unused/         # 30+ deprecated controllers
│   │   │   ├── Risk*.php        # Risk management controllers
│   │   │   ├── Audit*.php       # Audit management controllers
│   │   │   ├── Control*.php     # Control assessment controllers
│   │   │   └── Asset*.php       # Asset management controllers
│   │   ├── Middleware/          # Authentication & authorization
│   │   └── Requests/            # Form validation classes
│   ├── Models/                  # 84 Eloquent models
│   │   ├── User.php, UserRole.php
│   │   ├── Risk.php, RiskAssessment.php
│   │   ├── Asset.php, AssetGroup.php
│   │   ├── Audit.php, AuditFinding.php
│   │   ├── Control.php, ControlMaster.php
│   │   ├── Vulnerability.php
│   │   └── _Unused/             # Deprecated models
│   ├── Services/                # Business logic services
│   │   ├── PresentationService.php
│   │   └── ReportService.php
│   ├── Repositories/            # Data access layer
│   │   └── ReportRepository.php
│   ├── Exports/                 # Excel export classes
│   ├── Providers/               # Service providers
│   ├── Console/                 # Artisan commands
│   └── helpers.php              # Global helper functions
├── routes/
│   ├── web.php                  # Web routes (primary routing, 51KB)
│   ├── api.php                  # API routes
│   └── channels.php             # Broadcasting channels
├── resources/
│   ├── views/                   # Blade templates
│   │   ├── auth/                # Login/authentication views
│   │   ├── ciso/                # CISO dashboard
│   │   ├── process/             # Process management views
│   │   ├── pitstop/             # PitStop feature
│   │   ├── layouts/             # Master layouts
│   │   └── pdf/                 # PDF templates
│   ├── css/                     # Stylesheets
│   │   └── app.css              # Main CSS entry point
│   └── js/                      # JavaScript files
│       └── app.js               # Main JS entry point
├── public/                      # Web server document root
│   ├── index.php                # Application entry point
│   ├── css/, js/, fonts/        # Compiled assets
│   ├── Images/                  # Image assets
│   ├── tailadmin/               # TailAdmin UI theme
│   └── storage/                 # Symlink to storage/app/public
├── database/
│   ├── migrations/              # 25 database migrations
│   ├── seeders/                 # Database seeders
│   └── factories/               # Model factories
├── tests/
│   ├── Unit/                    # Unit tests
│   ├── Feature/                 # Feature/integration tests
│   └── TestCase.php             # Base test class
├── storage/
│   ├── app/                     # Application storage
│   │   └── public/              # Publicly accessible files
│   ├── logs/                    # Application logs
│   └── framework/               # Framework cache, sessions, views
├── config/                      # 18 configuration files
│   ├── app.php                  # Application settings
│   ├── database.php             # Database connections
│   ├── auth.php                 # Authentication
│   ├── excel.php                # Excel config
│   └── mail.php                 # Mail settings
├── bootstrap/                   # Framework bootstrap
├── vendor/                      # Composer dependencies
├── node_modules/                # NPM dependencies
├── .specify/                    # Spec-Driven Development artifacts
│   ├── memory/                  # Project memory/constitution
│   ├── templates/               # SDD templates
│   └── scripts/                 # Automation scripts
├── .env                         # Environment configuration (gitignored)
├── composer.json                # PHP dependencies
├── package.json                 # Node.js dependencies
├── phpunit.xml                  # PHPUnit test configuration
├── vite.config.js               # Vite build configuration
├── artisan                      # Laravel CLI tool
├── CLAUDE.md                    # This file
└── README.md                    # Project README
```

## Coding Conventions

### PHP/Laravel Standards
- **Namespace**: PSR-4 autoloading (`App\` → `app/`)
- **Models**: Use `$guarded = []` for mass assignment (be cautious)
- **Timestamps**: Some models disable timestamps (`public $timestamps = false`)
- **Naming**: Snake_case for database tables, camelCase for model properties
- **Controllers**: Fat controllers pattern (business logic in controllers, some in services)
- **Eloquent Relationships**: Extensive use of `belongsTo`, `hasMany`, `belongsToMany`
- **Query Builder**: Uses `selectRaw()`, `whereHas()`, conditional `when()` clauses
- **Custom Table Names**: Explicitly defined via `protected $table` property

### Frontend Standards
- **Views**: Blade templating engine with component-based structure
- **Assets**: Vite for hot module replacement and build process
- **Styling**: Tailwind CSS utility classes
- **Charts**: ApexCharts for data visualization
- **AJAX**: Axios for asynchronous requests

### Database Conventions
- **Primary Keys**: Custom IDs (e.g., `risk_id`, `asset_id`, not always `id`)
- **Foreign Keys**: Named with `_id` suffix
- **Naming**: Descriptive table names like `risk_master_table`, `control_master_table`
- **Pivot Tables**: Format `table1_vs_table2_table` (e.g., `risk_vs_control_table`)

### File Organization
- **Unused Code**: Archived in `_Unused/` directories, not deleted
- **Services**: Business logic for complex operations (reports, presentations)
- **Repositories**: Data access abstraction layer for reports
- **Exports**: Dedicated classes for Excel exports using Maatwebsite/Excel

## Key Commands

### Development
```bash
# Start local development server (if using Herd)
# Server runs at: http://grc.test/

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Run Vite dev server (hot reload)
npm run dev

# Build frontend assets for production
npm run build

# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generate application key (first-time setup)
php artisan key:generate

# Create storage symlink (for file uploads)
php artisan storage:link
```

### Database
```bash
# Run all migrations
php artisan migrate

# Run migrations with seeding
php artisan migrate --seed

# Rollback last migration batch
php artisan migrate:rollback

# Reset database (drop all tables and re-migrate)
php artisan migrate:fresh

# Reset and seed database
php artisan migrate:fresh --seed

# Check migration status
php artisan migrate:status

# Access database CLI
php artisan db
```

### Testing
```bash
# Run all tests
php artisan test
# or
./vendor/bin/phpunit

# Run specific test suite
php artisan test --testsuite=Unit
php artisan test --testsuite=Feature

# Run with coverage (requires Xdebug/PCOV)
php artisan test --coverage

# Run specific test file
php artisan test tests/Unit/ExampleTest.php
```

### Code Quality
```bash
# Format code with Laravel Pint (PHP CS Fixer)
./vendor/bin/pint

# Check code style without fixing
./vendor/bin/pint --test
```

### Artisan Helpers
```bash
# List all available commands
php artisan list

# Create new controller
php artisan make:controller ControllerName

# Create new model with migration
php artisan make:model ModelName -m

# Create new migration
php artisan make:migration create_table_name

# Create new seeder
php artisan make:seeder SeederName

# Display application info
php artisan about

# Access Laravel Tinker (REPL)
php artisan tinker

# Display current environment
php artisan env
```

### Deployment
```bash
# Optimize application for production
php artisan optimize

# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Put application in maintenance mode
php artisan down

# Bring application out of maintenance mode
php artisan up
```

## Important Notes

### Environment Configuration
- **Database**: MySQL connection configured in `.env` (DB_DATABASE=eagle_eye_may)
- **App URL**: `http://grc.test/` (Laravel Herd local domain)
- **Mail**: Using Mailpit (local mail testing on port 1025)
- **LDAP**: Integration configured but using test server (ldap.forumsys.com)
- **Debug Mode**: Enabled in development (`APP_DEBUG=true`)

### Authentication & Authorization
- **Multi-Role System**: SuperAdmin, Admin, Manager, Operator, User roles
- **Middleware**: Role-based access control in `app/Http/Middleware/`
- **Guards**: Session-based for web, Sanctum tokens for API
- **No Registration**: User accounts managed internally (no public registration)

### Database Gotchas
- **Custom Primary Keys**: Many models don't use standard `id` field
- **No Timestamps**: Several models have timestamps disabled
- **Complex Relationships**: Many-to-many with custom pivot tables
- **Raw Queries**: Heavy use of `selectRaw()` and `whereRaw()` for performance
- **Table Naming**: Non-standard naming (e.g., `_table` suffix, `_vs_` for pivots)

### File Upload & Storage
- **Public Disk**: Configured as default filesystem
- **Storage Link**: Run `php artisan storage:link` to create public symlink
- **Upload Path**: `storage/app/public/` → accessible via `/storage/` URL

### Legacy Code
- **Unused Controllers**: 30+ deprecated controllers in `_Unused/` directories
- **Unused Models**: Legacy models archived but not removed
- **Code Cleanup**: Consider reviewing and removing unused code for maintainability

### Performance Considerations
- **Large Controllers**: Some controllers exceed 400-600 lines
- **N+1 Queries**: Use eager loading (`with()`, `load()`) to prevent
- **Pagination**: Configured at 20 items per page by default
- **Caching**: File-based cache driver (consider Redis for production)

### Testing Environment
- **Separate Database**: Tests use in-memory or separate test database
- **Array Cache**: Tests use array driver to avoid cache pollution
- **Sync Queue**: Queue jobs run synchronously in tests
- **Coverage**: Configure Xdebug or PCOV for code coverage reports

### Security Notes
- **Mass Assignment**: Models use `$guarded = []` - be careful with request data
- **CSRF Protection**: Enabled by default for POST/PUT/DELETE requests
- **SQL Injection**: Use query builder/Eloquent to avoid SQL injection
- **File Uploads**: Validate file types and sizes in form requests
- **Secrets**: Never commit `.env` file (already in .gitignore)

### Reporting & Exports
- **Excel**: Use Maatwebsite/Excel for imports/exports
- **PDF**: mPDF library for PDF report generation
- **PowerPoint**: PHPOffice/PHPPresentation for presentations
- **Charts**: ApexCharts for interactive visualizations

### Development Workflow
- **Branch**: Currently on `feature/data-importer`
- **Spec-Driven Development**: `.specify/` directory contains SDD artifacts
- **PHR System**: Prompt History Records for AI-assisted development
- **ADRs**: Architectural Decision Records in `history/adr/`

### Common Issues
1. **Vite not working**: Ensure `npm run dev` is running for HMR
2. **Permission errors**: Check storage/ and bootstrap/cache/ write permissions
3. **Database connection**: Verify MySQL is running and credentials in `.env`
4. **Missing dependencies**: Run `composer install` and `npm install`
5. **Migrations fail**: Check if database exists and user has proper privileges
6. **Assets not loading**: Run `npm run build` for production builds

### Useful Resources
- **Laravel Docs**: https://laravel.com/docs/9.x
- **Laravel Debugbar**: Enabled in development for query inspection
- **Log Files**: Check `storage/logs/laravel.log` for errors
- **Tinker**: Use `php artisan tinker` for quick database queries and testing

### Project-Specific Features
- **PitStop Module**: Special feature for specific workflows
- **CISO Dashboard**: Executive-level compliance dashboards
- **KPI/KRI Tracking**: Key Performance/Risk Indicators monitoring
- **Third-Party Risk**: Vendor risk assessment capabilities
- **Penetration Testing**: Tracking and reporting of pen test findings
- **RTL Support**: Arabic language/RTL styling support in UI
- **Multi-Format Reports**: Regulatory, MIS, Exception reports in multiple formats

### Getting Started Checklist
1. Clone repository and navigate to project directory
2. Copy `.env.example` to `.env` (if not exists)
3. Configure database credentials in `.env`
4. Run `composer install`
5. Run `npm install`
6. Run `php artisan key:generate`
7. Run `php artisan migrate --seed`
8. Run `php artisan storage:link`
9. Start dev server (Herd handles this automatically)
10. Run `npm run dev` for frontend development
11. Access application at `http://grc.test/`

---

**Last Updated**: 2025-12-06
**Laravel Version**: 9.52.16
**PHP Version**: 8.0.2+
**Project Name**: Eagle Eye GRC System
