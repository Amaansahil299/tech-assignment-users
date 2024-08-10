# Users Service

This is the Users Service which provides an endpoint to create users and send an event to the message broker when a user is created.

## Requirements

- Docker
- Docker Compose

## Setup

1. Clone the repository:

    ```bash
    git clone git@github.com:Amaansahil299/tech-assignment-users.git
    cd tech-assignment-users
    ```

2. Navigate to the `users` directory:

    ```bash
    cd users
    ```

3. Build and start the Docker containers:

    ```bash
    docker-compose up --build
    ```

4. The `users` service will be available at `http://localhost:8001`.

## Environment Variables

Ensure the following environment variables are set in the `.env` file:

```dotenv
DATABASE_URL=mysql://user:password@db:3306/users
MESSENGER_TRANSPORT_DSN=amqp://guest:guest@rabbitmq:5672/%2f/messages
```

## Curl Request
curl -X POST http://localhost:8001/users -H "Content-Type: application/json" -d '{"email": "amanullahsahil299@gmail.com", "firstName": "Aman", "lastName": "Ullah"}'
