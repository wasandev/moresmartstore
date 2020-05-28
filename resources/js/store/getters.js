let getters = {
    products: state => {
        return state.products;
    },
    vendors: state => {
        return state.vendors;
    },

    btype: state => {
        return state.btype;
    }

};

export default getters;
