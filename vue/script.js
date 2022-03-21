
const PhotoAlbum = {
    data() {
      return {
        index: -1,
        photos: images
      };
    }
  };
  
  const app = Vue.createApp(PhotoAlbum);
  
  app.component("album-item", {
    props: ["package"],
    emits: ["click"],
    template: `
            <div class="card" @click="$emit('click')">
                <div class="card-img zoomed-image">
                    <img class="card-img zoomed-image" :src="package.photo" :alt="package.alt">
                </div>
            </div>
      `,
    data() {
      return {
        isOpened: false
      };
    },
  });
  
app.component("img-popup", {
    props: ["photos", "index"],
    emits: ["close"],
    template: `
          <teleport to="body">
          <div class="img_popup" @click.self="$emit('close')">
              <button type="button" class="to_left" style="font-size: 100px" @click="previous">&#8249;</button>
              <div class="content">
                  <img :src="photos[id].photo" :alt="photos.alt">
                  <div class="text">
                      <h2>{{photos[id].title}}</h2>
                      <p>{{photos[id].comment}}</p>
                  </div>
              </div>
              <button type="button" class="to_right" style="font-size: 100px"@click="next">&#8250;</button>
          </div>
      </teleport>
      `,
    data() {
      return {
        id: this.$props.index
      };
    },
    methods: {
      previous: function () {
        if (!this.id) {
          this.id = this.$props.photos.length - 1;
        } else {
          this.id--;
        }
      },
      next: function () {
        if (this.id === this.$props.photos.length - 1) {
          this.id = 0;
        } else {
          this.id++;
        }
      }
    }
  });
  
  app.mount("#app");
  