<?php
session_start();

require_once "../Config/Database.php";
require_once "../Helper/functions.php";
$conn = getConnection();


// $conn = getConnection();

// Cek apakah ada session login
if ($_SESSION['login'] != true) {
  header("Location: login.php");
  exit();
}

// Get total customer 
$jmlCustomerSql = "SELECT * FROM customer;";
$jmlCustomerState = $conn->query($jmlCustomerSql);
$jmlCustomerAngka = $jmlCustomerState->rowCount();

// Get total pemasukan
$totalPemasukanSql = "SELECT SUM(t.total_tagihan) 'total' FROM transaksi t GROUP BY 'total';";
$totalPemasukanState = $conn->query($totalPemasukanSql);
$totalPemasukanAngka = $totalPemasukanState->fetch();
$totalPemasukanAngka = rupiah($totalPemasukanAngka['total']);

// Get total transaction
$totalTransactionSql = "SELECT * FROM transaksi";
$totalTransactionState = $conn->query($totalTransactionSql);
$totalTransactionAngka = $totalTransactionState->rowCount();

//Get total produk terjual
$totalProdukTerjual = "SELECT SUM(t.jumlah_barang) 'total' FROM transaksi t GROUP BY 'total';";
$totalProdukTerjualState = $conn->query($totalProdukTerjual);
$totalProdukTerjualAngka = $totalProdukTerjualState ->fetch();
$totalProdukTerjualAngka = $totalProdukTerjualAngka['total'];


// Get user's name
$email = $_SESSION['email'];
$namasql = "SELECT nama FROM karyawan WHERE email = ?;";
$hasil = $conn->prepare($namasql);
$hasil->execute([$email]);

$nama = $hasil->fetch();



$no = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../src/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <title>MyLaundry Dashboard</title>
</head>

