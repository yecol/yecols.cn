#!/bin/env python
# -*- coding: utf-8 -*-

from json import JSONEncoder
import coloredlogs
import logging
import exifread

logger = logging.getLogger(__name__)
coloredlogs.install(level='DEBUG', logger=logger)


class YPhoto(dict):
    def __init__(self, short_id, rel_path, abs_path):
        self._short_id = short_id
        self._rel_path = rel_path
        self._abs_path = abs_path
        self._get_exif()

    def _get_exif(self):
        try:
            img = open(self._abs_path, 'rb')
            tags = exifread.process_file(img)
            # logger.info(tags.keys())
            self._camera = tags.get("Image Model","")
            self._lens = tags.get("EXIF LensModel", "")
            self._t = tags['EXIF DateTimeOriginal']

            self._s = tags.get("EXIF ShutterSpeedValue", "")
            self._a = tags.get("EXIF ApertureValue", "")
            self._f = tags.get("EXIF FNumber", "")
            self._iso = tags.get("EXIF ISOSpeedRatings", "")

        except Exception:
            logger.error("exif parsing error: " + self._abs_path)
            pass
        return True

    @property
    def camera(self):
        return str(self._camera)

    @property
    def aperture(self):
        return self._a

    @property
    def shutter(self):
        return self._s

    @property
    def f(self):
        return self._f

    @property
    def datetime(self):
        return str(self._t)

    @property
    def lens(self):
        return self._lens

    def __repr__(self) -> str:
        return "[{}]-{}, exif[camera={}, lens={}, s={}, a={}, f={}, t={}, iso={}]"\
            .format(self._short_id, self._rel_path, self._camera, self._lens, \
                self._s, self._a, self._f, self._t, self._iso)
