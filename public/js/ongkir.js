/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/ongkir.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
$('select[name="origin_province"]').on('change', function () {
  var provinceId = $(this).val();
  if (provinceId) {
    jQuery.ajax({
      url: '/api/province/' + provinceId + '/cities',
      type: "GET",
      dataType: "JSON",
      success: function success(data) {
        $('select[name="origin_city"]').empty();
        $.each(data, function (key, value) {
          $('select[name="origin_city"]').append("<option value=\"".concat(key, "\"> ").concat(value, " </option>"));
        });
      }
    });
  } else {
    $('select[name="origin_city"]').empty();
  }
});
$('#destination_city').select2({
  ajax: {
    url: '/api/cities',
    type: "POST",
    dataType: 'JSON',
    delay: 150,
    data: function data(params) {
      return {
        _token: $('meta[name="csrf-token"]').attr('content'),
        search: $.trim(params.term)
      };
    },
    processResults: function processResults(response) {
      return {
        results: response
      };
    },
    cache: true
  }
});
/******/ })()
;