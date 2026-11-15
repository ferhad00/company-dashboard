# Company Dashboard

A Laravel-based company management application designed to organize users into teams, assign team managers, and manage tasks associated with individual team members.

The application provides separate administrator and regular-user dashboards, with team organization and task tracking as its main functionalities.

## Features

### Authentication & User Management

- User registration and login.
- Session-based authentication.
- Password hashing.
- User logout and session invalidation.
- Administrator and regular-user roles.
- User management, including editing and deleting accounts.

### Role-Based Dashboards

**Administrator Dashboard**

- View registered users.
- View existing teams.
- Access user management functionality.
- Manage team creation, membership, and configuration.
- Access task management operations.

**Regular User Dashboard**

- Access a personalized dashboard.
- View teams they belong to.
- Access team information and related tasks.

### Team Management

- Create and manage teams.
- Assign a manager to each team.
- Add multiple users to a team.
- Ensure the assigned manager is also a team member.
- View team details and membership.
- Update team information and members.
- Delete teams.

### Task Management

- Create tasks associated with team memberships.
- Edit existing tasks.
- Delete tasks.
- Track task completion status.
- Mark tasks as completed.
- Associate tasks with specific users within their teams.

## Application Architecture

The project follows Laravel's MVC architecture.

| Component | Responsibility |
|---|---|
| Models | Represent users, teams, and tasks and define their relationships. |
| Controllers | Handle authentication, user management, teams, and tasks. |
| Middleware | Protect authenticated routes and apply task-related checks. |
| Form Requests | Validate incoming user, team, and task data. |
| Views | Render dashboards, forms, and management pages. |
| Database | Store users, teams, team memberships, and tasks. |

### Main Components

- `UserController` — Authentication and user management.
- `TeamController` — Team creation, membership, and management.
- `TaskController` — Task creation, editing, deletion, and completion.
- `UserMiddleware` — Restricts access to authenticated users.
- `TaskMiddleware` — Implements additional task completion checks.

## Database Relationships

The application uses Laravel Eloquent relationships.

```text
User
 |
 +---- Has many ----> Teams (managed teams)
 |
 +---- Belongs to many ----> Teams
 |                           |
 |                           +---- team_user
 |                                  |
 |                                  +---- Has many ----> Tasks
 |
 +---- Has many ----> Tasks (through team membership)
```

**User & Team**
- A user can manage teams.
- A user can belong to multiple teams.
- A team can contain multiple users.
- Each team has an assigned manager.

**Team & Task**
- Tasks are associated with a team membership rather than directly with a team.
- This allows tasks to be associated with a particular user within a particular team.

**Task Status**
- Tasks have a completion status represented by `isCompleted`.

## Technology Stack

- PHP 8.2+
- Laravel 12
- MySQL / SQLite (depending on environment configuration)
- Composer
- JavaScript
- Vite
- HTML / CSS

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/ferhad00/company-dashboard.git
cd company-dashboard
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure environment variables

```bash
cp .env.example .env
```

Configure your database connection in `.env`.

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Run database migrations

```bash
php artisan migrate
```

### 6. Start the application

```bash
php artisan serve
```

In another terminal:

```bash
npm run dev
```

Visit `http://127.0.0.1:8000` to access the application.

## Development Notes

This project was developed as a practical exercise in Laravel application development, focusing on:

- MVC architecture.
- Authentication and authorization.
- Role-based dashboards.
- Eloquent relationships.
- Many-to-many relationships and pivot tables.
- CRUD operations.
- Form Request validation.
- Middleware.
- Team and task management.

## Project Status

The project is a personal development project and may contain unfinished functionality.

## License

This project is currently provided for educational and development purposes.
