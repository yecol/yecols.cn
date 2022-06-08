#!/bin/env python
# -*- coding: utf-8 -*-
import os,time,datetime,sys
import shutil
import logging
from pathlib import Path
from google.cloud import vision
import io

logging.basicConfig(stream=sys.stdout, level=logging.INFO)
logger = logging.getLogger()

origin_file = "../../gphotos-sync/photostream/yweb_origins.txt"
labeled_file = "yweb_labeled.txt"


for line in open(origin_file, 'r').readlines():
        # in format, fname, furl, duplication
        el = line.strip().split()
        fname = el[0]
        furl = el[1]

        client = vision.ImageAnnotatorClient()

        path = "../photostream/100.jpg"
        with io.open(path, 'rb') as image_file:
            content = image_file.read()

        image = vision.Image(content=content)


        # image = vision.Image()
        # print("url = %s" % furl)
        # image.source.image_uri = furl
        response = client.label_detection(image=image)

        labels = response.label_annotations
        print('Labels:')

        for label in labels:
                print(label.description)

        if response.error.message:
                raise Exception(
                        '{}\nFor more info on error messages, check: '
                        'https://cloud.google.com/apis/design/errors'.format(
                        response.error.message))

        logger.info("Current labeling file =  %s" % fname)

        break