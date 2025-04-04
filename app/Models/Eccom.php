<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteUser extends Model
{
    use HasFactory;
    protected $fillable = ['email_address', 'phone_number', 'password'];

    public function addresses() {
        return $this->hasMany(UserAddress::class, 'user_id');
    }

    public function paymentMethods() {
        return $this->hasMany(UserPaymentMethod::class, 'user_id');
    }
}

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'address_id', 'is_default'];

    public function user() {
        return $this->belongsTo(SiteUser::class, 'user_id');
    }

    public function address() {
        return $this->belongsTo(Address::class, 'address_id');
    }
}

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['unit_number', 'street_number', 'address_line1', 'address_line2', 'city', 'region', 'postal_code', 'country_id'];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['country_name'];
}

class UserPaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'payment_type_id', 'provider', 'account_number', 'expiry_date', 'is_default'];
}

class PaymentType extends Model
{
    use HasFactory;
    protected $fillable = ['value'];
}

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];
}

class ShoppingCartItem extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'product_item_id', 'qty'];
}

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['parent_category_id', 'category_name'];
}

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description', 'product_image'];
}

class ProductItem extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'SKU', 'qty_in_stock', 'product_image', 'price'];
}

class Variation extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name'];
}

class VariationOption extends Model
{
    use HasFactory;
    protected $fillable = ['variation_id', 'value'];
}

class ProductConfiguration extends Model
{
    use HasFactory;
    protected $fillable = ['product_item_id', 'variation_option_id'];
}

class ShopOrder extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'order_date', 'payment_method_id', 'shipping_address', 'shipping_method', 'order_total', 'order_status'];
}

class OrderLine extends Model
{
    use HasFactory;
    protected $fillable = ['product_item_id', 'order_id', 'qty', 'price'];
}

class ShippingMethod extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price'];
}

class OrderStatus extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
}

class UserReview extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'ordered_product_id', 'rating_value', 'comment'];
}

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'discount_rate', 'start_date', 'end_date'];
}

class PromotionCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'promotion_id'];
}

