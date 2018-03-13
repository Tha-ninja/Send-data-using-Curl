# Send-data-using-Curl
## This project shows how to send mysql data in json array format via curl.
It can be used to sync two different databases i.e remote databases.
>Sometimes, you’ll come across web services and APIs that will require you to send JSON via a POST request.

```php
//API Url
$url = 'http://example.com/api/JSON/create';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$jsonData = array(
    'username' => 'MyUsername',
    'password' => 'MyPassword'
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);
```
1. We setup the URL that we want to send our JSON to.
2. We initiated cURL using curl_init.
3. We setup a PHP array containing sample data.
4. We encoded our PHP array into a JSON string by using the function json_encode.
5. We specified that we were sending a POST request by setting the CURLOPT_POST option to 1.
6. We attached our JSON data using the CURLOPT_POSTFIELDS option.
7. We set the content-type of our request to application/json. It is extremely important to note that you should always use “application/json”, not “text/json”. Simply put, using “text/json” is incorrect!
8. Finally, we used the function curl_exec to execute our POST request. If you want to check for errors at this stage, then you should check out my article on error handling with cURL.
9.As you can see, it’s not much different than sending a regular POST request. In fact, it’s actually pretty simple.

***To receive RAW post data in PHP, you can use the php://input stream like so:***

```php
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}
```

1. We validate the request type by checking to see if it is POST. This will prevent the script from trying to process other request types such as GET.
2. We validate the content type. In this case, we want it to be application/json.
3. We retrieve the raw POST data from the php://input stream.
4. We attempt to decode the contents of the POST data from JSON into a PHP associative array.
5. We check to see if the result is an array. If it is not an array, then something has gone wrong.
###### After that, we can process the associative array.
