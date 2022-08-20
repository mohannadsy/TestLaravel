import { createStore } from "vuex";

import branchesModule from './modules/branches/index.js';
import usersModule from './modules/users/index.js';
import storeModule from './modules/stores/index.js';

const store = createStore({
    modules: {
        branches: branchesModule,
        users: usersModule,
        stores: storeModule
    }
});

export default store;