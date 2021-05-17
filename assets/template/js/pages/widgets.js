"use strict";

// Class definition
var KTWidgets = function() {
  

    // Public methods
    return {
        init: function() {
            // General Controls
            _initChartsWidget1();
            _initChartsWidget2();
        }
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTWidgets;
}

jQuery(document).ready(function() {
    KTWidgets.init();
});
