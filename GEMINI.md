# CISO 360 GRC System - Developer Guide

## Project Overview

CISO 360 is a comprehensive Governance, Risk, and Compliance (GRC) management application built on Laravel 9, providing enterprise-grade tools for risk assessment, audit management, control evaluation, asset tracking, vulnerability management, and regulatory compliance reporting.

## Technology Stack

### Backend
- **PHP**: `^8.0.2`
- **Laravel Framework**: `^9.19`
- **Database**: MySQL (primary), SQLite (testing)
- **Authentication**: Laravel Sanctum (API tokens) + Session-based auth
- **ORM**: Eloquent with PSR-4 autoloading

### Frontend
- **Build Tool**: Vite 4.0
- **CSS Framework**: Tailwind CSS (TailAdmin theme)
- **JavaScript**: Axios 1.1.2, Lodash 4.17.19
- **Charts**: ApexCharts 5.3.2

### Key PHP Packages
- **maatwebsite/excel**: `^3.1` (Excel import/export)
- **mpdf/mpdf**: `^8.2` (PDF generation)
- **phpoffice/phppresentation**: `^1.1` (PowerPoint generation)
- **guzzlehttp/guzzle**: `^7.2` (HTTP client)
- **barryvdh/laravel-debugbar**: `^3.9` (development debugging)

