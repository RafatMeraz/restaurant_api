# Restaurant API

Rest API for restaurant application. This API created by the Lumen micro service.

## Lumen Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Request parameter & response

<table>
    <tr>
        <th>Name</th>
        <th>Method</th>
        <th>Response</th>
        <th>Input</th>
    </tr>
    <tr>
        <td>/</td>
        <td>get</td>
        <td>String</td>
   </tr>
     <tr>
        <td>/register</td>
        <td>post</td>
        <td>String</td>
        <td>email, password, address, phone</td>
   </tr>
     <tr>
        <td>/login</td>
        <td>post</td>
        <td>String</td>
        <td>email, password</td>
   </tr>
     <tr>
        <td>/updateNamePhone</td>
        <td>put</td>
         <td>String</td>
        <td>email, password</td>
   </tr>
     <tr>
        <td>/changePassword</td>
        <td>put</td>
        <td>String</td>
        <td>email, old_password, new_password</td>
   </tr>
    <tr>
        <td>/menu</td>
        <td>get</td>
        <td>String</td>
   </tr> 
    <tr>
        <td>/foods</td>
        <td>get</td>
        <td>String</td>
   </tr>
   <tr>
        <td>/menuFoods</td>
        <td>get</td>
        <td>String</td>
   </tr>
   <tr>
        <td>/foodDetails</td>
        <td>get</td>
        <td>String</td>
   </tr>
    <tr>
        <td>/insertOrder</td>
        <td>post</td>
        <td>String</td>
   </tr>
   <tr>
        <td>/carts</td>
        <td>post</td>
        <td>String</td>
   </tr>
   <tr>
        <td>/carts</td>
        <td>delete</td>
        <td>String</td>
   </tr>
    <tr>
        <td>/tables</td>
        <td>get</td>
        <td>String</td>
   </tr>
   <tr>
        <td>/tables</td>
        <td>post</td>
        <td>String</td>
   </tr>
 
</table>

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
