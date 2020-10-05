/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


function checkbox(){
    var cbCours = document.getElementById("en-cours");
    var cbDevis = document.getElementById("devis");
    var cbTermine = document.getElementById("termine");

        if (cbCours.checked)
        {
            document.getElementById("label-en-cours").style.opacity="1";
        }
        else
        {
            document.getElementById("label-en-cours").style.opacity="0.2";
        }

        if (cbDevis.checked)
        {
            document.getElementById("label-devis").style.opacity="1";
            document.getElementById("label-devis2").style.opacity="1";
        }
        else
        {
            document.getElementById("label-devis").style.opacity="0.2";
            document.getElementById("label-devis2").style.opacity="0.2";
        }

        if (cbTermine.checked)
        {
            document.getElementById("label-termine").style.opacity="1";
        }
        else
        {
            document.getElementById("label-termine").style.opacity="0.2";
        }
};

