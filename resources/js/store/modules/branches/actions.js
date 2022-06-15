export default {
    registerBranch(context, data) {
        const branchData = {
            id: new Date().toISOString,
            code: data.code,
            name: data.name,
            branch_id: data.branch_id,
            responsibility: data.responsibility,
            address: data.address,
            website: data.website,
            email: data.email,
            phone: data.phone,
            mobile: data.mobile
        };
        context.commit('registerBranch', branchData);
    }
};