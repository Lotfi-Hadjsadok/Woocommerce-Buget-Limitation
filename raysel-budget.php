<?php

/**
 * Plugin Name: Raysel Budget
 * Description: Buy with Budget Woocommerce
 * Author: Lotfi HS
 * Author URI: https://www.facebook.com/lotfihadjsadok.dev/
 * Text Domaine: raysel-budget 
 */

if (!defined('ABSPATH')) die();
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


use Inc\RvBudget;
use Carbon_Fields\Carbon_Fields;
use Inc\RvCart;

class RayselBudget
{
    function __construct()
    {

        add_action('after_setup_theme', array($this, 'crb_load'));
        add_action('carbon_fields_register_fields', array($this, 'custom_meta'));
        add_filter('woocommerce_add_to_cart_validation', array($this, 'cart_validation'), 10, 3);
        add_filter('woocommerce_update_cart_validation', array($this, 'update_cart_validation'), 10, 4);
        add_action('woocommerce_checkout_order_processed', array($this, 'budget_consume'));
    }

    function woo_not_active()
    {
?>
        <div class="notice notice-error">
            <p>Woocommerce is not active !</p>
        </div>
<?php
    }
    function crb_load()
    {
        Carbon_Fields::boot();
    }
    function custom_meta()
    {
        RvBudget::add_field();
    }
    function cart_validation($pass, $product_id, $quantity)
    {
        return RvCart::add_validation($pass, $product_id, $quantity);
    }
    function update_cart_validation($pass, $cart_item_key, $values, $quantity)
    {
        return RvCart::update_validation($pass, $cart_item_key, $values, $quantity);
    }
    function budget_consume()
    {
        RvCart::budget_consume();
    }
}
new RayselBudget();
