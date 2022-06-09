define(
    [
        'ko',
        'jquery',
        'uiComponent',
        'mage/url'
    ],
    function (ko, $, Component,url) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Dckap_Agree/checkout/customCheckbox'
            },
            initObservable: function () {

                this._super()
                    .observe({
                        CheckVals: ko.observable(false)
                    });
                var checkVal=0;
                self = this;
                this.CheckVals.subscribe(function (newValue) {
                    var linkUrls  = url.build('agree/checkout/saveInQuote');
                    if(newValue) {
                        checkVal = 1;
                    }
                    else{
                        checkVal = 0;
                    }
                    alert("the value is"+checkVal);
                    alert ("the linkUrls is "+linkUrls);
                    // console.log("the value from console log is",checkVal);
                    $.ajax({
                        showLoader: true,
                        url: linkUrls,
                        data: {checkVal : checkVal},
                        type: "POST",
                        dataType: 'json'
                    }).done(function (data) {
                        console.log('success');
                    });
                });
                return this;
            }
        });
    }
);
