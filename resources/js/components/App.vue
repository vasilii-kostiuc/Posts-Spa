<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Laravel SPA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="'Toggle navigation'">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item">
                            <router-link active-class="active-menu" exact class="nav-link" :to="{ name:'posts.index' }">'Posts List'</router-link>
                        </li>


                        <li class="nav-item">
                            <router-link active-class="active-menu" exact class="nav-link" :to="{ name:'posts.create'}">'Add new Post'</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <transition>
                    <router-view></router-view>
                </transition>
            </div>
        </main>
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
