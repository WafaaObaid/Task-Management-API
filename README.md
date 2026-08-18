# Task Management API

A Laravel-based Task Management API that allows users to create, view, update, and delete their own tasks.

## Features

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

## Technologies Used

- Laravel 13
- PHP
- MySQL
- Laravel Sanctum
- REST API
- Postman
- Bootstrap

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

## Testing

The API was tested using Postman, including:

- Registration
- Login
- Logout
- Task CRUD operations
- Authentication using Bearer Tokens
- Authorization between different users

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

## Future Improvements
- Complete the web interface for task management
- Add task restoration for soft-deleted tasks
- Add search and filtering
- Add pagination
- Improve API response structure using API Resources
- Add automated tests
- Add task restoration for soft-deleted tasks
