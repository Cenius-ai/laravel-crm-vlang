# USAGE.md

Once the server is running (`php artisan serve`), open your browser at `http://localhost:8000`.

## Features

- **List all customers**  
  Visit `/customers` to see the list of seeded and added customers.

- **Add a new customer**  
  Go to `/customers/create` and fill in the form. On submission, the customer is stored and you are redirected to the list.

- **View customer details and notes**  
  Click a customer name on the list or visit `/customers/{id}`.

## API Endpoints (web interface)

All routes are defined in `routes/web.php` and handled by `App\Http\Controllers\CustomerController`.

| Method | URI                    | Action           | Description                  |
|--------|------------------------|------------------|------------------------------|
| GET    | `/customers`           | index            | List all customers           |
| GET    | `/customers/create`    | create           | Show add customer form       |
| POST   | `/customers`           | store            | Save new customer            |
| GET    | `/customers/{id}`      | show             | Show customer details + notes|

### curl examples

- **List customers**
  ```bash
  curl http://localhost:8000/customers
  ```

- **Create a new customer** (fields depend on your form; example assumes `name`, `email`, `phone`, `notes` are present)
  ```bash
  curl -X POST http://localhost:8000/customers \
    -d "name=Jane%20Doe" \
    -d "email=jane@example.com" \
    -d "phone=555-0100" \
    -d "notes=New%20lead"
  ```

- **View customer details**
  ```bash
  curl http://localhost:8000/customers/1
  ```

## No Authentication

The application has no authentication. All pages are publicly accessible. Do not expose the dev server to public networks.