export default {
    registerUser(state, payload) {
        state.users.push(payload);
    }
};