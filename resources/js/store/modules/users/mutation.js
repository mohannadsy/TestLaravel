export default {
    addBranch(state, newUser) {
        state.users.push({
            id: newUser.id,
            name: newUser.name,
            code: newUser.code,
            email: newUser.email,
            email_verified_at: newUser.email_verified_at,
            password: newUser.password,
            branch_name: newUser.branch_name,
            role: newUser.role,
            branch_id: newUser.branch_id,
            first_name: newUser.first_name,
            middle_name: newUser.middle_name,
            last_name: newUser.last_name,
            phone: newUser.phone,
            id_number: newUser.id_number,
            current_team_id: newUser.current_team_id,
            profile_photo_path: newUser.profile_photo_path,
            mobile: newUser.mobile,
        })
    }
};