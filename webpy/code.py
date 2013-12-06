#!/usr/bin/env python
# coding: utf-8

import site 
site.addsitedir("/usr/lib/python2.6/site-packages") 

import web
from stemming.porter2 import stem

render = web.template.render('/var/www/webpy/',globals())

dict4 = dict();
f=file("/var/www/webpy/dict4.txt")
for line in f.readlines():
	for item in line.split():
		dict4.update({item:0})
f.close

urls = (
    '/', 'index'
)

class index:
    def GET(self):
        return render.index()
    def POST(self):
    	paragraph = ''
    	input_paragraph = web.input().para
    	for word in input_paragraph.split():
			if stem(word) in dict4:
				paragraph +="<span class='dict4'>"+word+"</span> "
			else:
				paragraph +=word+" "
    	return render.checkresult(paragraph)


app = web.application(urls, globals(), autoreload=False)
application = app.wsgifunc()