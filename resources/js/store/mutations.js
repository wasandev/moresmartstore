let mutations = {

    SET_PRODUCTS(state, products) {
        state.products = products;
    },
    SET_VENDORS(state, vendors) {
        state.vendors = vendors;
    },

    SET_BTYPE(state, btype) {
        state.btype = btype;
    }
};

export default mutations;
