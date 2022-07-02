import mutations from './mutation.js';
import actions from './actions.js';
import getters from './getters.js';

export default {
    namespaced: true,
    state() {
        return {
            branches: [{
                id: '',
                code: '',
                name: '',
                branch_id: '',
                responsibility: '',
                address: '',
                website: '',
                email: '',
                phone: '',
                mobile: ''
            }],
            results: 'hello from vuex'
        };
    },
    mutations,
    actions,
    getters
}