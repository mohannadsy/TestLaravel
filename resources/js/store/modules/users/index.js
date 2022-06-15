import mutations from './mutation.js';
import actions from './actions.js';
import getters from './getters.js';

export default {
    namespaced: true,
    state() {
        users: [{
            id: '',
            name: '',
            code: '',
            email: '',
            email_verified_at: '',
            password: '',
            branch_name: '',
            role: '',
            branch_id: '',
            first_name: '',
            middle_name: '',
            last_name: '',
            phone: '',
            id_number: '',
            current_team_id: '',
            profile_photo_path: '',
            mobile: ''
        }]
    },
    mutations,
    actions,
    getters
}
