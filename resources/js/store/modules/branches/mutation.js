export default {
    registerBranch(state, payload) {
        state.branches.push(payload);
    },
    newBranch(state, payload) {
        state.branches.push(payload);
    },
    saveUpdatedProduct: (state, branch) => {
        state.branches.unshift(branch)
            //state.updatedData = product;
    },
    setBranches(state, payload) {
        state.branches = payload;
    },
    setResults(state, payload) {
        state.results = payload;
    }

};