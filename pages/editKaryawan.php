<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="editkaryawan.css" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>Tosche Dashboard</title>
  </head>
  <body>
    <section id="menu">
      <div class="logo">
        <img src="detergent.png" alt="" />
        <h2>MyLaundry</h2>
      </div>
      <div class="items">
        <li>
          <span class="material-icons"> pie_chart </span>
          <a href="index.html" class="menu-text">Dashboard</a>
        </li>
        <li id="manajemen-li" onclick="dropManajemen()">
          <span class="material-symbols-outlined"> manage_accounts </span>
          <a href="#" class="menu-text">Manajemen User</a>
        </li>
        <div id="manajemen">
          <div>
            <span></span>
            <a href="#">Karyawan</a>
          </div>
          <div>
            <span></span>
            <a href="#">Administrator</a>
          </div>
        </div>
        <li id="transaksi-li">
          <span class="material-symbols-outlined"> payments </span>
          <a href="#" class="menu-text">Transaksi</a>
        </li>
        <li>
          <span class="material-symbols-outlined"> laundry </span>
          <a href="#" class="menu-text">Paket Laundry</a>
        </li>
        <li>
          <span class="material-symbols-outlined"> person </span>
          <a href="#" class="menu-text">Customer</a>
        </li>
        <li>
          <span class="material-symbols-outlined"> summarize </span>
          <a href="#" class="menu-text">Laporan</a>
        </li>
      </div>
    </section>

    <section id="interface">
      <div class="navigation">
        <div class="n1">
          <i id="slide-bar" class="fa-solid fa-bars"></i>
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
              <img src="org1.jpeg" alt="" />
              <h2>Jennie Kim</h2>
            </div>
            <hr />
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> manage_accounts </span>
              <p>Edit Profile</p>
            </a>
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> settings </span>
              <p>Settings</p>
            </a>
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> contact_support </span>
              <p>Help & Support</p>
            </a>
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> logout </span>
              <p>Logout</p>
            </a>
          </div>
        </div>
      </div>

      <div class="i-name-p">
      <h3 class="i-name">Edit Karyawan</h3>
      <p id="p-wajib">*Semua isian wajib diisi</p>
    </div>
      <!-- <div class="values">
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
      </div> -->
      <div class="board">
        <table width="100%">
            <tr>
                <td><label for="">Nama Lengkap</label></td>
                <td><input type="text" name="nama-lengkap" id="" placeholder="Nama Lengkap" value="Nabil Najmudin"></td>
            </tr>
            <tr>
                <td><label for="">Username</label></td>
                <td><input  type="username" name="nama-lengkap" id="edit-username" placeholder="Username" disabled value="nabiil_najm26"></td>
            </tr>
            <tr>
                <td><label for="">Alamat</label></td>
                <td><input type="text" name="alamat" id="" placeholder="Alamat" value="Kediri"></td>
            </tr>

            <tr>
                <td><label for="">No Telepon</label></td>
                <td><input type="text" name="No Telepon" id="" placeholder="No Telepon" value="08888008880"></td>
            </tr>

            <tr>
                <td></td>
                <td>
                <button type="button" class="btn btn-outline-primary active font-kecil">Submit</button>
                <button type="button" class="btn btn-outline-danger active font-kecil">Batal</button>
                </td>
            </tr>
            
        </table>
        <!-- <div class="board-input">
            <label for="nama-lengkap">Nama Lengkap</label>
            <input type="Username">
        </div>
        <div class="board-input">
            <label for="username">Username</label>
            <input type="Username">
        </div>         -->
        </div>
        <!-- <div class="show-search">
          <div>
            <label id="show" for="">Show</label>
            <select name="jumlah-data" id="jumlah-data">
              <option value="10">10</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
            <label id="show" for="">entries</label>
          </div>
          <div class="search">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search" name="" id="" />
          </div>
        </div> -->
      </div>
    </section>
    <script>
      let sideBar = document.getElementById("menu");
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

      $("#manajemen-li").click(function () {
        $("#manajemen").toggleClass("active2");
      });

      // function toggleSideBar() {
      //   sideBar.style.width = "40px";
      // }

      // function toggleSideBar() {
      //   if (x.matches) {
      //     if (sideBar.style.left === "-220px") {
      //       alert("True");
      //       sideBar.style.left == "0px";
      //     } else if (sideBar.style.left == "0px") {
      //       sideBar.style.left == "-220px";
      //     }
      //   }
      // console.log(sideBar.style.left);
      // }

      $("#slide-bar").click(function () {
        $("#menu").toggleClass("active");
      });

      $("#slide-bar").click(function () {
        $("#menu").toggleClass("activeWeb");
      });

      // alert("Apakah bisa ");
    </script>
  </body>
</html>
