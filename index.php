<?php
include 'header.php';
?>
<div id="main-content" class="container">
  <h2>All Records</h2>
  <?php
  include 'config.php';

  $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  if (mysqli_num_rows($result) > 0) {
  ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">Class</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <th scope="row"><?php echo $row['sid']; ?></th>
            <td><?php echo $row['sname']; ?></td>
            <td><?php echo $row['saddress']; ?></td>
            <td><?php echo $row['cname']; ?></td>
            <td><?php echo $row['sphone']; ?></td>
            <td>
              <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
              <a href='delete-inline.php?id=<?php echo $row['sid']; ?>'>Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
  <?php } else {
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
<?php
include_once('./footer.html')
?>
</body>

</html>