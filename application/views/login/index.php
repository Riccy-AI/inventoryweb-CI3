<div class="container">
    <a class="navbar-brand">
        <img src="assets/icon/ubsi.png" alt="Logo" width="100" height="100" class="d-inline-block align-text-top">
    </a>
    <h1>Selamat Datang Di Aplikasi Inventory Notaris</h1>
    <form action="<?php echo base_url('login/login'); ?>" method="post"> <!-- Arahkan ke login/login untuk proses autentikasi -->
        <div class="mb-3">
            <label for="InputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="InputUsername" name="username" placeholder="Required Username" required>
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Required Password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>