<?php

require_once '../models/user.php';
class AuThController extends user
{
    public function registers()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $error = [];
            if (empty($_POST['name'])) {
                $error['name'] = 'Vui lòng nhập tên';
            }
            if (empty($_POST['email'])) {
                $error['email'] = 'Vui lòng nhập email';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email sai định dạng';
            } else {
                $checkEmail = $this->checkEmail($_POST['email']);
                if ($checkEmail > 0) {
                    $error['email'] = 'Email đã có tài khoản';
                }
            }
            if (empty($_POST['password']) && strlen($_POST['password']) < 6) {
                $error['password'] = 'Vui lòng nhập mật khẩu';
            }


            $_SESSION['errors'] = $error;
            if (count($error) > 0) {
                header('location:?act=register');
                exit();
            }
            $register = $this->register($_POST['name'], $_POST['email'], $_POST['password']);
            if ($register) {
                $_SESSION['success'] = 'Tạo tài khoản thành công. Vui lòng đăng nhập';
                header('location:index.php?act=login');
                exit();
            } else {
                $_SESSION['errors'] = 'Tạo tài khoản thất bại. Vui lòng xem lại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../views/client/auth/register.php';
    }

    public function logins()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $error = [];
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'Email sai định dạng';
            }
            if (empty($_POST['password'])) {
                $error['password'] = 'Mật khẩu không để trống';
            }
            // $_SESSION['error'] = $error;
            // if (count($error) > 0) {
            //     header('location:' . $_SERVER['HTTP_REFERER']);
            //     exit();
            // }

            $login = $this->login($_POST['email'], $_POST['password']);
            if ($login) {
                $_SESSION['user'] = $login;
                // $_SESSION['user_admin'] = $login;
                $_SESSION['user_id'] = $login['id'];
                $_SESSION['role_id'] = $login['role_id'];
                $_SESSION['success'] = 'Đăng nhập thành công';
                header('location:index.php?act=index');
                exit();
            } else {
                $_SESSION['error'] = 'Login thất bại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../views/client/auth/login.php';
    }
    public function logout()
    {
        session_destroy();
        header('location:index.php');
        exit();
    }
    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])) {
            $errors = [];

            // Validate email
            $email = trim($_POST['email']);
            if (empty($email)) {
                $errors['email'] = 'Email bắt buộc phải điền.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Sai định dạng email.';
            }

            // Validate new password
            $newPassword = trim($_POST['password']);
            if (empty($newPassword) || strlen($newPassword) < 6) {
                $errors['password'] = 'Mật khẩu phải ít nhất 6 ký tự.';
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: index.php?act=forgot');
                exit();
            }

            // Check if email exists in the database
            $user = $this->getUserByEmail($email);
            if (!$user) {
                $_SESSION['errors']['email'] = 'Không có tài khoản với email này.';
                header('Location: index.php?act=forgot');
                exit();
            }

            // Hash and update password
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateSuccess = $this->updatePasswordByEmail($email, $hashedPassword);
            if ($updateSuccess) {
                $_SESSION['success'] = 'Mật khẩu thay thành công!.';
                echo '
                    <script>
                    alert("Mật khẩu thay thành công!");
                    window.location.href = "index.php?act=index";
                    </script>';
                exit();
            } else {
                $_SESSION['errors']['general'] = 'Lỗi khi đôi mật khẩu.';
                header('Location: index.php?act=forgot');
                exit();
            }
        }
        include '../views/client/auth/reset-password.php';
    }

    public function changepass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change-password'])) {
            $errors = [];

            $oldPass = $this->getPassword();
            if (empty($_POST['old_pass'])) {
                $errors['old_pass'] = 'Vui lòng nhập mật khẩu cũ';
            }

            if (empty($_POST['new_pass'])) {
                $errors['new_pass'] = 'Vui lòng nhập mật khẩu mới';
            }

            if (empty($_POST['re_pass'])) {
                $errors['re_pass'] = 'Vui lòng nhập lại mật khẩu mới';
            }

            if (!empty($_POST['old_pass']) && !password_verify($_POST['old_pass'], $oldPass)) {
                $errors['old_pass'] = 'Mật khẩu cũ không chính xác';
            }

            if (!empty($_POST['new_pass']) && $_POST['new_pass'] !== $_POST['re_pass']) {
                $errors['re_pass'] = 'Xác nhận mật khẩu mới không chính xác';
            }

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                $_SESSION['error'] = 'Vui lòng kiểm tra lại thông tin';
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $changepass = $this->changpassword($_POST['new_pass']);

            if ($changepass) {
                $_SESSION['success'] = 'Thay đổi mật khẩu thành công';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['error'] = 'Thay đổi mật khẩu thất bại. Vui lòng kiểm tra lại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}
