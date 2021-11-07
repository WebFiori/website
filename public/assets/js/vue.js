new Vue({
    el:'#app',
    vuetify: new Vuetify({
        theme: {
            //dark:window.data.dark,
            themes: {
                light: {
                    primary:'#cae881'
                },
                dark:{
                    primary:'#7fbf21'
                }
            }
        }
    })
});