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
</style>

<div class="main-center justify-content-center">
    <div>
        <h1 class="text-center mb-3">
            Галлерея
        </h1>
        <div class="album mb-3">
            <?php
            for ($i = 0; $i < sizeof($data->getData()); $i++) {
                echo '<div class="card">';
                echo '  <div class="card-img zoomed-image">';
                echo '      <img class="card-img zoomed-image" src="' . $data->getData()[$i]["photo"] . '">';
                echo '  </div>';
                echo '</div>';
            }
            ?>
            <album-item v-for="(photo,i) in photos" :key="i" :package="photo" @click="index = i"></album-item>
        </div>
        <img-popup v-if="index !== -1" :photos="photos" :index="index" @close="index=-1">
        </img-popup>
    </div>


</div>