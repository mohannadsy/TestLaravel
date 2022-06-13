export default {
    addBranch(state, newBranch) {
        state.branches.push({
            id: newBranch.id,
            code: newBranch.code,
            name: newBranch.name,
            branch_id: newBranch.branch_id,
            responsibility: newBranch.responsibility,
            address: newBranch.address,
            website: newBranch.website,
            email: newBranch.email,
            phone: newBranch.phone,
            mobile: newBranch.mobile
        })
    }
};