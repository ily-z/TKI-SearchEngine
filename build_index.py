import json
import pickle
import math
from collections import defaultdict

json_file = "imdb_top_250.json"

# Baca file JSON line by line
docs = []
with open(json_file, "r", encoding="utf-8") as f:
    for line in f:
        docs.append(json.loads(line))

total_docs = len(docs)
df = defaultdict(int)
tf_idf = defaultdict(list)

# Document Frequency
for doc in docs:
    tokens = set((doc['Title'] + " " + str(doc['Year'])).lower().split())
    for token in tokens:
        df[token] += 1

# Term Frequency + TF-IDF
for doc in docs:
    doc_id = str(doc["Rank"])  # we’ll use Rank as 'url'
    content = (doc["Title"] + " " + str(doc["Year"])).lower()
    words = content.split()
    word_count = {}
    for word in words:
        word_count[word] = word_count.get(word, 0) + 1
    doc_len = len(words)

    for word, count in word_count.items():
        tfidf_score = (count / doc_len) * math.log(total_docs / (1 + df[word]))
        tf_idf[word].append({
            "url": doc_id,
            "score": tfidf_score,
            "title": doc["Title"],
            "year": doc["Year"],
            "rating": doc["Rating"],
            "runtime": doc["Runtime"]
        })

with open("imdb_index.php", "wb") as f:
    pickle.dump(tf_idf, f)


