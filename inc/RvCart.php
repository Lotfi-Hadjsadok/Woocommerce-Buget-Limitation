<?php


namespace Inc;

class RvCart
{
    static function add_validation($pass, $product_id, $quantity)
    {
        global $woocommerce;
        $product = wc_get_product($product_id);
        $cart_total = $woocommerce->cart->total;
        if ($product->get_price() * $quantity + $cart_total <=  carbon_get_user_meta(get_current_user_id(), 'user_budget')) {
            return $pass;
        }
        wc_add_notice('Not enough budget !', 'error');
        return false;
    }
    static function update_validation($pass, $cart_item_key, $values, $quantity)
    {
        global $woocommerce;
        $product = wc_get_product($values['product_id']);
        $cart_total = WC()->cart->total;
        if ($product->get_price() * ($quantity - $values['quantity']) + $cart_total  <= carbon_get_user_meta(get_current_user_id(), 'user_budget')) {
            $woocommerce->cart->set_quantity($cart_item_key, $quantity);
            return $pass;
        }

        wc_add_notice(__("Not enough budget ! $product->name Not added"), 'error');

        return false;
    }
    static function budget_consume()
    {
        global $woocommerce;
        $cart_total = $woocommerce->cart->total;
        $user_budget = carbon_get_user_meta(get_current_user_id(), 'user_budget');
        carbon_set_user_meta(get_current_user_id(), 'user_budget', $user_budget - $cart_total);
    }
}
