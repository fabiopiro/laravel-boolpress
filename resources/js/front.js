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

// [1] --- --- ---

// import App
import App from './App.vue';

// creo istanza di Vue
const app = new Vue(
    {
        el:'#root',
        render: h => h(App)
    }
);
// [1] --- --- ---