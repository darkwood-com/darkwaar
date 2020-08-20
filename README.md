DARKWAAR
========

Will you be the darkest one at waar ?

More information at [https://darkwaar.com](https://darkwaar.com)

## Deploy

Back in the root of the project (get back with `cd ..`), deploy the API and everything needed to host the static website:

```
serverless deploy
```

Since we are deploying a CloudFront distribution, the first deployment will take 5 to 10 minutes.

After it has finished, we now need to do 2 things:

1. let our frontend site know the URL of the API we deployed
2. deploy the frontend site to S3

Let's first configure the URL of the API in the frontend site. The API Gateway URL that was created by `serverless deploy` should look like this:

```
https://xxxxxx.execute-api.us-east-1.amazonaws.com/api/quote
```

Let's copy it and paste it in the `front/.env` file. You can learn more about [the .env file and how VueJS uses it in the documentation](https://cli.vuejs.org/guide/mode-and-env.html). The `front/.env` file should look like this:

```dotenv
VUE_APP_API_URL=https://xxxxxx.execute-api.us-east-1.amazonaws.com/api/quote
```

Now, we can build the static website for production and upload it to the S3 bucket that was created by `serverless deploy`. Run the following command to retrieve the name of the S3 bucket:

```
serverless info -v | grep StaticWebsiteBucket
```

It should look like `demo-dev-assets-2c3skklgjwhnr`.

Let's now generate the production version of the website and upload it.
There is a `deploy.sh` script to do that for us, we need to pass it the S3 bucket name:

```
cd front
sh deploy.sh <bucket-name>
```

We can now open our website via the CloudFont URL. That URL can be found using:

```
cd ..
serverless info -v | grep CloudFrontDomain
```

The domain should look like `d1tlq8vrk9hpg9.cloudfront.net`. We can open that domain name in a browser and view our application.

## Setting up a custom domain

To set up a custom domain, uncomment the relevant lines in `serverless.yml`.

You will also need to create a certificate for your domain (via ACM), refer to the course for more details.

## Deleting the application

The `serverless remove` takes care of removing everything. However, it will fail deleting S3 buckets that contain files. This is a safety measure to avoid loosing data.

In order to delete the application, you will need to manually delete files in the "StaticWebsite" S3 bucket, and then run `serverless remove`. Here is a command that can remove all files in a bucket:

```
aws s3 rm s3://<bucket-name> --recursive
```

License
-------

<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Text" property="dct:title" rel="dct:type">Darkwaar</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="https://darkwaar.com" property="cc:attributionName" rel="cc:attributionURL">Mathieu Ledru</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.<br />Based on a work at <a xmlns:dct="http://purl.org/dc/terms/" href="https://github.com/darkwood-fr/darkwaar" rel="dct:source">https://github.com/darkwood-fr/darkwaar</a>.
