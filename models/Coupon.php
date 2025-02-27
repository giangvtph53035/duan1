<?php
require_once '../connect/connect.php';
class Coupon extends connect
{

    public function listCoupon()
    {
        $sql = 'SELECT * FROM coupons';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCoupon($name, $coupon_type, $coupon_code, $coupon_value, $start_date, $end_date, $quantity, $status)
    {
        $sql = "INSERT INTO coupons (name, coupon_type, coupon_code, coupon_value, start_date, end_date, quantity, status, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupon_type, $coupon_code, $coupon_value, $start_date, $end_date, $quantity, $status]);
    }

    public function editCoupon()
    {
        $sql = 'SELECT * From coupons WHERE coupon_Id =?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['coupon_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCoupon($name, $coupon_type, $coupon_code, $coupon_value, $start_date, $end_date, $quantity, $status)
    {
        $sql = 'update coupons set name = ?, coupon_type = ?,coupon_code = ?,coupon_value = ?,
        start_date = ?,end_date = ?, quantity = ?, status = ?  ,updated_at = now() WHERE coupon_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupon_type, $coupon_code, $coupon_value, $start_date, $end_date, $quantity, $status, $_GET['coupon_id']]);
    }

    public function deleteCoupon()
    {
        $sql = 'DELETE From coupons WHERE coupon_Id =? ';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['coupon_id']]);
    }
}
