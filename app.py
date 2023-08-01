from flask import Flask

app = Flask(__name__)

@app.route('/api/search', methods=['GET'])
def search():
    query = request.args.get('query','') #Get query parameter from url
    search_engine = SearchEngine()  # Create an instance of the SearchEngine class
    results = search_engine.search(query.lower())  # Perform the search

    # Prepare the search results as a list of dictionaries
    formatted_results = []
    for product in results:
        formatted_results.append({
            'name': product.name,
            'description': product.description
        })

    return jsonify(formatted_results)

if __name__ == '__main__':
    app.run()