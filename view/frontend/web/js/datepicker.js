define([
    'jquery',
    'mage/calendar'
], function ($) {
    'use strict';

    return function (config, element) {
        var $element = $(element);
        
        // Initialize the datepicker with Magento's calendar widget
        $element.calendar({
            dateFormat: config.dateFormat || 'mm/dd/yy',
            showsTime: config.showTime || false,
            timeFormat: config.timeFormat || 'HH:mm',
            buttonImage: config.buttonImage || '',
            buttonImageOnly: config.buttonImageOnly || false,
            buttonText: config.buttonText || 'Select Date',
            minDate: config.minDate || null,
            maxDate: config.maxDate || null,
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: config.yearRange || 'c-10:c+10'
        });

        // Handle option change for price calculation
        $element.on('change', function () {
            var value = $(this).val();
            if (value) {
                // Trigger custom option change event for price recalculation
                $element.trigger('change');
            }
        });

        // Initialize validation if required
        if (config.required) {
            $element.addClass('required-entry');
        }
    };
});