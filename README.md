Introduction:

The User Api is a RESFUL web service that allow a user to create, retrieve, update, and delete an account. It is straight forward and easy to consume

!. Create a new User 
Endpoint: Use an HTTP POST request to a dedicated user creation endpoint, 
localhost:8000/api/user/create,
Method : POST
Request body 
Send user information in the request body in a structured format, usually JSON. Include the data name as a string.
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


2. Get a Specific User by Name
Endpoint:'localhost:8000/api/user/{name}',
Method : GET
Request body
Just pass the username as a parameter 
eg
localhost:8000/api/user/{name}

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


3. Update a Specific Task by Name

Endpoint: localhost:8000/api/user/update
Method : PUT
Request Body:
{
    "old_name" : "emeka",
    "new_name" : "david"
}

response:
{
    "status": "success",
    "message": "user name updated successfully ",
    "status_code": 200
}



4. Delete a Specific User by Name

Endpoint: localhost:8000/api/user/Delete
Method: DELETE
Response body:
{
    "name" : "david"
} 

Response:
{
    "status": "success",
    "message": "your account was deleted successfully",
    "status_code": 200
}