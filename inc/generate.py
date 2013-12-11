#!/usr/bin/python
# -*- coding: utf-8 -*-
import os,time
import exifread

#config
ISOTIMEFORMAT="%Y-%m-%d %X"
pwd = os.getcwd();
root_dir = "../"
output_dir = root_dir
filename = "index.html"

#header and footer page path
tpl_file_header="./tpl/header.html"
tpl_file_footer="./tpl/footer.html"
tpl_file_js="./tpl/js.html"

#pages
page_dir = "./page/"
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
	custom_header = "<!--This page is cached on "+time2String(time.time())+"-->"+"\n"
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
        		exif_info += " "+ str(tags["EXIF DateTimeOriginal"]).replace(":","-",2);
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
	output_album_handle = open(album_path + filename,'w')
	output_album_handle.write(add_header("photos")+"\n")
	output_album_handle.write(
'<div id="main" role="main" class="container">\n\
    <section id="photos-album">\n')

	albums = {	"travel-nanjing" 	:	 "Travel Log. 南京",
				"travel-bali" 		:	 "Travel Log. 巴厘岛",
				"travel-taiwan" 	:	 "Travel Log. 台湾",
				"travel-japan" 		:	 "Travel Log. 日本",
				"travel-yunnan" 	:	 "Travel Log. 毕业旅行，云南。",
				"life-hangzhou" 	:	 "Live in Hangzhou. 大学，杭州。",
				"life-beijing" 		:	 "Live in Beijing. 北漂生活。",
				"landscape" 		:	 "Landscape. 风光",
				"animal-plant"		:	 "Animal and Plant. 动植物",	
				"faces" 			:	 "Faces. 人像",
				"iphone" 			:	 "By iPhone. 手机随手拍",
	}

	print time2String(time.time())+"\tINFO\t"+"Processing photos"
	for album_name, album_readable_name in albums.items():
		# print album_name, album_readable_name

		output_album_handle.write('\n\
	<div class="a-album">\n\
        <a class="origin" href="./'+album_name+'/">\n\
            <img src="/res/photos/cover/'+ album_name +'.jpg" class="thumb">\n\
            <span class="info">\n\
                <p class="title camera">'+album_readable_name+'</p>\n\
                <p class="date">2012-02-17</p>\n\
            </span>\n\
        </a>\n\
    </div>\n\
			')


		print time2String(time.time())+"\tINFO\t"+"Processing album ["+album_name+"]"
		path = output_dir +"photos/" + album_name+"/"
		if not os.path.exists(path):
			os.makedirs(path)
		output_handle = open(path+ filename,'w')
		output_handle.write(add_header("photos")+"\n")

		#write contents

		#content_header
		output_handle.write(
			'\
<div id="main" role="main" class="container">\n\
 	<div class="container-head">\n\
    	<ol class="breadcrumb">\n\
      		<li><a href="/photos/">Photos 相册</a></li>\n\
      		<li>'+album_readable_name+'</li>\n\
    	</ol>\n\
  	</div>\n\
  	<section id="photos">\n')

		#content_per_photo
		thumbs_dir = "../res/photos/album/"+album_name
		photo_files = os.listdir(thumbs_dir)
		count = 0
		for photo_file in photo_files:
			# print photo_file;

			# get_exif_data("../photos/album/"+album_name + "/" + str(photo_file))

			count +=1
			output_handle.write('\
		<div class="a-photo">\n\
		    <a class="origin" rel="group" href="/res/photos/origin/'+ photo_file +'" exif="'+\
		    # exif
		    get_exif_data("../res/photos/origin/" + str(photo_file)) +'">\n\
		        <img src="/assets/img/pixel.gif" data-original="/res/photos/album/' + album_name +"/"+ photo_file + '" class="thumb" />\n\
		    </a>\n\
		</div>'+'\n'
            )

		#content_footer
		output_handle.write('\
	</section><!-- #photos -->\n\
</div>\n')


		output_handle.write(add_footer("photos")+"\n")
		output_handle.close()

		print time2String(time.time())+"\tINFO\t"+"Generate index.html files on = " + path +" with " + str(count) +" photos"

	output_album_handle.write('\n\
  	</section><!-- #photos-album -->\n\
</div>\n')
	output_album_handle.write(add_footer("photos"))
	output_album_handle.close()



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

	#generate files
	processSinglePage("about");
	processSinglePage("portfolio");
	processPhotoPage();


if __name__ == '__main__':
	generateFiles()
