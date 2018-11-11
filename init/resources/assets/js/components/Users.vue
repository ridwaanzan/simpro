<template lang="html">
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>{{ user.username }</td>
                    <td>{{ user.email }</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                users: []
            }
        },
        created(){
            this.fetchUsers();
        },
        methods: {
            fetchUsers() {
                this.$http.get('/users').then(response => {
                    this.users = response.data.users;
                });
            }
        }
    }
</script>