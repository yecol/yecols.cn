#!/bin/env python
# -*- coding: utf-8 -*-
import os,time,datetime,commands
import exifread
import shutil
from jinja2 import Environment, PackageLoader, select_autoescape
env = Environment(
    loader=PackageLoader("yourapp"),
    autoescape=select_autoescape()
)

import logging

logging.basicConfig(stream=sys.stdout, level=logging.INFO)
logger = logging.getLogger("yweb")

#config
ISOTIMEFORMAT="%Y-%m-%d %X"
pwd = os.getcwd();
#if os.name == "posix":
	#deploy-env
#	root_dir = "/var/www/html/"
#else:
	#dev-env
root_dir = "../"
output_dir = root_dir
filename = "index.html"

curTime = time.localtime()
threshold = 86400*30

cdnBase = "https://yecol-photos.oss-cn-zhangjiakou.aliyuncs.com/album/"
# cdnBase = "http://yecolcdn.b0.upaiyun.com/"
# cdnBase = "/res/photos/album/"





def gen_index():
	logger.info("Start to generate index page.")


	pass


def gen_albums():
	pass


def gen_singles():
	pass


if __name__ == '__main__':
	gen_index()
	gen_albums()
	gen_singles()
