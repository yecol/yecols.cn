#!/bin/env python
# -*- coding: utf-8 -*-
import os, time, datetime, sys
import exifread
import shutil
import coloredlogs, logging
from jinja2 import Environment, PackageLoader, select_autoescape

logger = logging.getLogger(__name__)
coloredlogs.install(level='DEBUG', logger=logger)

env = Environment(
    loader=PackageLoader("yweb"),
    autoescape=select_autoescape()
)

def gen_index():
	logger.info("Start to generate index page.")
	template = env.get_template("album.html")
	# print(template.render(the="variables", go="here"))
	logger.info("Done to generate index page.")
	pass


def gen_albums():
	pass


def gen_singles():
	pass


if __name__ == '__main__':
	gen_index()
	gen_albums()
	gen_singles()
