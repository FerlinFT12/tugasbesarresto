<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<?php 
            if(isset($_GET['pesan'])) {
                if($_GET['pesan'] == 'gagal') {
                    echo "Login gagal! username dan password salah!";
                } else if($_GET['pesan'] == 'logout') {
                    echo "Anda telah berhasil logout";
                } else if($_GET['pesan'] == 'belum_login') {
                    echo "Anda harus login untuk mengakses halaman admin";
                }
            }
        ?>
	<form method="post" name="form_login" id="form_login" action="proses-login.php" style="margin-top: 120px;">
		<table class="form">
			<tr>
				<td colspan="2">
					<h1 align="center">Restoran Pak Broto Azhari</h1>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" name="username" id="username" />
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password" id="password" />
				</td>
			</tr>
			<tr>
				<td>Bagian</td>
				<td>
					<select name="bagian">           
                        <option value="pelayan">Pelayan</option>
                        <option value="koki">Koki</option>
						<option value="pantry">Pantry</option>
						<option value="kasir">Kasir</option>
						<option value="cs">Customer Service</option>
                    </select>
				</td>
			</tr>
			<tr style="height:10px"></tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="login" id="login" value="Login" class="btn btn-tambah" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
