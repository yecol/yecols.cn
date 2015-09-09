#!/bin/env python
# -*- coding: utf-8 -*-
import os,time,datetime,commands
import exifread
import shutil

#config
ISOTIMEFORMAT="%Y-%m-%d %X"
pwd = os.getcwd();
if os.name == "posix":
	#deploy-env
	root_dir = "/var/www/html/"
else:
	#dev-env
	root_dir = "../"
output_dir = root_dir
filename = "index.html"

curTime = time.localtime()
threshold = 86400*30

cdnBase = "http://yecolcdn.b0.upaiyun.com/"
# cdnBase = "/res/photos/album/"

#common header and footer page path
tpl_file_header = root_dir + "inc/tpl/header.html"
tpl_file_footer = root_dir + "inc/tpl/footer.html"
tpl_file_js = root_dir + "inc/tpl/js.html"

#pages
page_dir = root_dir + "inc/page/"
page = {	'about'   	: 'about.html',
            'photos'    : 'photos.html',
            'portfolio' : 'portfolio.html',
            'blog' 		: 'blog.html',
            'lab' 		: 'lab.html'
}

#global content
tpl_header = ""
tpl_footer = ""
tpl_js = ""

def time2String( s ):

	#time format to string
    return time.strftime( ISOTIMEFORMAT, time.localtime( float(s)) )

def offsetTime( s ):
	#string time format to float
    return time.mktime(curTime) - time.mktime(time.strptime(s, ISOTIMEFORMAT))

def offsetTime2DateString (s):
	#form offset time format to date string
	dtime = datetime.datetime.fromtimestamp(time.mktime(curTime))
	timedelta = datetime.timedelta(seconds=-s)
	dtime = dtime + timedelta
	return dtime.strftime("%Y-%m-%d")

def add_footer(key):

	#custom footer section

	#set current tag
	custom_footer = tpl_footer.replace("$ACTIVE-"+key.upper()+"$",'class="ac"')

	#remove other active tags
	for page_name in page.keys():
		custom_footer = custom_footer.replace("$ACTIVE-"+page_name.upper()+"$","")

	#append specific js file
	append_js_file = page_dir + key + "_js.html"
	if os.path.exists(append_js_file):
		temp_file = open(append_js_file,'r')
		custom_footer = custom_footer.replace("$APPEND_JAVASCRIPT$",temp_file.read()+"\n")
		temp_file.close()
	else:
		# use common js file
		custom_footer = custom_footer.replace("$APPEND_JAVASCRIPT$",tpl_js+"\n")

	# print custom_footer;
	return custom_footer;

def add_header(key):

	#custom header section
	custom_header = "<!DOCTYPE html>\n<!--This page is cached on "+time2String(time.time())+"-->"+"\n"
	#append specific css file
	append_css_file = page_dir + key + "_css.html"
	if os.path.exists(append_css_file):
		temp_file = open(append_css_file,'r')
		custom_header += tpl_header.replace("$APPEND_CSS$",temp_file.read()+"\n")
		temp_file.close()
	else:
		# not add css file
		custom_header += tpl_header.replace("$APPEND_CSS$","")

	# print custom_header;
	return custom_header;
	

def processSinglePage(key):
	
	#generate a single file with key
	#affected pages : about, portfolio
	
	print time2String(time.time())+"\tINFO\t"+"Processing single page ["+ key +"]"
	path = output_dir + key +"/"
	if not os.path.exists(path):
		os.makedirs(path)
	output_handle = open(path+ filename,'w')
	page_file_handle = open(page_dir+page[key])
	output_handle.write(add_header(key)+"\n")
	output_handle.write(page_file_handle.read()+"\n")
	output_handle.write(add_footer(key)+"\n")
	page_file_handle.close()
	output_handle.close()
	print time2String(time.time())+"\tINFO\t"+"Generated index.html file on "+ path

def dt(d):
	return d['dt']

def get_shot_date(fname):
	
	shot_date = ""
	try:
		img = open(fname,'rb')
		tags = exifread.process_file(img)

		if tags != None:
			if 'EXIF DateTimeOriginal' in tags.keys():
				shot_date += " "+ str(tags["EXIF DateTimeOriginal"]).replace(":","-",2);
				shot_date = shot_date.strip()
			else:
				shot_date = "1987-04-14 15:58:10"

		# print offsetTime(shot_date) 

	except IOError:
		print 'IOERROR ' + fname

	return offsetTime(shot_date)


