# Task Management Application

## Overview

This is a Task Management Application built with Laravel and Blade. The application allows users to perform basic CRUD operations on tasks and includes user authentication. Users can view, add, edit, and delete tasks while ensuring that each task is associated with the logged-in user.

## Requirements

### Front-End:
- I used Laravel's Blade templating engine in conjunction with AJAX to create a dynamic and responsive user interface. This allows for seamless interactions, such as adding, editing, and deleting tasks without requiring a full page refresh.
- Users can:
  - View a list of tasks.
  - Add new tasks with a title and description.
  - Edit existing tasks.
  - Delete tasks.
- Use Bootstrap for basic styling to enhance the user experience and make the application visually appealing.

### Back-End:
- **Repositories**:
  - I implemented two repositories for user authentication:
    - **`AuthBladeRepository`**: This repository is responsible for rendering the registration and login views. It provides methods to return the registration and login pages.
    - **`AuthLogicRepository`**: This repository handles the business logic for user registration and login. It contains methods to register a new user, log in an existing user, and log out a user. The registration method creates a new user in the database, and the login method validates user credentials and manages user sessions.

  - I also created a **`HomeRepository`**:
    - This repository retrieves statistics for the home page, including the total count of tasks, the count of tasks associated with the logged-in user, and the total count of users. It fetches this data and passes it to the view for rendering.

  - Additionally, I implemented a **`TaskRepository`**:
    - This repository is responsible for managing tasks. It includes methods for listing tasks, editing a specific task, storing a new task, updating an existing task, and deleting a task. Each method interacts with the Eloquent model to perform CRUD operations and returns the appropriate responses.

### User Authentication:
- Implement user registration and login functionality using Laravel's built-in authentication features.
- Ensure that tasks are associated with the logged-in user using the `user_id` foreign key.

## Validation
- I used Laravel's request validation for input data to ensure the integrity of task data before performing any operations. This guarantees that all required fields are present and valid when tasks are created or updated.

## Setup and Running the Application Locally

1. **Clone the Repository**
   ```bash
   git clone https://github.com/AhmedRamadan233/TaskManagementApplication.git
   cd TaskManagementApplication
   ```