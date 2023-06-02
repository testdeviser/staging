define([
    'Magento_Ui/js/grid/listing'
], function (Collection) {
    'use strict';

    return Collection.extend({
        defaults: {
            template: 'SR_ModifiedSalesOrderGrid/ui/grid/listing'
        },
        getRowClass: function (row) {

            if(row.status == 'complete') {
                return 'complete';
            } else if(row.status == 'closed') {
                return 'closed';
            } else if(row.status == 'processing') {
                return 'processing';
            } else if(row.status == 'pickedup') {
                return 'pickedup';
            } else if(row.status == 'delivered') {
                return 'delivered';
            } else if(row.status == 'pending_freight_pickup') {
                return 'pending_freight_pickup';
            } else if(row.status == 'pending_delivery') {
                return 'pending_delivery';
            } else if(row.status == 'canceled') {
                return 'canceled';
            } else if(row.status == 'partial_return') {
                return 'partial_return';
            } else if(row.status == 'returned') {
                return 'returned';
            } else if(row.status == 'holded') {
                return 'holded';
            } else if(row.status == 'processing_order') {
                return 'processing_order';
            } else if(row.status == 'waiting') {
                return 'waiting';
            } else if(row.status == 'underreview') {
                return 'underreview';
            } else if(row.status == 'readytoprocess') {
                return 'readytoprocess';
            } else {
                return 'pending';
            }
        }
    });
});
