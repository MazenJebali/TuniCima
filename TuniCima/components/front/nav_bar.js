app.component('nav_bar', {
    props:{
      contents: {
        type:Array,
        default:[{name:"Home",link:"#"},{name:"Admin Pannel",link:"#"},{name:"Settings",link:"#"},{name:"About",link:"#"}]
      },
      buttons: {
        type:Array,
        default:[{name:"Sign out",link:"#",class:"btn btn-danger"}]
      }
    },
    data() {
      return {
      }
    },
    template:`
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#">TuniCima</a>
        <!-- Navbar Toggler Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span style="color: black;"><i class="bi bi-menu-button-wide"></i></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li v-for="(content,i) in contents" :key="i" class="nav-item">
              <a class="nav-link" :href="content.link">{{content.name}}</a>
            </li>
          </ul>
  
           <!-- Icon SGIN OUT -->
           <a :href="button.link" v-for="(button,i) in buttons">
              <span class="navbar-dark icon-placeholder">
                <i :class="button.class"></i>
              </span>
              <span style="padding-left:10px">{{button.name}}</span>
           </a>
        </div>
        <slot></slot>
      </div>
    </nav>
      `,
  })