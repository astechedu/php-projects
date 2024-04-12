//User Listing pages/users_listing.php

async function fetchData() {

    try {
        // Fetch data from an API
        const response = await fetch('http://localhost/pages/users_listing.php');

        // Check if the response is successful (status code in the range of 200-299)
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        // Parse the JSON content of the response
        const html = await response.text();
        
        const listuser = document.querySelector('#listuser')
        //const listuser = document.getElementById('listuser');

		listuser.innerHTML  = html
        // Handle the data received from the API
        //console.log(html);
    } catch (error) {
        // Handle any errors that occurred during the fetch operation
        console.error('Fetch error:', error);
    }
}

const userlist = document.querySelector('#userlist')

userlist.addEventListener('click', function(){
   //fetchData();  
      
 // Example usage: load HTML into the element with id "content" 
 loadHTMLIntoElement('http://localhost/pages/users_listing.php', 'listuser')     
})



       // Function to fetch HTML content from a file
        function fetchHTML(url) {
            return fetch(url)
                .then(response => response.text());
        }

        // Load HTML content into a specified element
        function loadHTMLIntoElement(url, elementId) {
            fetchHTML(url)
                .then(html => {
                    document.getElementById(elementId).innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading HTML:', error);
                });
        }

        // Example usage: load HTML into the element with id "content"
        //loadHTMLIntoElement('http://localhost/pages/users_listing.php', 'userlist');


