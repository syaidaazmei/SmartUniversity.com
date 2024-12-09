<?php
@include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    // Collect data from form
    $fakulti = $_POST['fakulti'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $matrik = $_POST['matrik'];
    $program = $_POST['program'];
    $kenderaan = $_POST['kenderaan'];
    $peserta = $_POST['peserta'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $tempatmenunggu = $_POST['tempatmenunggu'];
    $destinasi = $_POST['destinasi'];
    $pengiring = $_POST['pengiring'];

    // Check if the database connection is successful
    if ($conn) {
        $select = "SELECT * FROM user_book WHERE email = '$email' AND matrik = '$matrik'";
        $result = mysqli_query($conn, $select);

        
            // Insert data into the database
            $insert = "INSERT INTO user_book (fakulti, name, phone, email, matrik, program, kenderaan, peserta, date, duration, tempatmenunggu, destinasi, pengiring)
                       VALUES ('$fakulti', '$name', '$phone', '$email', '$matrik', '$program', '$kenderaan', '$peserta', '$date', '$duration', '$tempatmenunggu', '$destinasi', '$pengiring')";

            mysqli_query($conn, $insert);
                header('Location: user_booking.php');
           
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart University - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/select2/dist/css/select2.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/jquery-minicolors/jquery.minicolors.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/quill/dist/quill.snow.css"
    />
    <link href="../dist/css/style.min.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bus Booking System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/BusBooks/user_page.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="user_schedule.html" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-bus"></i>
                    <span>Bus Schedules</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Bus Route:</h6>
                        <a class="collapse-item" href="user_schedule.html">All Schedules</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Booked:</h6>
                        <a class="collapse-item" href="404.html">Bus</a>
                        <a class="collapse-item" href="blank.html">Van</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Books -->
            <li class="nav-item active">
                <a class="nav-link" href="user_booking.php">
                    <i class="fa fa-book"></i>
                    <span>Booking</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="user_status.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Status</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user_name'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="images/usericon.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                
                    
                          <div class="mb-5">
                            <div class="text-center mb-4">
                              <a>
                                <img src="images/logounimap.png" alt="BusBookingSystem Logo" width="175" height="75">
                              </a>
                            </div>
                            <h2 class="text-center mb-4">BORANG PERMOHONAN KENDERAAN</h2>
                            <h4 class="text-center mb-4">
                                UNIT KEBAJIKAN & PENGANGKUTAN,<br>
                                PUSAT PEMBANGUNAN & PERKHIDMATAN PELAJAR (P3P)<br>
                                UNIVERSITI MALAYSIA PERLIS
                            
                            </h4>
                
                <div class="page-wrapper">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="page-breadcrumb">
                      <div class="row">
                        <div class="col-12"><div class="card">
                            <div class="card-body" style="background-color: cornsilk">
                          <h6 class="page-title">
                            <b>SYARAT-SYARAT TEMPAHAN:</b><br><br>

                            1. Semua tempahan adalah bagi kegunaan dan kemudahan kuliah / aktiviti / program rasmi universiti untuk PELAJAR sahaja.<br>
                            2. Pemohon perlu menyediakan bayaran tol secara tunai (bagi perjalanan yang memerlukan).<br>
                            3. Pemohon perlu menyediakan penginapan pemandu bagi pergerakan program yang dijalankan di luar Negeri Perlis yang melebihi satu (1) hari.<br>
                            4. Borang permohonan mestilah dihantar ke pejabat P3P dalam <b>masa lima (5) hari bekerja</b> sebelum tarikh aktiviti / program melalui emel kepada <ins><a href="mailto:mohdsyafiq@unimap.edu.my">mohdsyafiq@unimap.edu.my</a></ins> dan <ins><a href="mailto:m.irham@unimap.edu.my">m.irham@unimap.edu.my</a></ins> atau serahan tangan ke pejabat P3P. Permohonan bagi tujuan penganjuran aktiviti / program <b>MESTILAH</b> disertakan salinan kertas kerja penganjuran yang telah diluluskan.<br>
                            5. Pemohon diminta menyediakan lampiran / jadual pergerakan berkaitan program yang dijalankan.<br>
                            6. Pemohon hendaklah menyediakan Pegawai Pengiring bagi tempahan yang melibatkan perjalanan di luar Perlis.<br>
                            7. P3P berhak membatalkan mana-mana tempahan sekiranya terdapat tempahan yang perlu diberi keutamaan.<br>
                            8. Pemohon hendaklah mendapatkan kebenaran secara bertulis kepada Timbalan Naib Canselor (HEPA) untuk menampal / mempamerkan sebarang sepanduk pada mana-mana kenderaan sewaan UniMAP.<br>
                            9. Pemohon hendaklah mendapatkan kelulusan secara bertulis daripada Timbalan Naib Canselor (HEPA) untuk permohonan kenderaan bagi tujuan upacara keagamaan.<br>
                            10. Sila semak kelulusan permohonan dengan Unit Kebajikan & Pengangkutan <b>3 hari sebelum</b> tarikh perjalanan.<br><br>

                            <b>Sebarang urusan berkaitan permohonan kenderaan bolehlah menghubungi:</b><br><br>

                            <p>&#9673; En. Mohammad Irhamuddin Mansor &#9656; 011-15004852 / <a href="mailto:m.irham@unimap.edu.my">m.irham@unimap.edu.my</a><br>
                            &#9673; En. Mohd Syafiq Ahmad &#9656; 011-56211563 / <a href="mailto:mohdsyafiq@unimap.edu.my">mohdsyafiq@unimap.edu.my</a></p>

                        </h6>
                          <div class="ms-auto text-end">
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <form class="user" action="" method="post">
                          <?php
                        if(isset($error)){
                            foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                            };
                        }; 
                    ?>
                                            <div class="form-group row">
                                              <label
                                                for="fakulti"
                                                class="col-sm-3 text-end control-label col-form-label"
                                                ><b>FAKULTI/ PTj PEMOHON</b></label
                                              >
                                              <div class="col-sm-9">
                                                <input
                                                  type="text"
                                                  class="form-control"
                                                  name="fakulti"
                                                  required placeholder="FAKULTI/ PTj PEMOHON"
                                                />
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label
                                                for="name"
                                                class="col-sm-3 text-end control-label col-form-label"
                                                ><b>NAMA PEMOHON</b></label
                                              >
                                              <div class="col-sm-9">
                                                <input
                                                  type="text"
                                                  class="form-control"
                                                  name="name"
                                                  required placeholder="NAMA PEMOHON"
                                                />
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                for="phone"
                                                class="col-sm-3 text-end control-label col-form-label"
                                                  ><b>NOMBOR TELEFON</b></label>
                                                  <div class="col-sm-9">
                                                <input
                                                  type="text"
                                                  class="form-control"
                                                  name="phone"
                                                  required placeholder="NOMBOR TELEFON"
                                                />
                                              </div>
                                              </div>
                                            <div class="form-group row">
                                              <label
                                                for="email"
                                                class="col-sm-3 text-end control-label col-form-label"
                                                ><b>EMEL PEMOHON</b></label
                                              >
                                              <div class="col-sm-9">
                                                <input
                                                  type="text"
                                                  class="form-control"
                                                  name="email"
                                                  required placeholder="EMEL PEMOHON"
                                                />
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <label
                                                for="matrik"
                                                class="col-sm-3 text-end control-label col-form-label"
                                                ><b>NO. MATRIK / NO. STAF</b></label>
                                              <div class="col-sm-9">
                                                <input
                                                  type="text"
                                                  class="form-control"
                                                  name="matrik"
                                                  required placeholder="NO. MATRIK / NO. STAFF"
                                                />
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                  for="program"
                                                  class="col-sm-3 text-end control-label col-form-label"
                                                  ><b>PROGRAM / AKTIVITI</b></label>
                                                <div class="col-sm-9">
                                                  <input
                                                    type="text"
                                                    class="form-control"
                                                    name="program"
                                                    required placeholder="PROGRAM / AKTIVITI"
                                                  />
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label
                                                  for="kenderaan"
                                                  class="col-sm-3 text-end control-label col-form-label"
                                                  ><b>JENIS KENDERAAN DIPERLUKAN</b></label>
                                                <div class="col-sm-9">
                                                  <input
                                                    type="text"
                                                    class="form-control"
                                                    name="kenderaan"
                                                    required placeholder="JENIS KENDERAAN DIPERLUKAN"
                                                  />
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label
                                                  for="peserta"
                                                  class="col-sm-3 text-end control-label col-form-label"
                                                    ><b>JUMLAH PESERTA</b></label>
                                                <div class="col-sm-9">
                                                  <input
                                                    type="text"
                                                    class="form-control"
                                                    name="peserta"
                                                    required placeholder="JUMLAH PESERTA"
                                                  />
                                                </div>
                                                </div>
                                              <div class="form-group row">
                                                <label
                                                  for="date"
                                                  class="col-sm-3 text-end control-label col-form-label"
                                                  ><b>TARIKH & MASA</b></label
                                                >
                                                <div class="col-sm-9">
                                                  <input
                                                    type="text"
                                                    class="form-control"
                                                    name="date"
                                                    required placeholder="TARIKH & MASA"
                                                  />
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label
                                                  for="duration"
                                                  class="col-sm-3 text-end control-label col-form-label"
                                                  ><b>HINGGA / DAN</b><br><small class="text-muted">(*Pilih yang berkenaan)*</small></label>
                                                <div class="col-sm-9">
                                                  <input
                                                    type="text"
                                                    class="form-control"
                                                    name="duration"
                                                    required placeholder="HINGGA / DAN"
                                                  />
                                                </div>
                                              </div>
                                            <div class="form-group row">
                                              <label
                                                for="tempatmenunggu"
                                                class="col-sm-3 text-end control-label col-form-label"
                                                ><b>TEMPAT MENUNGGU</b><br><small class="text-muted">(*Sila gunakan helaian tambahan bagi destinasi yang berbeza*)*</small></label>
                                              <div class="col-sm-9">
                                                <textarea class="form-control" name="tempatmenunggu"
                                                required placeholder="">
                                                </textarea>
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                  for="destinasi"
                                                  class="col-sm-3 text-end control-label col-form-label"
                                                  ><b>TEMPAT DITUJU / DESTINASI</b></label>
                                                <div class="col-sm-9">
                                                  <input
                                                    type="text"
                                                    class="form-control"
                                                    name="destinasi"
                                                    required placeholder="TEMPAT DITUJU / DESTINASI"
                                                  />
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label
                                                  for="pengiring"
                                                  class="col-sm-3 text-end control-label col-form-label"
                                                  ><b>BUTIRAN PEGAWAI PENGIRING</b><br><small class="text-muted">(NAMA / JAWATAN / NO. TELEFON)</small></label>
                                                <div class="col-sm-9">
                                                  <textarea class="form-control" name="pengiring"
                                                  required placeholder="">
                                                  </textarea>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="border-top">
                                            <div class="card-body">
                                              <button type="submit" class="btn btn-primary col-md-12" name="submit">
                                                Submit
                                              </button>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                      </div>
                                      </div>
                    

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>