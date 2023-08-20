# Bus Booking System

Welcome to the Bus Booking System! This application provides a fleet-management system for bus booking.

## Table of Contents
- [Special Configurations](#special-configurations)


## Special Configurations

Before you run the application, make sure to perform the following special configurations:

1. **Environment Configuration:**

   Rename the `.env.example` file to `.env` and update the database connection and other relevant settings. You might need to set the `APP_KEY` using `php artisan key:generate`.

2. **Database Migration:**

   Run database migrations to create the necessary tables in the database:

   ```sh
   php artisan migrate
3. **JWT Authentication:**
   ```sh
   php artisan jwt:secret

4. **Seed Database:**
   ```sh
   php artisan db:seed

5. **Run the Application::**
   ```sh
   php artisan serve


