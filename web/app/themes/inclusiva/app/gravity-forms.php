<?php

add_filter( 'gform_field_value_num_reclamacion',  __NAMESPACE__ . '\\populate_num_reclamacion' );
function populate_num_reclamacion( $value ) {
    $year = date("Y");

    $form_count = RGFormsModel::get_form_counts(7);

    $unique = $form_count['total'] + 1;
    $unique = str_pad($unique, 3, '0', STR_PAD_LEFT);
    $unique = $unique . '-' . $year;

    return $unique;
}

add_filter( 'gform_field_value_aip__num',  __NAMESPACE__ . '\\populate_aip__num' );
function populate_aip__num( $value ) {
    $year = date("Y");

    $form_count = RGFormsModel::get_form_counts(12);

    $unique = $form_count['total'] + 1;
    $unique = str_pad($unique, 3, '0', STR_PAD_LEFT);
    $unique = 'AIP-' . $unique . '-' . $year;

    return $unique;
}

add_filter( 'gform_field_value_aip__link',  __NAMESPACE__ . '\\populate_aip__link' );
function populate_aip__link( $value ) {
    $weburl = get_bloginfo('url');
    $form_posts = $weburl . '/wp-admin/admin.php?page=gf_entries&id=12';

    return $form_posts;
}

add_filter( 'gform_field_value_fec_reclamacion',  __NAMESPACE__ . '\\populate_fec_reclamacion' );
function populate_fec_reclamacion( $value ) {

    $gf_date = date_i18n('d/m/Y', time());

    return $gf_date;
}

add_filter( 'gform_field_value_gf__produ__correo',  __NAMESPACE__ . '\\populate_gf__produ__correo' );
function populate_gf__produ__correo( $value ) {
	global $post;
	$productores__terms = get_the_terms( get_the_ID($post->ID), 'productor');

	if( !empty($productores__terms) ) {
		$produ__term = array_pop($productores__terms);
		$produ__correo = get_field('produ__correo', $produ__term );
		return $produ__correo;
	}
}

// add_filter( 'gform_currencies',  __NAMESPACE__ . '\\add_pen_currency' );
// function add_pen_currency( $currencies ) {
//     $currencies['PEN'] = array(
//         'name'               => __( 'Sol Peruano', 'gravityforms' ),
//         'symbol_left'        => 'S/ ',
//         'symbol_right'       => '',
//         'symbol_padding'     => ' ',
//         'thousand_separator' => ',',
//         'decimal_separator'  => '.',
//         'decimals'           => 2
//     );

//     return $currencies;
// }
