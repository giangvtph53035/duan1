<?php  
require_once '../models/user.php';
class AdUserController extends User{

    public function indexUser(){
        $listUser = $this->listUser();
        include '../views/admin/user/list.php';
    }
}
?>