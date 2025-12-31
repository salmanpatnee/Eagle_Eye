# Quickstart: Industry Management Development

## Prerequisites
- PHP 8.0.2+
- Laravel 9.x
- Composer
- MySQL database with hr_industry_table
- Node.js and npm for frontend assets

## Setup Steps

1. **Database Setup**
   ```bash
   # Ensure the hr_industry_table exists with required fields
   # Fields: industry_id (primary key), industry_name (required), sector (nullable)
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**
   ```bash
   # Copy .env.example to .env and configure database settings
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Migration (if needed)**
   ```bash
   # Only if the table doesn't exist
   php artisan migrate
   ```

5. **Storage Link**
   ```bash
   php artisan storage:link
   ```

## Development Commands

```bash
# Run the development server
php artisan serve

# Build frontend assets
npm run dev

# Run tests
php artisan test

# Format code
./vendor/bin/pint
```

## Key Files to Modify/Review

1. **Model**: `app/Models/Industry.php`
2. **Controller**: `app/Http/Controllers/HumanResourceController.php` (add industry methods)
3. **Form Request**: `app/Http/Requests/IndustryRequest.php` (create if needed)
4. **Views**: `resources/views/process/hr/industries/`
   - `index.blade.php` - List view
   - `create.blade.php` - Create form
   - `edit.blade.php` - Edit form
   - `show.blade.php` - Detail view
5. **Routes**: Add to `routes/web.php`
6. **Sidebar Navigation**: Update layout file to include industry link

## Testing the Implementation

1. Navigate to the industry management section in the sidebar
2. Create a new industry with a unique name
3. Verify the industry appears in the list
4. Edit the industry details
5. Delete the industry (if not referenced by other entities)
6. Test validation by attempting to create duplicate industry names