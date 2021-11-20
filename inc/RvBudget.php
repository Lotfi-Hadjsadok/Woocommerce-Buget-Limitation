<?php



namespace Inc;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class RvBudget
{
    public static function add_field()
    {
        if (class_exists('woocommerce')) {
            Container::make('user_meta', 'User Budget')
                // ->where('user_role', '!=', 'administrator')
                ->add_fields(array(
                    Field::make('text', 'user_budget')
                        ->set_default_value('1000')
                        ->set_attribute('placeholder', 'User Budget')
                        ->set_attribute('type', 'number')
                ));
        } else {
            add_action('admin_notices', function () {
?>
                <div class="notice notice-error">
                    <p>Woocommerce is not active !</p>
                </div>
<?php
            });
        }
    }
}
