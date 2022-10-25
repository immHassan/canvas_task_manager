<style>
  .avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;

    .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;

      input {
        display: none;

        +label {
          display: inline-block;
          width: 34px;
          height: 34px;
          margin-bottom: 0;
          border-radius: 100%;
          background: #FFFFFF;
          border: 1px solid transparent;
          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
          cursor: pointer;
          font-weight: normal;
          transition: all .2s ease-in-out;

          &:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
          }

          &:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
          }
        }
      }
    }

    .avatar-preview {
      width: 192px;
      height: 192px;
      position: relative;
      border-radius: 100%;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

      >div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
      }
    }
  }
</style>
<?php $table_name = "Task Stage"; ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?= $table_name; ?></a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">List</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">All <?= $table_name; ?></h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">

          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="<?php echo base_url(); ?>assets/front/assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New message</span> from Laur
                      </h6>
                      <p class="text-xs text-secondary mb-0 ">
                        <i class="fa fa-clock me-1"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="<?php echo base_url(); ?>assets/front/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New album</span> by Travis Scott
                      </h6>
                      <p class="text-xs text-secondary mb-0 ">
                        <i class="fa fa-clock me-1"></i>
                        1 day
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(453.000000, 454.000000)">
                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        Payment successfully completed
                      </h6>
                      <p class="text-xs text-secondary mb-0 ">
                        <i class="fa fa-clock me-1"></i>
                        2 days
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a href="<?php echo base_url('logout'); ?>" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6><?= $table_name; ?></h6>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Add New</button>


            <!-- Modal Create-->
            <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New <?= $table_name; ?></h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="<?= base_url() . 'task_stage/add'; ?>" enctype='multipart/form-data'>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Task Stage Name</label>
                        <input type="text" class="form-control" value="" required name="task_stage_name">
                      </div>



                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                  </div>


                  </form>

                </div>
              </div>
            </div>






            <!-- Modal Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit <?= $table_name; ?></h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="editForm" method="post" action="<?= base_url() . 'task_stage/update'; ?>" enctype='multipart/form-data'>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Task Stage Name</label>
                        <input type="text" class="form-control" value="" required name="task_stage_name_e">
                      </div>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Update</button>
                  </div>


                  </form>

                </div>
              </div>
            </div>




          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Task Stage Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Task Stage Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tdody>
                  <?php

                  foreach ($task_stage as $record) { ?>

                    <tr>


                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <a href="tables_tasks.html">
                              <h6 class="mb-0 text-sm"><span class="badge bg-gradient-dark">#<?= $record->task_stage_id; ?></span></h6>
                            </a>
                          </div>
                        </div>
                      </td>


                      <td>
                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <a href="tables_tasks.html">
                              <h6 class="mb-0 text-sm"><?= $record->task_stage_name; ?></h6>
                            </a>
                          </div>
                        </div>
                      </td>


                      <td>
                        <p class="text-sm font-weight-bold mb-0 momentDate"><?= $record->task_stage_created_at; ?></p>
                      </td>

                      <td class="align-middle">
                        <!-- <button class="btn btn-link text-secondary mb-0">
                          <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                         -->

                        <div class="d-flex px-2">
                          <div class="my-auto">
                            <a href="<?= base_url() . 'task_stage/delete/' . $record->task_stage_id; ?>">
                              <i class="fas fa-trash" aria-hidden="true"></i></span>
                            </a>

                            <a href="#" onclick="edit('<?= $record->task_stage_id; ?>')">
                              <i class="fas fa-edit" aria-hidden="true"></i></span>
                            </a>

                          </div>
                        </div>

                      </td>
                    </tr>



                  <?php }
                  ?>


                </tdody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<script>
  $(document).ready(function() {
    $('.table').DataTable();
  });

  function readURL(imageName, input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#' + imageName).attr('src', e.target.result);
        $('#' + imageName).hide();
        $('#' + imageName).fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imageUpload").change(function() {
    readURL('imagePreview', this);
  });


  $("#imageUploadE").change(function() {
    readURL('imagePreview_e', this);
  });



  function edit(id = 1) {

    var baseUrl = '<?= base_url(); ?>'
    $.ajax({
        method: "GET",
        url: `${baseUrl}task_stage/get_record/${id}`,
      })
      .done(function(data) {
        data = JSON.parse(data);
        $("input[name='task_stage_name_e']").val(data.data.task_stage_name);
        $('#editModal').modal('show');



        $('#editForm').attr('action', `${baseUrl}task_stage/update/${data.data.task_stage_id}`);


      });
  }
</script>