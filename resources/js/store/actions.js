let actions = {
    SEARCH_PRODUCTS({commit}, query) {
        let params = {
            query
        };
        axios.get('/api/search', {params})
            .then(res => {
                if (res.data === 'ok')
                    console.log('request sent successfully');

            }).catch(err => {
            console.log(err);
        });
    },
    GET_PRODUCTS({commit}) {


        axios.get('/api/products')
            .then(res => {
                {
                    commit('SET_PRODUCTS', res.data);
                }
            })
            .catch(err => {
                console.log(err);
            });
    },
    SEARCH_VENDORS({commit}, query) {
        let params = {
            query
        };
        axios.get('/api/searchvendor', {params})
            .then(res => {
                if (res.data === 'ok')
                    console.log('request sent successfully');

            }).catch(err => {
            console.log(err);
        });
    },

    GET_VENDORS({commit} ,businesstype) {
        let params = {

            businesstype
        };

        axios.get('/api/classified', {params})
            .then(res => {
                {
                    commit('SET_VENDORS', res.data);
                }
            })
            .catch(err => {
                console.log(err);
            });
    },
    GET_BTYPE({commit} ,businesstype) {
        let params = {
            businesstype
        };

        axios.get('/api/btype', {params})
            .then(res => {
                {
                    commit('SET_BTYPE', res.data);
                }
            })
            .catch(err => {
                console.log(err);
            });
    }
};

export default actions;
