<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran SPP Online</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #274B74, #1F2F49);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background: #2E4A6B;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      width: 350px;
      text-align: center;
      color: white;
    }

    .container h2 {
      font-size: 22px;
      margin-bottom: 25px;
    }

    .card {
      background: #1F3554;
      padding: 20px;
      border-radius: 12px;
      margin: 15px 0;
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
      display: block;
      color: white;
    }

    .card:hover {
      background: #254169;
    }

    .card img {
      width: 50px;
      margin-bottom: 10px;
    }

    .card p {
      margin: 0;
      font-weight: bold;
      font-size: 16px;
      color: #fff;
    }

    .footer {
      margin-top: 20px;
      font-size: 14px;
      font-weight: bold;
      color: #FFD700;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>PEMBAYARAN SPP ONLINE</h2>
    
    
    <a href="lgn-admin.php" class="card">
      <img src="https://img.icons8.com/ios-filled/100/FFD700/user.png" alt="Admin">
      <p>Login Admin</p>
    </a>


    <a href="lgn_siswa.php" class="card">
      <img src="https://img.icons8.com/ios-filled/100/FFD700/graduation-cap.png" alt="Siswa">
      <p>Login Siswa</p>
    </a>

    <div class="footer">SMK GOLDEN RANCABUNGUR</div>
  </div>
</body>
</html>