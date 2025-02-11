    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          </form>
          <div style="display:flex; flex-direction:column;">
<p id="realtime_date" style="margin:0px;"></p>
            <p id="realtime">
            <script>
   function Timer() {
    var dt=new Date()
    var hour = dt.getHours();
   var minute = dt.getMinutes();
   var second = dt.getSeconds();
   var date = dt.getDate();
   var month = dt.getMonth()+1;
   var year = dt.getFullYear();
   
   var clock = [hour, minute, second].join(":");
   var localDate = [date, month, year].join("-")
   document.getElementById('realtime').innerHTML = clock;
   document.getElementById('realtime_date').innerHTML = localDate; 
   setTimeout("Timer()",1000);
 }
 Timer();
 
 </script>
            </p>   
          </div>
           <div class="topbar-divider d-none d-sm-block align-items-center row"></div>
          <img src="<?=base_url()?>assets/img/Kemenhub.png" width="45" height="50" style="margin-right:5px" alt="">
          <img src="<?=base_url()?>assets/img/surakarta.png" width="45" height="50" style="margin-right:5px"alt="">
          <img src="<?=base_url()?>assets/img/BST.png" width="45" height="50" style="margin-right:6px"alt="">
          <div class="d-flex align-items-center flex-column">
            <p class="align-self-center" style="font-size:25px;font-weight:bold;">PT Bengawan Solo Trans

          </div> 
          </p>

          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <font size="4" face="arial bold">
                    <?php echo ucfirst($this->fungsi->user_login()->username) ?>
                  </font>
                </span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->