app.component('side_bar', {
    props:{
        user: {
            type:String,
            required:true,
        },
        logo: {
            type:String,
            default:"",
        },
    },
    data() {
      return {
        favorites: JSON.parse(localStorage.getItem(this.user)),
      }
    },
    methods: {
      clearStorage() {
        localStorage.setItem(this.user,JSON.stringify([]));
        location.reload();
      },
    },
    template:`
    <div class="sidebar" id="mySidebar">
        <div>
          <h5 class="username mt-5 ml-5 mb-3">{{user}}</h5>
          <img :src="logo" alt="Logo" class="rounded-circle" style="width: 70px; height: 70px;margin-left:35%">
        </div>
        <hr width="70%"/>

        <h6 class="text m-2 text-bold">Favorite Series</h6>

        <a v-if="favorites != null" v-for="(favorite,i) in favorites" :key="i" :href="favorite.link">
          # {{favorite.name}}
          <img :src="favorite.image" alt="favoriteContent" class="rounded-circle" style="width: 40px; height: 40px;border:yellow 2px solid">
        </a>
        <button v-if="favorites != null" class="btn btn-danger" @click="clearStorage" title="clear list"><i class="bi bi-trash-fill"></i></button>

        <p v-if="favorites == null" class="text-center"> Nothing has been choosen yet!</p>
      
        <slot></slot>

      <div class="sidebar-footer">Copyright 2023, All right Reserved.</div>
    </div>
      `,
  },
  )