define([
    'Magento_Ui/js/grid/listing'
], function (Collection) {
    'use strict';

    return Collection.extend({
        defaults: {
            template: 'SR_ModifiedSalesOrderGrid/ui/grid/listing'
        },
        getRowClass: function (row) {
			 var order_status= row.status.toLowerCase();
                return order_status;
        }
    });
});