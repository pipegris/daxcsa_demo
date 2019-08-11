#Demo DAXCSA

This simple demo was written using Laravel 5.8 and Bootstrap 4.3

##API Definition

### Orders [/orders]
Collection of purchases made by the user

#### Show all orders 
[GET /orders]

Get a JSON representation of all the purchase orders.

#### Show details of a purchase order 
[GET /orders/{orderId}]

Get a JSON representation of a specific purchase order.


##Project details
- This demo was written using Laravel 5.8 and Bootstrap 4.3.
- There's one controller for the API and another for the User UI.
- Two blade templates, one for the listing (index.blade.php) and the other for the details (details.blade.php)
- Packages:
    - Dingo API (https://github.com/dingo/api) library to ease API building and modification.
    - Guzzle (https://github.com/guzzle/guzzle), a PHP HTTP client.
- Sample data is hardcoded in the file app/Api/Http/Controllers/orders_data.php.
    - It contains only a couple of orders to demonstrate the UI.
- No pagination or lazy loading functions implemented.
- Screenshots are in the root folder **screenshots**