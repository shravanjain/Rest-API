# REST-API
REST API for LookingToRide Project using PHP, Slim and MySQL

## What is REST
REST architecture will be useful to build client/server network applications. REST represents Representational State Transfer. It basically works on HTTP protocol. 

## Installation

	1. Clone this repo and store it in htdocs
	2. sql file from sql folder of this repo
	3. Import It
	4. Get your IP address and replace my IP andress in all the calls
	5. Format will be http://IP/v1/call_what_you_want

## List of things should be considered while building a REST api

### HTTP Methods

	GET 	To fetch a resource

	POST 	To create a new resource

	PUT 	To update existing resource

	DELETE 	To delete a resource

### HTTP Status Code
HTTP status codes in the response body tells client application what action should be taken with the response. 

### URL Structure
Every URL for a resource should be uniquely identified.
The API key should be kept in request header Authorization filed instead of passing via url.


## Slim PHP Micro Framework
Provides a middle layer architecture which will be useful to filter the requests.
In our case we can use it for verifying the API Key.

Download the Slim framework from https://github.com/codeguy/Slim (download the stable release) 

## Chrome Advanced REST client extension for Testing
It provides lot of options like adding request headers, adding request parameters, changing HTTP method while hitting an url. Install Advanced REST client extension in chrome browser.

## Rules

1. All CRUD operations API calls should include API key in Authorization header field.
2. Normally Slim framework works when index.php includes in the url which makes url not well-formed. So using the .htacess rules we can get rid of index.php from the url and make some friendly urls.
3. Passwords should be encrypted before storing in db


## Major Files

	libs: All task related API calls should include API key in Authorization header field.

	include – All the helpers classes we build placed here

	index.php – Takes care of all the API requests

	.htaccess – Rules for url structure and other apache rules 



## Get API key from SharePreference

preferences = PreferenceManager.getDefaultSharedPreferences(context);
String apiKey = preferences.getString("apiKey", "");

## Request
	
	1. Send the required parameters in a jsonObject (Pass it through the constructor)		
		HttpHelper login = new HttpHelper(postDataParams.toString());
	
	2.	Execute the Class with required URL as
		result = login.execute(loginURL).get();



## Response

### And receive it on other side

	Intent intent = getIntent();
	String jsonString = intent.getStringExtra("jsonObject");

### Now you have your JSON in a String named jsonString assume it as a response like when you received from Web Service and then get your JSONObject like:

	JSONObject jObj = new JSONObject(jsonString);



## Security Questions:

	1. What is the color of your first car?
	2. What is the best security question? 
	3. If you could turn into any car for a day, what would it be?
	4. Which of your siblings was your parents' favorite?
	5. An invisible man is sleeping in your bed, who you are going to call?
	6. Pete and Repeat went into the store. Pete came out. Who was left?
	7. Are you trying to hack into this account?
	8. What gives you that special... satisfaction?
