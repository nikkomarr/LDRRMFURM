<?php 
  // Include and initialize JSON class
  require_once "jsonDataHandler.php";
  $db = new JsonDataHandler();

  // Fetch sample member data
  $members = $db->getRows(); 

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CUSTOM STYLING -->
    <link rel="stylesheet" href="css/styless.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <!--FONTAWESOME 6-->
	  <script src="https://kit.fontawesome.com/fe40695223.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="font-weight-bolder w-100 d-flex justify-content-center mb-3">Local DRRM Fund Utilization Report and Monitoring System</h1>
    
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-3 d-flex justify-content-end">
          <a href="javascript:void(0)" class="btn btn-success"><i class="plus"></i> Add Member</a>
        </div>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Country</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(!empty($members)){
                $count = 0;
                foreach($members as $row) {
                  $count++;
            ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['contact']; ?></td>
              <td><?php echo $row['country']; ?></td>
              <td>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info"><i class="fa-solid fa-pen"></i> Edit</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa-solid fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr class="bg-danger">
              <td colspan="6" class="text-center text-light">No member(s) found...</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>