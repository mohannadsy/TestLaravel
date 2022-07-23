export default {
    registerBranch(state, payload) {
        state.branches.push(payload);
    },
    newBranch(state, payload) {
        state.branches.push(payload);
    },
    setBranches(state, payload) {
        state.branches = payload;
    },
    setResults(state, payload) {
        state.results = payload;
    }

};