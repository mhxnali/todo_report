<div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Tasks </div> <div style="margin-left:10px"> <a href="index.php?page=2">Add Task</a></div>
        </div>
        <div class="card radius-10 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h6 class="mb-0">Recent Task List</h6>
              <div class="fs-5 ms-auto dropdown">
                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                    class="bi bi-three-dots"></i></div>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <table class="table align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th>#ID</th>
                    <th>user</th>
                    <th>Task</th>
                    <th>Url</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                  require_once('conn.php');
                  $sql = "SELECT * FROM `task`";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>".$row["id"]."</td>";
                      echo "<td>".$row["user_id"]."</td>";
                      echo "<td>".$row["task"]."</td>";
                      echo "<td>".$row["url"]."</td>";
                      echo "<td>".$row["date"]."</td>";                      
                      echo '<td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="View detail" aria-label="Views">
                          <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <ion-icon name="pencil-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Delete" aria-label="Delete">
                          <ion-icon name="trash-outline"></ion-icon>
                        </a>
                      </div>
                    </td>';
                      echo "</tr>";
                    }
                  }
                  $conn->close();

                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end page content-->
    </div>



    <div  data-bs-toggle="modal" data-bs-target="#exampleModal" class="float " style="z-index:9999;position:fixed;right:3%;bottom:2%; background:#923EBA; border-radius:50%;padding:10px 12px; ">
     <i class="lni lni-circle-plus" style="color:white;font-size:30px;"></i>
                </div>


                 <!-- Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="task/save_task.php">
                                    <div class="mb-3">
                                            <label for="yn" class="form-label">Url</label>
                                            <input type="text" class="form-control" id="yn" name="url" required>
                                        </div>
                                      
                                        <div class="mb-3">
                                            
                                            <label for="bn" class="form-label">Task </label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                      
                                        <button type="submit" class="btn btn-primary">Add Task</button>
                                    </form>
                            </div>
                            
                          </div>
                        </div>
                      </div>