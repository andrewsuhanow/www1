<template>
    <div class="container">

        <example-component></example-component>

        111111111111111111111111111122222222222222222222222222
    </div>
</template>

<script>

    import ExampleComponent from '../components/ExampleComponent.vue'

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components:{
            ExampleComponent
        }
    }
</script>
