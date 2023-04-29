<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php include './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include './assets/mod/alert.php';?>
          <h1>Channels <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
			<?php
			$statement = $mysqli->prepare("SELECT * FROM users ORDER BY subscribers DESC");
			$statement->execute();
			$result = $statement->get_result();
			if($result->num_rows !== 0){
				while($row = $result->fetch_assoc()) {
					$rows = getSubscribers($row['username'], $mysqli);
				    echo "
				    <div class='user'>
				    	<div class='user-info'>
						    <div><a href='./profile?user=".$row['username']."'>".$row['username']."</a></div>
						    <div><span class='black'>".$rows."</span> subscribers</div>
					    </div>
					  <!--  <div><a href='./profile?user=".$row["username"]."'><img class='user-picture' src='./pfp/".getUserPic($row["id"])."'></a></div> -->
				    </div>
				    <hr>";
				}
			}
			else{
				echo "There are no channels. Why not make one?";
			}
			$statement->close();
			?>
          </div>
          <div class="span4">
         <?php include './assets/mod/whatsnew.php'; ?>
          </div>
        </div>
      </div>

      <?php include './assets/mod/footer.php'; ?>

    </div> <!-- /container -->

  </body>
</html>