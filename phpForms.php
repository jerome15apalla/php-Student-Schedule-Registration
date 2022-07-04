<?php 
    include 'includes/dbConnect.php';
    $dbcon = OpenCon();

    $subid = "";
    $dtitle = "";
    $lab = "";
    $lec = "";
    $code = "";
    $size = "";
    $day = "";
    $time = "";
    $room = "";
    $instructor = "";

    if (isset($_POST['submit'])) {
    	$subid = $_POST['subID'];
        $dtitle = $_POST['dTitle'];
        $lab = $_POST['labUnit'];
        $lec = $_POST['lecUnit'];
        $code = $_POST['classCode'];
        $size = $_POST['classSize'];
        $day = $_POST['days'];
        $time = $_POST['time'];
        $room = $_POST['room'];
        $instructor = $_POST['instructor'];
    }

    if (isset($_POST['search']))
    {  
        $code = $_POST['classCode'];
        $search_sched = $dbcon->prepare("Select SubjectID, DescriptiveTitle, LabUnit, LecUnit, ClassCode, ClassSize, Days, Time, Room, Instructor From Registration where ClassCode=?");
        $search_sched->bind_param("s", $code);
        $search_sched->execute();
        $search_sched->store_result();
        $search_sched->bind_result($sub, $title, $labUnit, $lecUnit, $classCode, $classSize, $days, $times, $rooms, $instruc);

        if ($search_sched->num_rows===1)
        {
            while ($search_sched->fetch()) {
            	$subid = $sub;
                $dtitle = $title;
                $lab = $labUnit;
                $lec = $lecUnit;
                $size = $classSize;
                $day = $days;
                $time = $times;
                $room = $rooms;
                $instructor = $instruc;
            }
        }
        
        $search_sched->close();
    }
 ?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="left">
	<h2>Class Registration</h2>
	<form method="POST">
		<table cellpadding="4">
			<tr>
				<td>Class Code</td>
				<td><input type="text" name="classCode" maxlength="3" value=<?php echo $code; ?> 
				<?php  if (isset($_POST['search'])) echo "readonly"; ?>></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Search" name="search" class="searchButton"></td>
			</tr>
			<tr>
				<td>Subject ID</td>
				<td><input type="text" name="subID" maxlength="25" value=<?php echo "'$subid'"; ?> 
				<?php  if (isset($_POST['search'])) echo "disabled"; ?>></td>
			</tr>
			<tr>
				<td>Descriptive Title</td> 
				<td><input type="text" name="dTitle" maxlength="25" value=<?php echo "'$dtitle'"; ?> 
				<?php  if (isset($_POST['search'])) echo "disabled"; ?>></td>
			</tr>
			<tr>
				<td>Lab Units</td>
				<td><input type="number" name="labUnit" maxlength="25" value=<?php echo $lab; ?> 
				<?php  if (isset($_POST['search'])) echo "disabled"; ?>></td>
			</tr>
			<tr>
				<td>Lec Units</td>
				<td><input type="number" name="lecUnit" maxlength="25" value=<?php echo $lec; ?>
				<?php  if (isset($_POST['search'])) echo "disabled"; ?>></td>
			</tr>
			<tr>
				<td>Class Size</td>
				<td><input type="number" name="classSize" maxlength="25" value=<?php echo $size; ?> ></td>
			</tr>
			<tr>
				<td>Instructor</td>
				<td><input type="text" name="instructor" maxlength="25" value=<?php echo "'$instructor'"; ?> ></td>
			</tr>
			<tr>
				<th colspan="2" align="center">Class Schedule</th>
			</tr>
			<tr>
				<td>Days</td>
				<td><input type="text" name="days" maxlength="25" value=<?php echo $day; ?> ></td>
			</tr>
			<tr>
				<td>Time</td>
				<td><input type="text" name="time" maxlength="25" value=<?php echo $time; ?> ></td>
			</tr>
			<tr>
				<td>Room</td>
				<td><input type="text" name="room" maxlength="25" value=<?php echo $room; ?> ></td>
			</tr>
			<tr>
	            <td colspan="2" align="center">
	                <input type="submit" value="Submit" name="submit" class="button">
	                <input type="submit" value="Update" name="update" class="button">
	                <input type="reset" value="Reset" class="button">
	            </td>
	        </tr>
		</table>
	</form>
	</div>

	<?php
		if (isset($_POST["submit"])) {
            $subid = $_POST['subID'];
            $dtitle = $_POST['dTitle'];
            $lab = $_POST['labUnit'];
            $lec = $_POST['lecUnit'];
            $code = $_POST['classCode'];
            $size = $_POST['classSize'];
            $instructor = $_POST['instructor'];
            $day = $_POST['days'];
            $time = $_POST['time'];
            $room = $_POST['room'];
            
            $insert_Registration = $dbcon->prepare("Insert into Registration(SubjectID, DescriptiveTitle, LabUnit, LecUnit, ClassCode, ClassSize, Instructor, Days, Time, Room) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $insert_Registration->bind_param("ssiisissss", $subid,$dtitle,$lab,$lec,$code,$size,$instructor,$day,$time,$room);

            $insert_Registration->execute();
            $insert_Registration->store_result();
            $insert_Registration->close();
        }

		else if (isset($_POST["update"])) { 
			$subid = $_POST['subID'];
            $size = $_POST['classSize'];
            $instructor = $_POST['instructor'];
            $days = $_POST['days'];
            $time = $_POST['time'];
            $room = $_POST['room'];
            $code = $_POST['classCode'];

            $update_reg=$dbcon->prepare("UPDATE `Registration` SET `ClassSize`=?, `Instructor` = ?, `Days`=?, `Time`=?, `Room`=? WHERE `Registration`.`ClassCode` = ? ") or die("Query failed.");

			$update_reg->bind_param("isssss", $size,$instructor,$days,$time,$room,$code);

            $update_reg->execute();
            $update_reg->store_result();
            $update_reg->close();
        }
	?>

	<div class="right">
		<h2>Class Schedule</h2>
		<table cellpadding="5" class="record">
			<tr>
				<th>Class Code</th>
				<th>Subject ID</th>
				<th>Descriptive Title</th>
				<th>Lab Units</th>
				<th>Lec Units</th>
				<th>Class Size</th>
				<th>Instructor</th>
				<th>Days</th>
				<th>Time</th>
				<th>Room</th>
			</tr>
			<?php
				$select_Registration = $dbcon->prepare("Select * from Registration");

	            $select_Registration->execute();
	            $select_Registration->store_result();

	            $select_Registration->bind_result($code, $subid, $dtitle, $lab, $lec, $size, $instruc, $day, $time,$room);

	            while ($select_Registration->fetch()) {
	            	echo "<tr>
	            			<td><center>$code</center></td>
	            			<td>$subid</td>
	            			<td>$dtitle</td>
	            			<td><center>$lab</center></td>
	            			<td><center>$lec</center></td>
	            			<td><center>$size</center></td>
	            			<td>$instruc</td>
	            			<td><center>$day</td>
	            			<td>$time</td>
	            			<td>$room</td>
	            		</tr>";
	            }
			?>
		</table>
	</div>
</body>
</html>