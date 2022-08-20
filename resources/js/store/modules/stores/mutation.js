export default {
    newStore(state, payload) {
        state.stores.push(payload);
    },
    showStore(state, stores) {
        state.stores = stores;
    }
};