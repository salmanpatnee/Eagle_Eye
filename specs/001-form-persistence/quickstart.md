# Quickstart Guide: Welcome Form Persistence

This guide provides the essential steps for a developer to implement the welcome form persistence feature.

## 1. Set Up the Database

- **Create Migration**: Generate the migration file for the `leads` table.
  ```bash
  php artisan make:migration create_leads_table
  ```
- **Define Schema**: Open the newly created migration file in `database/migrations/` and use the schema definition from the `data-model.md` file.
- **Run Migration**: Apply the migration to the database.
  ```bash
  php artisan migrate
  ```

## 2. Create Backend Components

- **Create Model**: Generate the Eloquent model for the `leads` table.
  ```bash
  php artisan make:model Lead
  ```
  Ensure the `$fillable` property in `app/Models/Lead.php` includes `['fullname', 'email', 'phone', 'company', 'message']`.

- **Create Form Request Validation**: Generate a dedicated request class to handle validation.
  ```bash
  php artisan make:request StoreLeadRequest
  ```
  In `app/Http/Requests/StoreLeadRequest.php`, define the validation rules as specified in `data-model.md`.

- **Create Controller**: Generate the controller to handle the incoming requests.
  ```bash
  php artisan make:controller LeadController
  ```

- **Implement Controller Logic**: In `app/Http/Controllers/LeadController.php`, create a `store` method. This method should type-hint the `StoreLeadRequest` and use it to create and save a new `Lead`. It should return a JSON response indicating success.

  ```php
  // app/Http/Controllers/LeadController.php
  
  use App\Http\Requests\StoreLeadRequest;
  use App\Models\Lead;
  use Illuminate\Http\JsonResponse;

  public function store(StoreLeadRequest $request): JsonResponse
  {
      $lead = Lead::create($request->validated());
      
      return response()->json([
          'success' => true,
          'message' => 'Thank you for your inquiry! We will be in touch soon.'
      ]);
  }
  ```

## 3. Define the Route

- **Add Web Route**: In `routes/web.php`, add a `POST` route that points to the `store` method in your `LeadController`.

  ```php
  // routes/web.php
  
  use App\Http\Controllers\LeadController;

  Route::post('/contact-inquiry', [LeadController::class, 'store'])->name('contact.store');
  ```

## 4. Update Frontend JavaScript

- **Modify `welcome.blade.php`**: Locate the `<script>` section at the bottom of the file.
- **Use Axios**: The project already includes Axios. Use it to send the form data to the `/contact-inquiry` route.
- **Handle Response**:
  - On a successful response (e.g., status 200), show the success message from the JSON response and close the modal.
  - On a validation error (status 422), parse the JSON error response and display the validation messages next to the corresponding form fields.
  - On a server error (status 500), show a generic error message.
- **Prevent Default Submission**: Make sure to call `e.preventDefault()` within the form's `submit` event listener to stop the traditional form submission.
