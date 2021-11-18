<h2>Request By</h2>

<table class="wp-list-table widefat fixed striped table-view-list posts">
    <tr>
        <th>Name</th>
        <th><?= $requests[0]->name; ?></th>
    </tr>
    <tr>
        <th>Email</th>
        <th><?= $requests[0]->email; ?></th>
    </tr>
    <tr>
        <th>Phone</th>
        <th><?= $requests[0]->phone; ?></th>
    </tr>
    <tr>
        <th>Address</th>
        <th><?= $requests[0]->address; ?></th>
    </tr>
    <tr>
        <th>Post Code</th>
        <th><?= $requests[0]->post_code2; ?></th>
    </tr>
    <tr>
        <th>Message</th>
        <th><?= $requests[0]->message; ?></th>
    </tr>
</table>

<h2>Details</h2>
<table class="wp-list-table widefat fixed striped table-view-list posts">
    <tr>
        <th>Property Type</th>
        <th><?= $requests[0]->property; ?></th>
    </tr>
    <tr>
        <th>No of panel</th>
        <th><?= $requests[0]->panel; ?></th>
    </tr>
    <tr>
        <th>Installation</th>
        <th><?= ( $requests[0]->is_install == 0 ) ? 'Yes':  'No'; ?></th>
    </tr>
    <tr>
        <th>Installation Date</th>
        <th><?= $requests[0]->installation_date; ?></th>
    </tr>
    <tr>
        <th>No. of elevations</th>
        <th><?= $requests[0]->elevation; ?></th>
    </tr>
    <tr>
        <th>Shading</th>
        <th><?= $requests[0]->shading; ?></th>
    </tr>
    <tr>
        <th>Post Code</th>
        <th><?= $requests[0]->post_code1; ?></th>
    </tr>
</table>
<?php

$totalCost           = 0;
$inverterPrice       = 0;
$installationPrice   = 400;
$panel_no = $requests[0]->panel;

if( $requests[0]->is_install == 1 ){
    $installationPrice = 0;
}

if( $panel_no >= 1 && $panel_no <= 5 ){
    
    $totalCost       = 997 + $installationPrice;
    $panelprice      = 997;
    $inverterPrice   = 0;

}else if( $panel_no >= 6 && $panel_no <= 8 ){

    $totalCost       = ( ( $panel_no ) * 95 ) + 1155 + $installationPrice;
    $panelprice      = ( $panel_no ) * 95;
    $inverterPrice   = 1155;


}else if( $panel_no >= 9 && $panel_no <= 12 ){
    
    $totalCost       = ( $panel_no * 95 ) + 1260 + $installationPrice;
    $panelprice      = ( $panel_no ) * 95;
    $inverterPrice   = 1260;

}else if( $panel_no >= 13 && $panel_no <= 15 ){
    
    $totalCost       = ( ( $panel_no ) * 95 ) + 1365 + $installationPrice;
    $panelprice      = ( $panel_no ) * 95;
    $inverterPrice   = 1365;
    
}else if( $panel_no >= 16 && $panel_no <= 18 ){
    
    $totalCost       = ( ( $panel_no ) * 95 ) + 1449 + $installationPrice;
    $panelprice      = ( $panel_no ) * 95;
    $inverterPrice   = 1449;
    
}
?>
<h2>Prices</h2>
<table class="wp-list-table widefat fixed striped table-view-list posts">
    <tr>
        <th>Panel</th>
        <th><?= $panelprice; ?></th>
    </tr>
    <tr>
        <th>Inverter</th>
        <th><?= $inverterPrice; ?></th>
    </tr>
    <tr>
        <th>Installation</th>
        <th><?= $installationPrice; ?></th>
    </tr>
    <tr>
        <th>
            <b>Total</b>
        </th>
        <th>
            <b><?= '£ '.$totalCost; ?></b>
        </th>
    </tr>

</table>