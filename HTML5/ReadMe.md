```
php -S localhost:8000
```


GET http://localhost:8000/apiUser.php?username=Vasile@gmail.com&password=cemacon

POST http://localhost:8000/apiUser.php
```json
{
"username":"Vasile@gmail.com",
"password":"cemacon",
"phone":"0722222222",
"type":"VENDOR",
"address":"Oreadea"
}
```
PUT http://localhost:8000/apiUser.php?id=1
```json
{
"password":"cemacon",
"phone":"0722222222",
"type":"VENDOR",
"address":"Oreadea"
}
```

DELETE http://localhost:8000/apiUser.php?id=2