def get_exif_data(fname):
    
    # Get embedded EXIF data from image file.
    
    exif_info = ""
    try:
        img = open(fname,'rb')
        tags = exifread.process_file(img)

        if tags != None:
        	if 'Image Model' in tags.keys():
        		exif_info += str(tags['Image Model'])
        	if 'EXIF ExposureTime' in tags.keys():
        		exif_info += " "+ str(tags["EXIF ExposureTime"])
        	if 'EXIF FNumber' in tags.keys():
        		af = str(tags["EXIF FNumber"])
        		if af.find('/') == -1:
        			exif_info += " f/"+ af
        		else:
        			partition_af = af.partition('/')
        			exif_info += " f/"+ str(float(partition_af[0])/int(partition_af[2]))
        	if 'EXIF ISOSpeedRatings' in tags.keys():
        		exif_info += " ISO" + str(tags["EXIF ISOSpeedRatings"])
        	if 'EXIF DateTimeOriginal' in tags.keys():
        		exif_info += " "+ str(tags["EXIF DateTimeOriginal"]).replace(":","-",2).strip();
        # print exif_info

    except IOError:
        print 'IOERROR ' + fname
    return exif_info

def processPhotoPage():

	#generate photo pages
	#affected pages : photos, albums

	#album page
	album_path = output_dir +"photos/"
	if not os.path.exists(album_path):
		os.makedirs(album_path)

	albums = {					
				"life-hangzhou" 	:	 "Live in Hangzhou. 大学，杭州。",
				"faces" 			:	 "Faces. 人像",				
				"iphone" 			:	 "By iPhone. 手机随手拍",
	}

	new_albums = {
				"travel-hawaii" 	:	 "Travel Log. 夏威夷",
				"travel-london" 	:	 "Travel Log. 伦敦",
				"travel-standrews" 	:	 "Travel Log. 圣安德鲁斯",
				"travel-livepool-york" 	:	 "Travel Log. 利物浦，约克。",
				"christmas-2014" 	:	 "Christmas 2014. 圣诞",
				"travel-pingyao" 	:	 "Travel Log. 平遥",
				"travel-nanjing" 	:	 "Travel Log. 南京",
				"travel-bali" 		:	 "Travel Log. 巴厘岛",
				"travel-wuzhen" 	:	 "Travel Log. 乌镇",
				"travel-shanghai" 	:	 "Travel Log. 上海",
				"travel-yunnan" 	:	 "Travel Log. 毕业旅行，云南。",
				"travel-taiwan" 	:	 "Travel Log. 台湾",
				"travel-japan" 		:	 "Travel Log. 日本",
				"travel-scotland" 	:	 "Travel Log. 苏格兰",
				"travel-fr-nl" 		:	 "Travel Log. 荷兰，法国。",
				"symmetric" 		:	 "Symmetric. 对称",
				"landscape" 		:	 "Landscape. 风光",
				"animal-plant"		:	 "Animal and Plant. 动植物",	
				"life-beijing" 		:	 "Live in Beijing. 北漂生活。",
				"edinburgh-impression" 	:	 "Edinburgh Impression. 爱丁堡",
				"portrait" 	:	 "Portrait. 人像"
	}

	print time2String(time.time())+"\tINFO\t"+"Processing photos"

	album_list = []

	# old version of print
	for album_name, album_readable_name in albums.items():
		# print album_name, album_readable_name

		print time2String(time.time())+"\tINFO\t"+"Processing album ["+album_name+"]"
		path = output_dir +"photos/" + album_name+"/"
		if not os.path.exists(path):
			os.makedirs(path)
		output_handle = open(path+ filename,'w')
		output_handle.write(add_header("photos")+"\n")

		#content_header
		output_handle.write(
			'\
<div class="hover-btn">\n\
  			<a href="/photos/" title="其他相册"><i class="fa fa-book"></i></a>\n\
  			<a href="#" class="toHead"><i class="fa fa-arrow-circle-up"></i></a>\n\
</div>\n\
<div id="main" role="main" class="container photos">\n\
  	<section id="photos">\n\
  	<div class="inner-header">\n\
      		'+album_readable_name+'\n\
  		</div>\n')

		#content_per_photo
		thumbs_dir = root_dir + "res/photos/album/"+album_name
		photo_files = os.listdir(thumbs_dir)
		count = 0
		photo_list = []

		for photo_file in photo_files:
			# get shot time
			photo_list.append({"fn":str(photo_file),"dt":get_shot_date(root_dir + "res/photos/origin/" + str(photo_file))})

		# sort photos with shot time
		photo_list = sorted(photo_list,key=dt)

		# get latest photo as album time
		album_list.append({"an":album_name,"arn":album_readable_name,"dt":dt(photo_list[0]),"bt":dt(photo_list[-1])})


		for photo_file in photo_list:
			count +=1

			output_handle.write('\
		<div class="a-photo">\n\
		    <a class="origin" rel="group" href="/res/photos/origin/'+ photo_file['fn'] +'" exif="'+\
		    # exif
		    get_exif_data(root_dir+"res/photos/origin/" + photo_file['fn']) +'">\n\
		        <img src="/assets/img/pixel.gif" data-original="/res/photos/album/' + album_name +"/"+ photo_file['fn'] + '" class="thumb" />\n')
			# print photo_file['dt']
			if(photo_file['dt']<threshold):
				output_handle.write('<img class="new" src="/assets/img/new.png" />')
			output_handle.write('</a>\n\
		</div>'+'\n'
            )

		#content_footer
		output_handle.write('\
	</section><!-- #photos -->\n\
</div>\n')


		output_handle.write(add_footer("photos")+"\n")
		output_handle.close()

		print time2String(time.time())+"\tINFO\t"+"Generate index.html files on = " + path +" with " + str(count) +" photos"

	# new version of print 2014-08-09
	for album_name, album_readable_name in new_albums.items():
		# print album_name, album_readable_name

		print time2String(time.time())+"\tINFO\t"+"Processing album ["+album_name+"]"
		path = output_dir +"photos/" + album_name+"/"
		if not os.path.exists(path):
			os.makedirs(path)
		output_handle = open(path+ filename,'w')
		output_handle.write(add_header("photos")+"\n")

		#content_header
		output_handle.write(
			'\
<div class="hover-btn">\n\
  			<a href="/photos/" title="其他相册"><i class="fa fa-book"></i></a>\n\
  			<a href="#" class="toHead"><i class="fa fa-arrow-circle-up"></i></a>\n\
</div>\n\
<div id="main" role="main" class="container photos nofix">\n\
  	<section id="photos"  class="nofix-head">\n\
  	<div class="inner-header">\n\
      		'+album_readable_name+'\n\
  		</div>\n')

		#content_per_photo
		only_dir = root_dir + "res/photos/album/"+album_name
		photo_files = os.listdir(only_dir)
		count = 0
		photo_list = []

		for photo_file in photo_files:
			# get shot time
			photo_list.append({"fn":str(photo_file),"dt":get_shot_date(root_dir + "res/photos/album/" + album_name + "/"+ str(photo_file))})

		# sort photos with shot time
		photo_list = sorted(photo_list,key=dt)

		# get latest photo as album time
		album_list.append({"an":album_name,"arn":album_readable_name,"dt":dt(photo_list[0]),"bt":dt(photo_list[-1])})


		for photo_file in photo_list:
			count +=1

			output_handle.write('\
		<div class="a-photo fwidth">\n\
		    <a class="origin" rel="group" href="'+ cdnBase + album_name + '/' + photo_file['fn'] +'!1000" exif="'+\
		    # exif
		    get_exif_data(root_dir+"res/photos/album/" + album_name + '/' + photo_file['fn']) +'">\n\
		        <img src="/assets/img/pixel.gif" data-original="'+ cdnBase + album_name +"/"+ photo_file['fn'] + '!1000" class="large" />\n')
			# print photo_file['dt']
			if(photo_file['dt']<threshold):
				output_handle.write('<img class="new" src="/assets/img/new.png" />')
			output_handle.write('</a>\n\
		</div>'+'\n'
            )

		#content_footer
		output_handle.write('\
	</section><!-- #photos -->\n\
</div>\n')


		output_handle.write(add_footer("photos")+"\n")
		output_handle.close()

		print time2String(time.time())+"\tINFO\t"+"Generate index.html files on = " + path +" with " + str(count) +" photos"




	# process album page
	output_album_handle = open(album_path + filename,'w')
	output_album_handle.write(add_header("photos")+"\n")
	output_album_handle.write(
'<div id="main" role="main" class="container">\n\
    <section id="photos-album">\n')
	
	album_list = sorted(album_list,key=dt)
	for album_item in album_list:
		output_album_handle.write('\n\
		<div class="a-album">\n\
    	    <a href="./'+album_item['an']+'/">\n\
    	        <img src="/res/photos/cover/'+ album_item['an'] +'.jpg" class="thumb">\n\
    	        <span class="info">\n\
    	            <p class="title">'+generateAlbumTypeIcon(album_item['an'].split('-')[0])+album_item['arn']+'</p>\n\
    	            <p class="date">from '+offsetTime2DateString(album_item['bt'])+' to '+offsetTime2DateString(album_item['dt']))
		if(album_item['dt']<threshold):
			output_album_handle.write('<span class="update">UPDATE</span>\n')
		output_album_handle.write('</p></span>\n\
    	    </a>\n\
    	</div>\n\
				')

	output_album_handle.write('\n\
  	</section><!-- #photos-album -->\n\
</div>\n')
	output_album_handle.write(add_footer("photos"))
	output_album_handle.close()

