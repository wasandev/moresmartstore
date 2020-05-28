import NotFound from './components/NotFound';
import BusinessPage from './components/BusinessPage';


export default {
    mode: 'history',

    routes: [
        {
            path: '/classified-*',
            component: NotFound
        },

        {
            path: '/classified/',
            component: BusinessPage
        },
        {
            path: '/classified/:id',
            component: BusinessPage
        },



    ]
};
