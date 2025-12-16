# Data Model: Lead

This document outlines the data structure for storing contact form submissions, referred to as "Leads".

## Entity: Lead

Represents a single inquiry or message submitted through the contact form on the website.

- **`id`**: Unique identifier for the lead (Primary Key).
- **`fullname`**: The full name of the person submitting the inquiry.
- **`email`**: The work email address provided by the user. This should be unique to prevent duplicate entries from the same person.
- **`phone`**: The contact phone number.
- **`company`**: The name of the company or organization the user represents.
- **`message`**: The content of the user's inquiry or problem description.
- **`created_at`**: Timestamp when the record was created.
- **`updated_at`**: Timestamp when the record was last updated.

## Schema (Laravel Migration)

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('company');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
```

## Validation Rules

- `fullname`: required, string, max:255
- `email`: required, email, max:255, unique:leads,email
- `phone`: required, string, max:255
- `company`: required, string, max:255
- `message`: required, string

These rules will be enforced by a Form Request class before the data reaches the controller.
