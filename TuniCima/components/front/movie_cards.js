app.component('movie_cards', {
    props:{
        movies: {
            type:Array,
            required:true,
        },
        username: {
            type:String,
            required:true,
        },
    },
    data() {
      return {
      }
    },
    methods: {
        bookmark_movie(username,name,link,image) {
            if (localStorage.getItem(username) == null) {
                localStorage.setItem(username,JSON.stringify([]));
            };
            var favMovie = JSON.parse(localStorage.getItem(username));
            favMovie.push({name,link,image});
            localStorage.setItem(username,JSON.stringify(favMovie));
            event.preventDefault(); // to prevent redirecting to new page
            location.reload();
        }
    },
    template:`
        <div v-for="(movie,i) in movies" :key="i" class="card movie-card">
        <a :href="movie.link">
            <img :src="movie.image" class="card-img-top" :alt="movie.name">
            
            <div class="movie-info">
                <h5 class="card-title">{{movie.name}}</h5>
                <p class="card-text" style="color: lightgray;">{{movie.info}}</p>
                
                <div class="rating-box">
                   <div v-if="movie.rating != 0">
                    <i class="bi bi-star-fill"></i>
                     {{movie.rating}}/5
                   </div>
                   <div v-if="movie.rating == 0" >No rating yet</div>
                </div>
                <div class="rating-box m-2" title="bookmark movie"  @click="bookmark_movie(username,movie.name,movie.link,movie.image)">
                    <i class="bi bi-bookmark-star-fill"></i>
                </div>
            </div>
            
            <div class="play-icon"><i class="bi bi-play-circle"></i></div>
        <slot></slot></a>
        </div>
        
    `,
})