<template>
    <div>
        <form @submit.prevent="submit_form">
            Post title:
            <br/>
            <input type="text" v-model="fields.title" class="form-control">
            <div class="alert alert-danger" v-if="errors && errors.title">
                {{ errors.title[0] }}
            </div>
            <br/>
            Post text:
            <br/>
            <textarea rows="10" v-model="fields.post_text" class="form-control"></textarea>
            <div class="alert alert-danger" v-if="errors && errors.post_text">
                {{ errors.post_text[0] }}
            </div>
            <br/>
            Category:
            <select class="form-control" v-model="fields.category_id">
                <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
            </select>
            <div class="alert alert-danger" v-if="errors && errors.category_id">
                {{ errors.category_id[0] }}
            </div>
            <br/>
            <input type="submit" class="btn btn-primary"
                   :value="form_submitting?'Saving ...':'Save post'"
                   :disabled="form_submitting" />
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
            fields: {
                title: '',
                post_text: '',
                category_id: ''
            },
            errors: [],
            form_submitting: false

        }

    },
    mounted() {
        axios.get('/api/categories')
            .then(result => {
                this.categories = result.data.data;
            })
    },
    methods: {
        submit_form() {
            this.form_submitting = true;
            axios.post('/api/posts', this.fields)
                .then(response => {
                    this.form_submitting = false;
                    this.$router.push('/');
                }).catch(error => {
                this.form_submitting = false;
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
