<?php
include_once "../database/search.php";

?>
<div class="container">
<!-- Display search results here -->
<div class="container">
   <h1>Record Search</h1>
   <form action="search.php" method="GET">
      <div class="input-group mb-3">
         <input type="text" id="search" value="" class="form-control" placeholder="Search by name..." name="search">
         <button class="btn btn-primary" type="submit">Search</button>
      </div>
   </form>

   <!-- Display search results here -->
</div>
<div class="container">
   <h2> Manage Users</h2>
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
            <td class="id"><?= $row['id']?></td>
            <td c;ass="username"><?= $row['username']?></td>
            <td class="email"><?= $row['email']?></td>
            <td class="cdate"><?= $row['created_at']?></td>
            <td>
               <button id="<?= $row['id']?>" class="delete btn btn-danger">Delete</button>
               <button id="<?= $row['id']?>" class="update btn btn-success">Update</button>
               <button id="<?= $row['id']?>" class="view btn btn-primary">View</button>
            </td>
         </tr>
         <?php } ?>
         <!-- Add more rows as needed -->
      </tbody>
   </table>

  </div>
</div>


   