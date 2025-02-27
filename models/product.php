<?php
require_once '../connect/connect.php';

class Product extends connect
{

    public function GetallRam()
    {
        $sql = 'SELECT * FROM variant_ram';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetallRom()
    {
        $sql = 'SELECT * FROM variant_rom';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetallCategory()
    {
        $sql = 'SELECT * FROM categories';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProducts($name, $image, $price, $sale_price, $category_id, $description)
    {
        $sql = 'INSERT INTO products(name,image, price, sale_price, category_id, description) values(?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image, $price, $sale_price, $category_id, $description]);
    }

    public function addGalleyry($product_Id, $image)
    {
        $sql = 'INSERT INTO product_galleries(product_Id,image) values(?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$product_Id, $image]);
    }

    public function addProductsVariant($price, $sale_price, $quantity, $product_Id, $variant_Ram_Id, $variant_Rom_Id)
    {
        $sql = 'INSERT INTO product_variants(price, sale_price, quantity, product_id, variant_Ram_Id,variant_Rom_Id	) values(?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $quantity, $product_Id, $variant_Ram_Id, $variant_Rom_Id]);
    }

    public function GetLastId()
    {
        return $this->connect()->lastInsertId();
    }


    public function listProduct()
    {
        $sql = 'SELECT 
            products.product_Id as product_id,
            products.name as product_name,
            products.price as product_price,
            products.sale_price as product_sale_price,
            products.image as product_image,
            categories.category_Id as category_id,
            categories.name as category_name,
            product_variants.product_Id as product_variant_id,
            variant_ram.Ram_name as variant_Ram_name,
            variant_rom.Rom_name as variant_Rom_name
            FROM products
            LEFT JOIN categories ON products.category_id = categories.category_Id
            LEFT JOIN product_variants ON products.product_Id = product_variants.product_Id
            LEFT JOIN variant_ram ON product_variants.variant_Ram_Id = variant_ram.variant_Ram_Id
            LEFT JOIN variant_rom ON product_variants.variant_Rom_Id = variant_rom.variant_Rom_Id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $listPR = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $groupProduct = [];
        // Lặp qua từng sản phẩm trong danh sách listSP
        foreach ($listPR as $product) {
            if (!isset($groupProduct[$product['product_id']])) {
                $groupProduct[$product['product_id']] = $product;
                $groupProduct[$product['product_id']]['variants'] = [];
            }
            // Thêm các biến thể ROM,RAM,.. vào trong mảng variants[]
            $groupProduct[$product['product_id']]['variants'][] = [
                'product_id' => $product['product_id'],
                'product_variant_ram' => $product['variant_Ram_name'],
                'product_variant_rom' => $product['variant_Rom_name'],
            ];
        }
        return $groupProduct;
    }



    public function getProductById($product_id)
    {
        $sql = 'SELECT
        products.product_Id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,
        products.description as product_description,
        categories.category_Id as category_id,
        categories.name as category_name,
        product_variants.product_Id as product_variant_id,
        product_variants.product_variant_Id as variant_id,
        product_variants.price as variant_price,
        product_variants.sale_price as variant_sale_price,
        product_variants.quantity as variant_quantity,
        product_galleries.image as product_galleries_image,
        variant_ram.Ram_name as variant_Ram_name,
        variant_rom.Rom_name as variant_Rom_name
    FROM products
    LEFT JOIN categories ON products.category_id = categories.category_Id
    LEFT JOIN product_variants ON products.product_id = product_variants.product_id
    LEFT JOIN product_galleries ON products.product_id = product_galleries.product_id
    LEFT JOIN variant_ram ON product_variants.variant_Ram_Id = variant_ram.variant_Ram_Id
    LEFT JOIN variant_rom ON product_variants.variant_Rom_Id = variant_rom.variant_Rom_Id
    WHERE products.product_Id = ?';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        $listPR = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $groupProduct = [];
        // Lặp qua từng sản phẩm trong danh sách listSP
        foreach ($listPR as $product) {
            if (!isset($groupProduct[$product['product_id']])) {
                $groupProduct[$product['product_id']] = $product;
                $groupProduct[$product['product_id']]['variants'] = [];
                $groupProduct[$product['product_id']]['galleries'] = [];
            }
            // Thêm các biến thể ROM, RAM vào trong mảng variants[]
            $exists = false;
            foreach ($groupProduct[$product['product_id']]['variants'] as $variant) {
                if (
                    $variant['variant_Ram_name'] == $product['variant_Ram_name'] &&
                    $variant['variant_Rom_name'] == $product['variant_Rom_name']
                ) {
                    $exists = true;
                    break;
                }
            }
            if (!$exists) {
                $groupProduct[$product['product_id']]['variants'][] = [
                    'variant_id' => $product['variant_id'],
                    'variant_Ram_name' => $product['variant_Ram_name'],
                    'variant_Rom_name' => $product['variant_Rom_name'],
                    'product_variant_price' => $product['variant_price'],
                    'product_variant_sale_price' => $product['variant_sale_price'],
                    'product_variant_quantity' => $product['variant_quantity'],
                ];
            }

            // Kiểm tra nếu có ảnh trong bảng product_galleries và thêm vào danh sách ảnh
            if (!empty($product['product_galleries_image'])) {
                // Chắc chắn rằng galleries là mảng
                if (!in_array($product['product_galleries_image'], $groupProduct[$product['product_id']]['galleries'])) {
                    $groupProduct[$product['product_id']]['galleries'][] = $product['product_galleries_image'];
                }
            }
        }
        return $groupProduct;
    }

    public function newProducts(){
        $sql = 'SELECT * FROM products ORDER BY product_Id DESC LIMIT 10';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function MostViewedPro(){
        $sql = 'SELECT * FROM products ORDER BY views DESC LIMIT 10';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function getProductVariantById($product_id)
    {
        $sql = 'SELECT
            product_variants.product_variant_Id as product_variant_id,
            product_variants.price as variant_price,
            product_variants.sale_price as variant_sale_price,
            product_variants.quantity as variant_quantity,
            variant_rom.variant_Rom_Id as variant_Rom_id,
            variant_ram.variant_Ram_Id as variant_ram_id,
            variant_ram.Ram_name as variant_Ram_name,
            variant_rom.Rom_name as variant_Rom_name,
            product_variants.price as product_price,
            product_variants.price as product_price
            FROM product_variants
            LEFT JOIN variant_ram ON product_variants.variant_Ram_Id = variant_ram.variant_Ram_Id
            LEFT JOIN variant_rom ON product_variants.variant_Rom_Id = variant_rom.variant_Rom_Id
            WHERE product_variants.product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getProductGalleyryById()
    {
        $sql = 'SELECT * FROM product_galleries WHERE product_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Cập nhật sản phẩm
    public function updateProduct($name, $image, $price, $sale_price, $category_id, $description, $product_id)
    {
        $sql = 'UPDATE products SET name = ?, image = ?, price = ?, sale_price = ?, category_id = ?, description = ? WHERE product_id = ?';
        $stmt = $this->connect()->prepare($sql);

        // Trả về true nếu execute() thành công, ngược lại false
        return $stmt->execute([$name, $image, $price, $sale_price, $category_id, $description, $product_id]);
    }

    public function updateProductVariant($product_variant_id, $product_id, $price, $sale_price, $variant_Ram_Id, $variant_Rom_Id, $quantity)
    {
        $sql = 'UPDATE product_variants SET product_id =?, price =?, sale_price=?, variant_Ram_Id=?, variant_Rom_Id=?, quantity=? WHERE product_variant_id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id, $price, $sale_price, $variant_Ram_Id, $variant_Rom_Id, $quantity, $product_variant_id]);
    }

    public function removeGallery()
    {
        $sql = 'DELETE FROM product_galleries WHERE product_galleries_Id  = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['gallery_id']]);
    }

    public function getGallery()
    {
        $sql = 'SELECT image FROM product_galleries WHERE product_galleries_Id  = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['gallery_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function removeProductVariant()
    {
        $sql = 'DELETE FROM product_variants WHERE product_variant_id  = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['variant_id']]);
    }

    public function removeProduct()
    {
        $sql = 'DELETE FROM products WHERE product_Id  = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['id']]);
    }
    public function searchProduct($keyword){
        $sql = 'select 
        products.product_Id as product_Id,
        products.name as name,
        products.image as image,
        products.price as price,
        products.sale_price as sale_price,
        categories.name	 as cate_name
        from products
        left join categories on products.category_id = categories.category_Id
        where lower(products.name) like lower(?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['%'.$keyword. '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
