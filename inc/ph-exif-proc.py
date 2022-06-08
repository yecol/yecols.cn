#!/bin/env python
# -*- coding: utf-8 -*-
import os,time,datetime,sys
import exifread
import shutil
import logging

logging.basicConfig(stream=sys.stdout, level=logging.INFO)
logger = logging.getLogger()


def get_exif_data(fname):
	# Get EXIF data from image file.
	
	exif_info = ""
	
	try:
		img = open(fname,'rb')
		tags = exifread.process_file(img)

		logger.info(tags)

		if tags != None:
			for k in tags.keys():
				logger.info(k, repr(tags[k]))

			if 'Image Model' in tags.keys():
				exif_info += str(tags['Image Model'])
			# if 'EXIF ExposureTime' in tags.keys():
			# 	exif_info += " "+ str(tags["EXIF ExposureTime"])
			# if 'EXIF FNumber' in tags.keys():
			# 	af = str(tags["EXIF FNumber"])
			# 	if af.find('/') == -1:
			# 		exif_info += " f/"+ af
			# 	else:
			# 		partition_af = af.partition('/')
			# 		exif_info += " f/"+ str(float(partition_af[0])/int(partition_af[2]))
			# if 'EXIF ISOSpeedRatings' in tags.keys():
			# 	exif_info += " ISO" + str(tags["EXIF ISOSpeedRatings"])
			# if 'EXIF DateTimeOriginal' in tags.keys():
			# 	exif_info += " "+ str(tags["EXIF DateTimeOriginal"]).replace(":","-",2).strip();
		# print exif_info
	except IOError:
		logger.error("IOError: " + fname)
	return exif_info

ex = get_exif_data("../photostream/100.jpg")