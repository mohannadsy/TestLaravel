export default {
    registerBranch(state, payload) {
        state.branches.push(payload);
    },
    setBranches(state, payload) {
        state.branches = payload;
    }
};