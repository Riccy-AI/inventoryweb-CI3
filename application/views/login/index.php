<div class="container mt-5">
    <div class="text-center mb-4">
        <a class="navbar-brand">
            <img src="<?= base_url('assets/icon/ubsi.png'); ?>" alt="Logo" width="100" height="100" class="d-inline-block align-text-top">
        </a>
        <h1>Selamat Datang Di Aplikasi Inventory Notaris</h1>
    </div>

    <!-- Form Login -->
    <form action="<?= base_url('login/login'); ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Required Username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Required Password" required>
        </div>


        <button type="submit" class="btn btn-primary">Login</button>
    </form>