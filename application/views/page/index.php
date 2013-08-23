<style>body {padding-top: 20px;}.header {margin-bottom: 30px}.container {max-width: 940px;}</style>
<div class="row">
    <div class="col-md-12">
        <div class="header">
            <ul class="nav nav-pills pull-right">
                <?php if(!$this->ion_auth->logged_in()): ?>
                    <li><a href="<?=config_item('loginRoute')?>">Login</a></li>
                <?php else: ?>
                        <li><a href="/user/home">Members Area</a></li>
                    <?php if ($this->ion_auth->is_admin()): ?>
                        <li><a href="/admin/home">Administration Area</a></li>   
                    <?php endif ?>
                    <li><a href="<?=config_item('logoutRoute')?>">Logout</a></li>
                <?php endif ?>
            </ul>
            <h3 class="text-muted">Unleash</h3>
        </div>
        <div class="jumbotron">
            <h1>Welcome to Unleash</h1>
            <p class="lead">The page you are looking is publicly accessible.</p>
            <p>If you would like to edit this page you'll find it located at:</p>
            <code>application/views/page/index.php</code>

            <p>The corresponding controller for this page is found at:</p>
            <code>application/controllers/page.php</code>
            <hr>
            <p><strong>Member Access</strong></p>
            <code>Username: user@user.com | Password: password</code>
            <p><strong>Admin Access</strong></p>
            <code>Username: admin@admin.com | Password: password</code>
        </div>
    </div>
</div>