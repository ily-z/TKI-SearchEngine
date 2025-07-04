import re
import sys
import json
import pickle

if len(sys.argv) != 4:
    print("\n\nPenggunaan\n\tquery.py [index] [n] [query]..\n")
    sys.exit(1)

query = sys.argv[3].split(" ")
n = int(sys.argv[2])

with open(sys.argv[1], 'rb') as indexdb:
    indexFile = pickle.load(indexdb)

list_doc = {}
for q in query:
    try:
        for doc in indexFile[q]:
            if doc['url'] in list_doc:
                list_doc[doc['url']]['score'] += doc['score']
            else:
                list_doc[doc['url']] = doc
    except:
        continue

# convert to list
list_data=[]
for data in list_doc :
	list_data.append(list_doc[data])

# sorting list descending
count = 1
for data in sorted(list_data, key=lambda k: k['score'], reverse=True):
    print(json.dumps(data, ensure_ascii=False))
    if count == n:
        break
    count += 1
