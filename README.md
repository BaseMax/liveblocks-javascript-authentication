# Liveblocks JavaScript Authentication

This repository provides a simple implementation of user authentication for Liveblocks using JavaScript. Liveblocks is a platform that enables real-time collaborative experiences in web applications. This example demonstrates how to authenticate users and manage access to rooms.

![Liveblocks JavaScript Authentication](https://github.com/user-attachments/assets/57221258-05c2-44b6-a07b-724c060b7197)

https://liveblocks.io

## Features

- Generate unique user IDs for session management.
- Manage user access to different rooms based on organization and group.
- Simple integration with Liveblocks for real-time collaboration.
- Example frontend and backend implementation.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- [Node.js](https://nodejs.org/) installed on your machine (version 14 or later).
- A Liveblocks account and a valid secret key.

## Installation

Clone the repository:

 ```bash
 git clone https://github.com/BaseMax/liveblocks-javascript-authentication.git
 cd liveblocks-javascript-authentication
 ```

Install the dependencies:

```bash
npm install
```

Start the backend server:

```bash
node auth.js
```

Run `npm run dev` and open the URL in the browser to see the frontend in action.

## Usage

Click the "Connect to Room" button in the frontend to initiate a connection to the Liveblocks room.

The backend will handle the authentication process and return the appropriate response to the frontend.

The frontend will update the status of connected users in real-time.

## Folder Structure

```
liveblocks-javascript-authentication/
├── .gitignore
├── auth.js                # Backend authentication logic
├── index.html             # Frontend HTML file
├── package.json           # Node.js dependencies
├── package-lock.json      # Lock file for package dependencies
├── README.md              # Project documentation
└── room.js                # Liveblocks client configuration
```

## API Endpoints

### `POST /api/liveblocks-auth`

Authenticates the user and authorizes access to a Liveblocks room.

Request Body:

```
{
  "roomId": "string"
}
```

Response:
```
{
  "token": "long string"
}
```

- **200 OK:** User is successfully authenticated.
- **400:** Authentication failed due to missing or invalid data.

## License

This project is licensed under the GPL-3.0 License.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request to improve this project.

Copyright 2024, Max Base
