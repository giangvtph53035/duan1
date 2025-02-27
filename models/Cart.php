<?php
require_once '../connect/connect.php';
class Cart extends connect
{

    public function addToCart($user_Id, $product_id, $variant_id, $quantity)
    {

        $sql = 'INSERT INTO carts(user_Id,product_id,variant_id,quantity) VALUES(?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$user_Id, $product_id, $variant_id, $quantity]);
    }


    public function GetallCarts()
    {
        $sql = 'SELECT
        carts.cart_Id as cart_id,
        products.product_Id as product_id,
        products.name as pr_name,
        products.image as pr_image,
        product_variants.product_variant_Id as variant_id,
        product_variants.price as pr_variant_price,
        product_variants.sale_price as pr_variant_sale_price,
        variant_ram.Ram_name as variant_ram_name,
        variant_rom.Rom_name as variant_rom_name,
        carts.quantity as cart_quantity
        From carts
        left join products on carts.product_id = products.product_Id
        left join product_variants on product_variants.product_variant_Id = carts.variant_id
        left join variant_ram on product_variants.variant_Ram_id = variant_ram.variant_Ram_Id
        left join variant_rom on product_variants.variant_Rom_id = variant_rom.variant_Rom_id
        WHERE carts.user_Id = ?
         ';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_Id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkCart()
    {
        $sql = 'select * from carts where user_Id = ? and product_id = ? and variant_id = ? ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_Id'], $_POST['product_id'], $_POST['variant_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCart($quantity, $user_Id, $product_id, $variant_id)
    {
        $sql = 'update carts set quantity = ? where user_Id = ? and product_id =? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $user_Id, $product_id, $variant_id]);
    }

    public function updateCartById($cart_Id, $quantity)
    {
        $sql = 'update carts set quantity = ? where cart_Id = ? ';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $cart_Id]);
    }

    public function deleteCart($cart_Id){
        $sql = 'delete From carts where cart_Id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$cart_Id]);
    }

    public function getCouponCode($coupon_code ){
        $sql = 'select * From coupons where coupon_code = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$coupon_code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}
