app.component('box_description', {
    props:{
      movie: {
        type:Object,
        required:true,
      }
    },
    data() {
      return {
      }
    },
    template:`
    <div class="container mt-4">
    <div class="card login-card">
        <!-- Movie Image Placeholder -->
        <img :src="movie.img" alt="Movie Placeholder" class="movie-image">

        <!-- Movie Description -->
        <div class="movie-description">
            <h2>{{movie.title}}</h2>
            <p><strong>Genre: </strong>{{movie.type}}</p>
            <p><strong>Release Date: </strong>{{movie.date}}</p>
            <p><strong>Director: </strong>{{movie.auth}}</p>
            <p><strong>Description: </strong>{{movie.desc}}</p>

            <p v-if="movie.EP != null"><strong>{{movie.EP}}</strong></p>
            <p v-if="movie.EPdesc != null"><strong>Description: </strong>{{movie.EPdesc}}</p>
            <p v-if="movie.EPdate != null"><strong>release date:</strong>{{movie.EPdate}}</p>

            <a type="button" class="btn btn-primary" :href="movie.link">Watch Now</a>
        </div>
        <slot></slot>
    </div>
    </div>
      `,
  })