---
title: 'Google Visualizations: "b.G is not a function"'
layout: post
category: blog
tags:
- JS
- Google Visualization API

---
{% include JB/setup %}

Twice in the last week, there have been periods when my Google Visualizations began showing a red error message ("b.G is not a function") rather than the appropriate chart. My main tests were in an up-to-date version of Firefox. Initial tests suggested that there might be a race condition wherein the Google code triggered its OnLoadCallback before all classes were actually loaded. During initial testing, I was using the autoload technique in combination with the setOnLoadCallback method. I converted to the <a href="https://developers.google.com/loader/#Dynamic">dynamic loading</a> technique and continued to see the error.

Unfortunately, the error was transient an inconsistent such that I could not confirm the problem during initial testing after refactoring.

## Log
- 2013-12-10: No tests definitively resolved it. Then it resumed working.</li>
- 2013-12-12: Hard refresh resolved it after about 30 minutes.</li>

## Autoloading Callbacks for Visualization

Although I have moved away from autoloading in these scripts to mitigate this problem, I want make a note regarding the two distinct callbacks. The first is for when the loader is available, and the second is per-module (for those modules that support it). When autoloading visualizations with <a href="{{ "https://www.google.com/jsapi?callback=_race_loader_&amp;autoload={%22modules%22%3A[{%22name%22%3A%22visualization%22%2C%22version%22%3A%221%22%2C%22callback%22%3A%22_race_visualization_%22}]}" }}">this URI</a> (with callbacks <strong>`_race_loader_`</strong> and <strong>`_race_visualization_`</strong> for easy identification), you can see where they land in the script. The first callback seems preferrable only when you have additional libraries that you want to load dynamically.
```js
}
_race_loader_();
google.load("visualization","1",{"autoloaded":true,"callback":"_race_visualization_"});
if (window['google'] != undefined &amp;&amp; window['google']['loader'] != undefined) {
  if (!window['google']['visualization']) {
    window['google']['visualization'] = {};
    google.visualization.Version = '1.0';
    google.visualization.JSHash = 'd780f2951a73e815f003b2b487c1d0a3';
    google.visualization.LoadArgs = 'file\75visualization\46v\0751\46async\0752';
  }
  google.loader.writeLoadTag("script", google.loader.ServiceBase + "/api/visualization/1.0/d780f2951a73e815f003b2b487c1d0a3/format+en,default.I.js", true);
}
```
