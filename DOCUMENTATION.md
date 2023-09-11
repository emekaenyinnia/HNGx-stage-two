
# Introduction for testing the api:

The User Api is a RESFUL web service that allow a user to create, retrieve, update, and delete an account. It is straight forward and easy to consume

!. Create a new User.
Endpoint: Use an HTTP POST request to a dedicated user creation endpoint, 
https://hngx-stage-two-el3e.onrender.com/api.
Method : POST.
Request body:
Send user information in the request body in a structured format, usually JSON. Include the data name as a string.
````
example :
{
    "name" : "david"
}

response 
{
    "status": "success",
    "data": {
        "name": "david",
        "updated_at": "2023-09-10T20:23:12.000000Z",
        "created_at": "2023-09-10T20:23:12.000000Z",
        "id": 16
    },
    "message": "account created successfully ",
    "status_code": 200
}
````

2. Get a Specific User by Name.
Endpoint:https://hngx-stage-two-el3e.onrender.com/api/{user_id}.
Method : GET.
Request body:
include the user id in the url 
```
eg
https://hngx-stage-two-el3e.onrender.com/api/18

response:
{
    "status": "success",
    "data": {
        "id": 16,
        "name": "david",
        "created_at": "2023-09-10T20:23:12.000000Z",
        "updated_at": "2023-09-10T20:23:12.000000Z"
    },
    "message": "user data retrieved successfully ",
    "status_code": 200
}

```

3. Update a Specific Task by id.

Endpoint: https://hngx-stage-two-el3e.onrender.com/api/18.
Method : PUT.
```
eg
https://hngx-stage-two-el3e.onrender.com/api/18

Request Body:
{
    "name" : "emeka",
}

response:
{
    "status": "success",
    "message": "user name updated successfully ",
    "status_code": 200
}
```


4. Delete a Specific User by id.

Endpoint:https://hngx-stage-two-el3e.onrender.com/api/18.
Method: DELETE.

```
eg
https://hngx-stage-two-el3e.onrender.com/api/18

Response:
{
    "status": "success",
    "message": "your account was deleted successfully",
    "status_code": 200
}

```