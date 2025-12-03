<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Siswa - SPP Online</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
  }

  body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #667eea, #764ba2);
  }

  .login-container {
    background: rgba(255, 255, 255, 0.95);
    padding: 40px 50px;
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    width: 350px;
    text-align: center;
    transition: 0.3s;
  }

  .login-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 45px rgba(0,0,0,0.3);
  }

  .login-container h2 {
    margin-bottom: 30px;
    color: #333;
    font-weight: 600;
  }

  .input-group {
    position: relative;
    margin-bottom: 25px;
  }

  .input-group input {
    width: 100%;
    padding: 12px 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
    font-size: 16px;
  }

  .input-group input:focus {
    border-color: #667eea;
    box-shadow: 0 0 8px rgba(102,126,234,0.5);
  }

  .login-btn {
    width: 100%;
    padding: 12px;
    border: none;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    font-size: 16px;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
  }

  .login-btn:hover {
    background: linear-gradient(135deg, #764ba2, #667eea);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  }

  .login-footer {
    margin-top: 20px;
    font-size: 14px;
    color: #555;
  }

  .login-footer a {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
  }

  .login-footer a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="login-container">
  <h2>Login Siswa</h2>
  <form action="login_siswa_process.php" method="POST">
    <div class="input-group">
      <input type="text" name="nis" placeholder="NIS" required>
    </div>
    <div class="input-group">
      <input type="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit" name="login" class="login-btn">Masuk</button>
  </form>
  <div class="login-footer">
    Belum punya akun? <a href="register_siswa.php">Daftar sekarang</a>
  </div>
</div>

</body>
</html>
