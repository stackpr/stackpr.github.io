---
title: SSL Support for Varnish Using Nginx
layout: post
category: blog
tags:
- Varnish
- SSL
- Nginx

---
{% include JB/setup %}

Varnish does not natively support SSL. However, it is a simple matter to put a lightweight SSL reverse proxy in front of Varnish to reap the benefits of both SSL and a robust caching proxy. You can use a dedicated proxy like [pound](http://www.apsis.ch/pound) to handle your SSL. You can use apache to avoid adding another application to your technology stack. After some consideration, I selected to use nginx, which I already used to serve static files.

The nginx SSL reverse proxy configuration is pretty trivial:

<pre>
server {
  listen 443;
  server_name example.com;

  ssl on;
  ssl_certificate /path/to/ssl.crt;
  ssl_certificate_key /path/to/ssl.key;
  
  # For heavy loads, experiment for the best timeout based on performance
  ssl_session_timeout 5m;

  location / {
    # Optional: Varnish does not inherently require this
    proxy_set_header "Host:" $host; 
    
    # Optional: Your application does not inherently respect this header
    proxy_set_header X-Forwarded-For $remote_addr;
    
    # Match this to the specific IP, hostname and/or port for varnish
    # From the local machine, you should be able to curl this URL and hit varnish
    proxy_pass http://127.0.0.1:80;
  }
}
</pre>
