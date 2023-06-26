# FinalYearProject
Improving search time with Boyer's Moore Algorithm.

# Priorities
1. Integrate search engine
2. Backend
3. Frontend and designing
4. Documentation
    - Corrections on Chapter 1,2,3
    - Follow up on Chapter 4


## How to integrate the search engine
1. Set up the backend:
    - Create a Python search engine.  
    - Make sure you have the necessary dependencies installed, such as the Python interpreter and any required libraries.  
    - Connect the backend code to your e-commerce database or data source where you store your products.  
  
    
2. Create an API endpoint:  
    - Use a web framework like Flask or Django to create an API endpoint that handles search requests.  
    - Define a route for the search endpoint, such as /api/search, and specify the HTTP method (e.g., GET or POST).  
    - In the search route's implementation, create an instance of the SearchEngine class and perform the search based on the query received from the request.  
    - Return the search results in a JSON format.  
  
  
3. Integrate the frontend:  
    - In your website's frontend, create a search form where users can enter their queries.  
    - Use JavaScript to handle the form submission and send an AJAX request to the search API endpoint.  
    - Parse the JSON response received from the API and display the search results on your website.  
  
  
4. Style and customize:  
    - Apply appropriate styling to the search form, search results, and any other relevant components to match your website's design.  
    - Customize the search engine's behavior and appearance based on your specific requirements. For example, you can add filters, sorting options, or pagination to enhance the search experience.  
  
  
5. Test and deploy:  
    - Test your integration thoroughly to ensure that the search engine functions correctly and returns accurate results.  
    - Deploy your backend code to a web server or a cloud platform, making sure it is accessible via its API endpoint.  
    - Update your website's production environment to include the search functionality and verify that it works as expected.  