def processJPEGOptim():

	#content_per_photo
	for root, dirs, files in os.walk(root_dir+"res/"):
		for name in files:
			(status, output) = commands.getstatusoutput('/usr/local/bin/jpegoptim ' + root + "/" + name);
			# print status, output;

def generateAlbumTypeIcon(key):
	if key=="travel":
		return '<i class="fa fa-paper-plane"></i>';
	elif key=="life":
		return '<i class="fa fa-coffee"></i>';
	elif key=="faces" or key =="portrait":
		return '<i class="fa fa-users"></i>';
	else: 
		return '<i class="fa fa-camera"></i>';

def processBlog():
	articles_dir = root_dir + "inc/blog/"
	articles = sorted(os.listdir(articles_dir),reverse=True);
	index_content = ""
	for article in articles:
		print time2String(time.time())+"\tINFO\t"+"Processing article ["+article+"]"
		ptitle = ""
		palias = ""
		ptime = ""
		pcontent = ""
		pabstract = ""
		with open(articles_dir+article) as post:
			for line in post:
				if line.startswith("title:"):
					ptitle = line[6:].strip('\n')
				elif line.startswith("alias:"):
					palias = line[6:].strip('\n')
				elif line.startswith("date:"):
					ptime = line[5:].strip('\n')
				elif len(line.strip('\n'))>1 and not line.startswith("#####"):
					# print "len="+str(len(line.strip('\n')))
					if(len(pabstract)==0):
						pabstract = "<p>"+line+"</p>\n";
					pcontent += "<p>"+line+"</p>\n";

		# generate post page

		print "alias = " + palias;
		path = output_dir +"blog/"+ palias +"/"
		if not os.path.exists(path):
			os.makedirs(path)
		output_handle = open(path+ filename,'w')
		output_handle.write(add_header("blog")+"\n")
		page_file_handle = open(page_dir+"blog-post.html")
		html_content = page_file_handle.read();
		html_content = html_content.replace("$BLOG-TITLE$",ptitle);
		html_content = html_content.replace("$BLOG-TIME$",ptime);
		html_content = html_content.replace("$BLOG-CONTENT$",pcontent);
		output_handle.write(html_content+"\n")
		output_handle.write(add_footer("blog")+"\n")

		page_file_handle.close()
		output_handle.close()

		#gather to the index-page

		index_content +='<article id="'+str(article)[:8]+'" class="abstract">\n'\
		'\t<time class="entry-date" datetime="'+ptime+'">'+ptime+'</time>\n'\
		'\t<header class="entry-summary-header">\n'\
			'\t\t<h1 class="entry-title">\n'\
				'\t\t\t<a href="/blog/'+palias+'" rel="bookmark">'+ptitle+'</a>\n'\
			'\t\t</h1>\n'\
		'\t</header><!-- .entry-header -->\n'\
		'\t<div class="entry-summary">\n'\
			+pabstract+"\n"\
		'\t</div><!-- .entry-summary -->\n'\
		'\t<hr>\n'\
		'</article><!-- #post -->\n'

		print time2String(time.time())+"\tINFO\t"+"Generated index.html file on "+ path

	# generate blog index-page
	print time2String(time.time())+"\tINFO\t"+"Processing blog-index"
	path = output_dir +"blog/"
	if not os.path.exists(path):
		os.makedirs(path)
	output_handle = open(path+ filename,'w')
	output_handle.write(add_header("blog")+"\n")
	page_file_handle = open(page_dir+"blog-index.html")
	html_content = page_file_handle.read();
	html_content = html_content.replace("$BLOG-INDEX$",index_content);
	output_handle.write(html_content+"\n")
	output_handle.write(add_footer("blog")+"\n")
	page_file_handle.close()
	output_handle.close()
	print time2String(time.time())+"\tINFO\t"+"Generated index.html file on "+ path


def generateFiles():
	print time2String(time.time())+"\tINFO\t"+"Begin generating files. Working Directory = " + pwd
	
	#get header and footer
	tpl_header_handle = open(tpl_file_header)
	tpl_footer_handle = open(tpl_file_footer)
	tpl_js_handle = open(tpl_file_js)

	global tpl_header;
	tpl_header = tpl_header_handle.read()
	global tpl_footer;
	tpl_footer = tpl_footer_handle.read()
	global tpl_js;
	tpl_js = tpl_js_handle.read()
	
	tpl_header_handle.close()
	tpl_footer_handle.close()
	tpl_js_handle.close()

	shutil.copy2(root_dir+'inc/index.html', root_dir+'index.html')

	#generate files
	processSinglePage("about");
	processSinglePage("portfolio");
	processBlog();
	# processJPEGOptim();
	processPhotoPage();


if __name__ == '__main__':
	generateFiles()
