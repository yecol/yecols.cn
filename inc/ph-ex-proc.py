#!/bin/env python
# -*- coding: utf-8 -*-
from cmath import e
import os,time,datetime,sys
import exifread
import shutil
import logging
from pathlib import Path

from gphotos.LocalFilesMedia import LocalFilesMedia

logging.basicConfig(stream=sys.stdout, level=logging.INFO)
logger = logging.getLogger()

try:
	opath = Path("./test/photos/2022-03/_dsc0620.jpg")
	lf = LocalFilesMedia(opath)
	lf.get_exif()
	logger.info("indexed local file: %s %s %s %s %s %s",
	lf.relative_folder, 
	lf.filename,
	lf.camera_model,
	lf.uid,
	lf.description,
	lf.url)
	logger.info(lf)
except Exception:
	logger.error("file %s could not be made into a media obj", opath, exc_info=True)