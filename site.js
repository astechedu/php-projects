//User Listing pages/users_listing.php

const userlist = document.querySelector('#userlist')

if (userlist !== null && userlist !== undefined) {

    // Access properties or methods of userlist here
    userlist.addEventListener('click', function() {
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
}







/*
//User Manages

const userManages = document.querySelector('#userManages')

if (userManages !== null && userManages !== undefined) {

    // Access properties or methods of userlist here
     userManages.addEventListener('click', function() {
        //fetchData();  

        // Example usage: load HTML into the element with id "content" 
         loadHTMLIntoElement('http://localhost/pages/users_manages.php', 'listuser')
      
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
}

*/

//User Manages

const userManages = document.querySelector('#userManages')

if (userManages !== null && userManages !== undefined) {

    // Access properties or methods of userlist here
     userManages.addEventListener('click', function() {
        //fetchData();  

        // Example usage: load HTML into the element with id "content" 
         loadHTMLIntoElement('http://localhost/pages/users_manages.php', 'listuser')
      
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
                 loadJsFile()
            })                      
            .catch(error => {
                console.error('Error loading HTML:', error);
            });
    }

    // Example usage: load HTML into the element with id "content"
    //loadHTMLIntoElement('http://localhost/pages/users_listing.php', 'userlist');
}


function loadJsFile(){
fetch('http://localhost/js/style.js')
  .then(response => response.text())
  .then(scriptText => {
    const scriptElement = document.createElement('script');
    scriptElement.textContent = scriptText;
    document.body.appendChild(scriptElement);
  })
  .catch(error => console.error('Error loading script:', error));    
}


