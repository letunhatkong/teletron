var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'IWD_Opc/js/model/agreements/place-order-mixin': true,
                'IWD_Opc/js/model/place-order-with-comments-mixin': true
            },
            'Magento_Checkout/js/action/set-payment-information': {
                'IWD_Opc/js/model/payment/place-order-mixin': true
            }
        }
    },
    map: {
        "*": {
            "Magento_Checkout/js/model/shipping-save-processor/default": "IWD_Opc/js/model/shipping-save-processor/default"
        }
    }
};