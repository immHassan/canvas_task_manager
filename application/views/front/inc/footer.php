  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/front/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/front/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>assets/front/assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $('#department_id').on('change', function() {
        var department_id = $(this).val();

        $.ajax({
          url: '<?php echo base_url('task/stages/') ?>' + department_id,
          type: 'get',
          success: function(response) {
            $('#task_stage_id').html(response);
          }
        });

      });

      $('.task-row').on('click', function() {
        var task_id = $(this).data('task-id');
        $.ajax({
          url: '<?php echo base_url('task/view/') ?>' + task_id,
          type: 'get',
          success: function(response) {
            if (JSON.parse(response).length != 0 && JSON.parse(response)) {
              var records = JSON.parse(response);
              $('#taskViewModal .department_name').html(records.department_name);
              $('#taskViewModal .task_created_at').html(records.task_created_at);
              $('#taskViewModal .task_name').html(records.task_name);
              $('#taskViewModal .task_created_by').html(records.user_first_name + ' ' + records.user_last_name);
              $('#taskViewModal .task_uuid').html(records.task_uuid);
              $('#taskViewModal .task_description').html(records.task_description);
              $('#taskViewModal .task_id').val(records.task_id);
              $('#taskViewModal .project_id').val(records.project_id);

              var html = '';
              $(records.task_stages).each(function(k, v) {
                var selected_option = (v.task_stage_id == records.task_stage_id) ? 'selected="selected"' : '';
                html += '<option value="' + v.task_stage_id + '" ' + selected_option + '>' + v.task_stage_name + '</option>';
              });

              $('#taskViewModal .task_stage_id').html(html);

              if (records.task_comments.length > 0) {
                var chat_html = '';

                $(records.task_comments).each(function(k, v) {
                  var bubble_class = '';
                  if (v.comment_created_by == '<?php echo $this->session->userdata('user_id'); ?>') {
                    bubble_class = 'bubble-me';
                  }

                  if (v.comment_type == 'log') {
                    bubble_class = 'bubble-log';
                  }

                  chat_html += '<li class="bubble ' + bubble_class + '"> <p>' + v.comment_text + ' </p> <small>Tue 25-10-22, 05:35:28pm - ' + v.user_first_name + ' ' + v.user_last_name + '</small> </li>';
                });

                $('#taskViewModal .chat ul').html(chat_html);
              }

              $('#taskViewModal').modal('show');

              console.log(records);
            }
          },
        });
      });


      $('body').on('change', '#taskViewModal .task_stage_id', function() {
        var val = $(this).val();
        var task_id = $('#taskViewModal .task_id').val();
        var project_id = $('#taskViewModal .project_id').val();

        $.ajax({
          url: '<?php echo base_url('task/task_stage_update'); ?>',
          type: 'post',
          data: {
            task_id: task_id,
            task_stage_id: val,
            project_id: project_id
          },
          success: function(response) {
            if (response == 'success') {
              alertify.success('Task status updated!');
            } else if (response == 'failed') {
              alertify.error('Something went wrong!');
            }
          }
        });

      });

    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <?php if ($this->session->flashdata('success')) : ?>

    <script>
      swal("Good job!", <?php echo $this->session->flashdata('success') ?>, "success");
    </script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')) : ?>
    <script>
      swal("Error!", <?php echo $this->session->flashdata('error') ?>, "error");
    </script>
  <?php endif; ?>


  </body>


  </html>