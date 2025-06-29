import axios from 'axios';
import _ from 'lodash';

/**
 * Load the Lodash library
 */
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our backend. This library automatically handles sending the CSRF token
 * as a header based on the value of the "XSRF-TOKEN" cookie.
 */

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
