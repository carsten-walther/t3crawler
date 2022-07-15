Html2PDF for TYPO3
=============================

[![Issues](https://img.shields.io/github/issues/carsten-walther/t3crawler)](https://img.shields.io/github/issues/carsten-walther/t3crawler)
[![Forks](https://img.shields.io/github/forks/carsten-walther/t3crawler)](https://github.com/carsten-walther/t3crawler/network/members)
[![Stars](https://img.shields.io/github/stars/carsten-walther/t3crawler)](https://github.com/carsten-walther/t3crawler/stargazers)
[![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/carsten-walther/t3crawler)](https://github.com/carsten-walther/t3crawler/releases/latest)
[![License](https://img.shields.io/github/license/carsten-walther/t3crawler)](LICENSE.txt)
[![GitHub All Releases](https://img.shields.io/github/downloads/carsten-walther/t3crawler/total)](https://github.com/carsten-walther/t3crawler/releases/latest)

A wrapper for [![crawler](https://github.com/carsten-walther/crawler)](https://github.com/carsten-walther/crawler) to let TYPO3 CLI run recursively through sitemap.xml.

About the extension
-------------------
This extension will give you the possibility to warm up caches based on your sitemap.xml.

How to use it?
--------------

Create a cronjob and call t3crawler:crawl with your desired parameters.

E.g.:

```bash
mkdir -p /htmldocs/fileadmin/t3crawler
env TYPO3_CONTEXT=Production /usr/local/bin/php /htmldocs/typo3/sysext/core/bin/typo3 t3crawler:crawl -u https://www.your-site.de/sitemap.xml -o /htmldocs/fileadmin/t3crawler/your-site.csv
```

Parameters:

-u : the url of your sitemap.xml
-o : output the results to this csv file
-c : only crawl X urls of the sitemap.xml

Configuration
-------------

No need to configure except the cronjob.

What's next?
------------

Sponsoring
----------
Do you like this extension and do you use it on production environments? Please help me to maintain this extension and
become a sponsor.
