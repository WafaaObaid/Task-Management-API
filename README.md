# Task Management API

A Laravel-based Task Management application that provides a REST API and a web interface for users to create, view, update, and manage their own tasks.

## Features

- Landing page
- User Registration
- User Login
- User Logout
- Token-based Authentication using Laravel Sanctum
- Create Tasks
- View Tasks
- View a Single Task
- Update Tasks
- Delete Tasks
- Task ownership and authorization
- Input validation
- MySQL database
- Soft Delete support for tasks
- Restore deleted tasks
- Web interface for task management
- Bootstrap-based responsive UI
- Delete confirmation modal
- Separate page for deleted tasks
- Restore deleted tasks from the web interface

## Technologies Used

- Laravel 13
- PHP
- MySQL
- Laravel Sanctum
- REST API
- Postman
- Bootstrap
- Blade

## Task Fields

Each task contains:

- ID
- User ID
- Title
- Description
- Status
- Due Date
- Created At
- Updated At
- Deleted At

### Task Status

Tasks can have one of three statuses:

- `pending`
- `in_progress`
- `completed`

## Authentication

The API uses Laravel Sanctum for authentication.

Users can:

1. Register a new account.
2. Login and receive an authentication token.
3. Use the token to access protected endpoints.
4. Logout and invalidate their current token.

## API Endpoints

### Authentication

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/register` | Register a new user |
| POST | `/api/login` | Login |
| POST | `/api/logout` | Logout |

### Tasks

| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/tasks` | Get user's tasks |
| POST | `/api/tasks` | Create a task |
| GET | `/api/tasks/{id}` | Get a specific task |
| PUT/PATCH | `/api/tasks/{id}` | Update a task |
| DELETE | `/api/tasks/{id}` | Delete a task |

Each task belongs to a specific user.

Users can only access, update, or delete their own tasks.

Unauthorized access to another user's task returns:

```text
403 Forbidden
```

## Web Interface

The project also includes a web interface built with Laravel Blade and Bootstrap.

Users can:

- Access the landing page.
- Register and login.
- View their tasks in a table.
- Add new tasks.
- Edit existing tasks.
- Delete tasks using a confirmation modal.
- View deleted tasks on a separate page.
- Restore soft-deleted tasks.

The web interface provides a simple and responsive design for managing tasks.

## Demo Account
If you want to try the web interface, you can log in using the following demo account:

# Email
ali@example.com

# Password
ali123456

This account is intended for demonstration and testing purposes only.

## Testing

The API was tested using Postman, including:

- Registration
- Login
- Logout
- Task CRUD operations
- Authentication using Bearer Tokens
- Authorization between different users

The web interface was also tested for:

- User registration
- User login
- Creating tasks
- Viewing tasks
- Editing tasks
- Deleting tasks
- Viewing deleted tasks
- Restoring deleted tasks

## Installation

- Clone the repository:

```bash
git clone <repository-url>
```

- Navigate to the project:

```bash
cd Task_Management
```

- Install dependencies:

```bash
composer install
```

- Create the environment file:

```bash
cp .env.example .env
```

- Generate the application key:

```bash
php artisan key:generate
```

- Configure the database in `.env`, then run:

```bash
php artisan migrate
```

- Start the development server:

```bash
php artisan serve
```


## Project Structure

```text
Task_Management/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── TaskController.php
│   │       └── AuthController.php
│   │
│   └── Models/
│       ├── Task.php
│       └── User.php
│
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_tasks_table.php
│   │   └── add_deleted_at_to_tasks_table.php
│   │
│   └── seeders/
│
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       │
│       └── tasks/
│           |── landing.blade.php
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── deleted.blade.php
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── .env.example
├── composer.json
└── README.md
```
