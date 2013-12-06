#!/usr/bin/python
# -*- coding: utf-8 -*-
import os,time

#config
ISOTIMEFORMAT="%Y-%m-%d %X"
pwd = os.getcwd();
root_dir = "../"
output_dir = "./outfile/";
filename = "index.html"

#header and footer page path
tpl_file_header="./tpl/header.html"
tpl_file_footer="./tpl/footer.html"

#pages
page_dir = "./page/"
page = {	'about'   	: 'about.html',
            'photo'     : 'photo.html',
            'portfolio' : 'portfolio.html'
}

#global content
tpl_header = ""
tpl_footer = ""

def time2String( s ):
    return time.strftime( ISOTIMEFORMAT, time.localtime( float(s)) )

def processSinglePage(key):
	
	#generate a single file with key
	#affected pages : about, portfolio
	
	print time2String(time.time())+"\tINFO\t"+"Processing single page ["+ key +"]"
	path = output_dir + key +"/"
	if not os.path.exists(path):
		os.makedirs(path)
	output_handle = open(path+ filename,'w')
	page_file_handle = open(page_dir+page[key])
	output_handle.write(tpl_header+"\n")
	output_handle.write(page_file_handle.read()+"\n")
	output_handle.write(tpl_footer+"\n")
	page_file_handle.close()
	output_handle.close()
	print time2String(time.time())+"\tINFO\t"+"Generated index.html file on "+ path


def get_exif_data(fname):
    # Get embedded EXIF data from image file.
    ret = {}
    try:
        img = Image.open(fname)
        if hasattr( img, '_getexif' ):
            exifinfo = img._getexif()
            if exifinfo != None:
                for tag, value in exifinfo.items():
                    decoded = TAGS.get(tag, tag)
                    ret[decoded] = value
    except IOError:
        print 'IOERROR ' + fname
    return ret

def processPhotoPage():

	#generate photo pages
	#affected pages : photos, albums

	#album page
	output_album_handle = open(output_dir +"photos/"+ filename,'w')
	output_album_handle.write(tpl_header+"\n")
	output_album_handle.write(
'<div id="main" role="main" class="container">\n\
    <section id="photos-album">\n\ ')

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
        <a class="origin" href="./'+album_name+'>\n\
            <img src="cover/'+ album_name +'.jpg" class="thumb">\n\
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
		output_handle.write(tpl_header+"\n")

		#write contents

		#content_header
		output_handle.write(
			'\
<div id="main" role="main" class="container">\n\
 	<div class="container-head">\n\
    	<ol class="breadcrumb">\n\
      		<li><a href="/photos/">Photos 相册</a></li>\n\
      		<li>'+album_name+'</li>\n\
    	</ol>\n\
  	</div>\n\
  	<section id="photos">\n')

		#content_per_photo
		thumbs_dir = "../photos/album/"+album_name
		photo_files = os.listdir(thumbs_dir)
		count = 0
		for photo_file in photo_files:
			# print photo_file;
			count +=1
			output_handle.write('\
		<div class="a-photo">\n\
		    <a class="origin" rel="group" href="/photos/origin/'+ photo_file +'" exif="exif">\n\
		        <img src="/assets/img/pixel.gif" data-original="/photos/album/' + album_name +"/"+ photo_file + '" class="thumb" />\n\
		    </a>\n\
		</div>'+'\n'
            )

		#content_footer
		output_handle.write('\
	</section><!-- #photos -->\n\
</div>\n')


		output_handle.write(tpl_footer+"\n")
		output_handle.close()

		print time2String(time.time())+"\tINFO\t"+"Generate index.html files on = " + path +" with " + str(count) +" photos"

	output_album_handle.write('\n\
  	</section><!-- #photos-album -->\n\
</div>\n')
	output_album_handle.write(tpl_footer)
	output_album_handle.close()

def generateFiles():
	print time2String(time.time())+"\tINFO\t"+"Begin generating files. Working Directory = " + pwd
	
	#get header and footer
	tpl_header_handle = open(tpl_file_header)
	tpl_footer_handle = open(tpl_file_footer)

	global tpl_header;
	tpl_header = tpl_header_handle.read()
	global tpl_footer;
	tpl_footer = tpl_footer_handle.read()
	
	tpl_header_handle.close()
	tpl_footer_handle.close()

	#generate files
	processSinglePage("about");
	processSinglePage("portfolio");
	processPhotoPage();


if __name__ == '__main__':
	generateFiles()