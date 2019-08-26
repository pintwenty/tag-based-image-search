<?php
session_start();
include 'includes/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<html>
	<head>
		<title>Tag based Image Search</title>
		<link rel="stylesheet" type="text/css" href="css/chosen.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/chosen.jquery.js"></script>
	</head>
	<body>
		<div class="header" style="border-bottom: 1px solid #D3D3D3;">
			<span class="search-box">
				<form action="search.php" method="POST"  id="search" style="position: relative;display: inline-block;width: 100%;height: 100%;">
				<select data-placeholder="Choose tags ..." name="tags[]" multiple class="chosen-select">
    				<?php
    				$sql = "SELECT id,name FROM tags";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
					foreach($data as $d){
						echo "<option value='".$d['name']."'>".$d['name']."</option>";
					}
					?>
  				</select>
				<span onclick="search()"><b><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></b></span>
				</form>

			</span>

			<?php if(!isset($_SESSION['id'])){?>
				<a href="login.php"><span class="btn login">Login</span></a>
			<?php }else{?>
				<span class="uinfo">
					
				<ul>
					<li class="btn addimg"><span>Add Images</span></li>
					<li><span>Welcome <?= $_SESSION['name']?>.!</span></li>
					<li><a href="includes/logout.php"><span>Logout</span></a></li>
				</ul>
				</span>
			<?php } ?>

		</div>
		<div class="search-results">
			<?php 
			if(isset($_REQUEST['tags'])){
				$tags = $_REQUEST['tags'];
				$xtags = implode("','",$tags);
				$sql = "select iid,(select image from images i where i.id=iid) image,count(*) cnt,tag from taglink where tag in ('".$xtags."') group by iid order by cnt";
				$result = $conn->query($sql);
			}else{
				$sql = "select iid,(select image from images i where i.id=iid) image,count(*) cnt,tag from taglink group by iid order by cnt";
				$result = $conn->query($sql);

			}
			if ($result->num_rows > 0) {
				# code...
				$data = $result->fetch_all(MYSQLI_ASSOC);

				foreach ($data as $d) {
					# code...
			?>
			<div class="card">
				<div>
					<img src="images/<?= $d['image'] ?>" alt="">
				</div>
			</div>
			<?php
				}
			}else{
				?>
				<p>No Images Found</p>
				<?php
			}
			?>
			
		</div>
		<?php if(!isset($_SESSION['id'])){?>
				
			<?php }else{
$sql = "SELECT id,name FROM tags";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
				?>

					<div class="model addimg">
			<div class="model-content">
				<h3>Add Image</h3>
				<span class="modal-close" model-id="addimg">close</span>
				<div>
				<form action="includes/addimage.php" method="POST" enctype="multipart/form-data">
					
					<label class="full dimg" for="dimg">
					<img src="imgs/default.jpg" alt="Category Image" id="image_upload_preview" base64="">
				</label>
				<input type="file" id="dimg"  class="form-control preview" accept="image/x-png,image/gif,image/jpeg"  hidden="hidden" name="image" /> 
				<span style="padding: 5px 0;">Set Tags to Image : </span>
				<select data-placeholder="Choose tags ..." name="tags[]" multiple class="chosen-select ics-tags">
					<?php
					foreach($data as $d){
						echo "<option value='".$d['name']."'>".$d['name']."</option>";
					}
					?>
  				</select>
  				<button class="btn aimg">Submit</button>
  				</form>
				</div>
			</div>
		</div>
			<?php } ?>

	</body>
	<script type="text/javascript" src="js/script.js"></script>
</html>