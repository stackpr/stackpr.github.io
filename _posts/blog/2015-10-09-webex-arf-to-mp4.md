---
title: WebEx ARF to MP4
layout: post
category: blog
tags:
- WebEx
- avconv
- mp4
- arf
- Movie Maker

---
{% include JB/setup %}

There are numerous common challenges with converting the WebEx ARF files to MP4.
Although [instructions are available](https://support.webex.com/support/documentation/help/21879.htm)
for a supposedly straightforward conversion to MP4, problems accessing the converter are commonplace 
([see thread](https://communities.cisco.com/thread/23335?tstart=0)) and the resulting video quality 
is lossy/underwhelming (see comments [here](https://feedback.techsmith.com/techsmith/topics/support_for_arf_files)).

Converting the arf to WMV was insufficient as the quality was far too low. The SWF/Flash export seemed to
create high quality versions of the recording, but it was a collection of files rather than the convenient
single video file that could be uploaded to video hosting sites.

## Solution: Prep

1. You need to install the WebEx Network Recording Player from the Downloads page when logged into your meetings.webex.com (or similar).
2. You need to have `avconv` available. On Ubuntu, run `sudo apt-get install libav-tools`. It can be run on other operating systems, but the instructions on this page were tested against avconv version `9.18-6:9.18-0ubuntu0.14.04.1`

## Solution

The following process appears to generate a high quality version of your recording with reasonable effort:

1. Open the ARF in the WebEx Network Recording Player
1. Stop the video, if it autoplayed
1. Convert to SWF
1. Copy the new recording folder to where avconv is available (no action required if you run avconv locally)
1. Convert the recording to mp4 using the commands below

<pre class="brush:bash">
avconv -i screen.flv -map 0 -c:v libx264 screen.mp4
avconv -i voip.flv -map 0 -c:a aac -strict experimental -ar 44100 -ab 59k voip.aac
avconv -i screen.mp4 -i voip.aac -strict experimental merged.mp4
</pre>

## Additional notes for quality.

__Video/Audio out of sync?__
The audio does not appear to sync perfectly with the video unless you offset it.
In tests, a 2-second adjustment is essentially what is required, but you may need to adjust differently (please note in comments below).
This can be accomplished by adding "-ss 2" (or similar - decimals are allowed) to the first command.

__Wrong aspect ratio?__
WebEx delivers its recording in 16:9 format.
If your presentation uses 4:3 format, then this is a good time to crop the video.
In tests, the flv video is 1720x880, and so we can crop to 4:3 by adding `-vf crop=1172:880:274:0` to the first command.

When both of these adjustments are included, the revised commands are:

<pre class="brush:bash">
avconv -ss 2 -i screen.flv -map 0 -c:v libx264 -vf crop=1172:880:274:0 screen.mp4
avconv -i voip.flv -map 0 -c:a aac -strict experimental -ar 44100 -ab 59k voip.aac
avconv -i screen.mp4 -i voip.aac -strict experimental merged.mp4
</pre>

## Next Steps

You can edit the resulting video in your program of choice.

Windows users have a free option available via [Movie Maker](http://windows.microsoft.com/en-us/windows/movie-maker).
It allows you to split the video and remove segments. It then outputs to WMV files with excellent quality.

Now that you are familiar with avconv, you can convert the wmv (or many other video formats) quickly to mp4:

<pre class="brush:bash">
avconv -i InputFileName.wmv -c:v libx264 -c:a aac -strict experimental -ar 44100 -ab 59k OutputFileName.mp4
</pre>
