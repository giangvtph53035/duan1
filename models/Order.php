<?php
require_once '../connect/connect.php';

class Order extends connect
{
    public function addOrder($product_id, $variant_id, $order_detail_id, $quantity)
    {
        //         $sql = 'insert into orders(user_id, product_id, variant_id, order_detail_id,
        //          quantity,created_at, updated_at ) values(?,?,?,?,?,now(),now())';
        //         $stmt = $this->connect()->prepare($sql);
        //         return $stmt->execute([$_SESSION['user']['user_Id'], $product_id, $variant_id, $order_detail_id, $quantity]);

        // // $sqlUpdate = 'UPDATE product_variants SET quantity = quantity - 1 WHERE product_variant_Id = :variant_id';
        // // $stmt = $pdo->prepare($sqlUpdate); // Chuẩn bị câu lệnh SQL
        // // $stmt->execute(['variant_id' => $variant_id]); // Thực thi câu lệnh và truyền giá trị

        try {
            // Mở transaction
            $this->connect()->beginTransaction();

            $sql = 'INSERT INTO orders(user_id, product_id, variant_id, order_detail_id, 
            quantity, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, NOW(), NOW())';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$_SESSION['user']['user_Id'], $product_id, $variant_id, $order_detail_id, $quantity]);

            $sqlUpdate = 'UPDATE product_variants
                        JOIN orders ON product_variants.product_variant_Id = orders.variant_id
                        SET product_variants.quantity = product_variants.quantity - ?
                        WHERE product_variants.product_variant_Id = ?';
            $stmtUpdate = $this->connect()->prepare($sqlUpdate);
            $stmtUpdate->execute([$quantity, $variant_id]);

            $this->connect()->commit();
            return true;
        } catch (Exception $e) {
            // Rollback nếu xảy ra lỗi
            $this->connect()->rollBack();
            throw $e;
        }
    }

    public function addOrderDetail($name, $email, $phone, $address, $amount, $note,  $coupon_id, $payment_method, $shipping_id)
    {
        $sql = 'insert into order_details(name, email, phone, address, amount, 
        note, user_id, coupon_id, payment_method, shipping_id, created_at, updated_at)
        values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            $name,
            $email,
            $phone,
            $address,
            $amount,
            $note,
            $_SESSION['user']['user_Id'],
            !empty($coupon_id) ? $coupon_id : null,
            $payment_method,
            $shipping_id
        ]);
    }

    public function GetLastId()
    {
        return $this->connect()->lastInsertId();
    }

    public function getAllOrderdetail()
    {
        $sql = 'select * from order_details';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderdetailById()
    {
        $sql = 'select * from order_details where order_details_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_details_Id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getOrderById()
    {
        $sql = 'select 
        orders.*,
        products.name as pr_name,
        products.image as pr_image,
        product_variants.sale_price as variant_sale_price,
        variant_ram.Ram_name as Ram_name,
        variant_rom.Rom_name as Rom_name
        from orders 
        left join products on products.product_Id  = orders.product_id
        left join product_variants on product_variants.product_variant_Id = orders.variant_id
        left join variant_ram on product_variants.variant_Ram_id = variant_ram.variant_Ram_Id
         left join variant_rom on product_variants.variant_Rom_id = variant_rom.variant_Rom_Id
         where orders.order_detail_id =?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_details_Id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponById()
    {
        $sql = 'select 
        coupons.*
        from order_details
        left join coupons on coupons.coupon_Id = order_details.coupon_id
        where order_details.order_details_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_details_Id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getShipById()
    {
        $sql = 'select 
        ships.*
        from order_details
        left join ships on ships.ship_Id = order_details.shipping_id 
        where order_details.order_details_Id =?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_details_Id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // public function updateOrders($status){
    //     $sql = 'update order_details set status = ? where order_details_Id = ?';
    //     $stmt = $this->connect()->prepare($sql);
    //     return $stmt->execute([$status,$_GET['order_details_Id']]);

    // }

    public function updateOrders($status)
    {
        $sql = 'select status from order_details where order_details_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_details_Id']]);
        $currentStatus = $stmt->fetchColumn();

        $allowedStatus = [
            'Pending' => ['Confirmed'],
            'Confirmed' => ['Shipped'],
            'Shipped' => ['Delivered'],
            'Delivered' => []
        ];
        if (!isset($allowedStatus[$currentStatus]) || !in_array($status, $allowedStatus[$currentStatus])) {
            return false;
        }
        $sql = 'update order_details set status = ?, updated_at = now() where order_details_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$status, $_GET['order_details_Id']]);
    }

    // public function deleteOrder(){
    //     $sql = 'delete * from order_details where order_details_Id = ?';
    //     $stmt = $this->connect()->prepare($sql);
    //     return $stmt->execute([$_GET['order_details_Id']]);
    // }

    public function getAllOrderdetailByUserId()
    {
        $sql = 'select * from order_details where user_id =?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_Id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancelOrder()
    {
        $sql = 'update order_details set status = "Canceled", updated_at = now() where order_details_Id = ? ';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['order_details_Id']]);
    }
}
