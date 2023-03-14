
import axios from 'axios';

export default {
    methods: {

        async callApi(method, url, dataObj, params = {}) {
            try {
                let res = await axios({
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    method: method,
                    url: url,
                    data: dataObj,
                    params: params,
                })

                if (res.data.message) { this.s(res.data.message) };
                return res

            } catch (e) {
                let res = e.response;
                if (res.status == 404 || res.status == 401 || res.status == 400) {
                   if(res.data.message) this.w(res.data.message)
                }else if (res.status == 422 || res.status == 400) {
                    for (let key in res.data.errors) {
                        this.i(res.data.errors[key][0])
                    }
                }
                else{
                  this.swr();
                }
                return res;
            }
        },

        i(msg, i = 'Hey !') {
            this.$Notice.info({
                title: i,
                desc: msg,
            });
        },
        s(msg, i = 'Great!') {
            this.$Notice.success({
                title: i,
                desc: msg
            });
        },
        w(msg, i = 'Hey!') {
            this.$Notice.warning({
                title: i,
                desc: msg
            });
        },

        e(msg, i = 'Oops!') {
            this.$Notice.error({
                title: i,
                desc: msg
            });
        },
        swr() {
            this.$Notice.error({
                title: 'Oops',
                desc: 'Something went wrong, please try again later. 😨😨😨'
            });
        },
        ns(title) {
            this.$Message.success(title);
        },
        ni(title) {
            this.$Message.info(title);
        },
        nw(title) {
            this.$Message.warning(title);
        },
        ne(title) {
            this.$Message.error(title);
        },
        nswr() {
            this.$Message.error('Something went wrong, please try again later');
        },



    }
}
