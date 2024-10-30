import axios from 'axios';
import 'select2/dist/css/select2.css';
import $ from 'jquery'; 
import 'select2';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(document).ready(function() {
    $('select').select2();
});
