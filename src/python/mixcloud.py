# -*- coding: utf-8 -*-
"""
Created on Sat Sep 21 00:26:42 2013

@author: Nikolay
"""

import requests
import json
import re
import string

def clean(s):
    return re.sub('[^0-9a-zA-Z_]', '', s.lower())

class MixCloud(object):
    
    def wwwToApi(self, str):
        return str.replace('http://www.', 'http://api.')
        
    def toUtf8(self, text):
        return text.encode('UTF-8', errors='replace')
  
    def search(self, artist, track, offset):
        limit = 50
        tracklists = []
        q = string.join([artist, track]).replace(' ', '+')
        r = requests.get('http://api.mixcloud.com/search/?q=' + q +
                '&type=cloudcast&limit=' + str(limit) + '&offset=' + str(offset))
        #print self.toUtf8(r.text)
        j = json.loads(self.toUtf8(r.text))
        for d in j['data']:
            tracklists.append(d['url'])
        if ('paging' in j):
            if ('next' in j['paging']):
                tracklists.extend(self.search(artist, track, offset + limit))
        print (str(len(tracklists)) + ' tracklists were found')
        return tracklists

    def getTrackFromTracklist(self, url, artist, track):
        r = requests.get(self.wwwToApi(url))
        cloudcast = json.loads(self.toUtf8(r.text))
        if ('sections' in cloudcast):
            for section in cloudcast['sections']:
                if ('track' in section):
                    tracklistArtistName = section['track']['artist']['name']
                    if (clean(tracklistArtistName) == clean(artist)):
                        trackName = section['track']['artist']['name'] + " - " + section['track']['name']
                        return trackName
        return None

    def getNeighboursFromTracklist(self, url, artist, track):
        r = requests.get(self.wwwToApi(url))
        cloudcast = json.loads(self.toUtf8(r.text))
        result = []
        if ('sections' in cloudcast):
            sections = cloudcast['sections']
            for (i, section) in enumerate(sections):
                if ('track' in section):
                    tracklistArtistName = section['track']['artist']['name']
                    tracklistTrackName = section['track']['name']
                    if (clean(tracklistArtistName) == clean(artist) and clean(tracklistTrackName) == clean(track)):
                        if (i > 0):
                            prev = sections[i - 1]
                            name = prev['track']['artist']['name'] + " - " + prev['track']['name']
                            result.append(name)
                        if (i < len(sections) - 1):
                            nxt = sections[i + 1]
                            name = nxt['track']['artist']['name'] + " - " + nxt['track']['name']
                            result.append(name)
                        break
        return result

    def getCandidates(self, artist, track):
        tracklists = self.search(artist, track, 0)
        tracks = []
        total = 0
        for d in tracklists:
            t = self.getNeighboursFromTracklist(d, artist, track)
            tracks.extend(t)
            total = total + 1
            if (total % 10 == 0):
                print str(total) + ' playlists processed'
        return tracks

    def doTest(self):
        #r = requests.get('https://api.github.com/user', auth=('user', 'pass'))
        #r = requests.get('http://api.mixcloud.com/artist/aphex-twin/')
        artist = 'Lady Gaga'
        track = 'Bad Romance'
        tracks = self.getCandidates(artist, track)
        print tracks
