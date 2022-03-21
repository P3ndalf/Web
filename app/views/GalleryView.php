<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    html,
    body {
        height: 100%;
    }

    #app {
        display: flex;
        height: 100%;
    }

    .album {
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        justify-content: center;
        gap: 10px;
        width: 70%;
        max-width: 1200px;
    }

    .img_popup {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        backdrop-filter: blur(10px);
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        cursor: pointer;
    }

    .img_popup .content {
        margin: 0 auto 0 auto;
        height: auto;
        display: flex;
        cursor: default;

        border-radius: 10px;
        overflow: hidden;
    }

    .img_popup .content img {
        height: 100%;
    }

    .img_popup .content .text {
        right: 0;
        height: 100%;
        padding: 10px;
        background-color: white;
        overflow-y: auto;
    }

    button {
        padding: 100px;
        background: transparent;
        border: none;
        color: white;
        cursor: pointer;
        transition: 0.3s ease;
    }

    button:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>

<div id="app">
    <div class="album">
        <album-item v-for="(photo,i) in photos" :key="i" :package="photo" @click="index = i"></album-item>
    </div>
    <img-popup v-if="index !== -1" :photos="photos" :index="index" @close="index=-1">
    </img-popup>
</div>

<script src="../js/Images.js"></script>
<script src="../vue/script.js"></script>