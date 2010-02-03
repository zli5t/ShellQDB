ShellQDB
================================================================================

A quote database implemented entirely in shell, written by zli5t and lietk12.
This project is hosted at http://github.com/zli5t/ShellQDB.


Introduction
--------------------------------------------------------------------------------

ShellQDB is, as the name says, a quote database (for IRC channels and the like)
coded in shell scripts for flexibility and extensibility (however, the frontend
is also uses html, php, and perl). It's currently underactive development. It
started when the folks at #pctyd on irc.foonetic.net wanted a qdb and lietk12
and lietk12 both despised rash and other such systems. So we coded this! Enjoy!

A similar project using a similar method is at:
http://scalar.cluenet.org/~fastlizard4/quotes.php
(Except, use ours because we're more awesome, of course! :-P)

What are our development principles?

-   MySQL-based QDBs have a dependency external things.  If you need one, but
    you are on a server without MySQL, you can't use the QDB.  If you connect to
    an external one and it encounters downtime, your QDB temporarily fails.
-   Having a bash-based QDB ensures almost complete universality: it works
    natively on unix-based systems, OS X, and Cygwin/msys on Windows.
-   Bash tools are fast, lightweight, and excellent in handling text (sed, grep,
    and awk come to mind).
-   The [Unix Philosophy](http://www.faqs.org/docs/artu/ch01s06.html) enables
    efficiency, simplicity, and flexibility, which are key goals.


Contributing
--------------------------------------------------------------------------------

Feel free to help out in writing ShellQDB!  You can write code, test it out,
request features, report bugs, or help with documentation.  The best way to get
started is to join us on our irc channel: #shellQDB at irc.foonetic.net .


Licensing
--------------------------------------------------------------------------------

So far, we're providing this as a Public Duty and a way to scratch an itch.  You
are not required to do anything to use or modify or distributethis code, but we
do ask that you link back to our github page.  We are not liable for anything
that happens to anything you care about.


Documentation
--------------------------------------------------------------------------------

Extensive documentation can be found in the various scripts.  Miscellaneous
documentation not found elsewhere is provided below.


Misc. Usages
--------------------------------------------------------------------------------

Just some notes on stuff that doesn't yet belong elsewhere:

-   searching for a quote with a specific keyword/regex
    
        grep/sed for your quote here | outq/html
    
-   editing quotes
    
        . lockq
        awk -F:: 'if blah{do blah;print;}' <quotes >quotes.temp
        mv quotes.temp quotes
        . ulockq

This readme will be updated as development progresses. Remember to comment on
what your scary sed/awk strings mean (or at least what your programs do)!  It is
better to over-comment than to under-comment.


Notes on Files
--------------------------------------------------------------------------------

`lockq` (lock quote) and `unlockq` (unlock quote): provide a layer for any
operation dealing with the quote file, to ensure that no data's overwritten.

`outq` (output quote): a directory of formatters for various formats (e.g. html)

`test`: nothing to see here, move along.  It's not a coincidence that the
contents of this file are in quote #5.  *cough* `cat test | escq | addq` *cough*

`quotes`: the default file for holding quotes.
