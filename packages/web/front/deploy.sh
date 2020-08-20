#!/bin/sh

if [ -z "$1" ]; then
    echo "Please provide the name of the S3 bucket as an argument, for example:"
    echo "sh deploy.sh demo-dev-assets-2c3skklgjwhnr"
    exit 1
fi

# Stop if we have an error or an undefined variable
set -ue

BUCKET_NAME=$1

# Generate the production files
npm run build

# Upload the `dist` directory to the S3 bucket
aws s3 sync dist "s3://$BUCKET_NAME/"
# Note: we do not use the `--delete` option here to preserve older versions of the CSS and JS.

# Next, we explicitly overwrite the "Max-Age" cache header on `index.html` to force it to 0.
# Why? We never want CloudFront to cache that file, because that is how visitors will get new versions
# of our static website.
# All the other files can be cached because their file names contain unique hashes, for example `app.8f7d1e90.css`.
# (you may notice below that we copy the file to itself, yes that's stupid but it lets us set the metadata ^^)
aws s3 cp "s3://$BUCKET_NAME/index.html" "s3://$BUCKET_NAME/index.html" --metadata-directive REPLACE --content-type "text/html" --cache-control max-age=0
