import pandas as pd
import json

df=pd.read_csv('imdb_top_250.csv')

json_data = df.to_json(orient='records', lines=True)

with open('imdb_top_250.json', 'w') as json_file:
    json_file.write(json_data)