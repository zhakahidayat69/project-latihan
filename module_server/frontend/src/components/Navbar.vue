<template>
    <nav class="navbar navbar-expand-sm navbar-light shadow">
          <div class="container">
            <a class="navbar-brand fs-3 fw-bold" href="/">Poll</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/login" class="nav-link">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" @click="handleLogout">Logout</a>
                    </li>
                </ul>
            </div>
      </div>
    </nav>
</template>

<style scoped>
nav a {
    color: #38416F;
}
</style>

<script>
import axios from 'axios'
export default {
    methods: {
        handleLogout() {
            const token = localStorage.getItem('token');
            axios.get('http://localhost:8000/api/auth/logout', {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            }).then(res => {
                localStorage.removeItem('token');
                this.$router.push('/login');
            }).catch(err => {
                console.log(err.message);
            });
        }
    }
}
</script>