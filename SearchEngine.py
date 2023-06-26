class Product:
    def __init__(self, name, description):
        self.name = name
        self.description = description


class SearchEngine:
    def __init__(self):
        self.products = []  # List of products

    def add_product(self, product):
        self.products.append(product)

    def search(self, query):
        results = []
        for product in self.products:
            if self._boyer_moore_search(query, product.name.lower()) or self._boyer_moore_search(query, product.description.lower()):
                results.append(product)
        return results

    def _boyer_moore_search(self, pattern, text):
        m = len(pattern)
        n = len(text)
        if m == 0 or m > n:
            return False

        # Generate bad character skip table
        skip = {}
        for i in range(m - 1):
            skip[ord(pattern[i])] = m - i - 1

        i = m - 1
        while i < n:
            k = 0
            while k < m and pattern[m - 1 - k] == text[i - k]:
                k += 1
            if k == m:
                return True
            else:
                char = ord(text[i])
                if char in skip:
                    i += skip[char]
                else:
                    i += m

        return False


# Example usage
search_engine = SearchEngine()

# Adding products to the search engine
product1 = Product("iPhone X", "The latest iPhone model with advanced features.")
product2 = Product("Samsung Galaxy S20", "A high-performance Android smartphone.")
product3 = Product("MacBook Pro", "Powerful laptop for professionals.")
search_engine.add_product(product1)
search_engine.add_product(product2)
search_engine.add_product(product3)

# Searching for products
query = input("Enter your search query: ")
results = search_engine.search(query.lower())

if results:
    print("Search results:")
    for product in results:
        print(f"- {product.name}: {product.description}")
else:
    print("No results found.")