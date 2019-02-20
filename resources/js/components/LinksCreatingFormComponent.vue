<template>
    <div class="LinksCreatingFormComponent">
        <div class="form-group">
            <div class="input-group">
                <input type="text" :class="error.url ? 'is-invalid' : ''" class="form-control" :readonly="loading" v-model="url"
                       placeholder="Paste a link to shorten it">
                <div class="input-group-append">
                    <button :class="error.url ? 'btn-outline-danger' : 'btn-outline-primary'" class="btn" :disabled="loading" @click="shortenUrl" type="button">
                        Shorten
                    </button>
                </div>
            </div>

            <div v-if="error.url" class="text-danger">
                <small>{{ error.url | first }}</small>
            </div>
        </div>

        <div class="form-group form-check">
            <input v-model="private" type="checkbox" class="form-check-input" id="isPrivateCheck" :disabled="loading">
            <label class="form-check-label" for="isPrivateCheck">Private</label>
        </div>

        <div v-if="result.key && !loading">
            <hr>
            Result: <a target="_blank" :href="resultUrl()">{{ resultUrl() }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['baseUrl', 'linkCreateUrl'],

        data: function () {
            return {
                url: null,
                private: false,
                loading: false,
                error: {},
                result: {}
            }
        },

        filters: {
            first: function (arr) {
                return arr[0];
            }
        },

        methods: {
            resultUrl: function () {
                return `${this.baseUrl}/${this.result.key}`;
            },

            shortenUrl: function () {
                this.loading = true;
                this.error = {};

                axios.post(this.linkCreateUrl, {
                    url: this.url,
                    is_private: this.private
                }).then(result => {
                    this.result = result.data;
                }).catch(err => {

                    let result = err.response;

                    if (!result.data.success) {
                        this.error = result.data.errors;
                    }

                }).then(() => {
                    this.loading = false;
                });
            }
        }
    }
</script>
