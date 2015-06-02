---
title: Error "Unable to parse the p12 file" using google-api-php-client
layout: post
category: blog
tags:
- Google Analytics

---
{% include JB/setup %}

Configuring a [Service Account](https://developers.google.com/api-client-library/php/auth/service-accounts) to access GA was causing problems.
Google_Auth_AssertionCredentials was being instatiated exactly as advised at that page.
The private key had been saved from the developers console after being extracted from the JSON.

But then I was getting the strange error: `Unable to load private key`.
The key was provided to the API as a string, not a path to a file, so it seemed like an odd problem.

After digging around, I found that it was trying to parse a p12 file, which comes with certain constraints.
One constraint is character encoding.

Google provided the key in json with the `=` encoded as `\u003d`.
Manually change that back to a standard `=`, and everything comes to life.
