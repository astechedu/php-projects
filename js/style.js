
//When Button trigged, Data response from server, Use this use case
const table = document.querySelector('table')

  if(table !== 'null' && table !== 'undefinded'){
    document.querySelector('table').addEventListener('click', function(event) {
        // Check if the clicked element is a button
        if (event.target && event.target.matches('.delete')) {
          // Perform button click action
          console.log('Button clicked!');
        }
    });

    document.querySelector('table').addEventListener('click', function(event) {
        // Check if the clicked element is a button
        if (event.target && event.target.matches('.update')) {
          // Perform button click action
          console.log('Button updated clicked!');
        }
    });

    document.querySelector('table').addEventListener('click', function(event) {
        // Check if the clicked element is a button
        if (event.target && event.target.matches('.view')) {
          // Perform button click action
          console.log('Button view clicked!');
        }
    });
}


     const search = document.querySelector('#search')
     search.addEventListener('keyup', function(event) {
        // Check if the clicked element is a button
       // if (event.target && event.target.matches('#search')) {
          // Perform button click action
          //console.log('search');
          console.log(event.target.value)
            async function fetchData() {
              try {
                const idValue = event.target.value; // Assuming idValue is the ID you want to send
                const response = await fetch('http://localhost/database/search.php?id=' + idValue, {
                //method: 'POST',
                headers: {
                  'Content-Type': 'application/json'
                },
                //body: JSON.stringify({ id: idValue })

                });

                if (!response.ok) {
                  throw new Error('Network response was not ok');
                }
                const data = await response.text();
                const d = JSON.parse(data)         
                

              //Handle the data
              } catch (error) {
                console.error('Error:', error);
              }
            }

            fetchData();
       // }
    });     