<template lang="html">
    <tr>
        <td>
            <input type="text"  class="form-control" v-model="editForm.username" v-if="edit">
            <span v-else>{{ user.username }}</span>
        </td>
        <td>
            <input type="text" class="form-control" v-model="editForm.address" v-if="edit">
            <span v-else>{{ user.address }}</span>
        </td>
        <td>
            <!-- <button type="button" class="btn btn-danger" v-on:click="$emit('delete-user', user)">Delete</button> -->
            <button type="button" class="btn btn-info" v-on:click="editUser" v-if="!edit" >
                Edit
            </button>

            <button type="button" class="btn btn-default" v-on:click="cancelEdit" v-if="edit">
                Cancel
            </button>

            <button type="button" class="btn btn-primary" v-on:click="updateUser(user, editForm)" v-if="edit">
                update
            </button>

            <button type="button" class="btn btn-danger" v-on:click="$emit('delete-user', user)" v-if="!edit">
                Delete
            </button>
        </td>
    </tr>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            edit: false,
            editForm: {
                username: '',
                address: ''
            }
        }
    },
    methods: {
        editUser() {
            this.edit = true;
            this.editForm.username = this.user.username;
            this.editForm.address = this.user.address;
        },
        cancelEdit(){
            this.edit = false;
            this.editForm.username = '';
            this.editForm.address = '';
        },
        updateUser(oldUser, newUser){
            this.$http.patch('/users/' + oldUser.id, newUser).then(response => {
                this.$emit('update-user');
                this.cancelEdit();
                console.log(response.data);
            }, (response) => {
                console.log(response.data);
            });
        }
    }
}
</script>

<style lang="css">
</style>
