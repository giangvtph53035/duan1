<?php 
require_once '../connect/connect.php';
class Wishlist extends Connect{
    public function listWishlist(){
        if (!isset($_SESSION['user']['user_Id'])) {
            return false;
        }
        
        $sql = 'SELECT products.*,favorites.* FROM favorites
        LEFT JOIN products ON
        favorites.product_id = products.product_Id
        WHERE favorites.user_id = ?';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_Id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addWishlist(){
        $sql = 'INSERT INTO favorites(user_id,product_Id,quantity,created_at) values(?,?,1,now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_Id'] ?? null,$_GET['product_id']]);
    }
    public function deleteWishlist(){
        $sql = 'DELETE FROM favorites WHERE favorite_Id	 = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['favorite_Id']]);
    }
    public function checkWishlist(){
        $sql = 'SELECT * FROM favorites WHERE user_id = ? AND product_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_Id'] ?? null,$_GET['product_id']]);
        return $stmt->fetch();
    }
}
?>