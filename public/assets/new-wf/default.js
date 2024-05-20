
if (!window.data) {
    window.data = {
        dark:true,
        snackbar:{
            color:'',
            text:'',
            visible:false
        }
    };
}


/* global Vue, Vuetify */
const { createApp } = Vue;
const { createVuetify } = Vuetify;


const vuetify = createVuetify({
    
});
var app = createApp({
    mixins: [],
    data() {
       return {
            loading:false,
            drawer:false,
            snackbar:window.data.snackbar,
            search_results:[],
            methods_search_results:[],
            docs_search_results:[],
            search_val:'',
            show_search_menu:false,
            mini:false,
       };
    },
    methods:{
        search:function() {
            if (this.search_val.trim().length !== 0) {
                search(this.search_val);
                this.showMenu = true;
            } else {
                this.showMenu = false;
            }
        }
    },
    computed:{
        
    },
    mounted:function() {

    }
});
var app = app.use(vuetify).mount('#app');

function showSnackbar(message, color = '') {
    window.app.snackbar.color = color;
    window.app.snackbar.text = message;
    window.app.snackbar.visible = true;
}