
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
window.app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        rtl:window.data.is_rtl,
        theme: {
            //dark:window.data.dark,
            themes: {
                light: {
                    
                }
            }
        }
    }),
    data:{
        loading:false,
        drawer:false,
        snackbar:window.data.snackbar,
        mini:false,
        drawer_md:true,
        name:'',
        search_results:[],
        methods_search_results:[]
    },
    methods:{
        
    }
});
function showSnackbar(message, color = '') {
    window.app.snackbar.color = color;
    window.app.snackbar.text = message;
    window.app.snackbar.visible = true;
}