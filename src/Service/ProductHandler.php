<?php
    
    namespace App\Service;
    
    class ProductHandler
    {
        //计算商口总价
        public function getTotalPrice (array $products)
        {
            $totalPrice = 0;
            foreach($products as $product)
            {
                $price      = $product['price']?: 0;
                $totalPrice += $price;
            }
            
            return $totalPrice;
        }
        
        //排序方法1
        public function sortProducts (array $products,string $type,string $orderby = 'asc'): array
        {
            $result = [];
            $prices = [];
            //循环查找结果
            foreach($products as $p)
            {
                if(strtolower( $p['type'] ) == strtolower( $type ))
                {
                    $result[] = $p;
                    $prices[] = $p['price'];
                }
            }
            
            //排序方式
            $orderby = strtolower( $orderby ) == 'asc'? SORT_ASC : SORT_DESC;
            //排序
            array_multisort( $prices,$orderby,$result );
            
            return $result;
        }
        
        //排序方法2
        //public function sortProducts (array $products,string $type,string $orderby = 'asc'): array
        //{
        //    $result = [];
        //    //循环查找结果
        //    foreach($products as $p)
        //    {
        //        if(strtolower( $p['type'] ) == strtolower( $type ))
        //        {
        //            $result[] = $p;
        //        }
        //    }
        //
        //    usort( $result,function ($a,$b) use ($orderby) {
        //
        //        if($a['price'] == $b['price'])
        //        {
        //            return 0;
        //        }
        //
        //        if(strtolower( $orderby ) == 'asc')
        //        {
        //            return $a['price'] - $b['price'] > 0;
        //        }
        //
        //        return $b['price'] - $a['price'] > 0;
        //    } );
        //
        //
        //    return $result;
        //}
        
        //创建日期转换时间
        public function createToTime (array $products): array
        {
            foreach($products as &$product)
            {
                $product['create_at'] = strtotime( $product['create_at'] );
            }
            
            return $products;
        }
    }