<body>
  <section id="menu">
    <div class="logo">
      <img src="../src/img/tosche.png" alt="" />
    </div>
    <div class="items">
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu Utama</h6>
      </li>
      <li onclick="pindahPage('dashboard.php')">
        <span class="material-icons"> pie_chart </span>
        <a class="menu-text">Dashboard</a>
      </li>
      <li onclick="pindahPage('inventori.php')">
        <span class="material-icons"> pie_chart </span>
        <a class="menu-text">Inventori</a>
      </li>

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Laporan</h6>
      </li>
      <li id="manajemen-li" onclick="dropManajemen()">
        <span class="material-symbols-outlined"> manage_accounts </span>
        <a class="menu-text">Pegawai</a>
      </li>
      <div id="manajemen">
        <div onclick="pindahPage('karyawan.php')">
          <span></span>
          <a>Karyawan</a>
        </div>
        <div onclick="pindahPage('administrator.php')">
          <span></span>
          <a>Administrator</a>
        </div>
      </div>
      <li onclick="pindahPage('Transaksi.php')" id="transaksi-li">
        <span class="material-symbols-outlined"> payments </span>
        <a class="menu-text">Pendapatan</a>
      </li>
      <li onclick="pindahPage('Paket.php')">
        <span class="material-symbols-outlined"> laundry </span>
        <a class="menu-text">Produk Terjual</a>
      </li>
      <li onclick="pindahPage('transaksi.php')">
        <span class="material-symbols-outlined"> person </span>
        <a class="menu-text">Transaksi</a>
      </li>
      <li onclick="pindahPage('BuatLaporan.php')">
        <span class="material-symbols-outlined"> summarize </span>
        <a class="menu-text">Laporan</a>
      </li>
    </div>
    <div id="profilediv" onclick="toggleMenu()">
      <img src="../src/img/profil_empty.png" alt="">
      <span><?php echo $nama['nama'] ?></span>
    </div>
  </section>

  <section id="interface">
    <div class="navigation">
      <div class="n1">
        <i id="slide-bar" class="fa-solid fa-bars" style="color: #FFFFFF;"></i>
      </div>
      <div class="profile">
        <i class="fa fa-bell"> </i>
        <img src="org1.jpeg" alt="" />
        <span class="material-symbols-outlined" onclick="toggleMenu()">
          expand_more
        </span>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="../src/img/org1.jpeg" alt="" />
            <h2><?php echo $nama['nama'] ?></h2>
          </div>
          <hr />
          <a href="TidakAda.php" class="sub-menu-link">
            <span class="material-symbols-outlined"> manage_accounts </span>
            <p>Edit Profile</p>
          </a>
          <a href="TidakAda.php" class="sub-menu-link">
            <span class="material-symbols-outlined"> settings </span>
            <p>Settings</p>
          </a>
          <a href="TidakAda.php" class="sub-menu-link">
            <span class="material-symbols-outlined"> contact_support </span>
            <p>Help & Support</p>
          </a>
          <a class="sub-menu-link" id="logout">
            <span class="material-symbols-outlined"> logout </span>
            <p>Logout</p>
          </a>
        </div>
      </div>
    </div>

  

    <div class="values">
      <!-- <div class="val-box">
        <div class="headerpage">
          <h3>Selamat Datang, </h3>
          
          <h6>Toko Kelontong Koh Aldo</h6>
        </div>
        <div id="imgplace">
        <img src="../src/img/headerpage.png" alt="">
        </div>
        
      </div> -->

      <h3 class="i-name">Dashboard</h3>

    <div class="values">
      <div class="val-box">
        <i class="fa fa-users"></i>
        <div>
          <h3><?= $jmlCustomerAngka ?></h3>
          <span>Total Customer</span>
        </div>
      </div>
      <div class="val-box">
        <i class="fa-solid fa-money-check-dollar"></i>
        <div>
          <h3><?= $totalPemasukanAngka ?></h3>
          <span>Pemasukan</span>
        </div>
      </div>
      <div class="val-box">
        <i class="fa-solid fa-bag-shopping"></i>
        <div>
          <h3><?= $totalTransactionAngka ?></h3>
          <span>Total Transaksi</span>
        </div>
      </div>
      <div class="val-box">
        <i class="fa-solid fa-user-gear"></i>
        <div>
          <h3><?= $totalProdukTerjualAngka ?></h3>
          <span>Produk Terjual</span>
        </div>
      </div>
    </div>


      
    </div>
    
    
  </section>
  <script>
    // logout
    $(document).ready(function() {
      $("#logout").click(function() {
        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Anda akan keluar dari halaman ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, keluar saja!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "Logout.php",
              type: "POST",
              success: function() {
                Swal.fire(
                  'Logout berhasil!',
                  'Anda akan keluar dari halaman karyawan.',
                  'success'
                ).then(() => {
                  window.location.href = "login.php";
                })
              }
            })
          }
        })
      })
    })


    let sideBar = document.getElementById("menu");
    let el_html = document.querySelector("html");
    let subMenu = document.getElementById("subMenu");
    let slideBar = document.getElementById("slide-bar");
    let manajemen = document.getElementById("manajemen-li");
    let manajemenDrop = document.getElementById("manajemen");

    // let x = window.matchMedia("(max-width: 769px)");

    function toggleMenu() {
      // subMenu.subMenu.classList.toggle("open-menu");
      if (subMenu.style.maxHeight == "400px") {
        subMenu.style.maxHeight = "0px";
      } else {
        subMenu.style.maxHeight = "400px";
      }
    }

    $("#manajemen-li").click(function() {
      $("#manajemen").toggleClass("active2");
    });


    $("#slide-bar").click(function() {
      $("#menu").toggleClass("active");
    });

    $("#slide-bar").click(function() {
      $("#menu").toggleClass("activeWeb");
    });

    function pindahPage(namaPage) {
      window.location.href = namaPage;
    }



    // alert("Apakah bisa ");
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>
</body>

</html>