### Development Tools
- **Testing**: PHPUnit `^9.5.10`
- **Code Style**: Laravel Pint `^1.0`
- **Local Development**: Laravel Sail `^1.0.1` (Docker-based)
- **Mocking**: Mockery `^1.4.4`
- **Seeding**: Faker `^1.9.1`

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
- **Namespace**: `PSR-4` autoloading (`App\` → `app/`)
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
- **Database**: MySQL connection configured in `.env` (`DB_DATABASE=eagle_eye_may`)
- **App URL**: `http://grc.test/` (Laravel Herd local domain)
- **Mail**: Using Mailpit (local mail testing on port 1025)
- **LDAP**: Integration configured but using test server (`ldap.forumsys.com`)
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

**Last Updated**: 2026-01-01
**Laravel Version**: 9.52.16
**PHP Version**: 8.0.2+
**Project Name**: CISO 360 GRC System

===

<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to enhance the user's satisfaction building Laravel applications.

## Foundational Context
This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.3.19
- laravel/framework (LARAVEL) - v11
- laravel/prompts (PROMPTS) - v0
- laravel/sanctum (SANCTUM) - v4
- laravel/mcp (MCP) - v0
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- phpunit/phpunit (PHPUNIT) - v10

## Conventions
- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts
- Do not create verification scripts or tinker when tests cover that functionality and prove it works. Unit and feature tests are more important.

## Application Structure & Architecture
- Stick to existing directory structure - don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling
- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Replies
- Be concise in your explanations - focus on what's important rather than explaining obvious details.

## Documentation Files
- You must only create documentation files if explicitly requested by the user.


=== boost rules ===

## Laravel Boost
- Laravel Boost is an MCP server that comes with powerful tools designed specifically for this application. Use them.

## Artisan
- Use the `list-artisan-commands` tool when you need to call an Artisan command to double check the available parameters.

## URLs
- Whenever you share a project URL with the user you should use the `get-absolute-url` tool to ensure you're using the correct scheme, domain / IP, and port.

## Tinker / Debugging
- You should use the `tinker` tool when you need to execute PHP to debug code or query Eloquent models directly.
- Use the `database-query` tool when you only need to read from the database.

## Reading Browser Logs With the `browser-logs` Tool
- You can read browser logs, errors, and exceptions using the `browser-logs` tool from Boost.
- Only recent browser logs will be useful - ignore old logs.

## Searching Documentation (Critically Important)
- Boost comes with a powerful `search-docs` tool you should use before any other approaches. This tool automatically passes a list of installed packages and their versions to the remote Boost API, so it returns only version-specific documentation specific for the user's circumstance. You should pass an array of packages to filter on if you know you need docs for particular packages.
- The 'search-docs' tool is perfect for all Laravel related packages, including Laravel, Inertia, Livewire, Filament, Tailwind, Pest, Nova, Nightwatch, etc.
- You must use this tool to search for Laravel-ecosystem documentation before falling back to other approaches.
- Search the documentation before making code changes to ensure we are taking the correct approach.
- Use multiple, broad, simple, topic based queries to start. For example: `['rate limiting', 'routing rate limiting', 'routing']`.
- Do not add package names to queries - package information is already shared. For example, use `test resource table`, not `filament 4 test resource table`.

### Available Search Syntax
- You can and should pass multiple queries at once. The most relevant results will be returned first.

1. Simple Word Searches with auto-stemming - query=authentication - finds 'authenticate' and 'auth'
2. Multiple Words (AND Logic) - query=rate limit - finds knowledge containing both "rate" AND "limit"
3. Quoted Phrases (Exact Position) - query="infinite scroll" - Words must be adjacent and in that order
4. Mixed Queries - query=middleware "rate limit" - "middleware" AND exact phrase "rate limit"
5. Multiple Queries - queries=["authentication", "middleware"] - ANY of these terms


=== php rules ===

## PHP

- Always use curly braces for control structures, even if it has one line.

### Constructors
- Use PHP 8 constructor property promotion in `__construct()`.
    - <code-snippet>public function __construct(public GitHub $github) { }</code-snippet>
- Do not allow empty `__construct()` methods with zero parameters.

### Type Declarations
- Always use explicit return type declarations for methods and functions.
- Use appropriate PHP type hints for method parameters.

<code-snippet name="Explicit Return Types and Method Params" lang="php">
protected function isAccessible(User $user, ?string $path = null): bool
{
    ...
}
</code-snippet>

## Comments
- Prefer PHPDoc blocks over comments. Never use comments within the code itself unless there is something _very_ complex going on.

## PHPDoc Blocks
- Add useful array shape type definitions for arrays when appropriate.

## Enums
- Typically, keys in an Enum should be TitleCase. For example: `FavoritePerson`, `BestLake`, `Monthly`.


=== herd rules ===

## Laravel Herd

- The application is served by Laravel Herd and will be available at: https?://[kebab-case-project-dir].test. Use the `get-absolute-url` tool to generate URLs for the user to ensure valid URLs.
- You must not run any commands to make the site available via HTTP(s). It is _always_ available through Laravel Herd.


=== tests rules ===

## Test Enforcement

- Every change must be programmatically tested. Write a new test or update an existing test, then run the affected tests to make sure they pass.
- Run the minimum number of tests needed to ensure code quality and speed. Use `php artisan test` with a specific filename or filter.


=== laravel/core rules ===

## Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using the `list-artisan-commands` tool.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Database
- Always use proper Eloquent relationship methods with return type hints. Prefer relationship methods over raw queries or manual joins.
- Use Eloquent models and relationships before suggesting raw database queries
- Avoid `DB::`; prefer `Model::query()`. Generate code that leverages Laravel's ORM capabilities rather than bypassing them.
- Generate code that prevents N+1 query problems by using eager loading.
- Use Laravel's query builder for very complex database operations.

### Model Creation
- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `list-artisan-commands` to check the available options to `php artisan make:model`.

### APIs & Eloquent Resources
- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

### Controllers & Validation
- Always create Form Request classes for validation rather than inline validation in controllers. Include both validation rules and custom error messages.
- Check sibling Form Requests to see if the application uses array or string based validation rules.

### Queues
- Use queued jobs for time-consuming operations with the `ShouldQueue` interface.

### Authentication & Authorization
- Use Laravel's built-in authentication and authorization features (gates, policies, Sanctum, etc.).

### URL Generation
- When generating links to other pages, prefer named routes and the `route()` function.

### Configuration
- Use environment variables only in configuration files - never use the `env()` function directly outside of config files. Always use `config('app.name')`, not `env('APP_NAME')`.

### Testing
- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

### Vite Error
- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.


=== laravel/v11 rules ===

## Laravel 11

- Use the `search-docs` tool to get version specific documentation.
- This project upgraded from Laravel 10 without migrating to the new streamlined Laravel 11 file structure.
- This is **perfectly fine** and recommended by Laravel. Follow the existing structure from Laravel 10. We do not to need migrate to the Laravel 11 structure unless the user explicitly requests that.

### Laravel 10 Structure
- Middleware typically live in `app/Http/Middleware/` and service providers in `app/Providers/`.
- There is no `bootstrap/app.php` application configuration in a Laravel 10 structure:
    - Middleware registration is in `app/Http/Kernel.php`
    - Exception handling is in `app/Exceptions/Handler.php`
    - Console commands and schedule registration is in `app/Console/Kernel.php`
    - Rate limits likely exist in `RouteServiceProvider` or `app/Http/Kernel.php`

### Database
- When modifying a column, the migration must include all of the attributes that were previously defined on the column. Otherwise, they will be dropped and lost.
- Laravel 11 allows limiting eagerly loaded records natively, without external packages: `$query->latest()->limit(10);`.

### Models
- Casts can and likely should be set in a `casts()` method on a model rather than the `$casts` property. Follow existing conventions from other models.

### New Artisan Commands
- List Artisan commands using Boost's MCP tool, if available. New commands available in Laravel 11:
    - `php artisan make:enum`
    - `php artisan make:class `
    - `php artisan make:interface `


=== pint/core rules ===

## Laravel Pint Code Formatter

- You must run `vendor/bin/pint --dirty` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test`, simply run `vendor/bin/pint` to fix any formatting issues.


=== phpunit/core rules ===

## PHPUnit Core

- This application uses PHPUnit for testing. All tests must be written as PHPUnit classes. Use `php artisan make:test --phpunit {name}` to create a new test.
- If you see a test using "Pest", convert it to PHPUnit.
- Every time a test has been updated, run that singular test.
- When the tests relating to your feature are passing, ask the user if they would like to also run the entire test suite to make sure everything is still passing.
- Tests should test all of the happy paths, failure paths, and weird paths.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files, these are core to the application.

### Running Tests
- Run the minimal number of tests, using an appropriate filter, before finalizing.
- To run all tests: `php artisan test`.
- To run all tests in a file: `php artisan test tests/Feature/ExampleTest.php`.
- To filter on a particular test name: `php artisan test --filter=testName` (recommended after making a change to a related file).
</laravel-boost-guidelines>
