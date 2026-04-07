<?php include 'db.php'; ?>

<h2>Add Student</h2>
<form method="POST">
Name: <input type="text" name="name"><br>
Email: <input type="text" name="email"><br>
Mobile: <input type="text" name="mobile"><br>
Department: <input type="text" name="department"><br>
<input type="submit" name="submit" value="Add">
</form>

<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $department=$_POST['department'];

    mysqli_query($conn,"INSERT INTO student(name,email,mobile,department)
    VALUES('$name','$email','$mobile','$department')");
}
?>

<h2>Student List</h2>
<table border="1">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Mobile</th><th>Dept</th><th>Action</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT * FROM student");
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['department']; ?></td>
<td>
<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>