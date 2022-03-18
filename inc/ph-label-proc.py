#!/bin/env python
# -*- coding: utf-8 -*-
import os,time,datetime,sys
import exifread
import shutil
import logging

logging.basicConfig(stream=sys.stdout, level=logging.INFO)
logger = logging.getLogger()