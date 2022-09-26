<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h3 class="text-muted text-center">Login</h3>
                            <form @submit.prevent="handleLogin" class="form-group">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    v-model="form.username"
                                    placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    v-model="form.password"
                                    placeholder="Password">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-main text-center">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            form: {
                username: null,
                password: null,
            }
        }
    },
    methods: {
        handleLogin() {
            axios.post('http://localhost:8000/api/auth/login', this.form, {})
            .then(res => {
                localStorage.setItem('token', res.data.access_token);
                this.$router.push('/');
            }).catch(err => {
                console.log(err.message);
            });
        }
    }
}
</script>