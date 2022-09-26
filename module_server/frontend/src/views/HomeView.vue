<template>
  <div class="container mt-4 justify-content-center align-items-center">
    <div class="row justify-content-center align-items-center flex-column">
      <div class="mb-3 d-flex justify-content-center" v-if="user.role == 'admin'">
        <button class="btn btn-outline-main rounded fs-5 px-3 py-2 shadow-sm" @click="createBtn = !createBtn">
          <span v-if="createBtn">x</span>
          <span v-else>+</span>
        </button>
      </div>
      <div class="col-md-8 mb-3" v-if="createBtn">
        <div class="card">
          <div class="card-body">
            <div class="container">
              <form @submit.prevent="createPoll" class="form-group">
                  <h3 class="text-muted text-center">Create Poll</h3>
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" v-model="form.title" placeholder="Title">
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                          <label for="description" class="form-label">Description</label>
                          <input type="text" class="form-control" id="description" v-model="form.description" placeholder="Description">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                      <label for="deadline" class="form-label">Deadline</label>
                      <input type="datetime-local" class="form-control" id="deadline" v-model="form.deadline" placeholder="Deadline">
                  </div>
                  <div class="mb-3">
                      <label for="choice" class="form-label">Choice</label>
                      <div v-for="item in choiceCount" :key="item">
                        <input type="text" class="form-control mb-3" id="choice" v-model="form.choices[item - 1]" :placeholder="'Choice ' + item">
                      </div>
                  </div>
                  <div class="d-flex justify-content-between">
                      <button class="btn btn-outline-danger text-center" @click="removeChoice">Remove</button>
                      <button class="btn btn-outline-success text-center" @click="addChoice">Add</button>
                  </div>
                  <div class="d-flex justify-content-center">
                      <button class="btn btn-outline-main text-center">Submit</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4 mb-3" v-for="(poll, index) in polls" :key="index">
          <div class="card shadow-sm">
            <div class="card-body">
              <h4 class="card-title">{{ poll.title }} </h4>
              <span class="text-muted">{{ poll.deadline }}</span>
              <p class="card-text mt-2">{{ poll.description }}</p>
              <router-link :to="{ name: 'show-poll', params: {id: poll.id} }" class="btn btn-outline-main">View</router-link>
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
      token: localStorage.getItem('token'),
      polls: [],
      user: {},
      choiceCount: 2,
      createBtn: false,
      form: {
        title: null,
        description: null,
        deadline: null,
        choices: []
      }
    }
  },
  mounted() {
    this.getUser()
    this.getAll()
  },
  methods: {
    addChoice() {
      this.choiceCount++;
    },
    removeChoice() {
      if (this.choiceCount != 2) {
        this.choiceCount--;
      }
    },
    getUser() {
      axios.get('http://localhost:8000/api/auth/me', {
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      }).then(res => {
        // console.log(res.data);
        this.user = res.data
      }).catch(err => {
        console.log(err.message);
      });
    },
    getAll() {
      axios.get('http://localhost:8000/api/poll', {}
      ).then(res => {
        this.polls = res.data.data;
      }).catch(err => {
        console.log(err.message);
      });
    },
    createPoll() {
      axios.post('http://localhost:8000/api/poll', this.form, {
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      }).then(() => {
          this.getAll();
          this.form.title = null;
          this.form.description = null;
          this.form.deadline = null;
          this.form.choices = [];
      }).catch(err => {
        console.log(err.message);
      });
    }
  },
}
</script>
