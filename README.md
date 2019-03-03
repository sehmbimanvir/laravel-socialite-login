# Laravel Socialite Login
Example of Login with Social Networking Sites like Facebook, Google, Twitter, Linkedin and Github using Socialite Package.

## How to Use

1. Clone this Repo.
```sh
git clone https://github.com/sehmbimanvir/laravel-socialite-login.git
```

2. Run 
```sh
composer install
```

3. Set **APP_URL** to root url of project in **.env** file

4. Generate Client Id, Client Secret for following websites:-

* [**Facebook**](https://www.codexworld.com/create-facebook-app-id-app-secret/)
* [**Google**](https://www.codexworld.com/login-with-google-api-using-php/)
* [**Linkedin**](https://www.codexworld.com/login-with-linkedin-using-php/)
* [**Twitter**](https://www.codexworld.com/login-with-twitter-using-php/)
* [**Github**](https://www.codexworld.com/login-with-github-oauth-api-using-php/)

5. Once you Generated the required credentials Just Put them in **.env** file.

e.g For **Facebook** You can Add

FACEBOOK_CLIENT_ID=XXXXXXXXX

FACEBOOK_CLIENT_SECRET=XXXXXX

FACEBOOK_CALLBACK_URL=login/facebook/callback
