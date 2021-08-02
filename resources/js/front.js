//JS x FrontOffice


// ...webpack.mix.js
// linko front.js
// .js('resources/js/front.js', 'public/js')

// compilo!
// npm run watch

// linko in HTML
// {{-- linko JS FrontOffice  --}}
// <script src=" {{ asset('js/front.js') }}"></script>

// import Vue
window.Vue = require('vue');

// Axios (copiato da bootstrap.js)
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// [1] --- --- ---

// import App
import App from './App.vue';

// impor Router
import router from './router';

// creo istanza di Vue
const app = new Vue(
    {
        el:'#root',
        render: h => h(App),
        // router
        router: router
    }
);
// [1] --- --- ---