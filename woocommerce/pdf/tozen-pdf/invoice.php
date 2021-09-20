<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php do_action( 'wpo_wcpdf_before_document', $this->type, $this->order ); ?>


<?php 
// ลิงก์นี้ดีมาก 
// https://stackoverflow.com/questions/39401393/how-to-get-woocommerce-order-details

$order = $this->order;
$order_data = $order->get_data();

echo $order_meta['_installation_date'][13];
?>


<table class="head container">
	<tr>
		<td class="header">
			<?php
			if( $this->has_header_logo() ) {
				$this->header_logo();
			} else {
				echo $this->get_title();
			}
			?><br>
			<div class="shop-name"><h3><?php $this->shop_name(); ?></h3></div>
			<div class="shop-address"><?php $this->shop_address(); ?></div>
		</td>
		<td class="shop-info">
			
			<table>



				<?php do_action( 'wpo_wcpdf_before_order_data', $this->type, $this->order ); ?>
					<?php if ( isset($this->settings['display_number']) ) { ?>
						<tr class="invoice-number">
							<th>เลขที่เอกสาร:</th>
							<td><?php $this->invoice_number(); ?></td>
						</tr>
					<?php } ?>
					<tr class="order-number">
						<th>รหัสการสั่งซื้อ:</th>
						<td><?php $this->order_number(); ?></td>
					</tr>
					<tr class="order-date">
						<th>วันที่สั่งซื้อ:</th>
						<td><?php $this->order_date(); ?></td>
					</tr>
					<tr class="payment-method">
						<th>การชำระเงิน:</th>
						<td><?php $this->payment_method(); ?></td>
					</tr>
					<?php do_action( 'wpo_wcpdf_after_order_data', $this->type, $this->order ); ?>
				
				


			</table>

		</td>
	</tr>
</table>

<h1 class="document-type-label">
	ใบสรุปการสั่งซื้อ
</h1>

<?php do_action( 'wpo_wcpdf_after_document_label', $this->type, $this->order ); ?>

<table class="order-data-addresses">
	<tr>
		<td class="address billing-address">
			<?php do_action( 'wpo_wcpdf_before_billing_address', $this->type, $this->order ); ?>
			<h3>ข้อมูลผู้ซื้อ</h3>
			<?php //echo $order_data['billing']['first_name'] . ' ' . $order_data['billing']['last_name']; ?>
			<?php $this->billing_address(); ?>
			<?php do_action( 'wpo_wcpdf_after_billing_address', $this->type, $this->order ); ?>
			<?php if ( isset($this->settings['display_email']) ) { ?>
				<div class="billing-email"><?php $this->billing_email(); ?></div>
			<?php } ?>
			<?php if ( isset($this->settings['display_phone']) ) { ?>
				<div class="billing-phone"><?php $this->billing_phone(); ?></div>
			<?php } ?>
		</td>
		<td class="address shipping-address">
			<?php if ( isset($this->settings['display_shipping_address']) && $this->ships_to_different_address()) { ?>
				<h3>สถานที่จัดส่ง:</h3>
				<?php do_action( 'wpo_wcpdf_before_shipping_address', $this->type, $this->order ); ?>
				<?php $this->shipping_address(); ?>
				<?php do_action( 'wpo_wcpdf_after_shipping_address', $this->type, $this->order ); ?>
			<?php } ?>
		</td>
	</tr>
</table>

<?php do_action( 'wpo_wcpdf_before_order_details', $this->type, $this->order ); ?>

<table class="order-details">
	<thead>
		<tr>
			<th class="product">สินค้า</th>
			<th class="quantity">จำนวน</th>
			<th class="price">ราคา</th>
		</tr>
	</thead>
	<tbody>
		<?php $items = $this->get_order_items(); if( sizeof( $items ) > 0 ) : foreach( $items as $item_id => $item ) : ?>
		<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', $item_id, $this->type, $this->order, $item_id ); ?>">
			<td class="product">
				<?php $description_label = __( 'Description', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
				<span class="item-name"><?php echo $item['name']; ?></span>
				<?php do_action( 'wpo_wcpdf_before_item_meta', $this->type, $item, $this->order  ); ?>
				<span class="item-meta"><?php echo $item['meta']; ?></span>
				<dl class="meta">
					<?php $description_label = __( 'SKU', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
					<?php if( !empty( $item['sku'] ) ) : ?><dt class="sku"><?php _e( 'SKU:', 'woocommerce-pdf-invoices-packing-slips' ); ?></dt><dd class="sku"><?php echo $item['sku']; ?></dd><?php endif; ?>
					
				</dl>
				<?php do_action( 'wpo_wcpdf_after_item_meta', $this->type, $item, $this->order  ); ?>
			</td>
			<td class="quantity"><?php echo $item['quantity']; ?></td>
			<td class="price"><?php echo $item['order_price']; ?></td>
		</tr>
	<?php endforeach; endif; ?>
</tbody>
<tfoot>
	<tr class="no-borders">
		<td class="no-borders">
			<div class="customer-notes">
				<?php do_action( 'wpo_wcpdf_before_customer_notes', $this->type, $this->order ); ?>
				<?php if ( $this->get_shipping_notes() ) : ?>
					<h3><?php _e( 'Customer Notes', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
					<?php $this->shipping_notes(); ?>
				<?php endif; ?>
				<?php do_action( 'wpo_wcpdf_after_customer_notes', $this->type, $this->order ); ?>
			</div>				
		</td>
		<td class="no-borders" colspan="2">
			<table class="totals">
				<tfoot>
					<?php foreach( $this->get_woocommerce_totals() as $key => $total ) : ?>
						<tr class="<?php echo $key; ?>">
							<td class="no-borders"></td>
							<th class="description"><?php echo $total['label']; ?></th>
							<td class="price"><span class="totals-price"><?php echo $total['value']; ?></span></td>
						</tr>
					<?php endforeach; ?>
				</tfoot>
			</table>
		</td>
	</tr>
</tfoot>
</table>

<?php do_action( 'wpo_wcpdf_after_order_details', $this->type, $this->order ); ?>

<?php if ( $this->get_footer() ): ?>
	<div id="footer">
		<?php $this->footer(); ?>
	</div><!-- #letter-footer -->
<?php endif; ?>
<?php do_action( 'wpo_wcpdf_after_document', $this->type, $this->order ); ?>
