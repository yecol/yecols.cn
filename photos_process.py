#!/bin/env python
# -*- coding: utf-8 -*-
import os
import re
import time
import datetime
import sys
import exifread
import shutil
import coloredlogs
import logging
import hashlib
import base64
import json
from yphoto import YPhoto

# this is a helping script to pre-process photos

logger = logging.getLogger(__name__)
coloredlogs.install(level='DEBUG', logger=logger)

# configurable root dirs
PHOTOS_DIR = "./photostream"
META_DIR = "./meta"

# output files
KEYWORDS_META = "gened_keywords.yaml"
EXIF_META = "gened_exif.yaml"
NAME_META = "gened_name.yaml"

# types regard as photos
allowed_types = ('.jpg', '.jpeg', '.png', '.JPG')

def gen_meta(l, n):
    # l: list of objects
    # n: name of the output file
    logger.info("generating file {} with {} objects.".format(n, len(l)))
    opath = os.path.join(META_DIR, n)
    out_file = open(opath, "w")
    json.dump(l, out_file, indent = 4)
    out_file.close()


if __name__ == '__main__':
    logger.info("Start to process photo files in %s.", PHOTOS_DIR)

    dict_path2name = dict()
    dict_name2path = dict()
    all_photos = list()
    for root, dirs, files in os.walk(PHOTOS_DIR):
        for file in files:
            if file.endswith(allowed_types):
                
                # get the abs filename.
                abs_file = os.path.join(root, file)

                # get the related_path and its short_id.
                rel_file = os.path.relpath(abs_file, PHOTOS_DIR)
                short_id = hashlib.sha256(
                    rel_file.encode("utf-8")).hexdigest()[:6]
                
                p = YPhoto(short_id, rel_file, abs_file)
                all_photos.append(p)

                if not short_id in dict_name2path:
                    dict_name2path[short_id] = rel_file
                    dict_path2name[rel_file] = short_id
                else:
                    logger.warning(
                        "file hashing conflict for file: %s", rel_file)

                logger.info(p)

    logger.info(
        "Done to iterate all photo files, processed %d photos.", len(dict_name2path))

    # generate iPhone
    by_iphone = [p for p in all_photos if re.search("iphone", p.camera, re.IGNORECASE)]
    by_iphone.sort(key=lambda p: p.datetime, reverse=True)
    gen_meta(by_iphone, "iphone.txt")
        
    
    
    
