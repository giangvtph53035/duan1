<?php
class Reviews extends connect
{
    public function sendReviews($user_id, $product_id, $content)
    {

        $checkPurchaseSql =
            'select count(*) as purchase_count 
            from orders
            join order_details on orders.order_detail_id = order_details.order_details_Id
            where orders.user_id = ? and orders.product_id =? ';
        $checkstmt = $this->connect()->prepare($checkPurchaseSql);
        $checkstmt->execute([$_SESSION['user']['user_Id'], $product_id ]);
        $purchaseResult = $checkstmt->fetch(PDO::FETCH_ASSOC);

        if($purchaseResult['purchase_count'] > 0)
        {
            $sql = 'insert into reviews(user_id, product_id, content, created_at) values (?,?,?,now())';
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$_SESSION['user']['user_Id'], $product_id, $content]);  
        }else{
            return false;
        }
    }
    public function getReviews($product_id){
        $sql = 'select 
        users.name as user_name,
        users.avatar as user_avatar,
        reviews.*
        from reviews 
        join users on users.user_Id = reviews.user_id
        where product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
