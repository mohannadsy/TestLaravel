import mutations from './mutation.js';
import actions from './actions.js';
import getters from './getters.js';

export default {
    namespaced: true,
    state() {
        return {
            stores: [{
                id: '',
                code: '',
                name: '',
                latin_name: '',
                type: '',
                store_id: '',
                account_id: '',
                address: '',
                store_keeper: '',
                storage_amount: '',
                website: '',
                notes: '',
                is_active: true,
                photo: '',
                security_degree: ''
            }],
        };
    },
    mutations,
    actions,
    getters
}