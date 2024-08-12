app.component('slide_show', {
    props:{
      style: {
        type:Object,
        default: {},
      },
      elements: {
        type:Array,
        required:true,
      }
    },
    data() {
      return {
      }
    },
    template:`
    <div id="carouselExample" class="carousel slide" data-ride="carousel" :style="style">

        
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a :href="elements[0].link">
            <img :src="elements[0].src" class="d-block w-100">
          </a>
        </div>

        <div v-for="(element,i) in elements" :key="i" class="carousel-item">
          <a :href="element.link">
            <img :src="element.src" class="d-block w-100">
          </a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      
      <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <slot></slot>
  </div>
      `,
  })