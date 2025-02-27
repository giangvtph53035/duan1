
<?php
require_once '../models/user.php';
class AuthAdminController extends user
{
    public function isAdmin()
    {
        return isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2;
    }
    public function middleware()
    {
        if (!$this->isAdmin()) {
            if (!isset($_SESSION['error'])) {
                $_SESSION['error'] = 'Bạn không có quyền truy cập. Vui lòng đăng nhập.';
            }
            header('Location: ?act=auth');
            exit();
        }else{
            return true;
        }
    }

    public function signin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['auth'])) {
            $errors = [];
            if(empty($_POST['email'])){
                $errors['email'] = 'Vui lòng nhập email';
            }
            if(empty($_POST['password'])){
                $errors['password'] = 'Password không được để trống';
            }
            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                header('location: ?act=auth');
                exit();
            }

            $auth = $this->auth($_POST['email'], $_POST['password']);
            if ($auth) {
                $_SESSION['user'] = $auth;
                $_SESSION['role_id'] = $auth['role_id'];
                $_SESSION['user_id'] = $auth['id'];
                
                $_SESSION['success'] = 'Đăng nhập thành công';
                header('location: ?act=admin');
                exit();
                
            } else {
                $_SESSION['error'] = 'Đây không phải tài khoản admin';
                unset($_SESSION['user']);
                header('location: ?act=index');
                
                exit();
            }
        }
        include '../views/admin/auth/login.php';
    }
    public function logoutadmin() {
        // unset($_SESSION['user_admin']);
        unset($_SESSION['user']);
        unset($_SESSION['role_id']);
        unset($_SESSION['user_id']);
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>
