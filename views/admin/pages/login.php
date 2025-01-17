<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Gita Ubud - Login Admin</title>

    <link rel="stylesheet" href="<?= asset('/admin/assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/assets/css/app.css') ?>">

    <link rel="shortcut icon" href="<?= asset(path: '/user/images/pondok-gita-logo.png') ?>" type="image/x-icon">
</head>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 mx-auto">
                    <div class="card py-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?= asset('/user/images/pondok-gita-logo.png') ?>" height="80" class='mb-4'>
                                <h3>Sign In</h3>
                            </div>
                            <div id="alert-container">
                            </div>
                            <form id="form-login">
                                <input type="hidden" name="name" value="login" required>
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="username" id="username" required>
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        <a href="auth-forgot-password.html" class='float-end'>
                                            <small>Forgot password?</small>
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="password" id="password"
                                            required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider">
                                </div>
                                <div class="clearfix">
                                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= asset('/admin/assets/js/feather-icons/feather.min.js') ?>"></script>
    <script src="<?= asset('/admin/assets/js/app.js') ?>"></script>
    <script src="<?= asset('/admin/assets/js/main.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#form-login').submit(function (e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: '<?= route('/admin/auth-controller') ?>',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        window.location.href = response.url;
                    } else {
                        $('#alert-container').html(`<div class="alert alert-danger">${response.message}</div>`);
                    }
                }, error: function (error) {
                    console.log(error);
                }
            })
        });
    </script>
</body>

</html>