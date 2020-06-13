Nova.booting((Vue, router) => {


    //add address filed 4 sub-district,districe,province,postal-code

    //sub-district
    Vue.component('index-input-sub-district', require('./components/InputSubDistrict/IndexField').default);
    Vue.component('detail-input-sub-district', require('./components/InputSubDistrict/DetailField').default);
    Vue.component('form-input-sub-district', require('./components/InputSubDistrict/FormField').default);

    //district
    Vue.component('index-input-district', require('./components/InputDistrict/IndexField').default);
    Vue.component('detail-input-district', require('./components/InputDistrict/DetailField').default);
    Vue.component('form-input-district', require('./components/InputDistrict/FormField').default);

    //province
    Vue.component('index-input-province', require('./components/InputProvince/IndexField').default);
    Vue.component('detail-input-province', require('./components/InputProvince/DetailField').default);
    Vue.component('form-input-province', require('./components/InputProvince/FormField').default);

    //postal-code
    Vue.component('index-input-postal-code', require('./components/InputPostalCode/IndexField').default);
    Vue.component('detail-input-postal-code', require('./components/InputPostalCode/DetailField').default);
    Vue.component('form-input-postal-code', require('./components/InputPostalCode/FormField').default);



})
