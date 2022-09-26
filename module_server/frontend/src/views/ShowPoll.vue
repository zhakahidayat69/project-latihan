<template>
    <div class="container justify-content-center align-items-center mt-5" v-if="poll">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header">
                        <router-link to="/" class="btn btn-outline-success">Back</router-link>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <h4 class="card-title">{{ poll.title }}</h4>
                            <p class="card-text text-muted">{{ poll.deadline }}</p>
                            <p class="card-text">{{ poll.description }}</p>
                            <form @submit.prevent="handleVote" v-if="!isVoted">
                                <div class="form-check" v-for="choice in stageChoices" :key="choice.id">
                                    <input type="radio" name="choices" id="choices" :value="choice.id" v-model="choices" class="form-check-input">
                                    <label for="choices" class="form-check-label">{{ choice.choice }}</label>
                                </div>
                                <button class="btn btn-outline-main mt-3">Vote</button>
                            </form>
                        </div>
                        <div class="container my-3" v-if="isVoted">
                            <div class="mb-3" v-for="res in results" :key="res.id">
                                <div class="progress-grey">
                                    <div class="progress-blue" :style="'width:' + res.point + '%;'"></div>
                                </div>
                                <p class="card-text">{{ res.choice }} - {{ res.point }}%</p>
                            </div>
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
    props: ['id'],
    data() {
        return {
            token: localStorage.getItem('token'),
            poll: null,
            isVoted: false,
            stageChoices: [],
            results: [],
            choices: null
        }
    },
    mounted() {
        this.getPoll()
    },
    methods: {
        getPoll() {
            axios.get("http://localhost:8000/api/poll/" + this.id, {
                headers: {
                    "Authorization": `Bearer ${this.token}`
                }
            }).then(res => {
                this.poll = res.data;
                this.isVoted = res.data.isVoted;
                this.stageChoices = res.data.choices;
                this.results = res.data.result;
            })
        },
        handleVote() {
            axios.post(`http://localhost:8000/api/poll/${this.id}/vote/${this.choices}`, {}, {
                headers: {
                    "Authorization": `Bearer ${this.token}`
                }
            }).then(() => {
                this.getPoll();
                this.choices = null;
            }).catch(err => {
                console.log(err.message);
            });
        }
    }
}
</script>

<style scoped>
.progress-grey {
    width: 200px;
    height: 13px;
    overflow: hidden;
    border-radius: 10px;
    background-color: grey;
}

.progress-blue {
    height: 100%;
    background-color: blue;
}
</style>