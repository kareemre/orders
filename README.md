# Base URL
http://localhost:8000/api


# Headers



Accept : application/json



# API 



| Route                           | Request Method | Parameters                                           | Response  |
| -----------                     | -----------    |-----------                                           |---------- |
|/orders                          | POST           |  [Posting a new order](#PostOrderRequest)            |[Response](#Response)|
|/orders                          | GET            |  [Getting a specific order ](#GetOrderRequest)       |[Response](#GetResponse)|






# <a name="PostOrderRequest"> </a> Posting a new order 

```json
{
    "customer_id": "int",
    "product_name": "string",
    "quantity": "int",
    "price": "decimal",
    "status": "string"
} 
```




# <a name="Response"> </a> Responses 

## Validation error 
__*Response code : 401*__

```json 
{
    "success": false,
    "Message": "Validation Error",
    "payload": null,
}
```
## Success  
__*Response code : 201*__
```json 
{
  "payload": {
      "customer_id": "int",
      "product_name": "string",
      "quantity": "int",
      "price": "decimal",
      "status": "string"
  }
 "success": true
 "message":  "successfully stored"
}
```

`Note` status code will 201 if the Request is POST




# <a name="GetOrderRequest"> </a> Order's id 

```json
{
    "id" : "int",
} 
```



# <a name="GetResponse"> </a> Get a specific order




## Order Not Found 
__*Response code : 404*__

```json 
{
  "success": false
  "message": "Order not found"
  "payload": null
}
```



## Success  
__*Response code : 200*__
```json
{
  "payload": {
      "customer_id": "int",
      "product_name": "string",
      "quantity": "int",
      "price": "decimal",
      "status": "string"
  }
 "success": true
 "message":  null
}
```
