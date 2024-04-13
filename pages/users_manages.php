<?php

include "../database/connection.php";

echo $searchUserName = $_GET["search"] ?? "";

//Fetch all users
function fetchUsers($conn, $username = "")
{
    $sql = "SELECT * FROM users where username like '%$username%'";

    // Prepare and execute SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch data
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Saving all users and calling function
$result = fetchUsers($conn, $searchUserName = null);

?>

<!-- Display search results here -->
<div class="container">
   <h1>Record Search</h1>
   <form action="search.php" method="GET">
      <div class="input-group mb-3">
         <input type="text" id="search" class="form-control" placeholder="Search by name..." name="search">
         <button class="btn btn-primary" type="submit">Search</button>
      </div>
   </form>
   <!-- Display search results here -->
</div>
<div class="container">
   <h2>Users Listing</h2>
   <table class="table table-striped">
      <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($result as $row) { ?>            
         <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['username']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['created_at']?></td>
            <td>
               <button id="delete" class="delete btn btn-danger">Delete</button>
               <button class="btn btn-success">Update</button>
               <button class="btn btn-primary">View</button>
            </td>
         </tr>
         <?php } ?>
         <!-- Add more rows as needed -->
      </tbody>
   </table>
</div>

