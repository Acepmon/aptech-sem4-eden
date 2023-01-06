<!DOCTYPE html>

<meta charset="UTF-8">
<?php
$id = $_POST['input'];
$con = mysqli_connect('localhost', 'root', '', 'gogo');
$result = mysqli_query($con, 'select movie_trailer, movie_title from movies where movie_id = ' . $id);
$row = mysqli_fetch_array($result);
/*
  while ($row = mysqli_fetch_array($result)) {
  echo '<script>alert("'.$row[0].'");</script>';
  echo '<video src="'.$row[0].'" controls autoplay></video>';
  } */
?>
<div>
    <?php echo '<a href="watch.php?cat=movie&m='.$id.'" id="title">'.$row[1].'</a>'; ?>
    <a href="javascript:void(0)" onclick="lightbox(0)">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="30px" height="30px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
        <path d="M25.264,35.146l9.899-9.899l14.849,14.849l14.849-14.849l9.9,9.899L59.912,50l14.85,14.844l-9.9,9.9l-14.849-14.85
              l-14.849,14.85l-9.899-9.9L40.113,50L25.264,35.146z"/>
        </svg>
    </a>
    <div style="clear: both"></div>
</div>
<div>

    <video src="<?php echo $row[0]; ?>" controls></video>
</div>
