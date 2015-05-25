---
title: Analyzing file character data
layout: post
category: blog
tags:
- Linux

---
{% include JB/setup %}

There is a broad array of [file viewing tools for Linux](http://en.wikibooks.org/wiki/Guide_to_Unix/Commands/File_Viewing).

These tools are invaluable when investigating issues related to non-printing characters or detecting an [IDN homograph attack](http://en.wikipedia.org/wiki/IDN_homograph_attack) (non-ASCII chars that look like ASCII chars).

Consider this example of hidden chars:

<pre class="brush:bash">
# echo -en "\nHelloWorld\n"

HelloWorld
# echo -en "\r\nHello\0World\r\n"

HelloWorld
# echo -en "\r\nHello\0World\r\n"  | od -c
0000000  \r  \n   H   e   l   l   o  \0   W   o   r   l   d  \r  \n
0000017
</pre>

On the terminal, there is no visual distinction between the output of the first 2 commands, although the difference is clear when you can see the input. The 2nd echo contains `\r` characters and a null (`\0`) character. There are many ways to iterate through characters for debugging purposes, but the `od -c` command is always a solid starting point.

For a visual scan of a file without the structured approach that od provides, you can also use `cat -v` to convert non-printing characters to caret-ers. `\r` becomes `^M`, `\0` becomes `^@` and so on.
<pre class="brush:bash">
# echo -en "\r\nHello\0World\r\n" | cat -v
^M
Hello^@World^M
</pre>
