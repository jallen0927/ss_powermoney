/**
 * Created by xlin on 15/07/15.
 */
;(function($){

    var $withGasField = $('#Form_CalcForm_WithGas'),
        $gasAmount = $('#GasAmount'),
        $gasAmountField = $('#Form_CalcForm_GasAmount');

        $withGasField.change(function(){
            var _this = this;

            $gasAmount.toggle(500, function(){
                $gasAmountField.prop('disabled', !_this.checked);
                $gasAmountField.prop('required', _this.checked);
            });
        });
    /**
     * For google place auto complete in home page
     */
    (function() {
        var autoComplete,
            addressField = document.getElementById('Form_CalcForm_Address'),
            $suburbField = $('#Form_CalcForm_Suburb'),
            suburb;

        autoComplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */
            addressField,
            {types: ['geocode']});

        addressField.placeholder = '';
        // When the user selects an address from the dropdown,
        // populate the address fields in the form.
        google.maps.event.addListener(autoComplete, 'place_changed', function () {
            suburb = autoComplete.getPlace().address_components[2].long_name;
            $suburbField.val(suburb);
        });
    }());

}(jQuery));