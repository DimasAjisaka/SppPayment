<?php include "../header/header.php"; ?>

<div class="content-body" style="margin-top: 125px;">
        <div class="container-fluid">
        <?php 
          if (isset($_SESSION['message']) == 'success') {
            // success alert
          } else if (isset($_SESSION['message']) == 'failed') {
            // danger alert
          }
        ?>
            <!-- <div class="alert alert-success alert-dismissible fade show">
            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
            <strong>Success!</strong> Message has been sent.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
			  	</div>

          <div class="alert alert-danger alert-dismissible fade show">
            <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            <strong>Error!</strong> Message sending failed.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
          </div> -->

          <div class="modal fade" id="delete-wclass-modal" tabindex="-1" aria-labelledby="delete-wclass-modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="delete-wclass-modalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <form method="post" action="../delete/deletewclass.php">
            <div class="modal-footer">
              <input type="hidden" name="class" id="class">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="get-delete-wclass" type="submit" class="btn btn-danger" name="delete-wclass">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>

          <!-- page indicator -->
            <div class="card bg-white ms-3 me-3 shadow" style="border-radius: 16px;">
			        <div class="card-body">
			  	      <div class="">
					        <a href="../index/admin.php" class="" style="text-decoration: none; color: rgb(131, 130, 130); font-weight: bold; font-size: larger;">Dashboard</a>
					        <a href="javascript:void(0)" class="" style="text-decoration: none; color: #2196f3; font-weight: bold; font-size: larger;">/ Data Wali Kelas</a>
          		  </div>
			        </div>
		        </div>
          <!-- row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card bg-white p-2 m-3 shadow" style="border-radius: 16px;">
                <div class="card-header bg-white" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
									<a href="../add/addwclass.php" class="btn btn-primary d-sm-inline-block d-none" style="background-color: #2196f3;">Add Data</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-responsive-md">
                      <thead>
                        <tr>
                          <th style="width: 80px"><strong>#</strong></th>
                          <th><strong>Kelas</strong></th>
                          <th><strong>Fullname</strong></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
											<?php
												include "../connection/connection.php";

												$getData=mysqli_query($conn, "SELECT * FROM wclass ORDER BY class ASC");
												$no=1;

												while($data = mysqli_fetch_array($getData)){
													echo "<tr>
                          <td><strong>$no</strong></td>
                          <td class='class'>$data[class]</td>
                          <td>$data[fullname]</td>
                          <td>
                            <div class='dropdown'>
                              <button type='button' class='btn btn-outline-primary light sharp' data-bs-toggle='dropdown' style='border-radius: 16px;'>
                                <svg width='20px' height='20px' viewbox='0 0 24 24' version='1.1'>
                                  <g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                                    <rect x='0' y='0' width='24' height='24'></rect>
                                    <circle fill='#000000' cx='5' cy='12' r='2'></circle>
                                    <circle fill='#000000' cx='12' cy='12' r='2'></circle>
                                    <circle fill='#000000' cx='19' cy='12' r='2'></circle>
                                  </g>
                                </svg>
                              </button>
                              <div class='dropdown-menu shadow' style='border-radius: 16px;'>
                                <a class='dropdown-item' href='../edit/editwclass.php?class=$data[class]'>Edit</a>
                                <a class='dropdown-item delete-wclass'>Delete</a>
                              </div>
                            </div>
                          </td>
                        </tr>";
													$no++;
												}
											?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php include "../footer/footer.php"; ?>